<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- JS Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- JS Mitrands -->
    <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-yCQR7AeDTVLatBNi"></script> -->

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- JS Data Tables -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header mr-5">
                <a class="navbar-brand" href="index.php"><img src="<?= base_url('img/dzulfikardev_logo.png') ?>" width="160px" height="50px" alt=""></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                    <a class="nav-link" href="<?= base_url('user') ?>">Profile</a>
                    <?php if (in_groups('user')) : ?>
                        <a class="nav-link" href="<?= base_url('pembayaran') ?>">Payment</a>
                    <?php endif ?>
                </div>
            </div>

            <!-- Dropdown Navbar -->
            <div class="navbar-nav nav-item dropdown navbar-right">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (user()->first_name == '') {
                        echo user()->username;
                    } else {
                        echo '<span class="text-capitalize">' . user()->first_name . ' ' . user()->last_name . '</span>';
                    } ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="#" id="logout" data-toggle="modal" data-target="#logout_modal">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="main_content">
        <!-- Main Content -->
        <?= $this->renderSection('main_content') ?>
        <!-- End Main Content -->
    </div>

    <footer class="bg-dark mt-3 footer_" style="bottom:0px;position:relative;left:0px;width:100%;display:block">
        <div class="container">
            <div class="row bd-highlight">
                <div class="col text-white d-flex align-items-center mt-3 justify-content-center">
                    <p><i class="far fa-copyright"></i> Copyright
                        <?= date('Y'); ?> <a href="https://github.com/dzulfiardev" class="text-white" target="_blank">Dzulfikar Sauki</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Logout Modal -->
    <div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Logout</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure to Logout ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" href="<?= base_url('logout') ?>" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>