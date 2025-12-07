// Copiar IP
function copiarIP() {
  navigator.clipboard.writeText("Coloco o IP");
  alert("IP copiado para a área de transferência!");
}

// Detectar Mobile Automaticamente
const isMobile = /Android|iPhone|iPad|iPod|Windows Phone/i.test(navigator.userAgent);

if (isMobile) {
  document.body.classList.add("mobile");
} else {
  document.body.classList.add("pc");
}

// Trailer Modal
const trailerBtn = document.querySelector(".btn.trailer");
const modal = document.getElementById("trailerModal");
const closeBtn = document.querySelector(".close");
const video = document.getElementById("trailerVideo");

trailerBtn.addEventListener("click", function(e) {
  e.preventDefault();
  modal.style.display = "flex";
  video.play();
});

closeBtn.addEventListener("click", function() {
  modal.style.display = "none";
  video.pause();
  video.currentTime = 0;
});

window.onclick = function(e) {
  if (e.target === modal) {
    modal.style.display = "none";
    video.pause();
    video.currentTime = 0;
  }
};
