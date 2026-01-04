<div class="card card-custom">
    <div class="card-body">
        <h4 class="mb-4">Tambah Cabang</h4>

        <form method="POST" action="/dashboard/pusat/store">
            <div class="mb-3">
                <label>Nama Cabang</label>
                <input type="text" name="nama_cabang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kota</label>
                <input type="text" name="kota" class="form-control">
            </div>

            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat_cabang" class="form-control" required></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/dashboard/pusat" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
