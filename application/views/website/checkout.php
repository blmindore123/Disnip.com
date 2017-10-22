	<script>
		$('#paypal').attr('checked', false);
		$('#payumoney').attr('checked', false);
	</script>
	
	<section id="cart_items">
			<div class="container">
				<div class="breadcrumbs">
					<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li class="active">Check out</li>
					</ol>
				</div><!--/breadcrums-->
	
				<!--<div class="step-one">
					<h2 class="heading">Step1</h2>
				</div>
				<div class="checkout-options">
					<h3>New User</h3>
					<p>Checkout options</p>
					<ul class="nav">
						<li>
							<label><input type="checkbox"> Register Account</label>
						</li>
						<li>
							<label><input type="checkbox"> Guest Checkout</label>
						</li>
						<li>
							<a href=""><i class="fa fa-times"></i>Cancel</a>
						</li>
					</ul>
				</div><!--/checkout-options-->
	
				<!--<div class="register-req">
					<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
				</div><!--/register-req-->
	
				<div class="shopper-informations" id="shopper_info" >
					<div class="row">
					<!--	<div class="col-sm-3">
							<div class="shopper-info">
								<p>Shopper Information</p>
								<form>
									<input type="text" placeholder="Display Name">
									<input type="text" placeholder="User Name">
									<input type="password" placeholder="Password">
									<input type="password" placeholder="Confirm password">
								</form>
								<a class="btn btn-primary" href="">Get Quotes</a>
								<a class="btn btn-primary" href="">Continue</a>
							</div>
					</div>-->
						<div class="col-sm-12 clearfix">
							<div class="bill-to">
	
								<div class="form ">
									<div class="review-payment">
									<h2>Delivery Address</h2>
									</div>
									<form  action="<?php echo site_url('website/add_address') ?>" role="form" id="form1" method="post" class="validate row">
										<div class="col-sm-4">
										<input type="text" placeholder="First Name *" name="user_name" value="<?php if(!empty($address)){ echo $address[0]->user_name; } ?>">
										<input type="text" placeholder="Email*" name="user_email" value="<?php if(!empty($address)){ echo $address[0]->user_email; } ?>">
										<input type="text" placeholder="Mobile Phone *" name="user_mobile_no" value="<?php if(!empty($address)){ echo $address[0]->user_mobile_no; } ?>"></div>
											<div class="col-sm-4">
										<input type="text" placeholder="Address 1 *" name="address1" value="<?php if(!empty($address)){ echo $address[0]->address1; } ?>"> 
									
										<input type="text" placeholder="Address 2" name="address2" value="<?php if(!empty($address)){ echo $address[0]->address2; } ?>">
										<input type="text" placeholder="Zip / Postal Code *" name="user_pincode" id="user_pincode" value="<?php if(!empty($address)){ echo $address[0]->user_pincode; } ?>" onblur="check_pincode()">
										</div>
											<div class="col-sm-4">
												<input type="text" placeholder="Landmark *" name="nearest"  value="<?php if(!empty($address)){ echo $address[0]->nearest; } ?>">
										<input type="text" placeholder="City *" name="user_city"  value="<?php if(!empty($address)){ echo $address[0]->user_city; } ?>">
										<button type="submit" class="btn btn-default check_out"  name="address" value="address">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>
										
					</div>
				</div>
				<div class="review-payment">
					<h2>Review & Payment</h2>
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
							<tr>
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
									<p>Rs.<?php echo $value[0]->product_cost;?> </p>
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
										 <img width="220px"  height="220px" style="text-align: center" src="<?php echo base_url('uploads/') ?>/thanks.jpg" alt="..." st/>
	                  <!--  <h4>Order ID:</h4>-->
	                  	<p></p>
	                    <p>Your Order has been Successfully Placed</p>
	                    <p><a href="<?php echo site_url('website/') ?>" style="width: 200px;color: #428BCA;float: none;display: inline-block">Continue Shopping</a></p>
	                    </div> 
											</div>
										</td>
	</tr>								
									
	<?php							} ?> </tr>
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2" id="amount">
									<table class="table table-condensed total-result">
										<tr>
											<td>Cart Sub Total</td>
											<td>Rs.<?php if(!empty($product)){ echo $total; }else{ echo '00';}?></td>
										</tr>
										
										<tr class="shipping-cost">
											<td>Shipping Cost</td>
											<td>Free</td>										
										</tr>
										<?php if(!empty($offer_amount)){ ?>
										<tr class="shipping-cost">
											<td>Offer Code</td>
											<td>Rs. <?php echo $offer_amount; ?></td>										
										</tr>
										<tr>
											<td>Total</td>
											<td><span>Rs.<?php if(!empty($product)){ echo $main_total=$total-$offer_amount; }else{ echo '00';}?></span></td>
										</tr>
										<?php	}else{?>
										<tr>
											<td>Total</td>
											<td><span>Rs.<?php if(!empty($product)){ echo $main_total=$total; }else{ echo '00';}?></span></td>
										</tr>
										<?php }?>
										</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="payment-options">
						<span>
							<label><input type="checkbox" name="cod" value="1" id="cod" onclick="cashondelivery()">Cash On Delivery</label>
						</span>
						<span>
							<label><input type="checkbox" name="payumoney" value="1" id="payumoney" onclick="payumoney();"> Payumoney</label>
						</span>
						<span>
							<label><input type="checkbox" name="paypal" value="1" id="paypal" onclick="paypal()"> Paypal</label>
						</span>
					</div>
			</div>
			<?php //echo site_url('website/success_paypal'); ?>
			<?php if(!empty($main_total)) $amout=round($main_total/67, 2);?>
		</section> <!--/#cart_items-->
	<?php	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
			$paypal_id = 'info@codexworld.com'; //Business Email ?>
		  	<form action="<?php echo $paypal_url; ?>" method="post" name="form" id="form">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo "Shopping"; ?>">
        <input type="hidden" name="item_number" value="<?php echo $user_id=$this->session->userdata('user_id'); ?>">
        <input type="hidden" name="amount" value="<?php if(!empty($amout)) echo $amout;  ?>">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo site_url('website/cancel_paypal'); ?>'>
        <input type='hidden' name='return' value="<?php echo site_url('website/success_paypal');   ?>">
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0" src="" alt="" style="display:none">
        <img alt="" border="0" width="1" height="1" src="" >

    </form>
    
 <?php
 if(!empty($total)){
 	$total=$total;
 }else{
 	$total='';
 }
