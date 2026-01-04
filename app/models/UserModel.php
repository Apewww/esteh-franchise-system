<?php

// Memanggil class Model (parent) yang berisi koneksi database menggunakan PDO
require_once __DIR__ . '/Model.php';

class UserModel extends Model
{
    // ================= AMBIL DATA USER BERDASARKAN USERNAME =================
    public function findByUsername($username)
    {
        // Query SQL untuk mengambil data user berdasarkan username
        // LIMIT 1 digunakan karena username bersifat unik
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";

        // Menyiapkan query menggunakan PDO untuk mencegah SQL Injection
        $stmt = $this->db->prepare($sql);

        // Menjalankan query dengan parameter username
        $stmt->execute(['username' => $username]);

        // Mengembalikan satu data user dalam bentuk array asosiatif
        // Jika tidak ditemukan, hasilnya false
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
