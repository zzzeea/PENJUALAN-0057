<div class="container mt-5">
    <h2>Tambah Pelanggan</h2>
    <form action="<?= BASEURL; ?>/pelanggan/add" method="POST">
        <div class="mb-3">
            <label for="id" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="mb-3">
            <label for="nm_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Tambah</button>
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
