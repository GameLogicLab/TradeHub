<?php
/**
 * Edit Product Page
 * Seller can edit existing products
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

// Fetch product details
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ? AND seller_id = ?");
$stmt->bind_param("ii", $product_id, $seller_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: seller_products.php');
    exit();
}

$product = $result->fetch_assoc();
$stmt->close();

// Initialize error/success messages
$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    $sku = isset($_POST['sku']) ? trim($_POST['sku']) : '';
    $status = isset($_POST['status']) ? trim($_POST['status']) : 'draft';
    
    // Validate inputs
    if (empty($product_name)) {
        $error_message = 'Product name is required.';
    } elseif (strlen($product_name) < 3) {
        $error_message = 'Product name must be at least 3 characters.';
    } elseif ($price < 0) {
        $error_message = 'Price must be a positive number.';
    } elseif ($quantity < 0) {
        $error_message = 'Quantity must be a non-negative number.';
    } elseif (!empty($sku) && $sku !== $product['sku']) {
        // Check if new SKU already exists
        $stmt = $conn->prepare("SELECT id FROM products WHERE seller_id = ? AND sku = ? AND id != ?");
        $stmt->bind_param("isi", $seller_id, $sku, $product_id);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error_message = 'SKU already exists for your products.';
        }
        $stmt->close();
    }
    
    // If no errors, update product
    if (empty($error_message)) {
        $stmt = $conn->prepare("
            UPDATE products 
            SET product_name = ?, description = ?, category = ?, price = ?, quantity = ?, sku = ?, status = ?
            WHERE id = ? AND seller_id = ?
        ");
        $stmt->bind_param("sssdisii", $product_name, $description, $category, $price, $quantity, $sku, $status, $product_id, $seller_id);
        
        if ($stmt->execute()) {
            $success_message = 'Product updated successfully!';
            // Update local product array
            $product['product_name'] = $product_name;
            $product['description'] = $description;
            $product['category'] = $category;
            $product['price'] = $price;
            $product['quantity'] = $quantity;
            $product['sku'] = $sku;
            $product['status'] = $status;
        } else {
            $error_message = 'Error updating product. Please try again.';
        }
        $stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Product — Seller Dashboard | TradeHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/global.css" />
  <style>
    .seller-layout {
      display: flex;
      min-height: calc(100vh - 65px);
      margin-top: 65px;
    }

    .seller-sidebar {
      width: 250px;
      background: white;
      border-right: 1px solid var(--border);
      padding: 24px 0;
      position: fixed;
      height: calc(100vh - 65px);
      overflow-y: auto;
    }

    .seller-content {
      margin-left: 250px;
      flex: 1;
      padding: 40px;
      background: var(--bg-page);
    }

    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-menu li {
      margin: 0;
    }

    .sidebar-menu a {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 20px;
      color: var(--text-muted);
      font-size: 14px;
      font-weight: 500;
      transition: all 0.2s;
      border-left: 3px solid transparent;
    }

    .sidebar-menu a:hover {
      background: var(--primary-bg);
      color: var(--primary);
      border-left-color: var(--primary);
    }

    .sidebar-menu a.active {
      background: var(--primary-bg);
      color: var(--primary);
      border-left-color: var(--primary);
    }

    .form-card {
      background: white;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 32px;
      box-shadow: var(--shadow);
      max-width: 700px;
    }

    .form-group {
      margin-bottom: 24px;
    }

    .form-label {
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 8px;
      display: block;
      font-size: 14px;
    }

    .form-control {
      padding: 10px 14px;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      font-size: 14px;
      font-family: var(--font);
    }

    .form-control:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 0 3px var(--primary-bg);
    }

    textarea.form-control {
      resize: vertical;
      min-height: 120px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .button-group {
      display: flex;
      gap: 12px;
      margin-top: 32px;
    }

    .alert {
      padding: 12px 16px;
      border-radius: var(--radius);
      font-size: 14px;
      margin-bottom: 20px;
    }

    .alert-error {
      background-color: #FEE2E2;
      border: 1px solid #FECACA;
      color: #991B1B;
    }

    .alert-success {
      background-color: #DCFCE7;
      border: 1px solid #BBF7D0;
      color: #166534;
    }

    @media (max-width: 1024px) {
      .seller-sidebar {
        width: 200px;
      }
      .seller-content {
        margin-left: 200px;
      }
    }

    @media (max-width: 768px) {
      .seller-layout {
        flex-direction: column;
      }
      .seller-sidebar {
        width: 100%;
        height: auto;
        border-right: none;
        border-bottom: 1px solid var(--border);
        position: static;
      }
      .seller-content {
        margin-left: 0;
        padding: 20px;
      }
      .form-row {
        grid-template-columns: 1fr;
      }
      .button-group {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>

  <!-- ========== NAVBAR ========== -->
  <nav class="navbar navbar-tradehub">
    <a class="brand" href="../index.php">
      <div class="brand-icon">
        <img src="../logo.png" alt="logo">
      </div>
      TradeHub
    </a>
    <div class="nav-links">
      <a href="../pages/categoris.php">Products</a>
      <a href="../pages/suppliers.php">Suppliers</a>
      <a href="../pages/about.php">About</a>
      <a href="../pages/help.php">Help</a>
    </div>
    <div class="nav-actions">
      <a href="../pages/profile.php" class="btn btn-ghost btn-sm">Profile</a>
      <a href="../pages/logout.php" class="btn btn-primary btn-sm">Logout</a>
    </div>
  </nav>

  <!-- ========== SELLER LAYOUT ========== -->
  <div class="seller-layout">

    <!-- Sidebar -->
    <aside class="seller-sidebar">
      <div style="padding: 0 20px; margin-bottom: 24px; border-bottom: 1px solid var(--border); padding-bottom: 16px;">
        <div style="font-size: 14px; font-weight: 600; color: var(--dark); margin-bottom: 4px;">Seller Menu</div>
        <div style="font-size: 12px; color: var(--text-muted);">Manage your catalog</div>
      </div>

      <ul class="sidebar-menu">
        <li><a href="seller_dashboard.php">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M3 12a9 9 0 1 0 18 0A9 9 0 0 0 3 12Z"></path>
              <path d="M12 7v5l3 1.5"></path>
            </svg>
            Dashboard
          </a></li>
        <li><a href="seller_products.php">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
              <line x1="3" y1="6" x2="21" y2="6"></line>
            </svg>
            My Products
          </a></li>
        <li><a href="seller_add_product.php">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" y1="8" x2="12" y2="16"></line>
              <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            Add Product
          </a></li>
        <li><a href="../pages/profile.php">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            My Profile
          </a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="seller-content">

      <div style="margin-bottom: 30px;">
        <h1 style="font-size: 28px; font-weight: 700; color: var(--dark); margin-bottom: 8px;">Edit Product</h1>
        <p style="color: var(--text-muted); margin: 0;">Update your product details below.</p>
      </div>

      <div class="form-card">

        <!-- Messages -->
        <?php if (!empty($error_message)): ?>
          <div class="alert alert-error">
            <?php echo htmlspecialchars($error_message); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
          <div class="alert alert-success">
            <?php echo htmlspecialchars($success_message); ?>
          </div>
        <?php endif; ?>

        <!-- Product Form -->
        <form method="POST" action="seller_edit_product.php?id=<?php echo $product_id; ?>">

          <div class="form-group">
            <label class="form-label">Product Name *</label>
            <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required 
                   value="<?php echo htmlspecialchars($product['product_name']); ?>" />
          </div>

          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Describe your product..."><?php echo htmlspecialchars($product['description'] ?? ''); ?></textarea>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Category</label>
              <input type="text" name="category" class="form-control" placeholder="e.g., Electronics" 
                     value="<?php echo htmlspecialchars($product['category'] ?? ''); ?>" />
            </div>

            <div class="form-group">
              <label class="form-label">SKU</label>
              <input type="text" name="sku" class="form-control" placeholder="e.g., PROD-001" 
                     value="<?php echo htmlspecialchars($product['sku'] ?? ''); ?>" />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Price ($) *</label>
              <input type="number" name="price" class="form-control" placeholder="0.00" step="0.01" min="0" required 
                     value="<?php echo htmlspecialchars($product['price']); ?>" />
            </div>

            <div class="form-group">
              <label class="form-label">Quantity in Stock *</label>
              <input type="number" name="quantity" class="form-control" placeholder="0" min="0" required 
                     value="<?php echo htmlspecialchars($product['quantity']); ?>" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Status *</label>
            <select name="status" class="form-control" required>
              <option value="draft" <?php echo $product['status'] === 'draft' ? 'selected' : ''; ?>>Draft (Not Listed)</option>
              <option value="active" <?php echo $product['status'] === 'active' ? 'selected' : ''; ?>>Active (Listed)</option>
              <option value="inactive" <?php echo $product['status'] === 'inactive' ? 'selected' : ''; ?>>Inactive (Hidden)</option>
            </select>
          </div>

          <div class="button-group">
            <button type="submit" class="btn btn-primary" style="font-size: 15px;">Update Product</button>
            <a href="seller_products.php" class="btn btn-ghost">Cancel</a>
          </div>

        </form>

      </div>

    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
