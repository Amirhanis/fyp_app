# Deployment Guide for CHMS (Centralized Homestay Management System)

This guide provides instructions for deploying the Centralized Homestay Management System to a production server with the domain **www.chms.com**.

## Prerequisites

Before deploying, ensure your server has:
- PHP 8.1 or higher
- Composer
- MySQL 5.7+ or MariaDB 10.3+
- Node.js 16+ and npm
- Apache 2.4+ or Nginx 1.18+
- Git

## Step 1: Server Preparation

### For Ubuntu/Debian:
```bash
sudo apt update
sudo apt install -y php8.1 php8.1-cli php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-curl php8.1-zip php8.1-gd php8.1-bcmath
sudo apt install -y mysql-server apache2 composer nodejs npm git
```

## Step 2: Clone the Repository

```bash
cd /var/www/html
sudo git clone https://github.com/Amirhanis/fyp_app.git
sudo chown -R www-data:www-data fyp_app
cd fyp_app
```

## Step 3: Install Dependencies

```bash
# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node.js dependencies
npm install

# Build assets
npm run build
```

## Step 4: Configure Environment

```bash
# Copy the example environment file
cp .env.example .env

# Edit the .env file with your configuration
nano .env
```

Update the following values in `.env`:
```
APP_NAME="Centralized Homestay Management System"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://www.chms.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fyp_app
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

```bash
# Generate application key
php artisan key:generate

# Generate storage link
php artisan storage:link
```

## Step 5: Database Setup

```bash
# Create database
mysql -u root -p
```

In MySQL:
```sql
CREATE DATABASE fyp_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'fyp_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON fyp_app.* TO 'fyp_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

```bash
# Run migrations
php artisan migrate --force

# (Optional) Seed database
php artisan db:seed --force
```

## Step 6: Set Permissions

```bash
sudo chown -R www-data:www-data /var/www/html/fyp_app
sudo chmod -R 755 /var/www/html/fyp_app
sudo chmod -R 775 /var/www/html/fyp_app/storage
sudo chmod -R 775 /var/www/html/fyp_app/bootstrap/cache
```

## Step 7: Configure Web Server

### Option A: Apache

1. Copy the Apache configuration:
```bash
sudo cp apache-chms.conf /etc/apache2/sites-available/chms.conf
```

2. Enable required Apache modules:
```bash
sudo a2enmod rewrite
sudo a2enmod ssl
```

3. Enable the site:
```bash
sudo a2ensite chms.conf
sudo a2dissite 000-default.conf
```

4. Test and reload Apache:
```bash
sudo apache2ctl configtest
sudo systemctl reload apache2
```

### Option B: Nginx

1. Copy the Nginx configuration:
```bash
sudo cp nginx-chms.conf /etc/nginx/sites-available/chms
```

2. Enable the site:
```bash
sudo ln -s /etc/nginx/sites-available/chms /etc/nginx/sites-enabled/
sudo rm /etc/nginx/sites-enabled/default
```

3. Test and reload Nginx:
```bash
sudo nginx -t
sudo systemctl reload nginx
```

## Step 8: Configure DNS

Point your domain to your server's IP address:
- A Record: `chms.com` → `your_server_ip`
- A Record: `www.chms.com` → `your_server_ip`

## Step 9: SSL Certificate (Recommended)

Install Let's Encrypt SSL certificate:

```bash
sudo apt install certbot
```

### For Apache:
```bash
sudo apt install python3-certbot-apache
sudo certbot --apache -d chms.com -d www.chms.com
```

### For Nginx:
```bash
sudo apt install python3-certbot-nginx
sudo certbot --nginx -d chms.com -d www.chms.com
```

The SSL configuration sections in `apache-chms.conf` and `nginx-chms.conf` can be uncommented and adjusted after obtaining SSL certificates.

## Step 10: Optimize for Production

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

## Step 11: Set Up Cron Jobs

Add Laravel scheduler to crontab:
```bash
sudo crontab -e -u www-data
```

Add this line:
```
* * * * * cd /var/www/html/fyp_app && php artisan schedule:run >> /dev/null 2>&1
```

## Step 12: Configure Firewall

```bash
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw allow 22/tcp
sudo ufw enable
```

## Maintenance

### Update Application
```bash
cd /var/www/html/fyp_app
sudo git pull origin main
composer install --optimize-autoloader --no-dev
npm install
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo systemctl reload apache2  # or nginx
```

### View Logs
```bash
# Application logs
tail -f /var/www/html/fyp_app/storage/logs/laravel.log

# Web server logs (Apache)
tail -f /var/log/apache2/chms_error.log

# Web server logs (Nginx)
tail -f /var/log/nginx/error.log
```

## Troubleshooting

### Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/html/fyp_app
sudo chmod -R 755 /var/www/html/fyp_app
sudo chmod -R 775 /var/www/html/fyp_app/storage
sudo chmod -R 775 /var/www/html/fyp_app/bootstrap/cache
```

### Clear All Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Database Connection Issues
- Verify database credentials in `.env`
- Check MySQL service: `sudo systemctl status mysql`
- Test connection: `mysql -u fyp_user -p fyp_app`

## Security Checklist

- [ ] Set `APP_DEBUG=false` in production
- [ ] Use strong database passwords
- [ ] Enable SSL/HTTPS
- [ ] Configure firewall
- [ ] Regular backups of database and files
- [ ] Keep PHP, Laravel, and dependencies updated
- [ ] Use environment variables for sensitive data
- [ ] Disable directory listing (already configured in web server configs)

## Support

For issues or questions, please contact the development team or refer to:
- Laravel Documentation: https://laravel.com/docs
- Project Repository: https://github.com/Amirhanis/fyp_app
