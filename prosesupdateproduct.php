<?php
include 'koneksi.php';
include 'upload_helper.php';

if (isset($_POST['update'])) {
    $id         = (int) $_GET['id'];
    $namaproduk = trim($_POST["namaproduk"]);
    $harga      = (int) $_POST["harga"];
    $stok       = (int) $_POST["stok"];
    $kategori   = trim($_POST["kategori"]);

    try {
        $gambarBaru = simpanGambar('gambar');
    } catch (Exception $e) {
        header("Location: index.php?page=editdata&id=$id&error=" . urlencode($e->getMessage()));
        exit;
    }

    if ($gambarBaru !== null) {
        // hapus gambar lama
        $s = mysqli_prepare($dbconnect, "SELECT gambar FROM tb_produk WHERE id = ?");
        mysqli_stmt_bind_param($s, "i", $id);
        mysqli_stmt_execute($s);
        $lama = mysqli_fetch_assoc(mysqli_stmt_get_result($s));
        if ($lama && $lama['gambar'] !== '' && is_file(__DIR__ . '/media/' . basename($lama['gambar']))) {
            unlink(__DIR__ . '/media/' . basename($lama['gambar']));
        }

        $stmt = mysqli_prepare($dbconnect,
            "UPDATE tb_produk SET nama_produk=?, harga=?, stok=?, gambar=?, kategori=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "siissi", $namaproduk, $harga, $stok, $gambarBaru, $kategori, $id);
    } else {
        $stmt = mysqli_prepare($dbconnect,
            "UPDATE tb_produk SET nama_produk=?, harga=?, stok=?, kategori=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "siisi", $namaproduk, $harga, $stok, $kategori, $id);
    }
    mysqli_stmt_execute($stmt);

    header('Location: index.php?page=products&pesan=' . urlencode('diperbarui'));
    exit;
}
header('Location: index.php?page=products');