<?php		$con=mysql_connect('localhost','root','root');
		mysql_select_db('shopper_db',$con);
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
										<a href="<?php echo $row['category_id'];  ?>" onclick="get_product('<?php echo $row['category_id'];  ?>')"><?php echo $row['category_name']; ?></a>
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
					
						<div class="brands_products"><!--brands_products-->
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
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 100</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?php echo base_url('webassets')?>/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
					

<script>
	function get_product(id){
		var category_id=id;
		alert(category_id);
			$.ajax({
	                    url: '<?php echo site_url('website/get_product'); ?>',
	                    type: "POST",
	                    data: {
	                        'category_id': category_id
	                    },
	                    
	                    
	                    success: function (data) {
	                    	alert(data);
	                    	 }
	                });
	}
</script>