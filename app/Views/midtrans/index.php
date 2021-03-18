<?= $this->extend('templates/midtrans/midtrans_index_template') ?>
<?= $this->section('main_content') ?>

<div class="row py-2 my-5">
    <div class="col-lg-12">
        <div class="cl-md-5 alert-message">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h2><?= $title ?></h2>
                    </div>
                    <div class="col-md-6">
                        <div class=" form-group">
                            <div class="row">
                                <div class="col-md-4 my-1">
                                    <input type="date" name="first_date" id="first_date" class="form-control form-control-sm" placeholder="First Date">
                                </div>
                                <div class="col-md-4 my-1">
                                    <input type="date" name="last_date" id="last_date" class="form-control form-control-sm" placeholder="Last Date">
                                </div>
                                <div class="col-md-4 my-1">
                                    <button type="submit" name="submit_date" id="submit_date" class="btn btn-block btn-sm btn-secondary"><i class="fas fa-calendar"></i> Filter Date</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-sm btn_darkgreen my-1" data-toggle="modal" data-target="#export_modal"><i class="fas fa-file-excel"></i> Export</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive" id="main-data">
                    <table class="table table-sm table-hover table-bordered table-striped" id="table-data">
                        <thead class="bg-dark text-white">
                            <tr>
                                <?php if (in_groups('admin')) : ?>
                                    <th scope="col">Name</th>
                                    <th scope="col">User Id</th>
                                <?php endif ?>
                                <th scope="col">Order Id</th>
                                <th scope="col">Gross Amount</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Bank</th>
                                <th scope="col">VA Number</th>
                                <th scope="col">Guide</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $o) : ?>
                                <tr>
                                    <?php if (in_groups('admin')) : ?>
                                        <td class="text-capitalize"><?= $o->first_name ?> <?= $o->last_name ?></td>
                                        <td><?= $o->user_id ?></td>
                                    <?php endif ?>
                                    <td><?= $o->order_id ?></td>
                                    <td>Rp. <?= number_format($o->gross_amount) ?></td>
                                    <?php if ($o->payment_type == 'credit card') : ?>
                                        <td><?= '<div class="badge bg_lightblue text-capitalize">Credit Card</div>' ?></td>
                                    <?php else : ?>
                                        <td><?= '<div class="badge bg_lightgreen text-capitalize">Bank Transfer</div>' ?></td>
                                    <?php endif ?>
                                    <td><?= $o->time_stamp ?></td>
                                    <td class="text-uppercase"><?= $o->bank ?></td>
                                    <td><?= $o->va_number ?></td>
                                    <td><a class="btn badge badge-danger" href="<?= $o->pdf_url ?>" target="_blank">PDF</a></td>
                                    <?php if ($o->status_code == 200) : ?>
                                        <td><?= '<div class="badge badge-success">Success</div>' ?></td>
                                    <?php else : ?>
                                        <td><?= '<div class="badge badge-warning">Pending</div>' ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Modal Download Excel -->
<div class="modal fade" id="export_modal" tabindex="-1" aria-labelledby="export_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="export_modalLabel">Export To Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" form-group">
                    <form action="<?= base_url('midtrans/excel') ?>" method="post">
                        <div class="row">
                            <div class="col-md-5 my-1">
                                <input type="date" name="first_date" id="modal_first_date" class="form-control form-control-sm" placeholder="First Date" required>
                            </div>
                            <div class="col-md-5 my-1">
                                <input type="date" name="last_date" id="modal_last_date" class="form-control form-control-sm" placeholder="Last Date" required>
                            </div>
                            <div class="col-md-2 my-1">
                                <button type="submit" name="submit_date" id="modal_submit_date" class="btn btn-block btn-sm btn-secondary"><i class="fas fa-file-download"></i></button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var tableTransactions = $('#table-data').DataTable({
            "order": [],
            <?php if (in_groups('admin')) {  ?> "columnDefs": [{
                    "targets": [8, 9],
                    "orderable": false,
                }, ],
            <?php } else { ?> "columnDefs": [{
                    "targets": [6, 7],
                    "orderable": false,
                }, ],
            <?php } ?>
        });

        setTimeout(() => {
            $('.alert-message').html('');
        }, 4000);

        // Filter Date
        $('#submit_date').click(function() {
            var first_date = $('#first_date').val();
            var last_date = $('#last_date').val();

            if (first_date != '' && last_date != '') {
                $.ajax({
                    url: "<?= base_url('midtrans/search_filter') ?>",
                    type: "post",
                    data: {
                        first_date: first_date,
                        last_date: last_date
                    },
                    dataType: "json",
                    success: function(res) {
                        $('#table-data').html(res.data);
                    }
                })
            } else {
                alert("Please Select Date");
            }
        }); // End Filter Date

        // Hide Modal Export Excel
        $('#modal_submit_date').click(function() {
            $('#export_modal').modal('hide');
            setTimeout(() => {
                $('#modal_first_date').val('');
                $('#modal_last_date').val('');
            }, 1500);
        }) // End Hide Modal Export excel
    });
</script>


<?= $this->endSection() ?>