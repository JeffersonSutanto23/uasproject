<?php
session_start();

$id_produk = $_GET['idproduk'];

if (isset($_SESSION['keranjangbelanja'][$id_produk]))
{
    $_SESSION['keranjangbelanja'][$id_produk]+=1;
}
else
{
    $_SESSION['keranjangbelanja'][$id_produk]=1;
}

echo "<script>alert('Barang telah dimasukkan ke dalam keranjang Anda!');</script>";
echo "<script>location='keranjang.php';</script>";
?>