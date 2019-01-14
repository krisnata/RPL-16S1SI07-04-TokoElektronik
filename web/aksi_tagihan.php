
<?php
         

session_start();

if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){
	header("location:index.php");
}

include "includes/koneksi.php";
include "includes/config.php"; 

$id = $_POST['id_tagihan'];

	$nama_file = $_FILES['gambar']['name'];

    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
 

$path = "images/upload/" . $nama_file;
	if($nama_file==""){
    $querySimpan =mysql_query("update tbl_tagihan set gambar = '$nama_file' where id_tagihan = '$id'");
        if ($querySimpan) {

          //  echo "<script> alert('Foto Transaksi Berhasil Masuk'); window.location = '$base_url'+'tagihan.php';</script>";
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
                $querySimpan =mysql_query("update tbl_tagihan set gambar = '$nama_file' where id_tagihan = '$id'");

                if ($querySimpan) {// Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert('Foto Transaksi Berhasil Masuk'); window.location = '$base_url'+'tagihan.php';</script>";
                } else {
                    // Jika Gagal, Lakukan :
                   echo  "<script> alert('foto gagal Masuk'); window.location = '$base_url'+'tagihan.php';</script>";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
               echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location = '$base_url'+'tagihan.php';</script>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<script> alert('Data Gambar  Gagal Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$base_url'+'tagihan.php';</script>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "<script> alert('Data Gambar Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$base_url'+'tagihan.php';</script>"; 
    }
    
     
}





//for ($i=0; $i<$jml; $i++){
//	mysql_query("delete from tbl_order where id_order={$isikeranjang[$i]['id_order']}");
	
//}
?>
