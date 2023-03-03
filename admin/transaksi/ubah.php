<?php

require_once '../../function/functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: " . baseUrl() . "index.php");
}

$id = $_GET['id'];
$conn = koneksi();
$data = query("SELECT * FROM transaksi WHERE id_transaksi = '$id'");

$dataBarangById = query('SELECT id_barang, nama_barang FROM `barang` WHERE id_barang IN (
    SELECT id_barang FROM `transaksi` WHERE id_barang = ' . $data['id_barang'] . '
)');
$dataBarang = mysqli_query($conn, "SELECT * FROM barang");

$dataPembeliById = query('SELECT id_pembeli, nama_pembeli FROM `pembeli` WHERE id_pembeli IN (
    SELECT id_pembeli FROM `transaksi` WHERE id_pembeli = ' . $data['id_pembeli'] . '
)');
$dataPembeli = mysqli_query($conn, "SELECT * FROM pembeli");

if (isset($_POST['ubah_transaksi'])) {
    if (ubahTransaksi($_POST) > 0) {
        echo "
            <script>
                alert('Transaksi berhasil diubah');
                document.location.href = 'edit.php?id=" . $_GET["id"] . "';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Transaksi gagal diubah');
                document.location.href = 'edit.php?id=" . $_GET["id"] . "';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>

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
        <h3>Ubah Transaksi</h3>
        <hr>

        <div class="row">
            <div class="col-lg">

                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6">

                            <input type="hidden" value="<?= $id ?>" name="id_transaksi">

                            <div class="mb-3">
                                <label for="barang" class="form-label">Barang</label>
                                <select name="barang" id="barang" class="form-select">
                                    <option value="<?= $dataBarangById['id_barang'] ?>" selected><?= $dataBarangById['nama_barang'] ?></option>
                                    <?php foreach ($dataBarang as $db) : ?>
                                        <?php if ($db['nama_barang'] != $dataBarangById['nama_barang']) : ?>
                                            <option value="<?= $db['id_barang'] ?>"><?= $db['nama_barang'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pembeli" class="form-label">Pembeli</label>
                                <select name="pembeli" id="pembeli" class="form-select">
                                    <option value="<?= $dataPembeliById['id_pembeli'] ?>" selected><?= $dataPembeliById['nama_pembeli'] ?></option>
                                    <?php foreach ($dataPembeli as $dp) : ?>
                                        <?php if ($dp['nama_pembeli'] != $dataPembeliById['nama_pembeli']) : ?>
                                            <option value="<?= $dp['id_pembeli'] ?>"><?= $dp['nama_pembeli'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?>">
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="ubah_transaksi">
                                <i class="fa-solid fa-plus me-1"></i>
                                Ubah Transaksi
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