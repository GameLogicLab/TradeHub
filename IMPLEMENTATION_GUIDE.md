# TradeHub Core PHP + MySQL Feature Implementation

## Overview
This document outlines the complete implementation of all requested features for your TradeHub B2B marketplace. All changes use external CSS (no UI modifications), server-side PHP validation, and prepared statements for security.

---

## 1. Database Setup

### SQL Table Creation
Run the `database_setup.sql` file in your MySQL to create the required users table:

```bash
mysql -u root tradehub < database_setup.sql
```

Or manually execute the SQL commands in [`database_setup.sql`](database_setup.sql)

**Database Structure:**
- Table: `users`
- Columns:
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `full_name` (VARCHAR 255)
  - `email` (VARCHAR 255, UNIQUE)
  - `password` (VARCHAR 255 - hashed)
  - `role` (ENUM: 'buyer' or 'seller')
  - `created_at` (TIMESTAMP)
  - `updated_at` (TIMESTAMP)

---

## 2. Database Connection Configuration

**File:** [`db_connect.php`](db_connect.php)

Update the database credentials:

```php
define('DB_HOST', 'localhost');    // Your MySQL host
define('DB_USER', 'root');         // Your MySQL username
define('DB_PASS', '');             // Your MySQL password
define('DB_NAME', 'tradehub');     // Your database name
```

---

## 3. Features Implemented

### 3.1 Server-Side Regex Validation

**File:** [`auth.php`](auth.php)

#### Sign Up Validation Functions:
- **`validateFullName($name)`** - Only letters and spaces, minimum 3 characters
  ```regex
  /^[a-zA-Z\s]+$/
  ```

- **`validateEmail($email)`** - Valid email format using PHP's `filter_var()`

- **`validatePassword($password)`** - Complex password requirements:
  - Minimum 8 characters
  - At least 1 uppercase letter
  - At least 1 lowercase letter
  - At least 1 number (0-9)
  - At least 1 special character (!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\\/?)

- **`validateRole($role)`** - Must be 'buyer' or 'seller'

#### Password Hashing & Verification:
- Uses `password_hash()` with PASSWORD_DEFAULT algorithm (bcrypt)
- Uses `password_verify()` for login validation
- All passwords are securely hashed before storage

#### Prepared Statements:
All database queries use prepared statements with parameter binding to prevent SQL injection:
```php
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
```

---

### 3.2 Role Selection in Sign Up

**File:** [`pages/signup.php`](pages/signup.php)

Added "I am joining as" field with two options:
- **Buyer** (default) - "Source products"
- **Supplier** - "Sell products" (mapped to role `'seller'` in database)

Role is submitted as POST data and stored in the database:
```html
<input type="radio" name="role" value="buyer" checked />
<input type="radio" name="role" value="seller" />
```

---

### 3.3 Session-Based Navbar Logic

**Files:** 
- [`check_session.php`](check_session.php) - Session helper functions
- All pages updated with session checks

#### Session Management Functions:
```php
// Check if user is logged in
isLoggedIn()

// Get logged-in user data
getLoggedInUser()

// Check user role
isBuyer()
isSeller()

// Set user session (used in login)
setUserSession($user)

// Logout user
logoutUser()
```

#### Navbar Behavior:

**If NOT logged in:**
- Shows "Log in" and "Get Started" buttons
- Hides "Profile" and "Logout" buttons

**If logged in:**
- Shows "Profile" and "Logout" buttons
- Hides "Log in" and "Get Started" buttons

**Updated Pages with Session Logic:**
- `index.php`
- `pages/login.php`
- `pages/signup.php`
- `pages/profile.php`
- `pages/logout.php`
- `pages/about.php`
- `pages/help.php`
- `pages/categoris.php`
- `pages/suppliers.php`
- `pages/rfq.php`

---

### 3.4 Profile Page

**File:** [`pages/profile.php`](pages/profile.php)

#### For Logged-In Users:
Displays user information in a styled profile card:
- Full Name
- Email Address
- Account Role (Buyer or Seller with color-coded badge)
- Logout button

#### For Not Logged-In Users:
Shows message:
> "Please sign in or sign up to view your profile."

With links to Login and Sign Up pages.

