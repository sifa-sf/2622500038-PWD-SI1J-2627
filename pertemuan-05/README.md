P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien 

Deskripsi 

Dokumentasi pengembangan halaman web pada P5, meliputi JavaScript, DOM, event listener, interaksi 
navigasi, dan validasi formulir sisi klien. 

#Fitur dan Pengembangan:

-  baseline P5: [Menyalin `index.html`, `style.css`, dan `img/foto-profil.jpg` dari artefak P4 ke pertemuan-05/. Belum ada kode JavaScript yang ditambahkan.]

- JavaScript eksternal (E.3 dan E.4): [Membuat berkas `script.js` di pertemuan-05/ dan menghubungkannya ke `index.html` dengan menambahkan <script src="script.js"></script> sebelum tag penutup </body>. Kode pengujian sementara "console.log(script.js berhasil dijalankan.);", selanjutnya dihapus dari `script.js` setelah hubungan kedua berkas terverifikasi dan tidak ditemukan galat.]

- Penambahan id elemen untuk akses DOM (F.2): [Menambahkan `id="navMenu"` pada daftar navigasi dan `id="contactForm" `pada formulir di index.html agar dapat dipilih dengan `getElementById()`.]

- Elemen umpan balik: [menambahkan `<p id="formFeedback"></p>` pada `index.html` (di bawah tombol Kirim dan Batal) sebagai tempat pesan hasil validasi. Teksnya diubah melalui JavaScript dengan `textContent`.]

- Tombol navigasi: [menambahkan `<button id="navToggle">` (simbol ☰) pada `<header>` di `index.html`, memberi `id="navMenu"` pada `<ul>` menu, serta menambahkan aturan CSS `.header-top`, `.nav-toggle`, `#navMenu`, dan `#navMenu.nav-open` pada `style.css`. Pada media query `min-width: 768px`, menu tampil mendatar dan tombol disembunyikan. Pada tahap ini tombol baru berupa elemen HTML, perilaku buka/tutup menu belum ditambahkan.]

- Event listener navigasi: [memasang `addEventListener` pada `navToggle` untuk menangani klik tombol navigasi.]

- Event submit: [memasang `contactForm.addEventListener` pada `script.js` sebagai pemicu proses validasi formulir. Di dalam fungsi ditambahkan `event.preventDefault()` agar peramban tidak mengirim formulir dan memuat ulang halaman.]

- Event input: [Memasang event listener `input` pada `contactForm` di `script.js`. Saat nilai kolom formulir berubah, `formFeedback.textContent` dikosongkan sehingga pesan umpan balik sebelumnya hilang.]

- Event reset: [Memasang event listener `reset` pada `contactForm` di `script.js`. Saat tombol "Batal" ditekan, `formFeedback.textContent` dikosongkan sehingga pesan umpan balik sebelumnya dihapus.]

- Event object: [Menambahkan parameter `event` pada fungsi penangan event `submit` di `script.js` untuk menerima objek event dari peramban. Baris `console.log(event)` digunakan sementara untuk pengamatan dan dihapus setelah pengujian.]

- Pencegahan tindakan bawaan submit: [Menambahkan `event.preventDefault()` pada baris pertama fungsi penangan event `submit` di `script.js`. Dengan ini, peramban tidak menjalankan tindakan bawaan pengiriman formulir (memuat ulang halaman), sehingga proses validasi dapat dilakukan oleh JavaScript pada halaman yang sama. Validasi yang akan dibuat pada tahap berikutnya hanya berlangsung di sisi klien dan tidak mengirim atau menyimpan data ke server.]

- Hamburger menu pada tampilan responsif: [Menggabungkan HTML (`navToggle`, `navMenu`), CSS (menu tersembunyi di mobile, tampil sebagai kolom saat class `nav-open`), dan JavaScript (`classList.toggle("nav-open")`, `aria-expanded`, `aria-label`) dalam satu event handler `click`.]

- Pengambilan nilai input: [Memilih elemen input dengan `getElementById()` dan membaca nilainya di listener `submit` memakai `value.trim()`, `Number()`, `querySelector()`, dan `querySelectorAll()` dengan `:checked`.]

#Pengujian:

- Baseline P5: [Membuka pertemuan-05/index.html di peramban dan memeriksa struktur berkas, tampilan halaman, CSS, dan gambar profil. Hasil aktual: seluruh berkas tersedia, halaman tampil sesuai P4, dan tidak ditemukan masalah.]

- Hubungan script.js dengan index.html (E.4): [Menyimpan perubahan, membuka pertemuan-05/index.html di peramban, membuka Browser DevTools (F12), lalu memilih tab `Console`. Hasil aktual: pesan `"script.js berhasil dijalankan."` muncul pada Console, sehingga hubungan kedua berkas berhasil diverifikasi. Setelah kode pengujian sementara dihapus dari `script.js` dan halaman dimuat ulang, tidak ditemukan galat baru pada Console. Galat yang ditemukan: tidak ada.]

