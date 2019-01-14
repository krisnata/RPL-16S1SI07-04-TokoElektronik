
<?php
         

session_start();

 $sid =  session_id();
if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){
	header("location:index.php");

}


$id_or=$_SESSION["idm"];
include "includes/config.php";
include "includes/koneksi.php";

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
					<li>Checkout</li>
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
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				

				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								
								<th>Product Name</th>
								<th>Price</th>
								<th>Total</th>
								
							</tr>
						</thead>
						<?php
			



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
								
								
								<td class="invert"><?php echo $d['nama_produk']; ?></td>
								<td class="invert">Rp. <?php echo number_format($d['harga']); ?></td>
								<td class="invert">Rp. <?php echo number_format("$subtotal"); ?></td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			</br>
			<div class="checkout-right">
			<h4 class="container tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Cart Totals :
					<span>Rp.<?=number_format($total) ?></span>
				</h4>

					</div>
		
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Member Detail</h4>
					<?php 
					$r=mysql_query("select * from tbl_member where Id_member='$id_or' ");
					while ($k=mysql_fetch_array($r)) {
					
					
					?>
					<form action="tagihan.php" method="post" clast="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">

									<div class="controls form-group">
									<input type="hidden" name="Id_member" value="<?php echo $k['Id_member']; ?>">
										<input readonly class="billing-address-name form-control" type="text" name="name" value="<?php echo $k['username']; ?>" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input readonly type="text" class="form-control" name="namalengkap" required="" value="<?php echo $k['nama_lengkap']; ?>">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input readonly type="text" class="form-control" name="email" required="" value="<?php echo $k['email']; ?>">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input readonly type="text" class="form-control" placeholder="" name="no_telp" value="<?php echo $k['no_telp']; ?>" required="">
									</div>
									<div class="controls form-group">
										<input readonly type="text" class="form-control" placeholder="" name="alamat" value="<?php echo $k['alamat']; ?>" required="">
									</div>
									<div class="controls form-group">
										<input readonly type="text" class="form-control" placeholder="" name="provinsi" value="<?php echo $k['provinsi']; ?>" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
									<div class="controls form-group">
										<input readonly type="text" class="form-control" placeholder="" name="provinsi" required="">
									</div>
								</div>
								<button class="submit check_out btn">Process</button>
							</div>
						</div>
					</form>
					<?php } ?>
					<div class="checkout-right-basket">
						<a href="payment.html">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>


		</div>
	</div>
	


	<!-- //checkout page -->
