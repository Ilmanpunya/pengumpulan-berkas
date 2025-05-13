<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
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

    <title>Pengumpulan Berkas Akreditasi | Dinas Perhubungan</title>

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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <img src="img/dephub.png" width="50px">
                <div class="sidebar-brand-text mx-3">Dashboard Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="datausers.php">
                    <i class="fas fa-users"></i>
                    <span>Kelola Data Users</span></a>
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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
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
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total akreditasi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Akreditasi "A"</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Akreditasi "B"</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Tidak Terakreditasi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header text-white bg-secondary">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="50"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header text-white bg-secondary">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Pie Chart Example
                                </div>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCustom" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Detail Berkas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($user_data = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td rowspan='2'>$no</td>";
                                            echo "<td><strong>Nama PIC UPPKB:</strong> {$user_data['nama_pic']}<br>
                                                    <strong>Surat permohonan akreditasi:</strong> {$user_data['akreditasi']}<br>
                                                    <strong>Visi, Misi dan Moto:</strong> {$user_data['visi_misi']}<br>
                                                    <strong>Komitmen & Maklumat:</strong> {$user_data['maklumat']}<br>
                                                    <strong>SOP:</strong> {$user_data['sop']}<br>
                                                    <strong>Survei IKM:</strong> {$user_data['indeks_kepuasan']}<br>
                                                    <strong>Dokumentasi:</strong> {$user_data['dokumentasi']}<br>
                                                    <strong>Lokasi:</strong> {$user_data['lokasi']}<br>
                                                    <strong>Tenaga Penguji:</strong> {$user_data['tenaga_penguji']}<br>
                                                    <strong>Fasilitas Pengujian:</strong> {$user_data['fasilitas_pengujian']}<br>
                                                    <strong>Akurasi Alat:</strong> {$user_data['akurasi_alat']}<br>
                                                    <strong>Bukti Lulus:</strong> {$user_data['bukti_lulus']}<br>
                                                    <strong>Kapasitas Uji:</strong> {$user_data['kapasitas_uji']}<br>
                                                    <strong>Pemeliharaan Fasilitas:</strong> {$user_data['pemeliharaan_fasilitas']}<br>
                                                    <strong>Sertifikat Akreditasi Lama:</strong> {$user_data['akreditasi_lama']}
                                                </td>";
                                            echo "<td rowspan='2'>
                                                    <a href='edit.php?id={$user_data['id']}'>Edit</a> | 
                                                    <a href='nilai.php?id={$user_data['id']}'>Nilai</a> | 
                                                    <a href='delete.php?id={$user_data['id']}' onclick='return confirm(\"Apakah anda yakin untuk menghapus data ini?\")'>Delete</a>
                                                </td>";
                                            echo "</tr>";
                                            echo "<tr></tr>";
                                            $no++;
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
                        <span>Copyright &copy; By I.N.A </span>
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
                <div class="modal-body">Klik "Logout" untuk keluar dari halaman dashboard admin.</div>
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
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../asep/demo/chart-area-demo.js"></script>
    <script src="../../asep/demo/chart-bar-demo.js"></script>
    <script src="../../asep/demo/chart-pie-demo.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTableCustom').DataTable({
                "pageLength": 2,     // Menampilkan maksimal 2 baris per halaman
                "lengthChange": false // Hilangkan dropdown untuk ubah jumlah baris
            });
        });
    </script>

</body>

</html>