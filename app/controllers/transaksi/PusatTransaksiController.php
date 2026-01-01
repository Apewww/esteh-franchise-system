<?php

require_once BASE_PATH . '../RenderViewController.php';

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