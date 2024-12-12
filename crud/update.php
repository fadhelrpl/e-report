<?php
session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: ../auth/login.php');
    exit;
}

include '../config/connect.php';
include 'functions.php';

if (isset($_POST['update'])) {
    update($_POST);
}

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $result = mysqli_query($conn, "SELECT * FROM reports WHERE id = '$id'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Data dengan ID tersebut tidak ditemukan!");
    }
} else {
    die("ID tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan - E-Report</title>
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
        <h1 class="text-center mb-4">Edit Pengaduan</h1>

        <div class="card">
            <div class="card-header">
                Ubah Data Pengaduan
            </div>
            <div class="card-body">
                <form id="editForm" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="<?php echo $row['nama_lengkap']; ?>" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Nomer Hp:</label>
                        <input type="number" class="form-control" id="nomer_hp" name="nomer_hp"
                            value="<?php echo $row['nomer_hp']; ?>" placeholder="Masukkan nomer hp Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="report">Pengaduan:</label>
                        <textarea class="form-control" id="pengaduan" name="pengaduan" rows="5"
                            placeholder="Tuliskan pengaduan Anda" required><?php echo $row['pengaduan']; ?></textarea>
                    </div>
                    <button type="submit" name="update" id="update" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>

    <div class="alert alert-info mt-5" role="alert">
            <strong>Info:</strong> Semua pengaduan yang masuk akan diproses dan ditindaklanjuti oleh pihak berwenang.
        </div>
    </div>

<footer class="bg-light text-center py-3 mt-2">
    <p>&copy; 2023 E-Report. Semua Hak Dilindungi.</p>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
