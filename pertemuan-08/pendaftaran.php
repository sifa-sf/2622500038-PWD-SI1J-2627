<?php
session_start();


const NIM = "2622500038";
const NAMA_LENGKAP = "Sifa Sukma Fira";
const KELAS = "SI1J";
const NAMA_WEBSITE = "Kelekak Bangka";
const TAGLINE = "Mengenal Kelekak Bangka";

$nama = trim((string) ($_POST['nama'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$semesterForm = trim((string) ($_POST['semester'] ?? ''));
$tanggal = trim((string) ($_POST['tanggal'] ?? ''));
$jenisAnggota = trim((string) ($_POST['jenis_anggota'] ?? ''));
$prodi = trim((string) ($_POST['prodi'] ?? ''));
$alasan = trim((string) ($_POST['alasan'] ?? ''));
$minat = $_POST['minat'] ?? [];

$pesanKesalahan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // F.2 kelengkapan data
  if ($nama === '') {
    $pesanKesalahan .= 'Nama lengkap wajib diisi. ';
  } elseif (mb_strlen($nama) < 3 || mb_strlen($nama) > 50) {
    $pesanKesalahan .= 'Nama lengkap harus 3 sampai 50 karakter. ';
  }
  if ($email === '') {
    $pesanKesalahan .= 'Email wajib diisi. ';
  }
  if ($semesterForm === '') {
    $pesanKesalahan .= 'Semester wajib diisi. ';
  }
  if ($tanggal === '') {
    $pesanKesalahan .= 'Tanggal pendaftaran wajib diisi. ';
  }
  if ($jenisAnggota === '') {
    $pesanKesalahan .= 'Jenis keanggotaan wajib dipilih. ';
  }
  if ($prodi === '') {
    $pesanKesalahan .= 'Program studi wajib dipilih. ';
  }
  if ($alasan === '') {
    $pesanKesalahan .= 'Alasan bergabung wajib diisi. ';
  } elseif (mb_strlen($alasan) > 300) {
    $pesanKesalahan .= 'Alasan bergabung maksimal 300 karakter. ';
  }
  if (empty($minat)) {
    $pesanKesalahan .= 'Minat wajib dipilih minimal satu. ';
  }

  // F.3 format dan tipe data
  if ($semesterForm !== '') {
    $semesterValid = filter_var($semesterForm, FILTER_VALIDATE_INT);
    if ($semesterValid === false || $semesterValid < 1 || $semesterValid > 14) {
      $pesanKesalahan .= 'Semester harus berupa bilangan bulat antara 1 dan 14. ';
    }
  }
  if ($email !== '') {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $pesanKesalahan .= 'Format email tidak valid. ';
    }
  }
  if ($tanggal !== '' && strtotime($tanggal) === false) {
    $pesanKesalahan .= 'Format tanggal tidak valid. ';
  }

  // F.4 nilai pilihan harus sesuai daftar yang diizinkan
  if ($jenisAnggota !== '' && !in_array($jenisAnggota, ['pembaca', 'kontributor'], true)) {
    $pesanKesalahan .= 'Jenis keanggotaan tidak valid. ';
  }
  if ($prodi !== '' && !in_array($prodi, ['SI', 'TI'], true)) {
    $pesanKesalahan .= 'Program studi tidak valid. ';
  }
  $minatDiizinkan = ['Teknologi', 'Hobi', 'Kuliah'];
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

  $_SESSION['pesanKesalahan'] = $pesanKesalahan;
  $_SESSION['valid'] = ($pesanKesalahan === '');
  $_SESSION['pesanSukses'] = ($pesanKesalahan === '') ? 'Pendaftaran berhasil dikirim.' : '';
  $_SESSION['nama'] = $nama;
  $_SESSION['email'] = $email;
  $_SESSION['semester'] = $semesterForm;
  $_SESSION['tanggal'] = $tanggal;
  $_SESSION['jenis_anggota'] = $jenisAnggota;
  $_SESSION['prodi'] = $prodi;
  $_SESSION['minat'] = $minat;
  $_SESSION['alasan'] = $alasan;
  header('Location: pendaftaran.php');
  exit;
}

$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? '';
$pesanSukses = $_SESSION['pesanSukses'] ?? '';
$dataValid = $_SESSION['valid'] ?? false;
$nama = $_SESSION['nama'] ?? '';
$email = $_SESSION['email'] ?? '';
$semesterForm = $_SESSION['semester'] ?? '';
$tanggal = $_SESSION['tanggal'] ?? '';
$jenisAnggota = $_SESSION['jenis_anggota'] ?? '';
$prodi = $_SESSION['prodi'] ?? '';
$minat = $_SESSION['minat'] ?? [];
$alasan = $_SESSION['alasan'] ?? '';

$isiNama = $dataValid ? '' : $nama;
$isiEmail = $dataValid ? '' : $email;
$isiSemester = $dataValid ? '' : $semesterForm;
$isiTanggal = ($dataValid || $tanggal === '') ? date("Y-m-d") : $tanggal;
$isiJenis = $dataValid ? '' : $jenisAnggota;
$isiProdi = $dataValid ? '' : $prodi;
$isiMinat = (!$dataValid && is_array($minat)) ? $minat : [];
$isiAlasan = $dataValid ? '' : $alasan;
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pendaftaran - <?= NAMA_WEBSITE ?></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="layout">

    
    <header>
      <div class="header-top">
        <div class="brand">
          <img class="logo" src="img/logo-KelekakBangka.jpeg" alt="Logo <?= NAMA_WEBSITE ?>" />
          <div>
            <h1><?= NAMA_WEBSITE ?></h1>
            <p class="tagline"><?= TAGLINE ?></p>
          </div>
        </div>
        <button
          class="nav-toggle"
          id="navToggle"
          type="button"
          aria-label="Buka navigasi"
          aria-controls="navMenu"
          aria-expanded="false">
          &#9776;
        </button>
      </div>
    </header>

    <nav aria-label="Navigasi utama">
      <ul id="navMenu">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="pendaftaran.php" aria-current="page">Pendaftaran</a></li>
        <li><a href="artikel.php">Artikel</a></li>
      </ul>
    </nav>

    <main>
      <section id="register">
        <h2>Pendaftaran Anggota Komunitas</h2>
        <p>Isi formulir berikut untuk bergabung sebagai anggota komunitas.</p>

        <?php if ($pesanKesalahan !== ''): ?>
          <p class="form-feedback-error">
            <?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?>
          </p>
          <?php unset($_SESSION['pesanKesalahan']); ?>
        <?php endif; ?>

        <?php if ($pesanSukses !== ''): ?>
          <p class="form-feedback-success">
            <?= htmlspecialchars($pesanSukses, ENT_QUOTES, 'UTF-8') ?>
          </p>
          <?php unset($_SESSION['pesanSukses']); ?>
        <?php endif; ?>

        <form id="pendaftaranForm" action="pendaftaran.php" method="post" novalidate>

          <div class="form-group">
            <label for="nama">Nama Lengkap</label><br />
            <input
              class="input-form"
              type="text"
              id="nama"
              name="nama"
              placeholder="Masukkan nama lengkap"
              minlength="3"
              maxlength="50"
              value="<?= htmlspecialchars($isiNama, ENT_QUOTES, 'UTF-8') ?>"
              required />
          </div>

          <div class="form-group">
            <label for="email">Email</label><br />
            <input
              class="input-form"
              type="email"
              id="email"
              name="email"
              placeholder="nama@email.com"
              value="<?= htmlspecialchars($isiEmail, ENT_QUOTES, 'UTF-8') ?>"
              required />
          </div>

          <div class="form-group">
            <label for="semester">Semester</label><br />
            <input
              class="input-form"
              type="number"
              id="semester"
              name="semester"
              min="1"
              max="14"
              value="<?= htmlspecialchars((string) $isiSemester, ENT_QUOTES, 'UTF-8') ?>"
              required />
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal Pendaftaran</label><br />
            <input
              class="input-form"
              type="date"
              id="tanggal"
              name="tanggal"
              value="<?= htmlspecialchars($isiTanggal, ENT_QUOTES, 'UTF-8') ?>"
              required />
          </div>

          <div class="form-group">
            <fieldset>
              <legend>Jenis Keanggotaan</legend>
              <input
                type="radio"
                id="inti"
                name="jenis_anggota"
                value="inti"
                <?= $isiJenis === 'inti' ? 'checked' : '' ?>
                required />
              <label class="pilihan" for="inti">Anggota Inti</label>
              <input
                type="radio"
                id="volunteer"
                name="jenis_anggota"
                value="volunteer"
                <?= $isiJenis === 'volunteer' ? 'checked' : '' ?> />
              <label class="pilihan" for="volunteer">Volunteer</label>
            </fieldset>
          </div>

          <div class="form-group">
            <fieldset>
              <legend>Bidang yang Diminati</legend>
              <input
                type="checkbox"
                id="minat-Kebudayaan"
                name="minat[]"
                value="Kebudayaan"
                <?= in_array('Kebudayaan', $isiMinat, true) ? 'checked' : '' ?> />
              <label class="pilihan" for="minat-Kebudayaan">Kebudayaan</label>
              <input
                type="checkbox"
                id="minat-Guide"
                name="minat[]"
                value="Guide"
                <?= in_array('Guide', $isiMinat, true) ? 'checked' : '' ?> />
              <label class="pilihan" for="minat-Guide">Guide</label>
              <input
                type="checkbox"
                id="minat-Humas"
                name="minat[]"
                value="Humas"
                <?= in_array('Humas', $isiMinat, true) ? 'checked' : '' ?> />
              <label class="pilihan" for="minat-Humas">Humas</label>
            </fieldset>
          </div>

          <div class="form-group">
            <label for="prodi">Program Studi</label><br />
            <select class="input-form" id="prodi" name="prodi" required>
              <option value="">-- Pilih Program Studi --</option>
              <option value="SI" <?= $isiProdi === 'SI' ? 'selected' : '' ?>>Sistem Informasi</option>
              <option value="TI" <?= $isiProdi === 'TI' ? 'selected' : '' ?>>Teknik Informatika</option>
              <option value="BD" <?= $isiProdi === 'BD' ? 'selected' : '' ?>>Bisnis Digital</option>
            </select>
          </div>

          <div class="form-group">
            <label for="alasan">Alasan Bergabung</label><br />
            <textarea
              class="input-form"
              id="alasan"
              name="alasan"
              maxlength="300"
              placeholder="Tulis alasan Anda"
              required><?= htmlspecialchars($isiAlasan, ENT_QUOTES, 'UTF-8') ?></textarea>
          </div>

          <button type="submit">Daftar</button>
          <button type="reset">Batal</button>
          <p id="formFeedback"></p>
        </form>

        <?php if ($dataValid && $nama !== ''): ?>
          <div class="hasil-data">
            <h3>Data yang Diterima Peladen</h3>
            <p>Nama: <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></p>
            <p>Email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>
            <p>Semester: <?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?></p>
            <p>Tanggal pendaftaran: <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?></p>
            <p>Jenis keanggotaan: <?= htmlspecialchars($jenisAnggota, ENT_QUOTES, 'UTF-8') ?></p>
            <p>Program studi: <?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?></p>
            <p>Minat:</p>
            <?php if (is_array($minat) && count($minat) > 0): ?>
              <ul>
                <?php foreach ($minat as $topik): ?>
                  <li><?= htmlspecialchars((string) $topik, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <p>Tidak ada minat yang dipilih.</p>
            <?php endif; ?>
            <p>Alasan bergabung:</p>
            <p><?= nl2br(htmlspecialchars($alasan, ENT_QUOTES, 'UTF-8')) ?></p>
          </div>
        <?php endif; ?>
      </section>
    </main>

    <footer>
      <p>&copy;<?= NIM ?>_<?= NAMA_LENGKAP ?>_<?= KELAS ?>_ UTS Pemrograman Web Dasar.</p>
    </footer>

  </div>
  <script src="script.js"></script>
</body>
</html>
