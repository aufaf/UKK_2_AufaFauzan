<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>

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
  display: flex;
}

/* Sidebar */
.sidebar {
  width: 260px;
  background: linear-gradient(180deg, #0f172a, #020617);
  min-height: 100vh;
  padding: 30px 0;
  position: fixed;
}

.sidebar h2 {
  text-align: center;
  color: #e5e7eb;
  margin-bottom: 40px;
  font-weight: 600;
  letter-spacing: 1px;
}

.sidebar a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 32px;
  color: #cbd5f5;
  text-decoration: none;
  font-size: 14px;
  transition: all 0.3s ease;
}

.sidebar a:hover {
  background-color: rgba(255,255,255,0.08);
  color: #ffffff;
  border-left: 4px solid #6366f1;
}

/* Main Content */
.main-content {
  margin-left: 260px;
  width: calc(100% - 260px);
}

/* Navbar */
.navbar {
  background-color: #ffffff;
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

/* Content */
.container {
  padding: 30px;
}

.card {
  background-color: #ffffff;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.06);
}

.card h2 {
  margin-bottom: 12px;
  color: #0f172a;
}

.card p {
  color: #64748b;
}
</style>
</head>

<body>

<div class="sidebar">
  <h2>ADMIN PANEL</h2>
  <a href="tampil_data_user.php">👤 Kelola User</a>
  <a href="tampil_data_tarif.php">💳 Tarif Parkir</a>
  <a href="tampil_data_area.php">📍 Area Parkir</a>
  <a href="tampil_data_kendaraan.php">🚘 Kendaraan</a>
  <a href="#">📑 Log Aktivitas</a>
  <a href="v_login.php">🚪 Logout</a>
</div>

<div class="main-content">
  <div class="navbar">
    <h1>Dashboard</h1>
    <span>👤 Admin</span>
  </div>

  <div class="container">
    <div class="card">
      <h2>Selamat Datang 👋</h2>
      <p>Kelola data parkir dengan tampilan dashboard modern dan profesional.</p>
    </div>
  </div>
</div>

</body>
</html>
