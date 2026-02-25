<?php
/**
 * Seller My Products Page
 * View and manage all seller's products
 */

require_once '../db_connect.php';
require_once '../check_session.php';
require_once '../seller_check.php';

$user = getLoggedInUser();
$seller_id = $user['id'];

// Get filter/search parameters
$filter_status = isset($_GET['status']) ? trim($_GET['status']) : '';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Build query
$query = "SELECT id, product_name, category, price, quantity, status, created_at FROM products WHERE seller_id = ?";
$params = [$seller_id];
$types = "i";

// Add search filter
if (!empty($search)) {
    $query .= " AND (product_name LIKE ? OR category LIKE ?)";
    $search_param = "%" . $search . "%";
    $params[] = $search_param;
    $params[] = $search_param;
    $types .= "ss";
}

// Add status filter
if (!empty($filter_status)) {
    $query .= " AND status = ?";
    $params[] = $filter_status;
    $types .= "s";
}

$query .= " ORDER BY created_at DESC";

// Get products
$products = [];
$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Products — Seller Dashboard | TradeHub</title>
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

    .filter-bar {
      background: white;
      padding: 20px;
      border-radius: var(--radius-lg);
      margin-bottom: 24px;
      border: 1px solid var(--border);
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      align-items: center;
    }

    .filter-bar input,
    .filter-bar select {
      padding: 8px 12px;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      font-size: 14px;
    }

    .filter-bar input {
      flex: 1;
      min-width: 200px;
    }

    .products-table {
      background: white;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: var(--shadow);
    }

    .products-table table {
      margin: 0;
      width: 100%;
    }

    .products-table th {
      background: var(--bg-page);
      border-bottom: 1px solid var(--border);
      padding: 16px;
      font-weight: 600;
      color: var(--dark);
      font-size: 13px;
    }

    .products-table td {
      padding: 16px;
      border-bottom: 1px solid var(--border);
      font-size: 14px;
    }

    .status-badge {
      display: inline-block;
      padding: 4px 12px;
      border-radius: var(--radius);
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .status-badge.active {
      background: #DCFCE7;
      color: #166534;
    }

    .status-badge.draft {
      background: #FEF3C7;
      color: #92400E;
    }

    .status-badge.inactive {
      background: #FEE2E2;
      color: #991B1B;
    }

    .action-buttons {
      display: flex;
      gap: 8px;
    }

    .btn-small {
      padding: 6px 12px;
      font-size: 12px;
      border-radius: var(--radius);
    }

    .empty-state {
      text-align: center;
      padding: 60px 40px;
      background: white;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      color: var(--text-muted);
    }

    .empty-state h3 {
      color: var(--dark);
      margin-bottom: 8px;
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
      .filter-bar {
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
        <li><a href="seller_products.php" class="active">
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
        <h1 style="font-size: 28px; font-weight: 700; color: var(--dark); margin-bottom: 8px;">My Products</h1>
        <p style="color: var(--text-muted); margin: 0;">View and manage all your products in one place.</p>
      </div>

      <!-- Filter Bar -->
      <form method="GET" action="seller_products.php" class="filter-bar">
        <input type="text" name="search" placeholder="Search by product name or category..." value="<?php echo htmlspecialchars($search); ?>" />
        <select name="status">
          <option value="">All Statuses</option>
          <option value="active" <?php echo $filter_status === 'active' ? 'selected' : ''; ?>>Active</option>
          <option value="draft" <?php echo $filter_status === 'draft' ? 'selected' : ''; ?>>Draft</option>
          <option value="inactive" <?php echo $filter_status === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="seller_products.php" class="btn btn-ghost">Clear</a>
      </form>

      <!-- Products Table -->
      <?php if (!empty($products)): ?>
        <div class="products-table">
          <table>
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product): ?>
                <tr>
                  <td style="font-weight: 500;"><?php echo htmlspecialchars($product['product_name']); ?></td>
                  <td><?php echo htmlspecialchars($product['category'] ?? 'N/A'); ?></td>
                  <td style="font-weight: 600;">$<?php echo number_format($product['price'] ?? 0, 2); ?></td>
                  <td><?php echo $product['quantity'] ?? 0; ?></td>
                  <td>
                    <span class="status-badge <?php echo htmlspecialchars($product['status']); ?>">
                      <?php echo ucfirst(htmlspecialchars($product['status'])); ?>
                    </span>
                  </td>
                  <td style="font-size: 13px; color: var(--text-muted);">
                    <?php echo date('M d, Y', strtotime($product['created_at'])); ?>
                  </td>
                  <td>
                    <div class="action-buttons">
                      <a href="seller_edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-primary btn-small">Edit</a>
                      <a href="seller_delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-danger btn-small" onclick="return confirm('Delete this product?')">Delete</a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="empty-state">
          <h3>No Products Found</h3>
          <p><?php echo !empty($search) || !empty($filter_status) ? 'Try adjusting your filters.' : 'Add your first product to get started.'; ?></p>
          <a href="seller_add_product.php" class="btn btn-primary" style="margin-top: 16px;">+ Add Product</a>
        </div>
      <?php endif; ?>

    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
