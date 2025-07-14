<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "ID Bengkel tidak ditemukan.";
    exit();
}

$id_bengkel = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM bengkel WHERE id = ?");
$stmt->bind_param("i", $id_bengkel);
$stmt->execute();
$result = $stmt->get_result();
$bengkel = $result->fetch_assoc();

if (!$bengkel) {
    echo "Data bengkel tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Berhasil</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/booking.css">
</head>
<body>
    <div class="booking-container">
        <div class="booking-card">
            <div class="icon">✅</div>
            <h2>Booking Berhasil!</h2>
            <p>Terima kasih telah melakukan booking di:</p>
            <div class="bengkel-info">
                <p><strong>Nama Bengkel:</strong> <?= htmlspecialchars($bengkel['nama']); ?></p>
                <p><strong>Alamat:</strong> <?= htmlspecialchars($bengkel['alamat']); ?></p>
            </div>
            <div class="btn-group">
                <a href="cari.php" class="btn">🔍 Cari Bengkel Lain</a>
                <a href="../logout.php" class="btn danger">🚪 Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
