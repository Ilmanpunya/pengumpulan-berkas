<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kelola Data Pengurus</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <!-- Back Button -->
                        <a href="index.php" class="btn btn-primary btn-icon-split mb-4">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali ke Halaman Utama</span>
                        </a>

                        <!-- Title -->
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Kelola Data Pengurus</h1>
                        </div>

                        <!-- Form Start -->
                        <form class="user" id="userForm" action="add_user.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" name="email" class="form-control form-control-user" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Username</label>
                                <input type="text" name="username" class="form-control form-control-user" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group position-relative">
                                <label class="font-weight-bold">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-user" required>
                                <span class="toggle-password" toggle="#password">
                                    <i class="fas fa-eye position-absolute"
                                        style="top: 70%; right: 25px; transform: translateY(-50%); cursor: pointer;"></i>
                                </span>
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="form-group position-relative">
                                <label class="font-weight-bold">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control form-control-user" required>
                                <span class="toggle-password" toggle="#confirm_password">
                                    <i class="fas fa-eye position-absolute"
                                        style="top: 70%; right: 25px; transform: translateY(-50%); cursor: pointer;"></i>
                                </span>
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Daerah PIC UPPKB</label>
                                <input type="text" name="pic_uppkb" class="form-control form-control-user" required>
                            </div>
                            <!-- Submit Button -->
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tambahkan Pengurus
                                </button>
                            </div>
                        </form>
                        <!-- End Form -->

                        <br />
                        <?php
                        ?>
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
        document.getElementById('userForm').addEventListener('submit', function (e) {
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

            // Cek email
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert("Format email tidak valid. Contoh: nama@example.com");
                return;
            }

            if (password !== confirmPassword) {
                e.preventDefault(); // Stop form submission
                alert("Password dan Konfirmasi Password tidak cocok!");
            }
        });
    </script>

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