
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../includes/koneksi.php";
include "../../../includes/config.php";

    $idBiaya = $_GET['id_biaya_kirim'];
    $queryHapus = mysql_query("DELETE FROM tbl_biaya_kirim WHERE id_biaya_kirim='$idBiaya'");
    if ($queryHapus) {
        echo "<script> alert('Data Biaya Kirim Berhasil Dihapus'); window.location = '$admin_url'+'admin.php?module=biayakirim';</script>";
    } else {
        echo "<script> alert('Data Biaya Kirim Gagal Dihapus'); window.location = '$admin_url'+'admin.php?module=biayakirim';</script>";

    }
}
?>