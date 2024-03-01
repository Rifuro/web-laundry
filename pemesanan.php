<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.php");
    exit; // Pastikan untuk keluar dari skrip setelah mengalihkan
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Laundry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            background-color: #fff;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Pemesanan Laundry</h2>
                <form action="pemesananproses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengambilan">Tanggal Pengambilan:</label>
                        <input type="date" class="form-control" id="tanggal_pengambilan" name="tanggal_pengambilan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengantaran">Tanggal Pengantaran:</label>
                        <input type="date" class="form-control" id="tanggal_pengantaran" name="tanggal_pengantaran" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_laundry">Jenis Laundry:</label>
                        <select class="form-control" id="jenis_laundry" name="jenis_laundry" required>
                            <option value="">Pilih jenis laundry</option>
                            <option value="Cuci Basah">Cuci Basah</option>
                            <option value="Cuci Kering">Cuci Kering</option>
                            <option value="Setrika">Setrika</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat (kg):</label>
                        <input type="number" class="form-control" id="berat" name="berat" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
