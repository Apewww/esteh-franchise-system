<?php

// Controller untuk render view (layout, header, footer, dll)
require_once __DIR__ . '/../RenderViewController.php';

// Model untuk mengelola data cabang (CRUD)
require_once __DIR__ . '/../../models/CabangModel.php';

class PusatDashboardController
{
    // Objek untuk render tampilan
    private $render;

    // Objek model cabang
    private $cabangModel;

    // ================= CONSTRUCTOR =================
    public function __construct()
    {
        // Menjalankan session jika belum aktif
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Inisialisasi controller render view
        $this->render = new RenderViewController();

        // Inisialisasi model cabang
        $this->cabangModel = new CabangModel();

        // ================= PROTEKSI LOGIN =================
        // Jika belum login, arahkan ke halaman login
        if (!isset($_SESSION['login'])) {
            header('Location: /login');
            exit;
        }

        // ================= PROTEKSI ROLE =================
        // Jika user bukan role pusat, arahkan ke dashboard cabang
        if ($_SESSION['role'] !== 'Franchisor') {
            header('Location: /dashboard/cabang');
            exit;
        }
    }

    // ================= DASHBOARD UTAMA =================
    public function index()
    {
        // Data yang akan dikirim ke view
        $data = [
            'title'  => 'Dashboard Pusat',              // Judul halaman
            'role'   => $_SESSION['role'],              // Role user
            'cabang' => $this->cabangModel->getAll()    // Ambil semua data cabang
        ];

        // Render halaman dashboard pusat
        $this->render->render('dashboard/pusat/index', $data);
    }

    // ================= HALAMAN TAMBAH CABANG =================
    public function create()
    {
        // Data untuk halaman tambah cabang
        $data = [
            'title' => 'Tambah Cabang',
            'role'  => $_SESSION['role'],
        ];

        // Render halaman create cabang
        $this->render->render('dashboard/pusat/create', $data);
    }

    // ================= HALAMAN EDIT CABANG =================
    public function edit($id)
    {
        // Mengambil data cabang berdasarkan ID
        $cabang = $this->cabangModel->findById($id);

        // Jika data cabang tidak ditemukan
        if (!$cabang) {
            header('Location: /dashboard/pusat');
            exit;
        }

        // Data yang dikirim ke halaman edit
        $data = [
            'title'  => 'Edit Cabang',
            'role'   => $_SESSION['role'],
            'cabang' => $cabang
        ];

        // Render halaman edit cabang
        $this->render->render('dashboard/pusat/edit', $data);
    }

    // ================= SIMPAN DATA CABANG =================
    public function store()
    {
        // Menyimpan data cabang baru ke database
        $this->cabangModel->insert($_POST);

        // Kembali ke dashboard pusat
        header('Location: /dashboard/pusat');
        exit;
    }

    // ================= UPDATE DATA CABANG =================
    public function update($id)
    {
        // Memperbarui data cabang berdasarkan ID
        $this->cabangModel->update($id, $_POST);

        // Kembali ke dashboard pusat
        header('Location: /dashboard/pusat');
        exit;
    }

    // ================= HAPUS DATA CABANG =================
    public function delete($id)
    {
        // Menghapus data cabang berdasarkan ID
        $this->cabangModel->delete($id);

        // Kembali ke dashboard pusat
        header('Location: /dashboard/pusat');
        exit;
    }
}
