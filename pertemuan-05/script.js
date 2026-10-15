const navToggle = document.getElementById("navToggle");
    navToggle.addEventListener("click", () => { 
    console.log("Tombol navigasi diklik."); 
}); 

const navMenu = document.getElementById("navMenu");

contactForm.addEventListener("submit", (event) => {
  console.log("Form dikirim.");
});

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("submit", (event) => { 
console.log(event); 
});
