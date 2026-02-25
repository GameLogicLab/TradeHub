<?php
/**
 * About Us Page
 */

require_once '../check_session.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us — TradeHub</title>
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
      <a href="about.php" class="active">About</a>
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
      <span class="current">About Us</span>
    </div>

    <!-- ===== Mission Hero ===== -->
    <section
      style="background:linear-gradient(135deg,var(--dark),#162055);padding:80px 72px;color:white;text-align:center;">
      <div style="max-width:680px;margin:0 auto;">
        <div class="hero-badge" style="display:inline-flex;margin-bottom:24px;">
          Founded 2016 · Trusted by 50,000+ Businesses
        </div>
        <h1 style="font-size:44px;font-weight:700;line-height:1.2;">Making Global Trade Simple,<br />Transparent &
          Trustworthy</h1>
        <p style="font-size:17px;opacity:.75;margin-top:20px;line-height:1.7;">TradeHub was built for the businesses
          that power our world — manufacturers, importers, distributors — connecting them across borders with
          confidence.</p>
      </div>
    </section>

    <!-- ===== Stats Row ===== -->
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
        <div class="stat-value">190+</div>
        <div class="stat-label">Countries</div>
      </div>
      <div class="stat-item">
        <div class="stat-value">$2B+</div>
        <div class="stat-label">Trade Volume</div>
      </div>
    </div>

    <!-- ===== Our Story ===== -->
    <section class="section-pad">
      <div class="flex gap-8 items-center">
        <div style="flex:1;">
          <div class="section-title">Our Story</div>
          <div class="flex flex-col gap-4 mt-6" style="color:var(--text-body);line-height:1.8;font-size:15px;">
            <p>TradeHub was founded in 2016 with a singular vision: to make global B2B trade as simple and transparent
              as shopping online. We saw how small and medium-sized businesses struggled to find reliable suppliers,
              navigate complex supply chains, and build trust across borders.</p>
            <p>Today, we've grown into a global marketplace connecting businesses from over 190 countries. Our
              proprietary verification system ensures every supplier on our platform meets rigorous quality, compliance,
              and reliability standards.</p>
            <p>From our headquarters and regional offices around the world, our team of 500+ professionals works
              tirelessly to make every trade transaction on TradeHub safe, efficient, and successful.</p>
          </div>
          <div class="flex gap-4 mt-8">
            <a href="rfq.php" class="btn btn-primary btn-lg">Start Sourcing</a>
            <a href="signup.php" class="btn btn-outline btn-lg">Join as Supplier</a>
          </div>
        </div>
        <div class="flex gap-4" style="flex-shrink:0; width:580px;">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&q=80" alt="Office"
            style="width:280px;height:380px;object-fit:cover;border-radius:var(--radius-lg);" />
          <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&q=80" alt="Team working"
            style="width:280px;height:380px;object-fit:cover;border-radius:var(--radius-lg);margin-top:28px;" />
        </div>
      </div>
    </section>

    <!-- ===== Core Values ===== -->
    <section style="background:var(--bg-page); padding:80px 72px;">
      <div class="text-center mb-8">
        <div class="section-title">Our Core Values</div>
        <div class="section-subtitle mt-2">These principles guide everything we do, from product development to customer
          support.</div>
      </div>
      <div class="grid-3" style="gap:24px;">

        <div class="bg-white rounded border p-6">
          <div
            style="width:56px;height:56px;background:var(--primary-bg);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <rect x="4" y="4" width="20" height="20" rx="2" fill="none" stroke="var(--primary)" stroke-width="2" />
              <path d="M9 14l4 4 6-7" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Trust & Transparency</div>
          <div class="text-sm text-muted" style="line-height:1.7;">Every supplier is verified. Every transaction is
            tracked. We hold ourselves and our partners to the highest standards of honesty.</div>
        </div>

        <div class="bg-white rounded border p-6">
          <div
            style="width:56px;height:56px;background:var(--primary-bg);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="14" cy="14" r="10" stroke="var(--primary)" stroke-width="2" />
              <path d="M10 14l3 3 5-5" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Global Inclusion</div>
          <div class="text-sm text-muted" style="line-height:1.7;">We believe every business deserves access to global
            trade — regardless of size, location, or industry. We build for everyone.</div>
        </div>

        <div class="bg-white rounded border p-6">
          <div
            style="width:56px;height:56px;background:var(--primary-bg);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <path d="M14 3l11 6v10l-11 6L3 19V9L14 3z" stroke="var(--primary)" stroke-width="2"
                stroke-linejoin="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Security First</div>
          <div class="text-sm text-muted" style="line-height:1.7;">Buyer protection, escrow payments, and dispute
            resolution — your money is safe with our multi-layer security framework.</div>
        </div>

        <div class="bg-white rounded border p-6">
          <div
            style="width:56px;height:56px;background:var(--primary-bg);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <path d="M7 24V14M14 24V10M21 24V4" stroke="var(--primary)" stroke-width="2.5" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Continuous Innovation</div>
          <div class="text-sm text-muted" style="line-height:1.7;">We invest heavily in AI, logistics tech, and payment
            infrastructure to keep TradeHub ahead of what global trade demands.</div>
        </div>

        <div class="bg-white rounded border p-6">
          <div
            style="width:56px;height:56px;background:var(--primary-bg);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <circle cx="10" cy="10" r="6" stroke="var(--primary)" stroke-width="2" />
              <circle cx="20" cy="18" r="5" stroke="var(--primary)" stroke-width="2" />
              <path d="M14 14l2 2" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Partnership Mindset</div>
          <div class="text-sm text-muted" style="line-height:1.7;">We grow when our users grow. Our success is measured
            by the success of every buyer and supplier on our platform.</div>
        </div>

        <div class="bg-white rounded border p-6">
          <div
            style="width:56px;height:56px;background:var(--primary-bg);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
              <path d="M14 4C8.5 4 4 8.5 4 14s4.5 10 10 10 10-4.5 10-10S19.5 4 14 4z" stroke="var(--primary)"
                stroke-width="2" />
              <path d="M4 14h20M14 4c-2.8 3.3-4 6.5-4 10s1.2 6.7 4 10M14 4c2.8 3.3 4 6.5 4 10s-1.2 6.7-4 10"
                stroke="var(--primary)" stroke-width="1.5" />
            </svg>
          </div>
          <div class="font-semibold" style="font-size:16px;margin-bottom:8px;">Sustainability</div>
          <div class="text-sm text-muted" style="line-height:1.7;">We champion eco-conscious suppliers and sustainable
            sourcing — because good trade is responsible trade for the planet.</div>
        </div>

      </div>
    </section>

    <!-- ===== Team / Leadership ===== -->
    <section class="section-pad">
      <div class="text-center mb-8">
        <div class="section-title">Leadership Team</div>
        <div class="section-subtitle mt-2">Passionate people building the future of global commerce</div>
      </div>
      <div class="grid-4" style="gap:24px;">

        <div class="text-center">
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&q=80" alt="CEO"
            style="width:100px;height:100px;border-radius:50%;object-fit:cover;margin:0 auto 16px;" />
          <div class="font-semibold" style="font-size:15px;">James Harrington</div>
          <div class="text-sm text-primary mt-1">Co-Founder & CEO</div>
          <div class="text-sm text-muted mt-2" style="line-height:1.6;">Former Goldman Sachs, Harvard MBA. 15+ years in
            global trade finance.</div>
        </div>

        <div class="text-center">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&q=80" alt="COO"
            style="width:100px;height:100px;border-radius:50%;object-fit:cover;margin:0 auto 16px;" />
          <div class="font-semibold" style="font-size:15px;">Priya Mehta</div>
          <div class="text-sm text-primary mt-1">Co-Founder & COO</div>
          <div class="text-sm text-muted mt-2" style="line-height:1.6;">Ex-McKinsey. Expert in supply chain optimization
            and global operations.</div>
        </div>

        <div class="text-center">
          <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=300&q=80" alt="CTO"
            style="width:100px;height:100px;border-radius:50%;object-fit:cover;margin:0 auto 16px;" />
          <div class="font-semibold" style="font-size:15px;">David Chen</div>
          <div class="text-sm text-primary mt-1">CTO</div>
          <div class="text-sm text-muted mt-2" style="line-height:1.6;">Ex-Google AI/ML. Architect behind TradeHub's
            smart matching engine.</div>
        </div>

        <div class="text-center">
          <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300&q=80" alt="CMO"
            style="width:100px;height:100px;border-radius:50%;object-fit:cover;margin:0 auto 16px;" />
          <div class="font-semibold" style="font-size:15px;">Sophie Laurent</div>
          <div class="text-sm text-primary mt-1">Chief Marketing Officer</div>
          <div class="text-sm text-muted mt-2" style="line-height:1.6;">Brand strategist with experience scaling B2B
            platforms across Europe and Asia.</div>
        </div>

      </div>
    </section>

    <!-- ===== CTA ===== -->
    <section style="background:var(--primary);padding:80px 72px;text-align:center;color:white;">
      <div class="font-bold" style="font-size:32px;margin-bottom:16px;">Ready to Trade Globally?</div>
      <div style="font-size:16px;opacity:.8;margin-bottom:32px;">Join 50,000+ businesses already sourcing smarter with
        TradeHub.</div>
      <div class="flex gap-4 items-center justify-center">
        <a href="signup.php" class="btn"
          style="background:white;color:var(--primary);padding:14px 32px;font-size:15px;font-weight:600;">Create Free
          Account</a>
        <a href="rfq.php" class="btn"
          style="background:rgba(255,255,255,.15);color:white;border:1px solid rgba(255,255,255,.4);padding:14px 32px;font-size:15px;">Post
          Your First RFQ</a>
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
    <div class="footer-bottom"><span>© 2025 TradeHub Technologies Ltd. All rights reserved.</span></div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>