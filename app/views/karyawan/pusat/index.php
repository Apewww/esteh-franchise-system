<div class="card card-custom shadow-sm">
    <div class="card-body">

        <h5 class="mb-4">Manajemen Karyawan</h5>

        <!-- FORM TAMBAH DATA -->
        <form method="post" class="row g-3 align-items-end mb-4">

            <!-- penting: action create -->
            <input type="hidden" name="action" value="create">

            <div class="col-md-3">
                <input type="text" name="nama_karyawan"
                       class="form-control"
                       placeholder="Nama Karyawan" required>
            </div>

            <div class="col-md-3">
                <input type="text" name="jabatan"
                       class="form-control"
                       placeholder="Jabatan" required>
            </div>

            <div class="col-md-3">
                <input type="text" name="id_cabang"
                       class="form-control"
                       placeholder="Cabang" value="1" required>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">
                    Tambah Data
                </button>
            </div>

        </form>

        <!-- TABEL -->
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead style="background:#e5e5e5;">
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Cabang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php if (!empty($karyawan)): ?>
                    <?php foreach ($karyawan as $t): ?>
                        <tr>
                            <td><?= $t['id_karyawan']; ?></td>
                            <td><?= $t['nama_karyawan']; ?></td>
                            <td><?= $t['jabatan']; ?></td>
                            <td><?= $t['id_cabang']; ?></td>
                            <td>

                                <!-- EDIT -->
                                <form method="post" style="display:inline">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="id_karyawan" value="<?= $t['id_karyawan']; ?>">
                                    <input type="hidden" name="nama_karyawan" value="<?= $t['nama_karyawan']; ?>">
                                    <input type="hidden" name="jabatan" value="<?= $t['jabatan']; ?>">
                                    <input type="hidden" name="id_cabang" value="<?= $t['id_cabang']; ?>">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </form>

                                <!-- DELETE -->
                                <form method="post" style="display:inline">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id_karyawan" value="<?= $t['id_karyawan']; ?>">
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini?')">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Data karyawan belum ada</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>