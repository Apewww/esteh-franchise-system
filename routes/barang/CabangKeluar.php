<?php
switch ($uri) {
    case 'barang/cabang/keluar':
        require BASE_PATH . '/app/controllers/barang/CabangBarangKeluarController.php';
        (new CabangDashboardController)->index();
        exit;
}