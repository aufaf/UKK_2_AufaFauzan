const zones = ['A','B','C'];
let currentZone = 0;
const grid = document.getElementById('parkingGrid');
const title = document.getElementById('zoneTitle');
const slotInput = document.getElementById('slotInput');

function renderZone() {
  grid.innerHTML = '';
  title.innerText = `Zona ${zones[currentZone]}`;

  for (let i = 1; i <= 8; i++) {
    const slot = document.createElement('div');
    slot.className = 'slot available';
    slot.innerText = zones[currentZone] + i;

    if (zones[currentZone] === 'A' && i === 1) {
      slot.classList.replace('available','occupied');
    }

    slot.onclick = () => {
      if (!slot.classList.contains('occupied')) {
        slotInput.value = slot.innerText;
      }
    };

    grid.appendChild(slot);
  }
}

function nextZone() {
  if (currentZone < zones.length - 1) {
    currentZone++;
    renderZone();
  }
}

function prevZone() {
  if (currentZone > 0) {
    currentZone--;
    renderZone();
  }
}

renderZone();