<<<<<<< HEAD
<?php
/**
 * Products / Categories Page
 * Displays products with filtering by category, price range, and seller
 */

require_once '../db_connect.php';
require_once '../check_session.php';

// Default values
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$price_min = isset($_GET['price_min']) ? intval($_GET['price_min']) : 0;
$price_max = isset($_GET['price_max']) ? intval($_GET['price_max']) : 999999;
$seller = isset($_GET['seller']) ? intval($_GET['seller']) : 0;

// Build WHERE clause for filtering
$where_conditions = array("status = 'active'");
$params = array();
$types = "";

if (!empty($category)) {
    $where_conditions[] = "category LIKE ?";
    $params[] = '%' . $category . '%';
    $types .= 's';
}

if ($price_min > 0) {
    $where_conditions[] = "price >= ?";
    $params[] = $price_min;
    $types .= 'i';
}

if ($price_max < 999999) {
    $where_conditions[] = "price <= ?";
    $params[] = $price_max;
    $types .= 'i';
}

if ($seller > 0) {
    $where_conditions[] = "seller_id = ?";
    $params[] = $seller;
    $types .= 'i';
}

// Build the query
$where_clause = implode(' AND ', $where_conditions);
$query = "SELECT id, product_name, price, quantity, seller_id FROM products WHERE " . $where_clause . " ORDER BY created_at DESC LIMIT 100";

// Execute the query
$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
$total_products = count($products);
$stmt->close();

// Fetch seller names for the filter dropdown
$sellers_query = "SELECT DISTINCT u.id, u.full_name FROM users u 
                  INNER JOIN products p ON u.id = p.seller_id 
                  WHERE u.role = 'seller' ORDER BY u.full_name ASC";
$sellers_result = $conn->query($sellers_query);
$sellers = $sellers_result->fetch_all(MYSQLI_ASSOC);

?>
=======
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products — TradeHub</title>
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
      <a href="categoris.php" class="active">Products</a>
      <a href="suppliers.php">Suppliers</a>
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
      <span class="current">Products</span>
    </div>

    <!-- Page Header -->
    <section style="background:var(--white); padding:40px 72px 32px; border-bottom:1px solid var(--border);">
      <div class="section-title">Browse Products</div>
<<<<<<< HEAD
      <div class="section-subtitle">Showing 1–<?php echo min($total_products, 16); ?> of <?php echo $total_products; ?> results</div>
=======
      <div class="section-subtitle">Showing 1–16 of 2,400 results</div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f

      <!-- Search + Filter Bar -->
      <div class="flex items-center gap-4 mt-6">
        <div class="search-bar" style="flex:1; max-width:560px; box-shadow:none; border:1px solid var(--border);">
          <input type="text" placeholder="Search products…" style="padding:10px 16px;" />
          <button class="btn btn-primary" style="border-radius:0;">Search</button>
        </div>
        <div class="flex items-center gap-2">
          <span class="text-sm text-muted">Sort:</span>
          <select class="form-control" style="width:160px;">
            <option>Best Match</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Newest</option>
            <option>Top Rated</option>
          </select>
        </div>
      </div>
    </section>

    <!-- Layout: Sidebar + Grid -->
    <div class="flex" style="gap:32px; padding:32px 72px 80px; align-items:flex-start;">

      <!-- ---- Sidebar Filters ---- -->
      <aside class="filter-sidebar">
        <div class="font-semibold mb-4" style="font-size:15px;">Filters</div>

