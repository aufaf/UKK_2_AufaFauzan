// ===== GREETING SESUAI WAKTU =====
const greetingText = document.querySelector(".card h2");

const hour = new Date().getHours();
let greet = "Selamat Datang";

if(hour < 12){
  greet = "Selamat Pagi ☀️";
}
else if(hour < 18){
  greet = "Selamat Siang 🌤️";
}
else{
  greet = "Selamat Malam 🌙";
}

if(greetingText){
  greetingText.innerText = greet + " 👋";
}


// ===== ANIMASI ANGKA STATISTIK =====
const counters = document.querySelectorAll(".stat p");

counters.forEach(counter => {
  let target = parseInt(counter.innerText) || 0;
  let count = 0;

  let increment = target / 50;

  let update = () => {
    count += increment;
    if(count < target){
      counter.innerText = Math.floor(count);
      requestAnimationFrame(update);
    } else {
      counter.innerText = target;
    }
  };

  update();
});


// ===== KONFIRMASI LOGOUT =====
const logoutBtn = document.querySelector("a[href*='logout']");

if(logoutBtn){
  logoutBtn.addEventListener("click", function(e){
    if(!confirm("Yakin mau logout?")){
      e.preventDefault();
    }
  });
}


// ===== HIGHLIGHT MENU AKTIF =====
const links = document.querySelectorAll(".sidebar a");

links.forEach(link=>{
  if(link.href === window.location.href){
    link.style.background = "#1abc9c";
  }
});

function toggleSidebar(){
  document.querySelector(".sidebar").classList.toggle("hide");
}

