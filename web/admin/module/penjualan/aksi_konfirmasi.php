
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";

   }else{

   include "../../../includes/koneksi.php";
include "../../../includes/config.php";
 

 	$id=$_POST['id_tagihan'];
  
		$sql_check=mysql_query("select * from tbl_tagihan where id_tagihan='$id'");
		$row_check=mysql_fetch_assoc($sql_check);
	

			if($row_check['status_order']=='Belum dikonfirmasi'){
				$sql_konfirmasi=mysql_query("update tbl_tagihan SET status_order='Lunas'  where id_tagihan=".$id."") or die(mysql_error());
				$sql_select =mysql_query("select * from tbl_detail_order where id_tagihan=".$id."") or die(mysql_error());
				while($d=mysql_fetch_array($sql_select)){
					$r=$d['jumlah'];
					$o=$d['id_produk'];
					$sql_update_product = mysql_query("update tbl_produk set stok = stok-'$r' where id_produk='$o'");

				
				}
				
				
			}else{
				$sql_konfirmasi=mysql_query("update tbl_tagihan SET status_order='Belum dikonfirmasi' where id_tagihan=".$id."");
			}
			
			if($sql_konfirmasi){
					echo "<script>alert('Status Berhasil Diubah!');window.location = '$admin_url'+'admin.php?module=penjualan';</script>";
				}else{
					echo "<script>alert('Status Gagal Diubah!');window.location = '$admin_url'+'admin.php?module=penjualan';</script>";
				}
		
		}
	
	
?>