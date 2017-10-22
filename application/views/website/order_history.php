

<main id="main" class="site-content">
   <div class="style4 text-center text-uppercase mt-40">
      <h4 class="title-ls relative inline">Order History</h4>
   </div>
   <!-- /.page-header -->            
   <section class="mb-30 mt-30 orderhistory-page">
      <div class="container">
         <div id="shop-orders" class="tab-pane fade active in">
            <div class="table-responsive">
               <table class="table-1 table-cart w100">
                  <thead>
                     <tr class="fw300">
                        <th>Product</th>
                        <th>Transection No.</th>
                        <th>Order ID</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($order)){ foreach ($order as $value) { ?>      
                     <tr>
                        <td>
                           <div class="flex mcart-product">
                              <figure class="thumb mr-20 radius">                                                <img src="<?php echo product_image . '/' . $value->product_image; ?>" width="80" height="80" alt="">                                            </figure>
                              <div class="desc">
                                 <h5 class="mb-10 fz-14"><a href="#" class="title-color"><?php echo $value->product_name ; ?></a></h5>
                                 <span class="fw300"><?php echo date('D d-M-Y', strtotime($value->order_date)); ?></span>                                            
                              </div>
                           </div>
                        </td>
                        <td class="product-price"><span class="price title-color"># <?php if(!empty($value->payment_transaction_id)){ echo $value->payment_transaction_id ; } else{ echo 'COD'; } ?></span></td>
                        <td class="product-price"><span class="price title-color"># <?php if(!empty($value->order_id)){ echo $value->order_id ; }  ?></span></td>
                        <td class="product-quantity">
                           <div class="quantity cart">                                            <span class="quantity-field">                                                <input type="text" id="1" value="<?php echo $value->order_quantity ; ?>" class="field" readonly="">                                            </span>                                        </div>
                        </td>
                        <td class="product-price"><span class="price title-color">Rs. <?php echo ($value->payment_amount+20); ?></span></td>
                        <td class="remove-product">                                        <span style="color: #61D817"><?php if($value->payment_status=='1'){ echo 'Success'; } elseif($value->payment_status=='2'){ echo 'Pending'; }else{ echo 'Failed'; } ?></span>                                    </td>
                     </tr>
                     <?php } } ?>                                                                            
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- /.container -->            
   </section>
   <!-- //.section-full -->        
</main>
<!--  .site-content  -->

