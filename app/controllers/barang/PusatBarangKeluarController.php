<?php

require_once __DIR__ . '/../RenderViewController.php';

class PusatBarangKeluarController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = "Manajemen Barang Keluar";
        $data['role'] = "Franchisor";

        $this->render->render('barang/pusat/keluar/index', $data);
    }

}