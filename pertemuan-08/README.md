# UTS Pemrograman Web Dasar - Website "Kelekak Bangka"

Nama: Sifa Sukma Fira 
NIM: 2622500038 
Kelas: SI1J 
Mata Kuliah: Pemrograman Web Dasar (IS205) 
Program Studi: Sistem Informasi

## Deskripsi

**Kelekak Bangka** adalah website pengenalan komunitas Kelekak Bangka, yaitu wadah generasi muda untuk mengenal dan melestarikan budaya, tradisi, serta kearifan lokal Bangka. Website ini dibuat untuk UTS Pemrograman Web Dasar (IS205) dan memiliki empat halaman: Beranda, Profile, Pendaftaran, dan Artikel.

Layout semua halaman sesuai soal: **Header** (logo dan nama website), **Navigasi** di kiri, **Konten** di kanan, dan **Footer**. Di layar kecil, navigasi dibuka lewat tombol hamburger.

## Struktur Berkas

```
uts-pwd/
├── index.php        Beranda (apa itu Kelekak, kegiatan, tabel agenda)
├── profile.php      Profile (foto dan biodata)
├── pendaftaran.php  Pendaftaran (formulir, validasi, session, PRG)
├── artikel.php      Artikel (menu tambahan)
├── style.css        Seluruh CSS (eksternal)
├── script.js        Hamburger menu dan validasi formulir sisi klien
├── README.md
└── img/
    ├── logo-KelekakBangka.jpeg   Logo di header
    ├── foto-mentilin.jpeg        Gambar di Beranda
    └── foto-profil.jpeg          Foto di Profile
```

## Fitur dan Pengembangan

**Beranda (`index.php`)**
Berjudul "Apa Itu Kelekak dan kelekak Bangka?". Berisi foto Mentilin (satwa terlindungi khas Bangka) dengan keterangan, penjelasan arti Kelekak sebagai kebun campuran tradisional dan Kelekak Bangka sebagai komunitas, daftar Kegiatan dan Program Organisasi (Camping dan Edutrip, menjelajahi flora fauna, menjelajahi sungai Amazon Bangka, ekspedisi Geopark Bukit Nenek desa Gudang), serta tabel Agenda Kegiatan Kelekak Bangka dari Senin sampai Minggu.

**Profile (`profile.php`)**
Menampilkan foto profil, tabel biodata (nama, NIM, kelas, program studi, perguruan tinggi, semester, status, hobi, motto), bagian Tentang Saya, dan daftar Target Belajar. Data berasal dari variabel dan konstanta PHP. Keterangan semester dan nama program studi ditentukan dengan `if-elseif-else`, operator ternary, dan `switch`. Target Belajar dibuat dengan perulangan `for`.

**Pendaftaran (`pendaftaran.php`)**
Formulir "Pendaftaran Anggota Komunitas" dengan kolom:
- Nama lengkap, email, semester, dan tanggal pendaftaran.
- Jenis keanggotaan (radio): Anggota Inti atau Volunteer.
- Bidang yang diminati (checkbox `minat[]`): Kebudayaan, Guide, Humas.
- Program studi (select): Sistem Informasi, Teknik Informatika, Bisnis Digital.
- Alasan bergabung (textarea, maksimal 300 karakter).

Alur pengirimannya:
- **Validasi sisi klien (`script.js`):** diperiksa berurutan dan pesan merah muncul di bawah tombol. Jika semua lolos, formulir dikirim dengan `submit()`.
- **Validasi sisi peladen (PHP):** data dirapikan dengan `trim()`, lalu diperiksa kelengkapan, format email, semester 1 sampai 14, dan nilai pilihan dengan `in_array()`. Ini perlu karena validasi JavaScript bisa dilewati.
- **Keluaran aman:** semua data yang ditampilkan memakai `htmlspecialchars()`.
- **Session dan PRG:** hasil POST disimpan ke session, lalu halaman dialihkan ke `pendaftaran.php`, sehingga memuat ulang halaman tidak mengirim ulang formulir.
- **Setelah dikirim:** jika tidak valid, pesan merah muncul dan isian ditampilkan kembali. Jika valid, muncul pesan "Pendaftaran berhasil dikirim.", formulir dikosongkan (tanggal diisi hari ini), dan bagian "Data yang Diterima Peladen" tampil.

