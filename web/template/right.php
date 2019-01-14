<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Search Here..</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Product name..." name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Catagories</h3>
							<div class="w3l-range">
								<ul>
								<li>
								<a href="all.php">All Product</a>
								</li>
									<?php
									$query=mysql_query("Select * from tbl_kategori");
									while ($k=mysql_fetch_array($query)) {
									
									
									?>
									<li class="my-1">
										<a href="Kategori.php?id_kategori_produk=<?php echo $k['id_kategori_produk'];?>"><?php echo $k['nama_kategori'];?></a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- discounts -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Brand</h3>
							<div class="w3l-range">
								<ul>
									<?php
									$query=mysql_query("Select * from tbl_merek");
									while ($m=mysql_fetch_array($query)) {
									
									
									?>
									<li class="my-1">
										<a href="merek.php?id_merek=<?php echo $m['id_merek'];?>"><?php echo $m['nama_merek'];?></a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<!-- //discounts -->
						<!-- reviews -->
						
						<!-- //reviews -->
						<!-- electronics -->
						
						<!-- //electronics -->
						<!-- delivery -->
						
						<!-- //delivery -->
						<!-- arrivals -->
						
						<!-- //arrivals -->
						<!-- best seller -->
						
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>