
<?php
         

session_start();
 $sid =  session_id();
if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){
	header("location:index.php");
}

$id_or=$_SESSION["idm"];

include "includes/config.php";
include "includes/koneksi.php";

$sql_check=mysql_query("select id_detail_order from tbl_detail_order where id_member='$id_or'") or die(mysql_error()); // Memanggil Tabel Order Sesuai ID Member
$check=mysql_num_rows($sql_check);

	if($check<=0){ // Jika Data Kosong Maka Muncul Peringatan
		echo "<script>alert('Anda Belum Melakukan Pembelian!');window.location=('indexmember.php');</script>";
	}


$sql_tag=mysql_query("select id_tagihan from tbl_tagihan order by id_tagihan ASC");

while ($id_t=mysql_fetch_assoc($sql_tag)) {
	


$id_tagihan=$id_t['id_tagihan'];
}



?>
<?php
include "template/headerm.php";

?>

<?php
include "template/nav.php";
?>

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="indexmember.php">Home</a>
						<i>|</i>
					</li>
					<li>payment</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>P</span>ayment
			</h3>
			<!-- //tittle heading -->
			
			<div class="checkout-right">
				

				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>No</th>
								<th>Id Tagihan</th>
								<th>Tanggal beli</th>
								<th>Total</th>
								<th>Status</th>
								<th>Konfirmasi</th>
								
								<th>Detail</th>
								
							</tr>
						</thead>
						
						<?php
			



					$no=0;
					 $sql = mysql_query ("select * from tbl_tagihan where Id_member='$id_or'")or die(mysql_error());

					while($d=mysql_fetch_array($sql)){

					
					
					$no++;
					?>
						

						<tbody>

							<tr class="rem1">
								<td class="invert"><?php echo "$no"; ?></td>
								<td class="invert"><?php echo $d['id_tagihan']; ?></td>
								<td class="invert"><?php echo $d['tanggal_beli']; ?></td>
								<td class="invert">Rp. <?php echo number_format($d['total_tagihan']); ?></td>
								<td class="invert"><?php echo $d['status_order']; ?></td>
								<td class="invert-image">

										<img src="images/upload/<?php echo $d['gambar'];?>" alt="" height="100" width="150">
									
								</td>
									
								<td class="invert">
									<form action="Konfirmasi_member.php" method="post" >
													<fieldset>
														<input type="hidden" name="id_tagihan" value="<?php echo $d['id_tagihan']; ?>">
														 <input type="submit" name="submit" value="Konfirmasi" class="button btn">
													
													</fieldset>
												</form>

									<form action="detail_tagihan.php" method="post" >
													<fieldset>
													<input type="hidden" name="id_tagihan" value="<?php echo $d['id_tagihan']; ?>">
														<input type="submit" name="submit" value="Lihat" class="button btn">
													</fieldset>
												</form>
								</td>
								
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
			</div>
			</br>
			
							 	
			</br>
		
		<div class="checkout-right">
			<h4 class="container tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">pastikan gambar tampil di tabel
					
				</h4>
								
									 
									
					</div>
			


		</div>
	</div>
	<!-- //checkout page -->
<?php include "template/footer.php" ?>