<?php

class AuthController
{
    // Properti untuk menampung objek UserModel
    private $userModel;

    // ================= CONSTRUCTOR =================
    public function __construct()
    {
        // Mengecek apakah session sudah berjalan atau belum
        // Session hanya dijalankan sekali agar tidak error
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // mengambil data user dari database
        require_once __DIR__ . '/../../models/UserModel.php';

        // Membuat objek UserModel agar bisa dipakai di method lain
        $this->userModel = new UserModel();
    }

    // ================= HALAMAN LOGIN =================
    public function login()
    {
        // Jika user sudah login
        if (isset($_SESSION['login'])) {

            // Jika role pusat, arahkan ke dashboard pusat
            if ($_SESSION['role'] === 'pusat') {
                header('Location: /dashboard/pusat');
            } 
            // Jika role cabang, arahkan ke dashboard cabang
            else {
                header('Location: /dashboard/cabang');
            }

            // Hentikan proses setelah redirect
            exit;
        }

        // Jika belum login, tampilkan halaman login
        require_once __DIR__ . '/../../views/auth/login.php';
    }

    // ================= PROSES LOGIN =================
    public function processLogin()
    {
        // Pastikan request menggunakan metode POST
        // Jika tidak, kembalikan ke halaman login
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }

        // Mengambil input username dan menghapus spasi di awal dan akhir
        $username = trim($_POST['username'] ?? '');

        // Debug (opsional) untuk mengecek isi username
        echo ($username);

        // Mengambil input password
        $password = $_POST['password'] ?? '';

        // Validasi jika username atau password kosong
        if ($username === '' || $password === '') {
            $_SESSION['error'] = 'Username dan password wajib diisi';
            header('Location: /login');
            exit;
        }

        // Mengambil data user berdasarkan username
        $user = $this->userModel->findByUsername($username);

        // Jika user tidak ditemukan atau password tidak sesuai
        if (!$user || $password != $user['password']) {
            $_SESSION['error'] = 'Username atau password salah';
            header('Location: /login');
            exit;
        }

        // ================= SET SESSION LOGIN =================
        $_SESSION['login']     = true;               // Status login
        $_SESSION['id_user']   = $user['id_user'];   // ID user
        $_SESSION['role']      = $user['role'];      // Role user (pusat/cabang)
        $_SESSION['id_cabang'] = $user['id_cabang']; // ID cabang user

        // ================= REDIRECT DASHBOARD =================
        // Jika role pusat, masuk ke dashboard pusat
        if ($user['role'] === 'pusat') {
            header('Location: /dashboard/pusat');
        } 
        // Jika role cabang, masuk ke dashboard cabang
        else {
            header('Location: /dashboard/cabang');
        }

        // Hentikan eksekusi setelah redirect
        exit;
    }

    // ================= LOGOUT =================
    public function logout()
    {
        // Menghapus seluruh data session
        session_destroy();

        // Kembali ke halaman login
        header('Location: /login');
        exit;
    }
}
