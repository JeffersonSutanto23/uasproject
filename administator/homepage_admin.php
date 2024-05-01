<?php
    session_start();
    include '../database/db.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator Licht Store</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Licht</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="homepage_admin.php">
                <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <li class="nav-item">
                <a class="nav-link" href="homepage_admin.php?halaman=kategori">
                <i class="bi bi-list-task"></i>
                    <span>Kategori</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="homepage_admin.php?halaman=produk">
                <i class="bi bi-boxes"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="homepage_admin.php?halaman=pembelian">
                <i class="bi bi-cart-fill"></i>
                    <span>Pembelian</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="homepage_admin.php?halaman=pelanggan">
                <i class="bi bi-people-fill"></i>
                    <span>Pelanggan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="homepage_admin.php?halaman=logout">
                <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        <?php
                            if (isset($_GET['halaman']))
                            {
                                
                                if($_GET['halaman']=="kategori")
                                {
                                    include 'kategori.php';
                                }

                                elseif($_GET['halaman']=="tambahkategori")
                                {
                                    include 'tambah/tambahkategori.php';
                                }

                                elseif($_GET['halaman']=="editkategori")
                                {
                                    include 'edit/editkategori.php';
                                }

                                elseif($_GET['halaman']=="hapuskategori")
                                {
                                    include 'hapus/hapuskategori.php';
                                }

                                elseif($_GET['halaman']=="produk")
                                {
                                    include 'produk.php';
                                }

                                elseif($_GET['halaman']=="tambahproduk")
                                {
                                    include 'tambah/tambahproduk.php';
                                }

                                elseif($_GET['halaman']=="editproduk")
                                {
                                    include 'edit/editproduk.php';
                                }

                                elseif($_GET['halaman']=="hapusproduk")
                                {
                                    include 'hapus/hapusproduk.php';
                                }

                                elseif($_GET['halaman']=="pembelian")
                                {
                                    include 'pembelian.php';
                                }

                                elseif($_GET['halaman']=="detailpembelian")
                                {
                                    include 'detail/detailpembelian.php';
                                }

                                elseif($_GET['halaman']=="pembayaran")
                                {
                                    include 'pembayaran.php';
                                }

                                elseif($_GET['halaman']=="pelanggan")
                                {
                                    include 'pelanggan.php';
                                }

                                elseif($_GET['halaman']=="logout")
                                {
                                    include 'logout.php';
                                }
                            }

                            else
                            {
                                include 'dashboard.php';
                            }
                        ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function(){
            $(".btn-tambah").on("click",function(){
                $(".input-gambar").append("<input type='file' name='gambar[]' class='form-control'>");
            })
        })
    </script>

</body>

</html>