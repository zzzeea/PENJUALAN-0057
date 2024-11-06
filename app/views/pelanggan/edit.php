<div class="container mt-5">
    <h2>Edit Pelanggan</h2>
    <form action="<?= BASEURL; ?>/pelanggan/edit/<?= htmlspecialchars($data['pelanggan']['id_pelanggan']) ?>" method="POST">
        
        <div class="mb-3">
            <label for="id" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" id="id" name="id" value="<?= htmlspecialchars($data['pelanggan']['id_pelanggan']) ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nm_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan" value="<?= htmlspecialchars($data['pelanggan']['nm_pelanggan']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($data['pelanggan']['alamat']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-warning">Edit</button>
        <a href="<?= BASEURL; ?>/pelanggan" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