#### Styling:
- Maintains existing TradeHub UI design
- Professional profile card layout
- Role badges with color coding:
  - Buyer: Blue (#EFF6FF)
  - Seller: Gold (#FEF3C7)

---

### 3.5 Role-Based Access Control (RBAC)

**Files:**
- [`buyer_check.php`](buyer_check.php) - Buyer-only access control
- [`seller_check.php`](seller_check.php) - Seller-only access control

#### How to Protect Pages:

**For Buyer-Only Pages (e.g., RFQ):**
```php
<?php
require_once '../check_session.php';
require_once '../buyer_check.php';
// Rest of page code...
?>
```

**For Seller-Only Pages:**
```php
<?php
require_once '../check_session.php';
require_once '../seller_check.php';
// Rest of page code...
?>
```

#### Access Control Behavior:
- If user is NOT logged in → Redirects to login page
- If user is logged in BUT has wrong role → Redirects to login page
- If user has correct role → Page loads normally

#### Currently Protected Pages:
- `pages/rfq.php` - Buyer-only (Post RFQs)

#### To Add RBAC to Other Pages:
Add this line at the top of any buyer-only page:
```php
require_once '../buyer_check.php';
```

Or for seller-only pages:
```php
require_once '../seller_check.php';
```

---

### 3.6 Authentication Pages

#### Sign Up (`pages/signup.php`)
- Validates all inputs server-side
- Shows error messages for invalid data
- Displays success message on registration
- Auto-redirects to login after 2 seconds
- Form fields:
  - Full Name (required)
  - Business Email (required)
  - Password (required, with requirements displayed)
  - Register As (Buyer/Seller radio buttons)
  - Terms checkbox (required)

#### Login (`pages/login.php`)
- Validates email format
- Verifies password with `password_verify()`
- Shows error messages for incorrect credentials
- Displays success message on login
- Auto-redirects to home page after 1.5 seconds
- Form fields:
  - Business Email (required)
  - Password (required)
  - Remember me checkbox (optional)

#### Logout (`pages/logout.php`)
- Destroys user session
- Redirects to home page

---

## 4. File Structure

```
TradeHub/
├── index.php                    # Home page (updated with session logic)
├── db_connect.php              # Database connection
├── auth.php                    # Authentication functions
├── check_session.php           # Session helper functions
├── buyer_check.php             # Buyer access control
├── seller_check.php            # Seller access control
├── database_setup.sql          # Database setup script
├── css/
│   └── global.css              # Existing styles (unchanged)
├── pages/
│   ├── login.php               # Login page (updated)
│   ├── signup.php              # Sign up page (updated)
│   ├── logout.php              # Logout (new)
│   ├── profile.php             # User profile (new)
│   ├── about.php               # About page (updated with session)
│   ├── help.php                # Help page (updated with session)
│   ├── categoris.php           # Products page (updated with session)
│   ├── suppliers.php           # Suppliers page (updated with session)
│   └── rfq.php                 # RFQ page (updated with session + buyer check)
└── logo.png                    # Existing logo (unchanged)
```

---

## 5. Security Features

✅ **Password Hashing:** Using bcrypt via `password_hash()` with PASSWORD_DEFAULT
✅ **Password Verification:** Using `password_verify()` for login
✅ **Prepared Statements:** All SQL queries use prepared statements with parameter binding
✅ **Input Validation:** Server-side regex validation for all user inputs
✅ **Session Security:** Session-based authentication with role checking
✅ **Email Validation:** Using PHP's built-in `FILTER_VALIDATE_EMAIL`
✅ **XSS Protection:** Using `htmlspecialchars()` for output escaping
✅ **SQL Injection Prevention:** Prepared statements with typed parameters

---

## 6. Testing Guide

### Test Case 1: Sign Up as Buyer
1. Go to "Get Started"
2. Enter:
   - Full Name: `John Smith`
   - Email: `john@example.com`
   - Password: `Test@1234`
   - Role: Buyer (default)
3. Check Terms checkbox
4. Click "Create Free Account"
5. Should show success message and redirect to login

### Test Case 2: Sign Up with Invalid Data
1. Try Full Name: `123` (numbers not allowed) → Error
2. Try Email: `invalid-email` → Error
3. Try Password: `short` (too short) → Error
4. Try Password: `NoNumbers!` (missing number) → Error

### Test Case 3: Login
1. Go to "Log in"
2. Enter email and password from Test Case 1
3. Should redirect to home page
4. Navbar should show "Profile" and "Logout" instead of "Log in" and "Get Started"

### Test Case 4: Profile Access
1. After logging in, click "Profile" in navbar
2. Should display user information
3. Click "Logout"
4. Navbar should revert to showing "Log in" and "Get Started"

### Test Case 5: Not Logged In Profile
1. Without logging in, go to `pages/profile.php`
2. Should show "Please sign in or sign up to view your profile" message

### Test Case 6: RBAC - RFQ Access as Buyer
1. Log in as Buyer
2. Click "RFQ" in navbar
3. Should load RFQ page normally

### Test Case 7: RBAC - RFQ Access as Seller
1. Log in as Seller (or sign up as Seller)
2. Try to access `pages/rfq.php` directly
3. Should redirect to login page

---

## 7. Password Requirements

Users must enter a password with:
- ✅ Minimum 8 characters
- ✅ At least 1 UPPERCASE letter (A-Z)
- ✅ At least 1 lowercase letter (a-z)
- ✅ At least 1 number (0-9)
- ✅ At least 1 special character (!@#$%^&*)

Example valid password: `TestPass123!`

---

## 8. Error Messages

All error messages are shown on the same page in a red error box:
- "Full Name must contain only letters and spaces, minimum 3 characters."
- "Please enter a valid email address."
- "Password must be at least 8 characters with 1 uppercase, 1 lowercase, 1 number, and 1 special character."
- "Email already registered. Please log in or use a different email."
- "Email not found. Please check or create an account."
- "Incorrect password. Please try again."

---

## 9. Notes

- No JavaScript was used for validation (server-side only)
- No UI, layout, spacing, color, or responsiveness changes were made
- All styling uses external CSS as requested
- Database queries use prepared statements for security
- Sessions use PHP's built-in session management
- All pages maintain existing TradeHub design and branding

---

## 10. Support

For questions or issues:
1. Check that `db_connect.php` has correct database credentials
2. Ensure the users table exists (run `database_setup.sql`)
3. Check that PHP sessions are enabled in your server
4. Verify that all file paths are correct (relative to web root)

