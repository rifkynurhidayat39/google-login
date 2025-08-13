<?php
$host = "localhost";
$user = "root"; // ganti sesuai hosting
$pass = "";     // ganti sesuai hosting
$db   = "simulasi";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// hash password biar aman
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users_login_simulasi (email, password_hash) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password_hash);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: success.html");
exit;
?>
