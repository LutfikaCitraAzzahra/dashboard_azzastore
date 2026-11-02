<?php
if (isset($_POST['hapus'])) {
    include 'koneksi.php';
    $id = $_GET['id'];

    $query = "DELETE FROM tb_produk WHERE `tb_produk`.`id` = $id";
    mysqli_query($dbconnect, $query);


    header('location:index.php?page=products');

}



?>