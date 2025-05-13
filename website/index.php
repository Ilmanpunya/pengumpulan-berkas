<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login_user.php');
} else {
    $username = $_SESSION['username'];
}
?>
<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM pengumpulan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard User</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <!-- <img src="img/dephub.png" width="50px"> -->
                <div class="sidebar-brand-text mx-2">Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-10">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Tambah Jadwal -->
            <li class="nav-item">
                <a class="nav-link" href="add.php">
                    <i class="fas fa-plus"></i>
                    <span>Pengumpulan Berkas</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <br />
                <!-- Topbar -->
                <nav
                    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow justify-content-between">

                    <!-- KIRI: Logo -->
                    <div class="d-flex align-items-center">
                        <img src="img/dephub.png" width="50px" class="mr-2">
                        <img src="img/djpd.png" width="50px">
                    </div>

                    <!-- KANAN: Icon dan User -->
                    <ul class="navbar-nav d-flex align-items-center">

                        <!-- Notifikasi -->
                        <li class="nav-item mr-2 ">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in mr-5"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-envelope mr-2"></i>
                                    kosong
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-envelope mr-2"></i>
                                    kosong
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-envelope mr-2"></i>
                                    kosong
                                </a>
                            </div>
                        </li>

                        <!-- User Dropdown -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengumpulan Berkas Akreditasi Dinas Perhubungan</h1>
                    <p class="mb-4">Pengumpulan Berkas harus sesuai dengan Persyaratan</p>
                    <a href="add.php" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Pengumpulan Berkas</span>
                    </a>

                    <br />
                    <br />

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr class="h6">
                                            <th>Surat permohonan akreditasi</th>
                                            <th>Visi,Misi dan Moto</th>
                                            <th>komitmen pelayanan dan maklumat pelayanan UPUBKB</th>
                                            <th>Standar Operasional Prosedur</th>
                                            <th>Survei Indeks Kepuasan Masyarakat</th>
                                            <th>Dokumentasi dipublikasikannya Unsur Administrasi dan Papan Informasi
                                            </th>
                                            <th>Lokasi</th>
                                            <th>Tenaga Penguji Kendaraan Bermotor</th>
                                            <th>Fasitilas Pengujian</th>
                                            <th>Keakurasian Alat</th>
                                            <th>Bukti Lulus Uji</th>
                                            <th>Kapasitas Uji Per Hari</th>
                                            <th>Pemeliharaan Fasilitas</th>
                                            <th>Sertifikat Akreditasi Sebelumnya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($user_data = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_data['akreditasi'] . "</td>";
                                            echo "<td>" . $user_data['visi_misi'] . "</td>";
                                            echo "<td>" . $user_data['maklumat'] . "</td>";
                                            echo "<td>" . $user_data['sop'] . "</td>";
                                            echo "<td>" . $user_data['indeks_kepuasan'] . "</td>";
                                            echo "<td>" . $user_data['dokumentasi'] . "</td>";
                                            echo "<td>" . $user_data['lokasi'] . "</td>";
                                            echo "<td>" . $user_data['tenaga_penguji'] . "</td>";
                                            echo "<td>" . $user_data['fasilitas_pengujian'] . "</td>";
                                            echo "<td>" . $user_data['akurasi_alat'] . "</td>";
                                            echo "<td>" . $user_data['bukti_lulus'] . "</td>";
                                            echo "<td>" . $user_data['kapasitas_uji'] . "</td>";
                                            echo "<td>" . $user_data['pemeliharaan_fasilitas'] . "</td>";
                                            echo "<td>" . $user_data['akreditasi_lama'] . "</td>";
                                            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]' onclick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>Delete</a></td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; By Dishub 2025 </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" untuk keluar dari halaman dashboard.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>