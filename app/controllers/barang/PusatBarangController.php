<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/BarangModel.php';

class PusatBarangController
{
    private $render;
    private $barangModel;

    public function __construct()
    {
        $this->render = new RenderViewController();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data['title'] = "Manajemen Barang Pusat";
        $data['role'] = "Karyawan";
        
        // Karena tidak boleh ubah model, kita gunakan fungsi yang ada.
        // Asumsi fungsi getBarangByCabang(1) digunakan untuk melihat data.
        $data['barang'] = $this->barangModel->getBarangByCabang(1); 

        $this->render->render('barang/pusat/dashboard/index', $data);
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $param = [
                'nama_barang' => $_POST['nama_barang'],
                'satuan'      => $_POST['satuan'],
                'stok'        => $_POST['stok'],
                'id_cabang'   => 1
            ];
            if ($this->barangModel->tambah($param)) {
                header('Location: /barang/pusat/dashboard');
                exit;
            }
        }
    }

    // TAMBAHKAN FUNGSI EDIT INI (Penyebab Error Baris 22)
    public function edit($id)
    {
        $data['title'] = "Edit Barang Pusat";
        $data['role'] = "Karyawan";
        // Menggunakan getById yang sudah ada di BarangModel
        $data['barang'] = $this->barangModel->getById($id);

        if (!$data['barang']) {
            die("Data tidak ditemukan!");
        }

        $this->render->render('barang/pusat/dashboard/update', $data);
    }

    // TAMBAHKAN JUGA FUNGSI PROSES_EDIT
    public function proses_edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_barang'];
            $param = [
                'nama_barang' => $_POST['nama_barang'],
                'satuan'      => $_POST['satuan'],
                'stok'        => $_POST['stok']
            ];
            if ($this->barangModel->update($id, $param)) {
                header('Location: /barang/pusat/dashboard');
                exit;
            }
        }
    }

    // TAMBAHKAN JUGA FUNGSI HAPUS
    public function hapus($id)
    {
        if ($this->barangModel->hapus($id)) {
            header('Location: /barang/pusat/dashboard');
            exit;
        }
    }
}