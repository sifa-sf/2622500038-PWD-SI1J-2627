<?php 
  // P6: PHP dasar dan pemrograman sisi peladen 
  // Bagian 1: Variabel dan konstanta 
  $nim = "2622500038"; 
  $namaMahasiswa = "Sifa Sukma Fira"; 
  $programStudi = "SI"; 
  $tahunAkademik = "2026/2027"; 
  $semester = 1; 
  $ipk = 3.90; 
  $statusAktif = true; 
  $catatanTambahan = null;
  const NAMA_MATA_KULIAH = "Pemrograman Web Dasar"; 
  const PROFIL_GITHUB = "sifa-sf"; 
  // Bagian 2: Operator 
  $batasSemester = 8; 
  $sisaSemester = $batasSemester - $semester;
  $semesterValid = $semester >= 1 && $semester <= $batasSemester; 
  $statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";
  // Bagian 3: Percabangan if-elseif-else 
  if ($semester < 3) { 
    $keteranganSemester = "Semester awal"; 
  } elseif ($semester <= 6) { 
    $keteranganSemester = "Semester menengah"; 
  } else { 
    $keteranganSemester = "Semester akhir"; 
  } 
  $namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik 
  Informatika" : "Lainnya"); 
  // Bagian 4: Percabangan switch-case-default 
  switch ($programStudi) { 
    case "SI": 
      $fokusProgramStudi = "Sistem informasi dan proses bisnis"; 
      break; 
    case "TI": 
      $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak"; 
      break; 
    default: 
      $fokusProgramStudi = "Belum ditentukan"; 
  }
  session_start(); 
  
  // P7: penggunaan POST
  $nama = trim((string) ($_POST['nama'] ?? ''));
  $email = trim((string) ($_POST['email'] ?? ''));
  $semesterForm = trim((string) ($_POST['semester'] ?? ''));
  $jenisPesan = trim((string) ($_POST['jenis_pesan'] ?? ''));
  $prodi = trim((string) ($_POST['prodi'] ?? ''));
  $pesan = trim((string) ($_POST['pesan'] ?? ''));
  $tanggal = trim((string) ($_POST['tanggal'] ?? ''));
  $minat = $_POST['minat'] ?? [];

  $pesanKesalahan = ''; 

  if ($_SERVER['REQUEST_METHOD'] === 'POST')  
    if (trim($nama ?? '') === '') { 
      $pesanKesalahan .= 'Nama lengkap wajib diisi. '; 
    } 
    if (trim($email) === '') { 
      $pesanKesalahan .= 'Email wajib diisi. '; 
    } 
    if (trim($semesterForm) === '') { 
      $pesanKesalahan .= 'Semester wajib diisi. '; 
    } 
    if (trim($tanggal) === '') { 
      $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. '; 
    } 
    if ($jenisPesan === '') { 
      $pesanKesalahan .= 'Jenis pesan wajib dipilih. '; 
    } 
  
    if ($prodi === '') { 
      $pesanKesalahan .= 'Program studi wajib dipilih. '; 
    } 
  
    if (trim($pesan) === '') { 
      $pesanKesalahan .= 'Pesan wajib diisi. '; 
    } 
    if (empty($minat)) { 
      $pesanKesalahan .= 'Minat wajib dipilih minimal satu. '; 
    } 

  if (trim($semesterForm) !== '') { 
    $semesterValid = filter_var( 
      $semesterForm, 
      FILTER_VALIDATE_INT 
    ); 
 
  if ( 
    $semesterValid === false || 
    $semesterValid < 1 || 
    $semesterValid > 14 
  ) { 
    $pesanKesalahan .= 'Semester harus berupa bilangan bulat antara 1 dan 14. '; 
    } 
  } 
  if (trim($email) !== '') { 
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
      $pesanKesalahan .= 'Format email tidak valid. '; 
    }
  } 
  if (!in_array($jenisPesan, ['pertanyaan', 'saran'], true)) { 
    $pesanKesalahan .= 'Jenis pesan tidak valid. '; 
  } 
 
  if (!in_array($prodi, ['SI', 'TI'], true)) { 
    $pesanKesalahan .= 'Program studi tidak valid. '; 
  } 
  
  $minatDiizinkan = ['HTML', 'CSS']; 
  
  if (!is_array($minat)) { 
    $pesanKesalahan .= 'Format pilihan topik tidak valid. '; 
  } else { 
    foreach ($minat as $topik) { 
      if (!in_array($topik, $minatDiizinkan, true)) { 
        $pesanKesalahan .= 'Pilihan topik tidak valid. '; 
        break; 
      } 
    } 
  }

  // P7 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $_SESSION['pesanKesalahan'] = $pesanKesalahan; 
  
    $_SESSION['nama'] = $nama; 
    $_SESSION['email'] = $email; 
    $_SESSION['semester'] = $semesterForm; 
    $_SESSION['tanggal'] = $tanggal; 
    $_SESSION['jenis_pesan'] = $jenisPesan; 
    $_SESSION['prodi'] = $prodi; 
    $_SESSION['minat'] = $minat; 
    $_SESSION['pesan'] = $pesan; 
  
    header('Location: index.php'); 
    exit; 
  } 

  $pesanKesalahan = $_SESSION['pesanKesalahan'] ?? '';

  $nama = $_SESSION['nama'] ?? '';
  $email = $_SESSION['email'] ?? '';
  $semesterForm = $_SESSION['semester'] ?? '';
  $tanggal = $_SESSION['tanggal'] ?? date("Y-m-d");
  $jenisPesan = $_SESSION['jenis_pesan'] ?? '';
  $prodi = $_SESSION['prodi'] ?? '';
  $minat = $_SESSION['minat'] ?? '';
  $pesan = $_SESSION['pesan'] ?? '';
  ?>
