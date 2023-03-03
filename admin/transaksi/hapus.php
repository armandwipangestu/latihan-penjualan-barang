<?php

require_once "../../function/functions.php";

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

if (hapusTransaksi($id) > 0) {
    echo "
        <script>
            alert('Transaksi berhasil dihapus');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
    <script>
        alert('Transaksi gagal dihapus');
        document.location.href = 'index.php';
    </script>
";
}
