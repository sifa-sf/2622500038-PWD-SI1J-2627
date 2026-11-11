<?php
// ==========================================================
// profile.php - Halaman PROFILE (biodata + foto)
// P6: variabel, konstanta, tipe data, operator, if-elseif-else,
//     ternary, switch-case, perulangan for, sintaks keluaran singkat
// ==========================================================

// ----- DATA DIRI (ubah sesuai identitas Anda; sama di semua halaman) -----
const NIM = "2622500038";
const NAMA_LENGKAP = "Sifa Sukma Fira";
const KELAS = "SI1J";
const NAMA_WEBSITE = "Kelekak Bangka";
const TAGLINE = "Mengenal Kelekak Bangka";
// -------------------------------------------------------------------------

// Bagian 1: variabel biodata
$kampus = "Institut Sains dan Bisnis Atma Luhur";
$programStudi = "SI";
$semester = 1;
$tahunAkademik = "2026/2027";
$hobi = "Free Diving, jogging, Silat,dan menikmti keindahan alam";
$motto = "Belum mencoba bukan berarti tidak bisa.";
$statusAktif = true;

// Bagian 2: operator + percabangan if-elseif-else
if ($semester < 3) {
  $keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
  $keteranganSemester = "Semester menengah";
} else {
  $keteranganSemester = "Semester akhir";
}

// Bagian 3: operator ternary
$namaProdi = ($programStudi == "SI")
  ? "Sistem Informasi"
  : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: switch-case-default
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
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile - <?= NAMA_WEBSITE ?></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="layout">

    <!-- ================= HEADER: logo + nama website ================= -->
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

    <!-- ================= NAVIGASI: menu memakai tag list ================= -->
    <nav aria-label="Navigasi utama">
      <ul id="navMenu">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="profile.php" aria-current="page">Profile</a></li>
        <li><a href="pendaftaran.php">Pendaftaran</a></li>
        <li><a href="artikel.php">Artikel</a></li>
      </ul>
    </nav>

  
    <main>
      <section id="about">
        <h2>Foto</h2>

        <img
          class="foto-profil"
          src="img/foto-profil.jpeg"
          alt="Foto profil <?= NAMA_LENGKAP ?>" />

        <article>
          <h3>Biodata</h3>
          <div class="tabel-wrap">
            <table class="biodata">
              <tbody>
                <tr>
                  <th scope="row">Nama Lengkap</th>
                  <td><?= NAMA_LENGKAP ?></td>
                </tr>
                <tr>
                  <th scope="row">NIM</th>
                  <td><?= NIM ?></td>
                </tr>
                <tr>
                  <th scope="row">Kelas</th>
                  <td><?= KELAS ?></td>
                </tr>
                <tr>
                  <th scope="row">Program Studi</th>
                  <td><?= $namaProdi . " (" . $programStudi . ")" ?></td>
                </tr>
                <tr>
                  <th scope="row">Perguruan Tinggi</th>
                  <td><?= $kampus ?></td>
                </tr>
                <tr>
                  <th scope="row">Semester</th>
                  <td><?= $semester . " (" . $keteranganSemester . "), TA " . $tahunAkademik ?></td>
                </tr>
                <tr>
                  <th scope="row">Status</th>
                  <td><?= $statusAktif ? "Mahasiswa aktif" : "Tidak aktif" ?></td>
                </tr>
                <tr>
                  <th scope="row">Hobi</th>
                  <td><?= $hobi ?></td>
                </tr>
                <tr>
                  <th scope="row">Motto</th>
                  <td><?= $motto ?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <h3>Tentang Saya</h3>
          <p>
            Saya mahasiswa Program Studi <?= $namaProdi ?> dengan fokus
            <?= strtolower($fokusProgramStudi) ?>. Lewat blog ini saya
            membiasakan diri menulis dan menyimpan catatan belajar.
          </p>

          <h3>Target Belajar</h3>
          <ol>
            <?php
            // Perulangan for + switch (P6 G.1)
            for ($i = 1; $i <= 4; $i++) {
              echo "<li>";
              switch ($i) {
                case 1:
                  echo "Memahami struktur HTML5 dan elemen semantik.";
                  break;
                case 2:
                  echo "Menata tampilan dengan CSS Flexbox dan Grid.";
                  break;
                case 3:
                  echo "Membuat halaman interaktif dengan JavaScript.";
                  break;
                case 4:
                  echo "Memproses formulir dengan PHP.";
                  break;
                default:
                  echo "Belum dipetakan";
                  break;
              }
              echo "</li>";
            }
            ?>
          </ol>
        </article>
      </section>
    </main>

    <footer>
      <p>&copy;<?= NIM ?>_<?= NAMA_LENGKAP ?>_<?= KELAS ?>_ UTS Pemrograman Web Dasar.</p>
    </footer>

  </div>
  <script src="script.js"></script>
</body>
</html>
