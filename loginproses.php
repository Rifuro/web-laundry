<?php
// Membuat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry";
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi login dengan menggunakan koneksi yang telah didefinisikan
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika login berhasil, redirect ke halaman pemesanan laundry
        session_start();
        $_SESSION['username'] = $username;
        header("Location: pemesanan.php");
        exit;
    } else {
        // Jika login gagal, redirect kembali ke halaman login dengan pesan kesalahan
        header("Location: login.php?error=invalid");
        exit;
    }
}
?>