<div class="card card-custom">
    <div class="card-body">
        <h4 class="mb-4">Edit Cabang</h4>

        <form method="POST" action="/dashboard/pusat/update/<?= $cabang['id_cabang']; ?>">
            <div class="mb-3">
                <label>Nama Cabang</label>
                <input type="text" name="nama_cabang" class="form-control"
                       value="<?= htmlspecialchars($cabang['nama_cabang']); ?>" required>
            </div>

            <div class="mb-3">
                <label>Kota</label>
                <input type="text" name="kota" class="form-control"
                       value="<?= htmlspecialchars($cabang['kota']); ?>">
            </div>

            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control"
                       value="<?= htmlspecialchars($cabang['no_telp']); ?>">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat_cabang" class="form-control" required><?= htmlspecialchars($cabang['alamat_cabang']); ?></textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/dashboard/pusat" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
