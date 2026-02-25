<?php
/**
 * Buyer Dashboard
 * Main dashboard for buyers
 */

require_once '../db_connect.php';
require_once '../check_session.php';
require_once '../buyer_check.php';

$user = getLoggedInUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Buyer Dashboard — TradeHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/global.css" />
  <style>
    .buyer-layout {
      display: flex;
      min-height: calc(100vh - 65px);
      margin-top: 65px;
    }

    .buyer-sidebar {
      width: 250px;
      background: white;
      border-right: 1px solid var(--border);
      padding: 24px 0;
      position: fixed;
      height: calc(100vh - 65px);
      overflow-y: auto;
    }

    .buyer-content {
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

    .feature-card {
      background: white;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 24px;
      text-align: center;
      box-shadow: var(--shadow);
    }

    .feature-icon {
      font-size: 32px;
      margin-bottom: 12px;
    }

    .feature-title {
      font-size: 16px;
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 8px;
    }

    .feature-desc {
      font-size: 13px;
      color: var(--text-muted);
    }

    @media (max-width: 1024px) {
      .buyer-sidebar {
        width: 200px;
      }
      .buyer-content {
        margin-left: 200px;
      }
    }

    @media (max-width: 768px) {
      .buyer-layout {
        flex-direction: column;
      }
      .buyer-sidebar {
        width: 100%;
        height: auto;
        border-right: none;
        border-bottom: 1px solid var(--border);
        position: static;
      }
      .buyer-content {
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
      <a href="categoris.php">Products</a>
      <a href="suppliers.php">Suppliers</a>
      <a href="rfq.php">RFQ</a>
      <a href="about.php">About</a>
      <a href="help.php">Help</a>
    </div>
    <div class="nav-actions">
      <a href="profile.php" class="btn btn-ghost btn-sm">Profile</a>
      <a href="logout.php" class="btn btn-primary btn-sm">Logout</a>
    </div>
  </nav>

  <!-- ========== BUYER LAYOUT ========== -->
  <div class="buyer-layout">

    <!-- Sidebar -->
    <!-- Main Content -->
    <main class="buyer-content">

      <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: var(--dark); margin-bottom: 8px;">Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h1>
        <p style="color: var(--text-muted); margin: 0;">Browse suppliers, find products, and post RFQs to source globally.</p>
      </div>

      <!-- Quick Access Cards -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div class="feature-card">
          <div class="feature-icon">🛍️</div>
          <div class="feature-title">Browse Products</div>
          <div class="feature-desc">Search from 10,000+ verified suppliers</div>
          <a href="categoris.php" class="btn btn-primary btn-sm" style="margin-top: 12px;">Explore</a>
        </div>
        <div class="feature-card">
          <div class="feature-icon">🏭</div>
          <div class="feature-title">Find Suppliers</div>
          <div class="feature-desc">Connect with vetted manufacturing partners</div>
          <a href="suppliers.php" class="btn btn-primary btn-sm" style="margin-top: 12px;">Search</a>
        </div>
        <div class="feature-card">
          <div class="feature-icon">📋</div>
          <div class="feature-title">Post RFQ</div>
          <div class="feature-desc">Get quotes from multiple suppliers instantly</div>
          <a href="rfq.php" class="btn btn-primary btn-sm" style="margin-top: 12px;">Create RFQ</a>
        </div>
        <div class="feature-card">
          <div class="feature-icon">✓</div>
          <div class="feature-title">Trade Assured</div>
          <div class="feature-desc">Secure transactions with buyer protection</div>
          <a href="help.php" class="btn btn-ghost btn-sm" style="margin-top: 12px;">Learn More</a>
        </div>
      </div>

      <!-- Featured Content -->
      <div class="section-title">Getting Started</div>
      <div style="background: white; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; box-shadow: var(--shadow);">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          <div>
            <h3 style="font-size: 16px; font-weight: 600; color: var(--dark); margin-bottom: 12px;">How to Get Started</h3>
            <ol style="color: var(--text-muted); font-size: 14px; line-height: 1.8; margin: 0; padding-left: 20px;">
              <li>Browse our product catalog by category</li>
              <li>Search for specific suppliers by industry</li>
              <li>Post a Request for Quote (RFQ)</li>
              <li>Review supplier responses</li>
              <li>Close a quote and begin trading</li>
            </ol>
          </div>
          <div>
            <h3 style="font-size: 16px; font-weight: 600; color: var(--dark); margin-bottom: 12px;">Why TradeHub?</h3>
            <ul style="color: var(--text-muted); font-size: 14px; line-height: 1.8; margin: 0; padding-left: 20px;">
              <li>✓ 12,000+ verified global suppliers</li>
              <li>✓ Buyer protection on all trades</li>
              <li>✓ ISO-certified manufacturing partners</li>
              <li>✓ 24/7 customer support</li>
              <li>✓ Competitive pricing from multiple quotes</li>
            </ul>
          </div>
        </div>
      </div>

    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
