<?php
// Process form
require_once __DIR__ . '/classes/Order.php';

// Simple helper to clean input
function clean($v) {
    return trim(htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Collect and sanitize
    $data = [
        'name' => clean($_POST['name'] ?? ''),
        'email' => clean($_POST['email'] ?? ''),
        'pizza_size' => clean($_POST['pizza_size'] ?? ''),
        'toppings' => clean($_POST['toppings'] ?? ''),
        'quantity' => (int)($_POST['quantity'] ?? 1),
        'address' => clean($_POST['address'] ?? '')
    ];

    // Basic server side validation
    $errors = [];
    if ($data['name'] === '') $errors[] = 'Name is required';
    if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
    if ($data['pizza_size'] === '') $errors[] = 'Choose a pizza size';
    if ($data['address'] === '') $errors[] = 'Address is required';
    if ($data['quantity'] < 1) $errors[] = 'Quantity must be at least 1';

    include 'templates/header.php';

    if (!empty($errors)) {
        echo '<div class="alert alert-danger">';
        echo '<h5>There were problems with your submission</h5>';
        echo '<ul>';
        foreach ($errors as $e) {
            echo '<li>' . htmlspecialchars($e) . '</li>';
        }
        echo '</ul>';
        echo '<a href="index.php" class="btn btn-secondary">Back to form</a>';
        echo '</div>';
        include 'templates/footer.php';
        exit;
    }

    // Save to database
    $order = new Order();
    $saved = $order->create($data);

    if ($saved) {
        echo '<div class="alert alert-success">';
        echo '<h4 class="mb-1">Order placed</h4>';
        echo '<p>Thank you ' . htmlspecialchars($data['name']) . '. Your order has been received.</p>';
        echo '<p><strong>Summary</strong></p>';
        echo '<ul>';
        echo '<li>Size: ' . htmlspecialchars($data['pizza_size']) . '</li>';
        echo '<li>Toppings: ' . htmlspecialchars($data['toppings'] ?: 'None') . '</li>';
        echo '<li>Quantity: ' . intval($data['quantity']) . '</li>';
        echo '<li>Delivery address: ' . htmlspecialchars($data['address']) . '</li>';
        echo '</ul>';
        echo '<a href="index.php" class="btn btn-primary">Place another order</a>';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger">';
        echo '<p>Sorry there was a problem saving your order. Try again.</p>';
        echo '<a href="index.php" class="btn btn-secondary">Back to form</a>';
        echo '</div>';
    }

    include 'templates/footer.php';
    exit;
} else {
    header('Location: index.php');
    exit;
}
