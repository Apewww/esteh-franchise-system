<?php
require_once 'Model.php'; // Load base model

class BarangModel extends Model {
    
    // Ambil semua data barang keluar
    public function getAllKeluar() {
        $stmt = $this->db->prepare("SELECT * FROM barang_keluar");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Simpan data barang keluar baru
    public function tambahKeluar($id_barang, $tujuan_barang, $jumlah) {
        $sql = "INSERT INTO barang_keluar (id_barang, tujuan_barang, jumlah) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_barang, $tujuan_barang, $jumlah]);
    }
}