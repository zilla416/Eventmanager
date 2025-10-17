# Forbidden Error - Quick Fix Guide

## Problem
"Forbidden - You don't have permission to access this resource"

This happens because:
1. The web server is trying to access `/eventmanager/` but Laravel needs to serve from `/eventmanager/public/`
2. OR file permissions are too restrictive
3. OR .htaccess is missing

---

## Solution 1: Point to Public Directory (RECOMMENDED)

You need to make the web server point to the `public` folder inside eventmanager.

### Option A: Move Public Contents to eventmanager Root

1. **Via FileZilla, move these files from `eventmanager/public/` to `eventmanager/`:**
   ```
   public/index.php         → eventmanager/index.php
   public/.htaccess         → eventmanager/.htaccess
   public/robots.txt        → eventmanager/robots.txt
   public/build/            → eventmanager/build/
   public/uploads/          → eventmanager/uploads/
   public/resources/        → eventmanager/resources/
   ```

2. **Edit `eventmanager/index.php`** (right-click → View/Edit in FileZilla)

   **Find these lines (around line 16-17):**
   ```php
   require __DIR__.'/../vendor/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';
   ```

   **Change to:**
   ```php
   require __DIR__.'/vendor/autoload.php';
   $app = require_once __DIR__.'/bootstrap/app.php';
   ```

3. **Save and test:** https://u230752.gluwebsite.nl/eventmanager/

---

## Solution 2: Add .htaccess Redirect

If you want to keep public folder structure:

1. **Create `.htaccess` in `eventmanager/` folder** (NOT in public)

2. **Paste this content:**
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteRule ^(.*)$ public/$1 [L]
   </IfModule>
   ```

3. **Make sure `eventmanager/public/.htaccess` also exists with:**
   ```apache
   <IfModule mod_rewrite.c>
       <IfModule mod_negotiation.c>
           Options -MultiViews -Indexes
       </IfModule>

       RewriteEngine On
       RewriteBase /eventmanager/

       # Handle Authorization Header
       RewriteCond %{HTTP:Authorization} .
       RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

       # Redirect Trailing Slashes If Not A Folder
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteCond %{REQUEST_URI} (.+)/$
       RewriteRule ^ %1 [L,R=301]

       # Send Requests To Front Controller
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteRule ^ index.php [L]
   </IfModule>
   ```

---

## Solution 3: Fix File Permissions

Via FileZilla or cPanel File Manager:

1. **Right-click on `eventmanager` folder → File Permissions**
2. **Set to 755** (or check: Read, Write, Execute for owner; Read, Execute for group/public)
3. **Apply recursively to all files**

Specifically check:
```
eventmanager/             → 755
eventmanager/public/      → 755
eventmanager/storage/     → 755 or 777
eventmanager/.htaccess    → 644
eventmanager/public/.htaccess → 644
```

---

## Solution 4: Check .htaccess Exists

Make sure `.htaccess` exists in `eventmanager/public/`:

**Create `public/.htaccess` if missing:**
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

---

## Quick Diagnostic

### Check your current structure in FileZilla:

**Expected structure:**
```
public_html/
└── eventmanager/
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── public/              ← WEB ROOT SHOULD BE HERE
    │   ├── index.php        ← Entry point
    │   ├── .htaccess        ← URL rewriting
    │   ├── build/
    │   └── uploads/
    ├── resources/
    ├── routes/
    ├── storage/
    ├── vendor/
    ├── .env
    └── artisan
```

### What URL Should Load:
- ❌ `https://u230752.gluwebsite.nl/eventmanager/` → tries to list directory
- ✅ `https://u230752.gluwebsite.nl/eventmanager/public/` → should work
- ✅ `https://u230752.gluwebsite.nl/eventmanager/` → should work AFTER fix

---

## Recommended Fix (Easiest)

**Do Solution 1 (Move public contents)**:

1. Move files from `eventmanager/public/` up one level
2. Edit `index.php` to fix paths
3. Test

This is the simplest approach for shared hosting!

---

## Test After Fix

Visit: `https://u230752.gluwebsite.nl/eventmanager/`

**Should see:** Your Laravel homepage with events

**If still forbidden:** 
- Check file permissions (755 on folders, 644 on files)
- Contact hosting support to enable .htaccess / mod_rewrite

---

## Need More Help?

Tell me:
1. Did you upload all files to `eventmanager` folder? ✓
2. Does `eventmanager/public/index.php` exist? 
3. Does `eventmanager/.env` exist?
4. Can you access: `https://u230752.gluwebsite.nl/eventmanager/public/` (with /public/ in URL)?
