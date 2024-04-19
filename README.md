# Vehicle Manager

Aplikasi ini merupakan sebuah platform pemesanan kendaraan yang di gunakan untuk menunjang perusaaahn dalam proses pemesanan kendaraan. Pada aplikasi ini menggunakan 3 roles yang terdiri dari Admin, Manager, dan Staff.

## Spesifikasi Aplikasi

-   PHP 8.1.10
-   Laravel 10
-   MySQL Database

## Fitur Aplikasi

-   Pemesanan Kendaraan: Admin dapat membuat pemesanan kendaraan yang include dengan (memilih driver, memilih kendaraan, serta memilih pihak yang akan melakukan persetujuan (dalam hal ini adalah manager dan staff))
-   Persetujuan Bertinkat: Persetujuan pemesanan dilakukan secara bertingkat oleh Staff dan Manager.
-   Dashboard dan Grafik: Berisi informasi yang memuat grafik pemakaian kendaraan.

### Role Aplikasi

1. Admin
2. Manager
3. Staff

#### Admin

-   Email:admin@gmail.com
-   Username:Fadhil Alkautsar
-   Password:password

#### Manager

-   Email:staff@gmail.com
-   Name:Firman Dandi
-   Password:password

#### Staff

-   Email:handayani.cecep@example.com
-   Name:Rizky Fauzi
-   Password:password

Note: Semua akun passwordnya sama yaitu "password"

## Cara Menggunakan

### 1. Admin

-   Masuk ke aplikasi menggunakan akun Admin.
-   Buat pemesanan kendaraan dengan mengisi form yang telah di sediakan.
-   Simpan pemesanan.

### 2. Supervisor

-   Apabila sudah terdapat pemesanan kendaraan, login menggunakan akun Manager.
-   Masuk pada halman Approval untuk cek status pemesanan. Anda bisa menyetujui dan menolak pesanan.

### 3. Employee

-   Masuk ke aplikasi sebagai Staff.
-   Masuk pada halman Approval untuk cek status pemesanan. Anda bisa menyetujui dan menolak pesanan.

### 4. Dashboard dan Grafik

-   Halaman dashboard yang menampilkan informasi mengenai data kendaraan, driver, dan data booking kendaraan.
-   Grafik dapat menampilkan data kendaraan yang terpakai.

## Instalasi

1. Clone repositori ini ke direktori lokal Anda.
2. Salin file `.env.example` menjadi `.env` dan atur konfigurasi database.
3. Jalankan perintah `composer install` untuk menginstal dependensi.
4. Jalankan perintah `php artisan key:generate` untuk menghasilkan kunci aplikasi.
5. Jalankan migrasi database dengan perintah `php artisan migrate`.
6. Jalankan perintah `php artisan db:seed` untuk memasukkan akun kedalam aplikasi.
7. Jalankan server dengan perintah `php artisan serve`.
