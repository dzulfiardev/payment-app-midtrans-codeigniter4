<?= $this->extend('templates/midtrans/midtrans_index_template') ?>
<?= $this->section('main_content') ?>

<div class="container">
    <div class="col-md-7">
        <div class="card my-5">
            <div class="card-header">
                <h2>Edit Profile</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('user/ajax_edit_profile') ?>" method="POST" id="edit_profile">
                    <span id="message"></span>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Username</strong></label>
                                <input type="hidden" name="id" value="<?= user()->id ?>">
                                <input type="text" name="username" id="username" class="form-control" value="<?= user()->username ?>">
                                <small class="text-danger" id="error_username"></small>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Email</strong></label>
                                <input type="text" name="email" id="email" class="form-control" value="<?= user()->email ?>">
                                <small class="text-danger" id="error_email"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6" id="firstname_content">
                                <label><strong>First Name</strong> </label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= user()->first_name ?>">
                            </div>
                            <div class="col-md-6">
                                <label><strong>Last Name</strong> </label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= user()->last_name ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Phone</strong></label>
                                <input type="number" class="form-control" name="phone" id="phone" value="<?= user()->phone ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label><strong>Address</strong></label>
                                <input class="form-control" name="address" id="address" type="text" value="<?= user()->address ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" name="edit_submit" id="edit_submit" class="btn btn-info">Edit</button>
                    </div>
                </form>
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
                $('#error_password').html(`<span class="text-success">Password Match!!</span>`);
            } else if ($('#password_repeat').val() == '') {
                $('#password_repeat').removeClass('is-invalid');
                $('#password_repeat').removeClass('is-valid');
                $('#error_password').html('');
            } else {
                $('#password_repeat').addClass('is-invalid');
                $('#password_repeat').removeClass('is-valid');
                $('#error_password').html('<span class="text-danger">Password Not Match!!</span>');
            }
        }); // Validation repeat password

        $('#edit_profile').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(res) {

                    if (res.error) {
                        if (res.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#error_username').html(res.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#error_username').html('');
                        }

                        if (res.error.email) {
                            $('#email').addClass('is-invalid');
                            $('#error_email').html(res.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#error_email').html('');
                        }

                    } else {
                        // $('#edit_submit').attr('disabled', false);
                        $('#password_repeat').removeClass('is-invalid');
                        $('#password_repeat').removeClass('is-valid');
                        $('#error_password').html('')
                        $('#email').removeClass('is-invalid');
                        $('#error_email').html('');
                        $('#username').removeClass('is-invalid');
                        $('#error_username').html('');
                        Swal.fire({
                            icon: 'success',
                            title: 'Your Data Updated',
                            html: res.sukses
                        });
                    }
                }
            });

        });

    });
</script>

<?= $this->endSection('main-content') ?>