<?php

require_once __DIR__ . '/../RenderViewController.php';

class PusatBarangMasukController {
    private $render;

    public function __construct() {
        $this->render = new RenderViewController();
    }

    public function index() {
        $data['title'] = 'Barang Masuk';
        $data['role'] = 'Franchisor';

        $this->render->render('barang/pusat/masuk/index', $data);
    }

}