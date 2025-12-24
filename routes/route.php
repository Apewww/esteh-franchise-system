<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

switch ($uri) {

    case '':
        echo $uri;
        break;

    case 'login':
        require BASE_PATH . '/app/controllers/AuthController.php';
        (new AuthController)->login();
        break;

    default:
        http_response_code(404);
        require BASE_PATH . '/app/views/errors/404.php';
}
