<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();           
$sid = session_id();
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
					<li>Description</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>D</span>escription
				<span>P</span>age</h3>
			<!-- //tittle heading -->
			<div class="row">
					<?php
include "includes/koneksi.php";
include "includes/config.php";

$id_pro = $_GET['id_produk'];

$sql = mysql_query("SELECT * from tbl_produk where id_produk='$id_pro'");
while($ketemu = mysql_fetch_array($sql))	
	{
	
  
?>
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="admin/upload/<?php echo $ketemu['gambar'];?> " alt="">
									<div class="thumb-image">
										<img src="admin/upload/<?php echo $ketemu['gambar'];?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?=$ketemu['nama_produk']?></h3>
					<p class="mb-3">
						<span class="item_price">Rp. <?= number_format($ketemu['harga']); ?></span>
						
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
							<span>Stok :</span>
								<?=$ketemu['stok']; ?>
							</li>
							
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<label>1 Year</label>Manufacturer Warranty</p>
						<ul>
							<li class="mb-1">
								<?= $ketemu['deskripsi']; ?>
							</li>
							
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="aksi_keranjang.php" method="post">
								<fieldset>
									<input type="hidden" name="id_produk" id="id_produk" value="<?php echo $ketemu['id_produk']; ?>" >
									<input type="hidden" name="harga" id="harga" value="<?php echo $ketemu['harga']; ?>">
									<input type="submit" name="submit" value="Add to cart" class="button" >
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- //Single Page -->

	<!-- middle section -->
	<?php
include "template/mid.php";
	?>
	<!-- middle section -->

	<!-- footer -->
	
	<?php
	include "template/footer.php";

	?>
