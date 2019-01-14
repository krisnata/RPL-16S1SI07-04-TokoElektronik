<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include "includes/koneksi.php";
include "includes/config.php"; 
session_start();           
$sid = session_id();

$sql = mysql_query ("select * from tbl_order, tbl_produk where tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");
$jumlah = 0;

if (isset($_GET['qty'])&&isset($_GET['stok'])) {
	$id=$_GET['id'];
	if ($_GET['qty']=='minus') {
		if ($_GET['stok']<1) {
			echo "<script>alert('Hello! I am an alert box!!')</script>";
		}else{
			$sq = mysql_query ("update tbl_order set jumlah=jumlah-1 where id_order='$id' AND id_session='$sid' ");

		}

	}else{

		$d=$_GET['produk'];
		$g=mysql_query("select * from tbl_produk where id_produk='$d' ");
		$stok=0;
		while($batas=mysql_fetch_object($g)){
			$stok=$stok+$batas->stok;
		}
		
		if ($_GET['stok']>=$stok) {
			echo "<script>alert('Hello! I am an alert box!!')</script>";
		}else{
			$s = mysql_query ("update tbl_order set jumlah=jumlah+1 where id_order='$id' AND id_session='$sid' ");
		}
	
	
}

}
while($d=mysql_fetch_object($sql)){
	$jumlah=$jumlah+$d->jumlah;
}
?>
<?php 
if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){

include "template/header.php";
}else{
include "template/headerm.php";

}


?>

<?php
include "template/nav.php";
?>
	<!-- //navigation -->

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
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>cart</li>
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
				<span>C</span>art
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span><?=$jumlah?> Quantity product</span>
				</h4>

				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Total</th>
								<th>Remove</th>
							</tr>
						</thead>
						<?php
			
					$no=0;
					 $sql = mysql_query ("select * from tbl_order, tbl_produk where tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");

   								$total=0;
					while($d=mysql_fetch_array($sql)){

					
					$subtotal    = $d['harga']* $d['jumlah'];
					$total = $total + $subtotal;
					$no++;
					?>
						

						<tbody>
							<tr class="rem1">
								<td class="invert"><?php echo "$no"; ?></td>
								<td class="invert-image">
									<a href="deskripsi.php?id_produk=<?php echo $d['id_produk'];  ?>">
										<img src="admin/upload/<?php echo $d['gambar'];?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select"><a href="keranjang.php?qty=minus&stok=<?php echo $d['jumlah'];?>&id=<?php echo $d['id_order'];?>">
											<div class="entry value-minus">&nbsp;</div>
												</a>
											<div class="entry value">
												<span><?php echo $d['jumlah']; ?></span>
											</div>
											<a href="keranjang.php?qty=plus&stok=<?php echo $d['jumlah'];?>&id=<?php echo $d['id_order'];?>&produk=<?php echo $d['id_produk'];?>">
											<div class="entry value-plus active">&nbsp;</div>
											</a>
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $d['nama_produk']; ?></td>
								<td class="invert"><?php echo $d['harga']; ?></td>
								<td class="invert">Rp. <?php echo number_format("$subtotal"); ?></td>
								<td class="invert">
									<div class="rem">
										
											<a class="close3" href="<?php echo $base_url; ?>aksi_hapus_keranjang.php?id_Order=<?php echo $d['id_order'];?>"></a>
									
									</div>

								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		
		</div>
	</div>
	<!-- //Single Page -->
<div class="container py-xl-2 py-lg-2">
							
		<div class="checkout-right">
			<h4 class="container tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Cart Totals :
					<span>Rp.<?=number_format($total) ?></span>
				</h4>

					</div>
				
<?php 
if(isset($_SESSION["idm"]) and (isset($_SESSION["name"]))){

include "template/c.php";

}


?>

				</div>
			


	<!-- middle section -->
	<?php
include "template/mid.php";
	?>
	<!-- middle section -->

	<!-- footer -->
	
	<?php
	include "template/footer.php";

	?>
