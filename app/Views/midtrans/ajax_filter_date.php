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