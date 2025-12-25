<?php
switch ($uri) {
    case 'transaksi/pusat':
        require BASE_PATH . '/app/controllers/transaksi/PusatTransaksiController.php';
        (new PusatTransaksiController)->index();
        exit;
}