<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:index.php');
}
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Users</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div style="margin-top: 50px;"></div>

                <!-- ICON di atas card -->
                <div
                    style="display: flex; justify-content: center; margin-bottom: -25px; z-index: 1; position: relative;">
                    <div
                        style="background: white; padding: 20px; border-radius: 50%; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <i class="fas fa-users" style="font-size: 50px; color:grey-600"></i>
                    </div>
                </div>

                <!-- CARD di bawah icon -->
                <div class="card o-hidden border-0 shadow-lg" style="position: relative; z-index: 0;">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Login Users</h1>
                            </div>
                            <form class="user" action="prosesloginuser.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user"
                                        placeholder="Username">
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Password" id="password">
                                    <span class="toggle-password" toggle="#password">
                                        <i class="fas fa-eye position-absolute"
                                            style="top: 50%; right: 25px; transform: translateY(-50%); cursor: pointer;"></i>
                                    </span>
                                </div>
                                <input class="btn btn-primary btn-user btn-block" type="submit" name="Submit"
                                    value="Login">
                                <a href="registeruser.php" class="btn btn-success btn-user btn-block"
                                    style="color: white; text-decoration: none;">
                                    Registrasi
                                </a>
                                <a href="admin/login.php"
                                    style="display: block; text-align: center; margin-top: 20px; color: #007bff; text-decoration: underline; font-size: 12px;">
                                    Login sebagai Admin?
                                </a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        // Toggle visibility untuk semua field dengan class toggle-password
        document.querySelectorAll('.toggle-password').forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const input = document.querySelector(this.getAttribute('toggle'));
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>

</body>

</html>