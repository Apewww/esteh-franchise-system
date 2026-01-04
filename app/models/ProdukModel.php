<?php

require_once __DIR__ . '/Model.php';

class ProdukModel extends Model
{
    protected $table = 'produk';

    public function getAll()
    {
        $sql = "SELECT * FROM produk ORDER BY nama_produk ASC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM produk WHERE id_produk = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
