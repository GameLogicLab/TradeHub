<?php
/**
 * Home Page
 * Main landing page with session-based navbar
 */

require_once 'check_session.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TradeHub — Global B2B Marketplace</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/global.css" />
</head>

<body>

  <!-- ========== NAVBAR (Bootstrap) ========== -->
  <nav class="navbar navbar-tradehub">
    <a class="brand" href="index.php">
      <div class="brand-icon">
        <img src="logo.png" alt="logo">
      </div>
      TradeHub
    </a>
    <div class="nav-links">
      <a href="pages/categoris.php">Products</a>
      <a href="pages/suppliers.php">Suppliers</a>
      <a href="pages/rfq.php">RFQ</a>
      <a href="pages/about.php">About</a>
      <a href="pages/help.php">Help</a>
    </div>
    <div class="nav-actions">
      <?php if (isLoggedIn()): ?>
        <a href="pages/profile.php" class="btn btn-ghost btn-sm">Profile</a>
        <a href="pages/logout.php" class="btn btn-primary btn-sm">Logout</a>
      <?php else: ?>
        <a href="pages/login.php" class="btn btn-ghost btn-sm">Log in</a>
        <a href="pages/signup.php" class="btn btn-primary btn-sm">Get Started</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="page-wrapper">

    <!-- ========== HERO ========== -->
    <section class="hero">
      <div class="hero-badge">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
          <circle cx="7" cy="7" r="6" stroke="rgba(255,255,255,.7)" stroke-width="1.5" />
          <path d="M4.5 7l2 2 3-3" stroke="rgba(255,255,255,.9)" stroke-width="1.5" stroke-linecap="round" />
        </svg>
        Trusted by 50,000+ businesses worldwide
      </div>
      <h1>Global B2B Trade<br />Made Simple</h1>
      <p>Connect with verified suppliers, source quality products, and scale your business with confidence.</p>

      <div class="search-bar" style="max-width:720px">
        <input type="text" placeholder="Search for products, suppliers, or categories…" />
        <select>
          <option>All Categories</option>
          <option>Machinery</option>
          <option>Electronics</option>
          <option>Textiles</option>
          <option>Steel & Metals</option>
          <option>Safety Equipment</option>
        </select>
        <button class="btn btn-primary">Search</button>
      </div>

      <div class="trust-row">
        <span>✓ Verified Suppliers</span>
        <div class="dot"></div>
        <span>✓ Secure Payments</span>
        <div class="dot"></div>
        <span>✓ Trade Assurance</span>
        <div class="dot"></div>
        <span>✓ 190+ Countries</span>
      </div>
    </section>

    <!-- ========== STATS ========== -->
    <div class="stats-row">
      <div class="stat-item">
        <div class="stat-value">50K+</div>
        <div class="stat-label">Verified Buyers</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">12K+</div>
        <div class="stat-label">Global Suppliers</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">2.4M+</div>
        <div class="stat-label">Products Listed</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">190+</div>
        <div class="stat-label">Countries Served</div>
      </div>
    </div>

    <!-- ========== POPULAR CATEGORIES ========== -->
    <section class="section-pad">
      <div class="flex justify-between items-center mb-8">
        <div>
          <div class="section-title">Browse by Category</div>
          <div class="section-subtitle">Explore thousands of products across industries</div>
        </div>
        <a href="pages/categoris.php" class="btn btn-outline">View All</a>
      </div>

      <div class="grid-4">
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#FEF3C7">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <rect x="4" y="3" width="14" height="22" rx="2" fill="#F59E0B" />
              <rect x="2" y="16" width="5" height="9" rx="1" fill="#D97706" />
              <rect x="21" y="12" width="5" height="13" rx="1" fill="#D97706" />
            </svg>
          </div>
          <div class="cat-name">Industrial Machinery</div>
          <div class="cat-count">48,200+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#DCFCE7">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="14" r="9" fill="#22C55E" />
              <path d="M14 8v6l4 2" stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="cat-name">Green Energy</div>
          <div class="cat-count">21,500+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#EDE9FE">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <rect x="3" y="7" width="22" height="14" rx="2" fill="#8B5CF6" />
              <rect x="7" y="11" width="14" height="6" rx="1" fill="white" opacity=".4" />
            </svg>
          </div>
          <div class="cat-name">Electronics</div>
          <div class="cat-count">112,000+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#FEE2E2">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <rect x="4" y="4" width="20" height="20" rx="2" fill="#EF4444" />
              <path d="M9 14h10M14 9v10" stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="cat-name">Steel & Metals</div>
          <div class="cat-count">34,700+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#E0F2FE">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="10" r="5" fill="#0EA5E9" />
              <path d="M6 24c0-4.4 3.6-8 8-8s8 3.6 8 8" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="cat-name">Textiles & Fabrics</div>
          <div class="cat-count">67,300+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#FEF9C3">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <path d="M14 3l2.5 5 5.5.8-4 3.9.9 5.5L14 15.6l-4.9 2.6.9-5.5-4-3.9 5.5-.8L14 3z" fill="#EAB308" />
            </svg>
          </div>
          <div class="cat-name">Safety Equipment</div>
          <div class="cat-count">15,800+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#FCE7F3">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <rect x="3" y="8" width="22" height="12" rx="2" fill="#EC4899" />
              <rect x="10" y="4" width="8" height="4" rx="1" fill="#DB2777" />
            </svg>
          </div>
          <div class="cat-name">Packaging</div>
          <div class="cat-count">29,100+ products</div>
        </div>
        <div class="cat-card" onclick="location.href='pages/categoris.php'">
          <div class="cat-icon" style="background:#F0FDF4">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="14" r="10" stroke="#16A34A" stroke-width="2" fill="none" />
              <path d="M10 14l3 3 5-5" stroke="#16A34A" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="cat-name">Food & Agriculture</div>
          <div class="cat-count">43,900+ products</div>
        </div>
      </div>
    </section>

    <!-- ========== VERIFIED SUPPLIERS ========== -->
    <section style="padding: 0 72px 80px">
      <div class="flex justify-between items-center mb-8">
        <div>
          <div class="section-title">Verified Suppliers</div>
          <div class="section-subtitle">Trusted partners with verified credentials and proven track records</div>
        </div>
        <a href="pages/suppliers.php" class="btn btn-outline">View All Suppliers →</a>
      </div>

      <div class="grid-3">

        <!-- Card 1 -->
        <div class="supplier-card">
          <div class="flex gap-4 items-center">
            <div class="supplier-logo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect x="5" y="2" width="10" height="18" rx="1" stroke="white" stroke-width="2" />
                <rect x="2" y="12" width="3" height="8" rx=".5" stroke="white" stroke-width="2" />
                <rect x="17" y="9" width="3" height="11" rx=".5" stroke="white" stroke-width="2" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-semibold" style="font-size:16px">ShenZhen Machinery Co.</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <circle cx="9" cy="9" r="8" fill="#1E40AF" />
                  <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
              </div>
              <div class="text-sm text-muted mt-1">📍 Shenzhen, China</div>
            </div>
          </div>
          <div class="text-sm text-muted mt-4">CNC Machines, Lathes, Milling Equipment</div>
          <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid var(--border)">
            <span class="supplier-meta">⭐ 15 yrs</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">500+ employees</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">$50M+</span>
            <span class="divider-v">|</span>
            <span class="badge badge-gold">GOLD</span>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="supplier-card">
          <div class="flex gap-4 items-center">
            <div class="supplier-logo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <circle cx="12" cy="8" r="5" stroke="white" stroke-width="2" />
                <path d="M3 21c0-4.97 4.03-9 9-9s9 4.03 9 9" stroke="white" stroke-width="2" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-semibold" style="font-size:16px">GreenTech Energy Ltd.</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <circle cx="9" cy="9" r="8" fill="#1E40AF" />
                  <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
              </div>
              <div class="text-sm text-muted mt-1">📍 Munich, Germany</div>
            </div>
          </div>
          <div class="text-sm text-muted mt-4">Solar Panels, Inverters, Battery Systems</div>
          <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid var(--border)">
            <span class="supplier-meta">⭐ 12 yrs</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">200+ employees</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">$30M+</span>
            <span class="divider-v">|</span>
            <span class="badge badge-gold">GOLD</span>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="supplier-card">
          <div class="flex gap-4 items-center">
            <div class="supplier-logo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect x="3" y="3" width="18" height="18" rx="2" stroke="white" stroke-width="2" />
                <path d="M8 12h8M12 8v8" stroke="white" stroke-width="2" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-semibold" style="font-size:16px">GlobalSteel Industries</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <circle cx="9" cy="9" r="8" fill="#1E40AF" />
                  <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
              </div>
              <div class="text-sm text-muted mt-1">📍 Mumbai, India</div>
            </div>
          </div>
          <div class="text-sm text-muted mt-4">Steel Pipes, Structural Steel, Metal Sheets</div>
          <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid var(--border)">
            <span class="supplier-meta">⭐ 22 yrs</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">1000+ employees</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">$120M+</span>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="supplier-card">
          <div class="flex gap-4 items-center">
            <div class="supplier-logo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect x="2" y="6" width="20" height="12" rx="2" stroke="white" stroke-width="2" />
                <circle cx="12" cy="12" r="3" stroke="white" stroke-width="2" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-semibold" style="font-size:16px">BrightLux Electronics</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <circle cx="9" cy="9" r="8" fill="#1E40AF" />
                  <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
              </div>
              <div class="text-sm text-muted mt-1">📍 Taipei, Taiwan</div>
            </div>
          </div>
          <div class="text-sm text-muted mt-4">LED Lighting, Display Panels, Drivers</div>
          <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid var(--border)">
            <span class="supplier-meta">⭐ 8 yrs</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">150+ employees</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">$15M+</span>
            <span class="divider-v">|</span>
            <span class="badge badge-gold">GOLD</span>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="supplier-card">
          <div class="flex gap-4 items-center">
            <div class="supplier-logo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 2l2 5h5l-4 3 1.5 5L12 12.5 7.5 15 9 10l-4-3h5L12 2z" stroke="white" stroke-width="1.8"
                  stroke-linejoin="round" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-semibold" style="font-size:16px">TextilePro Group</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <circle cx="9" cy="9" r="8" fill="#1E40AF" />
                  <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
              </div>
              <div class="text-sm text-muted mt-1">📍 Istanbul, Turkey</div>
            </div>
          </div>
          <div class="text-sm text-muted mt-4">Cotton Fabrics, Polyester, Blended Textiles</div>
          <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid var(--border)">
            <span class="supplier-meta">⭐ 18 yrs</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">800+ employees</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">$45M+</span>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="supplier-card">
          <div class="flex gap-4 items-center">
            <div class="supplier-logo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 3C8.5 3 6 5.5 6 9c0 5.25 6 12 6 12s6-6.75 6-12c0-3.5-2.5-6-6-6z" stroke="white"
                  stroke-width="2" />
                <circle cx="12" cy="9" r="2" fill="white" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <span class="font-semibold" style="font-size:16px">SafeGuard Industrial</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <circle cx="9" cy="9" r="8" fill="#1E40AF" />
                  <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
              </div>
              <div class="text-sm text-muted mt-1">📍 Seoul, South Korea</div>
            </div>
          </div>
          <div class="text-sm text-muted mt-4">Safety Helmets, Protective Wear, Gloves</div>
          <div class="flex items-center gap-2 mt-4 pt-4" style="border-top:1px solid var(--border)">
            <span class="supplier-meta">⭐ 10 yrs</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">300+ employees</span>
            <span class="divider-v">|</span>
            <span class="supplier-meta">$20M+</span>
            <span class="divider-v">|</span>
            <span class="badge badge-gold">GOLD</span>
          </div>
        </div>

      </div>
    </section>

    <!-- ========== HOW IT WORKS ========== -->
    <section style="background:var(--primary-bg); padding:80px 72px;">
      <div class="text-center mb-8">
        <div class="section-title">How TradeHub Works</div>
        <div class="section-subtitle mt-2">Three simple steps to source globally</div>
      </div>
      <div class="grid-3" style="max-width:900px; margin:0 auto;">
        <div class="text-center">
          <div
            style="width:64px;height:64px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="10" r="5" stroke="white" stroke-width="2" />
              <path d="M5 24c0-4.97 4.03-9 9-9s9 4.03 9 9" stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-bold" style="font-size:16px;margin-bottom:8px;">1. Post Your RFQ</div>
          <div class="text-sm text-muted">Describe what you need and get matched with qualified suppliers instantly.
          </div>
        </div>
        <div class="text-center">
          <div
            style="width:64px;height:64px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <rect x="4" y="4" width="20" height="20" rx="2" stroke="white" stroke-width="2" />
              <path d="M9 14l4 4 6-7" stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-bold" style="font-size:16px;margin-bottom:8px;">2. Compare Quotes</div>
          <div class="text-sm text-muted">Receive competitive quotes and choose the best supplier for your needs.</div>
        </div>
        <div class="text-center">
          <div
            style="width:64px;height:64px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <path d="M14 3l11 6v10l-11 6L3 19V9L14 3z" stroke="white" stroke-width="2" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="font-bold" style="font-size:16px;margin-bottom:8px;">3. Trade Securely</div>
          <div class="text-sm text-muted">Complete transactions with full trade assurance and buyer protection.</div>
        </div>
      </div>
      <div class="text-center mt-8">
        <a href="pages/rfq.php" class="btn btn-primary btn-lg">Post Your First RFQ — It's Free</a>
      </div>
    </section>

  </div>

  <!-- ========== FOOTER ========== -->
  <footer class="footer">
    <div class="footer-grid">
      <div>
        <div class="brand" style="color:white;">
          <div class="brand-icon">
            <img src="logo.png" alt="logo">
          </div>
          TradeHub
        </div>
        <div class="footer-brand">The world's leading B2B marketplace connecting buyers and suppliers across 190+
          countries with verified, trust-based trade.</div>
      </div>
      <div>
        <h4>Platform</h4>
        <ul>
          <li><a href="pages/categoris.php">Browse Products</a></li>
          <li><a href="pages/suppliers.php">Find Suppliers</a></li>
          <li><a href="pages/rfq.php">Post RFQ</a></li>
          <li><a href="pages/signup.php">Sell on TradeHub</a></li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li><a href="pages/about.php">About Us</a></li>
          <li><a href="pages/help.php">Help Center</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div>
        <h4>Legal</h4>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Cookie Policy</a></li>
          <li><a href="#">Compliance</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2025 TradeHub Technologies Ltd. All rights reserved.</span>
      <span>Made with ❤️ for global trade</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>