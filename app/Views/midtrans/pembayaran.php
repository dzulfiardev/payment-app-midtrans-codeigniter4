<?= $this->extend('templates/midtrans/midtrans_index_template') ?>
<?= $this->section('main_content') ?>

<div class="container col-md-6 py-2 my-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3><?= $title ?></h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('midtrans/finish') ?>" method="post" id="payment-form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Full Name</label>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="text-capitalize">: <strong><?= user()->first_name ?> <?= user()->last_name ?></strong></label>
                            <input type="hidden" class="form-control" id="first_name" aria-describedby="emailHelp" name="first_name" value="<?= user()->first_name ?>">
                            <input type="hidden" class="form-control" id="last_name" aria-describedby="emailHelp" name="last_name" value="<?= user()->last_name ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Email address</label>
                        </div>
                        <div class="col-md-6">
                            <label for="">: <strong><?= user()->email ?></strong></label>
                            <input type="hidden" id="email" name="email" value="<?= user()->email ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Phone</label>
                        </div>
                        <div class="col-md-6">
                            <label for="">: <strong><?= user()->phone ?></strong></label>
                            <input type="hidden" id="phone" name="phone" value="<?= user()->phone ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Perihal Pembayaran</label>
                        </div>
                        <div class="col-md-6">
                            <label for="">: <strong>Pembayaran Kursus</strong></label>
                            <input type="hidden" id="nama_pembayaran" name="nama_pembayaran" value="Pembayaran Kursus">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-md-6">
                            <label for="">: <strong><?= user()->address ?></strong></label>
                            <input type="hidden" id="address" name="address" value="<?= user()->address ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" style="font-size:30px;">Total Pembayaran :</label>
                        </div>
                        <div class="col-md">
                            <label for="" style="font-size:35px;font-weight:600;">Rp. 400.000</label>
                        </div>
                        <input type="hidden" id="total" value="400000" name="total">
                    </div>
                </div>

                <!-- Don't Delete this element -->
                <input type="hidden" name="result_type" id="result-type" value="">
                <input type="hidden" name="result_data" id="result-data" value="">

                <button type="submit" id="pay-button" class="btn btn-primary">Bayar</button>
            </form>

            <!-- Button -->
        </div>
    </div>
</div>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-yCQR7AeDTVLatBNi"></script>
<script type="text/javascript">
    $('#pay-button').click(function(e) {
        e.preventDefault();
        $(this).attr("disabled", "disabled");

        const first_name = $('#first_name').val();
        const last_name = $('#last_name').val();
        const email = $('#email').val();
        const address = $('#address').val();
        const phone = $('#phone').val();
        const total = $('#total').val();
        const nama_pembayaran = $('#nama_pembayaran').val();

        $.ajax({
            url: '<?= base_url('midtrans/token') ?>',
            type: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                address: address,
                phone: phone,
                total: total,
                nama_pembayaran: nama_pembayaran
            },
            cache: false,

            success: function(data) {
                //location = data;
                console.log(data);
                console.log('token = ' + data);
                $('#pay-button').removeAttr('disabled');

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {
                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();

                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();

                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    })
</script>
<!-- Connnect Api nama-nama provinsi -->
<!-- <script>
        $(document).ready(function() {
            $.ajax({
                url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
                type: "get",
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    console.log(data)
                    for (var i = 0; i < data.provinsi.length; i++) {
                        $('#provinsi').append(`<option class="opsi" id="${data.provinsi[i].id}" value="${data.provinsi[i].nama}">${data.provinsi[i].nama}</option>`);
                    }
                }
            });
        })
    </script> -->

<?= $this->endSection() ?>