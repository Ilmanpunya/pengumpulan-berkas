<?php
include '../config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM pengumpulan WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

$fields_left = [
    "Surat permohonan akreditasi" => "akreditasi",
    "Visi, Misi dan Moto" => "visi_misi",
    "Komitmen pelayanan dan Maklumat pelayanan UPUBKB" => "maklumat",
    "Standar Operasional Prosedur" => "sop",
    "Survei Indeks Kepuasan Masyarakat" => "indeks_kepuasan",
    "Dokumentasi dipublikasikannya Unsur Administrasi dan Papan Informasi" => "dokumentasi",
    "Lokasi" => "lokasi"
];

$fields_right = [
    "Tenaga Penguji Kendaraan Bermotor" => "tenaga_penguji",
    "Fasilitas Pengujian" => "fasilitas_pengujian",
    "Keakurasian Alat" => "akurasi_alat",
    "Bukti Lulus Uji" => "bukti_lulus",
    "Kapasitas Uji Per Hari" => "kapasitas_uji",
    "Pemeliharaan Fasilitas" => "pemeliharaan_fasilitas",
    "Sertifikat Akreditasi Sebelumnya" => "akreditasi_lama"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penilaian Akreditasi</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
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
                            <h1 class="h4 text-gray-900">Penilaian Pengumpulan Berkas</h1>
                        </div>

                        <form class="user">
                            <div class="row ml-5">
                                <div class="col-lg-6">
                                    <?php
                                    foreach ($fields_left as $label => $name) {
                                        echo "<div class='form-group'>
                                                <label class='font-weight-bold'>$label</label><br>";
                                        if (!empty($data[$name])) {
                                            $fileName = preg_replace('/^\d+_/', '', basename($data[$name]));
                                            echo "<a href='../uploads/{$data[$name]}' target='_blank'>$fileName</a>";
                                        } else {
                                            echo "<small class='text-muted'>Belum ada berkas.</small>";
                                        }
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php
                                    foreach ($fields_right as $label => $name) {
                                        echo "<div class='form-group'>
                                                <label class='font-weight-bold'>$label</label><br>";
                                        if (!empty($data[$name])) {
                                            $fileName = preg_replace('/^\d+_/', '', basename($data[$name]));
                                            echo "<a href='../uploads/{$data[$name]}' target='_blank'>$fileName</a>";
                                        } else {
                                            echo "<small class='text-muted'>Belum ada berkas.</small>";
                                        }
                                        echo "</div>";
                                    }
                                    ?>
                                    <label class="font-weight-bold">Tanggal Pengumpulan Berkas</label>
                                    <input type="text" class="form-control" 
                                        value="<?= htmlspecialchars($data['date']) ?>" readonly>
                                </div>
                            </div>
                            <br>

                            <div class="text-center px-4 mb-4">
                                <button type="button" class="btn btn-success btn-user btn-block" data-toggle="modal"
                                    data-target="#penilaianModal">
                                    Beri Penilaian
                                </button>
                            </div>
                        </form>

                        <!-- Modal Penilaian -->
                        <div class="modal fade" id="penilaianModal" tabindex="-1" role="dialog"
                            aria-labelledby="penilaianModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="proses_penilaian.php" method="post">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="penilaianModalLabel">Beri Penilaian Akreditasi
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mt-3">Pilih hasil penilaian:</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="penilaian" value="A"
                                                    required>
                                                <label class="form-check-label">A</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="penilaian" value="B">
                                                <label class="form-check-label">B</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="penilaian"
                                                    value="Tidak Terakreditasi">
                                                <label class="form-check-label">Tidak Terakreditasi</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.js"></script>
</body>

</html>