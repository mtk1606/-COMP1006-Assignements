<?php
require_once "classes/Order.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $size = $_POST['pizza_size'];
    $toppings = $_POST['toppings'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];

    $order = new Order();
    $result = $order->createOrder($name, $email, $size, $toppings, $quantity, $address);

    include 'templates/header.php';
    if ($result) {
        echo "<p class='success-message'>Thank you, $name! Your order has been placed successfully.</p>";
    } else {
        echo "<p class='error-message'>Sorry, there was a problem saving your order. Please try again.</p>";
    }
    include 'templates/footer.php';
}
?>
