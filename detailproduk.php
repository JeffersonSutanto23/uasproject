<?php
session_start();
include 'database/db.php';

$id_produk = $_GET['idproduk'];

$produk = array();
$ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$produk = $ambil->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Detail Produk</title>
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

<section class="produk-page">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Beranda</a></li>
            <li>Detail Produk</li>
        </ul>

        <div class="row">
            <div class="col-md-3">
               <?php include 'include/sidebar.php' ?>
            </div>

            <div class="col-md-9 detail-produk">
                <div class="row">
                    <div class="col-6">
                       <div id="owl-nav"></div>
                       <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="assets/gambar/<?php echo $produk['gambar_produk']; ?>">
                        </div>
                       </div>
                    </div>
                
                    <div class="col-6 detail-form">
                        <form method="post">
                            <div class="card">
                                <div class="card-body">
                                    <h3><?php echo $produk['nama_produk']?></h3>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jumlah: </label>
                                        <div class="col-sm-9">
                                        <input type="number" name="jumlah" class="form-control" value="1" 
                                        min="1" max="<?php echo $produk['stok_produk']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Stok: </label>
                                        <div class="col-sm-9">
                                        <input disabled class="form-control" 
                                        value="<?php echo $produk['stok_produk']; ?>">
                                        </div>
                                    </div>
                                    <h5>Rp<?php echo number_format($produk['harga_produk']) ; ?></h5>
                                </div>
                                <div class="card-footer text-right">
                                    <button name="beli" class="btn btn-success">
                                    <i class="bi bi-cart-fill"></i> Keranjang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card detail">
                    <div class="card-body">
                        <h2>Detail Produk</h2>
                        <p>
                            <?php echo $produk['deskripsi_produk']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
if(isset($_POST['beli']))
{
    $jumlah = $_POST['jumlah'];
    $_SESSION['keranjangbelanja'][$id_produk] = $jumlah;

    echo "<script>alert('Barang telah dimasukkan ke dalam keranjang Anda!');</script>";
    echo "<script>location='keranjang.php';</script>";
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