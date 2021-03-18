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
                            <h3>Login</h3>
                        </div>
                        <div class="col-md-6">
                            <img width="125px" align="right" src="<?= base_url('img/dzulfikardev_black_logo.png') ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="panel-body card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= route_to('login') ?>" method="post">
                        <?= csrf_field() ?>

                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <label>Email or Username</label>
                            <input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.emailOrUsername') ?>" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        <?php endif; ?>
                        <br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <?php if ($config->allowRemembering) : ?>
                            <div class="form-check">
                                <small>
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </small>
                            </div>
                        <?php endif; ?>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                        </div>
                        <hr>
                        <div class="text-center">
                            <?php if ($config->allowRegistration) : ?>
                                <small><a href="<?= base_url('register') ?>">No Have Account? Register</a></small>
                            <?php endif; ?>
                            <br>
                            <?php if ($config->activeResetter) : ?>
                                <small><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></small>
                            <?php endif; ?>
                            <hr>
                            <p><i class="fas fa-envelope"></i> dzulfikar.sauki@gmail.com <i class="ml-1 fab fa-whatsapp"></i> 088801995989</p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>