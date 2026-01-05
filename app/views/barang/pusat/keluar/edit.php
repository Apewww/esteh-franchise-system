<div class="container-fluid">
    <h4 class="mb-4">Edit Barang Keluar</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="/barang/pusat/keluar/editProsses">

                <!-- ID Keluar (hidden, wajib) -->
                <input type="hidden" name="id_keluar" value="<?= $barang_keluar['id_keluar']; ?>">

                <!-- ID Barang -->
                <div class="mb-3">
                    <select name="id_cabang" id="id_cabang" class="form-control" required>
                        <option value="">-- Pilih Cabang --</option>
                
                        <?php foreach ($data['cabang'] as $cabang): ?>
                            <option value="<?= $cabang['id_cabang']; ?>"
                                <?= ($data['barang_keluar']['id_cabang'] == $cabang['id_cabang']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($cabang['nama_cabang']); ?>
                            </option>
                        <?php endforeach; ?>
                        
                    </select>
                </div>


                <!-- ID Barang -->
                <div class="mb-3">
                    <label class="form-label">Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php 
                        foreach ($data['barang'] as $barang) : ?>
                            <option value="<?= $barang['id_barang']; ?>" 
                                <?= ($barang['id_barang'] == $barang_keluar['id_barang']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($barang['nama_barang']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Tujuan Barang -->
                <div class="mb-3">
                    <label class="form-label">Tujuan Barang</label>
                    <input type="text"
                           name="tujuan_barang"
                           class="form-control"
                           value="<?= $barang_keluar['tujuan_barang']; ?>"
                           required>
                </div>

                <!-- Jumlah -->
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number"
                           name="jumlah"
                           class="form-control"
                           min="1"
                           value="<?= $barang_keluar['jumlah']; ?>"
                           required>
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="/barang/pusat/keluar" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
