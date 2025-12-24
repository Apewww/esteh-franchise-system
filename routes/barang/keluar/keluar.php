<?php
switch ($uri) {
    case 'managementbarang/keluar':
        require BASE_PATH . '/app/controllers/barang/BarangKeluarController.php';
        (new BarangKeluarController)->index();
        exit;
}