<div class="shadow p-3 mb-3 bg-white-rounded">
    <h5><b>Edit Produk</b></h5>
</div>


<?php

$id_produk = $_GET['id'];

$kategori= array();
$ambil = $conn->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc())
        {
            $kategori[] = $pecah;
        }

$ambil = $conn->query("SELECT * FROM produk JOIN kategori 
ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$edit = $ambil->fetch_assoc();



?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Kategori : </label>
            <div class="col-sm-9">
                <select name="id_kategori" class="form-control" required>
                    <option value="<?php echo $edit['id_kategori']; ?>">
                    <?php echo $edit['nama_kategori']; ?>
                    <?php foreach ($kategori as $key => $value): ?>
                    <option value="<?php echo $value['id_kategori']; ?>">
                    <?php echo $value['nama_kategori']; ?>
                </option>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Produk : </label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" value="<?php echo $edit['nama_produk'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga Produk : </label>
            <div class="col-sm-9">
                <input type="number" name="harga" class="form-control" value="<?php echo $edit['harga_produk'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Berat Produk : </label>
            <div class="col-sm-9">
                <input type="number" name="berat" class="form-control" value="<?php echo $edit['berat_produk'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Gambar Produk : </label>
            <div class="col-sm-9">
                    <dimg src="../assets/gambar/<?php echo $edit['gambar_produk']; ?>" width="150">
                    <input type="file" name="gambar[]" class="form-control">
                    </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stok Produk : </label>
            <div class="col-sm-9">
                <input type="number" name="stok" class="form-control" value="<?php echo $edit['stok_produk'];?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Deskripsi Produk : </label>
            <div class="col-sm-9">
                <textarea type="text" name="deskripsi" class="form-control" value="<?php echo $edit['deskripsi_produk'];?>"></textarea>
            </div>
        </div>

        </div>
    </div>
       
        <div class="card-footer">
        <div class="row">
            <div class="col-md-11 text-right">
                <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
            </div>
            <div class="col-md-1">
                <a href="homepage_admin.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a></button>
            </div>
        </div>
    </div>
        </div>
    </div>
</form>

<?php

if(isset($_POST['simpan']))
    {
        $id_kategori = $_POST['id_kategori'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $berat = $_POST['berat'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];

        $namagambar = $_FILES['gambar']['name'];
        $lokasigambar = $_FILES['gambar']['tmp_name'];

    //ubah gambar
    if(!empty($lokasigambar))
    {
        move_uploaded_file($lokasigambar[0], "../assets/gambar/" . $namagambar[0]);

        $conn->query("UPDATE produk SET 
        id_kategori = '$id_kategori',
        nama_produk = '$nama',
        harga_produk = '$harga',
        berat_produk = '$berat',
        gambar_produk = '$namagambar[0]',
        stok_produk = '$stok',
        deskripsi_produk = '$deskripsi'
        WHERE id_produk='$id_produk'");

    	$namagambarproduk= $_FILES['gambar']['name'];
        $lokasigambarproduk = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($lokasigambarproduk[0], "../assets/gambar/" . $namagambarproduk[0]);
    }

    echo "<script>alert('data berhasil disimpan');</script>";
    echo "<script>location='homepage_admin.php?halaman=produk';</script>";

    }
?>

    