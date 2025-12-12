#!/bin/bash

# CHMS Deployment Script for www.chms.com
# This script automates the deployment process

set -e  # Exit on any error

echo "=========================================="
echo "CHMS Deployment Script"
echo "Domain: www.chms.com"
echo "=========================================="
echo ""

# Check if running as root or with sudo
if [ "$EUID" -ne 0 ]; then 
    echo "Please run this script with sudo"
    exit 1
fi

# Define variables
APP_DIR="/var/www/html/fyp_app"
WEB_USER="www-data"

echo "Step 1: Installing dependencies..."
cd "$APP_DIR"
sudo -u $WEB_USER composer install --optimize-autoloader --no-dev
sudo -u $WEB_USER npm install
sudo -u $WEB_USER npm run build

echo ""
echo "Step 2: Setting up environment..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo ".env file created. Please configure it with your database credentials."
    echo "After configuring .env, run this script again."
    exit 0
fi

echo ""
echo "Step 3: Generating application key..."
php artisan key:generate --force

echo ""
echo "Step 4: Creating storage link..."
php artisan storage:link

echo ""
echo "Step 5: Setting permissions..."
chown -R $WEB_USER:$WEB_USER "$APP_DIR"
chmod -R 755 "$APP_DIR"
chmod -R 775 "$APP_DIR/storage"
chmod -R 775 "$APP_DIR/bootstrap/cache"

echo ""
echo "Step 6: Running database migrations..."
read -p "Do you want to run database migrations? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan migrate --force
fi

echo ""
echo "Step 7: Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "=========================================="
echo "Deployment completed successfully!"
echo "=========================================="
echo ""
echo "Next steps:"
echo "1. Configure your web server (Apache or Nginx)"
echo "   - Apache: Copy apache-chms.conf to /etc/apache2/sites-available/"
echo "   - Nginx: Copy nginx-chms.conf to /etc/nginx/sites-available/"
echo "2. Set up SSL certificate using certbot"
echo "3. Configure DNS to point www.chms.com to this server"
echo "4. Test the application at https://www.chms.com"
echo ""
echo "For detailed instructions, see DEPLOYMENT.md"
