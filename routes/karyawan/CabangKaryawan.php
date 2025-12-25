<?php
switch ($uri) {
    case 'karyawan/cabang':
        require BASE_PATH . '/app/controllers/karyawan/CabangKaryawanController.php';
        (new CabangKaryawanController)->index();
        exit;
}