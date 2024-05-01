<?php
session_start();
include 'database/db.php';
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

$pembelian = array();
$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pelanggan='$id_pelanggan'");
while($pecah = $ambil->fetch_assoc())
{
    $pembelian[]=$pecah;
}
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
    <h5><strong>Pesanan Saya</strong></h5>
</div>

<div class="card shadow mt-3 ml-3 mr-3">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembelian as $key => $value): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td>
                        <?php echo date("d F Y", strtotime($value['tanggal_pembelian'])); ?>
                    </td>
                    <td>
                        Rp.<?php echo number_format($value['total_pembelian']); ?>
                    </td>
                    <?php if($value['status_pembelian']=='Pending'): ?>
                        <td class="text-center text-danger">
                       <?php echo $value['status_pembelian']; ?><br>
                       <!-- jika resi tidak kosong -->
                       <?php if(!empty($value['resi_pengiriman'])): ?>
                        <?php echo $value['resi_pengiriman']; ?>
                        <?php endif?>
                    </td>
                    <?php elseif($value['status_pembelian']=='pembayaran gagal'): ?>
                        <td class="text-center text-danger">
                       <?php echo $value['status_pembelian']; ?><br>
                       <!-- jika resi tidak kosong -->
                       <?php if(!empty($value['resi_pengiriman'])): ?>
                        <?php echo $value['resi_pengiriman']; ?>
                        <?php endif?>
                    </td>
                    <?php else: ?>
                        <td class="text-center text-success">
                       <?php echo $value['status_pembelian']; ?><br>
                       <!-- jika resi tidak kosong -->
                       <?php if(!empty($value['resi_pengiriman'])): ?>
                        <?php echo $value['resi_pengiriman']; ?>
                        <?php endif?>
                    </td>
                    <?php endif ?>
                   
                    
                    <td class="text-center" width="250">
                        <a href="detailpesanan.php?page=detail_pembelian&id=<?php echo $value['id_pembelian']; ?>" 
                        class="btn btn-primary">Nota</a>

                        <?php if($value['status_pembelian']=='Pending'): ?>
                        <a href="pembayaran.php?page=pembayaran&id=<?php echo $value['id_pembelian']; ?>" 
                        class="btn btn-success">Input Pembayaran</a>
                        <?php elseif($value['status_pembelian']=='pembayaran gagal'): ?>
                        <a href="pembayaran.php?page=pembayaran&id=<?php echo $value['id_pembelian']; ?>" 
                        class="btn btn-success">Ulang Pembayaran</a>
                        <?php else: ?>
                        <a href="detailpembayaran.php?page=detailpembayaran&id=<?php echo $value['id_pembelian']; ?>" 
                        class="btn btn-info">Lihat Pembayaran</a>    
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
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