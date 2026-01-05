<form action="/barang/pusat/keluar/add" method="POST" class="mb-4">
    <div class="row g-2 align-items-center">

        <div class="col-md-3">
            <select name="id_cabang" id="id_cabang" class="form-control" required>
                <option value="">-- Pilih Cabang --</option>
                <?php foreach ($data['cabang'] as $c) : ?>
                    <option value="<?= $c['id_cabang']; ?>">
                        <?= $c['nama_cabang']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="id_barang" id="id_barang" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
            </select>
        </div>

        <div class="col-md-2">
            <input type="text"
                   name="tujuan_barang"
                   class="form-control"
                   placeholder="Tujuan"
                   required>
        </div>

        <div class="col-md-2">
            <input type="number"
                   name="jumlah"
                   class="form-control"
                   placeholder="Jumlah"
                   min="1"
                   required>
        </div>

        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">
                Tambah Data
            </button>
        </div>

    </div>
</form>


<div class="card card-custom">
    <div class="card-body">
        <table class="table align-middle text-center">
            <thead>
                <tr>
                    <th>ID Keluar</th>
                    <th>Cabang</th>
                    <th>Barang</th>
                    <th>Tujuan</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['barang_keluar'])) : ?>
                    <?php foreach ($data['barang_keluar'] as $row) : ?>
                        <tr>
                            <td><?= $row['id_keluar']; ?></td>
                            <td><?= $row['nama_cabang']; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= $row['tujuan_barang']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/barang/pusat/keluar/edit/<?= $row['id_keluar']; ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="/barang/pusat/keluar/delete/<?= $row['id_keluar']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">Data Kosong</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>