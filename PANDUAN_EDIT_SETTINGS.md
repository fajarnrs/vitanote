# 🎨 Panduan Edit Settings Website

Website ini sudah dilengkapi dengan **system pengaturan dinamis** yang memungkinkan Anda mengubah seluruh konten website tanpa perlu edit code!

## ✅ Yang Bisa Diedit dari Database:

### 🏠 Informasi Umum
- **Nama Website** - Tampil di header dan title
- **Tagline** - Slogan website
- **Logo** - Upload logo custom
- **Deskripsi** - Meta description untuk SEO

### 👥 Tentang Kami
- **Judul halaman**
- **Konten lengkap** tentang visi misi
- **Nama & role tim** (2 anggota)
- **Nama institusi**

### 📞 Informasi Kontak
- **Email**
- **Instagram username**
- **Alamat lengkap**
- *(Bisa ditambah: Phone, Facebook, Twitter)*

### 📄 Footer
- **Deskripsi footer**
- **Disclaimer text**
- **Copyright text**

---

## 🛠️ Cara Edit Settings

### Metode 1: Via Database (PhpMyAdmin/MySQL) - **RECOMMENDED**

1. **Buka PhpMyAdmin** → Database: `vitamin_db` → Table: `site_settings`

2. **Cari setting** yang ingin diubah berdasarkan kolom `key`

3. **Edit nilai** di kolom `value`

4. **Clear cache** di terminal:
   ```bash
   cd /var/www/vitamin
   php artisan cache:clear
   ```

**Contoh Edit:**
```
key: site_name
value: Portal Vitamin Sehat  ← Edit ini

key: contact_email
value: email-baru@example.com  ← Edit ini
```

### Metode 2: Via Terminal (Laravel Tinker)

```bash
cd /var/www/vitamin
php artisan tinker
```

Kemudian ketik:
```php
// Edit nama website
App\Models\SiteSetting::set('site_name', 'Portal Vitamin Indonesia');

// Edit email
App\Models\SiteSetting::set('contact_email', 'info@vitaminportal.com');

// Edit konten tentang kami
App\Models\SiteSetting::set('about_content', 'Konten baru tentang kami disini...');

// Jangan lupa clear cache
App\Models\SiteSetting::clearCache();

// Ketik exit untuk keluar
exit
```

---

## 📋 Daftar Lengkap Settings Keys

### General (Umum)
| Key | Deskripsi | Contoh Value |
|-----|-----------|--------------|
| `site_name` | Nama website | VitaminInfo |
| `site_tagline` | Tagline | Kunci Kesehatan Tubuhmu |
| `site_logo` | Path logo | settings/logo.png |
| `site_description` | Deskripsi meta | Portal informasi vitamin... |

### About (Tentang Kami)
| Key | Deskripsi | Contoh Value |
|-----|-----------|--------------|
| `about_title` | Judul halaman | Tujuan Situs |
| `about_content` | Konten lengkap | VitaminInfo adalah portal... |
| `team_member_1_name` | Nama tim 1 | Ervina Febriana Basuki |
| `team_member_1_role` | Role tim 1 | Content Creator |
| `team_member_2_name` | Nama tim 2 | Nadila Kartika Hapsari |
| `team_member_2_role` | Role tim 2 | Researcher |
| `institution_name` | Institusi | Poltekkes Kemenkes Semarang |

### Contact (Kontak)
| Key | Deskripsi | Contoh Value |
|-----|-----------|--------------|
| `contact_email` | Email kontak | vitamininfo@gmail.com |
| `contact_instagram` | Username IG | @vitaminkesehatan |
| `contact_address` | Alamat | Poltekkes Kemenkes... |

### Footer
| Key | Deskripsi | Contoh Value |
|-----|-----------|--------------|
| `footer_description` | Deskripsi footer | Portal informasi vitamin... |
| `footer_disclaimer` | Disclaimer | Konten edukasi, bukan... |
| `footer_copyright` | Copyright | VitaminInfo |

---

## 🖼️ Cara Upload Logo Custom

### 1. Via FTP/SCP
1. Upload file logo ke: `/var/www/vitamin/storage/app/public/settings/`
2. Edit database `site_settings`:
   ```sql
   UPDATE site_settings 
   SET value = 'settings/nama-logo.png' 
   WHERE `key` = 'site_logo';
   ```
3. Link storage (jika belum):
   ```bash
   cd /var/www/vitamin
   php artisan storage:link
   ```
4. Clear cache:
   ```bash
   php artisan cache:clear
   ```

### 2. Via Terminal
```bash
# Upload file ke server dulu, misal via SCP
scp logo.png user@server:/var/www/vitamin/storage/app/public/settings/

# Set via tinker
cd /var/www/vitamin
php artisan tinker
App\Models\SiteSetting::set('site_logo', 'settings/logo.png');
App\Models\SiteSetting::clearCache();
exit
```

---

## ⚡ Quick Commands

```bash
# Clear semua cache
php artisan optimize:clear

# Clear cache settings saja
php artisan cache:clear

# Lihat semua settings
php artisan tinker
App\Models\SiteSetting::all();
exit

# Link storage (jika belum)
php artisan storage:link
```

---

## 🎯 Tips & Best Practices

1. **Selalu backup database** sebelum edit massal
2. **Clear cache** setelah setiap perubahan
3. **Test di browser** dengan mode incognito untuk memastikan cache clear
4. **Gunakan text editor** untuk konten panjang (about_content) agar formatting rapi
5. **Logo optimal**: PNG transparent, 200x50px

---

## 🆘 Troubleshooting

### Perubahan tidak terlihat?
```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

### Logo tidak muncul?
```bash
php artisan storage:link
chmod -R 775 storage/app/public
```

### Error setelah edit?
1. Check typo di value
2. Pastikan format sesuai (email untuk email_field, dll)
3. Restore backup jika perlu

---

## 📞 Butuh Bantuan?

Hubungi developer atau cek dokumentasi lengkap di README.md

**Made with ❤️ for Poltekkes Kemenkes Semarang**
