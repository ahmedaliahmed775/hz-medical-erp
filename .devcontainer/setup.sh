#!/usr/bin/env bash
set -e

echo "==> Installing PHP extensions (if not already present)..."
sudo apt-get update -qq
sudo apt-get install -y -qq \
    php8.2-sqlite3 php8.2-gd php8.2-intl \
    php8.2-zip php8.2-xml php8.2-mbstring 2>/dev/null || true

echo "==> Installing Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "==> Installing Node.js dependencies..."
npm install

echo "==> Copying .env file..."
cp .env.example .env

echo "==> Setting up database (SQLite)..."
mkdir -p database
touch database/database.sqlite

echo "==> Generating application key..."
php artisan key:generate --ansi

echo "==> Running ERP installation (migrations, seeders, admin user)..."
php artisan erp:install \
    --admin-name="Admin" \
    --admin-email="admin@example.com" \
    --admin-password="Demo@ERP2024!"

echo "==> Building frontend assets..."
npm run build

echo ""
echo "========================================================"
echo "  ✅  HZ Medical ERP is ready!"
echo "  🌐  The app will start automatically on port 8000."
echo "  📧  Login: admin@example.com"
echo "  🔑  Password: Demo@ERP2024!"
echo ""
echo "  ⚠️  DEMO ENVIRONMENT ONLY — do not use these"
echo "      credentials in any production deployment."
echo "========================================================"
