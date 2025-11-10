# VitaNote - Portal Edukasi Vitamin 🥗

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel)
![Filament](https://img.shields.io/badge/Filament-3.x-F59E0B?style=flat)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat&logo=php)
![License](https://img.shields.io/badge/License-MIT-green.svg)

Portal edukasi interaktif yang menyediakan informasi lengkap tentang berbagai jenis vitamin, fungsinya, sumber makanan, dan dampak kekurangan vitamin terhadap kesehatan.

## 🌟 Fitur Utama

- ✅ **Informasi Vitamin Lengkap** - Data detail vitamin A, D, E, K, B kompleks, dan C
- ✅ **Kategorisasi Vitamin** - Vitamin larut lemak dan larut air
- ✅ **Filter & Pencarian** - Cari vitamin berdasarkan nama atau huruf
- ✅ **Artikel Kesehatan** - Konten edukatif tentang nutrisi dan kesehatan
- ✅ **Admin Panel** - Dashboard manajemen menggunakan Filament
- ✅ **Auto-Generate Slug** - Otomatis generate URL-friendly slug
- ✅ **Referensi Ilmiah** - Fitur untuk menambahkan sumber referensi
- ✅ **Responsive Design** - Tampilan mobile-friendly dengan TailwindCSS

## 🛠️ Technology Stack

**Backend:** Laravel 11.x + Filament 3.x + PHP 8.3  
**Database:** MariaDB 10.11+ / MySQL 8.0+  
**Frontend:** Blade + TailwindCSS + Alpine.js + Livewire  
**Build:** Vite 7.x + Node.js 20.x

## 📋 Requirements

- PHP >= 8.3
- MariaDB >= 10.11 / MySQL >= 8.0
- Node.js >= 20.x
- Composer >= 2.x
- Apache2 / Nginx
- PHP Extensions: BCMath, cURL, DOM, GD, JSON, Mbstring, OpenSSL, PDO, XML, Zip

## 🚀 Installation

### Manual Installation

```bash
# 1. Clone repository
git clone https://github.com/fajarnrs/vitanote.git
cd vitanote

# 2. Install dependencies
composer install --no-dev --optimize-autoloader
npm install

# 3. Setup environment
cp .env.production.example .env
php artisan key:generate

# 4. Configure database in .env
DB_DATABASE=vitanote
DB_USERNAME=your_user
DB_PASSWORD=your_password

# 5. Run migrations
php artisan migrate --force
php artisan db:seed

# 6. Build assets
npm run build

# 7. Setup storage
php artisan storage:link
chmod -R 775 storage bootstrap/cache

# 8. Optimize
php artisan optimize
```

### Docker Installation

```bash
# 1. Clone repository
git clone https://github.com/fajarnrs/vitanote.git
cd vitanote

# 2. Copy environment
cp .env.docker.example .env

# 3. Build and start containers
docker-compose up -d

# 4. Install dependencies
docker-compose exec app composer install --no-dev
docker-compose exec app npm install
docker-compose exec app npm run build

# 5. Setup application
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan storage:link
docker-compose exec app php artisan optimize

# Access: http://localhost:8080
```

## 🔧 Web Server Configuration

### Apache2

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /path/to/vitanote/public

    <Directory /path/to/vitanote/public>
        AllowOverride All
        Require all granted
    </Directory>

    <FilesMatch \.php$>
        SetHandler "proxy:unix:/var/run/php/php8.3-fpm.sock|fcgi://localhost"
    </FilesMatch>
</VirtualHost>
```

```bash
sudo a2enmod rewrite proxy_fcgi setenvif
sudo a2ensite vitanote.conf
sudo systemctl restart apache2
```

### Nginx

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/vitanote/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 🔐 SSL Setup (Let's Encrypt)

```bash
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d yourdomain.com
```

## 👤 Default Admin

**Email:** admin@vitamin.com  
**Password:** password

⚠️ **Ubah password setelah login pertama!**

## 🔄 Update & Maintenance

```bash
# Update dependencies
composer update && npm update
npm run build

# Clear caches
php artisan optimize:clear && php artisan optimize

# Backup database
mysqldump -u user -p vitanote > backup.sql
```

## 🐛 Troubleshooting

```bash
# Fix permissions
sudo chown -R www-data:www-data /path/to/vitanote
sudo chmod -R 775 storage bootstrap/cache

# Clear all caches
php artisan optimize:clear
```

## 🙏 Acknowledgments

- **Laravel** - The PHP Framework For Web Artisans
- **Filament** - Accelerated Laravel Development Framework
- **TailwindCSS** - A utility-first CSS framework
- **Alpine.js** - A rugged, minimal framework
- **Livewire** - A full-stack framework for Laravel

## 📊 Project Status

✅ Production Ready  
✅ Actively Maintained  
✅ Stable Release

## 📄 License

This project is licensed under the MIT License.

---

Made with ❤️ by VitaNote Team
