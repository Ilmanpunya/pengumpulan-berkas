<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Jadwal Uji KIR</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                            <br/>
                            <a href="index.php" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Kembali ke Halaman Utama</span>
                            </a>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Jadwal Uji KIR</h1>
                                    </div>
                                    <form class="user" action="add.php" method="post" name="form1">
                                        <div class="form-group">
                                            <input type="text" name="nik" class="form-control form-control-user"
                                                placeholder="NIK">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user"
                                                placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control form-control-user"
                                                placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control form-control-user"
                                                placeholder="No HP">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="policenumber" class="form-control form-control-user"
                                                placeholder="No Polisi">
                                        </div>
                                        <div class="form-group">
                                        Jenis Kendaraan :
                                            <select id="cars" name="vehicle" class="custom-select" placeholder="Jenis Kendaraan"> 
                                                <option value="Mobil">Mobil</option>
                                                <option value="Sepeda Motor">Sepeda Motor</option>
                                                <option value="Truk">Truk</option>
                                                <option value="Bus">Bus</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="type" class="form-control form-control-user"
                                                placeholder="Merk & Tipe Kendaraan">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="yearscreated" class="form-control form-control-user"
                                                placeholder="Tahun Pembuatan">
                                        </div>
                                        <div class="form-group">
                                        Pilih Tanggal Uji KIR :
                                            <input type="date" name="date" class="form-control form-control-user">
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" name="Submit" value="Add" onclick="return confirm('Apakah anda yakin data sudah benar semua?')">
                                    </form>
                                    <br/>
                                <?php

                                // Check If form submitted, insert form data into users table.
                                if(isset($_POST['Submit'])) {
                                    $nik = $_POST['nik'];
                                    $name = $_POST['name'];
                                    $address = $_POST['address'];
                                    $mobile = $_POST['mobile'];
                                    $policenumber = $_POST['policenumber'];
                                    $vehicle = $_POST['vehicle'];
                                    $type = $_POST['type'];
                                    $yearscreated = $_POST['yearscreated'];
                                    $date = strtotime($_POST['date']);
                                    $datetotext = date('Y-m-d', $date);
                                    $date = date('Y-m-d H:i:s', $date);

                                    // include database connection file
                                    include_once("config.php");

                                    // Insert user data into table
                                    $cektanggal = mysqli_query($mysqli, "SELECT * FROM users WHERE date = '$date'");
                                    if (mysqli_num_rows($cektanggal) >= 5) {
                                        echo "Mohon maaf, tanggal ", $datetotext , " sudah penuh (maksimal 5 uji KIR / hari), silahkan pilih hari lain";
                                    } else {
                                        $result = mysqli_query($mysqli, "INSERT INTO users(nik, name, address, mobile, policenumber, vehicle, type, yearscreated, date) VALUES('$nik','$name','$address','$mobile','$policenumber','$vehicle','$type','$yearscreated','$date')");
                                    
                                        // Show message when user added
                                        echo "Selamat, jadwal uji KIR telah ditambahkan. Silahkan datang ke Dinas Perhubungan pada ", $datetotext, " . <a href='index.php'>Kembali ke Halaman Utama</a>";
                                    }
                                }
                                ?>
                                </div>
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

</body>

</html>