<div class="container mt-5">
    <h1 class="mb-4">Transaksi Penjualan</h1>

    <!-- Tombol Tambah Barang -->
    <a href="<?= BASEURL; ?>/transaksi/add" class="btn btn-outline-dark mb-3">Tambah Data</a>

    <!-- Tabel Data Barang -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Kode Barang</th>
                <th>ID Pelanggan</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['transaksi'] as $transaksi): ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= htmlspecialchars($transaksi['id_transaksi']) ?></td>
                    <td><?= htmlspecialchars($transaksi['kd_barang']) ?></td>
                    <td><?= htmlspecialchars($transaksi['id_pelanggan']) ?></td>
                    <td><?= htmlspecialchars($transaksi['jumlah']) ?></td>
                    <td><?= htmlspecialchars($transaksi['total_harga']) ?></td>
                    <td><?= htmlspecialchars($transaksi['tanggal']) ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="<?= BASEURL; ?>/transaksi/detail/<?= htmlspecialchars($transaksi['id_transaksi']) ?>" class="btn btn-outline-warning btn-sm">Detail Transaksi</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>