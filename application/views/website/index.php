                 <main id="main" class="site-content">  
                           <div class="shop-slider-1 bullet-3">     
                                      <?php if(!empty($slider)){    
                                            foreach($slider as $value)             
                                              {                ?>           
                                                <div class="item">     
                                                   <div class="container">   
                                                    <div class="row flex flex-middle fitscreen">                          
                                                      <div class="col-xs-12 col-sm-5">                 
                                                        <img src="<?php echo slider_image."/".$value->slider_image;?>" alt="">               </div>            
                                                        <div class="col-xs-12 col-sm-6 text-right">             
                                                            <h4 class="text-uppercase mb-5 title-ls relative">
                                                                <?php echo $value->slider_content_other; ?>
                                                            </h4>                               
                                                             <h5 class="text-uppercase roboto relative inline">
                                                                <?php echo $value->slider_content; ?>
                                                            </h5>                         
                                                        </div>                       
                                                      </div>                   
                                                    </div>               
                                                 </div>             
                                             <?php } }?>                           
                                </div> <!-- /.shop-slider-1 -->          
                            <section class="">                
                            <div class="container">     
                                <div class="row">                      
                                    <?php if(!empty($category)){ 
                                        for($i=0;$i<count($category);$i++){ ?>        
                                             <div class="col-xs-12 col-sm-4 bottom-margin">                
                                                <div class="product-cat-style-1">            
                                                    <figure>                                   
                                                     <figcaption class="text-center mt-30">                                   
                                                      <h4 class="title-ls text-uppercase">
                                                        <a href="#" class="title-link">
                                                        <?php echo $category[$i]->category_name; ?>
                                                        </a>
                                                      </h4>                                     
                                                        <p>                                          
                                                            <?php echo $category[$i]->category_description; ?>                             
                                                        </p>                                 
                                                   </figcaption>                            
                                                           <a href="<?php echo site_url(); ?>/website/subcategories/<?php echo base64_encode($category[$i]->category_id); ?>"><img src="<?php echo category_image."/".$category[$i]->category_image; ?>" class="img-responsive" alt=""></a>                                    <a href="<?php echo site_url(); ?>/website/subcategories/<?php echo base64_encode($category[$i]->category_id); ?>" class="title-ls text-uppercase title-link home-cate-btn">Shop Now <i class="fa fa-angle-right"></i></a>                                                                    </figure>                            </div>                        </div> <!-- /.col- -->                                                                              <?php  }                        }                        ?>                                           </div> <!-- /.row -->                </div> <!-- /.contianer -->            </section>            <!-- /.section-full -->             <section class="section produc-slider-index">                <div class="container">                    <div class="section-title style4 text-center">                        <h2 class="text-uppercase">Related Products</h2>                        <div class="sep"></div>                    </div>                    <div class="sc-carousel-4-col p-v-10 ctrl-nav-one bullet-out-50 relatedpro-index">                        <?php if(!empty($letest_products)){                        foreach($letest_products as $value)                        {                        ?>                        <div class="product type-8 light-bg hover-shadow ml-15 mr-15">                            <a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>">                             <figure class="thumb">                                <img src="<?php echo product_image."/".$value->product_image;?>" class="img-responsive" alt="">                            </figure>                           </a>                            <span class="offer-percenegein-slider"><?php if(!empty($value->product_discount_per)){ echo $value->product_discount_per; }else{ echo '0'; } ?>% Off</span>                            <h4 class="product-title text-center"><a href="#" class="title-link"><?php echo $value->product_name; ?></a></h4>                                                    <div class="meta text-center">                                 <span class="reg">Rs. <?php echo $value->product_cost ?> </span>                                 <span class="block title-color mb-15 price h4"> Rs.<?php echo ($value->product_cost)-($value->product_cost/100*$value->product_discount_per); ?></span>                                                             <span class="block primary  main-cate"><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>">SHOP NOW</a></span>                            </div>                        </div>                                              <?php }  } ?>                                                                                                                 </div>                </div> <!-- .container -->            </section> <!-- end .section-full -->                                </main> <!--  .site-content  -->          <script type="text/javascript">           $(document).ready(function() { $('.loader-con').css('display','none')           });      </script>