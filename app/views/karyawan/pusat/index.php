        <div class="card card-custom">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Manajemen Karyawan Pusat</h5>
                    <a href="/karyawan/pusat/tambah" class="btn btn-dark btn-sm">
                        Tambah
                    </a>
                </div>
                <table class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Cabang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($karyawan)) : ?>
                            <?php foreach ($karyawan as $t) : ?>
                                <tr>
                                    <td><?= $t['id_karyawan']; ?></td>
                                    <td><?= $t['nama_karyawan']; ?></td>
                                    <td><?= $t['jabatan']; ?></td>
                                    <td><?= $t['id_cabang']; ?></td>
                                    <td>
                                        <a href="/karyawan/pusat/edit/<?= $t['id_karyawan']; ?>" 
                                        class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <a href="/karyawan/pusat/hapus/<?= $t['id_karyawan']; ?>" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus karyawan ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">Data karyawan pusat belum tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>