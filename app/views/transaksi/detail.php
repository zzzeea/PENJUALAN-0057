<div class="container mt-5">
    <h2>Detail Transaksi</h2>
    <table class="table table-bordered mt-5 mb-5">
        <tr>
            <th>ID Transaksi</th>
            <td><?= htmlspecialchars($data['transaksi']['id_transaksi']) ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?= htmlspecialchars($data['transaksi']['tanggal']) ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td><?= htmlspecialchars($data['transaksi']['total_harga']) ?></td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td><?= htmlspecialchars($data['transaksi']['nm_pelanggan']) ?></td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td><?= htmlspecialchars($data['transaksi']['nm_barang']) ?></td>
        </tr>
    </table>
    <a href="<?= BASEURL; ?>/transaksi" class="btn btn-secondary">Kembali</a>
</div>
