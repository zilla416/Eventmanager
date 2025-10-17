# Fix PHP Version Error

## Error
```
Composer detected issues in your platform: 
Your Composer dependencies require a PHP version ">= 8.2.0".
```

## Problem
Your server is running PHP 7.x or 8.0/8.1, but Laravel 12 requires PHP 8.2+

---

## Solution 1: Change PHP Version via cPanel (RECOMMENDED)

Most hosting providers let you change PHP version in cPanel:

### Steps:

1. **Login to cPanel** (https://u230752.gluwebsite.nl:2083 or via your hosting dashboard)

2. **Find "Select PHP Version" or "MultiPHP Manager"**
   - Look for: "Select PHP Version", "PHP Selector", or "MultiPHP Manager"
   - Usually in "Software" section

3. **Select PHP 8.2 or 8.3**
   - Click on your domain (u230752.gluwebsite.nl)
   - Select PHP version: **8.2** or **8.3** (if available)
   - Click "Apply"

4. **Verify PHP Extensions are Enabled:**
   Required extensions:
   - ✅ BCMath
   - ✅ Ctype
   - ✅ cURL
   - ✅ DOM
   - ✅ Fileinfo
   - ✅ JSON
   - ✅ Mbstring
   - ✅ OpenSSL
   - ✅ PCRE
   - ✅ PDO
   - ✅ PDO_MySQL
   - ✅ Tokenizer
   - ✅ XML

5. **Save and test:** https://u230752.gluwebsite.nl/eventmanager/

---

## Solution 2: Add .htaccess PHP Version Override

If cPanel doesn't work, try adding this to your `.htaccess`:

**In `eventmanager/.htaccess`** (add at the TOP):

```apache
# Force PHP 8.2 (adjust path based on your hosting)
AddHandler application/x-httpd-php82 .php

# OR try these alternatives:
# AddHandler application/x-httpd-ea-php82 .php
# AddHandler application/x-httpd-php8.2 .php
```

**Common hosting PHP handlers:**
- cPanel/WHM: `application/x-httpd-ea-php82`
- DirectAdmin: `application/x-httpd-php82`
- Plesk: `application/x-httpd-php8.2`

---

## Solution 3: Create/Edit .user.ini

Create a file called `.user.ini` in `eventmanager/` folder:

```ini
; Force PHP 8.2
php_version = 8.2
```

---

## Solution 4: Check Current PHP Version

Create a file called `phpinfo.php` in `eventmanager/public/`:

```php
<?php
phpinfo();
?>
```

Visit: `https://u230752.gluwebsite.nl/eventmanager/public/phpinfo.php`

Look for:
- **PHP Version** at the top (should be 8.2.x or higher)
- If it shows 7.4 or 8.0/8.1, you need to upgrade

**Delete this file after checking** (security risk to leave it)

---

## Solution 5: Contact Hosting Support

If none of the above work:

**Email/Contact your hosting provider:**
```
Subject: Please enable PHP 8.2 for u230752.gluwebsite.nl

Hello,

I need PHP version 8.2 or higher enabled for my domain u230752.gluwebsite.nl, 
specifically for the /eventmanager directory.

Current error: "Your Composer dependencies require a PHP version >= 8.2.0"

Please enable PHP 8.2 (or 8.3) and the following extensions:
- PDO, PDO_MySQL, mbstring, openssl, tokenizer, xml, ctype, json, bcmath, curl, fileinfo

Thank you!
```

---

## Alternative: Downgrade Laravel (NOT RECOMMENDED)

If you absolutely cannot get PHP 8.2, you could downgrade to Laravel 11 (requires PHP 8.2) or Laravel 10 (requires PHP 8.1).

**But this is complicated and requires rebuilding the project.**

---

## Check PHP Version via SSH (if you have access)

```bash
php -v
```

Should show:
```
PHP 8.2.x or PHP 8.3.x
```

If it shows 7.4 or 8.0/8.1, ask hosting to upgrade.

---

## Most Common Fix (cPanel)

1. Go to cPanel
2. Search for "PHP" in the search bar
3. Click "Select PHP Version" or "MultiPHP Manager"
4. Select your domain
5. Choose PHP 8.2 or 8.3
6. Click Apply/Save
7. Refresh your site

---

## After Fixing PHP Version

Once PHP 8.2+ is active:

1. **Clear any error pages** (may be cached)
2. **Visit:** https://u230752.gluwebsite.nl/eventmanager/
3. **Should see:** Your Laravel application!

If you still see errors, check:
- .env file exists
- Database credentials are correct
- File permissions are correct (755 on folders, 644 on files)

---

## Need Help?

Tell me:
1. Do you have access to cPanel? (Yes/No)
2. What hosting provider are you using? (helps me give specific instructions)
3. Can you check current PHP version with phpinfo.php?
