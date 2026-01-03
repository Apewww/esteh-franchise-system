<?php

require_once __DIR__ . '/../RenderViewController.php';

class CabangKaryawanController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = 'Owner';

        $this->render->render('karyawan/cabang/index', $data);
    }

}