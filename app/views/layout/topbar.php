<div class="topbar position-relative">
    <div class="d-flex align-items-center gap-3">
        <i class="bi bi-list fs-4" id="toggleSidebar" style="cursor:pointer;"></i>
        <strong><?= isset($title) ? $title : 'Dashboard'; ?></strong>
    </div>

    <div class="search-wrapper">
        <i class="bi bi-search search-icon"></i>
        <input type="text" class="form-control search-input" placeholder="Cari...">
    </div>

    <div class="d-flex align-items-center gap-3 ms-auto">
        <div class="avatar"></div>
    </div>
</div>