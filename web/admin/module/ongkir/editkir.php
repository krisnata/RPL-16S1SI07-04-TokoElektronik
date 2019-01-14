
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../includes/koneksi.php";
include "../../../includes/config.php";
    $idBiaya = $_POST['id_biaya_kirim'];
    $kota = $_POST['kota'];
    $biaya=$_POST['biaya'];
    $queryEdit = mysql_query("UPDATE tbl_biaya_kirim SET kota='$kota', biaya='$biaya' WHERE id_biaya_kirim='$idBiaya'");

    if ($queryEdit) {
        echo "<script> alert('Data Biaya Kirim Berhasil Diubah'); window.location = '$admin_url'+'admin.php?module=biayakirim';</script>";
    } else {
        echo "<script> alert('Data Biaya Kirim Berhasil Diubah'); window.location = '$admin_url'+'admin.php?module=editkir&id_biaya_kirim='+'$idBiaya';</script>";

    }
}
?>