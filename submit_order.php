<?php
// Pastikan sudah ada koneksi ke database sebelumnya

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    // Lakukan penyimpanan data ke database
    $query = "INSERT INTO orders (nama_pelanggan, alamat, nomor_telepon) VALUES ('$nama_pelanggan', '$alamat', '$nomor_telepon')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Order placed successfully.";
    } else {
        echo "Failed to place order.";
    }
}
?>
