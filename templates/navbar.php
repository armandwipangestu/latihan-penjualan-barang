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