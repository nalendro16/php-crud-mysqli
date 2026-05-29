<?php

class Database {

private $host     = "localhost"; 
private $port     = "5432";      
private $dbname   = "motor"; 
private $user     = "nalendroagung";  
private $password = "";
public $conn;

public function getConnection() {
        $this -> conn = null;

        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname;
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            echo "Koneksi Error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }

}
?>