#!/usr/bin/env bash
set -euo pipefail

# Simple deployment helper for production updates.
# Usage: ./deploy.sh

APP_DIR="/var/www/vitamin"
cd "$APP_DIR"

echo "[1/7] Pulling latest code..."
git pull --ff-only

echo "[2/7] Installing composer dependencies..."
composer install --no-dev --prefer-dist --optimize-autoloader

echo "[3/7] Running migrations..."
php artisan migrate --force

echo "[4/7] Building frontend assets..."
if command -v npm >/dev/null 2>&1; then
  npm ci --omit=dev || npm install
  npm run build
else
  echo "npm not found, skipping asset build (ensure assets are pre-built)."
fi

echo "[5/7] Optimizing caches..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo "[6/7] Queue restart (if using workers)..."
php artisan queue:restart || true

echo "[7/7] Permissions sanity..."
chown -R deploy:www-data storage bootstrap/cache || true
find storage -type d -exec chmod 775 {} \; || true
find storage -type f -exec chmod 664 {} \; || true

echo "Deployment completed successfully."