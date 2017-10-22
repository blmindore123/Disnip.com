<section class="mt-50">

                <div class="container">

                    <div class="row">
                       <aside class="col-xs-12 col-md-3 widget-area mb-50">
                           <div class="  bottom-margin mb-20">
                              

                            <a href="">
                                 

                                <div class="service style15 text-center">
                                     <h5 style="color:#F14742;" class="widget-title text-uppercase mb-25">Active Categorie</h5>

                                <img src="<?php echo category_image.'/'.$category_main[0]->category_image; ?>" class="center-block" alt="" style="width: 100px; height: 140px;">

                                <h6 class="text-uppercase title-ls"><?php echo $category_main[0]->category_name; ?></h6>

                                

                            </div>

                            </a>

                        </div>
                        
                        <section class="widget type-2 z-depth-1">
                                <h5 class="widget-title text-uppercase mb-25">Other Categories</h5>
                             <?php foreach ($category as $value1) {  ?>  
                                <div class="custom-chekbox-2 icon-check mb-15">
                                    <input name="<?php echo $value1->category_id; ?>" id="<?php echo $value1->category_id; ?>" type="radio"  >
                                    <label for="<?php echo $value1->category_name; ?>" class="fw300"><?php echo $value1->category_name; ?></label>
                                </div>
                                
                                
                             <?php } ?>
                            </section>
                       </aside>
                        <div class="col-xs-12 col-md-9 subcategories-box">
                           <?php foreach ($sabcategory as $value) {  ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 bottom-margin mb-50">

                            <a href="<?php echo site_url(); ?>/website/shop/<?php echo base64_encode($value->s_category_id); ?>/<?php echo base64_encode($value->subcategory_id); ?>"><div class="service style15 text-center">

                                    <img src="<?php echo subcategory_image.'/'.$value->subcategory_image ?>" class="center-block" alt="">

                                <h6 class="text-uppercase title-ls"><?php echo $value->subcategory_name; ?></h6>

                                

                               </div>

                               </a>

                         </div><?php } ?> 
                        </div>


                
                       

                    </div> <!-- /.row -->

                </div> <!-- /.container -->

            </section>

       


