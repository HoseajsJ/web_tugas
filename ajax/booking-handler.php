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

    // Simpan booking ke tabel booking
    $stmt2 = $conn->prepare("INSERT INTO booking (email_user, id_bengkel, waktu_booking) VALUES (?, ?, NOW())");
    $stmt2->bind_param("si", $user_email, $id_bengkel);
    $stmt2->execute();

    // Redirect ke halaman sukses
    header("Location: ../pages/booking.php?id=" . $id_bengkel);
    exit();
} else {
    header("Location: cari.php");
    exit();
}
?>
