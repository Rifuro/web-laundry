<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry";
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah form pendaftaran telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memasukkan data ke dalam database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($koneksi, $query)) {
        echo "Registrasi berhasil. Silakan <a href='pemesanan.php'>login</a>.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
