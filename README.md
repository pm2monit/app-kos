# Aplikasi kos-kosan

## Aplikasi kelola kos-kosan?

dibuat oleh alham, aplikasi ini berjalan di php 7.4 atau di atas nya, 
untuk menjalankannya silahkan download xampp atau apache php mysql dll, lalu ikuti langkah berikut : 
1. buat database di localhost => http://localhost/phpmyadmin
2. buka file .env lalu set bagian berikut : 
    database.default.hostname = 127.0.0.1
    database.default.database = rumah_kos
    database.default.username = test2
    database.default.password = 1
    database.default.DBDriver = MySQLi
    sesuaikan dengan credential yang ada pada masing server / laptop
3. buka command prompt / terminal lalu ketik php spark migrate
4. masih di command prompt / terminal lalu ketik php spark serve