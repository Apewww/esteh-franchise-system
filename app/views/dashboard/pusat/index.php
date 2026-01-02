<tbody>
<?php if (!empty($cabang)): ?>
    <?php foreach ($cabang as $row): ?>
        <tr>
            <td><?= $row['id_cabang']; ?></td>
            <td><?= htmlspecialchars($row['nama_cabang']); ?></td>
            <td><?= htmlspecialchars($row['kota']); ?></td>
            <td><?= htmlspecialchars($row['no_telp']); ?></td>
            <td><?= htmlspecialchars($row['alamat_cabang']); ?></td>
            <td>
                <a href="/dashboard/pusat/edit/<?= $row['id_cabang']; ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <a href="/dashboard/pusat/delete/<?= $row['id_cabang']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Hapus cabang ini?')">
                    Hapus
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6">Data cabang belum tersedia</td>
    </tr>
<?php endif; ?>
</tbody>
