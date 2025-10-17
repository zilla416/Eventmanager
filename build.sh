#!/usr/bin/env bash
# Render.com build script for Laravel

# Exit on error
set -o errexit

echo "🔧 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

echo "📦 Installing NPM dependencies..."
npm ci

echo "🏗️ Building frontend assets..."
npm run build

echo "🔑 Generating app key if needed..."
php artisan key:generate --force --no-interaction || true

echo "📊 Running database migrations..."
php artisan migrate --force --no-interaction

echo "🗂️ Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "📁 Setting permissions..."
chmod -R 775 storage bootstrap/cache

echo "✅ Build complete!"
