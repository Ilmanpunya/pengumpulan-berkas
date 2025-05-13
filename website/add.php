<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Fungsi untuk menangani upload
function handleUpload($fieldName) {
    if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileTmp = $_FILES[$fieldName]['tmp_name'];
        $fileName = basename($_FILES[$fieldName]['name']);
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmp, $uploadPath)) {
            return $fileName; // hanya simpan nama file
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $date = $_POST['date'];

    // Proses semua upload file
    $akreditasi = handleUpload('akreditasi');
    $visi_misi = handleUpload('visi_misi');
    $maklumat = handleUpload('maklumat');
    $sop = handleUpload('sop');
    $indeks_kepuasan = handleUpload('indeks_kepuasan');
    $dokumentasi = handleUpload('dokumentasi');
    $lokasi = handleUpload('lokasi');
    $tenaga_penguji = handleUpload('tenaga_penguji');
    $fasilitas_pengujian = handleUpload('fasilitas_pengujian');
    $akurasi_alat = handleUpload('akurasi_alat');
    $bukti_lulus = handleUpload('bukti_lulus');
    $kapasitas_uji = handleUpload('kapasitas_uji');
    $pemeliharaan_fasilitas = handleUpload('pemeliharaan_fasilitas');
    $akreditasi_lama = handleUpload('akreditasi_lama');

    // Query insert
    $query = "INSERT INTO pengumpulan (
         date, akreditasi, visi_misi, maklumat, sop, indeks_kepuasan,
        dokumentasi, lokasi, tenaga_penguji, fasilitas_pengujian, akurasi_alat,
        bukti_lulus, kapasitas_uji, pemeliharaan_fasilitas, akreditasi_lama
    ) VALUES (
        '$date', '$akreditasi', '$visi_misi', '$maklumat', '$sop', '$indeks_kepuasan',
        '$dokumentasi', '$lokasi', '$tenaga_penguji', '$fasilitas_pengujian', '$akurasi_alat',
        '$bukti_lulus', '$kapasitas_uji', '$pemeliharaan_fasilitas', '$akreditasi_lama'
    )";

    if (mysqli_query($mysqli, $query)) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Pengumpulan Berkas</title>

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
                            <h1 class="h4 text-gray-900">Tambah Pengumpulan Berkas</h1>
                        </div>

                        <!-- Form Start -->
                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-lg-6">
                                    <?php
                                    $fields_left = [
                                        "Surat permohonan akreditasi" => "akreditasi",
                                        "Visi, Misi dan Moto" => "visi_misi",
                                        "Komitmen pelayanan dan Maklumat pelayanan UPUBKB" => "maklumat",
                                        "Standar Operasional Prosedur" => "sop",
                                        "Survei Indeks Kepuasan Masyarakat" => "indeks_kepuasan",
                                        "Dokumentasi dipublikasikannya Unsur Administrasi dan Papan Informasi" => "dokumentasi",
                                        "Lokasi" => "lokasi"
                                    ];
                                    foreach ($fields_left as $label => $name) {
                                        echo "
                                    <div class='form-group'>
                                        <label class='font-weight-bold'>$label</label>
                                        <input type='file' name='$name' class='form-control-file' accept='application/pdf'>
                                    </div>";
                                    }
                                    ?>
                                </div>

                                <!-- Right Column -->
                                <div class="col-lg-6">
                                    <?php
                                    $fields_right = [
                                        "Tenaga Penguji Kendaraan Bermotor" => "tenaga_penguji",
                                        "Fasilitas Pengujian" => "fasilitas_pengujian",
                                        "Keakurasian Alat" => "akurasi_alat",
                                        "Bukti Lulus Uji" => "bukti_lulus",
                                        "Kapasitas Uji Per Hari" => "kapasitas_uji",
                                        "Pemeliharaan Fasilitas" => "pemeliharaan_fasilitas",
                                        "Sertifikat Akreditasi Sebelumnya" => "akreditasi_lama"
                                    ];
                                    foreach ($fields_right as $label => $name) {
                                        echo "
                                    <div class='form-group'>
                                        <label class='font-weight-bold'>$label</label>
                                        <input type='file' name='$name' class='form-control-file' accept='application/pdf'>
                                    </div>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Pengumpulan Berkas</label>
                                        <input type="date" name="date" class="form-control form-control-user">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button with Modal -->
                            <div class="mt-4 text-center">
                                <button type="button" class="btn btn-primary btn-user btn-block" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Tambahkan
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin semua data sudah benar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="Submit">Ya,
                                                Tambahkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->

                        <br />
                        <?php
                        // PHP Processing block tetap seperti di atas
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

</body>

</html>