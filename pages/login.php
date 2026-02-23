<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In — TradeHub</title>
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
      padding: 60px 80px;
      max-width: 580px;
      margin: 0 auto;
      width: 100%;
    }

    .auth-visual {
      width: 48%;
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
      opacity: .12;
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
      padding: 12px;
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
      margin: 24px 0;
    }

    .or-divider::before,
    .or-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }
  </style>
</head>

<body>

  <div class="auth-page">

    <!-- ===== Form Panel ===== -->
    <div class="auth-form-panel">

      <!-- Top bar with Bootstrap logo area -->
      <div
        style="padding:20px 40px; border-bottom:1px solid var(--border); display:flex; justify-content:space-between; align-items:center;">
        <a class="brand" href="../index.php">
          <div class="brand-icon">
            <img src="../logo.png" alt="logo">
          </div>
          TradeHub
        </a>
        <a href="help.php" class="text-sm text-muted">Need help?</a>
      </div>

      <div class="auth-form-inner">
        <div class="mb-8">
          <h1 style="font-size:28px;font-weight:700;color:var(--dark);">Welcome back</h1>
          <p class="text-muted mt-2">Log in to your TradeHub account to manage your sourcing and connect with suppliers.
          </p>
        </div>

        <!-- Social Logins -->
        <div class="flex flex-col gap-3">
          <button class="social-btn">
            <!-- Google Icon -->
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
            Continue with Google
          </button>
          <button class="social-btn">
            <!-- GitHub Icon -->
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
            </svg>
            Continue with GitHub
          </button>
        </div>

        <div class="or-divider">or continue with email</div>

        <!-- Email Form -->
        <div class="flex flex-col gap-4">
          <div class="form-group">
            <label class="form-label">Business Email *</label>
            <input type="email" class="form-control" placeholder="john@company.com" />
          </div>
          <div class="form-group">
            <div class="flex justify-between items-center mb-1">
              <label class="form-label" style="margin-bottom:0;">Password *</label>
              <a href="#" class="text-sm" style="color:var(--primary);">Forgot password?</a>
            </div>
            <input type="password" class="form-control" placeholder="Enter your password" />
          </div>

          <div class="flex items-center gap-2">
            <input type="checkbox" id="remember" style="width:16px;height:16px;accent-color:var(--primary);" />
            <label for="remember" class="text-sm text-muted" style="cursor:pointer;">Remember me for 30 days</label>
          </div>

          <button class="btn btn-primary btn-lg w-full" style="font-size:15px;">Log In</button>
        </div>

        <div class="text-center mt-6 text-sm text-muted">
          Don't have an account? <a href="signup.php" style="color:var(--primary);font-weight:500;">Sign up free</a>
        </div>

        <div class="text-center mt-4 text-sm text-muted" style="font-size:12px;line-height:1.6;">
          By continuing, you agree to TradeHub's <a href="#" style="color:var(--primary);">Terms of Service</a> and <a
            href="#" style="color:var(--primary);">Privacy Policy</a>.
        </div>
      </div>
    </div>

    <!-- ===== Visual Panel ===== -->
    <div class="auth-visual">
      <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=900&q=80" alt="Global Trade"
        class="auth-visual-img" />
      <div class="auth-visual-content">
        <div style="font-size:32px;font-weight:700;line-height:1.2;margin-bottom:16px;">Trade Smarter,<br />Scale Faster
        </div>
        <div style="font-size:15px;opacity:.75;margin-bottom:40px;line-height:1.7;">Connect with verified suppliers from
          190+ countries. Source quality products with full trade assurance.</div>

        <div class="auth-feature">
          <div class="auth-feature-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path d="M9 2l7 4v6l-7 4-7-4V6L9 2z" stroke="white" stroke-width="1.8" stroke-linejoin="round" />
            </svg>
          </div>
          <div>
            <div style="font-weight:600;font-size:14px;">Verified Suppliers</div>
            <div style="font-size:13px;opacity:.7;margin-top:3px;">12,000+ pre-vetted global suppliers at your
              fingertips.</div>
          </div>
        </div>

        <div class="auth-feature">
          <div class="auth-feature-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <rect x="1" y="3" width="16" height="12" rx="2" stroke="white" stroke-width="1.8" />
              <path d="M1 7h16" stroke="white" stroke-width="1.5" />
            </svg>
          </div>
          <div>
            <div style="font-weight:600;font-size:14px;">Secure Payments</div>
            <div style="font-size:13px;opacity:.7;margin-top:3px;">Multi-layer buyer protection with escrow services.
            </div>
          </div>
        </div>

        <div class="auth-feature">
          <div class="auth-feature-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <circle cx="9" cy="7" r="5" stroke="white" stroke-width="1.8" />
              <path d="M3 17c0-3.31 2.69-6 6-6s6 2.69 6 6" stroke="white" stroke-width="1.8" stroke-linecap="round" />
            </svg>
          </div>
          <div>
            <div style="font-weight:600;font-size:14px;">24/7 Support</div>
            <div style="font-size:13px;opacity:.7;margin-top:3px;">Dedicated sourcing experts ready to assist anytime.
            </div>
          </div>
        </div>

        <!-- Testimonial -->
        <div
          style="margin-top:48px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:var(--radius);padding:20px;">
          <div style="font-size:14px;font-style:italic;opacity:.85;line-height:1.6;">"TradeHub reduced our sourcing time
            by 60% and helped us find better suppliers at lower costs."</div>
          <div style="font-size:13px;opacity:.6;margin-top:12px;">— Marcus W., Operations Director, BuildPro Inc.</div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>