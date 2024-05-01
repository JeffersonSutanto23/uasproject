<?php
session_start();
include 'database/db.php';

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
    <title>Keranjang Anda </title>
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

        <div class="card box">
            <div class="card-body">
                <h2>Keranjang Belanja</h2>
                <p>Items anda akan dilist dibawah</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($_SESSION['keranjangbelanja'] as $id_produk => $jumlah): 
                            $ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                            $pecah = $ambil->fetch_assoc();
                            $subtotal = $pecah['harga_produk'] * $jumlah;
                            ?>
                        <tr>
                            <td width="25px"><?php echo $no++; ?></td>
                            <td><img src="./assets/gambar/<?php echo $pecah['gambar_produk']; ?>" width="50"></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp<?php echo number_format($pecah['harga_produk']); ?></td>
                            <td>Rp<?php echo number_format($subtotal); ?></td>
                            <td><a href="hapuskeranjang.php?idproduk=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                        <?php endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-10">
                        <a href="produk.php" class="btn btn-info">Kembali Berbelanja</a>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="checkout.php" class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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