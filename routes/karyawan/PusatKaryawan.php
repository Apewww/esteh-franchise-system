<?php
switch ($uri) {
    case 'karyawan/pusat':
        require BASE_PATH . '/app/controllers/karyawan/PusatKaryawanController.php';
        (new PusatKaryawanController)->index();
        exit;
}