<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require_once BASE_PATH . '/routes/auth/auth.php';
require_once BASE_PATH . '/routes/dashboard/PusatDashboard.php';