<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori_barang WHERE id_kategori=$id");
header("Location: kategori.php");
?>
