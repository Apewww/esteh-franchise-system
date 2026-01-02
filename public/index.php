<?php
session_start();

define('BASE_PATH', dirname(__DIR__));

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// ROUTER UTAMA
require BASE_PATH . '/routes/route.php';

