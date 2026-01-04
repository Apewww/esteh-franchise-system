<?php

require_once __DIR__ . '/Model.php';

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';

    public function getByTransaksi($id_transaksi)
    {
        $sql = "
            SELECT 
                p.nama_produk,
                d.jumlah,
                d.subtotal
            FROM detail_transaksi d
            JOIN produk p ON p.id_produk = d.id_produk
            WHERE d.id_transaksi = :id_transaksi
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_transaksi' => $id_transaksi]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByTransaksi($id_transaksi)
    {
        $sql = "DELETE FROM detail_transaksi WHERE id_transaksi = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id_transaksi]);
    }
}
