<div class="container mt-4">
    <div class="card shadow-sm col-md-6 mx-auto">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update Data Barang</h5>
        </div>
        <div class="card-body">
            <form action="/barang/cabang/proses_edit" method="POST">
                <input type="hidden" name="id_barang" value="<?= $data['barang']['id_barang']; ?>">
                
                <input type="text" name="id_cabang" class="form-control" value="<?= $_SESSION['id_cabang'] ?>" required hidden>
                
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="<?= htmlspecialchars($data['barang']['nama_barang']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="<?= htmlspecialchars($data['barang']['satuan']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Stok Saat Ini</label>
                    <input type="number" name="stok" class="form-control" value="<?= htmlspecialchars($data['barang']['stok']); ?>" required>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="/barang/cabang/dashboard" class="btn btn-secondary">Batal / Kembali</a>
                    <button type="submit" class="btn btn-warning shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>