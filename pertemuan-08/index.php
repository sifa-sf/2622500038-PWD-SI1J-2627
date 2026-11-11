<?php
const NIM = "2622500038";
const NAMA_LENGKAP = "Sifa Sukma Fira";
const KELAS = "SI1J";
const NAMA_WEBSITE = "Kelekak Bangka";
const TAGLINE = "Mengenal Kelekak Bangka";

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda - <?= NAMA_WEBSITE ?></title>
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
        <li><a href="index.php" aria-current="page">Beranda</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="pendaftaran.php">Pendaftaran</a></li>
        <li><a href="artikel.php">Artikel</a></li>
      </ul>
    </nav>

    <main>
      <section id="home">
        <h2>Apa Itu Kelekak dan kelekak Bangka?</h2>

        <figure>
          <img
            class="gambar-utama"
            src="img/foto-mentilin.jpeg" width="100" height="140"
            alt="foto satwa terlindungi di Kelekak Bangka" />
          <figcaption>Ini adalah Mentilin (Tarsius bancanus bancanus), satwa terlindungi yang hanya ada di Bangka. Beruntung, kearifan lokal masyarakat kita lewat Kelekak Bangka berhasil menjadi rumah yang aman bagi mereka.</figcaption>
        </figure>

        <p>
          <strong>Kelekak</strong> adalah sistem agroforestri tradisional atau kebun campuran hutan-budidaya yang dikelola secara turun-temurun oleh masyarakat asli Kepulauan Bangka Belitung. Berasal dari kata "kelak" (nanti) dan "kak" (di sana), kelekak secara harfiah bermakna "sesuatu yang ditinggalkan di sana untuk masa depan".
          Sistem ini merupakan wujud nyata dari kearifan lokal dalam menjaga keseimbangan antara pemenuhan kebutuhan ekonomi dan pelestarian alam.
        </p>
        <p>
          Sedangkan, <strong>Kelekak Bangka</strong> merupakan sebuah organisasi atau komunitas yang menjadi wadah bagi generasi muda dan masyarakat untuk berkumpul, berkolaborasi, serta mengembangkan potensi diri dalam berbagai bidang, khususnya budaya, tradisi, dan kearifan lokal Bangka.
          Organisasi ini hadir sebagai ruang untuk mempererat persaudaraan, membangun kreativitas, menumbuhkan kepedulian sosial, serta memperkenalkan dan melestarikan identitas budaya Bangka kepada generasi berikutnya.
        </p>
        <h3>Kegiatan dan Program Organisasi</h3>
        <ul>
          <li><strong>Camping dan Edutrip</strong> - Kegiatan berkemah sekaligus belajar di alam terbuka.</li>
          <li><strong>Menjelajahi Flora Fauna yang ada di Kelekak Bangka</strong> - mengeksplorasi berbagai jenis tumbuhan dan satwa yang terlindungi.</li>
          <li><strong>Menjelajahi sungai Amazon Bangka</strong> - eksplorasi alam dan belajar tentang ekosistem sungai.</li>
          <li><strong>Ekspedisi Geopark yang ada di Bukit Nenek desa Gudang</strong> - eksplorasi area geologi dan belajar tentang sejarah alam.</li>
        </ul>

        <div class="tabel-wrap">
          <table>
            <caption>Agenda Kegiatan Kelekak Bangka</caption>
            <thead>
              <tr>
                <th>Hari</th>
                <th>Kegiatan</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Senin</td>
                <td>Diskusi komunitas</td>
                <td>Membahas rencana kegiatan</td>
              </tr>
              <tr>
                <td>Rabu</td>
                <td>Eksplorasi alam</td>
                <td>Mengenal flora dan fauna</td>
              </tr>
              <tr>
                <td>Jumat</td>
                <td>Edukasi Lingkungan</td>
                <td>Belajar tentang ekologi dan konservasi</td>
              </tr>
              <tr>
                <td>Sabtu</td>
                <td>Camping dan Edutrip</td>
                <td>Belajar di alam terbuka</td>
              </tr>
              <tr>
                <td>Minggu</td>
                <td>Refleksi dan evaluasi</td>
                <td>Menilai kegiatan dan merencanakan ke depan</td>
            </tbody>
          </table>
        </div>
      </section>
    </main>

    <footer>
      <p>&copy;<?= NIM ?>_<?= NAMA_LENGKAP ?>_<?= KELAS ?>_ UTS Pemrograman Web Dasar.</p>
    </footer>

  </div>
  <script src="script.js"></script>
</body>
</html>
