<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "db_azzabeauty"; // nama DATABASE (bukan nama tabel)

mysqli_report(MYSQLI_REPORT_OFF);

// 1. Konek ke server MySQL, lalu buat database kalau belum ada
$dbconnect = mysqli_connect($host, $user, $password);
if (!$dbconnect) {
    die("Koneksi gagal: " . mysqli_connect_error() . " (pastikan MySQL di Laragon sudah Start)");
}
mysqli_query($dbconnect, "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4");
mysqli_select_db($dbconnect, $database);
mysqli_set_charset($dbconnect, "utf8mb4");

// 2. Buat tabel tb_produk otomatis kalau belum ada
mysqli_query($dbconnect, "CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id`          INT          NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(100) NOT NULL,
  `harga`       INT          NOT NULL DEFAULT 0,
  `stok`        INT          NOT NULL DEFAULT 0,
  `gambar`      VARCHAR(255) DEFAULT NULL,
  `kategori`    VARCHAR(50)  DEFAULT NULL,
  PRIMARY KEY (`id`)
)");

// 3. Pastikan folder media ada
if (!is_dir(__DIR__ . '/media')) {
    mkdir(__DIR__ . '/media', 0777, true);
}

$koneksi = $dbconnect; // alias untuk kode lama