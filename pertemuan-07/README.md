# Pertemuan 7 - Pemrosesan Formulir dengan PHP

Nama: Sifa Sukma Fira 
NIM: 2622500038 
Mata Kuliah: Pemrograman Web Dasar 

## Deskripsi

Proyek ini adalah pengembangan halaman Profil Mahasiswa dari Pertemuan 6. Formulir Kontak yang sebelumnya hanya diperiksa di sisi peramban kini dikirim ke PHP, divalidasi di sisi peladen, ditampilkan kembali dengan aman, dan dikelola dengan session serta pola Post-Redirect-Get (PRG).

Cara menjalankan: buka Laragon, klik **Start All**, lalu akses `http://localhost/2622500038-PWD-SI1J-2627/pertemuan-07/`. Demonstrasi GET ada di `indexGet.php` pada folder yang sama.

## Fitur dan Pengembangan

- **Pengiriman GET dan POST.** `indexGet.php` dipertahankan sebagai demonstrasi GET (data terlihat di URL), sedangkan `index.php` memakai POST karena datanya diproses oleh peladen.
- **Pembacaan semua input.** PHP membaca nama, email, semester, tanggal, jenis pesan, program studi, dan pesan dengan `$_POST`. Checkbox diubah menjadi `minat[]` agar beberapa pilihan diterima sebagai larik.
- **Normalisasi data.** Setiap input dirapikan dengan `trim((string) ...)` sebelum diperiksa, sehingga spasi di awal dan akhir tidak ikut terhitung.
- **Validasi sisi peladen.** PHP memeriksa kelengkapan, format email dan semester (1 sampai 14) dengan `filter_var()`, serta nilai pilihan dengan `in_array()`. Ini perlu karena validasi JavaScript bisa dilewati.
- **Keluaran aman.** Semua data pengguna ditampilkan dengan `htmlspecialchars()` agar teks seperti `<b>` tidak dijalankan sebagai HTML.
- **Session dan PRG.** Hasil POST disimpan ke `$_SESSION`, lalu halaman dialihkan dengan `header('Location: index.php')`. Dengan begitu, memuat ulang halaman tidak mengirim ulang formulir. Pesan kesalahan dihapus setelah tampil satu kali.

## Pengujian

Pengujian dilakukan di localhost melalui Laragon.

- **GET.** Parameter `?nama=...` tampil di halaman dan tanpa parameter tidak muncul peringatan. Pengiriman lewat tombol menampilkan parameter di URL. Ini membuktikan `$_GET` bekerja.
- **POST.** Data terkirim tanpa tampil di URL, sehingga formulir utama benar-benar memakai request body.
- **Checkbox.** Memilih HTML, CSS, salah satu, atau tidak sama sekali divalidasi dengan benar di kedua halaman.
- **Validasi PHP.** Dengan `script.js` dinonaktifkan sementara, formulir kosong, email tidak valid, dan minat kosong menampilkan pesan kesalahan dari PHP.
- **Keamanan keluaran.** Pesan `<b>Mahasiswa</b>` tampil apa adanya, tidak menjadi huruf tebal.
- **PRG.** Setelah Kirim lalu reload (`CTRL+SHIFT+R`), data tetap tampil dan tidak muncul dialog pengiriman ulang formulir.

Galat yang ditemui dan diperbaiki:
- Pesan `404 favicon.ico` karena peramban meminta ikon tab yang tidak ada. Diabaikan.
- Pesan dari JavaScript muncul menggantikan pesan PHP karena `script.js` masih aktif. Dinonaktifkan sementara saat menguji PHP.
- `Parse error` karena karakter `…` dari modul ikut tertempel dan tanda `{` hilang. Diperbaiki.
- Opsi Bisnis Digital ditolak karena nilai `BD` belum masuk daftar `in_array`. Ditambahkan.

Catatan: data hasil tetap tampil setelah reload karena hanya `pesanKesalahan` yang dihapus dari session, dan kolom formulir belum diisi ulang dari session. Perilaku ini sesuai kode modul.

## Riwayat Pengembangan

Setiap tahap yang sudah diuji direkam dengan Git:

1. `menyalin artefak pertemuan-06 ke pertemuan-07 untuk digunakan sebagai baseline`: titik awal pengembangan.
2. `menguji ... pertemuan-07/ dengan hasil sama dengan pertemuan-06/`: memastikan baseline berjalan di localhost.
3. `mempelajari penggunaan parameter GET`: membaca `$_GET` lewat URL.
4. `mempraktikkan pengiriman formulir GET`: formulir terkirim dengan `contactForm.submit()`.
5. `menyimpan demonstrasi formulir GET`: membuat `indexGet.php` sebagai pembanding.
6. `mengubah formulir utama menjadi POST`: mengganti `method` menjadi `post`.
7. `menerima data formulir menggunakan POST`: membaca `$_POST`.
8. `menyesuaikan pembacaan input dan validasi formulir`: `minat[]` dan selector JavaScript.
9. `menampilkan pesan kesalahan validasi PHP`: validasi sisi peladen dan tampilan pesan error.
10. `mengamankan keluaran data formulir`: `htmlspecialchars()` pada data yang ditampilkan.
11. `menerapkan session dan pola PRG`: session dan redirect.
12. `melengkapi dokumentasi dan pengujian akhir P7`: README dan pengujian akhir.