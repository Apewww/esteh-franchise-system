<div class="card card-custom shadow-sm">
    <div class="card-body">

        <!-- 🔹 JUDUL -->
        <h5 class="mb-4">Manajemen Karyawan Pusat</h5>

        <!-- 🔹 FORM TAMBAH KARYAWAN PUSAT -->
        <form method="post" class="row g-3 align-items-end mb-4">

            <input type="hidden" name="action" value="create">

            <div class="col-md-4">
                <input type="text" name="nama_karyawan"
                       class="form-control"
                       placeholder="Nama Karyawan" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="jabatan"
                       class="form-control"
                       placeholder="Jabatan" required>
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    Tambah Data
                </button>
            </div>

        </form>

        <!-- 🔹 TABEL DATA -->
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead style="background-color:#e5e5e5;">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($karyawan as $k): ?>
                    <tr>
                        <td><?= $k['nama_karyawan']; ?></td>
                        <td><?= $k['jabatan']; ?></td>
                        <td>

                            <!-- 🔸 EDIT -->
                            <form method="post" style="display:inline">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id_karyawan"
                                       value="<?= $k['id_karyawan']; ?>">
                                <input type="hidden" name="nama_karyawan"
                                       value="<?= $k['nama_karyawan']; ?>">
                                <input type="hidden" name="jabatan"
                                       value="<?= $k['jabatan']; ?>">

                                <button class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </form>

                            <!-- 🔸 DELETE -->
                            <form method="post" style="display:inline">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id_karyawan"
                                       value="<?= $k['id_karyawan']; ?>">

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus karyawan ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
