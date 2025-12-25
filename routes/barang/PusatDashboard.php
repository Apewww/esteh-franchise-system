<?php
switch ($uri) {
    case 'barang/pusat/dashboard':
        require BASE_PATH . '/app/controllers/barang/PusatBarangController.php';
        (new PusatBarangController)->index();
        exit;
}