<?php
// assignment 2 - pizza order form
// mohamed el khoudimi

require_once 'includes/Database.php';
require_once 'includes/Order.php';

$pageTitle = "pizza order";
$msg = "";

// process form
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $size = $_POST['size'];
    $crust = $_POST['crust'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];
    
    // get toppings - tried loop first but this easier
    $toppings = "";
    if(isset($_POST['toppings'])) {
        $toppings = implode(", ", $_POST['toppings']);
    }
    
    // echo $toppings; // testing
    
    // save to db
    $order = new Order();
    if($order->createOrder($name, $email, $size, $crust, $toppings, $quantity, $address)) {
        $msg = "order received! we will deliver soon";
    } else {
        $msg = "something went wrong try again";
    }
}

include 'templates/header.php';
?>

<main>
    <div class="container">
        <h1>Order Pizza</h1>
        
        <?php if($msg != ""): ?>
            <div class="message">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="">
            <div class="section">
                <h2>your info</h2>
                
                <label>name</label>
                <input type="text" name="name" required>
                
                <label>email</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="section">
                <h2>pizza options</h2>
                
                <label>size</label>
                <select name="size" required>
                    <option value="">pick size</option>
                    <option value="small">small</option>
                    <option value="medium">medium</option>
                    <option value="large">large</option>
                </select>
                
                <label>crust</label>
                <label><input type="radio" name="crust" value="thin" required> thin</label>
                <label><input type="radio" name="crust" value="regular" checked> regular</label>
                <label><input type="radio" name="crust" value="thick"> thick</label>
                
                <label>toppings (optional)</label>
                <label><input type="checkbox" name="toppings[]" value="pepperoni"> pepperoni</label>
                <label><input type="checkbox" name="toppings[]" value="mushrooms"> mushrooms</label>
                <label><input type="checkbox" name="toppings[]" value="olives"> olives</label>
                <label><input type="checkbox" name="toppings[]" value="peppers"> peppers</label>
                
                <label>how many</label>
                <input type="number" name="quantity" value="1" min="1" required>
            </div>
            
            <div class="section">
                <h2>delivery</h2>
                
                <label>address</label>
                <textarea name="address" rows="3" required></textarea>
            </div>
            
            <button type="submit">order now</button>
        </form>
    </div>
</main>

<?php include 'templates/footer.php'; ?>