- Pengujian ulang F.2: [Menjalankan kembali `getElementById()` untuk navMenu dan contactForm. Hasil aktual: [elemen navMenu dan contactForm berhasil ditemukan, sedangkan navToggle menghasilkan `null` karena elemen dengan ID tersebut tidak ditemukan pada halaman. navToggle masih `null` karena tombol belum ditambahkan sesuai modul yang akan dilakukan pada (H.2).]]

- textContent pada formFeedback (via Console):[menjalankan `document.getElementById("formFeedback").textContent = "Pesan pengujian DOM.";` awalnya teks tidak muncul karena elemen `formFeedback` belum ada di `index.html`, lalu saya menambahkan `<p id="formFeedback"></p>` pada `index.html`. Hasil aktual: teks muncul dan hilang sesuai harapan, tidak ada galat di Console. Status: Berhasil.]

- Tombol navigasi (tampilan): [membuka `index.html` pada peramban, atur lebar 400px lewat mode perangkat DevTools, lalu atur lebar 1024px.  awalnya tombol tidak tampil karena `index.html` dan `style.css` belum memiliki tombol `navToggle` maupun aturan CSS-nya; diperbaiki dengan menambahkannya.  Hasil aktual (percobaan pertama): Console menampilkan Uncaught SyntaxError: Identifier 'navMenu' has already been declared, karena const navMenu diketik ulang. Perbaikan: perintah dijalankan tanpa const. Hasil aktual (setelah perbaikan): awalnya menu tersembunyi dan hanya tombol hamburger (☰) yang tampil. `contains` awal bernilai `false`. Setelah `toggle` (hasil `true`), menu Beranda, Tentang, Kontak muncul di bawah judul, dan `contains` berikutnya bernilai `true`. Setelah halaman dimuat ulang, menu tersembunyi kembali. Tidak ada galat lain di Console. Status: Berhasil]

- addEventListener pada navToggle: [enambahkan kode sementara `navToggle.addEventListener` yang menampilkan pesan di Console, lalu mengklik tombol navigasi (☰) pada lebar 400px dengan Console terbuka. pesan "Tombol navigasi diklik." muncul di Console setiap tombol diklik. Hasil aktual: pesan "Tombol navigasi diklik." muncul di Console setiap tombol diklik. Tidak ada galat. Status: Berhasil]

- Event submit pada contactForm: [memasang listener `submit` yang menampilkan pesan "Form dikirim." di Console, membuka tab Console, mengisi formulir, lalu menekan tombol Kirim. pesan "Form dikirim." muncul di Console. Hasil aktual (percobaan pertama): pesan tidak muncul di Console Penyebabnya tanpa `event.preventDefault()`, formulir dikirim secara bawaan sehingga halaman dimuat ulang dan isi Console terhapus. Perbaikan dengan menambahkan `event.preventDefault();` sebagai baris pertama di dalam fungsi event `submit`. Hasil aktual (setelah perbaikan): pesan "Form dikirim." muncul di Console dan halaman tidak dimuat ulang. Tidak ada galat lain. Status: Berhasil]

- Event input: [Membuka `pertemuan-05/index.html`, membuka tab Console pada Browser DevTools, lalu menampilkan pesan uji dengan `document.getElementById("formFeedback").textContent = "Uji pesan";`. Setelah itu, mengisi atau mengubah kolom pada formulir. Hasil aktual: pesan "Uji pesan" hilang setelah kolom formulir diisi, sehingga event input berhasil terdeteksi.]

- Event reset: [Membuka `pertemuan-05/index.html`, mengisi beberapa kolom formulir, lalu menampilkan pesan uji melalui Console dengan `document.getElementById("formFeedback").textContent = "Uji pesan";`. Setelah itu, menekan tombol "Batal". Hasil aktual: isian formulir kembali kosong dan pesan "Uji pesan" hilang, sehingga event reset berhasil ditangani. Galat: tidak ada.]

- Event object: [Membuka `pertemuan-05/index.html`, membuka tab Console pada Browser DevTools dengan opsi Keep log aktif, mengisi formulir, lalu menekan tombol "Kirim" dengan `console.log(event)` pada listener submit. Hasil aktual: objek `SubmitEvent` tampil pada Console dengan `type` bernilai `submit` dan `target` berupa `form#contactForm`, sehingga parameter `event` terbukti menerima objek event dari peramban. Galat: tidak ada.]

