<?php
switch ($uri) {
    case 'barang/cabang/dashboard':
        require BASE_PATH . '/app/controllers/barang/CabangBarangController.php';
        (new CabangBarangController)->index();
        exit;
    case 'barang/cabang/tambah':
        require BASE_PATH . '/app/controllers/barang/CabangBarangController.php';
        (new CabangBarangController)->tambah();
        exit;
    case 'barang/cabang/proses_edit':
        require BASE_PATH . '/app/controllers/barang/CabangBarangController.php';
        (new CabangBarangController)->proses_edit();
        exit;
}
if (preg_match('#^barang/cabang/edit/([0-9]+)$#', $uri, $matches)) {
    $id = $matches[1];
    require BASE_PATH . '/app/controllers/barang/CabangBarangController.php';
    (new CabangBarangController)->edit($id);
    exit;
}

if (preg_match('#^barang/cabang/hapus/([0-9]+)$#', $uri, $matches)) {
    $id = $matches[1];
    require BASE_PATH . '/app/controllers/barang/CabangBarangController.php';
    (new CabangBarangController)->hapus($id);
    exit;

}