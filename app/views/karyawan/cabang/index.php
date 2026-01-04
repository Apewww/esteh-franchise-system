<div class="card card-custom">
    <div class="card-body">

        <table class="table text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Cabang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($karyawan as $t): ?>
                        <tr>
                            <td><?= $t['id_karyawan'] ?></td>
                            <td><?= $t['nama_karyawan'] ?></td>
                            <td><?= $t['jabatan'] ?? '-' ?></td>
                            <td><?= $t['id_cabang'] ?></td>
                            <td>
                                <a href="/karyawan/cabang/edit/<?= $t['id_karyawan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                </a>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>