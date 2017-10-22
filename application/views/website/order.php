<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Details</li>
				  
				</ol>
				<ul class="">
				  <p>Order Status: <span style="color: red"><?php  if($delivery[0]->delivery_status=='1'){echo "Pending";}else if($delivery[0]->delivery_status=='2'){echo "Shipped";}elseif ($delivery[0]->delivery_status=='3') {
				  	echo "Delivered";
				  }elseif ($delivery[0]->delivery_status=='4') {
				  	echo "Cancelled";
				  } ?></span>
				  
				  <span style="margin-left:30px">Delivery Date:</span> <span style="color: red"><?php echo $delivery[0]->delivery_date; ?></span>
				  <?php if(!empty($delivery[0]->deliver_shipper_name)){ ?>
				   <span style="margin-left:30px">Shipper Name:</span> <span style="color: red;"><?php echo $delivery[0]->deliver_shipper_name; ?></span>
				    <span style="margin-left:30px">Track id:</span> <span style="color: red"><?php echo $delivery[0]->shipper_track_id; ?></span></p> <?php } ?>
				</ul>
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
							//	$service_tex=120;
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
								<p>Rs <?php echo $value[0]->product_cost;?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="#"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $order[$i]->order_quantity; ?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="#"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"> Rs<?php echo $subtotal=$order[$i]->order_quantity*$value[0]->product_cost;?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" onClick="if(!confirm('Are you sure, You want delete this Order from Order History?')){return false;}" href="<?php echo site_url('website/remove_order').'/'.$order[$i]->order_id;?>"><i class="fa fa-times"></i></a>
								
							</td>
						</tr>
					<?php	
					$i++;
					$total=$total+$subtotal;
							}
							}else{?>
								
<tr>
	<td class="cart_price">
										<div class="cart_quantity_button">	
									 <img  src="<?php echo base_url('uploads/') ?>/cart-icon.png" alt="..."/>
                    <h4>Oops! Your cart is empty.</h4>
                    <p><a href="<?php echo site_url('website/') ?>" style="width: 200px;color: #428BCA">Start shopping</a></p>
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

	