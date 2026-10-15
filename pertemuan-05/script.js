const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");
const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

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

  console.log("Form dikirim.");
  // Proses validasi formulir (dibuat di bagian I).
});

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
});