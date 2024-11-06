<div class="container mt-5">
    <h2>Tambah Transaksi</h2>
    <form action="<?= BASEURL; ?>/transaksi/add" method="POST" id="transaksiForm">
        <div class="mb-3 mt-3">
            <label for="kd_barang" class="form-label">Barang</label>
            <select class="form-control" id="kd_barang" name="kd_barang" required>
                <option value="">Pilih Barang</option>
                <?php foreach ($data['barang'] as $barang): ?>
                    <option value="<?= htmlspecialchars($barang['kd_barang']) ?>" data-harga="<?= htmlspecialchars($barang['harga']) ?>">
                        <?= htmlspecialchars($barang['nm_barang']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                <option value="">Pilih Pelanggan</option>
                <?php foreach ($data['pelanggan'] as $pelanggan): ?>
                    <option value="<?= htmlspecialchars($pelanggan['id_pelanggan']) ?>"><?= htmlspecialchars($pelanggan['nm_pelanggan']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
        </div>
        <div class="mb-3">
            <label for="total_harga" class="form-label">Total</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
        </div>
        <button type="submit" class="btn btn-dark mt-3">Tambah</button>
        <a href="<?= BASEURL; ?>/transaksi" class="btn btn-outline-secondary mt-3">Kembali</a>
    </form>
</div>

<script>
    const barangSelect = document.getElementById('kd_barang');
    const jumlahInput = document.getElementById('jumlah');
    const totalInput = document.getElementById('total_harga');

    function updateTotal() {
        const selectedBarang = barangSelect.options[barangSelect.selectedIndex];
        const harga = parseFloat(selectedBarang.getAttribute('data-harga'));
        const jumlah = parseFloat(jumlahInput.value);
        if (!isNaN(harga) && !isNaN(jumlah)) {
            totalInput.value = harga * jumlah;
        } else {
            totalInput.value = '';
        }
    }

    barangSelect.addEventListener('change', updateTotal);
    jumlahInput.addEventListener('input', updateTotal);
</script>
