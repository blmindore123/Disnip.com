<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">My Order</li>
				</ol>
				
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Order Id</td>
						
							<td class="price">Price</td>
							<td class="total">Payment Method</td>
							<td class="price">Order date</td>
							<td class="price">Delivery date</td>
							<td class="total" colspan="3">Payment status</td>
						
						</tr>
					</thead>
					<tbody>
						
							<?php if(!empty($product)){
								$total='0';$service_tex='0';
							foreach ($product as $value) {
									 ?>
							<tr>
										<td class="cart_product">
										<p><?php echo $value->payment_id;?></p>
									</td>
									<?php  
									$total=$total+$value->payment_amount;
										//$service_tex=2+$service_tex;	?>
							<td class="cart_price">
								<p>Rs.<?php echo $value->payment_amount;?></p>
							</td>
						
							<td class="cart_total">
								<p class=""><?php $type=$value->payment_type;
									if($type=='1'){
										echo "Cash On Delivery";
									}else if($type=='2'){
										echo "Payumoney";
									}else if($type=='3'){
										echo "Paypal";
									}?></p>
							</td>
							<td class="cart_product">
										<p><?php echo $value->payment_date;?></p>
							</td>
							<td class="">
										<p><?php echo $value->delivery_date;?></p>
							</td>
							<td>	<p><?php $status= $value->payment_status;
								if($status=='1'){
										echo "Recieved";
									}else if($status=='2'){
										echo "Pending";
									}
								?></p></td>
									<td class="">
								<a class=""  href="<?php echo site_url('website/view_order').'/'.$value->payment_deliver_id;?>">View Order</a>
								
							</td>
								<td class="">
								<a class="" onClick="if(!confirm('Are you sure, You want Cancel this Order ?')){return false;}" href="<?php echo site_url('website/cancel_order').'/'.$value->payment_deliver_id;?>"><i class="fa fa-times"></i></a>
								
							</td>
						
						</tr>
					<?php	
					
		
							}
							}else{?>
								
<tr>
				<td class="cart_price" colspan="6" align="center">
										<div class="cart_quantity_button">	
									 <img  src="<?php echo base_url('uploads/') ?>/cart-icon.png" alt="..."/>
                    <h4>Oops! Your Order is empty.</h4>
                    <p><a href="<?php echo site_url('website/') ?>" style="width: 200px;color: #428BCA;float: none;display: inline-block">Start shopping</a></p>
                    </div> 
										</div>
									</td>
								
<?php							} ?>
						

						
				
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

