<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// == HANDLE POST: UPDATE DATA ==
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];

    // Ambil data lama
    $result = mysqli_query($mysqli, "SELECT * FROM pengumpulan WHERE id = '$id'");
    $data_lama = mysqli_fetch_assoc($result);

    // Fungsi upload
    function handleUpload($fieldName, $oldValue)
    {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $fileTmp = $_FILES[$fieldName]['tmp_name'];
            $fileName = time() . '_' . basename($_FILES[$fieldName]['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmp, $uploadPath)) {
                return $uploadPath;
            }
        }
        return $oldValue;
    }

    // Proses semua field
    $akreditasi = handleUpload('akreditasi', $data_lama['akreditasi']);
    $visi_misi = handleUpload('visi_misi', $data_lama['visi_misi']);
    $maklumat = handleUpload('maklumat', $data_lama['maklumat']);
    $sop = handleUpload('sop', $data_lama['sop']);
    $indeks_kepuasan = handleUpload('indeks_kepuasan', $data_lama['indeks_kepuasan']);
    $dokumentasi = handleUpload('dokumentasi', $data_lama['dokumentasi']);
    $lokasi = handleUpload('lokasi', $data_lama['lokasi']);
    $tenaga_penguji = handleUpload('tenaga_penguji', $data_lama['tenaga_penguji']);
    $fasilitas_pengujian = handleUpload('fasilitas_pengujian', $data_lama['fasilitas_pengujian']);
    $akurasi_alat = handleUpload('akurasi_alat', $data_lama['akurasi_alat']);
    $bukti_lulus = handleUpload('bukti_lulus', $data_lama['bukti_lulus']);
    $kapasitas_uji = handleUpload('kapasitas_uji', $data_lama['kapasitas_uji']);
    $pemeliharaan_fasilitas = handleUpload('pemeliharaan_fasilitas', $data_lama['pemeliharaan_fasilitas']);
    $akreditasi_lama = handleUpload('akreditasi_lama', $data_lama['akreditasi_lama']);
    $date = $_POST['date'];

    // Update database
    $query = "UPDATE pengumpulan SET 
        akreditasi = '$akreditasi',
        visi_misi = '$visi_misi',
        maklumat = '$maklumat',
        sop = '$sop',
        indeks_kepuasan = '$indeks_kepuasan',
        dokumentasi = '$dokumentasi',
        lokasi = '$lokasi',
        tenaga_penguji = '$tenaga_penguji',
        fasilitas_pengujian = '$fasilitas_pengujian',
        akurasi_alat = '$akurasi_alat',
        bukti_lulus = '$bukti_lulus',
        kapasitas_uji = '$kapasitas_uji',
        pemeliharaan_fasilitas = '$pemeliharaan_fasilitas',
        akreditasi_lama = '$akreditasi_lama',
        date = '$date'
        WHERE id = '$id'";

    mysqli_query($mysqli, $query);
    header("Location: index.php");
    exit();
}

// == HANDLE GET: TAMPILKAN FORM ==
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM pengumpulan WHERE id = '$id'";
$result = mysqli_query($mysqli, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data_lama = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Entri Uji KIR</title>

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
                    <div class="card-body p-4">

                        <a href="index.php" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali ke Halaman Utama</span>
                        </a>

                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Edit Pengumpulan Berkas</h1>
                        </div>

                        <form class="user" action="edit.php" method="post" name="update_user"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <div class="row">
                                <!-- Kolom Kiri -->
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
                                            <input type='file' name='$name' class='form-control-file' accept='application/pdf'>";
                                        if (!empty($data_lama[$name])) {
                                            $filePath = $data_lama[$name];
                                            $fileName = preg_replace('/^\d+_/', '', basename($filePath));
                                            echo "<br><small>File sebelumnya: $fileName</small>";
                                        }
                                        echo "</div>";
                                    }
                                    ?>
                                </div>

                                <!-- Kolom Kanan -->
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
                                            <input type='file' name='$name' class='form-control-file' accept='application/pdf'>";
                                        if (!empty($data_lama[$name])) {
                                            $filePath = $data_lama[$name];
                                            $fileName = preg_replace('/^\d+_/', '', basename($filePath));
                                            echo "<br><small>File sebelumnya: $fileName</small>";
                                        }
                                        echo "</div>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Pengumpulan Berkas</label>
                                        <input type="date" name="date"
                                            value="<?= htmlspecialchars($data_lama['date']) ?>"
                                            class="form-control form-control-user">
                                    </div>
                                </div>

                            </div>

                            <div class="text-center px-4 mb-4">
                                <button type="button" class="btn btn-primary btn-user btn-block" data-toggle="modal"
                                    data-target="#confirmModal">
                                    Update
                                </button>
                            </div>

                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog"
                                aria-labelledby="confirmModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Update Data</h5>
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
                                            <button type="submit" class="btn btn-primary" name="update">Ya,
                                                Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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