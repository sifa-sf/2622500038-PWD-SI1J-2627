<?php
// Konfigurasi koneksi ke basis data MySQL.
$host = "localhost";
$user = "root";
$password = "";
$database = "db_pwd_2622500038";

// Membuat koneksi PHP dengan MySQL menggunakan MySQLi.
mysqli_report(MYSQLI_REPORT_OFF);
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa keberhasilan koneksi.
if (!$koneksi) {
    die("Koneksi ke basis data gagal.");
}