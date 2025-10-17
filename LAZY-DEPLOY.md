# LAZY DEPLOYMENT GUIDE - Copy Paste Everything! 😎

## What You Need:
1. FileZilla connected to your server
2. Navigate to `public_html/eventmanager/`
3. Copy and paste the files below

---

## FILES TO CREATE/UPLOAD

### 📄 FILE 1: `.htaccess` (in eventmanager root)

**Location:** `public_html/eventmanager/.htaccess`

**Copy this:**
```apache
# Force PHP 8.2
AddHandler application/x-httpd-ea-php82 .php

# Redirect to public folder
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

---

### 📄 FILE 2: `.htaccess` (in public folder)

**Location:** `public_html/eventmanager/public/.htaccess`

**Copy this:**
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Handle X-XSRF-Token Header
    RewriteCond %{HTTP:x-xsrf-token} .
    RewriteRule .* - [E=HTTP_X_XSRF_TOKEN:%{HTTP:X-XSRF-Token}]

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

### 📄 FILE 3: `.env`

**Location:** `public_html/eventmanager/.env`

**Copy this:**
```env
APP_NAME="Event Manager"
APP_ENV=production
APP_KEY=base64:N8UOnEgZCsW8xJ0SFUXxJbCjlnxgYAtECaWEXeA5W7w=
APP_DEBUG=false
APP_URL=https://u230752.gluwebsite.nl/eventmanager

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u230752_live
DB_USERNAME=u230752_live
DB_PASSWORD=forgetful

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/eventmanager
SESSION_DOMAIN=u230752.gluwebsite.nl

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database

MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=587
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="noreply@u230752.gluwebsite.nl"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"
```

---

## ⚡ ULTRA LAZY METHOD - Just Drag & Drop

Instead of creating files manually:

### Step 1: Upload Your Entire Project
1. In FileZilla, drag **YOUR LOCAL PROJECT FOLDER** to `public_html/`
2. Rename it to `eventmanager` if needed
3. Wait 15-30 minutes for upload

### Step 2: Just Create `.env` File
1. Right-click in `public_html/eventmanager/`
2. Create file → name it `.env`
3. Copy and paste FILE 3 content above

### Step 3: Import Database
1. Go to phpMyAdmin
2. Select `u230752_live` database
3. Click Import
4. Upload `database-schema.sql` from your project folder
5. Click Go

### Step 4: Set Permissions (Optional but Recommended)
Right-click these folders → File Permissions → 755:
- `storage/` (and all inside)
- `bootstrap/cache/`
- `public/uploads/events/`

### Step 5: Test
Visit: https://u230752.gluwebsite.nl/eventmanager/

---

## 🎯 SUMMARY - What Gets Uploaded:

```
public_html/eventmanager/
├── .htaccess              ← Copy FILE 1 content
├── .env                   ← Copy FILE 3 content
├── app/                   ← Upload from local
├── bootstrap/             ← Upload from local
├── config/                ← Upload from local
├── database/              ← Upload from local
├── public/                ← Upload from local
│   └── .htaccess          ← Copy FILE 2 content (or already exists)
├── resources/             ← Upload from local
├── routes/                ← Upload from local
├── storage/               ← Upload from local
├── vendor/                ← Upload from local (this takes longest!)
└── artisan                ← Upload from local
```

---

## 🚀 DONE!

After uploading everything:
- Visit: https://u230752.gluwebsite.nl/eventmanager/
- Login: admin@eventmanager.com / password
- Change password immediately!

That's it! No commands, no SSH, just drag, drop, and copy/paste! 😎
