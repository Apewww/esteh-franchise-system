<?php

require_once __DIR__ . '/../RenderViewController.php';

class PusatDashboardController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }


    public function index() {
        $data['title'] = 'Dashboard';
        $data['role'] = 'Franchisor';

        $this->render->render('dashboard/pusat/index', $data);
    }
}