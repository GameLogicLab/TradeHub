<?php
/**
 * Profile Page
 * Display logged-in user's profile information
 */

require_once '../db_connect.php';
require_once '../check_session.php';

// Get logged-in user
$user = getLoggedInUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo isLoggedIn() ? 'My Profile' : 'Profile'; ?> — TradeHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/global.css" />
  <style>
    .profile-container {
      padding: 72px 40px;
      max-width: 800px;
      margin: 0 auto;
    }

    .profile-card {
      background: white;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 40px;
      box-shadow: var(--shadow);
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 24px;
      margin-bottom: 32px;
      padding-bottom: 32px;
      border-bottom: 1px solid var(--border);
    }

    .profile-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: var(--primary-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      font-weight: 700;
      color: var(--primary);
    }

    .profile-info h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 8px;
    }

    .profile-info p {
      color: var(--text-muted);
      font-size: 14px;
      margin: 0;
    }

    .profile-details {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      margin-bottom: 32px;
    }

    @media (max-width: 640px) {
      .profile-details {
        grid-template-columns: 1fr;
      }
    }

    .detail-item {
      display: flex;
      flex-direction: column;
    }

    .detail-label {
      font-size: 12px;
      font-weight: 600;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 8px;
    }

    .detail-value {
      font-size: 15px;
      color: var(--dark);
      font-weight: 500;
      word-break: break-all;
    }

    .role-badge {
      display: inline-block;
      padding: 6px 12px;
      border-radius: var(--radius);
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      width: fit-content;
    }

    .role-badge.buyer {
      background: #EFF6FF;
      color: #1E40AF;
    }

    .role-badge.seller {
      background: #FEF3C7;
      color: #92400E;
    }

    .button-group {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      padding-top: 32px;
      border-top: 1px solid var(--border);
    }

    .not-logged-in {
      text-align: center;
      padding: 60px 40px;
    }

    .not-logged-in h1 {
      font-size: 28px;
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 16px;
    }

    .not-logged-in p {
      color: var(--text-muted);
      font-size: 15px;
      margin-bottom: 32px;
    }

    .btn-group {
      display: flex;
      gap: 12px;
      justify-content: center;
    }
  </style>
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

    <?php if (isLoggedIn()): ?>
      <!-- Profile Page (Logged In) -->
      <div class="profile-container">
        <div class="profile-card">
          <div class="profile-header">
            <div class="profile-avatar">
              <?php echo strtoupper(substr($user['full_name'], 0, 1)); ?>
            </div>
            <div class="profile-info">
              <h2><?php echo htmlspecialchars($user['full_name']); ?></h2>
              <p><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
          </div>

          <div class="profile-details">
            <div class="detail-item">
              <div class="detail-label">Email Address</div>
              <div class="detail-value"><?php echo htmlspecialchars($user['email']); ?></div>
            </div>

            <div class="detail-item">
              <div class="detail-label">Account Role</div>
              <div class="role-badge <?php echo htmlspecialchars($user['role']); ?>">
                <?php echo ucfirst(htmlspecialchars($user['role'])); ?>
              </div>
            </div>
          </div>

          <div class="button-group">
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>

    <?php else: ?>
      <!-- Not Logged In Message -->
      <div class="profile-container">
        <div class="profile-card not-logged-in">
          <h1>Your Profile</h1>
          <p>Please sign in or sign up to view your profile.</p>
          <div class="btn-group">
            <a href="login.php" class="btn btn-ghost">Log In</a>
            <a href="signup.php" class="btn btn-primary">Sign Up</a>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
