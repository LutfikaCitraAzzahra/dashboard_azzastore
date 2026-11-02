<?php
include_once __DIR__ . '/../koneksi.php';

$total_produk = 0;
$total_stok   = 0;
$ringkas = mysqli_query($dbconnect, "SELECT COUNT(*) AS jumlah, COALESCE(SUM(stok),0) AS stok FROM tb_produk");
if ($ringkas && ($r = mysqli_fetch_assoc($ringkas))) {
    $total_produk = (int) $r['jumlah'];
    $total_stok   = (int) $r['stok'];
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<div class="row g-3">
  <div class="col-sm-6 col-lg-3">
    <div class="card text-bg-light">
      <div class="card-body">
        <div class="text-body-secondary small">Total Produk</div>
        <div class="fs-3 fw-semibold"><?= $total_produk ?></div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card text-bg-light">
      <div class="card-body">
        <div class="text-body-secondary small">Total Stok</div>
        <div class="fs-3 fw-semibold"><?= $total_stok ?></div>
      </div>
    </div>
  </div>
</div>
<a class="btn btn-info mt-3" href="index.php?page=products">Kelola Produk</a>