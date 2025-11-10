# Cara Mengedit Pengaturan Website

Untuk mengedit pengaturan website seperti nama, logo, kontak, dll, Anda bisa melakukannya dengan 2 cara:

## 1. Melalui Database (PhpMyAdmin/MySQL)

Akses tabel `site_settings` dan edit value-nya:

```sql
-- Contoh update nama website
UPDATE site_settings SET value = 'Nama Baru' WHERE `key` = 'site_name';

-- Contoh update email kontak
UPDATE site_settings SET value = 'email@baru.com' WHERE `key` = 'contact_email';

-- Clear cache setelah edit
php artisan cache:clear
```

## 2. Melalui Laravel Tinker (Terminal)

```bash
php artisan tinker

# Update setting
App\Models\SiteSetting::set('site_name', 'Nama Website Baru');
App\Models\SiteSetting::set('contact_email', 'newemail@example.com');
App\Models\SiteSetting::set('about_content', 'Konten tentang kami yang baru...');

# Clear cache
App\Models\SiteSetting::clearCache();
```

## Daftar Settings yang Tersedia:

### General
- `site_name` - Nama website
- `site_tagline` - Tagline website
- `site_logo` - Path logo (upload ke storage/app/public/settings/)
- `site_description` - Deskripsi website

### About/Tentang Kami
- `about_title` - Judul halaman tentang
- `about_content` - Konten tentang kami
- `team_member_1_name` - Nama anggota tim 1
- `team_member_1_role` - Jabatan anggota tim 1
- `team_member_2_name` - Nama anggota tim 2
- `team_member_2_role` - Jabatan anggota tim 2
- `institution_name` - Nama institusi

### Contact/Kontak
- `contact_email` - Email kontak
- `contact_instagram` - Username Instagram
- `contact_address` - Alamat

### Footer
- `footer_description` - Deskripsi di footer
- `footer_disclaimer` - Disclaimer
- `footer_copyright` - Teks copyright

## Upload Logo

1. Upload file logo ke folder `storage/app/public/settings/`
2. Update database:
```sql
UPDATE site_settings SET value = 'settings/logo-baru.png' WHERE `key` = 'site_logo';
```
3. Clear cache: `php artisan cache:clear`

## Catatan Penting

- Setelah mengubah settings, selalu jalankan `php artisan cache:clear` agar perubahan terlihat
- Settings otomatis di-cache selama 1 jam untuk performa
