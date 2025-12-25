<?php
switch ($uri) {
    case 'barang/pusat/masuk':
        require BASE_PATH . '/app/controllers/barang/PusatBarangMasukController.php';
        (new PusatBarangMasukController)->index();
        exit;
}