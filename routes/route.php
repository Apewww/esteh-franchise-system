<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');


if (!empty($_SESSION)) {
    // Jika sudah login dan mencoba akses root (halaman utama)
    if ($uri === '') {
        if ($_SESSION['role'] === "Franchisor") {
            header("Location: /dashboard/pusat");
            exit;
        } else {
            header("Location: /dashboard/cabang");
            exit;
        }
    }
} else {
    // Jika BELUM login dan halaman yang diakses BUKAN halaman login
    // Pastikan '/login' disesuaikan dengan path login Anda
    if ($uri !== 'login' && $uri !== 'login/process') { 
        header("Location: /login");
        exit;
    }
}

require_once BASE_PATH . '/routes/barang/CabangMasuk.php';
require_once BASE_PATH . '/routes/barang/PusatMasuk.php';
require_once BASE_PATH . '/routes/karyawan/CabangKaryawan.php';
require_once BASE_PATH . '/routes/barang/CabangDasboard.php';
require_once BASE_PATH . '/routes/barang/PusatDashboard.php';
require_once BASE_PATH . '/routes/barang/PusatKeluar.php';
require_once BASE_PATH . '/routes/barang/PusatMasuk.php';
require_once BASE_PATH . '/routes/transaksi/CabangTransaksi.php';
require_once BASE_PATH . '/routes/transaksi/PusatTransaksi.php';
require_once BASE_PATH . '/routes/auth/auth.php';
require_once BASE_PATH . '/routes/dashboard/PusatDashboard.php';
require_once BASE_PATH . '/routes/dashboard/CabangDashboard.php';
