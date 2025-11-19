<?php
class Database {
    private $host = "172.31.22.43"; // from email
    private $dbname = "Mohamed200630733"; // your assigned DB
    private $username = "Mohamed200630733";
    private $password = "_GxNIuR1K0";
    public $conn;

    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Database connection error: " . $e->getMessage();
        }
    }
}
?>

