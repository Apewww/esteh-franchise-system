<?php
require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/KaryawanModel.php';

class CabangKaryawanController {
    private $render;
    private $karyawanModel;

    public function __construct(){
        $this->render = new RenderViewController();
        $this->karyawanModel = new KaryawanModel();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_POST['id_karyawan'])) {
            $this->model->update($_POST['id_karyawan'], $_POST);
            }

            else {
            $this->model->insert($_POST);
            }

            header('Location: /karyawan/cabang');
            exit;
        }

        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = 'Owner';
        $data['karyawan'] = $this->karyawanModel->getKaryawanByCabang(1);

        $this->render->render('karyawan/cabang/index', $data);
    }
}       