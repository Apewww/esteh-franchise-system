<?php
switch ($uri) {
    case 'barang/cabang/masuk':
        require BASE_PATH . '/app/controllers/barang/CabangBarangMasukController.php';
        (new CabangBarangMasukController)->index();
        exit;

    case 'barang/cabang/masuk/tambah':
        require BASE_PATH . '/app/controllers/barang/CabangBarangMasukController.php';
        (new CabangBarangMasukController)->tambah($_POST);
        exit;

    case (preg_match('/^barang\/cabang\/masuk\/edit\/(\d+)$/', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/CabangBarangMasukController.php';
        (new CabangBarangMasukController)->edit($matches[1], $_POST);;
        exit;
        
    case (preg_match('/^barang\/cabang\/masuk\/hapus\/(\d+)$/', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/CabangBarangMasukController.php';
        (new CabangBarangMasukController)->hapus($matches[1]);
        exit;
}
