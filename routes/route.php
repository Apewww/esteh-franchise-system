<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require_once BASE_PATH . '/routes/barang/CabangKeluar.php';
require_once BASE_PATH . '/routes/barang/PusatKeluar.php';
require_once BASE_PATH . '/routes/dashboard/CabangDashboard.php';