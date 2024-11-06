<?php
class Pelanggan {
    private $table = 'pelanggan';
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
        $stmt = $this->db->query("SELECT * FROM $this->table WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->query("INSERT INTO $this->table (id_pelanggan, nm_pelanggan, alamat) VALUES (:id_pelanggan, :nm_pelanggan, :alamat)");

        $stmt->bindParam(':id_pelanggan', $data['id_pelanggan']);
        $stmt->bindParam(':nm_pelanggan', $data['nm_pelanggan']);
        $stmt->bindParam(':alamat', $data['alamat']);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        $stmt = $this->db->query("UPDATE $this->table SET nm_pelanggan = :nm_pelanggan, alamat = :alamat WHERE id_pelanggan = :id_pelanggan");

        $stmt->bindParam(':nm_pelanggan', $data['nm_pelanggan']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':id_pelanggan', $id);

        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->query("DELETE FROM $this->table WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id);
        $stmt->execute();
    }
}
