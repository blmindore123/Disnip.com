	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php
						for($i=0;$i<count($slider);$i++)
						{ ?>
						<li data-target="#slider-carousel" data-slide-to="<?php echo $i; ?>" ></li>
						<?php	}?>
							
						</ol>
						
						<div class="carousel-inner">
						<?php
						
						for($i=0;$i<count($slider);$i++)
						{ 
						
						if($i==0){
						?>
							<div class="item active"><?php }else{?>
							<div class="item">
							
							<? }?>
								<div class="col-sm-6">
									<h1><span><?php echo $slider[$i]->slider_content_title; ?></span></h1>
									<h2><?php echo $slider[$i]->slider_content_other; ?></h2>
									<p><?php echo $slider[$i]->slider_content; ?> </p>
									
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url('uploads/slider/'.$slider[$i]->slider_image)?>" class="girl img-responsive" alt="" />
									<!--<img src="<?php echo base_url('webassets')?>/images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>
							<?php	}?>
							
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				<?php		
					$category=mysql_query("select * from category where category_status='1'");
					?>
			<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php 
							while($row=mysql_fetch_array($category)){ ?>
									<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#" onclick="get_product('<?php echo $row['category_id'];  ?>')"><?php echo $row['category_name']; ?></a>
									</h4>
								</div>
						</div>
					<?php		}
							?>
					
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					<!--brands_products-->
						<!--<div class="brands_products">
							
							<h2>Filters</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div>--><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value="[25,45]" id="sl2" ><br />
								  <b class="pull-left">Rs 0</b> <b class="pull-right">Rs 10000</b>
							</div>
						</div><!--/price-range-->
						<!--shipping-->
						<!--<div class="shipping text-center">
							<img src="<?php echo base_url('webassets')?>/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
					


				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items" id="products"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div id="products">
								<?php if(!empty($product)){
									foreach ($product as  $value) {?>
										<div class="col-sm-4">
							<div class="product-image-wrapper">
										<div class="single-products">
										<div class="productinfo text-center">
									<a href="<?php echo site_url('website/view_product_detials').'/'.$value->product_id; ?>">		<div class="product-height">	<img src="<?php echo product_image.'/'.$value->product_image; ?>" alt="" /></div> </a>
											<h2>Rs.<?php echo $value->product_cost?> </h2>
											<p><?php echo $value->product_name?></p>
											<?php 	$user_id=$this->session->userdata('user_id');
											if(!empty($user_id)){ ?>
											<a href="<?php echo site_url('website/cart/').'/'.$value->product_id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>	
										<?php	}else{ ?>
											<a href="#" class="btn btn-default add-to-cart" onclick="check_user()"><i class="fa fa-shopping-cart"></i>Add to cart</a>	
							<?php			}
											?>
											
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
								} ?>
							
					</div>
						
				
						
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
			<h2 class="title text-center">Letests Category</h2>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
							<?php	if(!empty($category_details)){
									foreach($category_details as $value) {?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
											<div class="product-height">	
												<img src="<?php echo category_image.'/'.$value->category_image; ?>" alt="" /></div>
											
												<a href="#" class="btn btn-default add-to-cart"><?php echo $value->category_name ?></a>
											</div>
											
										</div>
									</div>
								</div>
								<?php		}
								}
								 ?>
								
							
							</div>
							
						</div>
					</div><!--/category-tab-->
					
				<!--	<div class="recommended_items">
						<h2 class="title text-center">Letests items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php if(!empty($product_letest)){
									foreach ($product_letest as  $value) {?>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<div class="product-smallheight">	<img src="<?php echo product_image.'/'.$value->product_image; ?>" alt="" /></div>
													<h2><?php echo $value->product_cost?> Rs.</h2>
													<p><?php echo $value->product_name?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									
							<?php } } ?>
								</div>
		
					</div>
					
				</div>
			</div>
		</div>
		</div>
		</div>-->
	</section>
<script>
	function get_product(id)
	{

		var category_id=id;
		$.ajax({
	        url: '<?php echo site_url('website/get_product'); ?>',
	        type: "POST",
	        data: {
	                'category_id': category_id
	                },
	         success: function (data)
	          {
	            $("#products").html(data);
	           }
	         });
	}
	function check_user()
	{
		alert("Please Login Or Signup for Add To Cart");
		location.href="<?php echo site_url('website/login'); ?>";
	}
</script>
