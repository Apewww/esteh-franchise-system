<?php
switch($uri) {
    case 'barang/pusat/keluar':
        require BASE_PATH . '/app/controllers/barang/PusatBarangKeluarController.php';
        (new PusatBarangKeluarController)->index();
        exit;
    case 'barang/pusat/keluar/add':
        require BASE_PATH . '/app/controllers/barang/PusatBarangKeluarController.php';
        (new PusatBarangKeluarController)->addBarangkeluar();
        exit;
    case (preg_match('#^barang/pusat/keluar/edit/(\d+)$#', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/PusatBarangKeluarController.php';
        (new PusatBarangKeluarController)->editIndex($matches[1]);
        exit;
    case ('barang/pusat/keluar/editProsses'):
        require BASE_PATH . '/app/controllers/barang/PusatBarangKeluarController.php';
        (new PusatBarangKeluarController)->editProssesBarangkeluar();
        exit;
    case (preg_match('#^barang/pusat/keluar/delete/(\d+)$#', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/barang/PusatBarangKeluarController.php';
        (new PusatBarangKeluarController)->deleteBarangkeluar($matches[1]);
        exit;
}