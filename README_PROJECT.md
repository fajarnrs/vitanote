# Vitamin Info Website

Website informasi vitamin dengan CMS menggunakan Laravel & Filament.

## 🚀 Fitur

### Frontend (Public)
- **Halaman Beranda**: Penjelasan singkat tentang vitamin + tombol "Jelajah Vitamin"
- **Vitamin Populer**: Grid 6-8 vitamin populer (A, B kompleks, C, D, E, K)
- **Kategori Vitamin**: 
  - Vitamin Larut Lemak (A, D, E, K)
  - Vitamin Larut Air (B1-B12, C)
- **Detail Vitamin**: Nama, jenis, fungsi, sumber makanan, AKG, defisiensi, fakta menarik
- **Artikel Edukasi**: Sejarah vitamin, huruf yang hilang, fakta unik

### Backend (Admin Panel)
- **Role-based Access Control**:
  - **Admin**: Kelola users, roles, konten vitamin, artikel
  - **Operator**: Hanya kelola konten (vitamin & artikel)
- **Upload Images** seperti WordPress
- **Rich Text Editor** untuk konten
- **CRUD** lengkap untuk vitamin dan artikel

## 🛠 Tech Stack
- Laravel 12.x
- Filament 4.x (Admin Panel)
- Tailwind CSS
- MariaDB 10.11
- Apache2

## 📦 Instalasi

### Prerequisites
- PHP 8.3+
- Composer
- MariaDB/MySQL
- Apache2

### Setup

```bash
# Clone repository
git clone <repository-url>
cd vitamin

# Install dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vitamin_db
DB_USERNAME=vitamin_user
DB_PASSWORD=vitamin_password

# Run migrations and seeders
php artisan migrate --seed

# Set permissions
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache

# Start server (development)
php artisan serve
# Or use Apache (production)
```

## 👥 Default Users

**Admin**
- Email: admin@vitamin.com
- Password: password
- Akses: Full access (user management, content management)

**Operator**
- Email: operator@vitamin.com
- Password: password
- Akses: Content management only

## 📊 Struktur Database

### Tables
- **users**: User dengan role (admin/operator)
- **vitamin_categories**: Kategori vitamin (larut air/lemak)
- **vitamins**: Detail vitamin lengkap
- **articles**: Artikel edukasi
- **media**: Upload images

## 🌐 Routes

### Public
- `/` - Beranda
- `/vitamins` - Daftar semua vitamin
- `/vitamins/{slug}` - Detail vitamin
- `/category/{type}` - Vitamin berdasarkan kategori
- `/articles` - Daftar artikel
- `/articles/{slug}` - Detail artikel
- `/about` - Tentang Kami
- `/contact` - Kontak

### Admin
- `/admin` - Dashboard admin (Filament)
- `/admin/login` - Login admin panel

## 🎨 Gaya Visual

- **Warna**: Hijau daun (primer), Biru lembut (sekunder), Kuning untuk aksen
- **Tipografi**: Judul tebal 24-32px, Isi 16-18px, Kontras tinggi
- **Komponen**: Card sudut membulat, Tabel garis tipis, Tombol hijau teks putih
- **Responsif**: Grid 3-4 kolom (desktop), 2 (tablet), 1 (mobile), Header sticky

## 🔧 Development

```bash
# Install npm dependencies
npm install

# Build assets
npm run build

# Watch for changes (development)
npm run dev

# Run tests
php artisan test
```

## 📝 Database Seeders

Seeders menyediakan data awal:
- 2 users (admin & operator)
- 2 kategori vitamin
- 7 vitamin populer dengan detail lengkap
- 3 artikel edukasi

## 🔐 Security

- Authentication menggunakan Laravel Sanctum
- Role-based access control di Filament
- CSRF protection
- Password hashing
- SQL injection prevention

## 📱 Screenshot

(Tambahkan screenshot di sini)

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Acknowledgments

- Laravel Team
- Filament Team
- Contributors

## 📞 Support

Untuk pertanyaan dan dukungan, silakan buka issue di repository ini.

---

**Built with ❤️ using Laravel & Filament**
