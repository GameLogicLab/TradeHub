-- Seller Module - Database Extension
-- Create products table for sellers
-- Run this SQL file to add seller product management support

CREATE TABLE IF NOT EXISTS products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  seller_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10, 2),
  quantity INT DEFAULT 0,
  sku VARCHAR(100) UNIQUE,
  status ENUM('active', 'inactive', 'draft') DEFAULT 'draft',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (seller_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create index for faster queries
CREATE INDEX idx_seller_id ON products(seller_id);
CREATE INDEX idx_category ON products(category);
CREATE INDEX idx_status ON products(status);
