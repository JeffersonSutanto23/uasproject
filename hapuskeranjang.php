<?php

session_start();

$id_produk = $_GET['idproduk'];

unset($_SESSION['keranjangbelanja'][$id_produk]);

echo "<script>alert('Barang telah dihapus dari keranjang Anda!');</script>";
echo "<script>location='keranjang.php';</script>";
?>