<?php

include 'database/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya </title>
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
<div class="shadow bg-white p-3 mb-12 mt-3 ml-3 mr-3 rounded">
    <h5><b>Detail Pembelian Pelanggan</b></h5>
</div>

<?php
$id_pembelian = $_GET['id'];

$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan
  ON pembelian.id_pelanggan=pelanggan.id_pelanggan
  WHERE pembelian.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
 
    <div class="col md-4 bg-white p-3 mb-4 mt-3 mr-3 ml-5 rounded">
       <h5>Data Pelanggan</h5>
       <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Nama:</th>
                <td><?php echo $detail['nama_pelanggan']; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $detail['email_pelanggan']; ?></td>
            </tr>
            <tr>
                <th>No.Telepon:</th>
                <td><?php echo $detail['telepon_pelanggan']; ?></td>
            </tr>
        </table>
       </div>
    </div>

    <div class="col md-4 bg-white p-3 mb-4 mt-3 rounded">
        <h5>Data Pembelian dan Pengiriman</h5>
       <div class="table-responsive">
        <table class="table">
            <tr>
                <th>No. Pembelian:</th>
                <td><?php echo $detail['id_pembelian']; ?></td>
            </tr>
            <tr>
                <th>Tanggal:</th>
                <td><?php echo $detail['tanggal_pembelian']; ?></td>
            </tr>
            <tr>
                <th>total:</th>
                <td>Rp. <?php echo $detail['total_pembelian']; ?></td>
            </tr>
            <tr>
                <th>Alamat:</th>
                <td><?php echo $detail['alamat']; ?></td>
            </tr>
            <tr>
                <th>Ongkir:</th>
                <td>Rp. <?php echo $detail['ongkir']; ?></td>
            </tr>
            <tr>
            <th>Ekspedisi:</th>
            <td><?php echo $detail['ekspedisi']; ?></td>
            </tr>
        </div>
        </table>
    </div>
 
    </div>
            <?php
                $pp = array();
                $ambil = $conn->query("SELECT * FROM pembelian_produk
                WHERE pembelian_produk.id_pembelian='$id_pembelian'");
                while($pecah = $ambil->fetch_assoc())
                {
                     $pp[]=$pecah;
                }

            ?>

         <div class="card shadow bg-white ml-3 mr-5 mt-3">
            <div class="card body">
            <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah</th>
                    <th>Subberat</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pp as $key => $value): ?>
                <tr>
                    <td width ="50"><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama']; ?></td>
                    <td>Rp<?php echo number_format($value['harga']); ?></td>
                    <td><?php echo $value['jumlah']; ?></td>
                    <td><?php echo $value['subberat']; ?> gr</td>
                    <td>Rp<?php echo number_format($value['subharga']); ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <div class="alert alert-primary shadow mt-3">
        <p> Silahkan Melakukan Pembayaran: Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
        <strong>BANK BCA : 1951575041 A.N Jefferson Sutanto</strong></p>
    </div>
    </div>
</div>
        </div>
    </div>
</div>


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