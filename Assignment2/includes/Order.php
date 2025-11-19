<?php
// order class

class Order {
    private $conn;
    
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    
    // create order in database
    public function createOrder($name, $email, $size, $crust, $toppings, $quantity, $address) {
        // tried without prepare first but teacher said use it for security
        $sql = "INSERT INTO pizza_orders (customer_name, customer_email, pizza_size, crust_type, toppings, quantity, delivery_address) 
                VALUES (:name, :email, :size, :crust, :toppings, :quantity, :address)";
        
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':crust', $crust);
        $stmt->bindParam(':toppings', $toppings);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':address', $address);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
