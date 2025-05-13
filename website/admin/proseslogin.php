<?php
session_start();
require_once("config.php");

$username = $_POST['username'];
$pass = md5($_POST['password']);

$cekuser = mysqli_query($mysqli, "SELECT * FROM admin WHERE username = '$username'");
$hasil = mysqli_fetch_array($cekuser);

if (mysqli_num_rows($cekuser) == 0) {
  echo "
  <script>
      alert('Admin belum terdaftar!');
      window.location.href = 'login.php';
  </script>
  ";
} else {
  if ($pass != $hasil['password']) {
    echo "
      <script>
          alert('Password salah!');
          window.location.href = 'login.php';
      </script>
      ";
  } else {
    // Generate token
    $token = md5(uniqid(rand(), true));
    mysqli_query($mysqli, "UPDATE admin SET token = '$token' WHERE username = '$username'");

    // Simpan di session dan localStorage
    $_SESSION['username'] = $hasil['username'];
    $_SESSION['token'] = $token;

    echo "
      <script>
          localStorage.setItem('token', '$token');
          localStorage.setItem('username', '$username');
          window.location.href = 'index.php';
      </script>
      ";
  }
}
?>