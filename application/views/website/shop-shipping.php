<main id="main" class="site-content"  >                  
	      <!-- /.page-header -->       
	           <section class="section-full">       
	           	         <div class="container">    
	           	  <ul class="shop-order-progress flex flex-center fw300 mb-50 fz-13">    
	           	  	
	           	         	                	              <li><a href="#">Order</a></li>                            <li class="active"><a href="#">Shipping</a></li>                            <li><a href="#">Payment</a></li>                            <li><a href="#">Confirmation</a></li>                        </ul> <!-- end .order-progress -->                    <div class="row">                        <div class="col-xs-12 col-sm-6">                            <div class="checkout-login-box woocommerce-info">                                <form action="#" class="login-form mt-35">                                    <p class="fw300 mb-25">If you have shopped with us before, Please enter your details in the boxes below. If you are a new customer then proceed to the billing and shipping section. </p>                                    <div class="input-field">                                        <input class="ml-input margin-b-0" type="text">                                        <label class="">Username / Email Address</label>                                    </div>                                    <div class="input-field">                                        <input class="ml-input margin-b-0" type="password">                                        <label for="">Password</label>                                    </div>                                    <div class="custom-checkbox flex flex-middle mt-15">                                        <input id="remember_login" name="remember_login" type="checkbox">                                        <label for="remember_login" class="fw300 title-color">Remember Login</label>                                    </div>                                    <div class="mt-40">                                        <button type="submit" class="waves-effect btn-large waves-light btn-light-dark text-uppercase">Login</button><br><br>                                        <a href="#" class="forgot-password ml-25 text-color"><u>Forgot Password?</u></a>                                    </div>                                </form>                            </div>                        </div>                        <div class="col-xs-12 col-sm-6">                            <div class="coupon-toggle-box woocommerce-info">                                <form action="#" class="checkout-coupon mt-35">                                    <p class="fw300 mb-25">If you have shopped with us before, Please enter your details in the boxes below. If you are a new customer then proceed to the billing and shipping section. </p>                                    <div class="input-field">                                        <input class="ml-input margin-b-0" type="text">                                        <label class="">Coupon Code</label>                                    </div>                                    <div class="text-right mt-20">                                        <button type="submit" class="waves-effect btn-large waves-light btn-light-dark text-uppercase">Apply Coupon</button>                                    </div>                                </form>                            </div>                        </div>                    </div> <!-- end .row -->               <form  action="<?php echo site_url('website/add_address') ?>" role="form" id="form1" method="post" class="validate row">                        <div class="col-xs-12 col-sm-6">                            <div class="woocommerce-billing-fields">                                <h5 class="fz-14 text-uppercase mb-60">Billing Details</h5>                                                   										<div class="input-field">										<input class="ml-input margin-b-0"type="text" placeholder="Full Name *" name="user_name" value="<?php if(!empty($address)){ echo $address[0]->user_name; } ?>"  required="required">                                                                                </div>											<div class="input-field">										<input class="ml-input margin-b-0"type="text" placeholder="Email*" name="user_email" value="<?php if(!empty($address)){ echo $address[0]->user_email; } ?>"  required="required">						</div>											<div class="input-field">				<input class="ml-input margin-b-0"type="text" placeholder="Mobile Phone *" name="user_mobile_no" value="<?php if(!empty($address)){ echo $address[0]->user_mobile_no; } ?>"  required="required"></div>											<div class="input-field">										<input class="ml-input margin-b-0"type="text" placeholder="Address 1 *" name="address1" value="<?php if(!empty($address)){ echo $address[0]->address1; } ?>" required="required"> 					</div>											<div class="input-field">														<input class="ml-input margin-b-0"type="text" placeholder="Address 2" name="address2" value="<?php if(!empty($address)){ echo $address[0]->address2; } ?>"></div>											<div class="input-field">										<input class="ml-input margin-b-0"type="text" placeholder="Zip / Postal Code *" name="user_pincode" id="user_pincode" value="<?php if(!empty($address)){ echo $address[0]->user_pincode; } ?>" onblur="check_pincode()"  required="required">										</div>											<div class="input-field">												<input class="ml-input margin-b-0"type="text" placeholder="Landmark *" name="nearest"  value="<?php if(!empty($address)){ echo $address[0]->nearest; } ?>"  required="required">                                                                                                </div>											<div class="input-field">                                                                                            <input class="ml-input margin-b-0"type="text" placeholder="City *" name="user_city"  value="<?php if(!empty($address)){ echo $address[0]->user_city; } ?>" required="required"></div>																		                            </div>                            
