<?php
  require 'header.php';
?>
	
	<section>
				<div class="col-sm-9 padding-right">
				<?php
						    $cat_sql="SELECT * FROM categories";
							$cat_res=mysqli_query($conn,$sql);
							while ($cat_row=mysqli_fetch_assoc($cat_res)) { 
						?>
					<div class="features_items"><!--features_items-->
					   
						<h2 class="title text-center"><?php echo $cat_row['cat_name'] ?> Products</h2>
						<?php
					    $product_sql="SELECT * from products where status=1 and cat_id='$cat_row[id]' order by id desc";
					    $product_res=mysqli_query($conn,$product_sql);
					    while ($row=mysqli_fetch_assoc($product_res)) {
					   ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/<?php echo $row['img']?>" alt="" width="100%" height="200" />
											<h2><i class="fas fa-rupee-sign"></i>.&nbsp;<?php echo $row['price']?></h2>
											<p><?php echo $row['name']?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
								</div>
								<!-- <div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->
							</div>
							
						</div>
						<?php }?>
                    	
						
					</div><!--features_items-->
					<?php }?>
				
					
	
					
				</div>
			</div>
		</div>
	</section>
	
	<?php
	  require 'footer.php';
	?>