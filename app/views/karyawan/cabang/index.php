<div class="card card-custom shadow-sm">
    <div class="card-body">

        <h5 class="mb-4">Manajemen Karyawan</h5>

        <!-- FORM TAMBAH DATA -->
        <form method="POST" action="/karyawan/cabang/add" class="row g-3 align-items-end mb-4">

            <div class="col-md-3">
                <input type="text" name="nama_karyawan"
                       class="form-control"
                       placeholder="Nama Karyawan" required>
            </div>

            <div class="col-md-3">
                <select class="form-control" disabled>
                    <option value="Karyawan" selected>Karyawan</option>
                </select>
                <input type="hidden" name="jabatan" value="Karyawan">
            </div>

            <input type="text" name="id_cabang" class="form-control" placeholder="Cabang" value="<?= $_SESSION['id_cabang'] ?>" required hidden>

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
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/karyawan/cabang/editIndex/<?= $t['id_karyawan']; ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="/karyawan/cabang/delete/<?= $t['id_karyawan']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        Delete
                                    </a>
                                </div>
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