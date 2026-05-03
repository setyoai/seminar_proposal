# Sistem Seminar Proposal

## Deskripsi Proyek

Aplikasi ini adalah sistem manajemen seminar proposal dan skripsi untuk perguruan tinggi, dibangun menggunakan CodeIgniter 4.
Fungsinya meliputi pengelolaan mahasiswa, dosen, seminar proposal, daftar skripsi, bimbingan, penilaian, dan API REST untuk berbagai entitas.

## Fitur Utama

- Login dan otentikasi pengguna
- Manajemen mahasiswa, dosen, koordinator, operator, dan profil pengguna
- CRUD untuk daftar skripsi, daftar seminar proposal, ruangan, dan detail sempro
- REST API untuk Mahasiswa, Daftar Skripsi, Daftar Seminar, Dosen, Judul, Penilaian, Bimbingan, dan lainnya
- Upload file bimbingan dan validasi berkas
- Penerapan filter akses (`isLoggedIn`) untuk halaman terproteksi

## Teknologi dan Dependensi

- PHP `^8.2`
- CodeIgniter 4 `^4.7`
- PHPUnit `^10.5.16`
- FakerPHP untuk pengujian

## Struktur Proyek

- `app/Controllers/` - kontroler utama dan API
- `app/Models/` - model database untuk entitas seperti Mahasiswa, Dosen, Sempro, dll.
- `app/Config/` - konfigurasi aplikasi, rute, database, filter, dan layanan
- `app/Database/Migrations/` - skema database dan tabel
- `app/Database/Seeds/` - data awal untuk pengujian atau pengembangan
- `app/Views/` - tampilan antarmuka pengguna
- `public/` - root publik untuk web server
- `writable/` - cache, log, upload, session

## Instalasi

1. Clone repository:

   ```bash
   git clone https://github.com/username/seminar_proposal.git
   cd seminar_proposal
   ```

2. Install dependensi Composer:

   ```bash
   composer install
   ```

3. Duplikat file `env` ke `.env` dan sesuaikan:

   ```bash
   cp .env.example .env
   ```

4. Atur konfigurasi database di `.env`:
   - `database.default.hostname`
   - `database.default.database`
   - `database.default.username`
   - `database.default.password`
   - `app.baseURL`

5. Jalankan migrasi database:

   ```bash
   php spark migrate
   ```

6. (Opsional) Isi data awal dengan seeder:

   ```bash
   php spark db:seed NamaSeeder
   ```

## Menjalankan Aplikasi

- Di lingkungan pengembangan lokal:

  ```bash
  php spark serve
  ```

- Pastikan web server diarahkan ke folder `public/`.

## Konfigurasi Rute dan Akses

Rute utama aplikasi:

- `GET /` → `Login::index`
- `POST /login/cek-user` → `Login::cekUser`
- `GET /home` → `Home::index`
- `GET /login/logout` → `Login::logout`

Halaman terproteksi menggunakan filter `isLoggedIn`:

- `password`
- `profile`
- `operator`
- `koordinator`
- `dosen`
- `user`
- `mahasiswa`
- `dafskripsi`
- `dosbing`
- `sempro`
- `dafsempro`
- `ruangan`
- `detsempro`

## Dokumentasi API REST

### Mahasiswa

- `GET /mahasiswarest` → list mahasiswa
- `GET /mahasiswarest/{id}` → detail mahasiswa
- `POST /mahasiswarest` → tambah mahasiswa
- `PUT /mahasiswarest/{id}` → update mahasiswa

### Daftar Skripsi

- `GET /dafskripsirest`
- `GET /dafskripsirest/{id}`
- `POST /dafskripsirest`
- `PUT /dafskripsirest/{id}`

### Daftar Seminar Proposal

- `GET /dafsemprorest`
- `GET /dafsemprorest/{id}`
- `POST /dafsemprorest`
- `PUT /dafsemprorest/{id}`

### User

- `GET /userrest`
- `GET /userrest/{id}`
- `POST /userrest`
- `PUT /userrest/{id}`

### Penilaian Sempro

- `GET /detsemprorest`
- `GET /detsemprorest/{id}`
- `POST /detsemprorest`
- `PUT /detsemprorest/{id}`

### Dosen Pembimbing (Dosbing)

- `GET /dosbingrest`
- `GET /dosbingrest/{id}`
- `POST /dosbingrest`
- `PUT /dosbingrest/{id}`

### Bimbingan

- `GET /bimbinganrest`
- `GET /bimbinganrest/{id}`
- `POST /bimbinganrest`
- `PUT /bimbinganrest/{id}`

### Bimbingan Dosen

- `GET /bimbingandosenrest`
- `GET /bimbingandosenrest/{id}`
- `POST /bimbingandosenrest`
- `PUT /bimbingandosenrest/{id}`

### Update Bimbingan Dosen

- `GET /updatebimbingandosenrest/{id}`
- `PUT /updatebimbingandosenrest/{id}`

### Mahasiswa Sempro

- `GET /mahasiswasemprorest/{id}`
- `GET /mahasiswasemprorest/{id}`

### Dosen, Judul, dan Penilaian

- `resource('dosenrest')`
- `resource('judulrest')`
- `resource('penilaianrest')`

### KBBI

- `GET /kbbiapi/search`
- `GET /kbbirest/index`

## Basis Data

Terdapat migrasi dan tabel untuk entitas utama:

- `users`
- `mahasiswa`
- `dosen`
- `daftar_sempro`
- `daftar_skripsi`
- `sempro`
- `det_sempro`
- `bimbingan`
- `dosbing`
- `ruangan`
- `periode`
- `judul_skripsi`


## Tips Pengembangan

- Pastikan `public/` digunakan sebagai document root.
- Gunakan `.env` untuk menyimpan konfigurasi sensitif.
- Periksa filter di `app/Config/Filters.php` jika menyesuaikan otentikasi.
- Tambahkan rute baru di `app/Config/Routes.php` untuk endpoint tambahan.

## Kontak dan Pengembangan

Dokumentasi ini berfungsi sebagai panduan dasar untuk memahami struktur proyek, menjalankan aplikasi, dan menggunakan endpoint API.
Jika Anda ingin memperluas proyek, tambahkan modul baru di `app/Controllers/`, model di `app/Models/`, dan tampilan di `app/Views/`.
