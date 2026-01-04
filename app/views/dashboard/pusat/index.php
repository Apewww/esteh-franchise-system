<div class="card card-custom">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="/dashboard/pusat/create" class="btn btn-success">
                + Tambah Cabang
            </a>
        </div>
        <table class="table table-bordered table-striped align-middle text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Cabang</th>
                    <th>Kota</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($cabang)): ?>
                <?php foreach ($cabang as $row): ?>
                    <tr>
                        <td><?= $row['id_cabang']; ?></td>
                        <td><?= htmlspecialchars($row['nama_cabang']); ?></td>
                        <td><?= htmlspecialchars($row['kota']); ?></td>
                        <td><?= htmlspecialchars($row['no_telp']); ?></td>
                        <td><?= htmlspecialchars($row['alamat_cabang']); ?></td>
                        <td>
                            <a href="/dashboard/pusat/edit/<?= $row['id_cabang']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <a href="/dashboard/pusat/delete/<?= $row['id_cabang']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus cabang ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Data cabang belum tersedia</td>
                </tr>
            <?php endif; ?>
            </tbody>

        </table>

    </div>
</div>
