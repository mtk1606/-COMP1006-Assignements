<?php
require_once "Database.php";

class Order {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createOrder($name, $email, $size, $toppings, $quantity, $address) {
        $sql = "INSERT INTO orders (name, email, pizza_size, toppings, quantity, address)
                VALUES (:name, :email, :size, :toppings, :quantity, :address)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':toppings', $toppings);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':address', $address);

        return $stmt->execute();
    }
}
?>
