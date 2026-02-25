<<<<<<< HEAD
<?php

/**
 * Sign Up Page
 * User registration with validation
 */

require_once '../db_connect.php';
require_once '../auth.php';
require_once '../check_session.php';

// Redirect if already logged in
if (isLoggedIn()) {
  header('Location: ../index.php');
  exit();
}

// Initialize error/success messages
$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Sanitize and get form data
  $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $role = isset($_POST['role']) ? trim($_POST['role']) : '';

  // Register user
  $result = registerUser($conn, $full_name, $email, $password, $role);

  if ($result['success']) {
    $success_message = $result['message'];
    // Redirect to login after 2 seconds
    header('refresh:2;url=login.php');
  } else {
    $error_message = $result['message'];
  }
}

?>
=======
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Account — TradeHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/global.css" />
  <style>
    body {
      overflow: hidden;
    }

    .auth-page {
      display: flex;
      height: 100vh;
    }

    .auth-form-panel {
      flex: 1;
      display: flex;
      flex-direction: column;
      background: var(--white);
      overflow-y: auto;
    }

    .auth-form-inner {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 48px 72px;
      max-width: 620px;
      margin: 0 auto;
      width: 100%;
    }

    .auth-visual {
      width: 42%;
      flex-shrink: 0;
      background: linear-gradient(160deg, #1E40AF 0%, #0f1f5c 100%);
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 64px 56px;
      color: white;
    }

    .auth-visual-img {
      position: absolute;
      inset: 0;
      object-fit: cover;
      width: 100%;
      height: 100%;
      opacity: .1;
    }

    .auth-visual-content {
      position: relative;
      z-index: 1;
    }

    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      padding: 11px;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      background: var(--white);
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      transition: all .2s;
      color: var(--dark);
    }

    .social-btn:hover {
      border-color: var(--primary);
      background: var(--primary-bg);
    }

    .or-divider {
      display: flex;
      align-items: center;
      gap: 16px;
      color: #94A3B8;
      font-size: 13px;
      margin: 20px 0;
    }

    .or-divider::before,
    .or-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    /* Progress Steps */
    .signup-steps {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 28px;
    }

    .signup-step {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .step-circle {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 600;
    }

    .step-circle.active {
      background: var(--primary);
      color: white;
    }

    .step-circle.inactive {
      background: var(--border);
      color: #94A3B8;
    }

    .step-line {
      flex: 1;
      height: 1px;
      background: var(--border);
    }
  </style>
</head>

<body>

  <div class="auth-page">

    <!-- ===== Visual Panel (LEFT) ===== -->
    <div class="auth-visual">
      <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=900&q=80" alt="Trade"
        class="auth-visual-img" />
      <div class="auth-visual-content">
        <div class="brand" style="color:white;margin-bottom:40px;">
          <div class="brand-icon">
            <img src="../logo.png" alt="logo">
          </div>
          TradeHub
        </div>

        <div style="font-size:30px;font-weight:700;line-height:1.25;margin-bottom:16px;">Join 50,000+<br />Businesses
          Already<br />Sourcing Globally</div>
        <div style="font-size:14px;opacity:.75;margin-bottom:40px;line-height:1.7;">Access verified suppliers, post
          RFQs, and trade with full buyer protection — all in one platform.</div>

        <!-- Benefit List -->
        <div style="display:flex;flex-direction:column;gap:18px;">
          <div class="auth-feature">
            <div class="auth-feature-icon">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M9 1l8 4.5v7L9 17l-8-4.5v-7L9 1z" stroke="white" stroke-width="1.8" stroke-linejoin="round" />
              </svg>
            </div>
            <div>
              <div style="font-weight:600;font-size:14px;">12K+ Verified Suppliers</div>
              <div style="font-size:13px;opacity:.7;margin-top:3px;">ISO-certified, trade-assured partners from 80+
                countries.</div>
            </div>
          </div>
          <div class="auth-feature">
            <div class="auth-feature-icon">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M2 5h14M2 9h10M2 13h7" stroke="white" stroke-width="1.8" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <div style="font-weight:600;font-size:14px;">Instant RFQ Matching</div>
              <div style="font-size:13px;opacity:.7;margin-top:3px;">Post once and receive up to 5 quotes within 24
                hours.</div>
            </div>
          </div>
          <div class="auth-feature">
            <div class="auth-feature-icon">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <rect x="1" y="4" width="16" height="10" rx="2" stroke="white" stroke-width="1.8" />
                <path d="M6 9h6" stroke="white" stroke-width="1.8" stroke-linecap="round" />
              </svg>
            </div>
            <div>
              <div style="font-weight:600;font-size:14px;">Free to Start</div>
              <div style="font-size:13px;opacity:.7;margin-top:3px;">No fees to sign up. Pay only when you trade.</div>
            </div>
          </div>
        </div>

        <!-- Social Proof -->
        <div
          style="margin-top:48px;display:flex;align-items:center;gap:12px;background:rgba(255,255,255,.1);border-radius:var(--radius);padding:16px;">
          <div style="display:flex;">
            <img src="https://i.pravatar.cc/32?img=1"
              style="width:32px;height:32px;border-radius:50%;border:2px solid white;margin-right:-8px;" alt="user" />
            <img src="https://i.pravatar.cc/32?img=5"
              style="width:32px;height:32px;border-radius:50%;border:2px solid white;margin-right:-8px;" alt="user" />
            <img src="https://i.pravatar.cc/32?img=10"
              style="width:32px;height:32px;border-radius:50%;border:2px solid white;" alt="user" />
          </div>
          <div>
            <div style="font-size:13px;font-weight:600;">50,000+ businesses</div>
            <div style="font-size:12px;opacity:.7;">joined in the last 30 days</div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== Form Panel (RIGHT) ===== -->
    <div class="auth-form-panel">
      <div
        style="padding:20px 40px; border-bottom:1px solid var(--border); display:flex; justify-content:space-between; align-items:center;">
        <a href="login.php" class="text-sm text-muted">Already have an account? <span
            style="color:var(--primary);font-weight:500;">Log in</span></a>
        <a href="help.php" class="text-sm text-muted">Need help?</a>
      </div>

      <div class="auth-form-inner">
        <div class="mb-6">
          <h1 style="font-size:26px;font-weight:700;color:var(--dark);">Create your account</h1>
          <p class="text-muted text-sm mt-1">Join 50,000+ businesses already sourcing on TradeHub.</p>
        </div>

        <!-- Progress Steps -->
        <div class="signup-steps">
          <div class="signup-step">
            <div class="step-circle active">1</div>
            <span style="font-size:13px;font-weight:500;color:var(--dark);">Account</span>
          </div>
          <div class="step-line"></div>
          <div class="signup-step">
            <div class="step-circle inactive">2</div>
            <span style="font-size:13px;color:#94A3B8;">Business</span>
          </div>
          <div class="step-line"></div>
          <div class="signup-step">
            <div class="step-circle inactive">3</div>
            <span style="font-size:13px;color:#94A3B8;">Verify</span>
          </div>
        </div>

        <!-- Social Signup -->
        <div class="flex gap-3">
          <button class="social-btn" style="flex:1;">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path
                d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.48h4.844a4.14 4.14 0 01-1.796 2.716v2.259h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"
                fill="#4285F4" />
              <path
                d="M9 18c2.43 0 4.467-.806 5.956-2.18l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 009 18z"
                fill="#34A853" />
              <path
                d="M3.964 10.71A5.41 5.41 0 013.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 000 9c0 1.452.348 2.827.957 4.042l3.007-2.332z"
                fill="#FBBC05" />
              <path
                d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 00.957 4.958L3.964 7.29C4.672 5.163 6.656 3.58 9 3.58z"
                fill="#EA4335" />
            </svg>
            Google
          </button>
          <button class="social-btn" style="flex:1;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
            </svg>
            GitHub
          </button>
          <button class="social-btn" style="flex:1;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#0077B5">
              <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
              <circle cx="4" cy="4" r="2" fill="#0077B5" />
            </svg>
            LinkedIn
          </button>
        </div>

        <div class="or-divider">or sign up with email</div>

        <!-- Form Fields -->
<<<<<<< HEAD
        <form method="POST" action="signup.php" class="flex flex-col gap-4">

          <!-- Error/Success Messages -->
          <?php if (!empty($error_message)): ?>
            <div style="padding: 12px 16px; background-color: #FEE2E2; border: 1px solid #FECACA; border-radius: var(--radius); color: #991B1B; font-size: 14px;">
              <?php echo htmlspecialchars($error_message); ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($success_message)): ?>
            <div style="padding: 12px 16px; background-color: #DCFCE7; border: 1px solid #BBF7D0; border-radius: var(--radius); color: #166534; font-size: 14px;">
              <?php echo htmlspecialchars($success_message); ?>
            </div>
          <?php endif; ?>

          <div class="grid-2" style="gap:12px;">
            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="full_name" class="form-control" placeholder="John Smith" required
                value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>" />
