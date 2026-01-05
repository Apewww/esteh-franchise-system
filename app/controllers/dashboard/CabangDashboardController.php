<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/ProdukModel.php';

class CabangDashboardController {
    private $render;
    private $produkModel;

    public function __construct(){
        $this->render = new RenderViewController();
        $this->produkModel = new ProdukModel();
    }

    public function index() {
        $data['title'] = "Produk";
        $data['role'] = $_SESSION['role'];
        $data['produk'] = $this->produkModel->getAllProduk();

        $this->render->render('dashboard/cabang/index', $data);
    }

    public function addProduk() {
        $data['title'] = "Produk";
        $data['role'] = $_SESSION['role'];

        $this->render->render('dashboard/cabang/add', $data);
    }

    public function addProsses() {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Location: /dashboard/cabang/add');
            exit;
        }

        // echo "halo";

        $nama  = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $id_cabang = $_SESSION['id_cabang'];

        $id_produk = $this->produkModel->insertProduk($nama, $harga, $id_cabang);

        if (!empty($_FILES['gambar']['name'])) {

            $folder = BASE_PATH . '/public/uploads/produk/';
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            $namaFile = $id_produk . '.' . $ext;

            move_uploaded_file(
                $_FILES['gambar']['tmp_name'],
                $folder . $namaFile
            );

            $this->produkModel->updateGambar($id_produk, $namaFile);
        }

        header('Location: /dashboard/cabang');
        exit;
    }

}