<?php

class AuthController
{
    private $userModel;

    public function __construct()
    {
        session_start();

        // model 
        require_once __DIR__ . '/../../models/UserModel.php';
        $this->userModel = new UserModel();
    }

    // TAMPILKAN HALAMAN LOGIN
    public function login()
    {
        require_once __DIR__ . '/../../views/auth/login.php';
    }

    // PROSES LOGIN
    public function processLogin()
    {
        // pastikan request POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        // validasi input kosong
        if ($username === '' || $password === '') {
            $_SESSION['error'] = 'Username dan password wajib diisi';
            header('Location: /login');
            exit;
        }

        $user = $this->userModel->findByUsername($username);

        // validasi user & password
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Username atau password salah';
            header('Location: /login');
            exit;
        }

        // set session
        $_SESSION['login']     = true;
        $_SESSION['id_user']   = $user['id_user'];
        $_SESSION['role']      = $user['role'];
        $_SESSION['id_cabang'] = $user['id_cabang'];

        // redirect berdasarkan role
        if ($user['role'] === 'pusat') {
            header('Location: /dashboard/pusat');
        } else {
            header('Location: /dashboard/cabang');
        }

        exit;
    }

    // LOGOUT
    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: /login');
        exit;
    }
}
