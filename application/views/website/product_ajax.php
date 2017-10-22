	<h2 class="title text-center">Features Items</h2>
	<?php if(!empty($product)){
									foreach ($product as  $value) {?>
										<div class="col-sm-4">
							<div class="product-image-wrapper">
										<div class="single-products">
										<div class="productinfo text-center">
									<a href="<?php echo site_url('website/view_product_detials').'/'.$value->product_id; ?>">	
											<div class="product-height">	<img src="<?php echo product_image.'/'.$value->product_image; ?>" alt="" /></div></a>
											<h2>Rs <?php echo $value->product_cost?></h2>
											<p><?php echo $value->product_name?></p>
											<a href="<?php echo site_url('website/cart/').'/'.$value->product_id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									<!--	<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $value->product_cost?></h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
									</div>-->
								</div>
								<!--<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>-->
							</div>
						</div>	
								<?php	}
								}else{ ?>
									<div style="margin-left: 20px">
										No Products Avalible at this category
									</div>
					
							<?php 	} ?>
							
					