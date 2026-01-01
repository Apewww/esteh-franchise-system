<?php
$current_page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
// echo($current_page);
?>

<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="logo-esteh.png" alt="Logo Es Teh">
    </div>

    <div class="sidebar-menu">
        <a href="/dashboard/cabang" class="<?= ($current_page == '/dashboard/cabang') ? 'active' : '' ?>">Produk</a>
        <a href="/barang/cabang/dashboard" class="<?= ($current_page == '#') ? 'active' : '' ?>">Manajemen Barang</a>
        <a href="/barang/cabang/masuk" class="<?= ($current_page == 'barang/cabang/masuk') ? 'active' : '' ?>">Barang Masuk</a>
        <a href="/barang/cabang/keluar" class="<?= ($current_page == 'barang/cabang/keluar') ? 'active' : '' ?>">Barang Keluar</a>
        <a href="/transaksi/cabang" class="<?= ($current_page == '#') ? 'active' : '' ?>">Transaksi</a>
        <a href="/karyawan/cabang" class="<?= ($current_page == '#') ? 'active' : '' ?>">Manajemen Karyawan</a>
    </div>
</div>