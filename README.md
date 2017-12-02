# Toko Buku
Aplikasi toko buku yang dibuat menggunakan Laravel untuk penilaian sertifikasi BPPTIK Cikarang.

## Instalasi
* Buka terminal linux
* Jalankan perintah berikut untuk mendownload project
```
$ git clone https://github.com/skadevz/bpptik-pelatihan-aplikasi-penjualan.git
```
* Masuk kedalam direktori project melalui terminal
* Jalankan perintah berikut untuk persiapan awal, dan mendownload _package_ yang diperlukan
```
$ cp .env.example .env
$ composer install
$ php artisan key:generate
```
* Buka file .env menggunakan _text editor_, sesuaikan pengaturan database, dengan pengaturan yang dimiliki
* Kemudian jalankan perintah berikut untuk melakukan _migrate_ database
```
$ php artisan migrate
$ php artisan db:seed
```
* Terakhir, jalankan perintah berikut untuk menjalankan project.
```
$ php artisan serv
```

## DEFAULT LOGIN APLIKASI
- Username: ichsan
- Password: ichsan
