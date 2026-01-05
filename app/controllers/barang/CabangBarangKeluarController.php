<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/BarangKeluarModel.php';

class CabangBarangKeluarController {
    private $render;
    private $barangKeluarModel;

    public function  __construct() {
        $this->render = new RenderViewController();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function index() {
        $data['title'] = "Manajemen Barang Keluar";
        $data['role'] = $_SESSION['role'];
        $data['barang_keluar'] = $this->barangKeluarModel->getAllKeluar();

        $this->render->render('barang/cabang/keluar/index', $data);
    }

    public function addBarangkeluar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_barang = $_POST['id_barang'];
            $id_cabang = $_POST['id_cabang'];
            $tujuan = $_POST['tujuan_barang'];
            $jumlah = $_POST['jumlah'];

            if ($this->barangKeluarModel->tambahKeluar($id_cabang, $id_barang, $tujuan, $jumlah)) {
                header('Location: /barang/cabang/keluar');
            }
        }
    }

    public function editIndex($id_keluar) {
        $data['title'] = "Manajemen Barang Keluar";
        $data['role'] = 'Karyawan';
        $data['barang_keluar'] = $this->barangKeluarModel->getKeluarById($id_keluar);

        $this->render->render('barang/cabang/keluar/edit', $data);
    }

    public function editProssesBarangkeluar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_keluar = $_POST['id_keluar'];
            $id_cabang = $_POST['id_cabang'];
            $id_barang = $_POST['id_barang'];
            $tujuan    = $_POST['tujuan_barang'];
            $jumlah    = $_POST['jumlah'];

            // echo $id_keluar;
            // echo $id_barang;
            // echo $tujuan;
            // echo $jumlah;

            $result = $this->barangKeluarModel->editKeluar($id_keluar, [
                'id_cabang'     => $id_cabang,
                'id_barang'     => $id_barang,
                'tujuan_barang' => $tujuan,
                'jumlah'        => $jumlah
            ]);

            if ($result) {
                header('Location: /barang/cabang/keluar');
                exit;
            } else {
                echo "Gagal mengupdate data";
            }
        }
    }

    public function deleteBarangkeluar($id_keluar) {
        $result = $this->barangKeluarModel->deleteKeluar($id_keluar);
        if ($result) {
            header('Location: /barang/cabang/keluar');
            exit;
        } else {
            echo "Gagal mengupdate data";
        }
    }


}
?>