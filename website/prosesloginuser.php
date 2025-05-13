<?php
session_start();
require_once("config.php");


$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password_input_raw = $_POST['password'];



if (empty($username) || empty($password_input_raw)) {
    echo "
    <script>
        alert('Username dan password tidak boleh kosong!');
        window.location.href = 'login_user.php';
    </script>
    ";
    exit();
}

$password_input = md5($password_input_raw); 

$cekuser = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username'");
$hasil = mysqli_fetch_array($cekuser);

if (mysqli_num_rows($cekuser) == 0) {
    echo "
    <script>
        alert('Username belum terdaftar!');
        window.location.href = 'login_user.php';
    </script>
    ";
} else {
    // Cek password (MD5)
    if ($password_input != $hasil['password']) {
        echo "
        <script>
            alert('Password salah!');
            window.location.href = 'login_user.php';
        </script>
        ";
    } else {
        // Generate token
        $token = md5(uniqid(rand(), true));
        mysqli_query($mysqli, "UPDATE users SET token = '$token' WHERE username = '$username'");

        // Simpan di session dan localStorage
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['id_users'] = $hasil['id_users']; // Pastikan kolom id_users benar
        $_SESSION['token'] = $token;

        echo "
        <script>
            localStorage.setItem('token', '$token');
            localStorage.setItem('username', '$username');
            window.location.href = 'index.php'; // ke dashboard user
        </script>
        ";
    }
}
?>
