<?php 
// P6: PHP dasar dan pemrograman sisi peladen 
// Bagian 1: Variabel dan konstanta 
$nim = "2622500038"; 
$namaMahasiswa = "Sifa Sukma Fira"; 
$programStudi = "SI"; 
$tahunAkademik = "2026/2027"; 
$semester = 1; 
$ipk = 3.75; 
$statusAktif = true; 
$catatanTambahan = null; 
const NAMA_MATA_KULIAH = "Pemrograman Web Dasar"; 
const PROFIL_GITHUB = "sifa-sf"; 
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title> 
    <link rel="stylesheet" href="style.css" /> 
  </head>
  
<body>
    <button
      class="nav-toggle"
      id="navToggle"
      type="button"
      aria-label="Buka navigasi"
      aria-controls="navMenu"
      aria-expanded="false"
    >
      &#9776;
    </button>
  </div>
  
    <nav>
      <ul id="navMenu">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah 
        <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik;?>.</p>
      <img src="img/foto-profil.jpeg" width="100" height="140" alt="Foto profil Sifa Sukma Fira" />
    </section>  

    <section id="about">
      <h2>Tentang Saya</h2>
      <article>
        <h3>Profil Singkat</h3>
        <p>Saya mahasiswa Program Studi Sistem Informasi.</p>
        <h3>Target Belajar</h3>
        <ol>
          <li>Memahami struktur HTML5.</li>
          <li>Menyusun halaman web semantik.</li>
          <li>Memvalidasi dokumen HTML.</li>
        </ol>
      </article>
    </section>

<section id="contact"> 
  <h2>Kontak</h2>
  <p>Kunjungi <a  target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
  </p>

  <form id="contactForm" action="index.html" method="get">
    <div class="form-group">
      <label for="nama">Nama Lengkap</label><br>
      <input class="input-form"
             type="text"
             id="nama"
             name="nama"
             placeholder="Masukkan Nama Lengkap"
             minlength="3"
             maxlength="50"
             required
        />
    </div>

    <div class="form-group">
      <label for="email">Email</label><br>
      <input class="input-form"
             type="email"
             id="email"
             name="email"
             placeholder="nama@email.com"
             required>
    </div>

    <div class="form-group">
      <label for="semester">Semester</label><br>
      <input class="input-form"
             type="number"
             id="semester"
             name="semester"
             placeholder="Masukkan Semester"
             min="1"
             max="14"
             required>
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal Kunjungan</label><br>
      <input class="input-form"
             type="date"
             id="tanggal"
             name="tanggal"
             required>
    </div>

    <div class="form-group">
      <p>Jenis Pesan</p>
      <input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required>
      <label for="pertanyaan">Pertanyaan</label>
      <input type="radio" id="saran" name="jenis_pesan" value="saran">
      <label for="saran">Saran</label>
    </div>

    <div class="form-group">
      <p>Topik yang Diminati</p>
      <input type="checkbox" id="minat-html" name="minat" value="HTML">
      <label for="minat-html">HTML</label>
      <input type="checkbox" id="minat-css" name="minat" value="CSS">
      <label for="minat-css">CSS</label>
    </div>

    <div class="form-group">
      <label for="prodi">Program Studi</label><br>
      <select class="input-form" id="prodi" name="prodi" required>
        <option value="">-- Pilih Program Studi --</option>
        <option value="BD">Bisnis Digital</option>
        <option value="SI">Sistem Informasi</option>
        <option value="TI">Teknik Informatika</option>
      </select>
    </div>

    <div class="form-group">
      <label for="pesan">Pesan</label><br>
        <textarea class="input-form"
                id="pesan"
                name="pesan"
                maxlength="300"
                placeholder="Tulis Pesan Anda"
                required></textarea>
    </div>

    <button type="submit">Kirim</button>
    <button type="reset">Batal</button>
    <p id="formFeedback"></p>

  </form>
</section>
</main>

  <footer>
     <p>&copy; 2026 Sifa Sukma Fira 2622500038</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
