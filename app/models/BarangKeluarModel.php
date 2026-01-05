<?php
require_once 'Model.php'; // Load base model

class BarangKeluarModel extends Model {
    
    public function getAllKeluar() {
        $stmt = $this->db->prepare("SELECT * FROM barang_keluar WHERE deleted != 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllKeluarPusat() {
        $sql = "SELECT bk.id_keluar,
                       bk.id_cabang,
                       c.nama_cabang,
                       bk.id_barang,
                       b.nama_barang,
                       bk.tujuan_barang,
                       bk.jumlah
                FROM barang_keluar bk
                INNER JOIN cabang c ON bk.id_cabang = c.id_cabang
                INNER JOIN barang b ON bk.id_barang = b.id_barang
                WHERE bk.deleted != 1
                ORDER BY bk.id_keluar DESC";
    
        $stmt = $this->db->prepare($sql);
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

    public function getBarangByCabang($id_cabang)
    {
        $stmt = $this->db->prepare(
            "SELECT id_barang, nama_barang 
             FROM barang 
             WHERE id_cabang = ? AND deleted != 1"
        );
        $stmt->execute([$id_cabang]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}