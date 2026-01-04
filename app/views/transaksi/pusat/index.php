
<div class="card card-custom">
    <div class="card-body">

        <h5 class="mb-3">Transaksi</h5>

        <table class="table text-center">
            <thead>
                <tr>
                    <th>No.Transaksi</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Cabang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($transaksi as $t): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $t['tanggal_transaksi'] ?></td>
                            <td><?= $t['produk'] ?? '-' ?></td>
                            <td>Rp <?= number_format($t['total'],0,',','.') ?></td>
                            <td><?= $t['id_cabang'] ?></td>
                            <td>
                                    <a href="/transaksi/pusat/edit/<?= $t['id_transaksi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/transaksi/pusat/hapus/<?= $t['id_transaksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
