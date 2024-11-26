<?php
session_start();

if ( isset($_SESSION['login']) ) { 
    header('Location: ../index.php');
    exit;
}

include('functions.php'); 

if( isset($_POST['register']) ) {
    register(request: $_POST);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php include '../complements/header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">Pendaftaran</h1>
        <div class="card">
            <div class="card-header">
                Buat Akun Baru
            </div>
            <div class="card-body">
                <form id="registerForm" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password:</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan password"
                            required>
                    </div>
                    <button type="submit" name="register" id="register" class="btn btn-primary">Daftar</button>
                </form>
                <div class="mt-3">
                    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>