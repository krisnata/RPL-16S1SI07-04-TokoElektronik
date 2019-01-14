<?php

session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";

} else {

   include "../../../includes/koneksi.php";
   include "../../../includes/config.php";

    $idKategori = $_POST['id_kategori'];
    $queryHapus = mysql_query("DELETE FROM tbl_kategori WHERE id_kategori_produk='$idKategori'");

    if ($queryHapus) {
        echo "<script> alert('Data Kategori Berhasil Dihapus'); window.location = '$admin_url'+'admin.php?module=kategori';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Dihapus'); window.location = '$admin_url'+'admin.php?module=kategori';</script>";

    }
}

?>