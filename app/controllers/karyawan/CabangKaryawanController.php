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

            header('Location: /karyawan/cabang');
            exit;
        }

        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = 'Owner';
        $data['karyawan'] = $this->karyawanModel->getKaryawanByCabang(1);

        $this->render->render('karyawan/cabang/index', $data);
    }

    public function create() {
        $data['title'] = 'Tambah Karyawan Cabang';
        $data['role']  = 'Owner';

        // kalau cabang aktif = 2
        $data['id_cabang'] = 2;

        $this->render->render('karyawan/cabang/tambah', $data);
    }

    public function store() {
    // pastikan request POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /karyawan/cabang');
        exit;
    }

    // validasi minimal
    if (
        empty($_POST['nama_karyawan']) ||
        empty($_POST['jabatan']) ||
        empty($_POST['id_cabang'])
    ) {
        header('Location: /karyawan/cabang');
        exit;
    }

    // simpan ke database
    $this->karyawanModel->insert([
        'nama_karyawan' => $_POST['nama_karyawan'],
        'jabatan'       => $_POST['jabatan'],
        'id_cabang'     => $_POST['id_cabang']
    ]);

    // kembali ke halaman utama
    header('Location: /karyawan/cabang');
    exit;
    }

    public function delete($id) {
    $this->karyawanModel->delete($id);
    header('Location: /karyawan/cabang');
    exit;
    }
}       