<?php
session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: ../auth/login.php');
    exit;
}

include '../config/connect.php';

$id = $_POST['id'];

$result = mysqli_query($conn, "DELETE FROM reports WHERE id = '$id'");

if ($result) {
    echo "<script>
    alert('Pengaduan Berhasil Dihapus');
    window.location.href = ('../index.php');
</script>";

} else {
    echo '<script>
    alert("Pengaduan Gagal Dihapus!");</script>';
}