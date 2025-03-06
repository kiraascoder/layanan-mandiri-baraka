# Layanan Mandiri

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

## Tentang Proyek

Layanan Mandiri adalah aplikasi berbasis Laravel yang memungkinkan warga untuk mengajukan berbagai jenis surat secara mandiri dan mempermudah administrasi kelurahan dalam pengelolaan dokumen.

## Fitur
- Pengajuan surat secara online
- Verifikasi oleh admin kelurahan
- Notifikasi status pengajuan
- Arsip surat keluar
- Middleware autentikasi berbasis peran

## Instalasi

1. Clone repositori:
    ```sh
    git clone https://github.com/username/layanan-mandiri.git
    cd layanan-mandiri
    ```

2. Instal dependensi:
    ```sh
    composer install
    npm install
    ```

3. Konfigurasi file `.env`:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Konfigurasi database:
    - Pastikan database sudah dibuat.
    - Atur koneksi database di `.env`:
    ```env
    DB_DATABASE=nama_database
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. Jalankan migrasi:
    ```sh
    php artisan migrate --seed
    ```

6. Buat symbolic link untuk penyimpanan:
    ```sh
    php artisan storage:link
    ```

7. Jalankan aplikasi:
    ```sh
    php artisan serve
    ```

## Middleware Autentikasi

Aplikasi ini menggunakan middleware untuk mengontrol akses berdasarkan peran pengguna.

```php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role_id != 1) {
            return abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return $next($request);
    }
}
```

## Lisensi

Proyek ini berlisensi di bawah [MIT License](https://opensource.org/licenses/MIT).
