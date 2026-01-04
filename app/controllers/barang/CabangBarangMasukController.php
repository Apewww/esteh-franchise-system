<?php

require_once __DIR__ . '/../RenderViewController.php';

class CabangBarangMasukController {
    private $render;

    public function __construct() {
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = 'Barang Masuk';
        $data['role'] = 'Karyawan';
        
        $this->render->render('barang/cabang/masuk/index', $data);
    }

}