=======
        <div class="flex flex-col gap-4">
          <div class="grid-2" style="gap:12px;">
            <div class="form-group">
              <label class="form-label">First Name *</label>
              <input type="text" class="form-control" placeholder="John" />
            </div>
            <div class="form-group">
              <label class="form-label">Last Name *</label>
              <input type="text" class="form-control" placeholder="Smith" />
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Business Email *</label>
<<<<<<< HEAD
            <input type="email" name="email" class="form-control" placeholder="john@company.com" required
              value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
          </div>
          <div class="form-group">
            <label class="form-label">Password *</label>
            <input type="password" name="password" class="form-control" placeholder="Min. 8 characters" required />
            <small style="color: var(--text-muted); font-size: 12px; margin-top: 4px; display: block;">
              At least 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character
            </small>
=======
            <input type="email" class="form-control" placeholder="john@company.com" />
          </div>
          <div class="form-group">
            <label class="form-label">Password *</label>
            <input type="password" class="form-control" placeholder="Min. 8 characters" />
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
          </div>
          <div class="form-group">
            <label class="form-label">I am joining as *</label>
            <div class="flex gap-3">
              <label
<<<<<<< HEAD
                style="flex:1;display:flex;align-items:center;gap:10px;padding:12px 16px;border:1px solid var(--border);border-radius:var(--radius);cursor:pointer;">
                <input type="radio" name="role" value="buyer" checked style="accent-color:var(--primary);width:16px;height:16px;" />
                <div>
                  <div style="font-size:13px;font-weight:600;color:var(--dark);">Buyer</div>
