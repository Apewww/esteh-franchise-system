<?php
switch($uri) {
    case 'barang/cabang/keluar':
        require BASE_PATH . '/app/controllers/barang/CabangBarangKeluarController.php';
        (new CabangBarangKeluarController)->index();
        exit;
    case 'barang/cabang/keluar/add':
        require BASE_PATH . '/app/controllers/barang/CabangBarangKeluarController.php';
        (new CabangBarangKeluarController)->addBarangkeluar();
        exit;
}