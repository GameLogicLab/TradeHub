<?php
/**
 * Delete Product Handler
 * Delete a product belonging to the seller
 */

require_once '../db_connect.php';
require_once '../check_session.php';
require_once '../seller_check.php';

$user = getLoggedInUser();
$seller_id = $user['id'];

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($product_id)) {
    header('Location: seller_products.php');
    exit();
}

// Verify that the product belongs to this seller
$stmt = $conn->prepare("SELECT id FROM products WHERE id = ? AND seller_id = ?");
$stmt->bind_param("ii", $product_id, $seller_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Product doesn't belong to this seller or doesn't exist
    header('Location: seller_products.php');
    exit();
}
$stmt->close();

// Delete the product
$stmt = $conn->prepare("DELETE FROM products WHERE id = ? AND seller_id = ?");
$stmt->bind_param("ii", $product_id, $seller_id);

if ($stmt->execute()) {
    $stmt->close();
    // Redirect back to products page
    header('Location: seller_products.php?deleted=1');
    exit();
} else {
    $stmt->close();
    header('Location: seller_products.php?error=1');
    exit();
}

?>
