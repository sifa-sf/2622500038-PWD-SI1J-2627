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
  <title>Artikel - <?= NAMA_WEBSITE ?></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="layout">

    
    <header>
      <div class="header-top">
        <div class="brand">
          <img class="logo" src="img/logo-kelekakBangka.jpeg" alt="Logo <?= NAMA_WEBSITE ?>" />
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
        <li><a href="pendaftaran.php">Pendaftaran</a></li>
        <li><a href="artikel.php" aria-current="page">Artikel</a></li>
      </ul>
    </nav>

    
    <main>
      <section id="articles">
        <h2>Artikel Terbaru</h2>

        <article>
          <h3>Mengenal Kelekak Bangka: Warisan Alam dan Budaya Masyarakat Melayu</h3>
          <p class="meta">warisan alam dan budaya</p>
          <p>
            Melalui pelestarian kelekak, masyarakat diajak untuk lebih mengenal kekayaan alam Bangka serta memahami pentingnya menjaga warisan alam agar tetap lestari untuk generasi mendatang.
            Kelekak Bangka menjadi pengingat bahwa alam bukan sekadar sumber daya, melainkan warisan yang harus dijaga bersama.
          </p>
        </article>

        <article>
          <h3>Menjaga Kelekak, Menjaga Warisan untuk Generasi Mendatang</h3>
          <p class="meta">pelestarian lingkungan</p>
          <p>
           Kelekak mengajarkan masyarakat untuk menanam dan merawat pepohonan yang hasilnya dapat dinikmati oleh generasi berikutnya. Nilai tersebut mengandung pesan sederhana tetapi bermakna, yaitu pentingnya memikirkan masa depan dan tidak hanya mengambil manfaat dari alam untuk saat ini.
           Namun, kelestarian kawasan kelekak membutuhkan perhatian dan kepedulian bersama. Berbagai upaya dapat dilakukan, mulai dari menanam pohon, menjaga kebersihan lingkungan, mengenal keanekaragaman hayati, hingga mengajak generasi muda untuk ikut serta dalam kegiatan pelestarian alam. 
            Melalui semangat kebersamaan, Kelekak Bangka diharapkan tetap menjadi bagian dari identitas masyarakat sekaligus warisan lingkungan yang dapat dinikmati oleh anak cucu di masa depan.
          </p>
        </article>

        <article>
          <h3>Menjelajahi Keindahan Alam dan Sungai di Bangka</h3>
          <p class="meta">Eksplorasi Alam</p>
          <p>
            Bangka tidak hanya dikenal dengan kekayaan budaya dan sejarahnya, tetapi juga memiliki keindahan alam yang menarik untuk dijelajahi. Hutan, sungai, perbukitan, serta berbagai kawasan alami menjadi bagian dari kekayaan lingkungan yang perlu dikenal dan dijaga.
Menjelajahi alam merupakan salah satu cara untuk mengenal lingkungan secara lebih dekat. Melalui kegiatan seperti susur sungai, camping, dan eksplorasi alam, peserta dapat memperoleh pengalaman sekaligus pengetahuan baru mengenai ekosistem dan keanekaragaman hayati.
Kegiatan tersebut juga menjadi kesempatan untuk menumbuhkan rasa cinta terhadap alam, membangun kebersamaan, serta meningkatkan kesadaran akan pentingnya menjaga lingkungan.
          </p>
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