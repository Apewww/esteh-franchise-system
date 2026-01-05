<div class="container-fluid">
    <h4 class="mb-4">Edit Karyawan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="/karyawan/cabang/editProsses">

                <!-- ID Keluar (hidden, wajib) -->
                <input type="hidden" name="id_karyawan" value="<?= $karyawan['id_karyawan']; ?>">
                <input type="hidden" name="id_cabang" value="<?= $karyawan['id_cabang']; ?>">

                <!-- ID Barang -->
                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <input type="text"
                           name="nama_karyawan"
                           class="form-control"
                           value="<?= $karyawan['nama_karyawan']; ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select class="form-control" disabled>
                        <option value=""><?= $karyawan['jabatan'] ?></option>
                    </select>
                    <input type="text" name="jabatan" value="<?= $karyawan['jabatan']; ?>" required hidden>
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="/karyawan/cabang" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
