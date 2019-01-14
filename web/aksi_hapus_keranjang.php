<?php
session_start();

    include "includes/koneksi.php";
    include "includes/config.php";
    $idOrder = $_GET['id_Order'];
    $queryHapus = mysql_query("DELETE FROM tbl_order WHERE id_order='$idOrder'");
    if ($queryHapus) {
        echo "<script> alert('Kerajang Berhasil Dihapus');
        window.location = '$base_url'+'keranjang.php';</script>";
    } else {
    echo "<script> alert('Kerajang Gagal Dihapus');
        window.location = '$base_url'+'keranjang.php';</script>";

    }


?>