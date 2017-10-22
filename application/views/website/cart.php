<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
							<?php if(!empty($product)){
							
								$total=0; 
								$service_tex=120;
								$i=0;
								foreach ($product as $value) {
									 ?>
								<tr>
									<td class="cart_product">
										<div class="product-img">	
										<img class="img-responsive" src="<?php echo product_image.'/'.$value[0]->product_image; ?>" alt="" /></div>
									</td>
									<td class="cart_description">
										<h4><a href=""><?php echo $value[0]->product_name;?></a></h4>
									
									</td>
							<td class="cart_price">
								<p><?php echo $value[0]->product_cost;?> Rs</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="<?php echo site_url('website/cart').'/'.$value[0]->product_id.'/'.$cart[$i]->cart_product_qty ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $cart[$i]->cart_product_qty; ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="<?php echo site_url('website/cart').'/'.$value[0]->product_id.'/'.$cart[$i]->cart_product_qty.'/'.'2' ?>"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rs.<?php echo $subtotal=$cart[$i]->cart_product_qty*$value[0]->product_cost;?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" onClick="if(!confirm('Are you sure, You want delete this Item from cart?')){return false;}" href="<?php echo site_url('website/remove_cart').'/'.$cart[$i]->cart_id;?>"><i class="fa fa-times"></i></a>
								
							</td>
						</tr>
					<?php	
					$i++;
					$total=$total+$subtotal;
							}
							}else{?>
								
<tr>
	<td class="cart_price" colspan="6" align="center">
										<div class="cart_quantity_button">	
									 <img  src="<?php echo base_url('uploads/') ?>/cart-icon.png" alt="..."/>
                    <h4>Oops! Your cart is empty.</h4>
                    <p><a href="<?php echo site_url('website/') ?>" style="width: 200px;color: #428BCA;float: none;display: inline-block">Start shopping</a></p>
                    </div> 
										</div>
									</td>
</tr>								
								
<?php							} ?>
						

						
				
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p class="coupon_status" id="status"></p>
					<div class="chose_area">
						<?php if(!empty($offer)){
							 $new_user=$offer[0]->offer_type;
							if($new_user =='New-user'){
								$offer_code_status=$user[0]->offer_code_status;
								if($offer_code_status=='2'){
							?>
						<div class="offer"> <?php echo $offer[0]->offer_description;?></div>
						
					
					
						<ul class="user_option">
							<li>
								
							<label>coupon code</label>
							<p class="offer_code" style="cursor: pointer"><b><?php echo $offer[0]->offer_code;?></b></p>
							</li>
							</br>
						<li><input type="hidden"  name="coupon_id" id="coupon_id" value="<?php echo $offer[0]->offer_id; ?>"/>
							<input type="text" name="coupon_code" id="coupon_code" value="" placeholder="Enter Coupon Code"></li>
						</ul>
					
						<a class="btn btn-default update"  onclick="check_offer()">Apply</a>
						<?php }else{?>
							<label style="margin-left: 200px">No Coupon Code Avalible</label>
					<?php	} } }else{ ?>
							
				<?php		} ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Rs.<?php if(!empty($product)){ echo $total; }else{ echo '00';}?></span></li>
							
							<li>Shipping Cost <span>Free</span></li>
							<?php
							if(!empty($offer_amount)){ ?>
							<li>Offer Code<span>Rs. <?php echo $offer_amount; ?></span></li>
							<li>Total <span> Rs.<?php if(!empty($product)){ echo $total-$offer_amount; }else{ echo '00';}?> </span></li>
						 <?php	}else{?>
							
							<li>Total <span> Rs.<?php if(!empty($product)){ echo $total; }else{ echo '00';}?> </span></li><?php }?>
						</ul>
							<a class="btn btn-default update" href="<?php echo site_url('website/checkout') ?>">Check out</a>
						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	<script>
		function check_offer(){
			var coupon_code=$("#coupon_code").val();
			var coupon_id=$("#coupon_id").val();
			$.ajax({
	      url: '<?php echo site_url('website/check_offer'); ?>',
	      type: "POST",
	      data: {
	      			 'coupon_id':coupon_id,
	          		 'coupon_code': coupon_code
	             },
	    	success: function (data)
	    		   {
	    		     if(data==1)
	    		   		     {
	    		   		     $("#status").text("coupon code apply successfully");
	    		   		     setInterval('location.reload()',5000);
	                }else if(data==2){
	                         	$("#status").text("Invalid Coupon Code");
	                }
	                }
	           });
		
		}
	</script>