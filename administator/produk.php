<div class ="shadow p-3 mb-3 bg-white rounded">
    <h5>Halaman Produk</h5>
</div>

<?php



$produk = array();
$ambil = $conn->query("SELECT * FROM produk JOIN kategori 
    ON produk.id_kategori=kategori.id_kategori");
while ($pecah = $ambil->fetch_assoc())
    {
        $produk[]=$pecah;
    }
?>
<a href="homepage_admin.php?halaman=tambahproduk" class="btn btn-sm btn-success">Tambah Produk</a>
<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Berat Produk</th>
                    <th>Gambar Produk</th>
                    <th>Stok Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($produk as $key => $value): ?>
                <tr>                    
                    <td width="50"><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_kategori']; ?></td>
                    <td><?php echo $value['nama_produk']; ?></td>
                    <td>Rp<?php echo number_format($value['harga_produk']); ?></td>
                    <td><?php echo number_format($value['berat_produk']); ?>gr</td>
                    <td class="text-center">
                        <img width="150" src="../assets/gambar/<?php echo $value['gambar_produk']; ?>">
                    </td>
                    <td><?php echo $value['stok_produk']; ?></td>
                    <td><?php echo $value['deskripsi_produk']; ?></td>
                    <td class="text-center" width="150">
                        <a href="homepage_admin.php?halaman=editproduk&id=<?php echo $value['id_produk']; ?>" 
                        class="btn btn-sm btn-primary">Edit</a>
                        <a href="homepage_admin.php?halaman=hapusproduk&id=<?php echo $value['id_produk']; ?>" 
                        class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>