<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/TransaksiModel.php';
require_once __DIR__ . '/../../models/DetailTransaksiModel.php';
require_once __DIR__ . '/../../models/ProdukModel.php';

class CabangTransaksiController
{
    private $render;
    private $transaksi;
    private $detail;

    public function __construct()
    {
        $this->render = new RenderViewController();
        $this->transaksi = new TransaksiModel();
        $this->produk = new ProdukModel();
        $this->detail = new DetailTransaksiModel();
    }

    public function index()
    {
        $id_cabang = 1;

        $data = [];
        $data['title'] = 'Transaksi';
        $data['transaksi'] = $this->transaksi->getByCabang($id_cabang);

        // 🔑 INI YANG MEMUNCULKAN TOMBOL TAMBAH
        $data['addUrl'] = '/transaksi/cabang/tambah';

        $this->render->render('transaksi/cabang/index', $data);
    }

    public function create()
    {
        $data = [];
        $data['title'] = 'Tambah Transaksi';

        $this->render->render('transaksi/cabang/create', $data);
    }

    public function store()
    {
        $data = [
            'id_cabang' => 1,
            'total' => $_POST['total']
        ];

        $this->transaksi->insert($data);
        header('Location: /transaksi/cabang');
        exit;
    }

    public function getByCabangWithProduk($id_cabang)
    {
        $sql = "
            SELECT 
                t.id_transaksi,
                t.tanggal_transaksi,
                GROUP_CONCAT(p.nama_produk SEPARATOR ', ') AS produk,
                t.total
            FROM transaksi t
            LEFT JOIN detail_transaksi d ON d.id_transaksi = t.id_transaksi
            LEFT JOIN produk p ON p.id_produk = d.id_produk
            WHERE t.id_cabang = :id_cabang
            GROUP BY t.id_transaksi
            ORDER BY t.tanggal_transaksi ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_cabang' => $id_cabang]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $this->transaksi->delete($id);
        header('Location: /transaksi/cabang');
        exit;
    }

    public function edit($id)
    {
        $data['transaksi'] = $this->transaksi->find($id);
        $data['detail'] = $this->detail->getByTransaksi($id);
        $data['produk'] = $this->produk->getAll();

        $this->render->render('transaksi/cabang/edit', $data);
    }

    public function update($id)
    {
        // hapus detail lama
        $this->detail->deleteByTransaksi($id);

        $total = 0;

        foreach ($_POST['produk'] as $i => $id_produk) {
            $subtotal = $_POST['subtotal'][$i];
            $total += $subtotal;

            $this->detail->insert([
                'id_transaksi' => $id,
                'id_produk' => $id_produk,
                'jumlah' => $_POST['jumlah'][$i],
                'subtotal' => $subtotal
            ]);
        }

        // update total transaksi
        $this->transaksi->updateTotal($id, $total);

        header('Location: /transaksi/cabang');
        exit;
    }

}
