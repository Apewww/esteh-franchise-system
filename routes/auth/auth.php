<?php

require_once BASE_PATH . '/app/controllers/auth/AuthController.php';

switch ($uri) {

    // HALAMAN LOGIN
    case 'login':
        (new AuthController)->login();
        exit;

    // PROSES LOGIN
    case 'login/process':
        (new AuthController)->processLogin();
        exit;

    // LOGOUT
    case 'logout':
        (new AuthController)->logout();
        exit;
}
