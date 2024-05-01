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
    <h5><strong>Pembayaran</strong></h5>
</div>
<?php

$id_pembelian=$_GET['id'];
$ambil= $conn->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();
?>

<div class="alert alert-primary shadow mt-3 ml-3 mr-3 text-dark">
    Total Tagihan Anda : <b> Rp. <?php echo number_format($pecah['total_pembelian']); ?> </b>
</div>

<div class="shadow bg-white p-3 mb-12 ml-3 mr-3 rounded">
    <form method="post">
    <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama : </label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" >
            </div>
        </div>
    
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bank : </label>
            <div class="col-sm-9">
                <select name="bank" class="form-control">
                    <option selected disabled>Pilih Metode Pembayaran</option>
                    <option value="bri">BRI</option>
                    <option value="bca">BCA</option>
                    <option value="bni">BNI</option>
                    <option value="mandiri">Mandiri</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jumlah : </label>
            <div class="col-sm-9">
                <input type="text" name="jumlah" class="form-control" value="<?php echo $pecah['total_pembelian']; ?>" readonly >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button name="kirim" class="btn btn-primary">Kirim</button>
            </div>
        </div>

        </div>
    </form>
</div>

<?php include 'include/footer.php'; ?>

<?php
if(isset($_POST['kirim']))
{
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date('Y-m-d');
   
    $conn->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal) 
    VALUES ('$id_pembelian','$nama','$bank','$jumlah','$tanggal')");

    //update tabel
    $conn->query("UPDATE pembelian SET status_pembelian='sedang diproses'
    WHERE id_pembelian='$id_pembelian'");

echo "<script>alert('Pembayaran Terkirim!');</script>";
echo "<script>location='pesanan.php';</script>";
}


?>

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