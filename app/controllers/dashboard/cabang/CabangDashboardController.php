<?php

require_once __DIR__ . '/../../RenderViewController.php';

class CabangDashboardController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = "Dashboard";
        $data['role'] = "Karyawan";

        $this->render->render('dashboard/cabang/index', $data);
    }

}