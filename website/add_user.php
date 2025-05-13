<?php
include_once("config.php"); // koneksi ke database

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // pakai md5
    $pic_name = $_POST['pic_uppkb'];
    $token = ''; // kosongkan token saat register

    // Simpan ke database
    $result = mysqli_query($mysqli, "INSERT INTO users(email, username, password, pic_uppkb, token)
    VALUES('$email', '$username', '$password', '$pic_name', '$token')");

    // Redirect
    if ($result) {
        header("Location: login_user.php?status=sukses");
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>
