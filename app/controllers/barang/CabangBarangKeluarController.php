<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/BarangModel.php';

class CabangBarangKeluarController {
    private $render;
    private $barangModel;

    public function  __construct() {
        $this->render = new RenderViewController();
        $this->barangModel = new BarangModel();
    }

    public function index() {
        $data['title'] = "Manajemen Barang Keluar";
        $data['role'] = 'Karyawan';
        $data['barang_keluar'] = $this->barangModel->getAllKeluar();

        $this->render->render('barang/cabang/keluar/index', $data);
    }

    public function addBarangkeluar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_barang = $_POST['id_barang'];
            $tujuan = $_POST['tujuan_barang'];
            $jumlah = $_POST['jumlah'];

            if ($this->barangModel->tambahKeluar($id_barang, $tujuan, $jumlah)) {
                header('Location: /barang/cabang/keluar');
            }
        }
    }
}
?>