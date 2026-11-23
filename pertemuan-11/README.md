# Catatan Praktik P11: PHP Akhirnya Ngobrol dengan MySQL

**Sifa Sukma Fira** | NIM 2622500038 | SI1J | Pemrograman Web Dasar (IS205)

Di P10 saya sudah punya tabel dan datanya. Di P11 saya menghubungkan PHP ke MySQL pakai MySQLi supaya halaman bisa membaca data dari database (operasi **READ** saja). Hasilnya, bagian hasil kontak yang tadinya dari session sekarang tampil dari tabel `tbl_kontak_2622500038`.

## Cara menjalankan

Nyalakan Laragon (**Start All**), pastikan database `db_pwd_2622500038` ada (kalau belum, **Import** `db_pwd_2622500038.sql`), lalu buka `http://localhost/pwd/0344300002-PWD-TI1A-2627O/pertemuan-11/`.

**Persiapan.** Saya salin semua isi `pertemuan-10/` ke `pertemuan-11/` (folder P10 tidak diubah) dan cek aplikasinya tetap jalan. Apache dan MySQL hidup. Di phpMyAdmin, database dan tabel dari P10 masih ada lengkap dengan sembilan kolom dan datanya, jadi tidak perlu impor ulang.

**Membuat `koneksi.php`.** Saya buat file baru ini supaya urusan koneksi terpisah dari `index.php`. Isinya parameter koneksi (`localhost`, `root`, password kosong, `db_pwd_2622500038`), `mysqli_report(MYSQLI_REPORT_OFF)` supaya error saya periksa sendiri, lalu `mysqli_connect()`:

```php
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_pwd_2622500038";

mysqli_report(MYSQLI_REPORT_OFF);
$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
  die("Koneksi ke basis data gagal.");
}
```

**Menguji koneksi.** Saya bikin `uji_koneksi.php` sementara yang hanya memanggil `koneksi.php` dan menampilkan teks. Hasilnya muncul "Koneksi ke basis data berhasil." Lalu saya sengaja mengganti nama database jadi `db_tidak_tersedia`, dan muncul "Koneksi ke basis data gagal." sesuai harapan. Nama database saya kembalikan, dan `uji_koneksi.php` saya hapus.

**Memasang di `index.php`.** Di bagian atas saya matikan `session_start()` (karena sudah tidak pakai session) dan tambahkan `require_once("koneksi.php");`. Halaman dibuka tanpa pesan gagal, berarti integrasinya berhasil.

**Mengambil data.** Setelah koneksi dimuat, saya tulis kueri, jalankan, cek kegagalannya, lalu kumpulkan hasilnya ke larik:

```php
$sql = "SELECT * FROM tbl_kontak_2622500038";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
  die("Kueri SELECT gagal dijalankan.");
}

$dataKontak = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
  $dataKontak[] = $baris;
}
```

Untuk menguji, saya ganti sementara nama tabel jadi `tbl_tabel_tidak_tersedia` dan muncul "Kueri SELECT gagal dijalankan." lalu saya kembalikan. Saya juga pakai `var_dump($dataKontak)` sementara dan memastikan tiap baris punya indeks `id`, `nama`, `email`, `semester`, `tanggal`, `jenis_pesan`, `minat`, `prodi`, `pesan`. Setelah itu `var_dump()` saya hapus.

**Menampilkan di halaman.** Di dalam `<article id="hasilKontak">`, saya ganti penyajian session dengan `foreach` terhadap `$dataKontak`. Setiap nilai dibungkus `bersihkan()` (`htmlspecialchars()`) supaya keluaran HTML aman, `pesan` ditambah `nl2br()` agar baris barunya terlihat, dan `if (count($dataKontak) > 0)` menangani kondisi data kosong:

```php
<?php if (count($dataKontak) > 0): ?>
  <?php foreach ($dataKontak as $data): ?>
    <section>
      <p><strong>ID:</strong> <?= bersihkan($data["id"]); ?></p>
      <p><strong>Nama:</strong> <?= bersihkan($data["nama"]); ?></p>
      <!-- email, semester, tanggal, jenis_pesan, minat, prodi dengan pola yang sama -->
      <p><strong>Pesan:</strong> <?= nl2br(bersihkan($data["pesan"])); ?></p>
    </section>
  <?php endforeach; ?>
<?php else: ?>
  <p>Belum ada data kontak yang tersimpan.</p>
<?php endif; ?>
```

Saat tabel berisi data, semuanya tampil sesuai. Saya lalu mengosongkan tabel lewat phpMyAdmin (struktur tetap) dan halaman menampilkan "Belum ada data kontak yang tersimpan." Setelah itu data awal saya masukkan lagi.

**Ekspor.** Di phpMyAdmin saya pilih database, tab **Export**, **Quick**, **SQL**, lalu salin `db_pwd_2622500038.sql` ke `pertemuan-11/` (menimpa yang lama). Di VS Code ada `CREATE TABLE` dan `INSERT INTO` yang sesuai.

## Hasil akhir

- Koneksi lewat `koneksi.php` berhasil, dan kegagalannya sudah diuji.
- Kueri `SELECT` berhasil, kegagalannya juga ditangani.
- Data diambil dengan `mysqli_fetch_assoc()` ke `$dataKontak`, ditampilkan dengan `foreach` dan diamankan dengan `bersihkan()`.
- Kondisi data kosong menampilkan pesan yang sesuai.
- `uji_koneksi.php` dan `var_dump()` tidak ada di hasil akhir. Folder P10 tidak berubah.

## Commit yang saya buat

1. `menyalin artefak pertemuan-10 ke pertemuan-11 sebagai baseline`
2. `menyiapkan direktori dan lingkungan pengembangan pertemuan-11`
3. `memeriksa kesiapan basis data dan tabel kontak P11`
4. `membuat berkas koneksi PHP-MySQL P11`
5. `menentukan parameter koneksi basis data P11`
6. `mengatur pelaporan kesalahan MySQLi P11`
7. `mengimplementasikan koneksi PHP-MySQL menggunakan MySQLi`
8. `menguji koneksi dari PHP ke MySQL dengan file sementara bernama uji_koneksi.php`
9. `menguji penanganan kegagalan koneksi PHP-MySQL`
10. `menyiapkan pemuatan berkas koneksi pada P11`
11. `mengintegrasikan berkas koneksi pada index P11`
12. `memeriksa alur ketersediaan koneksi pada index P11`
13. `menguji integrasi koneksi PHP-MySQL pada index P11`
14. `menentukan kueri SELECT data kontak`
15. `menjalankan kueri SELECT menggunakan MySQLi`
16. `menambahkan pemeriksaan kegagalan kueri SELECT`
17. `mengambil hasil SELECT menggunakan mysqli_fetch_assoc`
18. `memeriksa hasil pengambilan data kontak`
19. `Menampilkan data kontak dari basis data`
20. `Menambahkan ekspor basis data praktikum`
