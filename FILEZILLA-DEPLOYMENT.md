# Deploy to u230752.gluwebsite.nl via FileZilla

## Prerequisites
- ✅ FileZilla installed
- ✅ FTP/SFTP credentials from your hosting provider
- ✅ Access to cPanel/phpMyAdmin for database setup

---

## Step 1: Prepare Files for Upload

### A. Build Production Assets (Already Done)
```powershell
# Already completed - your build folder is ready
npm run build
```

### B. Files to Upload via FileZilla

**Upload these folders:**
```
✅ app/
✅ bootstrap/
✅ config/
✅ database/migrations/
✅ database/factories/
✅ database/seeders/
✅ public/
✅ resources/
✅ routes/
✅ storage/
✅ vendor/
```

**Upload these files:**
```
✅ .htaccess (if exists in root)
✅ artisan
✅ composer.json
✅ composer.lock
```

**Create .env file (don't upload .env.production directly):**
- We'll create this on the server

**DO NOT upload:**
```
❌ .git/
❌ .env (local)
❌ node_modules/
❌ tests/
❌ docker-compose.yml
❌ .dockerignore
❌ phpunit.xml
❌ vite.config.js
❌ package.json
❌ package-lock.json
```

---

## Step 2: Connect with FileZilla

### FTP Connection Settings:
1. Open FileZilla
2. File → Site Manager → New Site
3. Enter connection details:

```
Host: u230752.gluwebsite.nl (or ftp.gluwebsite.nl)
Port: 21 (FTP) or 22 (SFTP)
Protocol: FTP or SFTP
Encryption: Use explicit FTP over TLS if available
Logon Type: Normal
User: [Your FTP username - usually u230752]
Password: [Your FTP password]
```

4. Click "Connect"

---

## Step 3: Upload Files

### Directory Structure on Server:

**Option A: Subdirectory (Recommended for /eventmanager)**
```
public_html/
└── eventmanager/           ← Upload everything here
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── public/            ← This is your web root
    ├── resources/
    ├── routes/
    ├── storage/
    ├── vendor/
    └── artisan
```

**Option B: Main Domain**
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/            ← Contents go to public_html root
├── resources/
├── routes/
├── storage/
├── vendor/
└── artisan
```

### Upload Process:

#### For Subdirectory Setup (/eventmanager):

1. **Create eventmanager folder:**
   - In FileZilla, navigate to `public_html/`
   - Right-click → Create directory → Name it `eventmanager`
   
2. **Upload application files:**
   - Drag these folders from local to `public_html/eventmanager/`:
     * app/
     * bootstrap/
     * config/
     * database/
     * public/
     * resources/
     * routes/
     * storage/
     * vendor/
   - Upload files: artisan, composer.json, composer.lock

3. **This will take 10-30 minutes** depending on your connection speed

---

## Step 4: Configure Web Root

You need to point the web server to the `public` folder.

### Method A: Move public contents (Easier)

1. In FileZilla, navigate to `public_html/eventmanager/public/`
2. **Copy** these files/folders to `public_html/eventmanager/`:
   - index.php
   - .htaccess
   - build/ (folder)
   - uploads/ (folder)
   - resources/ (folder)
   - robots.txt

3. **Edit index.php** (right-click → View/Edit in FileZilla):

**Original:**
```php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```

**Change to (if files moved):**
```php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
```

### Method B: .htaccess redirect (Alternative)

Create `.htaccess` in `public_html/eventmanager/`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

---

## Step 5: Set File Permissions

Via cPanel File Manager or FileZilla (right-click → File permissions):

```
chmod 755 bootstrap/cache/
chmod 755 storage/
chmod 755 storage/app/
chmod 755 storage/framework/
chmod 755 storage/logs/
chmod 755 public/uploads/
chmod 755 public/uploads/events/
```

**Important directories must be writable:**
- ✅ storage/ and all subdirectories
- ✅ bootstrap/cache/
- ✅ public/uploads/events/

---

## Step 6: Create Database

### Via cPanel → MySQL Databases:

**IMPORTANT:** Use your existing database credentials:

```
Database Host: localhost
Database Name: u230752_live
Database User: u230752_live
Database Password: [your existing database password]
```

**You likely already have this database set up!** 
- Check cPanel → MySQL Databases to verify
- If it doesn't exist, create it with these exact names

**If creating new database:**

1. **Create Database:**
   - Database Name: `u230752_live` (or your existing one)
   - Click "Create Database"

2. **Create Database User:**
   - Username: `u230752_live` (or your existing one)
   - Password: Use existing password or generate new one
   - Click "Create User"

3. **Add User to Database:**
   - User: `u230752_live`
   - Database: `u230752_live`
   - Privileges: Select "ALL PRIVILEGES"
   - Click "Add"

---

## Step 7: Import Database Schema

### Via phpMyAdmin:

1. Go to cPanel → phpMyAdmin
2. Select database: `u230752_live`
3. Click "Import" tab
4. Click "Choose File"
5. Upload the file: `database-schema.sql` (included in your project)

**Save as `database.sql` and upload:**

```sql
-- Users table
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Events table
CREATE TABLE `events` (
  `event_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organizer_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `location` varchar(255) NOT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT '0.00',
  `max_spots` int NOT NULL,
  `available_spots` int DEFAULT NULL,
  `tickets_sold` int NOT NULL DEFAULT '0',
  `revenue` decimal(10,2) DEFAULT '0.00',
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `events_organizer_id_foreign` (`organizer_id`),
  CONSTRAINT `events_organizer_id_foreign` FOREIGN KEY (`organizer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Orders table
CREATE TABLE `orders` (
  `order_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `event_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_event_id_foreign` (`event_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Cache table
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sessions table
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Jobs table
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Failed jobs table
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert admin user (password: password)
INSERT INTO users (name, email, password, is_admin, created_at, updated_at)
VALUES (
    'Admin User',
    'admin@eventmanager.com',
    '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5dgpyc6N8Gqnq',
    2,
    NOW(),
    NOW()
);
```

6. Click "Go" to import

---

## Step 8: Create .env File

### Via cPanel File Manager or FileZilla:

1. Navigate to `public_html/eventmanager/`
2. Create new file: `.env`
3. Paste this content (update database credentials):

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
DB_PASSWORD=[YOUR_DATABASE_PASSWORD_HERE]

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
```

4. **Save the file**

---

## Step 9: Create Required Directories

Via cPanel File Manager or FileZilla, ensure these exist:

```
public_html/eventmanager/
├── storage/
│   ├── app/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/
└── public/
    └── uploads/
        └── events/
```

**Set permissions to 755 or 777 for:**
- storage/app/
- storage/framework/cache/
- storage/framework/sessions/
- storage/framework/views/
- storage/logs/
- public/uploads/events/

---

## Step 10: Test Your Website

1. **Visit:** https://u230752.gluwebsite.nl/eventmanager

2. **Should see:** Your homepage with events

3. **Test login:** https://u230752.gluwebsite.nl/eventmanager/login
   - Email: `admin@eventmanager.com`
   - Password: `password`

4. **Test admin panel:** https://u230752.gluwebsite.nl/eventmanager/admin/cms

---

## Troubleshooting

### Issue: 500 Internal Server Error

**Solution 1 - Check .htaccess in public folder:**
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

    # Redirect Trailing Slashes
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

**Solution 2 - Check permissions:**
```
chmod 755 storage -R
chmod 755 bootstrap/cache -R
```

**Solution 3 - Check .env file exists and has correct database credentials**

### Issue: Page not found (404)

**Check web root is pointing to public folder**

### Issue: CSS/JS not loading

**Check APP_URL in .env:**
```env
APP_URL=https://u230752.gluwebsite.nl/eventmanager
```

**Check build folder exists:**
```
public/build/
├── manifest.json
└── assets/
    ├── app-*.css
    └── app-*.js
```

### Issue: Database connection failed

**Check credentials in .env match cPanel MySQL settings**

### Issue: Can't login / sessions not working

**Check SESSION_PATH in .env:**
```env
SESSION_PATH=/eventmanager
SESSION_DOMAIN=u230752.gluwebsite.nl
```

**Check sessions table exists in database**

---

## FileZilla Tips

### Speed up upload:
- Edit → Settings → Transfers
- Maximum simultaneous transfers: 3-5
- File Types: Auto

### Resume interrupted uploads:
- FileZilla automatically resumes if connection drops

### Check file was uploaded:
- Right-click file → View/Edit to verify content

### Upload only changed files:
- Use "Overwrite if source newer" option

---

## Post-Deployment Checklist

- [ ] All files uploaded successfully
- [ ] .env file created with correct database credentials
- [ ] Database created and schema imported
- [ ] Admin user exists in database
- [ ] File permissions set (755 on storage, uploads)
- [ ] Website loads: https://u230752.gluwebsite.nl/eventmanager
- [ ] Can login with admin credentials
- [ ] Can view admin dashboard
- [ ] Images load correctly
- [ ] Can create/edit events
- [ ] Can register new users
- [ ] Sessions persist (stay logged in)

---

## Quick Command Reference

If you have SSH access (Terminal commands):

```bash
# Check PHP version
php -v

# Set permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 777 public/uploads/

# Clear cache (if you can run artisan)
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## Need Help?

Check these files for errors:
- `storage/logs/laravel.log` - Application errors
- cPanel → Error Log - Server errors

**Default Admin Login:**
- Email: admin@eventmanager.com
- Password: password
- **Change this immediately after first login!**

---

## Deployment Complete! 🎉

Your Event Manager application should now be live at:
**https://u230752.gluwebsite.nl/eventmanager**

All features working:
- ✅ Event browsing and search
- ✅ User registration and login
- ✅ Ticket purchasing
- ✅ Organizer dashboards
- ✅ Admin panel
- ✅ File uploads
- ✅ Profile management
