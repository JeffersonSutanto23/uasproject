<div class="shadow p-3 mb-3 bg-white-rounded">
    <h5><b>Tambah Produk</b></h5>
</div>

<?php
$kategori = array();
$ambil = $conn->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc())
        {
            $kategori[] = $pecah;
        }
?>




<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Kategori : </label>
            <div class="col-sm-9">
                <select name="id_kategori" class="form-control" >
                    <option selected disabled>Pilih Nama Kategori</option>
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
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Produk" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga Produk : </label>
            <div class="col-sm-9">
                <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga Produk" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Berat Produk : </label>
            <div class="col-sm-9">
                <input type="number" name="berat" class="form-control" placeholder="Masukkan Berat Produk" >
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Gambar Produk : </label>
            <div class="col-sm-9">
                    <div class="input-gambar">
                    <input type="file" name="gambar[]" class="form-control" required>
                    </div>
                    <span class="btn btn-sm btn-success btn-tambah">
                    <i class="fas fa-plus"></i>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stok Produk : </label>
            <div class="col-sm-9">
                <input type="number" name="stok" class="form-control" placeholder="Masukkan Stok Produk" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Deskripsi Produk : </label>
            <div class="col-sm-9">
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Produk"></textarea>
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

        move_uploaded_file($lokasigambar[0], "../assets/gambar/" . $namagambar[0]);
        $conn->query("INSERT INTO produk(id_kategori,nama_produk,harga_produk,berat_produk,gambar_produk,stok_produk,deskripsi_produk) 
        VALUES('$id_kategori','$nama','$harga','$berat','$namagambar[0]','$stok','$deskripsi')");

            echo "<script>alert('data berhasil disimpan');</script>";
            echo "<script>location='homepage_admin.php?halaman=produk';</script>";
 
    }

?>