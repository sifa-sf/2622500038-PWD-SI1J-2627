/* ==========================================================
   script.js - UTS Pemrograman Web Dasar (Blog Pribadi)
   Mengikuti modul:
   P5 : DOM, event listener, hamburger menu, validasi formulir sisi klien
   P7 : setelah validasi berhasil, formulir dikirim ke PHP (submit())
   ========================================================== */

/* ---------- 1. Hamburger menu (P5 H) ---------- */
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", () => {
  const isOpen = navMenu.classList.toggle("nav-open");
  navToggle.setAttribute("aria-expanded", isOpen);

  if (isOpen) {
    navToggle.setAttribute("aria-label", "Tutup navigasi");
  } else {
    navToggle.setAttribute("aria-label", "Buka navigasi");
  }
});

/* ---------- 2. Validasi formulir Pendaftaran (P5 I dan J) ----------
   Formulir hanya ada di halaman pendaftaran.php, sehingga blok ini
   dijalankan hanya jika elemen formulirnya ditemukan.                  */
const pendaftaranForm = document.getElementById("pendaftaranForm");

if (pendaftaranForm) {
  const formFeedback = document.getElementById("formFeedback");
  const namaInput = document.getElementById("nama");
  const emailInput = document.getElementById("email");
  const semesterInput = document.getElementById("semester");
  const tanggalInput = document.getElementById("tanggal");
  const prodiInput = document.getElementById("prodi");
  const alasanInput = document.getElementById("alasan");

  pendaftaranForm.addEventListener("submit", (event) => {
    // Cegah pengiriman bawaan peramban sampai seluruh validasi lolos
    event.preventDefault();
    formFeedback.className = "form-feedback-error";

    // Nama: 3 sampai 50 karakter
    const nama = namaInput.value.trim();
    if (nama.length < 3 || nama.length > 50) {
      formFeedback.textContent = "Nama lengkap harus diisi 3 sampai 50 karakter.";
      return;
    }

    // Email: pola sederhana
    const email = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      formFeedback.textContent = "Masukkan alamat email yang valid.";
      return;
    }

    // Semester: angka 1 sampai 14
    const semester = Number(semesterInput.value);
    if (semesterInput.value === "" || semester < 1 || semester > 14) {
      formFeedback.textContent = "Semester harus diisi dengan angka 1 sampai 14.";
      return;
    }

    // Tanggal pendaftaran
    const tanggal = tanggalInput.value;
    if (tanggal === "") {
      formFeedback.textContent = "Tanggal pendaftaran harus diisi.";
      return;
    }

    // Radio button: jenis keanggotaan
    const jenisAnggota = document.querySelector(
      'input[name="jenis_anggota"]:checked',
    );
    if (!jenisAnggota) {
      formFeedback.textContent = "Pilih jenis keanggotaan.";
      return;
    }

    // Checkbox: minimal satu topik (nama checkbox: minat[] sesuai P7 E.4)
    const topikDipilih = document.querySelectorAll(
      'input[name="minat[]"]:checked',
    );
    if (topikDipilih.length === 0) {
      formFeedback.textContent = "Pilih minimal satu topik yang diminati.";
      return;
    }

    // Select: program studi
    const prodi = prodiInput.value;
    if (prodi === "") {
      formFeedback.textContent = "Pilih program studi.";
      return;
    }

    // Textarea: alasan bergabung
    const alasan = alasanInput.value.trim();
    if (alasan.length === 0) {
      formFeedback.textContent = "Alasan bergabung harus diisi.";
      return;
    }
    if (alasan.length > 300) {
      formFeedback.textContent = "Alasan bergabung maksimal 300 karakter.";
      return;
    }

    // Semua pemeriksaan lolos
    formFeedback.textContent = "Form berhasil divalidasi.";
    formFeedback.className = "form-feedback-success";

    // P7 C.4: teruskan pengiriman ke PHP (metode POST) setelah validasi
    pendaftaranForm.submit();
  });

  // Hapus pesan ketika pengguna mengubah isian (P5 J.5)
  pendaftaranForm.addEventListener("input", () => {
    formFeedback.textContent = "";
  });

  // Hapus pesan ketika formulir di-reset (P5 J.6)
  pendaftaranForm.addEventListener("reset", () => {
    formFeedback.textContent = "";
  });
}
