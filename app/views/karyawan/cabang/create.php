<div class="card">
    <div class="card-body">
        <h5>Tambah Karyawan Cabang</h5>

        <form method="post" action="/karyawan/cabang/store">
            <input type="hidden" name="id_cabang" value="<?= $id_cabang ?>">

            <input name="nama_karyawan" class="form-control mb-2"
                   placeholder="Nama Karyawan" required>

            <input name="jabatan" class="form-control mb-2"
                   placeholder="Jabatan" required>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
