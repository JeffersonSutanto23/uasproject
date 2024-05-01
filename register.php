<?php

include 'database/db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
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

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center" id="login">

    <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                            </div>
                            <form method="post" class="user">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    Email
                                    </label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    Nama Lengkap
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama" class="form-control" 
                                    placeholder="Masukkan Nama Lengkap" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    Nomor Telepon
                                    </label>
                                <div class="col-sm-8">
                                    <input type="number" name="telepon" class="form-control" 
                                    placeholder="Masukkan No. Telepon" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    Alamat
                                    </label>
                                <div class="col-sm-8">
                                    <textarea type="text" name="alamat" class="form-control" 
                                    placeholder="Masukkan Alamat Tempat Tinggal" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    Password
                                    </label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" 
                                    placeholder="Masukkan Password" required>
                                </div>
                            </div>

                               <div class="text-right">
                                <button name="register" class="btn btn-primary">
                                    Register Sekarang
                                </button>
                               </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<?php
if(isset($_POST['register']))
    {
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $nama = ($_POST['nama']);
    $telepon = ($_POST['telepon']);
    $alamat = ($_POST['alamat']);

    $ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
    $akuntersedia = $ambil->num_rows;
    if($akuntersedia==1)
    {
        echo "<script>alert('Email yang anda daftar sudah diregister sebelumnya!');</script>";
        echo "<script>location='register.php';</script>";
    }
    else{
        $conn->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,
        telepon_pelanggan,alamat_pelanggan,password_pelanggan)
        VALUES('$nama','$email','$telepon','$alamat','$password')");

    echo "<script>alert('register berhasil, silahkan login kembali!');</script>";
    echo "<script>location='login.php';</script>";
    }
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