- Pencegahan tindakan bawaan submit: [Menyimpan `script.js`, memuat ulang halaman, mengisi formulir, lalu menekan tombol "Kirim". Hasil aktual: halaman tidak dimuat ulang, isian formulir tetap ada, URL tidak berubah, dan Console menampilkan "Form dikirim.", sehingga `event.preventDefault()` berhasil mencegah tindakan bawaan submit. Galat: tidak ada. Pengujian dengan pesan validasi (data tidak valid dan valid) akan dicatat setelah logika validasi dibuat.]

- Hamburger menu: [Mengatur viewport ke ukuran layar kecil, lalu mengklik tombol hamburger dua kali. Hasil aktual: klik pertama menampilkan menu, `aria-expanded="true"`, dan `aria-label="Tutup navigasi"`; klik kedua menyembunyikan menu, `aria-expanded="false"`, dan `aria-label="Buka navigasi"`. Galat: tidak ada.]

- Pengambilan nilai input: [Mengisi formulir lalu menekan "Kirim" dengan `console.log` sementara. Hasil aktual: semua nilai terbaca sesuai isian, `topikDipilih.length` sesuai jumlah checkbox, dan `jenisPesan` bernilai `null` jika radio tidak dipilih. Galat: tidak ada.]
- Pemeriksaan kelengkapan data: [mengisi data dasar yang valid, lalu mengosongkan satu kolom wajib secara bergantian (jenis pesan, topik, program studi, pesan, tanggal, semester) dan menekan Kirim. Hasil aktual: semua pesan muncul sesuai harapan, misalnya "Pilih minimal satu topik yang diminati." saat topik belum dipilih. Tidak ada galat di Console.]

- Pemeriksaan format email: [mengisi nama valid, lalu memasukkan tiga bentuk email dan menekan Kirim. Email tanpa @: diharapkan "Masukkan alamat email yang valid.", Email tanpa titik setelah @: diharapkan pesan yang sama, Email `mahasiswa@atmaluhur.ac.id`: diharapkan lolos pemeriksaan email. semuanya sudah sesuai dengan yang diharapkan.]

#Riwayat Pengembangan:

- Siapkan baseline P5 dari artefak P4: [Menyiapkan dan memverifikasi baseline P5. Seluruh pemeriksaan berhasil.]
[Hubungkan JavaScript eksternal ke HTML]: [Menghubungkan script.js ke index.html dan menghapus kode pengujian sementara setelah verifikasi. Pesan pengujian muncul pada Console dan tidak ada galat baru.]

- Menambahkan id navMenu dan contactForm untuk akses DOM: [ditambakan agar saat consule dapat dipilih oleh `getElementById()`.]

- Menambahkan elemen formFeedback untuk umpan balik validasi: [menambahkan `<p id="formFeedback"></p>` pada `index.html`. Setelah perbaikan, pengujian `textContent` via Console berhasil dan tidak ada galat baru.]

- Menambahkan tombol navigasi: [menambahkan tombol `navToggle`, `id="navMenu"`, dan CSS pendukung. Tampilan diuji pada lebar 400px dan 1024px.]

- Tambahkan event listener pada tombol navigasi: [memasang `navToggle.addEventListener("click", ...)` pada `script.js`. Saat tombol navigasi diklik, pesan "Tombol navigasi diklik." muncul di Console. Pengujian berhasil, tidak ada galat.]

- Menambahkan penanganan event submit: [memasang event listener `submit` pada `contactForm` dan menambahkan `event.preventDefault()` agar halaman tidak dimuat ulang. Pesan di Console muncul saat tombol Kirim ditekan.]

- Tambahkan penanganan event input: [Menambahkan event listener input pada formulir kontak untuk mengosongkan pesan umpan balik saat nilai kolom berubah. Hasil pengujian sesuai harapan dan tidak ada galat.]

- Tambahkan penanganan event reset: [Menambahkan event listener reset pada formulir kontak untuk menghapus pesan umpan balik ketika formulir dikembalikan ke keadaan awal. Hasil pengujian sesuai harapan dan tidak ada galat.]

- Dokumentasikan penggunaan event object: [Menambahkan parameter event pada listener submit dan mengamati event object melalui Console. Hasil pengujian sesuai harapan dan tidak ada galat.]

- Tambahkan preventDefault pada event submit: [Menambahkan `event.preventDefault()` pada listener submit agar halaman tidak dimuat ulang saat formulir dikirim. Hasil pengujian sesuai harapan dan tidak ada galat.]

- Tambahkan hamburger menu responsif: [Menambah CSS menu mobile dan class nav-open, serta menguji integrasi HTML, CSS, dan JavaScript. Hasil sesuai harapan.]

- Ambil nilai input formulir: [Menambah variabel elemen input dan pengambilan nilai pada listener submit. Hasil sesuai harapan.]