=======
                style="flex:1;display:flex;align-items:center;gap:10px;padding:12px 16px;border:1px solid var(--primary);border-radius:var(--radius);cursor:pointer;background:var(--primary-bg);">
                <input type="radio" name="role" checked style="accent-color:var(--primary);width:16px;height:16px;" />
                <div>
                  <div style="font-size:13px;font-weight:600;color:var(--primary);">Buyer</div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
                  <div style="font-size:12px;color:var(--text-muted);">Source products</div>
                </div>
              </label>
              <label
                style="flex:1;display:flex;align-items:center;gap:10px;padding:12px 16px;border:1px solid var(--border);border-radius:var(--radius);cursor:pointer;">
<<<<<<< HEAD
                <input type="radio" name="role" value="seller" style="accent-color:var(--primary);width:16px;height:16px;" />
=======
                <input type="radio" name="role" style="accent-color:var(--primary);width:16px;height:16px;" />
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
                <div>
                  <div style="font-size:13px;font-weight:600;color:var(--dark);">Supplier</div>
                  <div style="font-size:12px;color:var(--text-muted);">Sell products</div>
                </div>
              </label>
            </div>
          </div>

          <div class="flex items-center gap-2">
<<<<<<< HEAD
            <input type="checkbox" id="agree" name="agree" style="width:16px;height:16px;accent-color:var(--primary);" required />
=======
            <input type="checkbox" id="agree" style="width:16px;height:16px;accent-color:var(--primary);" />
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f
            <label for="agree" class="text-sm text-muted" style="cursor:pointer;">
              I agree to the <a href="#" style="color:var(--primary);">Terms of Service</a> and <a href="#"
                style="color:var(--primary);">Privacy Policy</a>
            </label>
          </div>

<<<<<<< HEAD
          <button type="submit" class="btn btn-primary btn-lg w-full" style="font-size:15px;">Create Free Account →</button>
        </form>
=======
          <button class="btn btn-primary btn-lg w-full" style="font-size:15px;">Create Free Account →</button>
        </div>
>>>>>>> 359096a8c1106d1124399a4982747603a0cbf23f

        <div class="text-center mt-4 text-sm text-muted">
          Already have an account? <a href="login.php" style="color:var(--primary);font-weight:500;">Log in</a>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>