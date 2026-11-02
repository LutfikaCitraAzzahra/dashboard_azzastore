<?php
include_once __DIR__ . '/../koneksi.php';

$id   = (int) ($_GET['id'] ?? 0);
$stmt = mysqli_prepare($dbconnect, "SELECT * FROM tb_produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data</h1>
</div>

<?php if (!$data): ?>
  <div class="alert alert-warning">Produk tidak ditemukan.</div>
  <a class="btn btn-secondary" href="index.php?page=products">Kembali</a>
<?php else: ?>
  <?php if (($_GET['error'] ?? '') !== ''): ?>
    <div class="alert alert-danger py-2"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif; ?>

  <form method="post" action="prosesupdateproduct.php?id=<?= $data['id'] ?>" enctype="multipart/form-data" style="max-width:560px">
    <div class="mb-3">
      <label class="form-label" for="namaproduk">Nama Produk</label>
      <input class="form-control" type="text" id="namaproduk" name="namaproduk"
             value="<?= htmlspecialchars($data['nama_produk']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="harga">Harga</label>
      <input class="form-control" type="number" id="harga" name="harga" min="0"
             value="<?= (int) $data['harga'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="stok">Stok</label>
      <input class="form-control" type="number" id="stok" name="stok" min="0"
             value="<?= (int) $data['stok'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="gambar">Gambar</label>
      <?php if (!empty($data['gambar'])): ?>
        <div class="mb-2"><img width="100" src="media/<?= htmlspecialchars($data['gambar']) ?>" alt=""></div>
      <?php endif; ?>
      <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
      <div class="form-text">Kosongkan jika tidak ingin mengganti gambar.</div>
    </div>
    <div class="mb-3">
      <label class="form-label" for="kategori">Kategori</label>
      <input class="form-control" type="text" id="kategori" name="kategori"
             value="<?= htmlspecialchars($data['kategori']) ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a class="btn btn-secondary" href="index.php?page=products">Batal</a>
  </form>
<?php endif; ?>