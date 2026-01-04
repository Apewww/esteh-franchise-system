<div class="topbar position-relative d-flex align-items-center">

    <!-- KIRI -->
    <div class="d-flex align-items-center gap-3">
        <i class="bi bi-list fs-4" style="cursor:pointer;"></i>
        <strong><?= $title ?? 'Transaksi'; ?></strong>
    </div>

    <!-- TENGAH -->
    <div class="search-wrapper mx-auto">
        <i class="bi bi-search search-icon"></i>
        <input type="text" class="form-control search-input" placeholder="Search">
    </div>

    <!-- KANAN -->
    <div class="d-flex align-items-center gap-3">
        <?php if (!empty($addUrl)): ?>
            <a href="<?= $addUrl ?>" class="btn btn-light btn-add">
                Tambah
            </a>
        <?php endif; ?>
        <div class="avatar"></div>
    </div>

</div>
