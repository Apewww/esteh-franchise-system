<?php
switch ($uri) {
    case 'barang/pusat/masuk':
        require BASE_PATH . '/app/controllers/barang/PusatBarangMasukController.php';
        (new PusatBarangMasukController)->index();
        exit;

    case 'barang/pusat/masuk/tambah':
        require BASE_PATH . '/app/controllers/barang/PusatBarangMasukController.php';
        (new PusatBarangMasukController)->tambah($_POST);
        exit;

    case (preg_match('/^barang\/pusat\/masuk\/edit\/(\d+)$/', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/PusatBarangMasukController.php';
        (new PusatBarangMasukController)->edit($matches[1], $_POST);;
        exit;

    case (preg_match('/^barang\/pusat\/masuk\/hapus\/(\d+)$/', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/PusatBarangMasukController.php';
        (new PusatBarangMasukController)->hapus($matches[1]);
        exit;
}