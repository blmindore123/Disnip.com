<main id="main" class="site-content">
             
            <!-- /.page-header -->
            <section class="section ">
                <div class="container">
                    <div class="row no-gutter flex disable-flex-xs disable-flex-sm flex-middle product--single product-detialddlsaa">
                        <div class="col-xs-12 col-md-6">
                            <div class="product-detail-img-box bullet-4">
                                 
                                <figure class="thumb">
                                    <img src="<?php echo product_image.'/'.$product[0]->product_image ?>" class="img-responsive" alt="" >
                                </figure>
                                <h3 class="mb-10"><?php echo $product[0]->product_name ?></h3>
                            </div>
                        </div> <!-- /.col- -->

                        <div class="col-xs-12 col-md-6">
                            <div class="product--summery">
                               
                                <span class="sku inline mb-20 text-uppercase fw400">Pid : <?php echo ($product[0]->p_id); ?></span>
                                <div class="price mb-25">
                                    <span class="reg"><?php if(!empty($product[0]->product_discount_per)){ echo 'Rs.'.$product[0]->product_cost; } ?></span> <span class="mtx-label default round">Rs.<?php echo ($product[0]->product_cost)-($product[0]->product_cost/100*$product[0]->product_discount_per); ?></span>
                                </div>
                                <div class="quantity mb-25">
                                    <span class="action-label">Quantity</span>
                                    <span class="quantity-field">
                                        <button type="button" id="sub" class="sub"><i class="fa fa-caret-down"></i></button>
                                        <input type="number" id="quantity" value="1" max="<?php echo $product[0]->product_of_stock ?>" min="1"class="field" />
                                        <button type="button" id="add" class="add active" ><i class="fa fa-caret-up"></i></button>
                                      
                                    </span>
                                </div>
                                 
                                <div class="size mb-25">
                                    <span class="action-label">Available Quantity</span>
                                    <?php echo $product[0]->product_of_stock ?>
                                </div>
                                
                                <div class="action mb-50" onclick="addCart('<?php echo $product[0]->product_id; ?>','<?php echo $product[0]->product_name; ?>','<?php echo product_image.'/'.$product[0]->product_image; ?>','<?php echo ($product[0]->product_cost)-($product[0]->product_cost/100*$product[0]->product_discount_per); ?>',$('#quantity').val())">
                                    <a href="#!" class="btn-large text-uppercase round mr-5 addtobagbtn"><span class="bag-icon"></span>Add to Bag</a>
                                    <a href="<?php echo site_url(); ?>/website/cart" class="btn-large waves-light btn-light-dark text-uppercase buynowbtn">Buy Now</a>
                                   
                                </div>
                                
                                <div class="product-decripnt-boxes">
                                    <h4>Description</h4>
                                    <span class="action-label">1. Condition : <?php echo $product[0]->product_conditions;  ?></span><br>
                                    <span class="action-label">2. Author :  <?php echo $product[0]->product_author;  ?></span><br>
                                    <span class="action-label">3. Publication : <?php echo $product[0]->product_publication;  ?></span><br>
                                    <span class="action-label">4.Edition : <?php echo $product[0]->product_edition;  ?></span><br>
                                    <span class="action-label">5.Language : <?php echo $product[0]->product_language;  ?></span><br>
                                    <!--<pre><?php echo $product[0]->product_description ?></pre>-->
                                </div>
                               <!-- <a class="btn btn-md btn-white" onclick="Materialize.toast('Message Sent Successfully!', 4000)">Toast!</a>  -->
                            </div> <!-- /.product-summery -->
                        </div> <!-- /.col- -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </section>
            <!-- //.section-full -->
            <hr/>
              <section class="section produc-slider-index">
                <div class="container">
                    <div class="section-title style4 text-center">
                        <h2 class="text-uppercase">Related Products</h2>
                        <div class="sep"></div>
                    </div>
                    <div class="sc-carousel-4-col p-v-10 ctrl-nav-one bullet-out-50 relatedpro-index">
                        <?php if(!empty($letest_products)){
                        foreach($letest_products as $value)
                        {
                        ?>
                        <div class="product type-8 light-bg hover-shadow ml-15 mr-15">   <figure class="thumb">
                                <img src="<?php echo product_image."/".$value->product_image;?>" class="img-responsive" alt="">
                            </figure>
                            <span class="offer-percenegein-slider"><?php if(!empty($value->product_discount_per)){ echo $value->product_discount_per; }else{ echo '0'; } ?>% Off</span>
                            <h4 class="product-title text-center"><a href="#" class="title-link"><?php echo $value->product_name; ?></a></h4>
                            
                        <div class="meta text-center">
                                 <span class="reg">Rs. <?php echo $value->product_cost ?></span>
                                 <span class="block title-color mb-15 price h4"> Rs.<?php echo ($value->product_cost)-($value->product_cost/100*$value->product_discount_per); ?></span>
                                <span class="block primary  main-cate"><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>">SHOP NOW</a></span>
                            </div>
                        </div>
                        
                      <?php }  } ?>
                       
                        
                       
                       
                    </div>
                </div> <!-- .container -->
            </section> <!-- end .section-full -->  
            
          
        <!-- <div id="toast-container"><div class="toast velocity-animating" style="touch-action: pan-y; opacity: 0.0359717; transform: translateY(-35px); margin-top: -38.2014px;">Message Sent Successfully!</div></div> -->
</main>
<!--  .site-content  -->