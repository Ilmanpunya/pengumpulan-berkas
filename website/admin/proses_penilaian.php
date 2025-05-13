<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_pic = mysqli_real_escape_string($mysqli, $_POST['nama_pic']);
    $penilaian = mysqli_real_escape_string($mysqli, $_POST['penilaian']);

    $query = "UPDATE pengumpulan SET nilai='$penilaian', nama_pic='$nama_pic' WHERE id=$id";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Penilaian berhasil disimpan!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan penilaian.'); window.history.back();</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
