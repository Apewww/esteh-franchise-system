<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/KaryawanModel.php';

class PusatKaryawanController {
    private $render;
    private $karyawanModel;

    public function __construct() {
        $this->render = new RenderViewController();
        $this->karyawanModel = new KaryawanModel();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $action = $_POST['action'] ?? '';

        if (isset($_POST['action']) && $_POST['action'] === 'create') {
            $this->karyawanModel->insert([
                'nama_karyawan' => $_POST['nama_karyawan'],
                'jabatan'       => $_POST['jabatan'],
                'id_cabang'     => $_POST['id_cabang']
            ]);
        }

        if (isset($_POST['action']) && $_POST['action'] === 'update') {
            $this->karyawanModel->update(
                $_POST['id_karyawan'],
                $_POST
            );
        }

        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            $this->karyawanModel->delete($_POST['id_karyawan']);
        }

            header('Location: /karyawan/pusat');
            exit;
        }

        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = 'Karyawan';
        $data['karyawan'] = $this->karyawanModel->getKaryawanByCabang(1);

        $this->render->render('karyawan/pusat/index', $data);
    }

    public function create() {
    $data['title'] = 'Tambah Karyawan Pusat';
    $data['role']  = 'Admin';

    // cabang pusat (misal 1)
    $data['id_cabang'] = 1;

    $this->render->render('karyawan/pusat/tambah', $data);
    }

    public function store() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /karyawan/pusat');
        exit;
    }

    $this->karyawanModel->insert([
        'nama_karyawan' => $_POST['nama_karyawan'],
        'jabatan'       => $_POST['jabatan'],
        'id_cabang'     => $_POST['id_cabang'] // bisa 1 / pusat
    ]);

    header('Location: /karyawan/pusat');
    exit;
    }

    public function delete($id) {
    $this->karyawanModel->delete($id);
    header('Location: /karyawan/pusat');
    exit;
    }
}