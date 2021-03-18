<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=List.xls");

?>
<html>

<body>
    <table border="1">
        <thead>
            <tr>
                <?php if (in_groups('admin')) : ?>
                    <th>Name</th>
                    <th scope="col">User Id</th>
                <?php endif ?>
                <th scope="col">Order Id</th>
                <th scope="col">Gross Amount</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Bank</th>
                <th scope="col">VA Number</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $o) : ?>
                <tr>
                    <?php if (in_groups('admin')) : ?>
                        <td style="text-transform:capitalize;"><?= $o->first_name ?> <?= $o->last_name ?></td>
                        <td><?= $o->user_id ?></td>
                    <?php endif ?>
                    <td><?= $o->order_id ?></td>
                    <td>Rp. <?= number_format($o->gross_amount) ?></td>
                    <td style="text-transform:capitalize;"><?= $o->payment_type ?></td>
                    <td><?= $o->transaction_time ?></td>
                    <td><?= $o->time_stamp ?></td>
                    <td style="text-transform:uppercase;"><?= $o->bank ?></td>
                    <td><?= $o->va_number ?></td>
                    <?php if ($o->status_code == 200) : ?>
                        <td>Sukses</td>
                    <?php else : ?>
                        <td>Pending</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>