<?php 
// var_dump($_POST);
require_once __DIR__ . '/upload_helper.php';


if (isset($_POST['simpan'])) {
    $namaproduk = $_POST["namaproduk"];
    $hargaproduk = $_POST["harga"];
    $stok = $_POST["stok"];
    $kategori = $_POST["kategori"];

    try {
        $gambar = simpanGambar('gambar') ?? '';
    } catch (Exception $e) {
        header('Location: index.php?page=addproduct&error=' . urlencode($e->getMessage()));
        exit;
    }

    include 'koneksi.php';
$sql = "INSERT INTO tb_produk
(nama_produk, harga, gambar, stok, kategori)
VALUES
('$nama_produk', '$harga', '$gambar', '$stok', '$kategori')";

mysqli_query($dbconnect, $query);

header('Location: index.php?page=products');

}



?>