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
        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = $_SESSION['role'];
        $data['karyawan'] = $this->karyawanModel->getKaryawanByCabang($_SESSION['id_cabang']);

        $this->render->render('karyawan/cabang/index', $data);
    }

    public function editIndex($id_karyawan) {
        $data['title'] = 'Manajemen Karyawan';
        $data['role'] = $_SESSION['role'];
        $data['karyawan'] = $this->karyawanModel->getById($id_karyawan);
        
        $this->render->render('karyawan/cabang/edit', $data);
    }

    public function add() {
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
    $result = $this->karyawanModel->insert([
        'nama_karyawan' => $_POST['nama_karyawan'],
        'jabatan'       => $_POST['jabatan'],
        'id_cabang'     => $_POST['id_cabang']
    ]);

    // kembali ke halaman utama
    if($result) {
        header('Location: /karyawan/cabang');
        exit;
    } else {
        echo "Terjadi kesalahan!";
        exit;
    }
    }

    public function editProsses() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari POST
            $id_karyawan = $_POST['id_karyawan'];
            $data = [
                'id_cabang'     => $_POST['id_cabang'],
                'nama_karyawan' => $_POST['nama_karyawan'],
                'jabatan'       => $_POST['jabatan']
            ];

        // Memanggil model
        $result = $this->karyawanModel->update($id_karyawan, $data);

        if ($result) {
            // Jika berhasil, redirect
            header('Location: /karyawan/cabang');
            exit;
        } else {
            // Jika gagal
            echo "Gagal mengupdate data. Silakan cek koneksi database atau query Anda.";
        }
    }
    }

    public function delete($id) {
        $this->karyawanModel->delete($id);
        header('Location: /karyawan/cabang');
        exit;
    }
}       