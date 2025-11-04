USE Mohamed200630733;

CREATE TABLE IF NOT EXISTS pizza_orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(100) NOT NULL,
  customer_email VARCHAR(150) NOT NULL,
  pizza_size VARCHAR(20) NOT NULL,
  toppings TEXT,
  quantity INT NOT NULL DEFAULT 1,
  delivery_address VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
