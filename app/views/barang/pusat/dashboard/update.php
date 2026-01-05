<div class="container mt-4">
    <div class="card shadow-sm col-md-6 mx-auto">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update Data Barang Pusat</h5>
        </div>
        <div class="card-body">
            <form action="/barang/pusat/proses_edit" method="POST">
                <input type="hidden" name="id_barang" value="<?= $data['barang']['id_barang']; ?>">
                
               <div class="mb-3">
                    <select name="id_cabang" id="id_cabang" class="form-control" required>
                        <option value="">-- Pilih Cabang --</option>

                        <?php foreach ($data['cabang'] as $cabang): ?>
                            <option value="<?= $cabang['id_cabang']; ?>"
                                <?= ($data['barang']['id_cabang'] == $cabang['id_cabang']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($cabang['nama_cabang']); ?>
                            </option>
                        <?php endforeach; ?>
                        
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label font-weight-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="<?= htmlspecialchars($data['barang']['nama_barang']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="<?= htmlspecialchars($data['barang']['satuan']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Stok Pusat Saat Ini</label>
                    <input type="number" name="stok" class="form-control" value="<?= htmlspecialchars($data['barang']['stok']); ?>" required>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="/barang/pusat/dashboard" class="btn btn-secondary">Batal / Kembali</a>
                    <button type="submit" class="btn btn-warning shadow-sm">Simpan Perubahan Pusat</button>
                </div>
            </form>
        </div>
    </div>
</div>