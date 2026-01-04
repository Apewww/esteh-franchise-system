<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require_once BASE_PATH . '/routes/barang/CabangMasuk.php';
require_once BASE_PATH . '/routes/barang/PusatMasuk.php';
require_once BASE_PATH . '/routes/karyawan/CabangKaryawan.php';
require_once BASE_PATH . '/routes/karyawan/PusatKaryawan.php';
require_once BASE_PATH . '/routes/barang/CabangDasboard.php';
require_once BASE_PATH . '/routes/barang/PusatDashboard.php';
