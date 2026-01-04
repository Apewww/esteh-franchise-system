<div class="card card-custom">
    <div class="card-body">

        <h5 class="mb-3">Tambah Transaksi (Pusat)</h5>

        <form action="/transaksi/pusat/store" method="POST">

            <div class="mb-3">
                <label class="form-label">ID Cabang</label>
                <input type="number" name="id_cabang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Produk</label>
                <input type="text" name="produk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Total</label>
                <input type="number" name="total" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/transaksi/pusat" class="btn btn-secondary">Batal</a>

        </form>

    </div>
</div>
