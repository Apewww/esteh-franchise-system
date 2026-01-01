<?php

require_once  __DIR__ . '/../RenderViewController.php';

class CabangTransaksiController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = 'Transaksi';
        $data['role'] = 'Karyawan';

        $this->render->render('transaksi/cabang/index', $data);
    }

}