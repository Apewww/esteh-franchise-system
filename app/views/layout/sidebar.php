<?php
$role = $role ?? 'Owner';
$current_page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

function setActive($uri, $current) {
    return ($current == $uri) ? 'active' : '';
}
?>

<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="/assets/img/logo.png" alt="Logo Es Teh">
        <span class="logo-text">Es Teh</span>
    </div>

    <div class="sidebar-menu">

        <?php if ($role == 'Franchisor'): ?>
            <!-- <small class="text-muted ms-3">Manajemen Pusat</small> -->
            <a href="/dashboard/pusat" class="<?= setActive('dashboard/pusat', $current_page) ?>">Dashboard</a>
            <a href="/barang/pusat/dashboard" class="<?= setActive('barang/pusat/dashboard', $current_page) ?>">Manajemen Barang</a>
            <a href="/barang/pusat/masuk" class="<?= setActive('barang/pusat/masuk', $current_page) ?>">Barang Masuk</a>
            <a href="/barang/pusat/keluar" class="<?= setActive('barang/pusat/keluar', $current_page) ?>">Barang Keluar</a>
            <a href="/transaksi/pusat" class="<?= setActive('transaksi/pusat', $current_page) ?>">Transaksi</a>

        <?php elseif ($role == 'Owner'): ?>
            <!-- <small class="text-muted ms-3">Operasional Cabang</small> -->
            <a href="/dashboard/cabang" class="<?= setActive('dashboard/cabang', $current_page) ?>">Dashboard</a>
            <a href="/barang/cabang/dashboard" class="<?= setActive('barang/cabang/dashboard"', $current_page) ?>">Manajemen Barang</a>
            <a href="/barang/cabang/masuk" class="<?= setActive('barang/cabang/masuk', $current_page) ?>">Barang Masuk</a>
            <a href="/barang/cabang/keluar" class="<?= setActive('barang/cabang/keluar', $current_page) ?>">Barang Keluar</a>
            <a href="/transaksi/cabang" class="<?= setActive('transaksi/cabang', $current_page) ?>">Transaksi</a>
            <a href="/karyawan/cabang" class="<?= setActive('karyawan/cabang', $current_page) ?>">Karyawan</a>

        <?php elseif ($role == 'Karyawan'): ?>
            <!-- <small class="text-muted ms-3">Operasional Cabang</small> -->
            <a href="/dashboard/cabang" class="<?= setActive('dashboard/cabang', $current_page) ?>">Dashboard</a>
            <a href="/barang/cabang/dashboard" class="<?= setActive('barang/cabang/dashboard"', $current_page) ?>">Manajemen Barang</a>
            <a href="/barang/cabang/masuk" class="<?= setActive('barang/cabang/masuk', $current_page) ?>">Barang Masuk</a>
            <a href="/barang/cabang/keluar" class="<?= setActive('barang/cabang/keluar', $current_page) ?>">Barang Keluar</a>
            <a href="/transaksi/cabang" class="<?= setActive('transaksi/cabang', $current_page) ?>">Transaksi</a>

        <?php endif; ?>

        <a href="/logout">Log out</a>

    </div>
</div>