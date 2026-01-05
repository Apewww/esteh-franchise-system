<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/BarangModel.php';

class CabangBarangController
{
    private $render;
    private $barangModel;

    public function __construct()
    {
        $this->render = new RenderViewController();
        $this->barangModel = new BarangModel();
    }

    // Halaman Utama (Tampil Data)
    public function index()
    {
        $id_cabang = $_SESSION['id_cabang'] ?? 1;
        $data['title'] = "Manajemen Barang Cabang";
        $data['role'] = $_SESSION['role'];
        $data['barang'] = $this->barangModel->getBarangByCabang($id_cabang);

        $this->render->render('barang/cabang/dashboard/index', $data);
    }

    // Proses Tambah Data
    public function tambah()
    {
        $id_cabang = $_SESSION['id_cabang'] ?? 1;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $param = [
                'nama_barang' => $_POST['nama_barang'],
                'satuan' => $_POST['satuan'],
                'stok' => $_POST['stok'],
                'id_cabang' => $id_cabang
            ];
            if ($this->barangModel->tambah($param)) {
                header('Location: /barang/cabang/dashboard');
                exit;
            }
        }
    }

    // Halaman Edit (Mencari data lalu menampilkan form update)
    public function edit($id)
    {
        $data['title'] = "Edit Barang";
        $data['role'] = "Karyawan";
        $data['barang'] = $this->barangModel->getById($id);

        if (!$data['barang']) {
            die("Data barang tidak ditemukan!");
        }

        $this->render->render('barang/cabang/dashboard/update', $data);
    }

    // Proses Update Data (Menyimpan perubahan ke DB)
    public function proses_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_barang'];
            $param = [
                'nama_barang' => $_POST['nama_barang'],
                'satuan' => $_POST['satuan'],
                'stok' => $_POST['stok']
            ];
            if ($this->barangModel->update($id, $param)) {
                header('Location: /barang/cabang/dashboard');
                exit;
            }
        }
    }

    // Proses Hapus Data
    public function hapus($id)
    {
        if ($this->barangModel->hapus($id)) {
            header('Location: /barang/cabang/dashboard');
            exit;
        }
    }
}