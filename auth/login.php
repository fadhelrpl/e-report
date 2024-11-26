<?php

session_start(); // -> harus ditambahkan setiap kali menggunakan session

// REDIRECT USER YANG SUDAH LOGIN KE INDEX
if ( isset($_SESSION['login']) ) { // -> APAKAH $_SESSION['LOGIN'] SUDAH DIDEKLARASI?
    header('Location: ../index.php');
    exit;
}

include('functions.php'); // -> MENYERTAKAN FILE LAIN KE FILE INI

if( isset($_POST['login']) ) {
    login(request: $_POST);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php include '../complements/header.php' ?>

    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <div class="card">
            <div class="card-header">
                Masuk ke Akun Anda
            </div>
            <div class="card-body">
                <form id="loginForm" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"
                            required>
                    </div>
                    <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                </form>
                <div class="mt-3">
                    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; 2023 E-Report. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>