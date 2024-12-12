<?php
session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: ../auth/login.php');
    exit;
}

include 'functions.php';

if (isset($_POST['create'])) {
    create($_POST);
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">E-Report</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="../index.php">Beranda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="create.php">Buat Pengaduan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../auth/logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="container mt-5">
        <h1 class="text-center">Pengaduan Masyarakat</h1>
        <p class="text-center">Silakan ajukan pengaduan Anda di bawah ini.</p>

        <div id="form" class="mt-4">
            <div class="card">
                <div class="card-header">
                    Form Pengaduan
                </div>
                <div class="card-body">
                    <form id="reportForm" method="post">
                        <div class="form-group">
                            <label for="name">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Nomer Hp:</label>
                            <input type="number" class="form-control" id="nomer_hp" name="nomer_hp"
                                placeholder="Masukkan nomor hp Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="report">Pengaduan:</label>
                            <textarea class="form-control" id="pengaduan" name="pengaduan" rows="5"
                                placeholder="Tuliskan pengaduan Anda" required></textarea>
                        </div>
                        <button type="submit" name="create" id="create" class="btn btn-primary">Kirim
                            Pengaduan</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="alert alert-info mt-5" role="alert">
            <strong>Info:</strong> Semua pengaduan yang masuk akan diproses dan ditindaklanjuti oleh pihak berwenang.
        </div>

<footer class="bg-light text-center py-3 mt-2">
    <p>&copy; 2023 E-Report. Semua Hak Dilindungi.</p>
</footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
