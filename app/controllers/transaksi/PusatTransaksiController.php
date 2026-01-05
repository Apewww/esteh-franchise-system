<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/TransaksiModel.php';
require_once __DIR__ . '/../../models/DetailTransaksiModel.php';
require_once __DIR__ . '/../../models/TransaksiModel.php';

class PusatTransaksiController {
    private $render;
    private $transaksi;
    private $detail;
    private $produk;

    public function __construct(){                  
        $this->render = new RenderViewController();
        $this->transaksi = new TransaksiModel();
        $this->produk = new TransaksiModel();
        $this->detail = new DetailTransaksiModel();
    }

    public function index() {                   //Menampilkan Data Transaksi
        $data = [];
        $data['title'] = 'Transaksi';
        $data['transaksi'] = $this->transaksi->getAllWithProduk();
        $data['role'] = $_SESSION['role'];

        // 🔑 SAMA SEPERTI CABANG → tombol Tambah MUNCUL
        $data['addUrl'] = '/transaksi/pusat/tambah';

        $this->render->render('transaksi/pusat/index', $data);
    }

    public function create()                    //Menampilkan form input transaksi baru
    {
        $data = [];
        $data['title'] = 'Tambah Transaksi';
        $data['role'] = $_SESSION['role'];

        $this->render->render('transaksi/pusat/create', $data);
    }

    public function store()                     //Simpan Transaksi Baru
    {
        $data = [
            'id_cabang' => $_POST['id_cabang'], // pusat pilih cabang
            'total'     => $_POST['total']
        ];

        $this->transaksi->insert($data);

        header('Location: /transaksi/pusat');
        exit;
    }

    public function delete($id)                 //Hapus Transaksi
    {
        $this->transaksi->delete($id);
        header('Location: /transaksi/pusat');
        exit;
    }

    public function edit($id)                   //Menampilkan form edit transaksi
    {
        $data['transaksi'] = $this->transaksi->getById($id);
        $data['detail'] = $this->detail->getByTransaksi($id);
        $data['produk'] = $this->produk->getAll();

        $this->render->render('transaksi/pusat/edit', $data);
    }

    public function update($id)                 //Update Transaksi
    {
        // hapus detail lama
        $this->detail->deleteByTransaksi($id);

        $total = 0;

        foreach ($_POST['produk'] as $i => $id_produk) {        //Loop Produk
            $subtotal = $_POST['subtotal'][$i];
            $total += $subtotal;

            $this->detail->insert([             //Insert Detail Baru
                'id_transaksi' => $id,
                'id_produk' => $id_produk,
                'jumlah' => $_POST['jumlah'][$i],
                'subtotal' => $subtotal
            ]);
        }

        // update total transaksi
        $this->transaksi->updateTotal($id, $total);

        header('Location: /transaksi/pusat');
        exit;
    }
}
