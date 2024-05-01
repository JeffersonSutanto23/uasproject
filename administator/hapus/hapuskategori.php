<?php

$id_kategori = $_GET['id'];

$conn->query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='homepage_admin.php?halaman=kategori';</script>";

?>