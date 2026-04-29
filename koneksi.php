<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_portofolio";

try {
    // Di file koneksi.php
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Mengatur mode error PDO ke Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>