<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

  include "../../../includes/koneksi.php";
include "../../../includes/config.php";

    $idMerek = $_POST['id_merek'];
    $queryHapus = mysql_query("DELETE FROM tbl_merek WHERE id_merek='$idMerek'");
    if ($queryHapus) {
        echo "<script> alert('Data Merek Berhasil Dihapus'); window.location = '$admin_url'+'admin.php?module=merek';</script>";
    } else {
        echo "<script> alert('Data Merek Gagal Dihapus'); window.location = '$admin_url'+'admin.php?module=merek';</script>";

    }
}
?>