<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{
    protected $usersModel, $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->usersModel = new UsersModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('user/index', $data);
    }

    public function ajax_edit_profile()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $username = $this->usersModel->getUser($id);
            if ($username['username'] == $this->request->getVar('username')) {
                $username_rules = 'required';
            } else {
                $username_rules = 'required|is_unique[users.username]';
            }

            $email = $this->usersModel->getUser($id);
            if ($email['email'] == $this->request->getVar('email')) {
                $email_rules = 'required';
            } else {
                $email_rules = 'required|is_unique[users.email]|valid_email';
            }

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'username' => [
                    'rules' => $username_rules,
                    'errors' => [
                        'required' => 'Input is required',
                        'is_unique' => 'Username sudah dipakai'
                    ],
                ],
                'email' => [
                    'rules' => $email_rules,
                    'errors' => [
                        'required' => 'Input is required',
                        'is_unique' => 'Email sudah dipakai'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'username'  => $validation->getError('username'),
                        'email'     => $validation->getError('email')
                    ]
                ];
            } else {
                $updatedata = [
                    'username'      => $this->request->getVar('username'),
                    'email'         => $this->request->getVar('email'),
                    'first_name'    => $this->request->getVar('first_name'),
                    'last_name'     => $this->request->getVar('last_name'),
                    'phone'         => $this->request->getVar('phone'),
                    'address'       => $this->request->getVar('address'),
                ];
                $this->builder->update($updatedata, ['id' => $id]);

                $msg =  [
                    "sukses" => "Edit Sukses"
                ];
            }

            echo json_encode($msg);
        }
    }
}
