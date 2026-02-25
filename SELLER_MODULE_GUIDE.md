# Seller Module - Implementation Guide

## Overview
The seller module allows sellers registered on TradeHub to manage their product catalog, including:
- Dashboard with overview and statistics
- Product management (add, view, edit, delete)
- Product inventory tracking
- Product status management (active, draft, inactive)

---

## Database Setup

### Step 1: Create the Products Table
Run the SQL from `seller_module_setup.sql` to create the products table:

```bash
mysql -u root tradehub < seller_module_setup.sql
```

Or execute manually in MySQL:

```sql
CREATE TABLE IF NOT EXISTS products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  seller_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10, 2),
  quantity INT DEFAULT 0,
  sku VARCHAR(100) UNIQUE,
  status ENUM('active', 'inactive', 'draft') DEFAULT 'draft',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (seller_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Step 2: Verify Database Configuration
Ensure `db_connect.php` has the correct database credentials

---

## File Structure

```
pages/
├── seller_dashboard.php          # Dashboard with stats
├── seller_products.php           # View/manage products with filters
├── seller_add_product.php        # Add new product
├── seller_edit_product.php       # Edit existing product
└── seller_delete_product.php     # Delete product handler
```

---

## Features

### 1. Dashboard (`seller_dashboard.php`)
- Overview of seller's account
- Statistics cards showing:
  - Total Products
  - Active Products
  - Draft Products
  - Total Inventory Count
- Recent 5 products list with quick actions

**Access:** Only sellers can access (RBAC protected)
**URL:** `/pages/seller_dashboard.php`

### 2. My Products (`seller_products.php`)
- View all seller's products in a table
- Filter by status (Active, Draft, Inactive)
- Search by product name or category
- Edit and delete actions for each product

**Features:**
- Pagination-ready structure
- Search and filter functionality
- Action buttons for edit/delete
- Empty state when no products exist

**Access:** Only sellers can access (RBAC protected)
**URL:** `/pages/seller_products.php`

### 3. Add Product (`seller_add_product.php`)
- Form to add new products
- Fields:
  - Product Name (required, min 3 characters)
  - Description (optional)
  - Category (optional)
  - Price (required, positive number)
  - Quantity (required, non-negative)
  - SKU (optional, unique per seller)
  - Status (draft/active/inactive)

**Validation:**
- Server-side validation only
- Product name length check
- Price/quantity validation
- Duplicate SKU check

**Access:** Only sellers can access (RBAC protected)
**URL:** `/pages/seller_add_product.php`

### 4. Edit Product (`seller_edit_product.php`)
- Edit existing product details
- Same fields as Add Product
- Product verification (must belong to logged-in seller)

**Access:** Only sellers can access (RBAC protected)
**URL:** `/pages/seller_edit_product.php?id={product_id}`

### 5. Delete Product (`seller_delete_product.php`)
- Delete product permanently
- Verifies ownership (RBAC)
- Redirects to products list after deletion

**Access:** Only sellers can access (RBAC protected)
**URL:** `/pages/seller_delete_product.php?id={product_id}`

---

## Security Features

✅ **RBAC Protection:** All pages use `require_once '../seller_check.php'` to protect endpoints
✅ **Ownership Verification:** Sellers can only manage their own products
✅ **Prepared Statements:** All database queries use prepared statements
✅ **Input Validation:** Server-side validation for all inputs
✅ **XSS Protection:** All output escaped with `htmlspecialchars()`
✅ **Session-Based Auth:** Uses PHP sessions for authentication

---

## Database Schema

### Products Table
```
id              INT          Primary Key, Auto Increment
seller_id       INT          Foreign Key → users(id)
product_name    VARCHAR(255) Required
description     TEXT         Optional
category        VARCHAR(100) Optional
price           DECIMAL(10,2) Required
quantity        INT          Default 0
sku             VARCHAR(100) Optional, Unique per seller
status          ENUM         'active' | 'draft' | 'inactive'
created_at      TIMESTAMP    Auto set to current time
updated_at      TIMESTAMP    Auto updates on modification
```

---

## User Interface

All seller module pages maintain consistent design with:
- Sidebar navigation menu
- Consistent styling with existing TradeHub UI
- Responsive layout (works on desktop and mobile)
- Status badges with color coding
- Clear error/success messages

### Status Badge Colors
- **Active:** Green (#DCFCE7)
- **Draft:** Gold (#FEF3C7)
- **Inactive:** Red (#FEE2E2)

---

## Example User Flow

### Adding a Product
1. Seller logs in with seller role
2. Clicks "Add Product" in sidebar
3. Fills product form
4. Submits form
5. Product added to database
6. Redirected to products list
7. New product appears in table

### Editing a Product
1. Seller views products list
2. Clicks "Edit" on desired product
3. Form loads with existing data
4. Updates any fields
5. Clicks "Update Product"
6. Changes saved to database
7. Redirected to products list

### Deleting a Product
1. Seller views products list
2. Clicks "Delete" on product
3. Confirmation dialog appears
4. Confirms deletion
5. Product deleted from database
6. Redirected to products list

---

## Access Control

### Who Can Access Seller Module?

**Can Access:**
- Users with role = 'seller'
- Logged in session required

**Cannot Access:**
- Users with role = 'buyer' → Redirected to login
- Non-logged-in users → Redirected to login

### Ownership Verification

Sellers can only:
- View their own products
- Edit their own products
- Delete their own products

Attempting to access/edit another seller's products will redirect to products list.

---

## Notes

- All dates are displayed in format: "Mon DD, YYYY" (e.g., "Mar 15, 2024")
- Prices displayed with 2 decimal places (e.g., "$49.99")
- SKU must be unique per seller (not globally unique)
- Product status can be changed anytime
- Deleting a product is permanent
- No image upload feature in current version

---

## Testing Checklist

- [ ] Seller can log in with seller role
- [ ] Dashboard shows correct statistics
- [ ] Can add new products
- [ ] Can view all products
- [ ] Can filter/search products
- [ ] Can edit product details
- [ ] Can delete products
- [ ] Cannot access as non-seller
- [ ] Cannot edit other seller's products
- [ ] Validation works for all fields
- [ ] Database records update correctly

---

## Troubleshooting

**Problem:** "Access Denied" when trying to access seller pages
**Solution:** Ensure you're logged in with a user that has `role = 'seller'`

**Problem:** "404 Not Found" on product edit page
**Solution:** Verify the product ID in URL and ensure product belongs to logged-in seller

**Problem:** "SKU already exists" error
**Solution:** Make sure your SKU is unique among your products

**Problem:** Products not showing in list
**Solution:** Check database connection credentials in `db_connect.php`

---

## Future Enhancements

Potential improvements for future versions:
- Product images/gallery
- Bulk product import from CSV
- Product variants (size, color, etc.)
- Promotional pricing
- Inventory alerts
- Order history
- Customer reviews
- Analytics dashboard