<<<<<<< HEAD
        <form method="GET" style="display:contents;">

          <div class="filter-group">
            <h4>Category</h4>
            <div class="checkbox-item">
              <input type="radio" id="cat_all" name="category" value="" <?php echo empty($category) ? 'checked' : ''; ?> />
              <label for="cat_all">All Categories</label>
            </div>
            <div class="checkbox-item">
              <input type="radio" id="cat_machinery" name="category" value="Industrial Machinery" <?php echo $category === 'Industrial Machinery' ? 'checked' : ''; ?> />
              <label for="cat_machinery">Industrial Machinery</label>
            </div>
            <div class="checkbox-item">
              <input type="radio" id="cat_electronics" name="category" value="Electronics" <?php echo $category === 'Electronics' ? 'checked' : ''; ?> />
              <label for="cat_electronics">Electronics</label>
            </div>
            <div class="checkbox-item">
              <input type="radio" id="cat_steel" name="category" value="Steel & Metals" <?php echo $category === 'Steel & Metals' ? 'checked' : ''; ?> />
              <label for="cat_steel">Steel & Metals</label>
            </div>
            <div class="checkbox-item">
              <input type="radio" id="cat_textiles" name="category" value="Textiles" <?php echo $category === 'Textiles' ? 'checked' : ''; ?> />
              <label for="cat_textiles">Textiles</label>
            </div>
            <div class="checkbox-item">
              <input type="radio" id="cat_safety" name="category" value="Safety Equipment" <?php echo $category === 'Safety Equipment' ? 'checked' : ''; ?> />
              <label for="cat_safety">Safety Equipment</label>
            </div>
            <div class="checkbox-item">
              <input type="radio" id="cat_energy" name="category" value="Green Energy" <?php echo $category === 'Green Energy' ? 'checked' : ''; ?> />
              <label for="cat_energy">Green Energy</label>
            </div>
          </div>

          <div class="filter-group">
            <h4>Price Range</h4>
            <div class="flex gap-2 items-center">
              <input class="form-control" type="number" name="price_min" placeholder="Min" style="width:90px;" value="<?php echo $price_min > 0 ? $price_min : ''; ?>" />
              <span class="text-muted">—</span>
              <input class="form-control" type="number" name="price_max" placeholder="Max" style="width:90px;" value="<?php echo $price_max < 999999 ? $price_max : ''; ?>" />
            </div>
          </div>

          <div class="filter-group">
            <h4>Supplier</h4>
            <select class="form-control" name="seller" style="width:100%;">
              <option value="">All Suppliers</option>
              <?php foreach ($sellers as $s): ?>
                <option value="<?php echo intval($s['id']); ?>" <?php echo $seller === intval($s['id']) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($s['full_name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-full mt-4">Apply Filters</button>
          <a href="categoris.php" class="btn btn-ghost w-full mt-2 text-sm" style="display:block; text-align:center;">Clear All</a>
        </form>
=======
        <div class="filter-group">
          <h4>Category</h4>
          <div class="checkbox-item"><input type="checkbox" id="c1" checked /><label for="c1">Industrial
              Machinery</label></div>
          <div class="checkbox-item"><input type="checkbox" id="c2" /><label for="c2">Electronics</label></div>
          <div class="checkbox-item"><input type="checkbox" id="c3" /><label for="c3">Steel & Metals</label></div>
          <div class="checkbox-item"><input type="checkbox" id="c4" /><label for="c4">Textiles</label></div>
          <div class="checkbox-item"><input type="checkbox" id="c5" /><label for="c5">Safety Equipment</label></div>
          <div class="checkbox-item"><input type="checkbox" id="c6" /><label for="c6">Green Energy</label></div>
        </div>

        <div class="filter-group">
          <h4>Price Range</h4>
          <div class="flex gap-2 items-center">
            <input class="form-control" type="number" placeholder="Min" style="width:90px;" />
            <span class="text-muted">—</span>
            <input class="form-control" type="number" placeholder="Max" style="width:90px;" />
          </div>
        </div>

        <div class="filter-group">
          <h4>Supplier Country</h4>
          <div class="checkbox-item"><input type="checkbox" id="r1" checked /><label for="r1">China</label></div>
          <div class="checkbox-item"><input type="checkbox" id="r2" /><label for="r2">Germany</label></div>
          <div class="checkbox-item"><input type="checkbox" id="r3" /><label for="r3">India</label></div>
          <div class="checkbox-item"><input type="checkbox" id="r4" /><label for="r4">Taiwan</label></div>
          <div class="checkbox-item"><input type="checkbox" id="r5" /><label for="r5">South Korea</label></div>
        </div>

        <div class="filter-group">
          <h4>Minimum Order</h4>
          <div class="checkbox-item"><input type="checkbox" id="m1" /><label for="m1">1 unit</label></div>
          <div class="checkbox-item"><input type="checkbox" id="m2" /><label for="m2">10–100 units</label></div>
          <div class="checkbox-item"><input type="checkbox" id="m3" /><label for="m3">100–500 units</label></div>
          <div class="checkbox-item"><input type="checkbox" id="m4" /><label for="m4">500+ units</label></div>
        </div>

        <div class="filter-group">
          <h4>Certifications</h4>
          <div class="checkbox-item"><input type="checkbox" id="cert1" /><label for="cert1">ISO 9001</label></div>
          <div class="checkbox-item"><input type="checkbox" id="cert2" /><label for="cert2">CE Certified</label></div>
          <div class="checkbox-item"><input type="checkbox" id="cert3" /><label for="cert3">RoHS Compliant</label></div>
        </div>

        <button class="btn btn-primary w-full mt-4">Apply Filters</button>
        <button class="btn btn-ghost w-full mt-2 text-sm">Clear All</button>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
      </aside>

      <!-- ---- Product Grid ---- -->
      <div style="flex:1;">
<<<<<<< HEAD
        <?php if ($total_products > 0): ?>
          <div class="grid-3" style="gap:20px;">

            <?php foreach ($products as $product): ?>
              <?php
              // Fetch seller name for this product
              $seller_stmt = $conn->prepare("SELECT full_name FROM users WHERE id = ? LIMIT 1");
              $seller_stmt->bind_param('i', $product['seller_id']);
              $seller_stmt->execute();
              $seller_result = $seller_stmt->get_result();
              $seller_data = $seller_result->fetch_assoc();
              $seller_stmt->close();
              ?>
              <!-- Product Card -->
              <div class="product-card">
                <img class="product-img" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&q=80"
                  alt="<?php echo htmlspecialchars($product['product_name']); ?>" />
                <div class="product-body">
                  <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
                  <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                  <div class="product-info">MOQ: 1 Unit</div>
                  <div class="product-info text-sm" style="margin-top:4px;">
                    <?php echo htmlspecialchars($seller_data['full_name'] ?? 'Unknown Supplier'); ?>
                  </div>
                  <div class="flex items-center justify-between mt-4">
                    <span class="badge badge-blue">Verified</span>
                    <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        <?php else: ?>
          <div style="text-align:center; padding:60px 40px; background:var(--white); border-radius:8px;">
            <p style="color:var(--text-muted); font-size:16px;">No products found matching your filters.</p>
            <a href="categoris.php" class="btn btn-primary" style="margin-top:16px; display:inline-block;">Clear Filters</a>
          </div>
        <?php endif; ?>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-8">
          <div class="text-sm text-muted">Showing 1–<?php echo min($total_products, 16); ?> of <?php echo $total_products; ?> results</div>
=======
        <div class="grid-3" style="gap:20px;">

          <!-- Product 1 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&q=80"
              alt="CNC Milling Machine" />
            <div class="product-body">
              <div class="product-name">CNC Milling Machine Pro X500</div>
              <div class="product-price">$12,500 – $18,000</div>
              <div class="product-info">MOQ: 1 Unit</div>
              <div class="product-info text-sm" style="margin-top:4px;">ShenZhen Machinery Co.</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-blue">Verified</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 2 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=500&q=80"
              alt="Solar Panels" />
            <div class="product-body">
              <div class="product-name">Solar Panel Monocrystalline 400W</div>
              <div class="product-price">$180 – $240</div>
              <div class="product-info">MOQ: 50 Units</div>
              <div class="product-info text-sm" style="margin-top:4px;">GreenTech Energy Ltd.</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-gold">GOLD</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 3 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1587293852726-70cdb56c2866?w=500&q=80"
              alt="Steel Pipes" />
            <div class="product-body">
              <div class="product-name">Steel Pipe Grade A106 — Seamless</div>
              <div class="product-price">$850 – $1,200 / ton</div>
              <div class="product-info">MOQ: 5 tons</div>
              <div class="product-info text-sm" style="margin-top:4px;">GlobalSteel Industries</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-blue">Verified</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 4 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80"
              alt="LED Lighting" />
            <div class="product-body">
              <div class="product-name">LED Linear High Bay 200W</div>
              <div class="product-price">$45 – $80</div>
              <div class="product-info">MOQ: 100 Units</div>
              <div class="product-info text-sm" style="margin-top:4px;">BrightLux Electronics</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-gold">GOLD</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 5 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=500&q=80"
              alt="Cotton Fabric" />
            <div class="product-body">
              <div class="product-name">100% Cotton Fabric — 240 GSM</div>
              <div class="product-price">$2.80 – $4.50 / meter</div>
              <div class="product-info">MOQ: 500 meters</div>
              <div class="product-info text-sm" style="margin-top:4px;">TextilePro Group</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-blue">Verified</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 6 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=500&q=80"
              alt="Safety Helmet" />
            <div class="product-body">
              <div class="product-name">Safety Helmet EN397 Certified</div>
              <div class="product-price">$8 – $15</div>
              <div class="product-info">MOQ: 200 Units</div>
              <div class="product-info text-sm" style="margin-top:4px;">SafeGuard Industrial</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-gold">GOLD</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 7 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&q=80"
              alt="PCB Board" />
            <div class="product-body">
              <div class="product-name">Custom PCB Board Assembly</div>
              <div class="product-price">$0.50 – $15 / pcs</div>
              <div class="product-info">MOQ: 1000 pcs</div>
              <div class="product-info text-sm" style="margin-top:4px;">ShenZhen Machinery Co.</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-blue">Verified</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 8 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=500&q=80"
              alt="Battery System" />
            <div class="product-body">
              <div class="product-name">Lithium Battery Storage System 10kWh</div>
              <div class="product-price">$3,200 – $4,800</div>
              <div class="product-info">MOQ: 2 Units</div>
              <div class="product-info text-sm" style="margin-top:4px;">GreenTech Energy Ltd.</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-gold">GOLD</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

          <!-- Product 9 -->
          <div class="product-card">
            <img class="product-img" src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=500&q=80"
              alt="Industrial Robot" />
            <div class="product-body">
              <div class="product-name">6-Axis Industrial Robotic Arm</div>
              <div class="product-price">$22,000 – $40,000</div>
              <div class="product-info">MOQ: 1 Unit</div>
              <div class="product-info text-sm" style="margin-top:4px;">ShenZhen Machinery Co.</div>
              <div class="flex items-center justify-between mt-4">
                <span class="badge badge-blue">Verified</span>
                <a href="rfq.php" class="btn btn-primary btn-sm">Get Quote</a>
              </div>
            </div>
          </div>

        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-8">
          <div class="text-sm text-muted">Showing 1–9 of 2,400 results</div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
          <div class="flex gap-2">
            <button class="btn btn-ghost btn-sm">← Prev</button>
            <button class="btn btn-primary btn-sm">1</button>
            <button class="btn btn-ghost btn-sm">2</button>
            <button class="btn btn-ghost btn-sm">3</button>
<<<<<<< HEAD
            <button class="btn btn-ghost btn-sm">Next →</button>
          </div>
        </div>
=======
            <button class="btn btn-ghost btn-sm">…</button>
            <button class="btn btn-ghost btn-sm">150</button>
            <button class="btn btn-ghost btn-sm">Next →</button>
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
        <div class="footer-brand">The world's leading B2B marketplace connecting buyers and suppliers across 190+
          countries.</div>
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
          <li><a href="#">Careers</a></li>
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