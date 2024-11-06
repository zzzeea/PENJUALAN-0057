<?php
class Barang {
    private $table = 'barang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->query("SELECT * FROM $this->table WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data) {
        $stmt = $this->db->query("INSERT INTO $this->table (kd_barang, nm_barang, harga, stok) VALUES (:kode, :nama, :harga, :stok)");
        $stmt->bindParam(':kode', $data['kode']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->query("UPDATE $this->table SET nm_barang = :nama, harga = :harga, stok = :stok WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        $stmt->bindParam(':kd_barang', $id); 
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->query("DELETE FROM $this->table WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $id);
        return $stmt->execute();
    }
}
