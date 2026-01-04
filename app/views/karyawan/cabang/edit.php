<?php foreach ($karyawan as $k): ?>
<tr>
<td><?= $k['nama_karyawan']; ?></td>
<td><?= $k['jabatan']; ?></td>

<td>
    <!-- EDIT -->
    <form method="post" style="display:inline">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id_karyawan" value="<?= $k['id_karyawan']; ?>">
        <input type="hidden" name="nama_karyawan" value="<?= $k['nama_karyawan']; ?>">
        <input type="hidden" name="jabatan" value="<?= $k['jabatan']; ?>">
        <button>Edit</button>
    </form>

    <!-- DELETE -->
    <form method="post" style="display:inline">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id_karyawan" value="<?= $k['id_karyawan']; ?>">
        <button onclick="return confirm('Hapus?')">Hapus</button>
    </form>
</td>
</tr>
<?php endforeach; ?>
