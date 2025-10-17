# Install Render CLI on Windows - Quick Guide

## Windows Installation (No Brew Needed)

### Method 1: Direct Download (EASIEST)

1. **Download the Windows executable:**
   https://github.com/render-com/cli/releases/latest

2. **Look for:** `render-windows-amd64.exe` or `render-windows-386.exe`

3. **Download it to a folder** (e.g., `C:\render\`)

4. **Rename to:** `render.exe`

5. **Add to PATH** (so you can run it from anywhere):
   - Right-click "This PC" → Properties
   - Advanced System Settings → Environment Variables
   - Under "System Variables", find "Path"
   - Click "Edit" → "New"
   - Add: `C:\render\` (or wherever you saved it)
   - Click OK

6. **Test it:**
   ```powershell
   render --version
   ```

---

## Alternative: Use PowerShell Script (Automated)

Run this in PowerShell (as Administrator):

```powershell
# Create directory
New-Item -ItemType Directory -Force -Path C:\render

# Download latest render CLI
$url = "https://github.com/render-com/cli/releases/latest/download/render-windows-amd64.exe"
$output = "C:\render\render.exe"
Invoke-WebRequest -Uri $url -OutFile $output

# Add to PATH permanently
$path = [Environment]::GetEnvironmentVariable("Path", "Machine")
if ($path -notlike "*C:\render*") {
    [Environment]::SetEnvironmentVariable("Path", "$path;C:\render", "Machine")
}

Write-Host "✅ Render CLI installed! Restart PowerShell and run: render --version"
```

---

## After Installation:

```powershell
# Close and reopen PowerShell, then:

# Login
render login

# Deploy
cd C:\Users\Sahan\Documents\school\9.1\event-manager
render blueprint launch
```

---

## Easier Alternative: Just Use Render Dashboard

Honestly, the **Render Dashboard** is easier than CLI for first deployment:

1. Go to: https://dashboard.render.com
2. Sign up with GitHub
3. Click "New +" → "Blueprint"
4. Select repository: `zilla416/Eventmanager`
5. Click "Apply"
6. Done! ✅

Everything in `render.yaml` will be created automatically.

---

**Recommendation:** Skip CLI, just use the dashboard at https://dashboard.render.com 🎯
