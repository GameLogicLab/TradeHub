<?php
/**
 * Session Check Helper
 * Check if user is logged in and get user data
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Get logged-in user data
 * Returns user array or null if not logged in
 */
function getLoggedInUser() {
    if (!isset($_SESSION['user_id'])) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'],
        'full_name' => $_SESSION['user_name'],
        'email' => $_SESSION['user_email'],
        'role' => $_SESSION['user_role']
    ];
}

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Check if user is a buyer
 */
function isBuyer() {
    return isLoggedIn() && $_SESSION['user_role'] === 'buyer';
}

/**
 * Check if user is a seller
 */
function isSeller() {
    return isLoggedIn() && $_SESSION['user_role'] === 'seller';
}

/**
 * Set session for logged-in user
 */
function setUserSession($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['full_name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];
}

/**
 * Logout user by destroying session
 */
function logoutUser() {
    session_destroy();
    header('Location: index.php');
    exit();
}

?>