$MERCHANT_KEY = "W8Sifn";
$SALT = "xmOBIXfT";
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
$action = '';
$posted = array();
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$posted['txnid'] = $txnid;
$posted['key'] = $MERCHANT_KEY;
$posted['surl'] = site_url('website/success_payumoney');
$posted['furl'] = site_url('website/cancel_payumoney');
$posted['productinfo'] = 'R-Shopper Products';
$posted['service_provider'] = 'payu_paisa';
$posted['phone'] = $address[0]->user_mobile_no;;
$posted['firstname'] = $address[0]->user_name;
$posted['amount'] =$total;
$posted['email'] = $address[0]->user_email;;
$posted['address1'] = $this->session->userdata('user_id');;

if(!empty($_GET)) {
    //print_r($_POST);
  foreach($_GET as $key => $value) {    
    $posted[$key] = $value; 
  }
}
// $posted = array();
// if(!empty($_POST)) {
    // //print_r($_POST);
  // foreach($_POST as $key => $value) {    
    // $posted[$key] = $value; 
// }
// }
$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';

// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
  <script>
  
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {

      payuForm.submit();
    }
  </script>
<?php $product_info= "R-Shopper Products"; 
 if(!empty($address)){ $mobile=$address[0]->user_mobile_no; 
 $name= $address[0]->user_name;
 $email=$address[0]->user_email;
 $success_payu=site_url('website/success_payumoney');
  $cancel_payu=site_url('website/cancel_payumoney'); 
  $user_id=$this->session->userdata('user_id');
   if(!empty($main_total)){
 	$main_total=$main_total;
 }else{
 	$main_total='';
 }
   }
