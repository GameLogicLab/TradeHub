<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Request for Quotation — TradeHub</title>
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
      <a href="rfq.php" class="active">RFQ</a>
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
      <span class="current">Request for Quotation</span>
    </div>

    <!-- RFQ Header Section -->
    <section style="background:linear-gradient(135deg,var(--dark),#162055);padding:60px 72px;color:white;">
      <div style="max-width:640px;">
        <div class="hero-badge" style="margin-bottom:20px;">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <circle cx="7" cy="7" r="6" stroke="rgba(255,255,255,.7)" stroke-width="1.5" />
            <path d="M4.5 7l2 2 3-3" stroke="rgba(255,255,255,.9)" stroke-width="1.5" stroke-linecap="round" />
          </svg>
          Free to submit — No hidden fees
        </div>
        <h1 style="font-size:36px;font-weight:700;line-height:1.2;">Tell us what you need,<br />we'll find the best
          suppliers</h1>
        <p style="font-size:16px;opacity:.75;margin-top:16px;">Fill in your requirements below. Our matching engine will
          connect you with up to 5 verified suppliers within 24 hours.</p>
        <div class="trust-row">
          <span>✓ Verified Suppliers Only</span>
          <div class="dot"></div>
          <span>✓ Free Service</span>
          <div class="dot"></div>
          <span>✓ Response in 24h</span>
        </div>
      </div>
    </section>

    <!-- RFQ Form + Sidebar -->
    <div class="flex" style="gap:32px; padding:40px 72px 80px; align-items:flex-start;">

      <!-- ===== MAIN FORM ===== -->
      <div style="flex:1; max-width:860px;">
        <div class="bg-white rounded border" style="overflow:hidden;">

          <!-- Form Header -->
          <div style="padding:32px; border-bottom:1px solid var(--border);">
            <div class="font-bold" style="font-size:20px;">Submit Your Requirements</div>
            <div class="text-sm text-muted mt-1">Fill in the details below and we'll match you with the best suppliers.
            </div>
          </div>

          <!-- Form Body -->
          <div style="padding:32px;">

            <!-- Step 1: Product Info -->
            <div class="step-indicator">
              <div class="step-num">1</div>
              Product Information
            </div>

            <div class="grid-2 mt-4 mb-4">
              <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label">Product Name *</label>
                <input type="text" class="form-control"
                  placeholder="e.g., CNC Milling Machine, Solar Panels, Steel Pipes…" />
              </div>
              <div class="form-group">
                <label class="form-label">Category *</label>
                <select class="form-control">
                  <option value="">Select Category</option>
                  <option>Industrial Machinery</option>
                  <option>Electronics</option>
                  <option>Steel & Metals</option>
                  <option>Textiles & Fabrics</option>
                  <option>Safety Equipment</option>
                  <option>Green Energy</option>
                  <option>Packaging</option>
                  <option>Food & Agriculture</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Quantity Required *</label>
                <div class="flex gap-2">
                  <input type="number" class="form-control" placeholder="e.g., 500" style="flex:1;" />
                  <select class="form-control" style="width:100px;">
                    <option>Units</option>
                    <option>Tons</option>
                    <option>KG</option>
                    <option>Meters</option>
                    <option>Pieces</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Target Price (USD)</label>
                <input type="text" class="form-control" placeholder="e.g., $500 per unit" />
              </div>
              <div class="form-group">
                <label class="form-label">Delivery Deadline</label>
                <input type="date" class="form-control" />
              </div>
              <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label">Detailed Requirements *</label>
                <textarea class="form-control"
                  placeholder="Please describe specifications, dimensions, materials, certifications, or any other requirements…"
                  style="min-height:140px;"></textarea>
              </div>
              <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label">Attach Reference Files (optional)</label>
                <div
                  style="border:2px dashed var(--border);border-radius:var(--radius);padding:32px;text-align:center;cursor:pointer;background:var(--bg-page);">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" style="margin:0 auto 12px;display:block;">
                    <path d="M16 20V12M12 16l4-4 4 4" stroke="var(--text-muted)" stroke-width="2"
                      stroke-linecap="round" />
                    <rect x="4" y="4" width="24" height="24" rx="4" stroke="var(--border)" stroke-width="1.5" />
                  </svg>
                  <div class="text-sm text-muted">Drag & drop files or <span
                      style="color:var(--primary);cursor:pointer;">browse</span></div>
                  <div class="text-sm text-muted" style="margin-top:4px;">PDF, PNG, DWG, STEP — Max 20MB</div>
                </div>
              </div>
            </div>

            <hr style="border-color:var(--border);margin:32px 0;" />

            <!-- Step 2: Shipping Info -->
            <div class="step-indicator">
              <div class="step-num">2</div>
              Shipping & Delivery
            </div>

            <div class="grid-2 mt-4 mb-4">
              <div class="form-group">
                <label class="form-label">Destination Country *</label>
                <select class="form-control">
                  <option value="">Select Country</option>
                  <option>United States</option>
                  <option>United Kingdom</option>
                  <option>Germany</option>
                  <option>India</option>
                  <option>Australia</option>
                  <option>Canada</option>
                  <option>France</option>
                  <option>Brazil</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Preferred Shipping Method</label>
                <select class="form-control">
                  <option>Sea Freight</option>
                  <option>Air Freight</option>
                  <option>Express Courier</option>
                  <option>Supplier's Choice</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Trade Terms</label>
                <select class="form-control">
                  <option>FOB</option>
                  <option>CIF</option>
                  <option>EXW</option>
                  <option>DDP</option>
                  <option>CFR</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Port / City</label>
                <input type="text" class="form-control" placeholder="e.g., Los Angeles, CA" />
              </div>
            </div>

            <hr style="border-color:var(--border);margin:32px 0;" />

            <!-- Step 3: Contact Info -->
            <div class="step-indicator">
              <div class="step-num">3</div>
              Your Contact Details
            </div>

            <div class="grid-2 mt-4">
              <div class="form-group">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" placeholder="John Smith" />
              </div>
              <div class="form-group">
                <label class="form-label">Company Name *</label>
                <input type="text" class="form-control" placeholder="Your Company Ltd." />
              </div>
              <div class="form-group">
                <label class="form-label">Business Email *</label>
                <input type="email" class="form-control" placeholder="john@company.com" />
              </div>
              <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" placeholder="+1 (555) 000-0000" />
              </div>
              <div class="form-group" style="grid-column:1/-1;">
                <label class="form-label">Company Website (optional)</label>
                <input type="url" class="form-control" placeholder="https://yourcompany.com" />
              </div>
            </div>

            <div class="flex items-center gap-3 mt-6"
              style="background:var(--primary-bg);border-radius:var(--radius);padding:16px;">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <circle cx="10" cy="10" r="9" fill="#1E40AF" opacity=".15" />
                <path d="M10 6v4l2.5 2.5" stroke="#1E40AF" stroke-width="1.8" stroke-linecap="round" />
              </svg>
              <span class="text-sm" style="color:var(--primary);">Your information is protected and will only be shared
                with matched suppliers.</span>
            </div>

            <button class="btn btn-primary btn-lg w-full mt-6" style="font-size:16px;">
              Submit RFQ — Get Free Quotes
            </button>
          </div>
        </div>
      </div>

      <!-- ===== SIDEBAR ===== -->
      <aside style="width:340px; flex-shrink:0; position:sticky; top:85px;">

        <!-- How it works -->
        <div class="bg-white rounded border p-6 mb-4">
          <div class="font-semibold mb-4" style="font-size:15px;">How RFQ Works</div>
          <div style="display:flex;flex-direction:column;gap:20px;">
            <div class="flex gap-3 items-start">
              <div class="step-num" style="flex-shrink:0;margin-top:2px;">1</div>
              <div>
                <div class="font-semibold text-sm">Submit Requirements</div>
                <div class="text-sm text-muted mt-1">Describe what you need with specs and quantity.</div>
              </div>
            </div>
            <div class="flex gap-3 items-start">
              <div class="step-num" style="flex-shrink:0;margin-top:2px;">2</div>
              <div>
                <div class="font-semibold text-sm">Get Matched</div>
                <div class="text-sm text-muted mt-1">Our system finds up to 5 verified suppliers for you.</div>
              </div>
            </div>
            <div class="flex gap-3 items-start">
              <div class="step-num" style="flex-shrink:0;margin-top:2px;">3</div>
              <div>
                <div class="font-semibold text-sm">Compare Quotes</div>
                <div class="text-sm text-muted mt-1">Review quotes and choose the best deal.</div>
              </div>
            </div>
            <div class="flex gap-3 items-start">
              <div class="step-num" style="flex-shrink:0;margin-top:2px;">4</div>
              <div>
                <div class="font-semibold text-sm">Trade Securely</div>
                <div class="text-sm text-muted mt-1">Complete payment with full buyer protection.</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Stats -->
        <div class="bg-white rounded border p-6 mb-4">
          <div class="font-semibold mb-4" style="font-size:15px;">Platform Highlights</div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <div style="text-align:center;padding:16px;background:var(--bg-page);border-radius:var(--radius);">
              <div class="font-bold text-primary" style="font-size:20px;">24h</div>
              <div class="text-sm text-muted">Avg. Response</div>
            </div>
            <div style="text-align:center;padding:16px;background:var(--bg-page);border-radius:var(--radius);">
              <div class="font-bold text-primary" style="font-size:20px;">12K+</div>
              <div class="text-sm text-muted">Suppliers</div>
            </div>
            <div style="text-align:center;padding:16px;background:var(--bg-page);border-radius:var(--radius);">
              <div class="font-bold text-primary" style="font-size:20px;">98%</div>
              <div class="text-sm text-muted">Success Rate</div>
            </div>
            <div style="text-align:center;padding:16px;background:var(--bg-page);border-radius:var(--radius);">
              <div class="font-bold text-primary" style="font-size:20px;">Free</div>
              <div class="text-sm text-muted">Always Free</div>
            </div>
          </div>
        </div>

        <!-- Contact CTA -->
        <div style="background:var(--primary);border-radius:var(--radius);padding:24px;color:white;">
          <div class="font-semibold mb-2">Need Help?</div>
          <div class="text-sm" style="opacity:.8;margin-bottom:16px;">Our sourcing specialists are available 24/7 to
            assist you.</div>
          <a href="help.php" class="btn"
            style="background:rgba(255,255,255,.15);color:white;border:1px solid rgba(255,255,255,.3);width:100%;">Chat
            with Support</a>
        </div>

      </aside>
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
          <li><a href="#">Terms</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom"><span>© 2025 TradeHub Technologies Ltd.</span></div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>