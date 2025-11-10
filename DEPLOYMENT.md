# DEPLOYMENT (Ubuntu 24.04 + Nginx + PHP-FPM)

This guide packages and deploys the Laravel + Filament project onto a fresh Ubuntu 24.04 VPS. A production zip should include: `app/`, `bootstrap/`, `config/`, `database/`, `public/` (with built assets), `resources/` (optional after build), `routes/`, `vendor/`, `artisan`, `composer.json`, `composer.lock`, `DEPLOYMENT.md`, `scripts/deploy.sh`, and an `.env` stub.

## 1. System Packages
```bash
apt update && apt upgrade -y
apt install -y nginx git unzip curl redis-server mariadb-server software-properties-common
add-apt-repository ppa:ondrej/php -y && apt update
apt install -y php8.3 php8.3-fpm php8.3-cli php8.3-mbstring php8.3-xml php8.3-curl php8.3-zip php8.3-gd php8.3-intl php8.3-bcmath php8.3-mysql php8.3-readline php8.3-redis
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt install -y nodejs # optional build
```

## 2. User & Directory
```bash
adduser --disabled-password --gecos "" deploy
usermod -aG www-data deploy
mkdir -p /var/www/vitanote
chown -R deploy:www-data /var/www/vitanote
```

## 3. Upload Release Zip
```bash
scp dist/vitanote-release.zip deploy@SERVER_IP:/tmp/
ssh deploy@SERVER_IP
cd /var/www/vitanote
unzip /tmp/vitanote-release.zip -d .
```

## 4. Environment
```bash
cp dist/.env.production.example .env
nano .env   # set APP_URL, DB_*, MAIL_*
php artisan key:generate --force
```

## 5. Dependencies & Build
```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci && npm run build || echo "Skip build (no Node)."
php artisan storage:link
php artisan migrate --force
php artisan optimize:clear && php artisan optimize
```

## 6. Nginx VHost `/etc/nginx/sites-available/vitanote.conf`
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/vitanote/public;
    index index.php;

    location / { try_files $uri $uri/ /index.php?$query_string; }
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
    location ~* \.(?:png|jpe?g|gif|svg|webp|css|js|woff2?|ttf)$ { expires max; access_log off; }
    client_max_body_size 20M;
}
```
```bash
sudo ln -s /etc/nginx/sites-available/vitanote.conf /etc/nginx/sites-enabled/vitanote.conf
sudo nginx -t && sudo systemctl reload nginx
```

## 7. HTTPS
```bash
apt install -y certbot python3-certbot-nginx
certbot --nginx -d your-domain.com --redirect -m admin@your-domain.com --agree-tos
```

## 8. Permissions
```bash
sudo chown -R www-data:www-data storage bootstrap/cache public/storage
sudo chmod -R ug+rwX storage bootstrap/cache
```

## 9. Queue & Scheduler (Optional)
```bash
apt install -y supervisor
cat >/etc/supervisor/conf.d/vitanote-queue.conf <<'EOF'
[program:vitanote-queue]
command=php /var/www/vitanote/artisan queue:work --sleep=3 --tries=3 --backoff=3
autostart=true
autorestart=true
user=www-data
redirect_stderr=true
stdout_logfile=/var/log/supervisor/vitanote-queue.log
EOF
supervisorctl reread && supervisorctl update
crontab -u www-data -l | { cat; echo "* * * * * php /var/www/vitanote/artisan schedule:run >> /dev/null 2>&1"; } | crontab -u www-data -
```

## 10. Update Cycle
```bash
git pull origin main
composer install --no-dev --prefer-dist --optimize-autoloader
php artisan migrate --force
npm run build
php artisan optimize:clear && php artisan optimize
```

## 11. Troubleshooting
| Symptom | Action |
|---------|--------|
| 500 error | Check `storage/logs/laravel.log`; verify APP_KEY & permissions |
| Images missing | Re-run `php artisan storage:link`; check public/storage perms |
| Slow first hit | Ensure caches built; APP_DEBUG=false |
| CSS/JS 404 | Re-run build; confirm `public/build` exists |

## 12. Security Basics
- UFW firewall (allow 22, 80, 443)
- Regular `apt upgrade`
- Strong DB password, limited DB user privileges
- Fail2ban (optional)

Done. Use `bash scripts/deploy.sh` for a scripted flow.
