<?php

require_once __DIR__ . '/../../app/controllers/transaksi/CabangTransaksiController.php';

$controller = new CabangTransaksiController();      //Membuat objek Controller

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');     //Membaca URL Request

if ($uri === 'transaksi/cabang') {      //Routing ke index() – Halaman Daftar Transaksi
    $controller->index();
} elseif ($uri === 'transaksi/cabang/tambah') {     //Routing ke store() – Simpan Data (POST)
    $controller->create();
} elseif ($uri === 'transaksi/cabang/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {     //Routing ke delete($id) – Hapus Transaksi
    $controller->store();
}
elseif (preg_match('#^transaksi/cabang/hapus/(\d+)$#', $uri, $m)) {     //Routing ke edit($id) – Form Edit
    $controller->delete($m[1]);
}
elseif (preg_match('#^transaksi/cabang/edit/(\d+)$#', $uri, $m)) {      //Routing ke update($id) – Update Data (POST)
    $controller->edit($m[1]);
}
elseif (preg_match('#^transaksi/cabang/update/(\d+)$#', $uri, $m)       //menangani proses UPDATE transaksi cabang
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
elseif (preg_match('#^transaksi/cabang/update/(\d+)$#', $uri, $m)
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
