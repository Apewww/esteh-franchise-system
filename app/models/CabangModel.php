<?php

// Memanggil class Model (parent) yang berisi koneksi database (PDO)
require_once __DIR__ . '/Model.php';

class CabangModel extends Model
{
    // ================= AMBIL SEMUA DATA CABANG =================
    public function getAll()
    {
        // Query SQL untuk mengambil semua data cabang
        // Data diurutkan berdasarkan id_cabang secara ascending
        $sql = "SELECT * FROM cabang ORDER BY id_cabang ASC";

        // Menyiapkan query menggunakan PDO (prepare)
        $stmt = $this->db->prepare($sql);

        // Menjalankan query
        $stmt->execute();

        // Mengembalikan semua data dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ================= AMBIL DATA CABANG BERDASARKAN ID =================
    public function findById($id)
    {
        // Query SQL dengan parameter agar aman dari SQL Injection
        $sql = "SELECT * FROM cabang WHERE id_cabang = :id";

        // Menyiapkan query
        $stmt = $this->db->prepare($sql);

        // Menjalankan query dengan parameter ID
        $stmt->execute(['id' => $id]);

        // Mengembalikan satu data cabang dalam bentuk array asosiatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================= INSERT DATA CABANG =================
    public function insert($data)
    {
        // Query SQL untuk menambahkan data cabang baru
        // Kolom jenis_cabang di-set otomatis sebagai 'cabang'
        $sql = "INSERT INTO cabang 
                (nama_cabang, kota, no_telp, alamat_cabang, jenis_cabang)
                VALUES 
                (:nama_cabang, :kota, :no_telp, :alamat_cabang, 'cabang')";

        // Menyiapkan query
        $stmt = $this->db->prepare($sql);

        // Menjalankan query dengan data dari form
        return $stmt->execute([
            'nama_cabang'   => $data['nama_cabang'],   // Nama cabang
            'kota'          => $data['kota'],          // Kota cabang
            'no_telp'       => $data['no_telp'],       // Nomor telepon
            'alamat_cabang' => $data['alamat_cabang'] // Alamat cabang
        ]);
    }

    // ================= UPDATE DATA CABANG =================
    public function update($id, $data)
    {
        // Query SQL untuk memperbarui data cabang berdasarkan ID
        $sql = "UPDATE cabang 
                SET nama_cabang = :nama_cabang,
                    kota = :kota,
                    no_telp = :no_telp,
                    alamat_cabang = :alamat_cabang
                WHERE id_cabang = :id";

        // Menyiapkan query
        $stmt = $this->db->prepare($sql);

        // Menjalankan query dengan data baru
        return $stmt->execute([
            'id'            => $id,                    // ID cabang
            'nama_cabang'   => $data['nama_cabang'],   // Nama cabang baru
            'kota'          => $data['kota'],          // Kota baru
            'no_telp'       => $data['no_telp'],       // Nomor telepon baru
            'alamat_cabang' => $data['alamat_cabang'] // Alamat baru
        ]);
    }

    // ================= DELETE DATA CABANG =================
    public function delete($id)
    {
        // Query SQL untuk menghapus data cabang berdasarkan ID
        $sql = "DELETE FROM cabang WHERE id_cabang = :id";

        // Menyiapkan query
        $stmt = $this->db->prepare($sql);

        // Menjalankan query penghapusan
        return $stmt->execute(['id' => $id]);
    }
}
