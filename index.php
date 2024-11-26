<?php
session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: auth/login.php');
    exit;
}

include 'config/connect.php'; // Pastikan file koneksi sudah benar

// Ambil data dari tabel 'reports'
$query = "SELECT * FROM reports";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>

<body>

    <?php include 'complements/header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">Pengaduan Masyarakat</h1>
        <p class="text-center">Daftar Pengaduan.</p>
        <div class="mt-5">
            <h2>Daftar Pengaduan</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nomer HP</th>
                        <th>Pengaduan</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['nama_lengkap']); ?></td>
                                <td><?php echo htmlspecialchars($row['nomer_hp']); ?></td>
                                <td><?php echo htmlspecialchars($row['pengaduan']); ?></td>
                                <td><?php echo htmlspecialchars($row['tanggal_dibuat']); ?></td>
                                <td>
                                    <form method="POST" action="crud/update.php" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                    </form>
                                    <form method="POST" action="crud/delete.php" style="display: inline;" onsubmit="return confirm('Hapus pengaduan ini?');">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pengaduan</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php include 'complements/footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>