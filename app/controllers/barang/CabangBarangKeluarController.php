<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/PusatBarangModel.php';

class CabangBarangMasukController {
    private $render;
    private $barangModel;

    public function __construct() {
        $this->render = new RenderViewController();
        $this->barangModel = new PusatBarangModel();
    }

    public function index() {
        $data['title'] = 'Barang Masuk';
        $data['role'] = 'Karyawan';
        $data['barangMasuk'] = $this->barangModel->getAllBarangMasuk();
        $this->render->render('barang/cabang/masuk/index', $data);
    }

    public function tambah($postData) {
        $data = [
            'tanggal' => $postData['tanggal_masuk'],
            'id_barang' => $postData['id_barang'],
            'jumlah' => $postData['jumlah'],
            'sumber' => $postData['sumber_barang']
        ];
        $this->barangModel->tambah($data);
        header("Location: /barang/cabang/masuk");
        exit();
    }

    public function edit($id, $postData) {
        $data = [
            'tanggal' => $postData['tanggal_masuk'],
            'id_barang' => $postData['id_barang'],
            'jumlah' => $postData['jumlah'],
            'sumber' => $postData['sumber_barang']
        ];
        $this->barangModel->update($id, $data);
        header("Location: /barang/cabang/masuk");
        exit();
    }

    public function hapus($id) {
        $this->barangModel->hapus($id);
        header("Location: /barang/cabang/masuk");
        exit();
    }
}