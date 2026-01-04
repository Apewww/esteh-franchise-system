<?php

require_once __DIR__ . '/Model.php';

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    // Ambil semua transaksi (PUSAT)
    public function getAll()
    {
        $sql = "SELECT * FROM transaksi ORDER BY tanggal_transaksi DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil transaksi berdasarkan cabang
    public function getByCabang($id_cabang)
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE id_cabang = :id_cabang
                ORDER BY tanggal_transaksi DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_cabang' => $id_cabang]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambah transaksi
    public function insert($data)
    {
        $sql = "INSERT INTO transaksi (id_cabang, total)
                VALUES (:id_cabang, :total)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
        'id_cabang' => $data['id_cabang'],
        'total'     => $data['total']
    ]);
    }

    public function getAllWithProduk()
    {
        $sql = "
            SELECT 
                t.id_transaksi,
                t.tanggal_transaksi,
                GROUP_CONCAT(p.nama_produk SEPARATOR ', ') AS produk,
                t.total,
                t.id_cabang
            FROM transaksi t
            LEFT JOIN detail_transaksi d ON d.id_transaksi = t.id_transaksi
            LEFT JOIN produk p ON p.id_produk = d.id_produk
            GROUP BY t.id_transaksi
            ORDER BY t.tanggal_transaksi ASC
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM transaksi WHERE id_transaksi = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM transaksi WHERE id_transaksi = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTotal($id, $total)
    {
        $sql = "UPDATE transaksi SET total = :total WHERE id_transaksi = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'total' => $total,
            'id' => $id
        ]);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM transaksi WHERE id_transaksi = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
