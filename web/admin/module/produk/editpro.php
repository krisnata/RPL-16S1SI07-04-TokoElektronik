<?php
//aksi edit  untuk produk
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    
include "../../../includes/koneksi.php";
include "../../../includes/config.php";
 $idKategori = $_POST['idKategori'];
    $idMerek = $_POST['idMerek'];
    $idProduk 	= $_POST['id_produk'];
    $namaProduk = $_POST['namaProduk'];
	$deskripsi 	= $_POST['deskripsiProduk'];
    $Stok       = $_POST['stok'];
	$hargaProduk= $_POST['hargaProduk'];
	$nama_file 	= $_FILES['gambar']['name'];
    $ukuran_file= $_FILES['gambar']['size'];
    $tipe_file 	= $_FILES['gambar']['type'];
    $tmp_file 	= $_FILES['gambar']['tmp_name'];
	$slide 		= $_POST['slide'];

	
	$path = "../../upload/" . $nama_file;
	if($nama_file==""){
	$queryEdit = mysql_query("UPDATE tbl_produk SET id_kategori_produk='$idKategori',id_merek='$idMerek' ,nama_produk='$namaProduk', deskripsi='$deskripsi', stok='$Stok', harga='$hargaProduk', slide='$slide' WHERE id_produk='$idProduk'");
        if ($queryEdit) {
             echo "<script> alert('Data Produk Berhasil diperbarui'); window.location = '$admin_url'+'admin.php?module=produk';</script>";
        }
	}else{	

    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if ($ukuran_file <= 1000000) {// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if (move_uploaded_file($tmp_file, $path)) {// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $querySimpan = mysql_query("UPDATE tbl_produk SET gambar='$nama_file' ,nama_produk='$namaProduk', deskripsi='$deskripsi', stok='$Stok', harga='$hargaProduk', slide='$slide' WHERE id_produk='$idProduk'" );

                if ($querySimpan) {// Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                  echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'admin.php?module=produk';</script>";
                } else {
                    // Jika Gagal, Lakukan :
                echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'admin.php?module=feditpro';</script>";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location = '$admin_url'+'admin.php?module=tambahpro';</script>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<script> alert('Data Gambar Produk Gagagl Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'admin.php?module=feditpro';</script>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
      echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$admin_url'+'admin.php?module=tambahpro';</script>";
    }
	
}

}

?>