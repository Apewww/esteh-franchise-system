<?php
switch ($uri) {
    case 'dashboard/cabang':
        require BASE_PATH . '/app/controllers/dashboard/CabangDashboardController.php';
        (new CabangDashboardController)->index();
        exit;
}