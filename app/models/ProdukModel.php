<?php

require_once 'Model.php';

class ProdukModel extends Model {

    public function getAllProduk() {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE deleted != 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertProduk($nama, $harga, $id_cabang) {
        $sql = "INSERT INTO produk (id_cabang, nama_produk, harga) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_cabang, $nama, $harga]);

        return $this->db->lastInsertId();
    }

    public function updateGambar($id_produk, $nama_file) {
        $sql = "UPDATE produk SET gambar = ? WHERE id_produk = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nama_file, $id_produk]);
    }

    public function addProduk($data) {
        $sql = "INSERT INTO produk (nama, harga, gambar)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['nama'],
            $data['harga'],
            $data['gambar']
        ]);
    }

}
