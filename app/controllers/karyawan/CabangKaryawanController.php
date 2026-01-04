<?php
require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/KaryawanModel.php';

class CabangKaryawanController {
    private $render;

    public function __construct(){
        $this->render = new RenderViewController();
    }

    public function index() {
        $id_cabang = $_GET['id'] ?? 1; // default cabang 1

        $model = new KaryawanModel();
        $karyawan = $model->getKaryawanByCabang($id_cabang);

        $this->render->render('karyawan/cabang/index', $data);

        require_once __DIR__ . '/../../views/karyawan/cabang/index.php';
    }
}       