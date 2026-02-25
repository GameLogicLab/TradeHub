<?php
/**
 * Seller Module Access Control
 * Only allow sellers to access seller pages
 */

require_once 'check_session.php';

// Check if user is logged in and is a seller
if (!isLoggedIn() || !isSeller()) {
    // Redirect to login page
    header('Location: login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit();
}

?>
