<div class="container mt-5">
    <h1 class="mb-4">Data Pelanggan</h1>
    <a href="<?= BASEURL; ?>/pelanggan/add" class="btn btn-outline-dark mb-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['pelanggan'] as $pelanggan): ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= htmlspecialchars($pelanggan['id_pelanggan']) ?></td>
                    <td><?= htmlspecialchars($pelanggan['nm_pelanggan']) ?></td>
                    <td><?= htmlspecialchars($pelanggan['alamat']) ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/pelanggan/edit/<?= htmlspecialchars($pelanggan['id_pelanggan']) ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <a href="<?= BASEURL; ?>/pelanggan/delete/<?= htmlspecialchars($pelanggan['id_pelanggan']) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
