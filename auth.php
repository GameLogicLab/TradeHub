<?php
/**
 * Authentication Functions
 * Server-side validation and password hashing
 */

/**
 * Validate Full Name
 * Only letters and spaces, minimum 3 characters
 */
function validateFullName($name) {
    return !empty($name) && 
           preg_match('/^[a-zA-Z\s]+$/', $name) && 
           strlen($name) >= 3;
}

/**
 * Validate Email Format
 */
function validateEmail($email) {
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Validate Password
 * Minimum 8 characters, at least 1 uppercase, 1 lowercase, 1 number, 1 special character
 */
function validatePassword($password) {
    if (empty($password) || strlen($password) < 8) {
        return false;
    }
    
    // Check for uppercase
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    
    // Check for lowercase
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    
    // Check for digit
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }
    
    // Check for special character
    if (!preg_match('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $password)) {
        return false;
    }
    
    return true;
}

/**
 * Validate Role
 * Must be either 'Buyer' or 'Seller'
 */
function validateRole($role) {
    return in_array($role, ['buyer', 'seller']);
}

/**
 * Register User
 * Returns array with status and message
 */
function registerUser($conn, $fullName, $email, $password, $role) {
    
    // Validate inputs
    if (!validateFullName($fullName)) {
        return [
            'success' => false,
            'message' => 'Full Name must contain only letters and spaces, minimum 3 characters.'
        ];
    }
    
    if (!validateEmail($email)) {
        return [
            'success' => false,
            'message' => 'Please enter a valid email address.'
        ];
    }
    
    if (!validatePassword($password)) {
        return [
            'success' => false,
            'message' => 'Password must be at least 8 characters with 1 uppercase, 1 lowercase, 1 number, and 1 special character.'
        ];
    }
    
    if (!validateRole($role)) {
        return [
            'success' => false,
            'message' => 'Please select a valid role (Buyer or Seller).'
        ];
    }
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->close();
        return [
            'success' => false,
            'message' => 'Email already registered. Please log in or use a different email.'
        ];
    }
    $stmt->close();
    
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $fullName, $email, $hashedPassword, $role);
    
    if ($stmt->execute()) {
        $stmt->close();
        return [
            'success' => true,
            'message' => 'Account created successfully! Redirecting to login...'
        ];
    } else {
        $stmt->close();
        return [
            'success' => false,
            'message' => 'Error creating account. Please try again.'
        ];
    }
}

/**
 * Login User
 * Returns array with status, message, and user data
 */
function loginUser($conn, $email, $password) {
    
    // Validate email format
    if (!validateEmail($email)) {
        return [
            'success' => false,
            'message' => 'Please enter a valid email address.'
        ];
    }
    
    // Get user from database using prepared statement
    $stmt = $conn->prepare("SELECT id, full_name, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        $stmt->close();
        return [
            'success' => false,
            'message' => 'Email not found. Please check or create an account.'
        ];
    }
    
    $user = $result->fetch_assoc();
    $stmt->close();
    
    // Verify password
    if (!password_verify($password, $user['password'])) {
        return [
            'success' => false,
            'message' => 'Incorrect password. Please try again.'
        ];
    }
    
    // Return user data
    return [
        'success' => true,
        'message' => 'Login successful!',
        'user' => [
            'id' => $user['id'],
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'role' => $user['role']
        ]
    ];
}

?>
