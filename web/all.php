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

<?php 
include "template/banner.php";

?>


<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				
				<span>S</span>emua
				<span>P</span>roduk</h3>
			<!-- //tittle heading -->
			<div class="row">
			<?php
include "template/right.php"
	?>
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							
							<div class="row">
							<?php
						include "includes/koneksi.php";
						$halaman = 9;
 						 $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							 $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							$query = mysql_query("SELECT * FROM tbl_produk ");
							$total =mysql_num_rows($query);
							$pages = ceil($total/$halaman);
							$res = mysql_query("SELECT * FROM tbl_produk LIMIT $mulai,$halaman")or die(mysql_error);
							$no =$mulai+1;
							while($r = mysql_fetch_array($query))
							{
						?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="admin/upload/<?php echo $r['gambar'];?>" class="responsive"   alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="deskripsi.php?id_produk=<?php echo $r['id_produk']; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="deskripsi.php?id_produk=<?php echo $r['id_produk']; ?>">
											
											<p><?php echo $r['nama_produk'];?></p>
										</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">Rp. <?php echo number_format($r['harga']);?></span>
												
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="aksi_keranjang.php" method="post">
													<fieldset>
														<input type="hidden" name="id_produk" id="id_produk" value="<?php echo $r['id_produk']; ?>">
														<input type="hidden" name="harga" id="harga" value="<?php echo $r['harga']; ?>">
														<input type="submit" name="submit" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
						
								<?php } ?>
							</div>
						</div>
						<!-- //first section -->
					
						
						
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
	
			
			</div>
		</div>
	</div>
	<div class="container py-xl-4 py-lg-2">
<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
					<div class="product-sec1 px-sm-3 px-3 py-sm-3  py-3 mb-3">
					<h class="heading-tittle text-left">Halaman</h>
					<span> | </span>
						<?php
						 for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?> " class=""><?php echo $i; ?> | </a>
   <?php } ?>
					
					</div>
					</div>
					</div>
					</div>
				</div>


<?php 
include "template/mid.php";
?>
<?php
include "template/footer.php";
?>

