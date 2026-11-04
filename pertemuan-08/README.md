# UTS Pemrograman Web Dasar - Website Blog Pribadi

Website **Blog Pribadi** ("Ruang Cerita") untuk UTS Pemrograman Web Dasar (IS205).
Layout halaman sesuai soal: **Header**, **Navigasi** (kiri), **Konten** (kanan), **Footer**.

## Struktur Berkas
```
uts-pwd/
├── index.php        Beranda (gambar, deskripsi hobi, tabel jadwal)
├── profile.php      Profile (biodata + foto)
├── pendaftaran.php  Pendaftaran (formulir + validasi + session + PRG)
├── artikel.php      Menu tambahan: Artikel
├── style.css        Seluruh CSS (eksternal)
├── script.js        Hamburger menu + validasi formulir sisi klien
├── README.md
└── img/
    ├── logo.svg         Logo di header
    ├── hobi.jpg         Gambar di Beranda
    └── foto-profil.jpg  Foto di Profile (GANTI dengan foto sendiri)
```

## Cara Menjalankan
1. Salin folder ini ke `C:\laragon\www\` (mis. `C:\laragon\www\uts-pwd\`).
2. Buka Laragon, klik **Start All**.
3. Buka `http://localhost/uts-pwd/` di peramban.

> File `.php` harus dibuka lewat `localhost`, bukan dengan klik dua kali.

## Penerapan Modul
| Pertemuan | Materi | Penerapan |
|-----------|--------|-----------|
| P2 | HTML5 semantik | `header`, `nav`, `main`, `section`, `article`, `footer`, `ul/ol`, `img` (src, alt), `&copy;` |
| P3 | Formulir + CSS dasar | 6 tipe input (text, email, number, date, radio, checkbox), `select`, `textarea`, label-for-id, validasi HTML, selector elemen/class/ID |
| P4 | Layout responsif | `box-sizing`, Flexbox (navigasi), Grid (layout halaman), mobile-first, `@media (min-width: 768px)`, CSS eksternal |
| P5 | JavaScript | DOM, event listener, hamburger menu (`classList.toggle`), validasi form sisi klien + pesan umpan balik |
| P6 | PHP dasar | variabel, konstanta, if-elseif-else, ternary, switch, for, `<?= ?>` |
| P7 | Formulir PHP | POST, `$_POST`, validasi sisi peladen, `htmlspecialchars()`, session, Post-Redirect-Get |

## Data yang Perlu Diganti
- Nama lengkap: konstanta `NAMA_LENGKAP` di bagian atas **tiap file `.php`** (4 file).
- Foto: ganti `img/foto-profil.jpg` dan `img/hobi.jpg` dengan foto sendiri.
- Biodata, hobi, dan motto: variabel di bagian atas `profile.php` dan isi `index.php`.

## Pengujian (isi setelah dijalankan sendiri)
- [ ] Layout desktop: header, navigasi kiri, konten kanan, footer
- [ ] Layout HP (lebar < 768px): navigasi lewat tombol hamburger
- [ ] Menu Beranda, Profile, Pendaftaran, Artikel dapat dibuka
- [ ] Validasi JavaScript menolak isian yang salah
- [ ] Validasi PHP menolak isian yang salah (JavaScript dimatikan)
- [ ] Setelah data valid dikirim, muat ulang halaman tidak mengirim ulang formulir
