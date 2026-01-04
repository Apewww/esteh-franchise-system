<form action="/barang/cabang/keluar/add" method="POST" class="mb-4">
    <div class="row">
        <input type="text" name="id_barang" class="form-control" placeholder="ID Barang" required hidden>
        <div class="col"><input type="text" name="id_barang" class="form-control" placeholder="ID Barang" required></div>
        <div class="col"><input type="text" name="tujuan_barang" class="form-control" placeholder="Tujuan" required></div>
        <div class="col"><input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required></div>
        <div class="col"><button type="submit" class="btn btn-primary">Tambah Data</button></div>
    </div>
</form>

<div class="card card-custom">
    <div class="card-body">
        <table class="table align-middle text-center">
            <thead>
                <tr>
                    <th>ID Keluar</th>
                    <th>ID Barang</th>
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
                            <td><?= $row['id_barang']; ?></td>
                            <td><?= $row['tujuan_barang']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/barang/cabang/keluar/edit/<?= $row['id_keluar']; ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="/barang/cabang/keluar/delete/<?= $row['id_keluar']; ?>"
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