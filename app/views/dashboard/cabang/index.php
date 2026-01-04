<div class="row g-4">

    <?php foreach ($produk as $item): ?>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-custom h-100 position-relative">

                <!-- Gambar -->
                <img src="/uploads/produk/<?= $item['gambar']; ?>"
                     class="p-3"
                     alt="<?= $item['nama_produk']; ?>">

                <!-- Body -->
                <div class="card-body text-left">
                    <h6 class="mb-1"><?= $item['nama_produk']; ?></h6>
                    <small class="text-muted">
                        Rp <?= number_format($item['harga'], 0, ',', '.'); ?>
                    </small>
                </div>

                <a href="/transaksi/tambah/<?= $item['id_produk']; ?>"
                   class="btn btn-success rounded-circle position-absolute"
                   style="bottom: 15px; right: 15px;">
                    +
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<!-- FLOATING ADD BUTTON -->
 <a href="/dashboard/cabang/add"
   class="btn btn-warning rounded-circle position-fixed"
   style="bottom: 90px; right: 25px; width: 55px; height: 55px; font-size: 28px;">
    =
</a>
<a href="/dashboard/cabang/add"
   class="btn btn-success rounded-circle position-fixed"
   style="bottom: 25px; right: 25px; width: 55px; height: 55px; font-size: 28px;">
    +
</a>