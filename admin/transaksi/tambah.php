<?php

require_once '../../function/functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: " . baseUrl() . "index.php");
}


$conn = koneksi();
$queryBarang = "SELECT * FROM barang";
$queryPembeli = "SELECT * FROM pembeli";

$datasBarang = mysqli_query($conn, $queryBarang);
$datasPembeli = mysqli_query($conn, $queryPembeli);

if (isset($_POST['transaksi'])) {
    if (tambahTransaksi($_POST) > 0) {
        $success = [
            'success' => true,
            'pesan' => 'Transaksi baru berhasil ditambahkan'
        ];
    } else {
        $error = [
            'error' => true,
            'pesan' => 'Transaksi baru gagal ditambahkan'
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>

    <!-- Memanggil CSS Bootstrap V.5.3.0 -->
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Memanggil FontAwesome V.6.3.0 -->
    <link rel="stylesheet" href="<?= baseUrl() ?>assets/vendor/fontawesome/css/all.min.css">

    <!-- Memanggil Sweetalert -->
    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/vendor/sweetalert/css/sweetalert2.min.css">
</head>

<body>

    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="<?= baseUrl() ?>" class="navbar-brand custom-font">
                <img src="<?= baseUrl(); ?>assets/img/bootstrap-logo.svg" alt="" width="30" height="24">
                Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="nav navbar-nav ms-auto w-100 justify-content-end me-5">
                    <a href="<?= baseUrl() ?>admin/transaksi" class="nav-link">
                        <i class="fa-solid fa-money-bill me-1"></i>
                        Transaksi
                    </a>

                    <a href="<?= baseUrl() ?>admin/supplier" class="nav-link">
                        <i class="fa-solid fa-boxes-packing me-1"></i>
                        Supplier
                    </a>

                    <a href="<?= baseUrl() ?>admin/barang" class="nav-link">
                        <i class="fa-solid fa-cubes me-1"></i>
                        Barang
                    </a>

                    <a href="<?= baseUrl() ?>admin/pembeli" class="nav-link">
                        <i class="fa-solid fa-users me-1"></i>
                        Pembeli
                    </a>

                    <a href="<?= baseUrl() ?>admin/pembayaran" class="nav-link">
                        <i class="fa-solid fa-cart-shopping me-1"></i>
                        Pembayaran
                    </a>

                    <a href="#" data-id="<?= $_SESSION['id'] ?>" data-url="<?= baseUrl() ?>admin/auth" class="btn btn-dark keluar">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Keluar
                    </a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container mt-5">
        <h3>Tambah Transaksi</h3>
        <hr>

        <div class="row">
            <div class="col-lg">

                <?php if (isset($success['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <?= $success['pesan'] ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($error['error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <?= $error['pesan'] ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="barang" class="form-label">Barang</label>
                                <select name="barang" id="barang" class="form-select">
                                    <option value="" selected>Pilih Barang</option>
                                    <?php foreach ($datasBarang as $dataBarang) : ?>
                                        <option value="<?= $dataBarang['id_barang'] ?>"><?= $dataBarang['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pembeli" class="form-label">Pembeli</label>
                                <select name="pembeli" id="pembeli" class="form-select">
                                    <option value="" selected>Pilih Pembeli</option>
                                    <?php foreach ($datasPembeli as $dataPembeli) : ?>
                                        <option value="<?= $dataPembeli['id_pembeli'] ?>"><?= $dataPembeli['nama_pembeli'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="transaksi">
                                <i class="fa-solid fa-plus me-1"></i>
                                Tambah Transaksi
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Memanggil JS Bootstrap V.5.3.0 -->
    <script src="<?= baseUrl() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Memanggil JS Sweetalert -->
    <script src="<?= baseUrl(); ?>assets/vendor/sweetalert/js/sweetalert2.all.min.js"></script>

    <script>
        const keluar = document.querySelector('.keluar');
        keluar.addEventListener('click', () => {
            const dataid = keluar.dataset.id
            const data_base_url = keluar.dataset.url;
            Swal.fire({
                icon: 'warning',
                title: 'Apakah anda yakin ingin keluar',
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5cb85c',
                confirmButtonText: `Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `${data_base_url}/keluar.php?id=${dataid}`
                }
            })
        })
    </script>
</body>

</html>