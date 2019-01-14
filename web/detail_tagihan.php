<?php
         

session_start();

if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){
	header("location:index.php");
}



include "includes/config.php";
include "includes/koneksi.php";



?>

<?php include "template/headerm.php"; ?>
<?php
include "template/nav.php";
?>
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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>

<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>D</span>etail 
			</h3>

<div class="checkout-right">
				

				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
							
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Total</th>
								
							</tr>
						</thead>
						<?php
			

						$id_tagihan=$_POST['id_tagihan'];

					$no=0;
					 $sql = mysql_query ("select * from tbl_detail_order, tbl_produk,tbl_tagihan where tbl_detail_order.id_tagihan='$id_tagihan' AND tbl_detail_order.id_produk=tbl_produk.id_produk AND tbl_detail_order.id_tagihan=tbl_tagihan.id_tagihan")or die(mysql_error());

   								$total=0;
					while($d=mysql_fetch_array($sql)){

					
					$subtotal    = $d['harga']* $d['jumlah'];
					$total = $total + $subtotal;
					$no++;
					?>
						

						<tbody>
							<tr class="rem1">
								<td class="invert"><?php echo "$no"; ?></td>
								
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											
												
											<div class="entry value">
												<span><?php echo $d['jumlah']; ?></span>
											</div>
											
											
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $d['nama_produk']; ?></td>
								<td class="invert">Rp. <?php echo number_format($d['harga']); ?></td>
								<td class="invert">Rp. <?php echo number_format("$subtotal"); ?></td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
			</div>

	<?php include "template/footer.php"; ?>