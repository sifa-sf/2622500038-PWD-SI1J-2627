# README.md Pertemuan 10

**Sifa Sukma Fira** | NIM 02622500038 | TI1A | Pemrograman Web Dasar (IS205)

Di P9 saya sudah punya formulir Kontak, tapi datanya belum disimpan ke mana-mana. Di P10 saya menyiapkan "rumahnya": satu tabel MySQL. Belum ada PHP-MySQL di sini, hanya analisis data, membuat tabel di phpMyAdmin, mengisi data, dan ekspor ke file `.sql`.

## Cara menjalankan

Nyalakan Laragon (**Start All**), buka `http://localhost/pwd/2622500038-PWD-TI1A-2627O/pertemuan-10/`. Untuk database, buka `http://localhost/phpmyadmin/` (user `root`, password kosong), lalu **Import** `db_pwd_2622500038.sql` kalau belum ada.

**Persiapan.** Saya salin semua berkas P9 ke `pertemuan-10/` (folder P9 tidak saya ubah), lalu cek aplikasinya masih jalan. Setelah itu saya nyalakan Laragon dan memastikan Apache dan MySQL hidup, lalu login ke phpMyAdmin pakai `root`. Semuanya lancar.

**Analisis data.** Saya buka `index.php` dan lihat atribut `name` di formulir Kontak. Ada delapan data: `nama`, `email`, `semester`, `tanggal`, `jenis_pesan`, `minat[]`, `prodi`, dan `pesan`. Info profil (NIM, nama) tidak ikut disimpan karena bukan data formulir. Khusus checkbox `minat[]` yang bisa dipilih dua-duanya, saya simpan sebagai satu teks dipisah koma, misalnya `HTML, CSS`. Ini penyederhanaan untuk belajar, bukan normalisasi yang ideal.

**Rancangan tabel.** Database saya beri nama `db_pwd_2622500038` dan tabelnya `tbl_kontak_2622500038`. Ditambah kolom `id` sebagai primary key auto increment, totalnya sembilan kolom:

| Kolom | Tipe | Catatan |
|---|---|---|
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `nama` | VARCHAR(50) | |
| `email` | VARCHAR(255) | |
| `semester` | TINYINT | |
| `tanggal` | DATE | |
| `jenis_pesan` | VARCHAR(20) | pertanyaan/saran |
| `minat` | VARCHAR(50) | satu atau beberapa pilihan |
| `prodi` | VARCHAR(2) | `SI`/`TI` |
| `pesan` | VARCHAR(300) | sesuai batas formulir |

**Membuat di phpMyAdmin.** Lewat menu **Databases** saya buat `db_pwd_2622500038`, lalu buat tabel `tbl_kontak_2622500038` dengan 9 kolom sesuai rancangan. Di tab **Structure** saya cek ulang: semua kolom, tipe, dan panjangnya benar, `id` sudah PRIMARY dan AUTO_INCREMENT. Ternyata semua klik itu setara dengan SQL berikut (DDL):

```sql
CREATE DATABASE db_pwd_2622500038;
USE db_pwd_2622500038;

CREATE TABLE tbl_kontak_2622500038 (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50),
    email VARCHAR(255),
    semester TINYINT,
    tanggal DATE,
    jenis_pesan VARCHAR(20),
    minat VARCHAR(50),
    prodi VARCHAR(2),
    pesan VARCHAR(300)
);
```

**Mengisi data.** Lewat tab **Insert**, saya isi delapan kolom dan membiarkan `id` kosong supaya otomatis. Bisa juga pakai SQL (DML):

```sql
INSERT INTO tbl_kontak_2622500038
    (nama, email, semester, tanggal, jenis_pesan, minat, prodi, pesan)
VALUES
    ('Andi', 'andi@example.com', 2, '2026-11-15',
     'pertanyaan', 'HTML, CSS', 'TI', 'Saya ingin belajar pemrograman web.');
```

Di tab **Browse**, datanya tampil sesuai, `id` terbentuk sendiri, dan tidak ada yang perlu diperbaiki.

**Ekspor.** Saya pilih database, buka tab **Export**, metode **Quick**, format **SQL**, lalu simpan sebagai `db_pwd_2622500038.sql` dan pindahkan ke `pertemuan-10/`. Saat dibuka di VS Code, ada `CREATE TABLE` dan `INSERT INTO` yang cocok dengan tabel dan data tadi.

## Hasil akhir

- Delapan data formulir dianalisis, tabel punya sembilan kolom dengan `id` sebagai primary key.
- Database dan tabel terbuka di phpMyAdmin, data awal tersimpan dan tampil di Browse.
- `db_pwd_2622500038.sql` memuat struktur dan data. Folder P9 tidak berubah.

## Commit yang saya buat

1. `menyalin artefak pertemuan-09 ke pertemuan-10 sebagai baseline`
2. `menyiapkan direktori dan lingkungan pengembangan pertemuan-10`
3. `memeriksa kesiapan phpMyAdmin dan repositori pertemuan-10`
4. `mengidentifikasi kebutuhan data formulir kontak P10`
5. `menentukan data formulir yang akan disimpan ke basis data`
6. `menentukan representasi data pilihan minat`
7. `menentukan nama basis data dan tabel P10`
8. `merancang atribut dan tipe data tabel kontak`
9. `menentukan primary key dan auto increment tabel kontak`
10. `memeriksa rancangan akhir struktur tabel kontak`
11. `memasukkan data awal ke tabel kontak`
12. `mempelajari perintah SQL insert`
13. `memeriksa data awal pada tabel kontak`
14. `memeriksa dan memperbaiki data awal tabel kontak`
15. `menentukan pengaturan ekspor basis data`
16. `mengekspor basis data ke berkas SQL`
17. `memeriksa kelengkapan berkas ekspor SQL`
