<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require_once BASE_PATH . '/routes/transaksi/CabangTransaksi.php';
require_once BASE_PATH . '/routes/transaksi/PusatTransaksi.php';