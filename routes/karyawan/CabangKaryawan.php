<?php

require_once __DIR__ . '/../../app/controllers/karyawan/CabangKaryawanController.php';

$controller = new CabangKaryawanController();       //Membuat objek Controller

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');     //Membaca URL Request

if ($uri === 'karyawan/cabang') {      
    $controller->index();
} elseif ($uri === 'karyawan/cabang/tambah') {     
    $controller->create();
} elseif ($uri === 'karyawan/cabang/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {     
    $controller->store();
}
elseif (preg_match('#^karyawan/cabang/hapus/(\d+)$#', $uri, $m)) {     
    $controller->delete($m[1]);
}
elseif (preg_match('#^karyawan/cabang/edit/(\d+)$#', $uri, $m)) {      
    $controller->edit($m[1]);
}
elseif (preg_match('#^karyawan/cabang/update/(\d+)$#', $uri, $m)       
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
