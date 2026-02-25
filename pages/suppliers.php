<?php
/**
 * Suppliers Directory Page
 * List all verified suppliers
 */

require_once '../db_connect.php';
require_once '../check_session.php';

// Fetch all sellers from database
$stmt = $conn->prepare("
    SELECT id, full_name 
    FROM users 
    WHERE role = 'seller' 
    ORDER BY full_name ASC
");
$stmt->execute();
$result = $stmt->get_result();
$suppliers = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Find Suppliers — TradeHub</title>
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
      <span class="current">Suppliers</span>
    </div>

    <!-- Page Header -->
    <section style="background:var(--white); padding:40px 72px 32px; border-bottom:1px solid var(--border);">
      <div class="section-title">Find Suppliers</div>
      <div class="section-subtitle">Showing <?php echo count($suppliers); ?> verified suppliers</div>

      <!-- Search Bar -->
      <div class="flex items-center gap-4 mt-6">
        <div class="search-bar" style="flex:1; max-width:560px; box-shadow:none; border:1px solid var(--border);">
          <input type="text" placeholder="Search suppliers…" style="padding:10px 16px;" />
          <button class="btn btn-primary" style="border-radius:0;">Search</button>
        </div>
      </div>
    </section>

    <!-- Suppliers Grid -->
    <div style="padding:40px 72px 80px;">
      <?php if (count($suppliers) > 0): ?>
        <div class="grid-3" style="gap:24px;">
          <?php foreach ($suppliers as $supplier): ?>
            <a href="supplier_profile.php?id=<?php echo intval($supplier['id']); ?>" style="text-decoration:none; color:inherit;">
              <div class="product-card" style="cursor:pointer; transition:all 0.3s; height:100%;">
                <!-- Supplier Logo -->
                <div style="width:100%; height:180px; background:linear-gradient(180deg,#1E40AF,#3B82F6); display:flex; align-items:center; justify-content:center;">
                  <svg width="64" height="64" viewBox="0 0 48 48" fill="none">
                    <rect x="10" y="4" width="20" height="30" rx="2" stroke="white" stroke-width="3" />
                    <rect x="4" y="24" width="7" height="16" rx="1.5" stroke="white" stroke-width="3" />
                    <rect x="34" y="18" width="7" height="22" rx="1.5" stroke="white" stroke-width="3" />
                  </svg>
                </div>
                <div class="product-body">
                  <div class="product-name"><?php echo htmlspecialchars($supplier['full_name']); ?></div>
                  <div class="product-info">Verified Supplier</div>
                  <div class="product-info text-sm" style="margin-top:8px; color:var(--text-muted);">
                    Manufacturing & Production
                  </div>
                  <div class="flex items-center justify-between mt-4">
                    <span class="badge badge-blue">Verified</span>
                    <span style="color:var(--primary); font-size:14px; font-weight:600;">View →</span>
                  </div>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div style="text-align:center; padding:60px 40px; background:var(--white); border-radius:8px;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="1.5" style="margin:0 auto 12px;">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M8 12h8"></path>
          </svg>
          <div style="font-size:16px; font-weight:600; color:var(--dark); margin-bottom:8px;">No suppliers found</div>
          <div style="color:var(--text-muted); font-size:14px;">Check back soon for new suppliers</div>
        </div>
      <?php endif; ?>
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
        <div class="footer-brand">The world's leading B2B marketplace connecting buyers and suppliers across 190+ countries.</div>
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