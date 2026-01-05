<div class="container-fluid mt-4">
    <button type="button" class="btn btn-primary mb-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Barang
    </button>

    <div class="card card-custom shadow-sm">
        <div class="card-body">
            <table class="table align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Total Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['barang']) && is_array($data['barang'])) : ?>
                        <?php $no = 1; foreach ($data['barang'] as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['nama_barang']); ?></td>
                                <td><?= htmlspecialchars($row['satuan']); ?></td>
                                <td><strong><?= htmlspecialchars($row['stok']); ?></strong></td>
                                <td>
                                    <a href="/barang/pusat/edit/<?= $row['id_barang']; ?>" class="btn btn-sm btn-warning">Update</a>
                                    <a href="/barang/pusat/hapus/<?= $row['id_barang']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini dari database pusat?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-muted">Data barang pusat tidak tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <form action="/barang/pusat/tambah" method="POST">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Form Tambah Barang</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Cabang</label>
                        <select name="id_cabang" id="id_cabang" class="form-control" required>
                            <option value="">-- Pilih Cabang --</option>
                            <?php foreach ($data['cabang'] as $cabang): ?>
                                <option value="<?= $cabang['id_cabang']; ?>">
                                    <?= htmlspecialchars($cabang['nama_cabang']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Satuan</label>
                        <input type="text" name="satuan" class="form-control" placeholder="Kg" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Stok Awal Pusat</label>
                        <input type="number" name="stok" class="form-control" placeholder="0" required>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="tambah_barang" class="btn btn-primary">Simpan ke Pusat</button>
                </div>
            </form>
        </div>
    </div>
</div>