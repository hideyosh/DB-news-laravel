<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laporan Laravel Website Berita

## Tri Anggoro Budi S

## 4523210108

# 📰 Aplikasi Berita (DB-News)

Aplikasi web sederhana untuk mengelola dan menampilkan berita yang dibuat menggunakan Laravel 12. Aplikasi ini dikembangkan untuk tujuan pembelajaran mahasiswa dalam memahami konsep MVC (Model-View-Controller), ORM (Object-Relational Mapping), dan routing di Laravel.

## 📋 Daftar Isi

- [Tentang Aplikasi](#tentang-aplikasi)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Arsitektur Aplikasi](#arsitektur-aplikasi)
- [Struktur Database](#struktur-database)
- [Cara Kerja Routing](#cara-kerja-routing)
- [Model dan Relasi](#model-dan-relasi)
- [Controller](#controller)
- [Panduan Pengembangan](#panduan-pengembangan)
- [Referensi Laravel](#referensi-laravel)

## 🎯 Tentang Aplikasi

Aplikasi Berita adalah sistem manajemen konten sederhana yang memungkinkan:
- Menampilkan daftar berita
- Melihat detail berita lengkap dengan informasi wartawan
- Menampilkan komentar pada setiap berita

Aplikasi ini dibangun dengan fokus pada pemahaman konsep dasar Laravel dan best practices dalam pengembangan web modern.

## 🛠 Teknologi yang Digunakan

| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| **PHP** | ^8.2 | Bahasa pemrograman server-side |
| **Laravel Framework** | ^12.0 | Framework PHP MVC |
| **Composer** | Latest | Dependency manager untuk PHP |
| **NPM** | Latest | Package manager untuk JavaScript |
| **Vite** | Latest | Build tool untuk frontend assets |
| **MySQL/PostgreSQL** | Latest | Database relasional |

### Package Laravel yang Digunakan:
- **Laravel Tinker** - REPL untuk testing dan debugging
- **Laravel Pint** - Code style fixer
- **Laravel Sail** - Docker development environment
- **Faker PHP** - Generator data dummy untuk testing

## ⚙️ Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan sistem Anda memiliki:

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL atau PostgreSQL
- Web Server (Apache/Nginx) atau bisa menggunakan Laravel built-in server

Untuk Windows, disarankan menggunakan:
- **Laragon** (sudah include PHP, MySQL, Apache)
- **XAMPP**
- **Herd**

Untuk MacOS, disarankan menggunakan:
- **MAMP**
- **XAMPP**
- **Herd**

## 📥 Instalasi

### 1. Clone atau Download Repository

```bash
# Clone repository (jika menggunakan git)
git clone <repository-url>
cd DB-NEWS
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies JavaScript

```bash
npm install
```

### 4. Konfigurasi Environment

```bash
# Copy file .env.example menjadi .env
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_news
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migration & Seeder

```bash
# Membuat tabel-tabel di database
php artisan migrate

# (Optional) Generate data dummy untuk testing
php artisan db:seed
```

### 7. Build Assets Frontend

```bash
# Untuk development (dengan hot reload)
npm run dev

# Untuk production
npm run build
```

### 8. Jalankan Aplikasi

```bash
# Menggunakan Laravel built-in server
php artisan serve
```

Akses aplikasi di browser: `http://localhost:8000`

## 🗄 Struktur Database

Aplikasi ini memiliki 3 tabel utama dengan relasi sebagai berikut:

```
┌─────────────────┐
│    wartawan     │
├─────────────────┤
│ id (PK)         │
│ nama            │
│ email           │
│ created_at      │
│ updated_at      │
└────────┬────────┘
         │
         │ 1:N (One to Many)
         │
         ▼
                                                 ┌─────────────────┐              
┌─────────────────┐                              |     kategori    |
│      berita     │                              ├─────────────────┤
├─────────────────┤                              |    id (PK)      |                 
│ id (PK)         │                              |  nama_kategori  |
│ judul           │                              |                 |
│ ringkasan       |                              |                 |
| gambar          │      1:N (One to Many)       |                 |
│ isi             │   <------------------------  |                 |    
│ wartawan_id (FK)|                              └────────┬────────┘
│ kategori_id (FK |
│ created_at      │
│ updated_at      │
└────────┬────────┘
         │
         │ 1:N (One to Many)
         │
         ▼
┌─────────────────┐
│    komentar     │
├─────────────────┤
│ id (PK)         │
│ nama            │
│ isi             │
│ berita_id (FK)  │
│ created_at      │
│ updated_at      │
└─────────────────┘
```

### Penjelasan Tabel:

#### 1. Tabel `wartawan`
Menyimpan data jurnalis/reporter yang menulis berita.

| Field | Type | Keterangan |
|-------|------|------------|
| id | BIGINT (PK) | Primary key, auto increment |
| nama | VARCHAR | Nama wartawan |
| email | VARCHAR | Email wartawan |
| created_at | TIMESTAMP | Waktu data dibuat |
| updated_at | TIMESTAMP | Waktu data terakhir diupdate |

#### 2. Tabel `berita`
Menyimpan data berita.

| Field | Type | Keterangan |
|-------|------|------------|
| id | BIGINT (PK) | Primary key, auto increment |
| judul | VARCHAR | Judul berita |
| ringkasan | TEXT | Ringkasan/preview berita |
| gambar | string | Menyimpan url gambar di storage |
| isi | TEXT | Konten lengkap berita |
| wartawan_id | BIGINT (FK) | Foreign key ke tabel wartawan |
| kategori_id | BIGINT (FK) | Foreign key ke tabel kategori |
| created_at | TIMESTAMP | Waktu berita dibuat |
| updated_at | TIMESTAMP | Waktu berita terakhir diupdate |

#### 3. Tabel `komentar`
Menyimpan komentar pembaca pada berita.

| Field | Type | Keterangan |
|-------|------|------------|
| id | BIGINT (PK) | Primary key, auto increment |
| nama | VARCHAR | Nama komentator |
| isi | TEXT | Isi komentar |
| berita_id | BIGINT (FK) | Foreign key ke tabel berita |
| created_at | TIMESTAMP | Waktu komentar dibuat |
| updated_at | TIMESTAMP | Waktu komentar terakhir diupdate |

#### 4. Tabel `kategori`
Menyimpan komentar pembaca pada berita.

| Field | Type | Keterangan |
|-------|------|------------|
| id | BIGINT (PK) | Primary key, auto increment |
| nama_kategori | VARCHAR | Nama kategori |
| created_at | TIMESTAMP | Waktu komentar dibuat |
| updated_at | TIMESTAMP | Waktu komentar terakhir diupdate |

### Relasi Database:

- **Wartawan → Berita**: One to Many (1:N)
  - Satu wartawan bisa menulis banyak berita
  - 
- **Kategori → Berita**: One to Many (1:N)
  - Satu kategori bisa ada di banyak berita
  
- **Berita → Komentar**: One to Many (1:N)
  - Satu berita bisa memiliki banyak komentar

## 🛣 Cara Kerja Routing

File routing utama aplikasi ada di `routes/web.php`. Mari kita bahas setiap route:

### Route 1: Halaman Daftar Berita

```php
Route::get('/', [beritaController::class, 'index'])->name('berita.index');
```

**Penjelasan:**
- `Route::get('/')` → Menangani HTTP GET request ke URL root (`/`)
- `[BeritaController::class, 'index']` → Memanggil method `index()` dari `BeritaController`
- `->name('berita.index')` → Memberikan nama route (untuk memudahkan referensi di view)

**Alur:**
1. User mengakses `http://localhost:8000/`
2. Laravel mencocokkan dengan route `GET /`
3. Method `index()` di `beritaController` dipanggil
4. Controller mengambil semua data berita dari database
5. Data dikirim ke view `berita/index.blade.php`
6. HTML di-render dan ditampilkan ke user

### Route 2: Halaman Detail Berita

```php
Route::get('/berita/{berita}', [beritaController::class, 'show'])->name('berita.show');
```

**Penjelasan:**
- `Route::get('/berita/{berita}')` → Menangani GET request dengan parameter dinamis
- `{berita}` → Parameter dinamis yang akan diisi dengan ID berita
- `[BeritaController::class, 'show']` → Memanggil method `show()` dari `BeritaController`
- `->name('Berita.show')` → Nama route untuk referensi

**Route Model Binding:**
Laravel secara otomatis mengambil data dari database berdasarkan ID yang ada di URL. Misalnya:
- URL: `http://localhost:8000/berita/5`
- Laravel otomatis query: `SELECT * FROM berita WHERE id = 5`
- Hasilnya langsung di-inject ke parameter method `show(berita $berita)`

**Alur:**
1. User klik berita dengan ID 5
2. Browser mengakses `http://localhost:8000/berita/5`
3. Laravel melakukan Route Model Binding
4. Method `show(Berita $berita)` dipanggil dengan object berita yang sudah terisi data
5. Controller me-load relasi (wartawan dan komentar)
6. Data dikirim ke view `berita/show.blade.php`
7. HTML di-render dan ditampilkan

### Route 3: Menyimpan Komentar ke Database

```php
Route::post('/berita/{berita}/komentar', [App\Http\Controllers\KomentarController::class, 'store'])
    ->name('komentar.store');
```

**Penjelasan:**
- `Route::post('/berita/{berita}/komentar')` → Menangani POST request untuk menambah komentar ke berita tertentu.
- `{berita}` → Parameter dinamis yang berisi ID berita tempat komentar dikirim.
- `[KomentarController::class, 'store']` → Memanggil method store() di KomentarController untuk memproses dan menyimpan komentar.
- `->name('komentar.store')` → Nama route yang bisa dipanggil di form menggunakan `route('komentar.store', $berita->id)`.

**Alur Kerja (AJAX & Non-AJAX):**
1. User mengetik nama dan isi komentar di form yang ada di halaman detail berita (show.blade.php).
2. Ketika tombol Kirim Komentar ditekan:
    - Form mengirimkan data ke URL `/berita/{id}/komentar` dengan method `POST`
    - `{id}` otomatis digantikan dengan ID berita.
3. Laravel menangkap route ini dan memanggil `storeKomentar(Request $request, berita $berita)`.
4. Laravel melakukan Route Model Binding:
    - Dari `{berita}`, Laravel otomatis mencari berita berdasarkan ID:
        ```sql
        SELECT * FROM berita WHERE id = {id}
        ```
    - Objek `berita` tersebut di-inject ke parameter `$berita`.
5. Method storeKomentar() melakukan:
    - Validasi input (`nama` dan `isi` harus diisi).
    - Menyimpan komentar baru ke tabel `komentar` dengan relasi `berita_id`.
    - Jika request berasal dari AJAX, Laravel mengirimkan response JSON:
        ```json
        {
            "status": "success",
            "message": "Komentar berhasil dikirim!",
            "komentar": {
                "nama": "Chaerul",
                "isi": "Berita ini menarik.",
                "waktu": "07 Nov 2025 14:30"
            }
        }
        ```
    - Jika bukan AJAX, Laravel redirect ke halaman detail berita dengan pesan sukses.

**Contoh Alur Lengkap:**
1. User mengisi form di `/berita/3`
2. Browser mengirim data ke `/berita/3/komentar`
3. Laravel otomatis menemukan berita ID 3
4. Komentar disimpan ke database:
    ```sql
    INSERT INTO komentar (nama, isi, berita_id, created_at)
    VALUES ('Chaerul', 'Berita ini bagus sekali!', 3, NOW());
    ```
5. Jika menggunakan AJAX, komentar langsung muncul tanpa reload halaman.

## 📦 Model dan Relasi

### 1. Model berita (`app/Models/berita.php`)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = ['judul', 'ringkasan', 'isi', 'wartawan_id'];

    public function wartawan()
    {
        return $this->belongsTo(Wartawan::class, 'wartawan_id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'berita_id')->latest();
    }
}
```

**Penjelasan:**
- `$table = 'berita'` → Menentukan nama tabel di database
- `$fillable` → Kolom yang boleh diisi secara mass assignment
- `belongsTo(Wartawan::class)` → Setiap berita ditulis oleh 1 wartawan
- `hasMany(Komentar::class)` → Setiap berita bisa punya banyak komentar

**Cara Menggunakan Relasi:**

```php
// Mengambil wartawan dari sebuah berita
$berita = berita::find(1);
echo $berita->wartawan->nama; // Output: Nama wartawan

// Mengambil semua komentar dari sebuah berita
$komentar_list = $berita->komentar;
foreach($komentar_list as $komentar) {
    echo $komentar->isi;
}
```

### 2. Model Wartawan (`app/Models/Wartawan.php`)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wartawan extends Model
{
    use HasFactory;

    protected $table = 'wartawan';
    protected $fillable = ['nama', 'email'];

    public function berita()
    {
        return $this->hasMany(berita::class, 'wartawan_id');
    }
}

```

**Cara Menggunakan:**

```php
// Mengambil semua berita yang ditulis wartawan tertentu
$wartawan = Wartawan::find(1);
$semua_berita = $wartawan->berita;
```

### 3. Model Komentar (`app/Models/Komentar.php`)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';

    protected $fillable = ['nama', 'isi', 'berita_id'];

    public function berita()
    {
        return $this->belongsTo(berita::class, 'berita_id');
    }
}
```

## 🎮 Controller

### beritaController (`app/Http/Controllers/beritaController.php`)

Controller ini mengatur semua logic untuk menampilkan berita.

#### Method: `index()`

```php
public function index()
{
    $headline = berita::with('wartawan', 'komentar')->latest()->first();
    $beritaLain = berita::with('wartawan', 'komentar')
        ->where('id', '!=', $headline->id)
        ->latest()
        ->paginate(9);

    return view('berita.index', compact('headline', 'beritaLain'));
}
```

**Penjelasan:**
- `berita::with('wartawan', 'komentar')` → Mengambil data berita bersamaan dengan relasi wartawan dan komentar (Eager Loading) untuk efisiensi query.
- `latest()` → Mengurutkan berita berdasarkan kolom `created_at` secara descending (berita terbaru di atas).
- `first()` → Mengambil 1 berita paling terbaru sebagai berita utama (headline).
- `where('id', '!=', $headline->id)` → Mengecualikan berita utama agar tidak muncul lagi di daftar berita lainnya.
- `paginate(9)` → Menampilkan 9 berita per halaman dan otomatis menghasilkan link pagination pada view.
- `return view('berita.index', compact('headline', 'beritaLain'))` → Mengirim dua variabel (`$headline` dan `$beritaLain`) ke `view berita/index.blade.php`.

#### Method: `show()`

```php
public function show(berita $berita)
{
    // load relasi wartawan dan komentar
    $berita->load('wartawan', 'komentar');


    return view('berita.show', [
        'berita' => $berita
    ]);
}
```

**Penjelasan:**
- `berita $berita` → Laravel melakukan Route Model Binding otomatis. Parameter `{berita}` di URL akan diubah menjadi objek `berita` berdasarkan `id`.
- `$berita->load('wartawan', 'komentar')` → Melakukan lazy eager loading, yaitu memuat relasi tambahan (`wartawan` dan `komentar`) setelah model utama didapat. Tujuannya agar data relasi siap digunakan di view tanpa query tambahan berulang.
- `return view('berita.show', ['berita' => $berita])` → Mengirim data berita lengkap ke view `berita/show.blade.php` agar bisa ditampilkan dalam detail berita.

## 9. Screenshot Hasil Running

1. Halaman Utama `/`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/0f0c9ac2-0886-4336-aee8-518788e332fc" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/2b8a0f03-a417-4c5c-a7fe-f7e02d67c9b1" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/e953dcce-2b0c-4274-ae2c-14e8b943a79a" />

2. Halaman Detail Berita `/news/{news}`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/a678a7e9-ce61-41ea-a0b1-6977def36592" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/1f358afa-b6fd-43f7-a077-88f7744c78b1" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/80f2e260-6f9c-4e40-82a1-990c51138753" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/9427c078-e264-435a-9a56-44131a40a4a7" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/fa24f56c-eca2-446e-8333-4b176dd92bf0" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/9689a521-0e69-439d-82b6-817a9689105b" />

3. Halaman Tambah Komentar `/news/{news}/komentar`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/425bad0e-5a5e-49d1-b77c-12dc9de0f2b6" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/ca2084e5-38a6-4b40-bc3a-24513aca510c" />
