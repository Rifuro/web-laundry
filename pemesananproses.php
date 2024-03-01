<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.php");
    exit; // Pastikan untuk keluar dari skrip setelah mengalihkan
}

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

// Memeriksa apakah form pemesanan telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai-nilai dari formulir
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_laundry = $_POST['jenis_laundry'];
        $tanggal_pengambilan = $_POST['tanggal_pengambilan'];
        $tanggal_pengantaran = $_POST['tanggal_pengantaran'];
        $berat = $_POST['berat'];

    
        // Periksa apakah salah satu tanggal telah diisi
        if (empty($tanggal_pengambilan) && empty($tanggal_pengantaran)) {
            // Jika tidak ada yang diisi, tampilkan pesan kesalahan
            echo "Silakan isi tanggal pengambilan atau tanggal pengantaran.";
        } else {
            // Jika salah satu tanggal telah diisi, lanjutkan dengan penyimpanan data ke dalam database
            // Query untuk memasukkan data pemesanan ke dalam database
            $query = "INSERT INTO pemesanan (nama, alamat, jenis_laundry, tanggal_pengambilan, tanggal_pengantaran, berat) 
                      VALUES ('$nama', '$alamat', '$jenis_laundry', '$tanggal_pengambilan', '$tanggal_pengantaran', '$berat')";
    
            // Jalankan query dan tangani hasilnya
            if (mysqli_query($koneksi, $query)) {
                echo "Pemesanan berhasil. <a href='pemesanan.php'>Kembali</a>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        }
    }
?>
