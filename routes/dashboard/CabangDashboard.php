<?php
switch($uri) {
    case 'dashboard/cabang':
        require BASE_PATH . '/app/controllers/dashboard/CabangDashboardController.php';
        (new CabangDashboardController)->index();
        exit;
    case 'dashboard/cabang/add':
        require BASE_PATH . '/app/controllers/dashboard/CabangDashboardController.php';
        (new CabangDashboardController)->addProduk();
        exit;
    case 'dashboard/cabang/addProsses':
        require BASE_PATH . '/app/controllers/dashboard/CabangDashboardController.php';
        (new CabangDashboardController)->addProsses();
        exit;
}