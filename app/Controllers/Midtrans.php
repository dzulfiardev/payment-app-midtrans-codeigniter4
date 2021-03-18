<?php

namespace App\Controllers;

class Midtrans extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('order');

        \Midtrans\Config::$serverKey = 'SB-Mid-server-DdFcR4RsqWPdJHGoiSnRfP1d';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function index()
    {
        if (in_groups('user')) {
            $this->builder->where('user_id', user()->id);
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        } else {
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        }

        $data = [
            'title' => 'Payment List',
            'order' => $query->getResult()
        ];
        return view('midtrans/index', $data);
    }

    public function search_filter()
    {
        if ($this->request->isAJAX()) {
            $minval = $this->request->getVar('first_date');
            $maxval = $this->request->getVar('last_date');

            if (in_groups('user')) {
                $this->builder->where('user_id', user()->id);
                $this->builder->where('transaction_time >=', $minval);
                $this->builder->where('transaction_time <=', $maxval);
                $this->builder->orderBy('order_id', 'DESC');
                $query = $this->builder->get();
            } else {
                $this->builder->where('transaction_time >=', $minval);
                $this->builder->where('transaction_time <=', $maxval);
                $this->builder->orderBy('order_id', 'DESC');
                $query = $this->builder->get();
            }

            $data = [
                'order' => $query->getResult()
            ];
            $msg = [
                'data' => view('midtrans/ajax_filter_date', $data)
            ];
            echo json_encode($msg);
        } // Search Filter With ajax request
    }

    public function pembayaran()
    {
        $data = [
            'title' => 'Invoice'
        ];
        return view('midtrans/pembayaran', $data);
    }

    public function token()
    {
        $first_name = $this->request->getVar('first_name');
        $last_name = $this->request->getVar('last_name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $address = $this->request->getVar('address');
        $total = $this->request->getVar('total');
        $nama_pembayaran = $this->request->getVar('nama_pembayaran');

        $transaction_details = array(
            'order_id' => time(),
            'gross_amount' => $total, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $total,
            'quantity' => 1,
            'name' => $nama_pembayaran
        );

        // Optional
        // $item2_details = array(
        //     'id' => 'a2',
        //     'price' => 50000,
        //     'quantity' => 1,
        //     'name' => "Orange"
        // );

        // Optional
        $item_details = array($item1_details);

        // Optional
        $billing_address = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'address'       => $address,
            'city'          => "Semarang",
            'postal_code'   => "16602",
            'phone'         => $phone,
            'country_code'  => 'IDN'
        );

        // Optional
        // $shipping_address = array(
        //     'first_name'    => "Obet",
        //     'last_name'     => "Supriadi",
        //     'address'       => "Manggis 90",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "16601",
        //     'phone'         => "08113366345",
        //     'country_code'  => 'IDN'
        // );

        // Optional
        $customer_details = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'phone'         => $phone,
            'billing_address'  => $billing_address,
            // 'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        // $enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

        // Fill transaction details
        $transaction = array(
            // 'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        error_log(json_encode($transaction));
        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->request->getVar('result_data'), true);

        // Pengkondisian Pembayaran Kartu Kredit    
        if ($result['payment_type'] == 'credit_card') {

            $creditcard = 'credit card';

            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => $creditcard,
                'transaction_time' => $result['transaction_time'],
                'bank' => $result['bank'],
                'va_number' => 'N/A',
                'pdf_url' => $result['redirect_url'],
                'status_code' => $result['status_code']
            ];

            $simpan = $this->builder->insert($savedata);
            if ($simpan) {
                session()->setFlashData('pesan', 'Transaksi baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
            // Pengkondisian transfer Mandiri
        } else if ($result['payment_type'] == 'echannel') {

            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => 'bank transfer',
                'transaction_time' => $result['transaction_time'],
                'bank' => 'mandiri',
                'va_number' => $result['bill_key'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code']
            ];

            $simpan = $this->builder->insert($savedata);
            if ($simpan) {
                session()->setFlashData('pesan', 'Transaksi baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
            // Pengkondisian Transfer Bank Permata
        } else if (isset($result['permata_va_number'])) {
            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => 'bank transfer',
                'transaction_time' => $result['transaction_time'],
                'bank' => 'permata',
                'va_number' => $result['permata_va_number'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code']
            ];

            $simpan = $this->builder->insert($savedata);
            if ($simpan) {
                session()->setFlashData('pesan', 'Transaksi baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
        } else {

            if ($result['payment_type'] == 'bank_transfer') {
                $banktransfer =  'bank transfer';
            }
            $savedata = [
                'order_id' => $result['order_id'],
                'user_id' => user()->id,
                'first_name' => user()->first_name,
                'last_name' => user()->last_name,
                'gross_amount' => $result['gross_amount'],
                'payment_type' => $banktransfer,
                'transaction_time' => $result['transaction_time'],
                'bank' => $result['va_numbers'][0]['bank'],
                'va_number' => $result['va_numbers'][0]['va_number'],
                'pdf_url' => $result['pdf_url'],
                'status_code' => $result['status_code'],
            ];

            $simpan = $this->builder->insert($savedata);

            if ($simpan) {
                session()->setFlashData('pesan', 'Data baru ditambahkan');
                return redirect()->to('/');
            } else {
                echo 'gagal';
            }
        }
    }

    public function excel()
    {
        $minval = $this->request->getVar('first_date');
        $maxval = $this->request->getVar('last_date');

        if (in_groups('user')) {
            $this->builder->where('user_id', user()->id);
            $this->builder->where('transaction_time >=', $minval);
            $this->builder->where('transaction_time <=', $maxval);
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        } else {
            $this->builder->where('transaction_time >=', $minval);
            $this->builder->where('transaction_time <=', $maxval);
            $this->builder->orderBy('order_id', 'DESC');
            $query = $this->builder->get();
        }

        $data = [
            'list' => $query->getResult(),
            'title' => 'Excel'
        ];
        return view('midtrans/excel', $data);
    }
}
