# Deploy Laravel Event Manager to Render.com

## Why Render.com?
- ✅ Free tier available
- ✅ Supports PHP 8.2+
- ✅ PostgreSQL/MySQL database included
- ✅ Automatic deployments from GitHub
- ✅ HTTPS included
- ✅ Better than shared hosting for Laravel

---

## Prerequisites
1. GitHub account (you already have: zilla416/Eventmanager)
2. Render.com account (free signup)

---

## Step 1: Prepare Your GitHub Repository

### Push All Changes to GitHub:

```powershell
# In PowerShell, navigate to your project
cd C:\Users\Sahan\Documents\school\9.1\event-manager

# Add all files
git add .

# Commit
git commit -m "Prepare for Render deployment"

# Push to GitHub
git push origin main
```

---

## Step 2: Create Render Account

1. Go to: https://render.com
2. Click "Get Started"
3. Sign up with GitHub (easiest)
4. Authorize Render to access your repositories

---

## Step 3: Create Build Script

Create a new file in your project root:

**File:** `build.sh`

**Content:**
```bash
#!/usr/bin/env bash
# exit on error
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
npm install
npm run build

# Run database migrations
php artisan migrate --force

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set storage permissions
chmod -R 775 storage bootstrap/cache
```

Make it executable:
```powershell
git add build.sh
git commit -m "Add Render build script"
git push
```

---

## Step 4: Create Render Web Service

1. **Login to Render Dashboard:** https://dashboard.render.com

2. **Click "New +" → "Web Service"**

3. **Connect GitHub Repository:**
   - Select: `zilla416/Eventmanager`
   - Click "Connect"

4. **Configure Web Service:**

   **Name:** `event-manager` (or anything you want)
   
   **Region:** Choose closest to you
   
   **Branch:** `main`
   
   **Root Directory:** Leave blank
   
   **Runtime:** `Native` (select Native Environment)
   
   **Build Command:**
   ```bash
   ./build.sh
   ```
   
   **Start Command:**
   ```bash
   php -S 0.0.0.0:$PORT -t public
   ```
   
   **Instance Type:** `Free`

5. **Click "Advanced" to add Environment Variables**

---

## Step 5: Add Environment Variables

Click "Add Environment Variable" for each:

```
APP_NAME=Event Manager
APP_ENV=production
APP_KEY=base64:N8UOnEgZCsW8xJ0SFUXxJbCjlnxgYAtECaWEXeA5W7w=
APP_DEBUG=false
APP_URL=https://event-manager.onrender.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=<will set after creating database>
DB_PORT=3306
DB_DATABASE=eventmanager
DB_USERNAME=<will set after creating database>
DB_PASSWORD=<will set after creating database>

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

BCRYPT_ROUNDS=12
```

**Note:** We'll update database credentials after creating the database

---

## Step 6: Create MySQL Database on Render

1. **In Render Dashboard → "New +" → "MySQL"**

2. **Configure:**
   - **Name:** `eventmanager-db`
   - **Database:** `eventmanager`
   - **User:** `eventmanager`
   - **Region:** Same as web service
   - **Instance Type:** `Free`

3. **Click "Create Database"**

4. **Copy Database Credentials** (shown after creation):
   - Internal Database URL
   - Hostname
   - Port
   - Database
   - Username
   - Password

---

## Step 7: Update Web Service Environment Variables

1. Go back to your Web Service
2. Click "Environment" tab
3. Update these variables with your database credentials:

```
DB_HOST=<your-db-hostname>.render.com
DB_PORT=3306
DB_DATABASE=eventmanager
DB_USERNAME=eventmanager
DB_PASSWORD=<your-db-password>
```

4. Click "Save Changes"

---

## Step 8: Update .gitignore

Make sure these files are NOT in git:

**Edit:** `.gitignore`

```
/node_modules
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.phpunit.result.cache
Homestead.json
Homestead.yaml
npm-debug.log
yarn-error.log
/.idea
/.vscode
/public/uploads/events/*
!public/uploads/events/.gitignore
```

---

## Step 9: Update Render-Specific Files

### Create `render.yaml` (optional but recommended)

**File:** `render.yaml`

```yaml
services:
  - type: web
    name: event-manager
    runtime: native
    buildCommand: ./build.sh
    startCommand: php -S 0.0.0.0:$PORT -t public
    envVars:
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: false
    
databases:
  - name: eventmanager-db
    databaseName: eventmanager
    user: eventmanager
```

Commit and push:
```powershell
git add .gitignore render.yaml
git commit -m "Add Render configuration"
git push
```

---

## Step 10: Deploy!

1. Render will automatically detect your push and start building
2. Watch the logs in Render Dashboard
3. Wait 5-10 minutes for first deployment
4. Your app will be live at: `https://event-manager.onrender.com`

---

## Step 11: Run Database Migrations

After first deployment, go to Render Dashboard:

1. Click your web service
2. Go to "Shell" tab
3. Run:
```bash
php artisan migrate --force
php artisan db:seed --class=DatabaseSeeder
```

Or import your SQL:
- Connect to MySQL database using credentials from Render
- Import `database-schema.sql`

---

## Troubleshooting

### Build fails?
- Check logs in Render Dashboard
- Make sure `build.sh` is executable
- Verify all dependencies in `composer.json`

### Database connection fails?
- Double-check DB credentials in Environment Variables
- Make sure you're using Internal Database URL (not external)

### Assets not loading?
- Verify `npm run build` completed successfully
- Check `APP_URL` matches your Render URL

### Permission errors?
- Render automatically handles permissions
- If issues persist, add to build.sh:
```bash
chmod -R 777 storage bootstrap/cache
```

---

## Benefits of Render vs Shared Hosting

| Feature | Render.com | Gluwebsite Shared |
|---------|------------|-------------------|
| PHP 8.2+ | ✅ Yes | ❌ No (8.1 max) |
| Auto Deploy | ✅ Yes (from Git) | ❌ Manual FTP |
| HTTPS | ✅ Free | ✅ Yes |
| Database | ✅ Included | ✅ Included |
| File Uploads | ✅ Works | ⚠️ Needs setup |
| Laravel Support | ✅ Excellent | ⚠️ Limited |
| Free Tier | ✅ Available | ❌ Paid only |

---

## Quick Deploy Summary

1. ✅ Push code to GitHub
2. ✅ Create Render account
3. ✅ Create Web Service (connect GitHub)
4. ✅ Create MySQL Database
5. ✅ Add environment variables
6. ✅ Deploy automatically
7. ✅ Run migrations
8. ✅ Done!

Your app will be live at: `https://[your-app-name].onrender.com`

---

## Cost

- **Free Tier Includes:**
  - Web Service: 750 hours/month (enough for one app)
  - MySQL Database: 90 days free, then $7/month
  - SSL Certificate: Free
  - Bandwidth: 100GB/month free

**After 90 days:** Either pay $7/month for database or migrate to free PostgreSQL

---

## Next Steps

Want me to help you:
1. Create the `build.sh` file?
2. Update your GitHub repository?
3. Walk through the Render setup?

Let me know and I'll guide you step-by-step! 🚀
