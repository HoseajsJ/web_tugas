<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_bengkel'])) {
    $id_bengkel = $_POST['id_bengkel'];
    $user_email = $_SESSION['user'];

    // Ambil data bengkel yang dipilih
    $stmt = $conn->prepare("SELECT * FROM bengkel WHERE id = ?");
    $stmt->bind_param("i", $id_bengkel);
    $stmt->execute();
    $result = $stmt->get_result();
    $bengkel = $result->fetch_assoc();

    // Simpan booking ke tabel booking (optional)
    $stmt2 = $conn->prepare("INSERT INTO booking (email_user, id_bengkel, waktu_booking) VALUES (?, ?, NOW())");
    $stmt2->bind_param("si", $user_email, $id_bengkel);
    $stmt2->execute();
} else {
    header("Location: cari.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Sukses</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Booking Berhasil!</h2>
    <p>Anda telah berhasil booking di bengkel berikut:</p>
    <ul>
        <li><strong>Nama Bengkel:</strong> <?= $bengkel['nama']; ?></li>
        <li><strong>Alamat:</strong> <?= $bengkel['alamat']; ?></li>
    </ul>

    <a href="cari.php">🔍 Cari Bengkel Lain</a> |
    <a href="../logout.php">🚪 Logout</a>
</body>
</html>
