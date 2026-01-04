<?php
switch ($uri) {
    case 'barang/pusat/dashboard':
        require BASE_PATH . '/app/controllers/barang/PusatBarangController.php';
        (new PusatBarangController)->index();
        exit;
        
    case 'barang/pusat/tambah':
        require BASE_PATH . '/app/controllers/barang/PusatBarangController.php';
        (new PusatBarangController)->tambah();
        exit;
        
    case 'barang/pusat/proses_edit':
        require BASE_PATH . '/app/controllers/barang/PusatBarangController.php';
        (new PusatBarangController)->proses_edit();
        exit;
}

if (preg_match('#^barang/pusat/edit/([0-9]+)$#', $uri, $matches)) {
    $id = $matches[1];
    require BASE_PATH . '/app/controllers/barang/PusatBarangController.php';
    (new PusatBarangController)->edit($id);
    exit;
}

if (preg_match('#^barang/pusat/hapus/([0-9]+)$#', $uri, $matches)) {
    $id = $matches[1];
    require BASE_PATH . '/app/controllers/barang/PusatBarangController.php';
    (new PusatBarangController)->hapus($id);
    exit;
}