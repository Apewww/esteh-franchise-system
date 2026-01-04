<div class="card">
    <div class="card-body">
        <h5>Edit Karyawan Cabang</h5>

        <form method="post">
            <input type="hidden" name="id_karyawan"
                   value="<?= $karyawan['id_karyawan']; ?>">

            <input name="nama_karyawan" class="form-control mb-2"
                   value="<?= $karyawan['nama_karyawan']; ?>" required>

            <input name="jabatan" class="form-control mb-2"
                   value="<?= $karyawan['jabatan']; ?>" required>

            <input type="hidden" name="id_cabang"
                   value="<?= $karyawan['id_cabang']; ?>">

            <button class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
