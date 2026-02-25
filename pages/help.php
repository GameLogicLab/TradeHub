<<<<<<< HEAD
<?php
/**
 * Help Center Page
 */

require_once '../check_session.php';

?>
=======
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Help Center — TradeHub</title>
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
      <a href="suppliers.php">Suppliers</a>
      <a href="rfq.php">RFQ</a>
      <a href="about.php">About</a>
      <a href="help.php" class="active">Help</a>
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
      <span class="current">Help Center</span>
    </div>

    <!-- Help Hero -->
    <section
      style="background:linear-gradient(135deg,var(--dark),#162055);padding:60px 72px;color:white;text-align:center;">
      <div style="max-width:600px;margin:0 auto;">
        <h1 style="font-size:38px;font-weight:700;margin-bottom:16px;">How can we help you?</h1>
        <p style="opacity:.75;font-size:16px;margin-bottom:32px;">Search our knowledge base or browse topics below</p>
        <div class="search-bar" style="max-width:540px;margin:0 auto;">
          <input type="text" placeholder="Search for help articles…" />
          <button class="btn btn-primary">Search</button>
        </div>
        <div class="trust-row" style="justify-content:center;margin-top:20px;">
          <span>✓ 500+ Articles</span>
          <div class="dot"></div>
          <span>✓ 24/7 Live Chat</span>
          <div class="dot"></div>
          <span>✓ Email Support</span>
        </div>
      </div>
    </section>

    <!-- Contact Options -->
    <section style="padding:40px 72px; background:var(--white); border-bottom:1px solid var(--border);">
      <div class="grid-3" style="gap:24px;max-width:900px;margin:0 auto;">
        <div
          style="display:flex;align-items:center;gap:16px;padding:20px;border:1px solid var(--border);border-radius:var(--radius);background:var(--bg-page);">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M8 10h8M8 14h5" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" />
              <rect x="2" y="3" width="20" height="16" rx="2" stroke="var(--primary)" stroke-width="1.8" />
            </svg>
          </div>
          <div>
            <div class="font-semibold" style="font-size:14px;">Live Chat</div>
            <div class="text-sm text-muted">Avg. reply: 2 min</div>
          </div>
        </div>
        <div
          style="display:flex;align-items:center;gap:16px;padding:20px;border:1px solid var(--border);border-radius:var(--radius);background:var(--bg-page);">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect x="2" y="4" width="20" height="16" rx="2" stroke="var(--primary)" stroke-width="1.8" />
              <path d="M2 8l10 7 10-7" stroke="var(--primary)" stroke-width="1.8" stroke-linecap="round" />
            </svg>
          </div>
          <div>
            <div class="font-semibold" style="font-size:14px;">Email Support</div>
            <div class="text-sm text-muted">Reply in 24 hours</div>
          </div>
        </div>
        <div
          style="display:flex;align-items:center;gap:16px;padding:20px;border:1px solid var(--border);border-radius:var(--radius);background:var(--bg-page);">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"
                stroke="var(--primary)" stroke-width="1.8" stroke-linejoin="round" />
            </svg>
          </div>
          <div>
            <div class="font-semibold" style="font-size:14px;">Phone Support</div>
            <div class="text-sm text-muted">Mon–Fri, 9AM–6PM</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Browse by Topic -->
    <section class="section-pad">
      <div class="section-title mb-6">Browse by Topic</div>
      <div class="grid-3" style="gap:20px;">

        <div class="help-card">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M6 2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2z" stroke="var(--primary)"
                stroke-width="1.8" />
              <path d="M9 8h6M9 12h6M9 16h4" stroke="var(--primary)" stroke-width="1.8" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Buying on TradeHub</div>
          <div class="text-sm text-muted mb-3">How to search, compare, and purchase products</div>
          <div style="color:#94A3B8;font-size:12px;font-weight:500;">24 articles</div>
        </div>

        <div class="help-card">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect x="3" y="2" width="10" height="16" rx="1" stroke="var(--primary)" stroke-width="1.8" />
              <rect x="2" y="12" width="3" height="8" rx=".5" stroke="var(--primary)" stroke-width="1.8" />
              <rect x="17" y="9" width="3" height="11" rx=".5" stroke="var(--primary)" stroke-width="1.8" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Selling on TradeHub</div>
          <div class="text-sm text-muted mb-3">Supplier registration, listing, and management</div>
          <div style="color:#94A3B8;font-size:12px;font-weight:500;">18 articles</div>
        </div>

        <div class="help-card">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect x="2" y="4" width="20" height="16" rx="2" stroke="var(--primary)" stroke-width="1.8" />
              <path d="M2 9h20" stroke="var(--primary)" stroke-width="1.5" />
              <circle cx="6.5" cy="6.5" r="1" fill="var(--primary)" />
              <circle cx="10" cy="6.5" r="1" fill="var(--primary)" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Payments & Invoices</div>
          <div class="text-sm text-muted mb-3">Payment methods, invoices, and billing</div>
          <div style="color:#94A3B8;font-size:12px;font-weight:500;">31 articles</div>
        </div>

        <div class="help-card">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" stroke="var(--primary)"
                stroke-width="1.8" />
              <path d="M14 2v6h6" stroke="var(--primary)" stroke-width="1.8" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">RFQ & Quotations</div>
          <div class="text-sm text-muted mb-3">Request quotes, respond, and manage RFQs</div>
          <div style="color:#94A3B8;font-size:12px;font-weight:500;">15 articles</div>
        </div>

        <div class="help-card">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" stroke="var(--primary)"
                stroke-width="1.8" />
              <path d="M9 13l2 2 4-4" stroke="var(--primary)" stroke-width="1.8" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Orders & Shipping</div>
          <div class="text-sm text-muted mb-3">Track orders, shipping updates, logistics</div>
          <div style="color:#94A3B8;font-size:12px;font-weight:500;">22 articles</div>
        </div>

        <div class="help-card">
          <div
            style="width:48px;height:48px;background:var(--primary-bg);border-radius:var(--radius);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 3C8.5 3 6 5.5 6 9c0 5.25 6 12 6 12s6-6.75 6-12c0-3.5-2.5-6-6-6z" stroke="var(--primary)"
                stroke-width="1.8" />
              <circle cx="12" cy="9" r="2" fill="var(--primary)" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Account & Security</div>
          <div class="text-sm text-muted mb-3">Profile settings, password, and privacy</div>
          <div style="color:#94A3B8;font-size:12px;font-weight:500;">12 articles</div>
        </div>

      </div>
    </section>

    <!-- Popular Articles -->
    <section style="background:var(--bg-page); padding:0 72px 80px;">
      <div class="section-title mb-6">Popular Articles</div>
      <div class="flex gap-6" style="align-items:flex-start;">

        <!-- Article list -->
        <div style="flex:1;">
          <div class="bg-white rounded border" style="overflow:hidden;">
            <div style="padding:20px 24px; border-bottom:1px solid var(--border); font-weight:600; font-size:15px;">
              Getting Started</div>
            <ul>
              <li
                style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;cursor:pointer;transition:background .15s;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">How to create your TradeHub account</span>
                <span style="color:var(--primary);">→</span>
              </li>
              <li
                style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">How to post your first RFQ</span>
                <span style="color:var(--primary);">→</span>
              </li>
              <li
                style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">Understanding supplier verification</span>
                <span style="color:var(--primary);">→</span>
              </li>
              <li
                style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">How TradeHub's buyer protection works</span>
                <span style="color:var(--primary);">→</span>
              </li>
              <li
                style="padding:16px 24px;display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">Comparing supplier quotes — best practices</span>
                <span style="color:var(--primary);">→</span>
              </li>
            </ul>
          </div>

          <div class="bg-white rounded border mt-4" style="overflow:hidden;">
            <div style="padding:20px 24px; border-bottom:1px solid var(--border); font-weight:600; font-size:15px;">
              Payments & Orders</div>
            <ul>
              <li
                style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">Accepted payment methods on TradeHub</span>
                <span style="color:var(--primary);">→</span>
              </li>
              <li
                style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">How to track your shipment</span>
                <span style="color:var(--primary);">→</span>
              </li>
              <li
                style="padding:16px 24px;display:flex;justify-content:space-between;align-items:center;cursor:pointer;"
                onmouseover="this.style.background='var(--bg-page)'" onmouseout="this.style.background='white'">
                <span class="text-sm">Filing a dispute or refund request</span>
                <span style="color:var(--primary);">→</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Contact Sidebar -->
        <div style="width:320px;flex-shrink:0;">
          <div
            style="background:var(--primary);border-radius:var(--radius);padding:32px;color:white;text-align:center;">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" style="margin:0 auto 16px;display:block;">
              <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,.15)" />
              <path d="M16 20h16M16 26h10" stroke="white" stroke-width="2.5" stroke-linecap="round" />
            </svg>
            <div class="font-bold" style="font-size:18px;margin-bottom:8px;">Still need help?</div>
            <div style="font-size:14px;opacity:.8;margin-bottom:24px;">Our support team is available 24/7 and typically
              responds in under 2 minutes.</div>
            <button class="btn w-full" style="background:white;color:var(--primary);font-weight:600;">Start Live
              Chat</button>
            <button class="btn w-full mt-3"
              style="background:rgba(255,255,255,.15);color:white;border:1px solid rgba(255,255,255,.3);">Send
              Email</button>
          </div>

          <div class="bg-white rounded border p-6 mt-4">
            <div class="font-semibold mb-4" style="font-size:14px;">Quick Links</div>
            <ul style="display:flex;flex-direction:column;gap:12px;">
              <li><a href="rfq.php" style="color:var(--primary);font-size:14px;">→ Post an RFQ</a></li>
              <li><a href="signup.php" style="color:var(--primary);font-size:14px;">→ Register as Supplier</a></li>
              <li><a href="about.php" style="color:var(--primary);font-size:14px;">→ About TradeHub</a></li>
              <li><a href="#" style="color:var(--primary);font-size:14px;">→ API Documentation</a></li>
            </ul>
          </div>
        </div>

      </div>
    </section>

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
    <div class="footer-bottom"><span>© 2025 TradeHub Technologies Ltd. All rights reserved.</span></div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>