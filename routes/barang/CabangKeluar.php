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
    case (preg_match('#^barang/cabang/keluar/edit/(\d+)$#', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/CabangBarangKeluarController.php';
        (new CabangBarangKeluarController)->editIndex($matches[1]);
        exit;
    case ('barang/cabang/keluar/editProsses'):
        require BASE_PATH . '/app/controllers/barang/CabangBarangKeluarController.php';
        (new CabangBarangKeluarController)->editProssesBarangkeluar();
        exit;
    case (preg_match('#^barang/cabang/keluar/delete/(\d+)$#', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/CabangBarangKeluarController.php';
        (new CabangBarangKeluarController)->deleteBarangkeluar($matches[1]);
        exit;
}