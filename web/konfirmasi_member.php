
<?php
         

session_start();
 $sid =  session_id();
if(!isset($_SESSION["idm"]) and (!isset($_SESSION["name"]))){
	header("location:index.php");
}


include "includes/config.php";
include "includes/koneksi.php";
$id=$_SESSION['idm'];

$sql_check=mysql_query("select id_detail_order from tbl_detail_order where id_member='$id'") or die(mysql_error()); // Memanggil Tabel Order Sesuai ID Member
$check=mysql_num_rows($sql_check);

	if($check<=0){ // Jika Data Kosong Maka Muncul Peringatan
		echo "<script>alert('Anda Belum Melakukan Pembelian!');window.location=('indexmember.php');</script>";
	}





?>
<?php
include "template/headerm.php";

?>

<?php
include "template/nav.php";

?>

<div class="page-head_agile_info_w3l">

	</div>
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

<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
	<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Konfirmasi Foto transfer</h4>
					<?php 
					$id_or=$_POST['id_tagihan'];

					$r=mysql_query("select * from tbl_tagihan where id_tagihan='$id_or' ");
					while ($k=mysql_fetch_array($r)) {
					
					
					?>
					
					<form  action="aksi_tagihan.php" method="post" name="contact-form" enctype="multipart/form-data" >
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row" >
								

						

									<div class="controls form-group ">
								<label class="col-lg-6 col-form-label" for="text-input">Id tagihan :</label>
									<div class="col-lg-6">
										<input readonly type="text" name="name" value="<?php echo $k['id_tagihan']; ?>" required="">
									</div>
									</div>
									
									<div class="controls form-group">
									<label class="col-lg-6 col-form-label" for="text-input">Foto transfer :</label>
									<div class="col-lg-6">
										<input type="hidden" name="id_tagihan" value="<?php echo $k['id_tagihan']; ?>">
										<input type="file" name="gambar">
										</div>
									</div>
									
									
								</div>
								<button class="submit check_out btn">Process</button>
							</div>
						</div>
					</form>
					<?php } ?>
					
				</div>
			</div>

</div>
</div>
			<?php include "template/footer.php" ?>


			