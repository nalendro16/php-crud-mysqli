<?php
class MotorYamaha {
    private $conn;
    private $table_name = "motor_yamaha";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($tipe_motor, $warna, $cc_mesin) {
        $query = "INSERT INTO " . $this->table_name . " (tipe_motor, warna, cc_mesin) VALUES (:tipe_motor, :warna, :cc_mesin)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tipe_motor', $tipe_motor);
        $stmt->bindParam(':warna', $warna);
        $stmt->bindParam(':cc_mesin', $cc_mesin);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan data dalam bentuk array
    }

    public function update($id, $tipe_motor, $warna, $cc_mesin) {
        $query = "UPDATE " . $this->table_name . " SET tipe_motor = :tipe_motor, warna = :warna, cc_mesin = :cc_mesin WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tipe_motor', $tipe_motor);
        $stmt->bindParam(':warna', $warna);
        $stmt->bindParam(':cc_mesin', $cc_mesin);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>