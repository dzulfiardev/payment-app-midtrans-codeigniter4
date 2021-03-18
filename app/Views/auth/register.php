<?= $this->extend('templates/auth/auth_template') ?>
<?= $this->section('main-content') ?>

<br>
<div class="container" style="min-height:100vh">
    <h2 align="center">Payment System</h2>
    <br>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default card">
                <div class="panel-heading card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Register</h3>
                        </div>
                        <div class="col-md-6">
                            <img width="125px" align="right" src="<?= base_url('img/dzulfikardev_black_logo.png') ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="panel-body card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" autocomplete="off" value="<?= old('email') ?>" placeholder="Email">
                            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                        </div>
                        <div class=" form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" value="<?= old('username') ?>" autocomplete="off" placeholder="Username">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input type="password" name="pass_confirm" id="password_repeat" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    <div class="invalid-feedback" id="error-password">
                                    </div>
                                    <div class="valid-feedback" id="error-password">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block"><?= lang('Auth.register') ?></button>
                        </div>
                        <hr>
                    </form>
                    <small class="text-center"><a href="<?= base_url('/login') ?>">Have Account? Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#password_repeat').on('keyup', function() {
            if ($('#password').val() == $('#password_repeat').val()) {
                $('#password_repeat').addClass('is-valid');
                $('#password_repeat').removeClass('is-invalid');
                $('.valid-feedback').html(`<span class="text-success">Password Match!!</span>`);
            } else if ($('#password_repeat').val() == '') {
                $('#password_repeat').removeClass('is-invalid');
                $('#password_repeat').removeClass('is-valid');
                $('#error-password').html('');
            } else {
                $('#password_repeat').addClass('is-invalid');
                $('#password_repeat').removeClass('is-valid');
                $('#error-password').html('<span class="text-danger">Password Not Match!!</span>');
            }
        });

        $('#password').on('keyup', function() {
            $('#password').removeClass('is-invalid');
        })
    });
</script>

<?= $this->endSection() ?>