<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cari Bengkel</title>    
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/cari.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <header class="header">
    <h1>🔧 Cari Bengkel</h1>
    <p>Temukan bengkel terpercaya untuk kendaraanmu</p>
  </header>

  <div class="search-wrapper">
    <form method="GET">
      <input type="text" name="keyword" placeholder="Cari layanan..." class="search-input">
      <select name="kategori" class="search-select">
        <option value="">Semua Kategori</option>
        <!-- kategori lainnya -->
      </select>
      <button type="submit" class="search-btn">Cari</button>
    </form>
  </div>

  <a href="tambah_bengkel.php" class="btn-add">➕ Tambah Bengkel</a>

  <div class="grid-container">
    <div class="card">
      <img src="../assets/img/WhatsApp Image 2025-07-14 at 21.22.03.jpeg" alt="Bengkel Sejahtera" class="bengkel-img">
        <h3>Bengkel Sejahtera</h3>
          <p>📍 Jl. Kenangan No.1, Jakarta</p>
            <a href="booking.php?id=1" class="btn-book">Booking</a>
              <br><br>
            <a href="edit.php?id=1" class="btn-edit">Edit</a>
            <a href="delete.php?id=1" class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Delete</a>
    </div>

    <div class="card">
      <img src="../assets/img/WhatsApp Image 2025-07-14 at 21.20.31.jpeg" alt="Bengkel Sejahtera" class="bengkel-img">
        <h3>Bengkel Sejahtera</h3>
          <p>📍 Jl. Kenangan No.1, Jakarta</p>
            <a href="booking.php?id=1" class="btn-book">Booking</a>
              <br><br>
            <a href="edit.php?id=1" class="btn-edit">Edit</a>
            <a href="delete.php?id=1" class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Delete</a>
    </div>


    <!-- Tambahkan kartu bengkel lain -->
  </div>
</body>
</html>
