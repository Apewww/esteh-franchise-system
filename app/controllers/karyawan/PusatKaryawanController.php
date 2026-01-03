<?php

require_once __DIR__ . '/../RenderViewController.php';

class PusatKaryawanController {
    private $render;

    public function __construct() {
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = 'Karyawan';

        $this->render->render('karyawan/pusat/index', $data);
    }

}