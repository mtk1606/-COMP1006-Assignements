<?php
// Database class
class Database {
    private $host = "172.31.22.43";
    private $dbname = "Mohamed200630733";
    private $username = "Mohamed200630733";
    private $password = "_GxNIuR1K0";
    public $conn = null;

    // Connect method
    public function connect() {
        if ($this->conn !== null) {
            return $this->conn;
        }
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            return $this->conn;
        } catch (PDOException $e) {
            // Show friendly message for debug in development
            echo "Database connection error: " . htmlspecialchars($e->getMessage());
            exit;
        }
    }
}
?>
