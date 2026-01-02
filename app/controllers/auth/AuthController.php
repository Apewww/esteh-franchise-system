<?php

class AuthController
{
    private $userModel;

    public function __construct()
    {
        // Session cukup sekali
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Load model
        require_once __DIR__ . '/../../models/UserModel.php';
        $this->userModel = new UserModel();
    }

    // ======================
    // TAMPILKAN HALAMAN LOGIN
    // ======================
    public function login()
    {
        // Jika sudah login, langsung ke index dashboard
        if (isset($_SESSION['login'])) {
            if ($_SESSION['role'] === 'pusat') {
                header('Location: /dashboard/pusat');
            } else {
                header('Location: /dashboard/cabang');
            }
            exit;
        }

        require_once __DIR__ . '/../../views/auth/login.php';
    }

    // ======================
    // PROSES LOGIN
    // ======================
    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        echo ($username);
        $password = $_POST['password'] ?? '';

        if ($username === '' || $password === '') {
            $_SESSION['error'] = 'Username dan password wajib diisi';
            header('Location: /login');
            exit;
        }

        $user = $this->userModel->findByUsername($username);

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Username atau password salah';
            header('Location: /login');
            exit;
        }

        // ======================
        // SET SESSION LOGIN
        // ======================
        $_SESSION['login']     = true;
        $_SESSION['id_user']   = $user['id_user'];
        $_SESSION['role']      = $user['role'];
        $_SESSION['id_cabang'] = $user['id_cabang'];

        // ======================
        // MASUK KE INDEX DASHBOARD
        // ======================
        if ($user['role'] === 'pusat') {
            header('Location: /dashboard/pusat');   // index pusat
        } else {
            header('Location: /dashboard/cabang');  // index cabang
        }
        exit;
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
