-- pizza order database
-- mohamed el khoudimi

USE Mohamed200630733;

-- create table for orders
CREATE TABLE pizza_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    customer_email VARCHAR(100) NOT NULL,
    pizza_size VARCHAR(20) NOT NULL,
    crust_type VARCHAR(20) NOT NULL,
    toppings TEXT,
    quantity INT NOT NULL,
    delivery_address TEXT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);