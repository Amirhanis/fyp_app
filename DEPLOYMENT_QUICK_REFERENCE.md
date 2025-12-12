# Quick Deployment Reference for www.chms.com

## Files Included

This repository includes the following deployment configuration files:

1. **DEPLOYMENT.md** - Comprehensive deployment guide with step-by-step instructions
2. **apache-chms.conf** - Apache virtual host configuration for www.chms.com
3. **nginx-chms.conf** - Nginx server block configuration for www.chms.com
4. **.env.production.example** - Production environment configuration template
5. **deploy.sh** - Automated deployment script

## Quick Start

### 1. Prerequisites
Ensure your server has PHP 8.1+, MySQL, Composer, Node.js, and Apache/Nginx installed.

### 2. Clone & Deploy
```bash
# Clone the repository
cd /var/www/html
sudo git clone https://github.com/Amirhanis/fyp_app.git
cd fyp_app

# Run the deployment script
sudo ./deploy.sh
```

### 3. Configure Web Server

**For Apache:**
```bash
sudo cp apache-chms.conf /etc/apache2/sites-available/chms.conf
sudo a2ensite chms.conf
sudo systemctl reload apache2
```

**For Nginx:**
```bash
sudo cp nginx-chms.conf /etc/nginx/sites-available/chms
sudo ln -s /etc/nginx/sites-available/chms /etc/nginx/sites-enabled/
sudo systemctl reload nginx
```

### 4. Set Up SSL
```bash
# For Apache
sudo certbot --apache -d chms.com -d www.chms.com

# For Nginx
sudo certbot --nginx -d chms.com -d www.chms.com
```

### 5. Configure DNS
Point your domain records to your server:
- A Record: `chms.com` → Your Server IP
- A Record: `www.chms.com` → Your Server IP

## Key Configuration Details

### Domain
- **Primary Domain:** www.chms.com
- **Alternative:** chms.com (redirects to www.chms.com)

### Application Details
- **Name:** Centralized Homestay Management System (CHMS)
- **Framework:** Laravel 10
- **PHP Version:** 8.1+
- **Database:** MySQL 5.7+ / MariaDB 10.3+

### Important URLs
- **Production:** https://www.chms.com
- **Repository:** https://github.com/Amirhanis/fyp_app

## Security Notes

- Set `APP_DEBUG=false` in production
- Use HTTPS (SSL certificate required)
- Configure strong database passwords
- Enable firewall (ports 80, 443, 22)
- Regular backups recommended

## Support

For detailed instructions, refer to [DEPLOYMENT.md](DEPLOYMENT.md)
