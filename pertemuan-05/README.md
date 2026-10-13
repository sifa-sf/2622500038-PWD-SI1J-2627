P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien 

Deskripsi 

Dokumentasi pengembangan halaman web pada P5, meliputi JavaScript, DOM, event listener, interaksi 
navigasi, dan validasi formulir sisi klien. 

Fitur dan Pengembangan:

[Penyiapan baseline P5]: [Menyalin index.html, style.css, dan img/foto-profil.jpg dari artefak P4 ke pertemuan-05/. Belum ada kode JavaScript yang ditambahkan.]
[JavaScript eksternal (E.3 dan E.4)]: [Membuat berkas script.js di pertemuan-05/ dan menghubungkannya ke index.html dengan menambahkan <script src="script.js"></script> sebelum tag penutup </body>. Kode pengujian sementara "console.log("script.js berhasil dijalankan.");", selanjutnya dihapus dari script.js setelah hubungan kedua berkas terverifikasi dan tidak ditemukan galat.]
[Penambahan id elemen untuk akses DOM (F.2)]: [Menambahkan id="navMenu" pada daftar navigasi dan id="contactForm" pada formulir di index.html agar dapat dipilih dengan `getElementById()`.]

Tambahkan entri setiap kali ada perkembangan penting pada proyek. 

Pengujian:

[Baseline P5]: [Membuka pertemuan-05/index.html di peramban dan memeriksa struktur berkas, tampilan halaman, CSS, dan gambar profil. Hasil aktual: seluruh berkas tersedia, halaman tampil sesuai P4, dan tidak ditemukan masalah.]
[Hubungan script.js dengan index.html (E.4)]: [Menyimpan perubahan, membuka pertemuan-05/index.html di peramban, membuka Browser DevTools (F12), lalu memilih tab Console. Hasil aktual: pesan "script.js berhasil dijalankan." muncul pada Console, sehingga hubungan kedua berkas berhasil diverifikasi. Setelah kode pengujian sementara dihapus dari script.js dan halaman dimuat ulang, tidak ditemukan galat baru pada Console. Galat yang ditemukan: tidak ada.]
[Pengujian ulang F.2]: [Menjalankan kembali `getElementById()` untuk navMenu dan contactForm. Hasil aktual: [elemen navMenu dan contactForm berhasil ditemukan, sedangkan navToggle menghasilkan null karena elemen dengan ID tersebut tidak ditemukan pada halaman. navToggle masih `null` karena tombol belum ditambahkan sesuai modul yang akan dilakukan pada (H.2).]]

Perbarui bagian ini setelah melakukan pengujian atau debugging yang relevan. 

Riwayat Pengembangan:

[Siapkan baseline P5 dari artefak P4]: [Menyiapkan dan memverifikasi baseline P5. Seluruh pemeriksaan berhasil.]
[Hubungkan JavaScript eksternal ke HTML]: [Menghubungkan script.js ke index.html dan menghapus kode pengujian sementara setelah verifikasi. Pesan pengujian muncul pada Console dan tidak ada galat baru.]

Catat perkembangan melalui commit Git yang bermakna. 
[Pesan commit]: [Ringkasan perubahan dan hasil pengujiannya.] 
[Pesan commit]: [Ringkasan perubahan dan hasil pengujiannya.]