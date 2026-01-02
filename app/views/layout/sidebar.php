<?php
$current_page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

function setActive($uri, $current) {
    return ($current == $uri) ? 'active' : '';
}
?>

<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="logo-esteh.png" alt="Logo Es Teh">
    </div>

    <div class="sidebar-menu">

        <?php if ($role == 'pusat'): ?>
            <!-- <small class="text-muted ms-3">Manajemen Pusat</small> -->
            <a href="#" class="<?= setActive('#', $current_page) ?>">Dashboard</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Manajemen Barang</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Barang Masuk</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Barang Keluar</a>

        <?php elseif ($role == 'Owner'): ?>
            <!-- <small class="text-muted ms-3">Operasional Cabang</small> -->
            <a href="#" class="<?= setActive('#', $current_page) ?>">Dashboard</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Manajemen Barang</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Barang Masuk</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Barang Keluar</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Karyawan</a>

        <?php elseif ($role == 'Karyawan'): ?>
            <!-- <small class="text-muted ms-3">Operasional Cabang</small> -->
            <a href="#" class="<?= setActive('#', $current_page) ?>">Dashboard</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Manajemen Barang</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Barang Masuk</a>
            <a href="#" class="<?= setActive('#', $current_page) ?>">Barang Keluar</a>

        <?php endif; ?>

    </div>
</div>