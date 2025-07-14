<?php
session_start();
require_once '../includes/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['user'] = $email;
        header("Location: cari.php");
        exit();
    } else {
        $error = "Login gagal. Cek email/password.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Bengkel Online</title>
    <link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="../assets/css/style_login.css">
</head>
<body>
  <div class="form-wrapper">
    <div class="login-box-kip">
      <h2 class="form-title">Login Bengkel Online</h2>
      <?php if (isset($error)) echo "<p class='error-msg'>$error</p>"; ?>
      <form method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="user@example.com" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password" required>

        <button type="submit" name="login">Login</button>
        <p class="note">Belum punya akun? Hubungi admin bengkel.</p>
      </form>
    </div>
  </div>
</body>

</html>
