<?php
require_once 'Model.php'; // Load base model

class BarangModel extends Model {
    
    public function getAllKeluar() {
        $stmt = $this->db->prepare("SELECT * FROM barang_keluar WHERE deleted != 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllKeluarPusat() {
        $stmt = $this->db->prepare("SELECT * FROM barang_keluar WHERE deleted != 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKeluarById($id_keluar) {
        $stmt = $this->db->prepare(
            "SELECT * FROM barang_keluar WHERE id_keluar = ?"
        );
        $stmt->execute([$id_keluar]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambahKeluar($id_cabang, $id_barang, $tujuan_barang, $jumlah) {
        $sql = "INSERT INTO barang_keluar (id_cabang, id_barang, tujuan_barang, jumlah) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_cabang, $id_barang, $tujuan_barang, $jumlah]);
    }

    public function editKeluar($id_keluar, $data) {
        $sql = "UPDATE barang_keluar 
                SET id_cabang = ?, id_barang = ?, tujuan_barang = ?, jumlah = ?
                WHERE id_keluar = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['id_cabang'],
            $data['id_barang'],
            $data['tujuan_barang'],
            $data['jumlah'],
            $id_keluar
        ]);
    }

    public function deleteKeluar($id_keluar) {
        $sql = "UPDATE barang_keluar
                SET deleted = 1 WHERE id_keluar = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id_keluar]);
    }

}