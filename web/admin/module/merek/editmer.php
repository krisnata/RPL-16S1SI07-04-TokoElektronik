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
    $namaMerek = $_POST['nama_merek'];
    $queryEdit = mysql_query("UPDATE tbl_merek SET nama_merek='$namaMerek' WHERE id_merek='$idMerek'");

    if ($queryEdit) {
        echo "<script> alert('Data Merek Berhasil Diubah'); window.location = '$admin_url'+'admin.php?module=merek';</script>";
    } else {
        echo "<script> alert('Data Merek Gagal Diubah'); window.location = '$admin_url'+'admin.php?module=feditmer&id_merek='+'$idMerek';</script>";

    }
}
?>