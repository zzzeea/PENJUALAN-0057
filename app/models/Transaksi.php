<?php
class Transaksi {
    private $table = 'transaksi';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT t.*, p.nm_pelanggan, b.nm_barang 
                                  FROM $this->table t 
                                  JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan 
                                  JOIN barang b ON t.kd_barang = b.kd_barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBarangList() {
        $stmt = $this->db->query("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPelangganList() {
        $stmt = $this->db->query("SELECT * FROM pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $harga_barang = $this->getHargaBarang($data['kd_barang']);
        if (!$harga_barang) {
            throw new Exception("Barang tidak ditemukan.");
        }

        $total_harga = $harga_barang * $data['jumlah'];

        $stmt = $this->db->query("INSERT INTO $this->table 
                                  (kd_barang, id_pelanggan, tanggal, jumlah, total_harga) 
                                  VALUES (:kd_barang, :id_pelanggan, :tanggal, :jumlah, :total_harga)");
        $stmt->bindParam(':kd_barang', $data['kd_barang']);
        $stmt->bindParam(':id_pelanggan', $data['id_pelanggan']);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':jumlah', $data['jumlah']);
        $stmt->bindParam(':total_harga', $total_harga); 
        $stmt->execute();
    }

    public function getHargaBarang($kd_barang) {
        $stmt = $this->db->query("SELECT harga FROM barang WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $kd_barang);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['harga'] : null;
    }

    public function getById($id_transaksi) {
        $stmt = $this->db->query("SELECT t.*, p.nm_pelanggan, b.nm_barang 
                                  FROM $this->table t 
                                  JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan 
                                  JOIN barang b ON t.kd_barang = b.kd_barang 
                                  WHERE t.id_transaksi = :id_transaksi");
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
