<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="d-flex align-items-center gap-2 ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">
                Share
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary">
                Export
            </button>
        </div>
        <button
            type="button"
            class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#calendar3"></use>
            </svg>
            This week
        </button>
    </div>
</div>

<h2>Data Produk</h2>
<a class="btn btn-info mb-3" href="index.php?page=addproduct">
    Add Product
</a>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Stok</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';

            $query = "SELECT * FROM tb_produk";
            $ambildata = mysqli_query($dbconnect, $query);

            while ($show = mysqli_fetch_assoc($ambildata)) {
            ?>
                <tr>
                    <td><?php echo $show['id']; ?></td>
                    <td><?php echo $show['nama_produk']; ?></td>
                    <td><?php echo $show['harga']; ?></td>
                    <td>
                        <img
                            src="media/<?php echo htmlspecialchars($show['gambar']); ?>"
                            width="50"
                            alt="<?php echo htmlspecialchars($show['nama_produk']); ?>">
                    </td>
                    <td><?php echo $show['stok']; ?></td>
                    <td><?php echo $show['kategori']; ?></td>
                    <td>
                        <a
                            class="btn btn-warning btn-sm"
                            href="index.php?page=editdata&id=<?php echo $show['id']; ?>">
                            Edit
                        </a>
                        <form
                            class="d-inline"
                            action="proseshapus.php?id=<?php echo $show['id']; ?>"
                            method="post">
                            <button
                                name="hapus"
                                class="btn btn-danger btn-sm"
                                type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
