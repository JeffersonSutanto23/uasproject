<?php

$id_produk = $_GET['id'];

$ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$pecah = $ambil->fetch_assoc();



$conn->query("DELETE FROM produk WHERE id_produk='$id_produk'");

    echo "<script>alert('data berhasil dihapus');</script>";
    echo "<script>location='homepage_admin.php?halaman=produk';</script>";

?>