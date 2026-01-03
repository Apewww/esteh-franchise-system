<?php

require_once __DIR__ . '/../RenderViewController.php';

class CabangBarangController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = "Manajemen Barang";
        $data['role'] = "Karyawan";

        $this->render->render('barang/cabang/dashboard/index', $data);
    }

}