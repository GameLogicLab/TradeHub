-- TradeHub Database Setup
-- Create the database if not exists
CREATE DATABASE IF NOT EXISTS tradehub;
USE tradehub;

-- Create users table for authentication
CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('buyer', 'seller') NOT NULL DEFAULT 'buyer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create indexes for faster queries
CREATE INDEX idx_email ON users(email);
CREATE INDEX idx_role ON users(role);

-- Sample data for testing (optional)
-- Note: These passwords are hashed using password_hash() with PASSWORD_DEFAULT
-- Password: Test@123 (hashed)
-- INSERT INTO users (full_name, email, password, role) VALUES
-- ('John Buyer', 'buyer@example.com', '$2y$10$...', 'buyer'),
-- ('Jane Seller', 'seller@example.com', '$2y$10$...', 'seller');
