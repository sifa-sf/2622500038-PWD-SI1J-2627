# Pertemuan 6 - PHP Dasar dan Pemrograman Sisi Peladen

# Deskripsi

Dokumentasi pengembangan halaman web pada P6, meliputi PHP sisi peladen, variabel, konstanta, operator, percabangan, perulangan, dan pengujian melalui localhost (Laragon).

# Fitur dan Pengembangan:

- Baseline P6: [Menyalin artefak P5 ke pertemuan-06/, mengganti index.html menjadi index.php, dan menjalankannya melalui Laragon (Apache) di localhost.]

- Dasar PHP: [Menguji tag PHP, komentar, echo, print, serta perbedaan keluaran HTML statis dan PHP dengan kode sementara yang kemudian dihapus.]

- Variabel, konstanta, dan tipe data: [Menambahkan $nim, $namaMahasiswa, $programStudi, $tahunAkademik, $semester, $ipk, $statusAktif, $catatanTambahan, serta konstanta NAMA_MATA_KULIAH dan PROFIL_GITHUB. Nilainya ditampilkan pada sapaan dan tautan GitHub.]

- Operator: [Menghitung sisa semester dengan operator aritmetika, dan memeriksa rentang semester dengan operator perbandingan dan logika.]

- Percabangan: [Menambahkan if-elseif-else untuk keterangan semester, operator ternary untuk nama prodi dan status mahasiswa, serta switch-case-default untuk fokus program studi.]

- Perulangan: [Menambahkan for untuk 5 target belajar (dengan switch) dan while untuk Semester 1 sampai 3.]

- Fungsi bawaan dan sintaks keluaran: [Memakai number_format() untuk IPK, pemeriksaan === null untuk catatan tambahan, date("Y") untuk footer, dan <?= ... ?> pada tautan GitHub dan footer.]

- Atribut action formulir: [Mengubah action formulir dari index.html menjadi index.php.]

# Pengujian:

- Akses localhost: [Membuka halaman melalui http://localhost/2622500038-PWD-SI1J-2627/pertemuan-06/. Hasil aktual: halaman tampil tanpa galat PHP, dan View Page Source tidak memuat kode PHP mentah.]

- Variabel dan konstanta: [Hasil aktual: nama, mata kuliah, dan tahun akademik tampil sesuai nilai, dan tautan GitHub mengarah ke https://github.com/sifa-sf.]

- Operator: [Hasil aktual: sisa semester tampil 7. Semester 1 menghasilkan "Sesuai rentang", semester 9 menghasilkan "Perlu diperiksa".]

- Percabangan: [Hasil aktual: semester 1/2, 4, 7 menghasilkan "Semester awal", "Semester menengah", "Semester akhir". SI/true menghasilkan "Sistem Informasi (SI)" dan "Aktif", TI/false menghasilkan "Teknik Informatika (TI)" dan "Tidak aktif". Fokus prodi SI, TI, dan MI sesuai harapan ("Belum ditentukan" untuk MI).]

- Perulangan: [Hasil aktual: for menampilkan 5 target belajar sampai "Target belajar ke-5: Belum dipetakan", dan while menampilkan Semester 1, 2, 3.]

- Fungsi bawaan: [Hasil aktual: IPK tampil 3,90, catatan tambahan "Belum ada" (null) dan "Catatan praktik PHP" (diisi), dan footer menampilkan tahun, nama, dan NIM.]

- Atribut action formulir: [Hasil aktual: action bernilai index.php, dan fitur P5 (hamburger menu, responsif, validasi) tetap berfungsi.]

`Galat: tidak ada. Nilai variabel yang diubah saat pengujian sudah dikembalikan ke nilai awal.`

# Riwayat Pengembangan:

- Siapkan baseline dan lingkungan P6: [Menyalin artefak P5, menjalankan Laragon, dan memastikan halaman dapat diakses melalui localhost.]

- Pelajari dasar PHP: [Menguji tag PHP, komentar, echo, print, serta keluaran HTML statis dan PHP. Hasil sesuai harapan.]

- Tambahkan variabel dan konstanta: [Menambahkan deklarasi dan menampilkannya pada halaman. Hasil sesuai harapan.]

- Tambahkan operator: [Menambahkan perhitungan sisa semester dan pemeriksaan rentang semester. Hasil sesuai harapan.]

- Tambahkan percabangan: [Menambahkan if-elseif-else, ternary, dan switch. Hasil sesuai harapan.]

- Tambahkan perulangan: [Menambahkan for dan while. Hasil sesuai harapan.]

- Tambahkan fungsi bawaan dan sintaks keluaran: [Menambahkan number_format(), pemeriksaan null, date(), dan <?= ?>. Hasil sesuai harapan.]

- Sesuaikan action formulir: [Mengubah action menjadi index.php. Hasil sesuai harapan.]