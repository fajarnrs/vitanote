# Vitamin Information Portal

Portal informasi lengkap tentang vitamin dan nutrisi untuk kesehatan tubuh. Project ini menggunakan Laravel 11 dan Filament 3 untuk admin panel.

## 🚀 Fitur

### Frontend (Public)
- **Halaman Beranda**: Informasi singkat tentang vitamin + 6-8 vitamin populer
- **Daftar Vitamin**: Vitamin terkelompok berdasarkan kategori (Larut Air & Larut Lemak)
- **Detail Vitamin**: Informasi lengkap setiap vitamin (fungsi, sumber, AKG, defisiensi, dll)
- **Artikel Edukasi**: Artikel tentang vitamin, nutrisi, dan kesehatan
- **Halaman Tentang & Kontak**

### Admin Panel (Filament)
- **User Management**: Admin dapat membuat dan mengelola user (Admin & Operator)
- **Vitamin Categories Management**: Kelola kategori vitamin
- **Vitamin Management**: CRUD vitamin dengan upload gambar
- **Article Management**: CRUD artikel dengan rich text editor dan upload gambar
- **Role-based Access**: 
  - **Admin**: Full akses (user management, vitamin, artikel)
  - **Operator**: Hanya bisa mengelola konten (vitamin, artikel)

## 📋 Persyaratan Sistem

- PHP 8.2+
- MariaDB/MySQL
- Apache2/Nginx
- Composer
- Node.js & NPM

## 🔧 Instalasi

### 1. Clone/Setup Project

```bash
cd /var/www/vitamin
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install NPM dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vitamin_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Migrate & Seed Database

```bash
# Run migrations and seeders
php artisan migrate:fresh --seed
```

### 6. Build Assets

```bash
# Build frontend assets
npm run build

# Atau untuk development dengan watch mode:
npm run dev
```

### 7. Storage Link

```bash
php artisan storage:link
```

### 8. Start Server

**Development:**
```bash
php artisan serve
```

**Production (Apache2):**
```bash
# Pastikan document root mengarah ke /var/www/vitamin/public
# Dan mod_rewrite sudah aktif
sudo a2enmod rewrite
sudo systemctl restart apache2
```

## 👤 Login Credentials

Setelah seeding, gunakan kredensial berikut:

### Admin
- Email: `admin@vitamin.com`
- Password: `password`
- Akses: Full access (users, vitamins, articles)

### Operator
- Email: `operator@vitamin.com`
- Password: `password`
- Akses: Content only (vitamins, articles)

## 📁 Struktur Project

```
vitamin/
├── app/
│   ├── Filament/           # Filament Admin Panel
│   │   └── Resources/      # Resource untuk CRUD
│   ├── Http/
│   │   └── Controllers/    # Controllers untuk frontend
│   └── Models/             # Eloquent Models
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Data seeders
├── resources/
│   ├── css/               # Tailwind CSS
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
│       ├── layouts/       # Layout files
│       ├── vitamins/      # Vitamin views
│       └── articles/      # Article views
└── routes/
    └── web.php            # Web routes
```

## 🎨 Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Admin Panel**: Filament 3
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MariaDB/MySQL
- **Icons**: Heroicons

## 📱 Halaman yang Tersedia

### Public Pages
- `/` - Beranda
- `/vitamin` - Daftar semua vitamin
- `/vitamin/kategori/{slug}` - Vitamin per kategori
- `/vitamin/{slug}` - Detail vitamin
- `/artikel` - Daftar artikel
- `/artikel/{slug}` - Detail artikel
- `/tentang-kami` - Tentang project
- `/kontak` - Halaman kontak

### Admin Panel
- `/admin` - Filament admin panel
- `/admin/users` - User management (Admin only)
- `/admin/vitamin-categories` - Kategori vitamin
- `/admin/vitamins` - Vitamin management
- `/admin/articles` - Article management

## 🗃️ Database Schema

### Tables
1. **users** - User accounts (admin & operator)
2. **vitamin_categories** - Kategori vitamin (Larut Air, Larut Lemak)
3. **vitamins** - Data vitamin
4. **articles** - Artikel edukasi

## 📝 Data yang Sudah Tersedia

Setelah seeding, database akan terisi dengan:

### Vitamin Categories
1. Vitamin Larut Lemak (A, D, E, K)
2. Vitamin Larut Air (B kompleks, C)

### Vitamins (8 vitamin)
- Vitamin A (Retinol)
- Vitamin D (Kalsiferol)
- Vitamin E (Tokoferol)
- Vitamin K (Phylloquinone)
- Vitamin B1 (Thiamine)
- Vitamin B9 (Asam Folat)
- Vitamin B Kompleks
- Vitamin C (Asam Askorbat)

### Articles (5 artikel edukasi)
1. Pentingnya Vitamin C dalam Pembentukan Tulang
2. Vitamin D dan Kesehatan Tulang
3. Bahaya Kekurangan Vitamin B12
4. Mengapa Tubuh Butuh Vitamin B Kompleks?
5. Vitamin A dan Kesehatan Mata: Fakta dan Mitos

## 🎯 Cara Menambahkan Konten

### Sebagai Admin
1. Login ke `/admin`
2. Buat user baru (Admin/Operator) di menu Users
3. Kelola kategori vitamin di menu Vitamin Categories
4. Tambah/edit vitamin di menu Vitamins
5. Tambah/edit artikel di menu Articles

### Sebagai Operator
1. Login ke `/admin`
2. Tambah/edit vitamin
3. Tambah/edit artikel
4. Upload gambar untuk vitamin atau artikel

## 🔒 Role & Permissions

### Admin Role
- ✅ Manage users (CRUD)
- ✅ Manage vitamin categories
- ✅ Manage vitamins
- ✅ Manage articles
- ✅ Full access to all features

### Operator Role
- ❌ Cannot manage users
- ✅ Manage vitamin categories
- ✅ Manage vitamins
- ✅ Manage articles
- ✅ Upload images

## 🎨 Customization

### Mengubah Warna Theme
Edit file `resources/views/layouts/app.blade.php` dan ubah class Tailwind:
- `teal-700` → Warna primary
- `teal-600` → Warna secondary

### Menambah Vitamin Baru
1. Login sebagai Admin/Operator
2. Masuk ke menu "Vitamins"
3. Klik "New Vitamin"
4. Isi form dengan lengkap
5. Upload gambar (opsional)
6. Centang "Is Popular" jika ingin ditampilkan di beranda
7. Save

### Menambah Artikel Baru
1. Login sebagai Admin/Operator
2. Masuk ke menu "Articles"
3. Klik "New Article"
4. Isi judul, excerpt, content
5. Upload featured image (opsional)
6. Set "Is Published" dan tanggal publish
7. Save

## 👥 Tim Pengembang

- **Ervina Febriana Basuki** - Content Creator & Researcher
- **Nadila Kartika Hapsari** - Content Creator & Researcher

**Institusi**: Poltekkes Kemenkes Semarang

## 📧 Kontak

- Email: vitamininfo@gmail.com
- Instagram: @vitaminkesehatan

## ⚠️ Disclaimer

Informasi yang disediakan di situs ini hanya untuk tujuan edukasi dan tidak dimaksudkan sebagai pengganti konsultasi medis profesional, diagnosis, atau perawatan. Selalu konsultasikan dengan dokter atau ahli gizi terkait kondisi kesehatan Anda.

## 📄 License

Project ini dibuat untuk tujuan edukasi.

---

**Dibuat dengan ❤️ menggunakan Laravel & Filament**
