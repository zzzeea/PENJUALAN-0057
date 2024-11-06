<div class="container mt-5">
    <h2>Edit Barang</h2>
    <form action="<?= BASEURL; ?>/barang/edit/<?= $data['barang']['kd_barang'] ?>" method="POST">
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= htmlspecialchars($data['barang']['kd_barang']) ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['barang']['nm_barang']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= htmlspecialchars($data['barang']['harga']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= htmlspecialchars($data['barang']['stok']) ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
