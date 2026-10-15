const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");
const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

const namaInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesanInput = document.getElementById("pesan");

navToggle.addEventListener("click", () => {
  const isOpen = navMenu.classList.toggle("nav-open");

  navToggle.setAttribute("aria-expanded", isOpen);

  if (isOpen) {
    navToggle.setAttribute("aria-label", "Tutup navigasi");
  } else {
    navToggle.setAttribute("aria-label", "Buka navigasi");
  }
});

contactForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const nama = namaInput.value.trim();
  const email = emailInput.value.trim();
  const semester = Number(semesterInput.value);
  const tanggal = tanggalInput.value;
  const jenisPesan = document.querySelector(
    'input[name="jenis_pesan"]:checked',
  );
  const topikDipilih = document.querySelectorAll('input[name="minat"]:checked');
  const prodi = prodiInput.value;
  const pesan = pesanInput.value.trim();

     console.log(nama, email, semester, tanggal, jenisPesan, topikDipilih.length, prodi, pesan);
  console.log("Form dikirim.");
  // Proses validasi formulir (dibuat di bagian I).
});

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
});