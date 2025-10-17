# Image Upload Quick Reference

## ✅ SOLUTION IMPLEMENTED

### Upload Method: Direct Public Directory
- **Location:** `public/uploads/events/`
- **No symlinks needed**
- **Works on all hosting environments**

## File Upload Configuration

### Max File Size: 10MB
### Accepted Formats: JPEG, JPG, PNG, GIF, WebP
### Filename Format: `[timestamp]_[uniqueid].[extension]`
### Example: `1729106789_64f2a3b1c5d6e.jpg`

## Image Paths

### Stored in Database:
```
/uploads/events/1729106789_64f2a3b1c5d6e.jpg
```

### Accessed via Browser:
```
http://localhost/uploads/events/1729106789_64f2a3b1c5d6e.jpg
https://u230752.gluwebsite.nl/eventmanager/uploads/events/1729106789_64f2a3b1c5d6e.jpg
```

## Directory Structure
```
public/
└── uploads/
    └── events/               ← Images go here (777 permissions)
        ├── .gitignore        ← Ignores uploaded files in git
        ├── 1729106234_abc.jpg
        └── 1729106789_def.png
```

## Testing Upload

### Admin Dashboard:
1. Navigate to: `http://localhost/admin/cms`
2. Click "Add Event"
3. Fill form and select image
4. Submit
5. ✅ Image should display immediately

### Organizer Dashboard:
1. Navigate to: `http://localhost/organizer/cms`
2. Click "Create Event"
3. Fill form and select image
4. Submit
5. ✅ Image should display immediately

## Troubleshooting Commands

### Check directory exists:
```bash
docker-compose exec laravel.test ls -la public/uploads/events
```

### Check permissions:
```bash
docker-compose exec laravel.test stat -c "%a %n" public/uploads
# Should show: 777 public/uploads
```

### Create directory if missing:
```bash
docker-compose exec laravel.test mkdir -p public/uploads/events
docker-compose exec laravel.test chmod -R 777 public/uploads
```

### Check recent uploads:
```bash
docker-compose exec laravel.test ls -lh public/uploads/events
```

## Controller Methods

### CmsController.php

#### Store (Create Event):
- Validates image file
- Generates unique filename
- Moves to `public/uploads/events/`
- Saves path to database: `/uploads/events/[filename]`

#### Update (Edit Event):
- Validates new image (if provided)
- Generates unique filename
- Moves to `public/uploads/events/`
- Updates database path
- **Deletes old image** (if not default)

## Default Image

If no image uploaded:
```
/resources/img/concert1.png
```

## Production Deployment

### Required Steps:
1. Create directory:
   ```bash
   mkdir -p public/uploads/events
   chmod -R 777 public/uploads
   ```

2. ✅ That's it! No other configuration needed.

### NOT Required:
- ❌ `php artisan storage:link` (old method, not used)
- ❌ Symlink configuration
- ❌ Special .htaccess rules

## Forms with Upload Support

### ✅ Admin CMS Form:
- File: `resources/views/cms.blade.php`
- Has: `enctype="multipart/form-data"`
- Route: `POST /admin/cms`

### ✅ Organizer Event Form:
- File: `resources/views/organizer-event-form.blade.php`
- Has: `enctype="multipart/form-data"`
- Route: `POST /organizer/events` (create)
- Route: `PUT /organizer/events/{id}` (update)

## Success Indicators

### ✅ Upload Working:
- File appears in `public/uploads/events/`
- Database `events.image` = `/uploads/events/[filename]`
- Image displays on event card
- No 404 errors in browser console

### ❌ Upload NOT Working:
- Check directory permissions (must be 777)
- Check file size (must be < 10MB)
- Check file format (must be jpeg/jpg/png/gif/webp)
- Check form has `enctype="multipart/form-data"`
- Check validation errors in Laravel log

## Quick Diagnostic

```bash
# 1. Check directory
docker-compose exec laravel.test ls -la public/uploads/events

# 2. Check permissions
docker-compose exec laravel.test stat -c "%a" public/uploads
# Must return: 777

# 3. Check Laravel logs
docker-compose exec laravel.test tail -f storage/logs/laravel.log

# 4. Test file creation
docker-compose exec laravel.test touch public/uploads/events/test.txt
docker-compose exec laravel.test ls -la public/uploads/events/test.txt
docker-compose exec laravel.test rm public/uploads/events/test.txt
```

## Database Check

```sql
-- Check recent events and their images
SELECT event_id, title, image, created_at 
FROM events 
ORDER BY event_id DESC 
LIMIT 10;

-- Count events with uploaded images vs default
SELECT 
  CASE 
    WHEN image LIKE '/uploads/events/%' THEN 'Uploaded'
    ELSE 'Default'
  END AS image_type,
  COUNT(*) as count
FROM events
GROUP BY image_type;
```

## Summary

| Feature | Status |
|---------|--------|
| Upload to public directory | ✅ Implemented |
| No symlinks needed | ✅ Works |
| Auto-delete old images | ✅ Implemented |
| Unique filenames | ✅ Implemented |
| 10MB max size | ✅ Configured |
| Multiple formats | ✅ JPEG/PNG/GIF/WebP |
| Admin dashboard | ✅ Working |
| Organizer dashboard | ✅ Working |
| Production ready | ✅ Yes |

**Status:** 🟢 Fully Operational
