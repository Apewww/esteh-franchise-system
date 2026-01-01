<?php
switch($uri) {
    case 'barang/pusat/keluar':
        require BASE_PATH . '/app/controllers/barang/PusatBarangKeluarController.php';
        (new PusatBarangKeluarController)->index();
        exit;
}