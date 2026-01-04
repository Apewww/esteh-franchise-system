<?php

require_once __DIR__ . '/Model.php';

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';

    public function getByTransaksi($id_transaksi)       //Mengambil detail transaksi berdasarkan ID transaksi tertentu.
    {   //Query SQL
        $sql = "
            SELECT 
                p.nama_produk,
                d.jumlah,
                d.subtotal
            FROM detail_transaksi d
            JOIN produk p ON p.id_produk = d.id_produk
            WHERE d.id_transaksi = :id_transaksi
        ";

        $stmt = $this->db->prepare($sql);               //Prepared Statement
        $stmt->execute(['id_transaksi' => $id_transaksi]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);       //Return Data
    }

    public function deleteByTransaksi($id_transaksi)    //Menghapus seluruh detail transaksi berdasarkan ID transaksi.
    {
        $sql = "DELETE FROM detail_transaksi WHERE id_transaksi = :id";     //Query SQL
        $stmt = $this->db->prepare($sql);               //Eksekusi Query
        $stmt->execute(['id' => $id_transaksi]);
    }
}
