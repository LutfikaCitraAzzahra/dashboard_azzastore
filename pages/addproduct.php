<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add Product</h1>
</div>

<?php if (($_GET['error'] ?? '') !== ''): ?>
  <div class="alert alert-danger py-2"><?= htmlspecialchars($_GET['error']) ?></div>
<?php endif; ?>

<form method="post" action="prosesaddproduct.php" enctype="multipart/form-data" style="max-width:560px">
  <div class="mb-3">
    <label class="form-label" for="namaproduk">Nama Produk</label>
    <input class="form-control" type="text" id="namaproduk" name="namaproduk" required>
  </div>
  <div class="mb-3">
    <label class="form-label" for="harga">Harga</label>
    <input class="form-control" type="number" id="harga" name="harga" min="0" required>
  </div>
  <div class="mb-3">
    <label class="form-label" for="stok">Stok</label>
    <input class="form-control" type="number" id="stok" name="stok" min="0" required>
  </div>
  <div class="mb-3">
    <label class="form-label" for="gambar">Gambar</label>
    <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
  </div>
  <div class="mb-3">
    <label class="form-label" for="kategori">Kategori</label>
    <input class="form-control" type="text" id="kategori" name="kategori" required>
  </div>
  
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
  <a class="btn btn-secondary" href="index.php?page=products">Batal</a>
</form>