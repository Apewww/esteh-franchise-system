<?php

require_once __DIR__ . '/../../app/controllers/transaksi/CabangTransaksiController.php';

$controller = new CabangTransaksiController();

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($uri === 'transaksi/cabang') {
    $controller->index();
} elseif ($uri === 'transaksi/cabang/tambah') {
    $controller->create();
} elseif ($uri === 'transaksi/cabang/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}
elseif (preg_match('#^transaksi/cabang/hapus/(\d+)$#', $uri, $m)) {
    $controller->delete($m[1]);
}
elseif (preg_match('#^transaksi/cabang/edit/(\d+)$#', $uri, $m)) {
    $controller->edit($m[1]);
}
elseif (preg_match('#^transaksi/cabang/update/(\d+)$#', $uri, $m)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
elseif (preg_match('#^transaksi/cabang/update/(\d+)$#', $uri, $m)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
