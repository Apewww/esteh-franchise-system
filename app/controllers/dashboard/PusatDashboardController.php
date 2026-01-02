<?php

require_once __DIR__ . '/../RenderViewController.php';
require_once __DIR__ . '/../../models/CabangModel.php';

class PusatDashboardController
{
    private $render;
    private $cabangModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        $this->render = new RenderViewController();
        $this->cabangModel = new CabangModel();

        // PROTEKSI LOGIN
        if (!isset($_SESSION['login'])) {
            header('Location: /login');
            exit;
        }

        // PROTEKSI ROLE
        if ($_SESSION['role'] !== 'pusat') {
            header('Location: /dashboard/cabang');
            exit;
        }
    }

    // DASHBOARD UTAMA
    public function index()
    {
        $data = [
            'title'  => 'Dashboard Pusat',
            'role'   => $_SESSION['role'],
            'cabang' => $this->cabangModel->getAll()
        ];

        $this->render->render('dashboard/pusat/index', $data);
    }

    // HALAMAN CREATE
    public function create()
    {
        $data = [
            'title' => 'Tambah Cabang',
            'role'   => $_SESSION['role'],
        ];

        $this->render->render('dashboard/pusat/create', $data);
    }

    // HALAMAN EDIT
    public function edit($id)
    {
        $cabang = $this->cabangModel->findById($id);

        if (!$cabang) {
            header('Location: /dashboard/pusat');
            exit;
        }

        $data = [
            'title'  => 'Edit Cabang',
            'role'   => $_SESSION['role'],
            'cabang' => $cabang
        ];

        $this->render->render('dashboard/pusat/edit', $data);
    }

    // SIMPAN DATA 
    public function store()
    {
        $this->cabangModel->insert($_POST);
        header('Location: /dashboard/pusat');
        exit;
    }

    // UPDATE DATA
    public function update($id)
    {
        $this->cabangModel->update($id, $_POST);
        header('Location: /dashboard/pusat');
        exit;
    }

    // DELETE DATA
    public function delete($id)
    {
        $this->cabangModel->delete($id);
        header('Location: /dashboard/pusat');
        exit;
    }
}
