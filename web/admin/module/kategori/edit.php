<?php
/**
 * 
 * @package         APLIKASI WEB PENJUALAN UNTUK KULIAH E-COMMERCE
 * @description     Free Version
 * @version         1.0
 * @copyright       Copyright (c) 2016, Ika Nur Fajri
 * ==========================================================
 * =================== ABOUT DEVELOPER ======================
 * ==========================================================
 * License          Free Copy
 * Email            ika.nur.fajri@amikom.ac.id
 * Mobile           +62-98-638-673-204
 * ==========================================================
 * ==========================================================
 * Silakan Disempurnakan
**/
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

   include "../../../includes/koneksi.php";
include "../../../includes/config.php";

    $idKategori = $_POST['id_kategori'];
    $namaKategori = $_POST['nama_kategori'];
    
    $queryEdit = mysql_query("UPDATE tbl_kategori SET nama_kategori='$namaKategori' WHERE id_kategori_produk='$idKategori'");

    if ($queryEdit) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'admin.php?module=kategori';</script>";
    } else {
        //echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'admin.php?module=feditkat&id_kategori='+'$idKategori';</script>";

    }
}
?>