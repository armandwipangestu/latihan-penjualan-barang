-- Menambahkan Data untuk tabel petugas
INSERT INTO 
    `petugas`(`id_petugas`, `user_name`, `password`) 
VALUES 
    (NULL,'arman','qwe');

-- Menambahkan Data untuk tabel supplier
INSERT INTO 
    `supplier`(`id_supplier`, `nama_supplier`, `no_telepon`, `alamat`) 
VALUES 
    (NULL,'JNE','08123456789','Jl. Jakarta');

-- Menambahkan Data untuk tabel barang
INSERT INTO 
    `barang`(`id_barang`, `nama_barang`, `harga`, `stok`, `id_supplier`) 
VALUES 
    (NULL,'Keyboard Logitech',50000,10,3);

-- Menambahkan Data untuk tabel pembeli
INSERT INTO 
    `pembeli`(`id_pembeli`, `nama_pembeli`, `jenis_kelamin`, `no_telepon`, `alamat`) 
VALUES 
    (NULL,'Sandhika Galih','L','083129287563','Jl. Cicaheum');

-- Menambahkan Data untuk tabel transaksi
INSERT INTO 
    `transaksi`(`id_transaksi`, `id_barang`, `id_pembeli`, `tanggal`, `keterangan`) 
VALUES 
    (NULL,2,2,'2023-02-15','Saya tertarik membeli mouse ini')


-- Menambahkan Data untuk tabel pembayaran
INSERT INTO 
    `pembayaran`(`id_pembayaran`, `tanggal_bayar`, `total_bayar`, `id_transaksi`) 
VALUES 
    (NULL,'2023-03-03',200000,1)
