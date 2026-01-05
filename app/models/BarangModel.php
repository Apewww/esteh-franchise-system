<?php
require_once __DIR__ . '/Model.php';

class BarangModel extends Model {
    
    // Mengambil semua data barang masuk
    public function getAllBarangMasuk() {
        $stmt = $this->db->prepare("SELECT * FROM barang_masuk ORDER BY id_masuk DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambah data barang masuk baru
    public function tambah($data) {
        $sql = "INSERT INTO barang_masuk (tanggal_masuk, id_barang, jumlah, sumber_barang) 
                VALUES (:tanggal, :id_barang, :jumlah, :sumber)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'tanggal' => $data['tanggal'],
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah'],
            'sumber' => $data['sumber']
        ]);
    }

    // Mengupdate data barang masuk berdasarkan ID
    public function update($id, $data) {
        $sql = "UPDATE barang_masuk 
                SET tanggal_masuk = :tanggal, id_barang = :id_barang, jumlah = :jumlah, sumber_barang = :sumber 
                WHERE id_masuk = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'tanggal' => $data['tanggal'],
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah'],
            'sumber' => $data['sumber'],
            'id' => $data['id']
        ]);
    }

    // Menghapus data barang masuk berdasarkan ID
    public function hapus($id) {
        $sql = "DELETE FROM barang_masuk WHERE id_masuk = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}