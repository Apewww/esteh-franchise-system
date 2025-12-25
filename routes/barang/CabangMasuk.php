<?php
switch ($uri) {
    case 'barang/cabang/masuk':
        require BASE_PATH . '/app/controllers/barang/CabangBarangMasukController.php';
        (new CabangBarangMasukController)->index();
        exit;
}