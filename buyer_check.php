<?php
/**
 * Buyer Module Access Control
 * Only allow buyers to access buyer pages
 */

require_once 'check_session.php';

// Check if user is logged in and is a buyer
if (!isLoggedIn() || !isBuyer()) {
    // Redirect to login page
    header('Location: login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit();
}

?>
