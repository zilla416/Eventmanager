# Event Manager - Deployment Guide

## Target Environment
- **URL**: https://u230752.gluwebsite.nl/eventmanager
- **Type**: Subdirectory deployment on shared hosting

---

## Pre-Deployment Checklist

### ✅ Completed
- [x] Production assets built with Vite (`npm run build`)
- [x] All debug code removed (verified)
- [x] Production .env configuration created
- [x] All functionality tested locally

---

## Step-by-Step Deployment

### 1. Prepare Files for Upload

**Files to upload:**
```
event-manager/
├── app/                    (entire folder)
├── bootstrap/              (entire folder)
├── config/                 (entire folder)
├── database/               (migrations, factories, seeders)
├── public/                 (entire folder - this is your web root)
├── resources/              (entire folder)
├── routes/                 (entire folder)
├── storage/                (create writable on server)
│   ├── app/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/
├── vendor/                 (upload or run composer install on server)
├── .env.production         (rename to .env after upload)
├── artisan
├── composer.json
└── composer.lock
```

**Do NOT upload:**
- `.env` (local development file)
- `node_modules/`
- `tests/`
- `docker-compose.yml`
- `.git/` (if exists)

---

### 2. Server Configuration

#### A. Directory Structure on Server
Create this structure in your hosting:
```
public_html/
└── eventmanager/           (your application root)
    ├── public/            (symlink or move contents to webroot)
    ├── app/
    ├── bootstrap/
    └── ...
```

#### B. Configure Web Root
Your web server should point to: `public_html/eventmanager/public`

If you cannot change the web root, use this `.htaccess` in `/eventmanager`:

**Create `.htaccess` in eventmanager folder:**
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

**Update `public/.htaccess`:**
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

### 3. Database Setup

#### A. Create Database
Via cPanel or hosting control panel:
1. Create new MySQL database
2. Create database user
3. Grant ALL privileges to user on database
4. Note down: database name, username, password, host

#### B. Import Schema
Run these SQL commands (via phpMyAdmin or command line):

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
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT '0.00',
  `max_spots` int NOT NULL,
  `tickets_sold` int NOT NULL DEFAULT '0',
  `revenue` decimal(10,2) DEFAULT '0.00',
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

-- Jobs table (for queue)
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
```

---

### 4. Configure Environment

#### A. Upload and Configure .env
1. Upload `.env.production` to server
2. Rename it to `.env`
3. Update these values in `.env`:

```env
DB_HOST=localhost                    # Usually localhost on shared hosting
DB_DATABASE=your_actual_db_name      # From step 3A
DB_USERNAME=your_actual_db_user      # From step 3A
DB_PASSWORD=your_actual_db_password  # From step 3A
```

#### B. Set File Permissions (via SSH or FTP)
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

If you have SSH access:
```bash
cd /path/to/eventmanager
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

---

### 5. Run Laravel Setup Commands

If you have SSH access to the server, run these commands:

```bash
cd /path/to/eventmanager

# Install dependencies (if vendor folder not uploaded)
composer install --optimize-autoloader --no-dev

# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Generate optimized class loader
composer dump-autoload --optimize
```

