<?php
switch ($uri) {
    case 'transaksi/cabang':
        require BASE_PATH . '/app/controllers/transaksi/CabangTransaksiController.php';
        (new CabangTransaksiController)->index();
        exit;
}