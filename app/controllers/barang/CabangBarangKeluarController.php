<?php

require_once __DIR__ . '/../RenderViewController.php';

class CabangBarangKeluarController {
    private $render;

    public function  __construct() {
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = "Manajemen Barang Keluar";
        $data['role'] = 'Karyawan';

        $this->render->render('barang/cabang/keluar/index', $data);
    }
}
?>