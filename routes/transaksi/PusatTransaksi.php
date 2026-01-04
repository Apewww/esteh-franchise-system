<?php

require_once __DIR__ . '/../../app/controllers/transaksi/PusatTransaksiController.php';

$controller = new PusatTransaksiController();       //Membuat objek controller

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');     //Membaca URL Request

if ($uri === 'transaksi/pusat') {       //Routing ke index() – Halaman Daftar Transaksi
    $controller->index();
}
elseif ($uri === 'transaksi/pusat/tambah') {        //menampilkan form tambah transaksi.
    $controller->create();
}
elseif ($uri === 'transaksi/pusat/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {        //Routing ke store() – Simpan Data (POST)
    $controller->store();
}
elseif (preg_match('#^transaksi/pusat/hapus/(\d+)$#', $uri, $m)) {      //Routing ke delete($id) – Hapus Transaksi
    $controller->delete($m[1]);
}
elseif (preg_match('#^transaksi/pusat/edit/(\d+)$#', $uri, $m)) {       //Menampilkan form edit transaksi beserta datanya.
    $controller->edit($m[1]);
}
elseif (preg_match('#^transaksi/pusat/update/(\d+)$#', $uri, $m)        //Routing ke update($id) – Update Data (POST)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
elseif (preg_match('#^transaksi/pusat/update/(\d+)$#', $uri, $m)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
