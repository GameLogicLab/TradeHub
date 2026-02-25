<<<<<<< HEAD
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
=======
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<<<<<<< HEAD
  <title>Find Suppliers — TradeHub</title>
=======
  <title>Supplier Profile — ShenZhen Machinery Co. | TradeHub</title>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
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
<<<<<<< HEAD
      <?php if (isLoggedIn()): ?>
        <a href="profile.php" class="btn btn-ghost btn-sm">Profile</a>
        <a href="logout.php" class="btn btn-primary btn-sm">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-ghost btn-sm">Log in</a>
        <a href="signup.php" class="btn btn-primary btn-sm">Get Started</a>
      <?php endif; ?>
=======
      <a href="login.php" class="btn btn-ghost btn-sm">Log in</a>
      <a href="signup.php" class="btn btn-primary btn-sm">Get Started</a>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
    </div>
  </nav>

  <div class="page-wrapper">

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <a href="../index.php">Home</a>
      <span>›</span>
<<<<<<< HEAD
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
=======
      <a href="#">Suppliers</a>
      <span>›</span>
      <span class="current">ShenZhen Machinery Co.</span>
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
            <h1 style="font-size:28px;font-weight:700;color:var(--dark);">ShenZhen Machinery Co.</h1>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <circle cx="12" cy="12" r="11" fill="#1E40AF" />
              <path d="M7 12l3.5 3.5L17 9" stroke="white" stroke-width="2.2" stroke-linecap="round" />
            </svg>
            <span class="badge badge-gold" style="font-size:12px;padding:4px 10px;">GOLD SUPPLIER</span>
          </div>
          <div class="flex items-center gap-4 mt-2">
            <span class="text-muted text-sm">📍 Shenzhen, Guangdong, China</span>
            <span class="divider-v">|</span>
            <span class="text-muted text-sm">⭐ 4.8/5 (312 reviews)</span>
            <span class="divider-v">|</span>
            <span class="text-muted text-sm">🏭 15 years in business</span>
            <span class="divider-v">|</span>
            <span class="text-muted text-sm">👥 500+ employees</span>
          </div>
          <div class="text-sm text-muted mt-2">CNC Machines · Lathes · Milling Equipment · Precision Parts</div>
        </div>
        <div class="flex gap-3 flex-col" style="align-items:flex-end;">
          <a href="rfq.php" class="btn btn-primary">Send Inquiry</a>
          <button class="btn btn-outline btn-sm">Contact Supplier</button>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="flex gap-8 mt-6 pt-6" style="border-top:1px solid var(--border);">
        <div>
          <div class="font-bold" style="font-size:20px;color:var(--primary);">$50M+</div>
          <div class="text-sm text-muted">Annual Revenue</div>
        </div>
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
          <div class="font-bold" style="font-size:20px;color:var(--primary);">58</div>
          <div class="text-sm text-muted">Countries Exported</div>
        </div>
      </div>
    </div>

    <!-- Tabs -->
    <div style="background:var(--white); padding:0 72px; border-bottom:1px solid var(--border);">
      <div class="tabs">
        <div class="tab-item active">Products</div>
        <div class="tab-item">Company Profile</div>
        <div class="tab-item">Certifications</div>
        <div class="tab-item">Reviews</div>
      </div>
    </div>

    <!-- Products Tab Content -->
    <div style="padding:40px 72px 80px;">
      <div class="flex justify-between items-center mb-6">
        <div class="font-semibold" style="font-size:18px;">Product Catalog <span class="text-muted"
            style="font-weight:400;font-size:14px;">(6 items)</span></div>
        <select class="form-control" style="width:160px;">
          <option>All Products</option>
          <option>CNC Machines</option>
          <option>Lathes</option>
          <option>Precision Parts</option>
        </select>
      </div>

      <div class="grid-3" style="gap:24px;">

        <div class="product-card">
          <img class="product-img" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&q=80"
            alt="CNC Machine" />
          <div class="product-body">
            <div class="product-name">CNC Milling Machine Pro X500</div>
            <div class="product-price">$12,500 – $18,000</div>
            <div class="product-info">MOQ: 1 Unit &nbsp;·&nbsp; Lead Time: 30 days</div>
            <div class="flex items-center justify-between mt-4">
              <span class="badge badge-green">In Stock</span>
              <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
            </div>
          </div>
        </div>

        <div class="product-card">
          <img class="product-img" src="https://images.unsplash.com/photo-1565043666747-69f6646db940?w=500&q=80"
            alt="CNC Lathe" />
          <div class="product-body">
            <div class="product-name">CNC Lathe Machine TL-1800</div>
            <div class="product-price">$8,000 – $14,000</div>
            <div class="product-info">MOQ: 1 Unit &nbsp;·&nbsp; Lead Time: 25 days</div>
            <div class="flex items-center justify-between mt-4">
              <span class="badge badge-green">In Stock</span>
              <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
            </div>
          </div>
        </div>

        <div class="product-card">
          <img class="product-img" src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=500&q=80"
            alt="Robotic Arm" />
          <div class="product-body">
            <div class="product-name">6-Axis Industrial Robotic Arm</div>
            <div class="product-price">$22,000 – $40,000</div>
            <div class="product-info">MOQ: 1 Unit &nbsp;·&nbsp; Lead Time: 45 days</div>
            <div class="flex items-center justify-between mt-4">
              <span class="badge badge-green">In Stock</span>
              <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
            </div>
          </div>
        </div>

        <div class="product-card">
          <img class="product-img" src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&q=80"
            alt="PCB" />
          <div class="product-body">
            <div class="product-name">Custom PCB Board Assembly</div>
            <div class="product-price">$0.50 – $15 / pcs</div>
            <div class="product-info">MOQ: 1,000 pcs &nbsp;·&nbsp; Lead Time: 15 days</div>
            <div class="flex items-center justify-between mt-4">
              <span class="badge badge-green">In Stock</span>
              <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
            </div>
          </div>
        </div>

        <div class="product-card">
          <img class="product-img" src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80"
            alt="Precision Parts" />
          <div class="product-body">
            <div class="product-name">Precision Machined Aluminum Parts</div>
            <div class="product-price">$5 – $120 / pcs</div>
            <div class="product-info">MOQ: 100 pcs &nbsp;·&nbsp; Lead Time: 20 days</div>
            <div class="flex items-center justify-between mt-4">
              <span class="badge badge-green">In Stock</span>
              <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
            </div>
          </div>
        </div>

        <div class="product-card">
          <img class="product-img" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500&q=80"
            alt="Grinding Machine" />
          <div class="product-body">
            <div class="product-name">Surface Grinding Machine SGM-600</div>
            <div class="product-price">$6,500 – $11,000</div>
            <div class="product-info">MOQ: 1 Unit &nbsp;·&nbsp; Lead Time: 28 days</div>
            <div class="flex items-center justify-between mt-4">
              <span class="badge badge-blue">Made to Order</span>
              <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
            </div>
          </div>
        </div>

      </div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
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
<<<<<<< HEAD
        <div class="footer-brand">The world's leading B2B marketplace connecting buyers and suppliers across 190+ countries.</div>
=======
        <div class="footer-brand">Global B2B marketplace across 190+ countries.</div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
      </div>
      <div>
        <h4>Platform</h4>
        <ul>
          <li><a href="categoris.php">Browse Products</a></li>
<<<<<<< HEAD
          <li><a href="suppliers.php">Find Suppliers</a></li>
=======
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
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
<<<<<<< HEAD
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2025 TradeHub Technologies Ltd. All rights reserved.</span>
    </div>
=======
          <li><a href="#">Terms</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom"><span>© 2025 TradeHub Technologies Ltd.</span></div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>