<div class="card card-custom">
    <div class="card-body">

        <h5 class="mb-3">Tambah Transaksi</h5>

        <form action="/transaksi/cabang/store" method="POST">

            <div class="mb-3">
                <label class="form-label">Total</label>
                <input type="number" name="total" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/transaksi/cabang" class="btn btn-secondary">Batal</a>
            </div>

        </form>

    </div>
</div>
