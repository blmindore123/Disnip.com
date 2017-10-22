<title>R-Shopper</title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://www.blmindore.net/" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="R-Shopper" />
	<meta property="og:description"   content="R- Shopper is a Best Place to Shopping of all types clothes, Bags, Shooes in all types of Designs. " />
	<meta property="og:image"         content="http://www.blmindore.net/Shopper/webassets/images/home/logo.png" />
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
				<!---<div class="brands_products">
							<h2>Brands</h2>
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
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value="[25,45]" id="sl2" ><br />
								 <b class="pull-left">0 Rs</b> <b class="pull-right">10000 Rs</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?php echo base_url('webassets')?>/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo product_image.'/'.$product[0]->product_image; ?>" alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides 
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div> -->

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo base_url('webassets')?>/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $product[0]->product_description; ?></h2>
								<p>Web ID: <?php echo $product[0]->product_id; ?></p>
								<img src="<?php echo base_url('webassets')?>/images/product-details/rating.png" alt="" />
								<span>
									<span>Rs.<?php echo $product[0]->product_cost; ?></span>
									<label>Quantity:</label>
										<input type="hidden" value="<?php echo $product[0]->product_cost; ?>" name="cart_product_price" id="cart_product_price" />
										<input type="hidden" value="<?php echo $product[0]->product_id; ?>" name="cart_product_id" id="cart_product_id"/>
										<input type="text" value="1" name="cart_product_qty"  id="cart_product_qty"/>
											<?php 	$user_id=$this->session->userdata('user_id');
											if(!empty($user_id)){ ?>
											<button type="button" class="btn btn-fefault cart" onclick="add_cart()">
										<?php	}else{ ?>
											<button type="button" class="btn btn-fefault cart" onclick="check_user()">
							<?php			}
											?>
										
									
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> <?php $stock= $product[0]->product_of_stock;
								if($stock>0){
									echo "In Stock";
								}else{
									echo "Out Of Stock";
								} ?> </p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> R-SHOPPER</p>
								<!--<a href=""><img src="<?php echo base_url('webassets')?>/images/product-details/share.png" class="share img-responsive"  alt="" /></a>-->
								<!--<div class="fb-like" data-share="true" data-width="450"data-show-faces="true"></div>-->
									<!--<div class="fb-share-button" data-href="http://www.blmindore.net" data-layout="button_count"></div>-->
								<!--<div class="fb-like" data-href="http://www.blmindore.net" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>-->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
							
								
							</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php if(!empty($review)){
										foreach ($review as  $value) { ?>
											<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $value->user_name; ?></a></li>
										<li><a href=""><i class="fa fa-envelope"></i><?php echo $value->user_email;?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo $value->review_date;?></a></li>
										<!---<li><a href=""><i class="fa fa-calendar-o"></i><?php echo date("l, F d, Y");?></a></li>-->
									</ul>
									<p id="review" style="margin-left: 20px "><?php echo $value->review_msg;?></p><br>
									<?php	}
									} ?>
									
									<p><b>Write Your Review</b></p>
									
								<form>
										<span>
											<input type="hidden"  name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"/>
											<input type="hidden"  name="product_id" id="product_id" value="<?php echo $product[0]->product_id; ?>"/>
											<input type="text" placeholder="Your Name" name="user_name" id="user_name"/>
											<input type="email" placeholder="Email Address" name="user_email" id="user_email"/>
										</span>
										<textarea name="review_msg" id="review_msg" ></textarea>
									
										<button type="button" class="btn btn-default pull-right" onclick="user_review()">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
<script>
	 function add_cart(){
	 	var qty=$("#cart_product_qty").val();
	 	var price=$("#cart_product_price").val();
	 	var p_id=$("#cart_product_id").val();
	 		$.ajax({
	            url: '<?php echo site_url('website/add_cart'); ?>',
	            type: "POST",
	            data: {
	                        'qty': qty,
	                        'price':price,
	                        'p_id':p_id
	                   },
	            success: function (data) 
	            {
	                 if(data=='1'){
	                 	window.location.href = "<?php echo site_url('website/cart'); ?>";
	                 }else  if(data=='2'){
	                 	alert("Minimum 1 Quantity Required to Add Cart"); 	
	            }
	              }      	 
	         });
	 	
	 }
	 function check_user()
	{
		alert("Please Login Or Signup for Add To Cart");
		location.href="<?php echo site_url('website/login'); ?>";
	}
	function user_review(){
		var user_id=$("#user_id").val();
	 	var product_id=$("#product_id").val();
	 	var user_name=$("#user_name").val();
	 	var user_email=$("#user_email").val();
	 	var review_msg=$("#review_msg").val();
	 	if(user_id){
	 		$.ajax({
	            url: '<?php echo site_url('website/user_review'); ?>',
	            type: "POST",
	            data: {
	                        'product_id': product_id,
	                        'user_name':user_name,
	                        'user_email':user_email,
	                        'review_msg':review_msg
	                   },
	            success: function (data) 
	            {
	            	location.reload();
	            	$("#review").text(review_msg);
	             }      	 
	         });
	 	}else{
	 		alert("Please Login OR Signup To Give Reviews of about Product");
	 		location.href="<?php echo site_url('website/login'); ?>";
	 	}
	}
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
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=594649877357899";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>