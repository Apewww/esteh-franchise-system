<?php
require_once __DIR__ . '/Model.php';

class BarangModel extends Model {
    
    // Mengambil semua barang milik cabang tertentu
    public function getBarangByCabang($id_cabang) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id_cabang = ?");
        $stmt->execute([$id_cabang]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil satu data barang untuk ditampilkan di form Update
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id_barang = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambah data barang baru
    public function tambah($data) {
        try {
            $sql = "INSERT INTO barang (nama_barang, satuan, stok, id_cabang) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $data['nama_barang'],
                $data['satuan'],
                $data['stok'],
                $data['id_cabang']
            ]);
        } catch (PDOException $e) {
            die("Gagal Simpan: " . $e->getMessage()); 
        }
    }

    // Mengubah data barang yang sudah ada
    public function update($id, $data) {
        $sql = "UPDATE barang SET nama_barang = ?, satuan = ?, stok = ? WHERE id_barang = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_barang'],
            $data['satuan'],
            $data['stok'],
            $id
        ]);
    }

    // Menghapus data barang
    public function hapus($id) {
        $sql = "DELETE FROM barang WHERE id_barang = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}