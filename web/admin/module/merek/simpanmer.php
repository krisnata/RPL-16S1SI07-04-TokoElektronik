<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

   include "../../../includes/koneksi.php";
include "../../../includes/config.php";

    $namaMerek = $_POST['namaMerek'];

    $querySimpan = mysql_query("INSERT INTO tbl_merek (nama_merek) VALUES ('$namaMerek')");
    if ($querySimpan) {
        echo "<script> alert('Data Merek Berhasil Masuk'); window.location = '$admin_url'+'admin.php?module=merek';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Merek Gagal Dimasukkan'); window.location = '$admin_url'+'admin.php?module=tambahmer';</script>";
    }
}
?>