<?php
session_start();

include 'database/db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <div class="col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>
                            <form method="post" class="user">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">
                                    <i class="bi bi-envelope-fill"></i>
                                    </label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">
                                    <i class="bi bi-lock-fill"></i>
                                    </label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" 
                                    placeholder="Masukkan Password">
                                </div>
                            </div>
                            <div class="text-left">
                                <a href="register.php">Silahkan Register</a>
                            </div>

                               <div class="text-right">
                                <button name="login" class="btn btn-primary">
                                    Login
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
if(isset($_POST['login']))
    {
    $email = $_POST['email'];
    $password = ($_POST['password']);

    $ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    $akun = $ambil->num_rows;

    if($akun==1)
    {
        $_SESSION['pelanggan'] = $ambil->fetch_assoc();
        echo "<script>alert('Login Sukses!');</script>";
        echo "<script>location='homepage.php';</script>";
    }

    else
    {
        echo "<script>alert('Login Gagal!');</script>";
        echo "<script>location='index.php';</script>";
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