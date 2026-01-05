<div class="card mb-4">
    <div class="card-body">
        <form action="/barang/cabang/masuk/tambah" method="POST">
            <div class="row">
                <div class="col-md-3"><input type="date" name="tanggal_masuk" class="form-control" required></div>
                <div class="col-md-3"><input type="text" name="id_barang" class="form-control" placeholder="ID Barang" required></div>
                <div class="col-md-2"><input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required></div>
                <div class="col-md-3"><input type="text" name="sumber_barang" class="form-control" placeholder="Sumber" required></div>
                <div class="col-md-1"><button type="submit" class="btn btn-primary">Tambah</button></div>
            </div>
        </form>
    </div>
</div>

<div class="card card-custom">
    <div class="card-body">
        <table class="table align-middle text-center">
            <thead>
                <tr>
                    <th>ID Masuk</th>
                    <th>Tanggal</th>
                    <th>ID Barang</th>
                    <th>Jumlah</th>
                    <th>Sumber</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($barangMasuk)): 
                    foreach ($barangMasuk as $bm): ?>
                    <tr>
                        <td><?= $bm['id_masuk'] ?></td>
                        <td><?= $bm['tanggal_masuk'] ?></td>
                        <td><?= $bm['id_barang'] ?></td>
                        <td><?= $bm['jumlah'] ?></td>
                        <td><?= $bm['sumber_barang'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="showEditModal(<?= htmlspecialchars(json_encode($bm)) ?>)">Edit</button>
                            <a href="/barang/cabang/masuk/hapus/<?= $bm['id_masuk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEdit" method="POST">
                <div class="modal-header"><h5>Edit Data</h5></div>
                <div class="modal-body">
                    <input type="date" name="tanggal_masuk" id="edit_tanggal" class="form-control mb-2">
                    <input type="text" name="id_barang" id="edit_id_barang" class="form-control mb-2">
                    <input type="number" name="jumlah" id="edit_jumlah" class="form-control mb-2">
                    <input type="text" name="sumber_barang" id="edit_sumber" class="form-control mb-2">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showEditModal(data) {
    document.getElementById('formEdit').action = '/barang/cabang/masuk/edit/' + data.id_masuk;
    document.getElementById('edit_tanggal').value = data.tanggal_masuk;
    document.getElementById('edit_id_barang').value = data.id_barang;
    document.getElementById('edit_jumlah').value = data.jumlah;
    document.getElementById('edit_sumber').value = data.sumber_barang;
    new bootstrap.Modal(document.getElementById('modalEdit')).show();
}
</script>