<?php

require_once BASE_PATH . '/app/controllers/dashboard/PusatDashboardController.php';

switch ($uri) {

    // DASHBOARD UTAMA
    case 'dashboard/pusat':
        (new PusatDashboardController)->index();
        exit;

    // CREATE
    case 'dashboard/pusat/create':
        (new PusatDashboardController)->create();
        exit;

    // STORE (POST)
    case 'dashboard/pusat/store':
        (new PusatDashboardController)->store();
        exit;

    // EDIT
    case (preg_match('/^dashboard\/pusat\/edit\/(\d+)$/', $uri, $matches) ? true : false):
        (new PusatDashboardController)->edit($matches[1]);
        exit;

    // UPDATE (POST)
    case (preg_match('/^dashboard\/pusat\/update\/(\d+)$/', $uri, $matches) ? true : false):
        (new PusatDashboardController)->update($matches[1]);
        exit;

    // DELETE
    case (preg_match('/^dashboard\/pusat\/delete\/(\d+)$/', $uri, $matches) ? true : false):
        (new PusatDashboardController)->delete($matches[1]);
        exit;
}
