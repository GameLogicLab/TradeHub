<?php
/**
 * Supplier Profile Page
 * Display individual supplier details
 */

require_once '../db_connect.php';
require_once '../check_session.php';

// Get supplier ID from URL
$supplier_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($supplier_id <= 0) {
    header('Location: suppliers.php');
    exit;
}

// Fetch supplier details from users table
$stmt = $conn->prepare("SELECT id, full_name FROM users WHERE id = ? AND role = 'seller'");
$stmt->bind_param('i', $supplier_id);
$stmt->execute();
$result = $stmt->get_result();
$supplier = $result->fetch_assoc();
$stmt->close();

if (!$supplier) {
    header('Location: suppliers.php');
    exit;
}

// Fetch supplier's products
$stmt = $conn->prepare("
    SELECT id, product_name, description, category, price, quantity, sku, status 
    FROM products 
    WHERE seller_id = ? AND status = 'active'
    ORDER BY created_at DESC
    LIMIT 6
");
$stmt->bind_param('i', $supplier_id);
$stmt->execute();
$products_result = $stmt->get_result();
$products = $products_result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Supplier Profile — <?php echo htmlspecialchars($supplier['full_name']); ?> | TradeHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/global.css" />
</head>

<body>

  <!-- ========== NAVBAR (Bootstrap) ========== -->
  <nav class="navbar navbar-tradehub">
    <a class="brand" href="../index.php">
      <div class="brand-icon">
        <img src="../logo.png" alt="logo">
      </div>
      TradeHub
    </a>
    <div class="nav-links">
      <a href="categoris.php">Products</a>
      <a href="suppliers.php" class="active">Suppliers</a>
      <a href="rfq.php">RFQ</a>
      <a href="about.php">About</a>
      <a href="help.php">Help</a>
    </div>
    <div class="nav-actions">
      <?php if (isLoggedIn()): ?>
        <a href="profile.php" class="btn btn-ghost btn-sm">Profile</a>
        <a href="logout.php" class="btn btn-primary btn-sm">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-ghost btn-sm">Log in</a>
        <a href="signup.php" class="btn btn-primary btn-sm">Get Started</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="page-wrapper">

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <a href="../index.php">Home</a>
      <span>›</span>
      <a href="suppliers.php">Suppliers</a>
      <span>›</span>
      <span class="current"><?php echo htmlspecialchars($supplier['full_name']); ?></span>
    </div>

    <!-- ===== Supplier Hero Header ===== -->
    <div style="background:var(--white); border-bottom:1px solid var(--border); padding:40px 72px;">
      <div class="flex gap-6 items-center">
        <!-- Logo -->
        <div
          style="width:96px;height:96px;background:linear-gradient(180deg,#1E40AF,#3B82F6);border-radius:16px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
            <rect x="10" y="4" width="20" height="30" rx="2" stroke="white" stroke-width="3" />
            <rect x="4" y="24" width="7" height="16" rx="1.5" stroke="white" stroke-width="3" />
            <rect x="34" y="18" width="7" height="22" rx="1.5" stroke="white" stroke-width="3" />
          </svg>
        </div>
        <div style="flex:1;">
          <div class="flex items-center gap-3">
            <h1 style="font-size:28px;font-weight:700;color:var(--dark);"><?php echo htmlspecialchars($supplier['full_name']); ?></h1>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="11" fill="#1E40AF" />
              <path d="M7 12l3.5 3.5L17 9" stroke="white" stroke-width="2.2" stroke-linecap="round" />
            </svg>
            <span class="badge badge-blue" style="font-size:12px;padding:4px 10px;">VERIFIED</span>
          </div>
          <div class="flex items-center gap-4 mt-2">
            <span class="text-muted text-sm">📍 Manufacturing</span>
            <span class="divider-v">|</span>
            <span class="text-muted text-sm">⭐ 4.8/5</span>
            <span class="divider-v">|</span>
            <span class="text-muted text-sm">🏭 Active Supplier</span>
          </div>
        </div>
        <div class="flex gap-3 flex-col" style="align-items:flex-end;">
          <a href="rfq.php" class="btn btn-primary">Send Inquiry</a>
          <button class="btn btn-outline btn-sm">Contact Supplier</button>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="flex gap-8 mt-6 pt-6" style="border-top:1px solid var(--border);">
        <div>
          <div class="font-bold" style="font-size:20px;color:var(--primary);">ISO 9001</div>
          <div class="text-sm text-muted">Certified</div>
        </div>
        <div>
          <div class="font-bold" style="font-size:20px;color:var(--primary);">48h</div>
          <div class="text-sm text-muted">Avg. Response Time</div>
        </div>
        <div>
          <div class="font-bold" style="font-size:20px;color:var(--primary);">96%</div>
          <div class="text-sm text-muted">On-Time Delivery</div>
        </div>
        <div>
          <div class="font-bold" style="font-size:20px;color:var(--primary);"><?php echo count($products); ?></div>
          <div class="text-sm text-muted">Active Products</div>
        </div>
      </div>
    </div>

    <!-- Products Tab Content -->
    <div style="padding:40px 72px 80px;">
      <div class="flex justify-between items-center mb-6">
        <div class="font-semibold" style="font-size:18px;">Product Catalog <span class="text-muted"
            style="font-weight:400;font-size:14px;">(<?php echo count($products); ?> items)</span></div>
      </div>

      <div class="grid-3" style="gap:24px;">
        <?php if (count($products) > 0): ?>
          <?php foreach ($products as $product): ?>
            <div class="product-card">
              <img class="product-img" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&q=80"
                alt="<?php echo htmlspecialchars($product['product_name']); ?>" />
              <div class="product-body">
                <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
                <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                <div class="product-info">Stock: <?php echo intval($product['quantity']); ?> units</div>
                <div class="flex items-center justify-between mt-4">
                  <span class="badge badge-green">In Stock</span>
                  <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="grid-column: 1/-1; text-align: center; color: var(--text-muted); padding: 40px;">
            No products available from this supplier.
          </p>
        <?php endif; ?>
      </div>
    </div>

  </div>

  <!-- ========== FOOTER ========== -->
  <footer class="footer">
    <div class="footer-grid">
      <div>
        <div class="brand" style="color:white;">
          <div class="brand-icon">
            <img src="../logo.png" alt="logo">
          </div>
          TradeHub
        </div>
        <div class="footer-brand">Global B2B marketplace across 190+ countries.</div>
      </div>
      <div>
        <h4>Platform</h4>
        <ul>
          <li><a href="categoris.php">Browse Products</a></li>
          <li><a href="suppliers.php">Find Suppliers</a></li>
          <li><a href="rfq.php">Post RFQ</a></li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li><a href="about.php">About Us</a></li>
          <li><a href="help.php">Help Center</a></li>
        </ul>
      </div>
      <div>
        <h4>Legal</h4>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2025 TradeHub Technologies Ltd. All rights reserved.</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
