<?php

require_once '../function/functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: " . baseUrl() . "index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/css/index.css">

    <!-- Memanggil CSS Bootstrap V.5.3.0 -->
    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Memanggil FontAwesome V.6.3.0 -->
    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/vendor/fontawesome/css/all.min.css">
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Panel -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-11 bg-success text-white p-4 rounded mt-4">
                        <h4>
                            <i class="fa-solid fa-money-bill me-1"></i>
                            Transaksi
                        </h4>
                        <p class="text-white">
                            Membuat, Mengubah dan Menghapus Transaksi
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="<?= baseUrl() ?>admin/transaksi" class="btn btn-dark">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Lihat Transaksi
                            </a>
                        </div>
                    </div>

                    <div class="col-md-11 bg-primary text-white p-4 rounded mt-4">
                        <h4>
                            <i class="fa-solid fa-boxes-packing me-1"></i>
                            Supplier
                        </h4>
                        <p class="text-white">
                            Membuat, Mengubah dan Menghapus Supplier
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="<?= baseUrl() ?>admin/supplier" class="btn btn-dark">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Lihat Supplier
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-11 bg-warning text-white p-4 rounded mt-4">
                        <h4>
                            <i class="fa-solid fa-cubes me-1"></i>
                            Barang
                        </h4>
                        <p class="text-white">
                            Membuat, Mengubah dan Menghapus Barang
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="<?= baseUrl() ?>admin/barang" class="btn btn-dark">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Lihat Barang
                            </a>
                        </div>
                    </div>

                    <div class="col-md-11 bg-danger text-white p-4 rounded mt-4">
                        <h4>
                            <i class="fa-solid fa-users me-1"></i>
                            Pembeli
                        </h4>
                        <p class="text-white">
                            Membuat, Mengubah dan Menghapus Pembeli
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="<?= baseUrl() ?>admin/pembeli" class="btn btn-dark">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Lihat Pembeli
                            </a>
                        </div>
                    </div>

                    <div class="col-md-11 bg-info text-white p-4 rounded mt-4">
                        <h4>
                            <i class="fa-solid fa-cart-shopping me-1"></i>
                            Pembayaran
                        </h4>
                        <p class="text-white">
                            Membuat, Mengubah dan Menghapus Pembayaran
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="<?= baseUrl() ?>admin/pembayaran" class="btn btn-dark">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Lihat Pembayaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Panel -->
    <!-- <div class="container mt-5 mb-5">
        <div class="row">

            <div class="col-md-5 bg-success text-white p-4 rounded m-auto mt-4">
                <h4>
                    <i class="fa-solid fa-money-bill me-1"></i>
                    Transaksi
                </h4>
                <p class="text-white">
                    Membuat, Mengubah dan Menghapus Transaksi
                </p>
                <div class="d-flex justify-content-end">
                    <a href="<?= baseUrl() ?>admin/transaksi" class="btn btn-dark">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Lihat Transaksi
                    </a>
                </div>
            </div>

            <div class="col-md-5 bg-primary text-white p-4 rounded m-auto mt-4">
                <h4>
                    <i class="fa-solid fa-boxes-packing me-1"></i>
                    Supplier
                </h4>
                <p class="text-white">
                    Membuat, Mengubah dan Menghapus Supplier
                </p>
                <div class="d-flex justify-content-end">
                    <a href="<?= baseUrl() ?>admin/supplier" class="btn btn-dark">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Lihat Supplier
                    </a>
                </div>
            </div>

            <div class="col-md-5 bg-warning text-white p-4 rounded m-auto mt-4">
                <h4>
                    <i class="fa-solid fa-cubes me-1"></i>
                    Barang
                </h4>
                <p class="text-white">
                    Membuat, Mengubah dan Menghapus Barang
                </p>
                <div class="d-flex justify-content-end">
                    <a href="<?= baseUrl() ?>admin/barang" class="btn btn-dark">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Lihat Barang
                    </a>
                </div>
            </div>

            <div class="col-md-5 bg-danger text-white p-4 rounded m-auto mt-4">
                <h4>
                    <i class="fa-solid fa-users me-1"></i>
                    Pembeli
                </h4>
                <p class="text-white">
                    Membuat, Mengubah dan Menghapus Pembeli
                </p>
                <div class="d-flex justify-content-end">
                    <a href="<?= baseUrl() ?>admin/pembeli" class="btn btn-dark">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Lihat Pembeli
                    </a>
                </div>
            </div>

            <div class="col-md-5 bg-info text-white p-4 rounded m-auto mt-4">
                <h4>
                    <i class="fa-solid fa-cart-shopping me-1"></i>
                    Pembayaran
                </h4>
                <p class="text-white">
                    Membuat, Mengubah dan Menghapus Pembayaran
                </p>
                <div class="d-flex justify-content-end">
                    <a href="<?= baseUrl() ?>admin/pembayaran" class="btn btn-dark">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Lihat Pembayaran
                    </a>
                </div>
            </div>

        </div>
    </div> -->
    <!-- End Panel -->

    <!-- Memanggil JS Bootstrap V.5.3.0 -->
    <script src="<?= baseUrl(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>