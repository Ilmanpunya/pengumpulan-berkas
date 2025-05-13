<?php
include_once("config.php"); // koneksi ke database

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // 🔥 Sama kayak admin: password di-MD5
    $pic_name = $_POST['pic_uppkb'];

    // Simpan ke database (TANPA token)
    $result = mysqli_query($mysqli, "INSERT INTO users(email, username, password, pic_uppkb)
    VALUES('$email', '$username', '$password', '$pic_name')");

    // Redirect
    if ($result) {
        header("Location: datausers.php?status=sukses");
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>
