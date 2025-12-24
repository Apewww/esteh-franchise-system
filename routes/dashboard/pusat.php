<?php
switch ($uri) {
    case 'dashboard/pusat':
        require BASE_PATH . '/app/controllers/PusatDashboardController.php';
        (new PusatDashboardController)->index();
        exit;
}