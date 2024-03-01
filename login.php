<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00bcd4;
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
        .register-link {
            color: #007bff;
        }
        .register-link:hover {
            text-decoration: none;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>
                        <?php
                        // Periksa apakah ada parameter error pada URL
                        if (isset($_GET['error']) && $_GET['error'] === 'invalid') {
                            // Jika ada, tampilkan pesan kesalahan
                            echo "<div class='alert alert-danger' role='alert'>Login failed. Invalid username or password.</div>";
                        }
                        ?>
                        <form action="loginproses.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="register.php" class="register-link">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
