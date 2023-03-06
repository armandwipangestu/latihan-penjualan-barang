<?php

function koneksi()
{
    return mysqli_connect("127.0.0.1", "root", "", "latihan_penjualan_barang");
}

function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];

    while ($row = mysqli_num_rows($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $username = $data['username'];
    $password = $data['password'];

    if ($user = query("SELECT * FROM petugas WHERE user_name = '$username'")) {
        if ($password == $user['password']) {
            $id = $user['id_petugas'];
            $username = $user['user_name'];
            $_SESSION['login'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: admin/index.php");
            exit;
        } else {
            return [
                'error' => true,
                'pesan' => 'Username atau Password Salah'
            ];
        }
    } else {
        return [
            'error' => true,
            'pesan' => 'Username atau Password Salah'
        ];
    }
}

function tambahTransaksi($data)
{
    $conn = koneksi();
    $barang = $data['barang'];
    $pembeli = $data['pembeli'];
    $tanggal = $data['tanggal'];
    $keterangan = $data['keterangan'];

    if (empty($barang) || empty($pembeli) || empty($tanggal) || empty($keterangan)) {
        return false;
    }

    $query = "INSERT INTO 
                `transaksi`(`id_transaksi`, `id_barang`, `id_pembeli`, `tanggal`, `keterangan`) 
            VALUES 
                (NULL, '$barang', '$pembeli', '$tanggal', '$keterangan')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function ubahTransaksi($data)
{
    $conn = koneksi();

    $id = $data['id_transaksi'];
    $barang = $data['barang'];
    $pembeli = $data['pembeli'];
    $tanggal = $data['tanggal'];
    $keterangan = $data['keterangan'];

    if (empty($barang) || empty($pembeli) || empty($tanggal) || empty($keterangan)) {
        return false;
    }

    $query = "UPDATE transaksi SET
        id_barang = '$barang',
        id_pembeli = '$pembeli',
        tanggal = '$tanggal',
        keterangan = '$keterangan'
        WHERE id_transaksi = '$id'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn) or die(mysqli_error($conn));
}

function hapusTransaksi($id)
{
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id'") or die(mysqli_errno($conn));
    return mysqli_affected_rows($conn);
}

function baseUrl()
{
    return "http://" . $_SERVER['HTTP_HOST'] . '/latihan-penjualan-barang/';
}
