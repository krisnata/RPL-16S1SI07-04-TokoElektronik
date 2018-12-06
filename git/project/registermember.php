<?php
session_start();           
$sid = session_id();
?>


<?php 
include "template/header.php";

?>

<?php 
include "template/nav.php";
?>

<?php 
include "template/banner.php";

?>
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">

	<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Register New member</h4>
					<form action="aksi_register.php" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
									
										<input class="billing-address-name form-control" type="text" name="firstname" placeholder="Full Name" required="">
									</div>
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="lastname" placeholder="Last Name" required="">
									</div>
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="email" placeholder="Email" required="">
									</div>
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="password" name="password" placeholder="password" required="">
									</div>
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="password" name="repassword" placeholder="re-enter password" required="">
									</div>
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="mobile" placeholder="mobile number" required="">
									</div>
											<div class="controls form-group">
												<textarea class="billing-address-name form-control" placeholder="Full address" name="address" required=""></textarea>
										
										</div>
									
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Province" name="province" required="">
									</div>
									
								</div>
								<button class="submit check_out btn">Submit</button>
							</div>
						</div>
					</form>
					
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