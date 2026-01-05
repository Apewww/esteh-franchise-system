<?php

require_once __DIR__ . '/Model.php';

class ProdukTransaksi extends Model         //Deklarasi Class & Properti Tabel
{
    protected $table = 'produk';

    public function getAll()            //Mengambil seluruh data produk dari database.
    {
        $sql = "SELECT * FROM produk ORDER BY nama_produk ASC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)           //Mengambil 1 data produk berdasarkan ID.
    {
        $sql = "SELECT * FROM produk WHERE id_produk = :id";
        $stmt = $this->db->prepare($sql);   //Prepared Statement
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);      //Return Data
    }
}