
<?php
         

session_start();

 $sid =  session_id();
if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){
	header("location:index.php");

}

$id_or=$_SESSION["idm"];
include "includes/config.php";
include "includes/koneksi.php";

 $sql = mysql_query ("select * from tbl_order, tbl_produk where tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");

   								$total=0;
					while($d=mysql_fetch_array($sql)){

					
					$subtotal    = $d['harga']* $d['jumlah'];
					$total = $total + $subtotal;


}

function isi_keranjang(){
    $isikeranjang=array();
    $sid =  session_id();
    $sql = mysql_query("SELECT * FROM tbl_order WHERE id_session='$sid'");
    while($r=mysql_fetch_array($sql)){

        $isikeranjang[]=$r;
    }
    return $isikeranjang;
}

$tgl_skrg = date("Y-m-d");



mysql_query("insert into tbl_tagihan (Id_member,tanggal_beli,total_tagihan,status_order) values ('$id_or','$tgl_skrg','$total','Belum dikonfirmasi')");

//mysql_query("insert into tbl_pembelian(nama, alamat, email, no_telp, tanggal_beli, status_order, biaya_kirim) 
//values ('ttt', 'hhh','gggg', 'yyy', 'ttt', 'P', '45')");

//$id_orders=mysql_insert_id();

//mysql_query("update tbl_order set id_pembelian = $id_orders where id_session = $sid");



$isikeranjang=isi_keranjang();
$jml=count($isikeranjang);

$sql_tag=mysql_query("select id_tagihan from tbl_tagihan order by id_tagihan ASC");

while ($id_t=mysql_fetch_assoc($sql_tag)) {
	


$id_tagihan=$id_t['id_tagihan'];
}

for ($i=0; $i<$jml; $i++){
	mysql_query("insert into tbl_detail_order(id_produk,Id_member,id_tagihan,jumlah, harga) values (
	{$isikeranjang[$i]['id_produk']},'$id_or','$id_tagihan', {$isikeranjang[$i]['jumlah']}, {$isikeranjang[$i]['harga']})");
	
}






//mysql_query("update tbl_detail_order set id_tagihan='$id_tagihan' where Id_member='$id_or' ") or die (mysql_error());
		
		


//for ($i=0; $i<$jml; $i++){
	//mysql_query("delete from tbl_order where id_order={$isikeranjang[$i]['id_order']}");
	
//}



//mysql_query("update tbl_order set Id_member = '$id_orders' where id_session = '$sid'");


for ($i=0; $i<$jml; $i++){
	mysql_query("delete from tbl_order where id_order={$isikeranjang[$i]['id_order']}");
	
}
header('Location:checkout.php');
?>