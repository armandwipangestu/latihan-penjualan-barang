<?php

require_once '../../function/functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: " . baseUrl() . "index.php");
}


$conn = koneksi();
$query = "SELECT 
    `transaksi`.id_transaksi, `barang`.nama_barang, `pembeli`.nama_pembeli, `transaksi`.tanggal, `transaksi`.keterangan
    FROM transaksi
    JOIN barang ON `transaksi`.id_barang = `barang`.id_barang
    JOIN pembeli ON `transaksi`.id_pembeli = `pembeli`.id_pembeli
";
$datas = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>

    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/css/index.css">

    <!-- Memanggil CSS Bootstrap V.5.3.0 -->
    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Memanggil FontAwesome V.6.3.0 -->
    <link rel="stylesheet" href="<?= baseUrl(); ?>assets/vendor/fontawesome/css/all.min.css">

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
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h3>Daftar Transaksi</h3>
            <a href="tambah.php" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i>
                Tambah Transaksi
            </a>
        </div>
        <hr>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($datas as $data) :
                    $count++;
                ?>
                    <tr>
                        <th scope="row"><?= $count ?></th>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['nama_pembeli'] ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $data['id_transaksi'] ?>" class="badge text-bg-success mr-2">
                                <i class="fas fa-edit"></i>
                                Ubah
                            </a>
                            <a class="badge text-bg-danger hapus" data-id="<?= $data['id_transaksi'] ?>" data-barang="<?= $data['nama_barang'] ?>" data-pembeli="<?= $data['nama_pembeli'] ?>" data-tanggal="<?= $data['tanggal'] ?>" data-keterangan="<?= $data['keterangan'] ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Memanggil JS Bootstrap V.5.3.0 -->
    <script src="<?= baseUrl(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Memanggil JS Sweetalert -->
    <script src="<?= baseUrl(); ?>assets/vendor/sweetalert/js/sweetalert2.all.min.js"></script>

    <!-- Menjalan Sweetalert ketika tombol hapus ditekan -->
    <script>
        const hapusKomponen = document.querySelectorAll('.hapus')
        hapusKomponen.forEach((hk) => {
            hk.addEventListener('click', () => {
                const data_id = hk.dataset.id;
                const data_barang = hk.dataset.barang;
                const data_pembeli = hk.dataset.pembeli;
                const data_tanggal = hk.dataset.tanggal;
                const data_keterangan = hk.dataset.keterangan;
                Swal.fire({
                    icon: 'warning',
                    html: `Apakah anda yakin ingin menghapus: <br>
                    Barang: <b>${data_barang}</b><br>
                    Pembeli: <b>${data_pembeli}</b><br>
                    Tanggal: <b>${data_tanggal}</b><br>
                    Keterangan: <b>${data_keterangan}</b><br>
                    ?
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#d9534f',
                    cancelButtonColor: '#5cb85c',
                    confirmButtonText: `<i class="fas fa-trash"></i> Ya`,
                    cancelButtonText: `Tidak`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = `hapus.php?id=${data_id}`
                    }
                })
            })
        })
    </script>
</body>

</html>