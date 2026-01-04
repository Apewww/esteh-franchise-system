<div class="card">
    <div class="card-body">
        <h5>Tambah Karyawan Pusat</h5>

        <form method="post">
            <input name="nama_karyawan" class="form-control mb-2"
                   placeholder="Nama" required>

            <input name="jabatan" class="form-control mb-2"
                   placeholder="Jabatan" required>

            <!-- PUSAT = 0 -->
            <input type="hidden" name="id_cabang" value="0">

            <button class="btn btn-dark">Simpan</button>
        </form>
    </div>
</div>
