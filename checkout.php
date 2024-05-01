<?php
session_start();
include 'database/db.php';

$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

if(empty($_SESSION['keranjangbelanja']) OR !isset($_SESSION['keranjangbelanja']))
{
    echo "<script>alert('Keranjang anda kosong, silahkan kembali berbelanja');</script>";
    echo "<script>location='produk.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<?php include 'include/navbar.php';?>

<section class="keranjang-page">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Beranda</a></li>
            <li>Keranjang Belanja</li>
        </ul>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $subtotal = 0;
                        foreach ($_SESSION['keranjangbelanja'] as $id_produk => $jumlah): 
                            $ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah['harga_produk'] * $jumlah;
                            $subberat= $pecah['berat_produk'] * $jumlah;
                            $totalbelanja = $subtotal+=$subharga;
                            ?>
                            <tr>
                            <td width="25px"><?php echo $no++; ?></td>
                            <td><img src="./assets/gambar/<?php echo $pecah['gambar_produk']; ?>" width="50"></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp<?php echo number_format($pecah['harga_produk']); ?></td>
                            <td>Rp<?php echo number_format($subharga); ?></td>
                        <?php endforeach ?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Total Belanja</th>
                            <th>Rp<?php echo number_format($totalbelanja); ?></th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <input type="text" class="form-control" 
                        value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" readonly>
                        <br>
                        <input type="text" class="form-control" 
                        value="<?php echo $_SESSION['pelanggan']['email_pelanggan']; ?>" readonly>
                        <br>
                        <input type="text" class="form-control" 
                        value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>" readonly>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                        <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                    Alamat:
                                    </label>
                                <div class="col-sm-9">
                                    <textarea type="text" name="alamat" class="form-control" 
                                    placeholder="Masukkan Alamat Tempat Tinggal" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Provinsi Pengiriman: </label>
                                <div class="col-sm-9">
                                    <select name="provinsi" class="form-control">
                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Distrik Pengiriman: </label>
                                <div class="col-sm-9">
                                    <select name="distrik" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ekspedisi: </label>
                                <div class="col-sm-9">
                                    <select name="ekspedisi" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Paket Pengiriman: </label>
                                <div class="col-sm-9">
                                    <select name="paket" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                        
                        <input type="text" name="total_berat" class="form-control" value="<?php echo $subberat ?>" hidden>
                        <input type="text" name="nama_provinsi" class="form-control" hidden>
                        <input type="text" name="nama_distrik" class="form-control" hidden>
                        <input type="text" name="type_distrik" class="form-control" hidden>
                        <input type="text" name="kode_pos" class="form-control" hidden>
                        <input type="text" name="nama_ekspedisi" class="form-control" hidden>
                        <input type="text" name="paket" class="form-control" hidden>
                        <input type="text" name="ongkir" class="form-control" hidden>
                        <input type="text" name="estimasi" class="form-control" hidden>

                        <div class="text-right">
                            <button name="checkout" class="btn btn-success">Checkout</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?php

if(isset($_POST['checkout']))
{
    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
    $tanggal_pembelian = date('y-m-d');
    $alamat = $_POST['alamat'];
    $berat = $_POST['total_berat'];
    $provinsi = $_POST['nama_provinsi'];
    $distrik = $_POST['nama_distrik'];
    $tipe = $_POST['type_distrik'];
    $kode_pos = $_POST['kode_pos'];
    $ekspedisi = $_POST['nama_ekspedisi'];
    $paket = $_POST['paket'];
    $ongkir = $_POST['ongkir'];
    $estimasi = $_POST['estimasi'];
    $total_pembelian = intval($totalbelanja) + intval($ongkir);
    
    $conn->query("INSERT INTO pembelian
    (id_pelanggan, tanggal_pembelian, total_pembelian, alamat, total_berat, provinsi, distrik, tipe, kode_pos, ekspedisi, paket, ongkir, estimasi)
    VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamat', '$berat', '$provinsi', '$distrik', '$tipe', '$kode_pos', '$ekspedisi', '$paket', '$ongkir', '$estimasi')");

    $id_pembelian_baru = $conn->insert_id;

    foreach($_SESSION['keranjangbelanja'] as $id_produk => $jumlah)
    {
        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        $nama = $pecah['nama_produk'];
        $harga = $pecah['harga_produk'];
        $berat = $pecah['berat_produk'];
        $subberat = $pecah['berat_produk']*$jumlah;
        $subharga = $pecah['harga_produk']*$jumlah;

        $conn->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, berat, subberat, subharga) 
        VALUES ('$id_pembelian_baru', '$id_produk', '$jumlah', '$nama', '$harga','$berat', '$subberat', '$subharga')");

        $conn->query("UPDATE produk SET stok_produk =stok_produk-$jumlah
        WHERE id_produk = '$id_produk'");
    }

    unset($_SESSION['keranjangbelanja']);
    echo "<script>alert('Pembelian Sukses, Terimakasih telah berbelanja!');</script>";
    echo "<script>location='pesanan.php';</script>";
}

?>

<?php include 'include/footer.php'; ?>


<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html> 