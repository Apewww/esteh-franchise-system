<?php

require_once BASE_PATH . '/app/controllers/karyawan/PusatKaryawanController.php';

$controller = new PusatKaryawanController();

$controller = new PusatKaryawanController();       

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');     

if ($uri === 'karyawan/pusat') {      
    $controller->index();
} elseif ($uri === 'karyawan/pusat/tambah') {     
    $controller->create();
} elseif ($uri === 'karyawan/pusat/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {     
    $controller->store();
}
elseif (preg_match('#^karyawan/pusat/hapus/(\d+)$#', $uri, $m)) {     
    $controller->delete($m[1]);
}
elseif (preg_match('#^karyawan/pusat/edit/(\d+)$#', $uri, $m)) {      
    $controller->edit($m[1]);
}
elseif (preg_match('#^karyawan/pusat/update/(\d+)$#', $uri, $m)       
        && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($m[1]);
}