?>

<form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? "'".$main_total."'" : $posted['amount'] ?>" />
      <input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? "'".$user_id."'" : $posted['firstname']; ?>" />
      <input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? "'".$email."'" : $posted['email']; ?>" />
      <input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? "'".$mobile."'" : $posted['phone']; ?>" />
      <input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? "'".$product_info."'" : $posted['productinfo'] ?>" >
      <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? "'".$success_payu."'" : $posted['surl'] ?>" size="64" />
      <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? "'".$cancel_payu."'" : $posted['furl'] ?>" size="64" />
      <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? "'".$user_id."'" : $posted['address1'] ?>" size="64" />
      <input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
       <?php if(!$hash) { ?>
       <input type="submit" value="Submit" name="submit" style="display: none"/>
      <?php } ?>
    </form>

    
	<script>
	
	function cashondelivery(){
		var cod= $('#cod').val();
	
				$.ajax({
	                    url: '<?php echo site_url('website/get_order'); ?>',
	                    type: "POST",
	                    data: {
	                        'cod': cod
	                    },
	                    
	                    
	                    success: function (data) {
	                    	if(data=='2'){
	                    		alert("Delivery Address is Empty");
	                    		$('#cod').attr('checked', false);
	                    	}else if(data=='1'){
	                    		$('#cod').attr('checked', false);
	                    		location.reload(); 
	                    	}else if(data=='3'){
	                    		alert("Your Cart is Empty, Please Continue Shopping");
	                    		$('#cod').attr('checked', false);
	                    		
	                    	}
	                    	 }
	                });
	}
	function payumoney(){
		var payumoney= $('#payumoney').val();
		$.ajax({
	                    url: '<?php echo site_url('website/get_payu_order'); ?>',
	                    type: "POST",
	                    data: {
	                        'payumoney': payumoney
	                    },
	                    
	                    
	                    success: function (data) {
	                    if(data=='2'){
	                    		alert("Delivery Address is Empty");
	                    		$('#payumoney').attr('checked', false);
	                    	}else if(data=='1'){
	                    		payuForm.submit();
	                    		//$('#payumoney').attr('checked', false);
	                    	}else if(data=='3'){
	                    		alert("Your Cart is Empty, Please Continue Shopping");
	                    		
	                    		
	                    	}
	                    	 }
	                });
	}
	function paypal(){
		var paypal= $('#paypal').val();
		$.ajax({
	                    url: '<?php echo site_url('website/get_paypal_order'); ?>',
	                    type: "POST",
	                    data: {
	                        'paypal': paypal
	                    },
	                    
	                    
	                    success: function (data) {
	                    	if(data=='2'){
	                    		alert("Delivery Address is Empty");
	                    		$('#paypal').attr('checked', false);
	                    	}else if(data=='1'){
	                    		
	                    		$('#form').submit();
	                    		
	                    	}else if(data=='3'){
	                    		alert("Your Cart is Empty, Please Continue Shopping");
	                    		//$('#paypal').attr('checked', false);
	                    		
	                    	}
	                    	 }
	                });
		
	}
	function check_pincode(){
		var pincode=$("#user_pincode").val();
		$.ajax({
	      url: '<?php echo site_url('website/check_pincode'); ?>',
	      type: "POST",
	      data: {
	          		 'pincode': pincode
	             },
	    	success: function (data)
	    		   {
	                    if(data=='1'){
	                    	 $("#user_pincode").addClass("accept");
                    		 $("#user_pincode").removeClass("reject");
	                    }else if(data=='2'){
	                    	$("#user_pincode").addClass("reject");
                    		$("#user_pincode").removeClass("accept");
                    		 if(data=='')
                    		 {
                				$("#user_pincode").removeClass("reject");
                			}
	                    }
	                }
	           });
	}
	</script>