<?php include 'templates/header.php'; ?>

<form action="process_order.php" method="POST" class="order-form">
    <label for="name">Full Name</label>
    <input type="text" name="name" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="pizza_size">Pizza Size</label>
    <select name="pizza_size" required>
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
    </select>

    <label for="toppings">Toppings</label>
    <textarea name="toppings" placeholder="Mushrooms, Cheese, etc."></textarea>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" min="1" value="1" required>

    <label for="address">Delivery Address</label>
    <textarea name="address" required></textarea>

    <button type="submit" name="submit">Place Order</button>
</form>

<?php include 'templates/footer.php'; ?>
