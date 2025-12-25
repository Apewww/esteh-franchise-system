<?php
switch ($uri) {
    case 'barang/cabang/dashboard':
        require BASE_PATH . '/app/controllers/barang/CabangBarangController.php';
        (new CabangBarangController)->index();
        exit;
}