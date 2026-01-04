<?php

require_once __DIR__ . '/../../app/controllers/transaksi/PusatTransaksiController.php';

$controller = new PusatTransaksiController();

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($uri === 'transaksi/pusat') {
    $controller->index();
}
elseif ($uri === 'transaksi/pusat/tambah') {
    $controller->create();
}
elseif ($uri === 'transaksi/pusat/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
elseif (preg_match('#^transaksi/pusat/hapus/(\d+)$#', $uri, $m)) {
    $controller->delete($m[1]);
}
elseif (preg_match('#^transaksi/pusat/edit/(\d+)$#', $uri, $m)) {
    $controller->edit($m[1]);
}
elseif (preg_match('#^transaksi/pusat/update/(\d+)$#', $uri, $m)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
elseif (preg_match('#^transaksi/pusat/update/(\d+)$#', $uri, $m)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
