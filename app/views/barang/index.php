<div class="container mt-5">
    <h1 class="mb-4">Data Barang</h1>
    <a href="<?= BASEURL; ?>/barang/add" class="btn btn-outline-dark mb-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['barang'] as $barang): ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= htmlspecialchars($barang['kd_barang']) ?></td>
                    <td><?= htmlspecialchars($barang['nm_barang']) ?></td>
                    <td><?= htmlspecialchars($barang['harga']) ?></td>
                    <td><?= htmlspecialchars($barang['stok']) ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/barang/edit/<?= htmlspecialchars($barang['kd_barang']) ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <a href="<?= BASEURL; ?>/barang/delete/<?= htmlspecialchars($barang['kd_barang']) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
