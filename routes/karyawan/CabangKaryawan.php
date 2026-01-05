<?php
switch($uri) {
    case 'karyawan/cabang':
        require BASE_PATH . '/app/controllers/karyawan/CabangKaryawanController.php';
        (new CabangKaryawanController)->index();
        exit;
    case 'karyawan/cabang/add':
        require BASE_PATH . '/app/controllers/karyawan/CabangKaryawanController.php';
        (new CabangKaryawanController)->add();
        exit;
    case (preg_match('#^karyawan/cabang/editIndex/(\d+)$#', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/karyawan/CabangKaryawanController.php';
        (new CabangKaryawanController)->editIndex($matches[1]);
        exit;
    case 'karyawan/cabang/editProsses':
        require BASE_PATH . '/app/controllers/karyawan/CabangKaryawanController.php';
        (new CabangKaryawanController)->editProsses();
        exit;
    case (preg_match('#^karyawan/cabang/delete/(\d+)$#', $uri, $matches) ? true : false):
        require BASE_PATH . '/app/controllers/karyawan/CabangKaryawanController.php';
        (new CabangKaryawanController)->delete($matches[1]);
        exit;
}