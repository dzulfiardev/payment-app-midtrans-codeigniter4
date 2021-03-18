<?php
$base = $_SERVER['REQUEST_URI'];
?>

<form action="<?= base_url() ?>/midtrans/checkout_process" method="post">
    <input type="submit" value="Pay with Snap Redirect">
</form>