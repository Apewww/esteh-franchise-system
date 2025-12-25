<?php
switch ($uri) {
    case 'login':
        require BASE_PATH . '/app/controllers/auth/AuthController.php';
        (new AuthController)->index();
        exit;
}
