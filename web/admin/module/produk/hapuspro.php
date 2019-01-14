<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

   include "../../../includes/koneksi.php";
include "../../../includes/config.php";
    $idProduk = $_POST['id_produk'];
    $queryHapus = mysql_query("DELETE FROM tbl_produk WHERE id_produk='$idProduk'");
    if ($queryHapus) {
        echo "<script> alert('Data Produk Berhasil Dihapus'); window.location = '$admin_url'+'admin.php?module=produk';</script>";
    } else {
        echo "<script> alert('Data Produk Gagal Dihapus'); window.location = '$admin_url'+'admin.php?module=produk';</script>";

    }
}
?>


    