<!doctype html>
 
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title> 
    <link rel="stylesheet" href="style.css" /> 
  </head>
  
<body>
  <header>
    <div class="header-top">
    <h1>Profil Mahasiswa</h1>
    
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
      <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; 
      ?>.</p> 
      <img src="img/foto-profil.jpeg" width="100" height="140" alt="Foto profil Sifa Sukma Fira" />
    </section>  

    <section id="about">
      <h2>Tentang Saya</h2>
      <article>
        <h3>Profil Singkat</h3>
        <p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p> 
        <p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p> 
        <p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p> 
        <p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p> 
        <p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p> 
        <p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
        <p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p> 
        <p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p> 
        <p>Saya mahasiswa Program Studi Sistem Informasi.</p>
        <h3>Target Belajar</h3>
        <ol>
         <?php 
          // Perulangan for tanpa array; materi larik dibahas pada P9. 
          for ($i = 1; $i <= 5; $i++) { 
          echo "<li>Target belajar ke-" . $i . ": "; 
          switch ($i) { 
          case 1: 
          echo "Memahami sintaks dasar PHP."; 
          break; 
          case 2: 
          echo "Menggunakan variabel dan konstanta."; 
          break; 
          case 3: 
          echo "Menerapkan operator dan percabangan."; 
          break; 
          case 4: 
          echo "Menggunakan perulangan for dan while."; 
          break; 
          default: 
          echo "Belum dipetakan"; 
          break; 
          } 
          echo "</li>"; 
          } 
          ?>
        </ol>
        <h3>Semester (Perulangan while):</h3> 
        <ol> 
        <?php 
        $nomorSemester = 1; 
        while ($nomorSemester <= 3) { 
        echo "<li>Semester " . $nomorSemester . "</li>"; 
        $nomorSemester++; // operator penugasan 
        } 
        ?> 
        </ol>
      </article>
    </section>

<section id="contact"> 
  <h2>Kontak</h2>
  <?php if ($pesanKesalahan !== ''): ?> 
    <p class="form-feedback-error"> 
      <?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
    <?php unset($_SESSION['pesanKesalahan']); ?>
  <?php endif; ?> 
  <p>Kunjungi
    <a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
  </p> 
  <form id="contactForm" action="index.php" method="post" novalidate>
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
      <input type="checkbox" id="minat-html" name="minat[]" value="HTML">
      <label for="minat-html">HTML</label>
      <input type="checkbox" id="minat-css" name="minat[]" value="CSS">
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
    <?php if (!empty($nama)): ?> 
    <h3>Data yang Diterima Peladen</h3> 
  
    <p>Nama: 
      <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
  
    <p>Email: 
      <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
  
    <p>Semester: 
      <?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
  
    <p>Tanggal kunjungan: 
      <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
  
    <p>Jenis pesan: 
      <?= htmlspecialchars($jenisPesan, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
  
    <p>Program studi: 
      <?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?> 
    </p> 
  
    <p>Minat:</p> 
  
    <?php if (is_array($minat) && count($minat) > 0): ?> 
      <ul> 
        <?php foreach ($minat as $topik): ?> 
          <li> 
            <?= htmlspecialchars((string) $topik, ENT_QUOTES, 'UTF-8') ?> 
          </li> 
        <?php endforeach; ?> 
      </ul> 
    <?php else: ?> 
      <p>Tidak ada minat yang dipilih.</p> 
    <?php endif; ?> 
  
    <p>Pesan:</p> 
  
    <p><?= nl2br(htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8')) ?></p> 
  <?php endif; ?> 
</section>
</main>

  <footer>
    <p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p> 
  </footer>
    <script src="script.js"></script> 
  </body>
</html>