<!--                    <a href='cart' class="btn-large btn-gray text-uppercase pull-left">Back to Order</a> -->
                </div>                        <div class="col-xs-12 col-sm-6">                            <div id="order_review" class="woocommerce-checkout-review-order default-shadow">                                <h5 class="text-uppercase mb-25">Your Order</h5>                                <div class="table-responsive">                                    <table class="table-1 table-cart w100">                                        <thead>                                            <tr>                                                <th>Product</th>                                                <th>Quantity</th>                                                <th class="text-right">Total Price</th>                                            </tr>                                        </thead>                                        <tbody id="spinfo">                                                                             </tbody>                                    </table> <!-- /.table-1 -->                                </div>                                <div class="row no-gutter mt-30">                                    <div class="hello-_-world  col-xs-12 col-md-offset-6 col-md-6">                                        <p class="title-color flex space-between mb-15"><span>Sub Total</span> <span class="montserrat" id="subt"></span></p>                                                                                <p class="title-color flex space-between mb-10"><span>Shipping (10Rs Include GST)</span> <span class="montserrat" id="ship"></span></p>                                        <hr>                                        <p class="title-color flex flex-middle space-between mb-15">                                            <span>Total</span>                                            <span class="montserrat h4" id="ttlcharges"></span>                                        </p>                                    </div>                                </div>                            </div>                            <input type="hidden" id="total" name="total" >                                                       <div class="col-xs-12 text-right mt-100 cart-actions">                                                                <button type="submit" class="waves-effect btn-large waves-light btn-light-dark text-uppercase ml-20" name="address" value="address">Proceed to Payment</button>                            </div>                        </div>                    </form>                </div> <!-- /.container -->            </section>            <!-- //.section-full -->        </main> <!--  .site-content  --> <script>  $(document).ready(function() {var subt=0;var ship=0;var quanty1=0;var ttlcharges=0;        for(var i=0;i<cart.length;i++){$('#spinfo').append('<tr><td><h5 class="fz-14"><a href="#" class="title-color">'+cart[i].name+'</a></h5></td><td class="title-color text-center">'+cart[i].qty+'</td><td class="text-right"><span class="price">Rs '+(cart[i].price*cart[i].qty)+'</span></td></tr>'); subt=subt+(cart[i].price*cart[i].qty);  quanty1=parseInt(quanty1)+parseInt(cart[i].qty);    }    ship=10;  localStorage.setItem('subt', subt);   localStorage.setItem('quanty1', quanty1);   localStorage.setItem('ship', ship);   ttlcharges=subt+ship;  $('#subt').html('Rs '+subt);  $('#ship').html('Rs '+ship);  localStorage.setItem('ttlcharges', parseInt(ttlcharges));  $('#ttlcharges').html('Rs '+parseInt(ttlcharges));  $('#total').val(parseInt(ttlcharges));});	function check_pincode(){		var pincode=$("#user_pincode").val();		$.ajax({	      url: '<?php echo site_url('website/check_pincode'); ?>',	      type: "POST",	      data: {	          		 'pincode': pincode	             },	    	success: function (data)	    		   {	                    if(data=='1'){	                    	 $("#user_pincode").addClass("accept");                    		 $("#user_pincode").removeClass("reject");	                    }else if(data=='2'){	                    	$("#user_pincode").addClass("reject");                    		$("#user_pincode").removeClass("accept");                    		 if(data=='')                    		 {                				$("#user_pincode").removeClass("reject");                			}	                    }	                }	           });	}        $.ajax({            url: '<?php echo site_url('website/add_cart'); ?>',            type: "POST",            data: {                'cart':  JSON.parse(localStorage.getItem("items"))            },            success: function (data) {                        }        });</script>