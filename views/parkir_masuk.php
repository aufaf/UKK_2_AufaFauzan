<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Parkir Masuk</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', sans-serif;
  background-color: #f1f5f9;
}

/* ===== NAVBAR ===== */
.navbar {
  background: #ffffff;
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.navbar h1 {
  font-size: 20px;
  color: #0f172a;
  font-weight: 600;
}

.navbar span {
  font-size: 14px;
  color: #475569;
}

/* ===== CONTENT ===== */
.container {
  padding: 30px;
  display: grid;
  grid-template-columns: 360px 1fr;
  gap: 30px;
}

/* ===== CARD ===== */
.card {
  background: #ffffff;
  padding: 26px;
  border-radius: 18px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.06);
}

.card h2 {
  margin-bottom: 18px;
  color: #0f172a;
}

/* ===== FORM ===== */
label {
  font-size: 13px;
  font-weight: 500;
  color: #475569;
}

input, select {
  width: 100%;
  padding: 11px;
  margin: 8px 0 16px;
  border-radius: 12px;
  border: 1px solid #cbd5e1;
}

button {
  width: 100%;
  padding: 12px;
  background: #6366f1;
  color: #ffffff;
  border: none;
  border-radius: 12px;
  font-weight: 500;
  cursor: pointer;
}

button:hover {
  background: #4f46e5;
}

/* ===== SLOT GRID ===== */
.grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 14px;
}

.slot {
  padding: 22px;
  text-align: center;
  border-radius: 14px;
  font-weight: 600;
  cursor: pointer;
}

.available {
  background: #e0e7ff;
  color: #1e3a8a;
}

.occupied {
  background: #fee2e2;
  color: #991b1b;
}

/* ===== NAV ZONE ===== */
.zone-nav {
  display: flex;
  gap: 12px;
  margin-top: 20px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
  <h1>🚗 Parkir Masuk</h1>
  <span>👤 Petugas</span>
</div>

<!-- CONTENT -->
<div class="container">

  <!-- FORM -->
  <div class="card">
    <h2>Tambah Parkir Masuk</h2>

    <form method="POST" action="index.php?c=parkir&a=masuk">
      <label>Plat Nomor</label>
      <input type="text" placeholder="B 1234 ABC">

      <label>Jenis Kendaraan</label>
      <select>
        <option>Motor</option>
        <option>Mobil</option>
        <option>Lainnya</option>
      </select>

      <label>Slot Parkir</label>
      <input type="text" id="slotInput" readonly placeholder="Klik slot di kanan">

      <button type="submit">Cetak Struk</button>
    </form>
  </div>

  <!-- SLOT & DATA -->
  <div>

    <!-- SLOT -->
    <div class="card">
      <h2 id="zoneTitle">Zona A</h2>

      <div class="grid" id="parkingGrid"></div>

      <div class="zone-nav">
        <button onclick="prevZone()">⬅ Sebelumnya</button>
        <button onclick="nextZone()">Selanjutnya ➡</button>
      </div>
    </div>

    <!-- DATA -->
    <div class="card" style="margin-top:30px;">
      <h2>Data Parkir Masuk</h2>

      <table width="100%">
        <tr>
          <th align="left">Plat</th>
          <th align="left">Jenis</th>
          <th align="left">Area</th>
          <th align="left">Jam Masuk</th>
        </tr>
        <tr>
          <td>B 1234 ABC</td>
          <td>Mobil</td>
          <td>A1</td>
          <td>10:30</td>
        </tr>
      </table>
    </div>

  </div>
</div>

<script src = "../asset/js/newpage.js"></script>

</body>
</html>
