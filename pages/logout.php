<?php
/**
 * Logout Handler
 * Destroys user session and redirects to home
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroy the session
session_destroy();

// Clear session data
$_SESSION = [];

// Redirect to home page
header('Location: ../index.php');
exit();

?>
