


<div class="row multiples_product_section-shop">  <?php if(!empty($product)){ foreach ($product as $value) { ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-30">
                                <div class="product type-7 z-depth-1 white-bg text-center">
                                    <figure class="thumb relative">
                                        <img src="<?php echo product_image . '/' . $value->product_image ?>" class="img-responsive" alt="">

                                        <ul class="product-actions">
                                            <li><a href="#" class="add-to-cart"onclick="addCart('<?php echo $value->product_id; ?>', '<?php echo $value->product_name; ?>', '<?php echo product_image . '/' . $value->product_image; ?>', '<?php echo ($value->product_cost) - ($value->product_cost / 100 * $value->product_discount_per); ?>', '<?php echo '1'; ?>');"></a></li>

                                            <li><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>" class="quick-view"><i class="fa fa-expand"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="title prod-titles">
                                        <h5 class=" title-ls"><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>" class="title-link"><?php echo $value->product_name; ?></a></h5>

                                    </div>
                                    <p style="text-decoration:line-through;margin-bottom:5px;"> Rs.  <?php echo $value->product_cost ?></p>
                                    <h5 class="price f700">Rs. <?php echo ($value->product_cost) - ($value->product_cost / 100 * $value->product_discount_per); ?> </h5>
                                    <span class="percentageoff"><?php if (!empty($value->product_discount_per)) {
                                    echo $value->product_discount_per;
                                } else {
                                    echo '0';
                                } ?>% off</span>
                                </div>
                                <!-- /.product type-7 -->
                    </div><?php } } ?>
                        <!-- /.col- -->

                        <!-- /.col- -->
                    </div>

                   