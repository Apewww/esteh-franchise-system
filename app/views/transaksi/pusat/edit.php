<form action="/transaksi/pusat/update/<?= $transaksi['id_transaksi'] ?>" method="POST">

    <table class="table align-middle">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>

        <?php if (!empty($detail)): ?>
            <?php foreach ($detail as $d): ?>
            <tr>
                <td>
                    <?= $d['nama_produk'] ?>
                    <input type="hidden" name="id_detail[]" value="<?= $d['id_detail'] ?>">
                </td>
                <td>
                    <input 
                        type="number" 
                        name="jumlah[]" 
                        class="form-control" 
                        value="<?= $d['jumlah'] ?>" 
                        min="1"
                    >
                </td>
                <td>
                    Rp <?= number_format($d['subtotal'], 0, ',', '.') ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center text-muted">
                    Belum ada produk
                </td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/transaksi/pusat" class="btn btn-secondary">Batal</a>
    </div>

</form>
