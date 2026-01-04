<div class="container-fluid">
    <h4 class="mb-4">Edit Barang Keluar</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="/barang/cabang/keluar/editProsses">

                <!-- ID Keluar (hidden, wajib) -->
                <input type="hidden" name="id_keluar" value="<?= $barang_keluar['id_keluar']; ?>">

                <!-- ID Barang -->
                <div class="mb-3">
                    <label class="form-label">ID Barang</label>
                    <input type="text"
                           name="id_barang"
                           class="form-control"
                           value="<?= $barang_keluar['id_barang']; ?>"
                           required>
                </div>

                <!-- Tujuan Barang -->
                <div class="mb-3">
                    <label class="form-label">Tujuan Barang</label>
                    <input type="text"
                           name="tujuan_barang"
                           class="form-control"
                           value="<?= $barang_keluar['tujuan_barang']; ?>"
                           required>
                </div>

                <!-- Jumlah -->
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number"
                           name="jumlah"
                           class="form-control"
                           min="1"
                           value="<?= $barang_keluar['jumlah']; ?>"
                           required>
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="/barang/cabang/keluar" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
