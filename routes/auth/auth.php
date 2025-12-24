<?php
switch ($uri) {
    case 'login':
        require BASE_PATH . '/app/controllers/AuthController.php';
        (new AuthController)->index();
        exit;
}