**If you DON'T have SSH access:**
- Upload the entire `vendor/` folder from your local build
- Skip the optimization commands (they're optional but recommended)

---

### 6. Create Admin User

Via phpMyAdmin, insert an admin user:

```sql
INSERT INTO users (name, email, password, is_admin, created_at, updated_at)
VALUES (
    'Admin User',
    'admin@example.com',
    '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5dgpyc6N8Gqnq',  -- password: password
    2,  -- 2 = admin, 1 = organizer, 0 = customer
    NOW(),
    NOW()
);
```

**Important:** Change this password immediately after first login!

---

### 7. Verify Deployment

#### Test these URLs:
1. **Homepage**: https://u230752.gluwebsite.nl/eventmanager
2. **Login**: https://u230752.gluwebsite.nl/eventmanager/login
3. **Register**: https://u230752.gluwebsite.nl/eventmanager/register
4. **Admin Login**: Use credentials from step 6
5. **Admin CMS**: https://u230752.gluwebsite.nl/eventmanager/admin/cms

#### Check these features:
- [ ] User registration works
- [ ] User login works
- [ ] Event browsing (homepage)
- [ ] Event detail pages
- [ ] Ticket purchasing (checkout flow)
- [ ] Account page (My Tickets, Profile, Settings)
- [ ] Admin CMS (view all events)
- [ ] Organizer accounts can create/edit events
- [ ] Organizer CMS (filtered by organizer_id)

---

## User Roles

### Customer (is_admin = 0)
- Browse and search events
- Purchase tickets
- View purchased tickets in account
- Edit profile and change password

### Organizer (is_admin = 1)
- All customer features +
- Create and manage own events
- View organizer dashboard (`/organizer/cms`)
- Edit/delete only their own events
- See revenue and ticket sales for own events

### Admin (is_admin = 2)
- All organizer features +
- View ALL events in system
- Access admin dashboard (`/admin/cms`)
- Manage all events (edit/delete any)
- View total platform statistics

---

## Troubleshooting

### Issue: 500 Internal Server Error
**Solutions:**
1. Check file permissions: `storage/` and `bootstrap/cache/` need write access
2. Check `.env` file exists and has correct database credentials
3. Check error logs in `storage/logs/laravel.log`
4. Verify `.htaccess` file exists in `public/` folder

### Issue: Assets not loading (CSS/JS)
**Solutions:**
1. Verify `public/build/` folder exists with manifest.json
2. Check APP_URL in `.env` matches your actual URL
3. Run `php artisan config:clear` if you have SSH
4. Check browser console for 404 errors on asset paths

### Issue: "Page not found" on routes
**Solutions:**
1. Verify `.htaccess` is in `public/` folder
2. Check mod_rewrite is enabled on server
3. Verify web root points to `public/` folder
4. Clear route cache: `php artisan route:clear`

### Issue: Sessions not persisting (logged out immediately)
**Solutions:**
1. Verify `sessions` table exists in database
2. Check SESSION_PATH in `.env` is set to `/eventmanager`
3. Check SESSION_DOMAIN is set correctly
4. Verify `storage/framework/sessions/` folder exists and is writable

### Issue: Can't login or database errors
**Solutions:**
1. Verify database credentials in `.env` are correct
2. Check database tables are created (step 3B)
3. Verify database user has all privileges
4. Check `DB_HOST` (usually `localhost` on shared hosting)

---

## Maintenance

### Clearing Caches (via SSH)
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Viewing Logs
Check `storage/logs/laravel.log` for error messages

### Backup Database
```bash
# Via command line
mysqldump -u username -p database_name > backup.sql

# Via phpMyAdmin: Export > SQL format
```

### Update Application
1. Backup database and files
2. Upload new files (don't overwrite .env or storage/)
3. Run: `php artisan migrate` (if database changes)
4. Clear caches (see above)

---

## Security Checklist

- [ ] Changed default admin password
- [ ] `APP_DEBUG=false` in production .env
- [ ] `APP_ENV=production` in .env
- [ ] Strong `APP_KEY` (already generated)
- [ ] Database credentials are secure
- [ ] `storage/` and `bootstrap/cache/` not web-accessible
- [ ] `.env` file not web-accessible
- [ ] HTTPS enabled (verify SSL certificate)
- [ ] File upload validation enabled
- [ ] SQL injection protected (using Eloquent ORM)

---

## Support

For issues or questions during deployment:
1. Check `storage/logs/laravel.log` for specific errors
2. Verify all steps in this guide were completed
3. Review the Troubleshooting section above
4. Contact your hosting provider for server-specific issues

---

## Application Features Summary

✅ **Multi-tenant Organizer System**
- Each organizer manages only their events
- Admin can view all events across platform
- Automatic event ownership tracking

✅ **Complete User Management**
- Registration and authentication
- Profile editing with name and email updates
- Password change with current password verification
- Account deletion with confirmation

✅ **Smart Ticket Management**
- Event consolidation (same event stacks ticket counts)
- Past events display with "Attended" badge
- Real-time ticket availability
- Automated revenue tracking

✅ **Modern UI Design**
- Clean black theme with minimal accents
- Gradient icons for visual interest
- Responsive design for all devices
- Smooth animations and transitions

✅ **Production Ready**
- No debug code
- Optimized assets
- Cached configuration
- Error logging enabled
- Secure authentication
