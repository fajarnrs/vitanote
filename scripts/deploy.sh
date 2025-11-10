#!/usr/bin/env bash
set -euo pipefail

# Deploy script for Ubuntu 24.04 (run on the server inside project directory)
# Usage: bash scripts/deploy.sh

PHP_BIN=${PHP_BIN:-php}
COMPOSER_BIN=${COMPOSER_BIN:-composer}
NODE_BIN=${NODE_BIN:-node}
NPM_BIN=${NPM_BIN:-npm}

info() { echo -e "\033[1;32m[OK]\033[0m $*"; }
warn() { echo -e "\033[1;33m[WARN]\033[0m $*"; }
err()  { echo -e "\033[1;31m[ERR]\033[0m $*"; }

if ! command -v "$PHP_BIN" >/dev/null 2>&1; then err "PHP not found"; exit 1; fi
if ! command -v "$COMPOSER_BIN" >/dev/null 2>&1; then err "Composer not found"; exit 1; fi

info "Installing PHP dependencies (no-dev, optimized)"
$COMPOSER_BIN install --no-dev --prefer-dist --optimize-autoloader --no-interaction

if [ ! -f .env ]; then
  warn ".env not found, copying from dist/.env.production.example"
  cp dist/.env.production.example .env
fi

if ! grep -q "^APP_KEY=\S\+" .env; then
  info "Generating APP_KEY"
  $PHP_BIN artisan key:generate --force
fi

info "Run migrations"
$PHP_BIN artisan migrate --force

info "Ensure storage symlink"
$PHP_BIN artisan storage:link || true

# Optional: build assets if Node is available and resources exist
if [ -d resources ] && command -v "$NPM_BIN" >/dev/null 2>&1; then
  info "Building frontend assets"
  $NPM_BIN ci || $NPM_BIN install
  $NPM_BIN run build
else
  warn "Skipping frontend build (npm not available or no resources dir). If you packaged public/build, this is fine."
fi

info "Optimize caches"
$PHP_BIN artisan optimize:clear
$PHP_BIN artisan optimize

info "Set permissions"
sudo chown -R www-data:www-data storage bootstrap/cache public/storage || true
chmod -R ug+rwX storage bootstrap/cache || true

info "Deployment completed"
