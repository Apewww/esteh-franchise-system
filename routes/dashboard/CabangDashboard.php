<?php
switch($uri) {
    case 'dashboard/cabang':
        require BASE_PATH . '/app/controllers/dashboard/cabang/CabangDashboardController.php';
        (new CabangDashboardController)->index();
        exit;
}