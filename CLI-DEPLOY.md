# Deploy to Render via CLI - Complete Guide

## Step 1: Install Render CLI

### For Windows (PowerShell):

```powershell
# Install via npm (easiest on Windows)
npm install -g @render/cli

# Verify installation
render --version
```

### Alternative - Download Binary:
Download from: https://github.com/render-oss/render-cli/releases

---

## Step 2: Login to Render

```powershell
render login
```

This will:
1. Open your browser
2. Ask you to authorize the CLI
3. Save your credentials

---

## Step 3: Deploy Your App

### Option A: Deploy with Blueprint (render.yaml)

```powershell
# Navigate to your project
cd C:\Users\Sahan\Documents\school\9.1\event-manager

# Deploy using render.yaml (creates everything automatically)
render blueprint launch
```

This will:
- ✅ Create PostgreSQL database
- ✅ Create web service
- ✅ Connect database to web service
- ✅ Set all environment variables
- ✅ Deploy your app

### Option B: Manual CLI Deployment

```powershell
# Create database
render postgres create eventmanager-db --region frankfurt --plan free

# Get database credentials
render postgres list

# Create web service
render service create web \
  --name event-manager \
  --runtime docker \
  --repo https://github.com/zilla416/Eventmanager \
  --branch main \
  --region frankfurt \
  --plan free

# Add environment variables
render env set APP_KEY=base64:N8UOnEgZCsW8xJ0SFUXxJbCjlnxgYAtECaWEXeA5W7w= --service event-manager
render env set APP_ENV=production --service event-manager
render env set APP_DEBUG=false --service event-manager
render env set DB_CONNECTION=pgsql --service event-manager
# ... add more env vars
```

---

## Step 4: Monitor Deployment

```powershell
# View logs
render logs --service event-manager

# Check service status
render service list

# View database info
render postgres list
```

---

## Complete PowerShell Script

Save this as `deploy-render.ps1`:

```powershell
# Deploy Laravel Event Manager to Render

Write-Host "🚀 Deploying to Render..." -ForegroundColor Green

# Check if render CLI is installed
if (!(Get-Command render -ErrorAction SilentlyContinue)) {
    Write-Host "📦 Installing Render CLI..." -ForegroundColor Yellow
    npm install -g @render/cli
}

# Login to Render
Write-Host "🔐 Logging in to Render..." -ForegroundColor Cyan
render login

# Deploy using blueprint
Write-Host "🏗️ Deploying with blueprint..." -ForegroundColor Cyan
render blueprint launch

Write-Host "✅ Deployment started! Check dashboard for progress." -ForegroundColor Green
Write-Host "📊 Monitor logs with: render logs --service event-manager" -ForegroundColor Yellow
```

Run it:
```powershell
.\deploy-render.ps1
```

---

## Quick Commands Reference

```powershell
# Login
render login

# Deploy with blueprint (EASIEST)
render blueprint launch

# List services
render service list

# View logs
render logs --service event-manager

# Follow logs in real-time
render logs --service event-manager --tail

# Restart service
render service restart event-manager

# View environment variables
render env list --service event-manager

# Add environment variable
render env set KEY=value --service event-manager

# List databases
render postgres list

# Get database connection info
render postgres info eventmanager-db

# Run database migrations (after deployment)
render shell event-manager
# Then in the shell:
php artisan migrate --force
```

---

## Troubleshooting

### "render: command not found"

Install via npm:
```powershell
npm install -g @render/cli
```

### Login fails?

Try:
```powershell
render logout
render login
```

### Deployment stuck?

Check logs:
```powershell
render logs --service event-manager --tail
```

### Need to update code?

Just push to GitHub:
```powershell
git add .
git commit -m "Update"
git push
```

Render auto-deploys from GitHub!

---

## After Deployment

1. **Get your URL:**
```powershell
render service list
# Look for: https://event-manager.onrender.com
```

2. **Run migrations:**
```powershell
render shell event-manager
php artisan migrate --force
exit
```

3. **Create admin user via shell:**
```powershell
render shell event-manager
php artisan tinker
# Then in tinker:
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@eventmanager.com',
    'password' => bcrypt('password'),
    'is_admin' => 2
]);
exit
exit
```

4. **Visit your app:**
```
https://event-manager.onrender.com
```

---

## One-Command Deploy (After CLI Setup)

```powershell
render blueprint launch
```

That's it! Everything else is automatic! 🎉

---

## Useful Links

- Render CLI Docs: https://render.com/docs/cli
- Dashboard: https://dashboard.render.com
- CLI GitHub: https://github.com/render-oss/render-cli
