<?php
/**
 * Seller Dashboard
 * Display seller overview and product statistics
 */

require_once '../db_connect.php';
require_once '../check_session.php';
require_once '../seller_check.php';

$user = getLoggedInUser();
$seller_id = $user['id'];

// Get seller statistics
$stats = [
    'total_products' => 0,
    'active_products' => 0,
    'draft_products' => 0,
    'total_inventory' => 0
];

$stmt = $conn->prepare("
    SELECT 
        COUNT(*) as total,
        SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) as active,
        SUM(CASE WHEN status = 'draft' THEN 1 ELSE 0 END) as draft,
        SUM(quantity) as inventory
    FROM products 
    WHERE seller_id = ?
");
$stmt->bind_param("i", $seller_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

$stats['total_products'] = $data['total'] ?? 0;
$stats['active_products'] = $data['active'] ?? 0;
$stats['draft_products'] = $data['draft'] ?? 0;
$stats['total_inventory'] = $data['inventory'] ?? 0;

// Get recent products
$recent_products = [];
$stmt = $conn->prepare("
    SELECT id, product_name, category, price, quantity, status, created_at
    FROM products 
    WHERE seller_id = ?
    ORDER BY created_at DESC
    LIMIT 5
");
$stmt->bind_param("i", $seller_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $recent_products[] = $row;
}
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seller Dashboard — TradeHub</title>
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

    .stat-card {
      background: white;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 24px;
      text-align: center;
      box-shadow: var(--shadow);
    }

    .stat-value {
      font-size: 32px;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 8px;
    }

    .stat-label {
      color: var(--text-muted);
      font-size: 14px;
      font-weight: 500;
    }

    .section-title {
      font-size: 20px;
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 24px;
      margin-top: 32px;
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
        <li><a href="seller_dashboard.php" class="active">
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

      <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: var(--dark); margin-bottom: 8px;">Seller Dashboard</h1>
        <p style="color: var(--text-muted); margin: 0;">Welcome back, <?php echo htmlspecialchars($user['full_name']); ?>! Manage your products and track sales.</p>
      </div>

      <!-- Statistics Cards -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div class="stat-card">
          <div class="stat-value"><?php echo $stats['total_products']; ?></div>
          <div class="stat-label">Total Products</div>
        </div>
        <div class="stat-card">
          <div class="stat-value" style="color: #16a34a;"><?php echo $stats['active_products']; ?></div>
          <div class="stat-label">Active Products</div>
        </div>
        <div class="stat-card">
          <div class="stat-value" style="color: #ea580c;"><?php echo $stats['draft_products']; ?></div>
          <div class="stat-label">Draft Products</div>
        </div>
        <div class="stat-card">
          <div class="stat-value" style="color: #0891b2;"><?php echo $stats['total_inventory']; ?></div>
          <div class="stat-label">Total Inventory</div>
        </div>
      </div>

      <!-- Recent Products -->
      <div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
          <h2 class="section-title" style="margin: 0;">Recent Products</h2>
          <a href="seller_add_product.php" class="btn btn-primary btn-sm" style="font-size: 14px;">+ Add Product</a>
        </div>

        <?php if (!empty($recent_products)): ?>
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
                <?php foreach ($recent_products as $product): ?>
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
          <div class="stat-card">
            <div class="empty-state">
              <h3>No Products Yet</h3>
              <p>Start by adding your first product to get started.</p>
              <a href="seller_add_product.php" class="btn btn-primary" style="margin-top: 16px;">Add Your First Product</a>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
