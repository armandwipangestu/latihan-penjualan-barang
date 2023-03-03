<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Memanggil CSS Bootstrap V.5.3.0 -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Memanggil FontAwesome V.6.3.0 -->
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
</head>

<body>

    <!-- Start Form Login -->
    <div class="d-flex justify-content-center mb-5">
        <div class="mt-5">

            <div class="text-center fs-1">
                <i class="fa fa-boxes"></i>
                <h4 class="pt-3 mb-4">Masuk Penjualan Barang</h4>
            </div>

            <form class="rounded pt-2" method="post" action="">

                <div class="mb-3" style="width: 300px;">
                    <label class="form-label">
                        Username
                    </label>
                    <input type="text" name="username" class="form-control" id="username" required autofocus />
                </div>

                <div class="mb-3 password-field input-wrapper">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" />
                </div>

                <div class="mb-3 ">
                    <button class="w-100 btn btn-primary mt-2" type="submit" name="login">
                        Masuk
                    </button>
                </div>
            </form>

        </div>
    </div>
    <!-- End Form Login -->

    <!-- Memanggil JS Bootstrap V.5.3.0 -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>