**Artikel (`artikel.php`)**
Tiga artikel: "Mengenal Kelekak Bangka: Warisan Alam dan Budaya Masyarakat Melayu", "Menjaga Kelekak, Menjaga Warisan untuk Generasi Mendatang", dan "Menjelajahi Keindahan Alam dan Sungai di Bangka".

**Tampilan dan interaksi**
CSS ditulis mobile-first: satu kolom di layar kecil, lalu pada lebar minimal 768px menjadi grid dengan kolom navigasi 230px di kiri dan konten di kanan. Menu navigasi memakai Flexbox. Hamburger menu memakai `classList.toggle` dan memperbarui `aria-expanded` serta `aria-label`. Kode validasi di `script.js` hanya berjalan jika formulir ditemukan, sehingga aman dipakai di semua halaman. Footer berformat `©NIM_NAMA_KELAS_ UTS Pemrograman Web Dasar.`

## Penerapan Modul

- **P2, HTML5 semantik:** `header`, `nav`, `main`, `section`, `article`, `figure`, `footer`, daftar, gambar dengan `alt`, tabel, dan `&copy;`.
- **P3, formulir dan CSS dasar:** tipe input text, email, number, date, radio, dan checkbox, serta `select`, `textarea`, `label for`, `fieldset`, dan validasi HTML.
- **P4, layout responsif:** `box-sizing`, Flexbox, Grid, mobile-first, dan `@media (min-width: 768px)`.
- **P5, JavaScript:** DOM, event listener, hamburger menu, dan validasi formulir sisi klien.
- **P6, PHP dasar:** variabel, konstanta, `if-elseif-else`, ternary, `switch`, `for`, dan `<?= ?>`.
- **P7, formulir PHP:** POST, validasi sisi peladen, `htmlspecialchars()`, session, dan Post-Redirect-Get.

## Pengujian

Pengujian dilakukan di localhost lewat Laragon. Centang hanya yang sudah benar-benar dijalankan.

- [ ] Layout desktop: header di atas, navigasi kiri, konten kanan, footer di bawah.
- [ ] Layout HP (lebar di bawah 768px): navigasi lewat tombol hamburger.
- [ ] Menu Beranda, Profile, Pendaftaran, dan Artikel dapat dibuka dan semua gambar tampil.
- [ ] Validasi JavaScript menolak isian yang salah dan menampilkan pesan merah.
- [ ] Validasi PHP menolak isian yang salah (JavaScript dimatikan sementara).
- [ ] Data valid berhasil dikirim: muncul pesan sukses dan "Data yang Diterima Peladen".
- [ ] Setelah data valid dikirim, memuat ulang halaman tidak mengirim ulang formulir.
- [ ] Teks seperti `<b>Contoh</b>` pada alasan tampil apa adanya, bukan huruf tebal.

## Riwayat Pengembangan

Website dikembangkan dari template blog pribadi "Ruang Cerita", lalu diubah menjadi website komunitas Kelekak Bangka:

1. Mengganti identitas website menjadi "Kelekak Bangka" dengan tagline "Mengenal Kelekak Bangka", serta logo `logo-KelekakBangka.jpeg`.
2. Mengubah isi Beranda menjadi pengenalan Kelekak, foto Mentilin, daftar program, dan agenda kegiatan.
3. Mengisi Profile dengan data diri, hobi, dan motto pribadi, serta mengganti foto menjadi `foto-profil.jpeg`.
4. Mengubah formulir Pendaftaran menjadi pendaftaran anggota komunitas: jenis keanggotaan (Anggota Inti, Volunteer), bidang minat (Kebudayaan, Guide, Humas), dan tambahan program studi Bisnis Digital.
5. Mengganti tiga artikel dengan topik Kelekak dan alam Bangka.

## Galat
- Ketika klik daftar yang muncul "Jenis keanggotaan tidak valid. Pilihan topik tidak valid."