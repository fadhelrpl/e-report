<?php
include('../config/connect.php');
function create($request)
{
    global $conn;

    $nama_lengkap = $request['nama_lengkap'];
    $nomer_hp = $request['nomer_hp'];
    $pengaduan = $request['pengaduan'];
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_dibuat = date('Y-m-d H:i:s');

    $result = mysqli_query($conn, "INSERT INTO reports (id, nama_lengkap, nomer_hp, pengaduan, tanggal_dibuat) VALUES (id, '$nama_lengkap', '$nomer_hp', '$pengaduan', '$tanggal_dibuat')");

    if ($result) {
        echo "<script>
    alert('Pengaduan Berhasil Ditambahkan');
    window.location.href = ('../index.php');
</script>";
    } else {
        echo '<script>
    alert("Pengaduan Gagal Disimpan!");</script>';
    }
}

function update($request)
{
    global $conn;

    $id = $request['id'];
    $nama_lengkap = $request['nama_lengkap'];
    $nomer_hp = $request['nomer_hp'];
    $pengaduan = $request['pengaduan'];

    $result = mysqli_query($conn, "UPDATE reports SET nama_lengkap = '$nama_lengkap', nomer_hp = '$nomer_hp', pengaduan = '$pengaduan' WHERE id = '$id'");
    if ($result) {
        echo "<script>
        alert('Pengaduan Berhasil Diubah');
        window.location.href = ('../index.php');
    </script>";
    } else {
        echo '<script>
        alert("Pengaduan Gagal Diubah!");</script>';
    }
}
