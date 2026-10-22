P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien 

Deskripsi 

Dokumentasi pengembangan halaman web pada P5, meliputi JavaScript, DOM, event listener, interaksi 
navigasi, dan validasi formulir sisi klien. 

#Fitur dan Pengembangan:

-  baseline P5: [Menyalin index.html, style.css, dan img/foto-profil.jpg dari artefak P4 ke pertemuan-05/. Belum ada kode JavaScript yang ditambahkan.]

- JavaScript eksternal: [Membuat berkas script.js di pertemuan-05/ dan menghubungkannya ke index.html dengan menambahkan <script src="script.js"></script> sebelum tag penutup </body>. Kode pengujian sementara "console.log(script.js berhasil dijalankan.);", selanjutnya dihapus dari script.js setelah hubungan kedua berkas terverifikasi dan tidak ditemukan galat.]

- Penambahan id elemen untuk akses DOM: [Menambahkan id="navMenu" pada daftar navigasi dan id="contactForm" pada formulir di index.html agar dapat dipilih dengan getElementById().]

- Elemen umpan balik: [menambahkan <p id="formFeedback"></p> pada index.html (di bawah tombol Kirim dan Batal) sebagai tempat pesan hasil validasi.]

- Tombol navigasi: [menambahkan `<button id="navToggle">` (simbol ☰) pada header di index.html, memberi id="navMenu" pada menu, serta menambahkan aturan CSS header-top, nav-toggle, #navMenu, dan #navMenu.nav-open pada style.css. Pada media query `min-width: 768px`, menu tampil mendatar dan tombol disembunyikan. Pada tahap ini tombol baru berupa elemen HTML, perilaku buka/tutup menu belum ditambahkan.]

- Event listener navigasi: [memasang addEventListener pada navToggle untuk menangani klik tombol navigasi.]

- Event submit: [memasang contactForm.addEventListener pada script.js sebagai pemicu proses validasi formulir. Di dalam fungsi ditambahkan event.preventDefault() agar peramban tidak mengirim formulir dan memuat ulang halaman.]

- Event input: [Memasang event listener input pada contactForm di script.js. Saat nilai kolom formulir berubah, formFeedback.textContent dikosongkan sehingga pesan umpan balik sebelumnya hilang.]

- Event reset: [Memasang event listener reset pada contactForm di script.js. Saat tombol "Batal" ditekan, formFeedback.textContent` dikosongkan sehingga pesan umpan balik sebelumnya dihapus.]

- Event object: [Menambahkan parameter event pada fungsi penangan event submit di script.js untuk menerima objek event dari peramban. Baris console.log(event) digunakan sementara untuk pengamatan dan dihapus setelah pengujian.]

- Pencegahan tindakan bawaan submit: [Menambahkan event.preventDefault() pada baris pertama fungsi penangan event submit di script.js. Dengan ini, peramban tidak menjalankan tindakan bawaan pengiriman formulir (memuat ulang halaman), sehingga proses validasi dapat dilakukan oleh JavaScript pada halaman yang sama. Validasi yang akan dibuat pada tahap berikutnya hanya berlangsung di sisi klien dan tidak mengirim atau menyimpan data ke server.]

- Hamburger menu pada tampilan responsif: [Menggabungkan HTML (navToggle, navMenu), CSS (menu tersembunyi di mobile, tampil sebagai kolom saat class nav-open), dan JavaScript (classList.toggle("nav-open"), aria-expanded, aria-label) dalam satu event handler `click`.]

- Pengambilan nilai input: [Memilih elemen input dengan getElementById() dan membaca nilainya di listener submit memakai value.trim(), Number(), querySelector(), dan querySelectorAll() dengan :checked.]

- Validasi format email: [Menambahkan emailPattern dan emailPattern.test(email) di dalam listener submit pada script.js. Jika format tidak sesuai, pesan ditampilkan melalui formFeedback.textContent dan return menghentikan validasi. Pola ini hanya pemeriksaan bentuk dasar email, bukan pemeriksaan lengkap seluruh ketentuan teknis alamat email.]

- Validasi rentang semester: [Mengubah kondisi pemeriksaan semester menjadi semesterInput.value === "" || semester < 1 || semester > 14. Pemeriksaan nilai kosong dilakukan sebelum konversi numerik karena Number("") menghasilkan `0`. Pemeriksaan ini belum memastikan nilai berupa bilangan bulat.]

- Validasi input teks nama: [Menambahkan pemeriksaan nama lengkap di listener submit pada script.js. Nilai diambil dengan namaInput.value.trim(), lalu panjangnya diperiksa dengan nama.length < 3 || nama.length > 50. Jika tidak sesuai, pesan ditampilkan melalui formFeedback.textContent dan return menghentikan validasi.]

Validasi email: [Format email diperiksa dengan emailPattern.test(email) pada nilai emailInput.value.trim(). Pola ini hanya pemeriksaan bentuk dasar, bukan jaminan alamat email benar-benar ada. Blok yang semula berada di luar listener submit dipindah ke dalam listener.]

Validasi nilai numerik: [Semester dikonversi dengan Number() dan diperiksa dengan semesterInput.value === "" || semester < 1 || semester > 14. Pemeriksaan kosong dilakukan sebelum konversi karena Number("") bernilai `0`. Bilangan bulat belum dipastikan.]

Validasi tanggal: [Memeriksa tanggalInput.value === "", tanpa pemeriksaan rentang tanggal.]

Validasi radio button: [Memakai querySelector('input[name="jenis_pesan"]:checked'); hasil `null` berarti belum ada pilihan.]

Validasi checkbox: [Memakai querySelectorAll('input[name="minat"]:checked') dan memeriksa length === 0. Aturan minimal satu pilihan adalah keputusan desain P5.]

Validasi select: [Memeriksa prodiInput.value === ""; opsi awal bernilai kosong.]

Validasi textarea: [Pesan diambil dengan trim(), diperiksa tidak kosong dan tidak lebih dari 300 karakter.]

Pengendalian pengiriman formulir: [Listener submit memanggil event.preventDefault(), lalu menjalankan pemeriksaan berurutan. Jika satu pemeriksaan gagal, pesan ditampilkan dan return menghentikan pemeriksaan berikutnya. Jika semua lolos, ditampilkan "Form berhasil divalidasi."]

#Pengujian:

- Baseline P5: [Membuka pertemuan-05/index.html di peramban dan memeriksa struktur berkas, tampilan halaman, CSS, dan gambar profil. Hasil aktual: seluruh berkas tersedia, halaman tampil sesuai P4, dan tidak ditemukan masalah.]

- Hubungan script.js dengan index.html (E.4): [Menyimpan perubahan, membuka pertemuan-05/index.html di peramban, membuka Browser DevTools (F12), lalu memilih tab `Console`. Hasil aktual: pesan `"script.js berhasil dijalankan."` muncul pada Console, sehingga hubungan kedua berkas berhasil diverifikasi. Setelah kode pengujian sementara dihapus dari `script.js` dan halaman dimuat ulang, tidak ditemukan galat baru pada Console. Galat yang ditemukan: tidak ada.]

- Pengujian ulang F.2: [Menjalankan kembali `getElementById()` untuk navMenu dan contactForm. Hasil aktual: [elemen navMenu dan contactForm berhasil ditemukan, sedangkan navToggle menghasilkan `null` karena elemen dengan ID tersebut tidak ditemukan pada halaman. navToggle masih `null` karena tombol belum ditambahkan sesuai modul yang akan dilakukan pada (H.2).]]

- textContent pada formFeedback (via Console):[menjalankan `document.getElementById("formFeedback").textContent = "Pesan pengujian DOM.";` awalnya teks tidak muncul karena elemen `formFeedback` belum ada di `index.html`, lalu saya menambahkan `<p id="formFeedback"></p>` pada `index.html`. Hasil aktual: teks muncul dan hilang sesuai harapan, tidak ada galat di Console. Status: Berhasil.]

- Tombol navigasi (tampilan): [membuka index.html pada peramban, atur lebar 400px lewat mode perangkat DevTools, lalu atur lebar 1024px.  awalnya tombol tidak tampil karena index.html dan style.css belum memiliki tombol navToggle maupun aturan CSS-nya; diperbaiki dengan menambahkannya. Hasil aktual: awalnya menu tersembunyi dan hanya tombol hamburger (☰) yang tampil. contains awal bernilai false. Setelah toggle (hasil true), menu Beranda, Tentang, Kontak muncul di bawah judul, dan contains berikutnya bernilai `true`. Setelah halaman dimuat ulang, menu tersembunyi kembali. Tidak ada galat lain di Console.]

- addEventListener pada navToggle: [Menambahkan kode sementara navToggle.addEventListener yang menampilkan pesan di Console, lalu mengklik tombol navigasi (☰) pada lebar 400px dengan Console terbuka. pesan "Tombol navigasi diklik." muncul di Console setiap tombol diklik. Hasil aktual: pesan "Tombol navigasi diklik." muncul di Console setiap tombol diklik. Tidak ada galat. Status: Berhasil]

- Event submit pada contactForm: [memasang listener `submit` yang menampilkan pesan "Form dikirim." di Console, membuka tab Console, mengisi formulir, lalu menekan tombol Kirim. pesan "Form dikirim." muncul di Console. Hasil aktual: pesan "Form dikirim." muncul di Console dan halaman tidak dimuat ulang. Tidak ada galat lain. Status: Berhasil]

- Event input: [Membuka pertemuan 05, membuka tab Console pada Browser DevTools, lalu menampilkan pesan uji dengan document.getElementById("formFeedback").textContent = "Uji pesan";. Setelah itu, mengisi atau mengubah kolom pada formulir. Hasil aktual: pesan "Uji pesan" hilang setelah kolom formulir diisi, sehingga event input berhasil terdeteksi.]

- Event reset: [Membuka pertemuan-05, mengisi beberapa kolom formulir, lalu menampilkan pesan uji melalui Console dengan document.getElementById("formFeedback").textContent = "Uji pesan";. Setelah itu, menekan tombol "Batal". Hasil aktual: isian formulir kembali kosong dan pesan "Uji pesan" hilang, sehingga event reset berhasil ditangani.]

- Event object: [Membuka pertemuan-05, membuka tab Console pada Browser DevTools dengan opsi Keep log aktif, mengisi formulir, lalu menekan tombol "Kirim" dengan console.log(event) pada listener submit. Hasil aktual: objek SubmitEvent tampil pada Console dengan type bernilai submit dan target berupa form#contactForm, sehingga parameter event terbukti menerima objek event dari peramban.]

- Pencegahan tindakan bawaan submit: [Menyimpan script.js, memuat ulang halaman, mengisi formulir, lalu menekan tombol "Kirim". Hasil aktual: halaman tidak dimuat ulang, isian formulir tetap ada, URL tidak berubah, dan Console menampilkan "Form dikirim.", sehingga event.preventDefault() berhasil mencegah tindakan bawaan submit.]

- Hamburger menu: [Mengatur viewport ke ukuran layar kecil, lalu mengklik tombol hamburger dua kali. Hasil aktual: klik pertama menampilkan menu, `aria-expanded="true"`, dan `aria-label="Tutup navigasi"`; klik kedua menyembunyikan menu, `aria-expanded="false"`, dan `aria-label="Buka navigasi"`.]

- Pengambilan nilai input: [Mengisi formulir lalu menekan "Kirim" dengan `console.log` sementara. Hasil aktual: semua nilai terbaca sesuai isian, `topikDipilih.length` sesuai jumlah checkbox, dan `jenisPesan` bernilai `null` jika radio tidak dipilih.]

- Pemeriksaan kelengkapan data: [mengisi data dasar yang valid, lalu mengosongkan satu kolom wajib secara bergantian (jenis pesan, topik, program studi, pesan, tanggal, semester) dan menekan Kirim. Hasil aktual: semua pesan muncul sesuai harapan, misalnya "Pilih minimal satu topik yang diminati." saat topik belum dipilih.]

- Pemeriksaan format email: [mengisi nama valid, lalu memasukkan tiga bentuk email dan menekan Kirim. Email tanpa @: diharapkan "Masukkan alamat email yang valid.", Email tanpa titik setelah @: diharapkan pesan yang sama, Email `mahasiswa@atmaluhur.ac.id`: diharapkan lolos pemeriksaan email. semuanya sudah sesuai dengan yang diharapkan.]

- Validasi email: [Mengirim formulir dengan data lain yang sudah terisi. Hasil aktual: Email tanpa `@`: muncul "Masukkan alamat email yang valid", Email dengan domain tanpa titik (`a@b`): muncul pesan yang sama, Email `mahasiswa@atmaluhur.ac.id`: lolos pemeriksaan email.]

- Validasi semester: [Mengirim formulir dengan data lain yang sudah terisi. Hasil aktual: Semester `1` dan `14`: lolos pemeriksaan semester. Semester `0`, `15`, dan kosong: muncul "Semester harus diisi dengan angka 1 sampai 14."]

- Validasi nama: [Mengirim formulir dengan data lain yang sudah valid. Hasil aktual: nama 2 karakter ditolak dengan pesan "Nama lengkap harus diisi 3 sampai 50 karakter."; nama 3 karakter dan 50 karakter lolos; nama lebih dari 50 karakter ditolak dengan pesan yang sama; spasi di awal atau akhir dibuang oleh `trim()` sebelum panjang dihitung. Galat: tidak ada.]

- Email: [Tanpa `@`, tanpa bagian setelah `@`, dan domain tanpa titik ditolak dengan "Masukkan alamat email yang valid."; `mahasiswa@atmaluhur.ac.id` lolos.]

- Semester: [`1` dan `14` lolos; `0`, `15`, dan kosong ditolak dengan "Semester harus diisi dengan angka 1 sampai 14.]

- Tanggal: [Kosong ditolak dengan "Tanggal kunjungan harus diisi."; tanggal terisi lolos.]

- Radio button: [Tanpa pilihan ditolak dengan "Pilih jenis pesan."; satu pilihan lolos.]

- Checkbox: [Tanpa pilihan ditolak dengan "Pilih minimal satu topik yang diminati."; satu atau lebih pilihan lolos.]

- Select: [Opsi awal ditolak dengan "Pilih program studi."; program studi valid lolos.]

- Textarea: [Kosong dan hanya spasi ditolak dengan "Pesan harus diisi."; 1 dan 300 karakter lolos. Kondisi `pesan.length > 300` tidak diuji lewat pengetikan karena `maxlength="300"` mencegah masukan lebih panjang.]

- Pengendalian submit: [Formulir dikirim dengan satu atau beberapa masukan tidak valid; pesan gagal tampil dan pemeriksaan berhenti pada aturan gagal pertama. Setelah masukan diperbaiki satu per satu dan semua aturan terpenuhi, muncul "Form berhasil divalidasi." Halaman tetap berada pada halaman yang sama dan tidak ada pengiriman data ke peladen.]

`Galat: tidak ada, selain perbaikan blok email pada I.7 yang sebelumnya berada di luar listener `submit`.`

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

- Tambahkan validasi email dan rentang semester: [Menambahkan pemeriksaan format email dan rentang semester 1 sampai 14 pada listener submit, serta memperbaiki blok email yang berada di luar listener. Seluruh pengujian sesuai harapan.]

- Tambahkan validasi panjang nama: [Menambahkan pemeriksaan nama lengkap 3 sampai 50 karakter pada listener submit. Seluruh pengujian sesuai harapan.]