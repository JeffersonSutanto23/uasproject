<?php
session_start();
include 'database/db.php';



$produk = array();

$ambil = $conn->query("SELECT * FROM produk JOIN kategori
    ON produk.id_kategori=kategori.id_kategori LIMIT 4");

while($pecah = $ambil->fetch_assoc())
{
    $produk[]=$pecah;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licht Store</title>
    
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

    <!-- navbar start -->
    <?php include 'include/navbar.php';?>
    <!-- navbar end -->
    <!-- home section start -->
    <section class="home">
        <div id="owl-nav"></div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="assets/gambar/banner4.jpg">
                <main class="content">
                    <h1>Licht</h1>
                    <p>Kami menjunjung tinggi kualitas diatas kuantias, barang kami berkualitas, pembeli pun puas!</p>
                    <a href="produk.php" class="btn btn-primary">Beli Sekarang</a>
                </main>
            </div>

            <div class="item">
                <img src="assets/gambar/banner2.jpg">
                <main class="content">
                    <h1>Licht</h1>
                    <p>Kami menjunjung tinggi kualitas diatas kuantias, barang kami berkualitas, pembeli pun puas!</p>
                    <a href="produk.php" class="btn btn-primary">Beli Sekarang</a>
                </main>
            </div>
        </div>
    </section>
    <!-- home section end -->

    <div class="container">
        <!-- Tentang Kami Start-->
        <section class="about">
            <h2 class="judul"><span>Tentang</span> Kami</h2>
            <div class="row">
                <div class="col-md-6 about-img">
                    <img src="assets/gambar/banner5.jpg">
                </div>
                <div class="col-md-6 content">
                    <h3>Kenapa Memilih Produk Kami?</h3>
                    <p>Produk Kami menggunakan bahan yang berkualitas dan harga merakyat</p>
                    <p>Produk Kami dijamin lebih tahan lama dan tidak cepat rusak!</p>
                </div>
            </div>
        </section>
        <!-- Tentang Kami End-->

        <!-- produk start-->
        <section class="produk">
            <h2 class="judul"><span>Bestseller</span> Kami</h2>
            <div class="row">

            <?php foreach ($produk as $key => $value): ?>
                <div class="col-md-3">
                <div class="card">
                    <img src="assets/gambar/<?php echo $value['gambar_produk'];?>">
                    <div class="card-body content">
                        <h5><?php echo $value['nama_produk']; ?></h5>
                        <p>Rp<?php echo number_format($value['harga_produk']); ?></p>
                        <a href="order.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-success">
                        <i class="bi bi-cart-fill"></i> Keranjang
                        </a>
                        <a href="detailproduk.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-success">
                        <i class="bi bi-eye"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>


            </div>
        </section>
        <!-- produk end-->

    </div>

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