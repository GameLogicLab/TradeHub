<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Supplier Profile — ShenZhen Machinery Co. | TradeHub</title>
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
      <a href="login.php" class="btn btn-ghost btn-sm">Log in</a>
      <a href="signup.php" class="btn btn-primary btn-sm">Get Started</a>
    </div>
  </nav>

  <div class="page-wrapper">

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <a href="../index.php">Home</a>
      <span>›</span>
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
          <li><a href="#">Terms</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom"><span>© 2025 TradeHub Technologies Ltd.</span></div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>