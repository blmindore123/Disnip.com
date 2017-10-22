<main id="main" class="site-content"><section class="mt-80">        <div class="container">            <div class="row">                <div class="col-xs-12">                    <div class="section-title style9 text-center text-uppercase">                        <h4 class="title-ls relative inline">Product Showcase</h4>                    </div>                </div>            </div>            <div class="row">                <aside class="col-xs-12 col-md-3 widget-area mb-50">                    <section class="widget type-2 z-depth-1">                        <h5 class="widget-title text-uppercase mb-25">Product Filter By</h5>                        <div class="custom-chekbox-2 icon-check mb-15">                            <input id="latestpro" name="a" type="radio" value="1" class="filter" selected>                            <label for="latestpro" class="fw300">Latest Product</label>                        </div>                        <div class="custom-chekbox-2 icon-check mb-15">                            <input id="ltoh" type="radio" name="a" value="2" class="filter">                            <label for="ltoh" class="fw300">Low to High</label>                        </div>                        <div class="custom-chekbox-2 icon-check mb-15">                            <input id="htol" type="radio" name="a" value="3" class="filter">                            <label for="htol" class="fw300">High to Low</label>                        </div>                    </section>                    <section class="widget type-2 z-depth-1">                        <h5 class="widget-title text-uppercase mb-25">Filter by Price</h5>                        <input type="number" id="min_price" style="width: 35%;display:inline;text-align:center; "  class="filter" placeholder="Minimum Price" value="0"> <div style="padding: 5px; display:inline; text-align:center;" >-</div>                         <input type="number" id="max_price" style="width: 35%;display:inline; text-align:center; " class="filter" placeholder="Maximum Price" value="<?php echo $cost[0]->cost; ?>">                    </section>                    <section class="widget type-2 z-depth-1 latestproductonshop-sec">                        <h5 class="widget-title text-uppercase mb-25">Latest Items</h5>                        <ul>                            <?php                            if (!empty($product)) {                                $i = 0;                                foreach ($product as $value) {                                    if ($i < 3) {                                        ?>                                        <li class="flex mb-10">                                            <figure class="thumb"><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>">                                                <img src="<?php echo product_image . '/' . $product[$i]->product_image; ?>" class="img-responsive" alt=""></a>                                            </figure>                                            <div class="text ml-15">                                                <a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>" class="title title-link"><?php echo $product[$i]->product_name; ?></a><br>                                                <span class="h6 fw400">Rs.  <?php echo $product[$i]->product_cost; ?></span>                                            </div>                                        </li>                                        <?php $i++;                                    }                                }                            }  ?>                        </ul>                    </section>                </aside> <!-- /.col- -->                <div class="col-xs-12 col-md-9" id="ajx_fltr">                    <div class="row multiples_product_section-shop">  <?php if(!empty($product)){  foreach ($product as $value) { ?>                            <div class="col-xs-12 col-sm-6 col-md-4 mb-30">                                <div class="product type-7 z-depth-1 white-bg text-center">                                    <figure class="thumb relative"><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>">                                        <img src="<?php echo product_image . '/' . $value->product_image ?>" class="img-responsive" alt=""></a>                                        <ul class="product-actions">                                            <li><a href="#" class="add-to-cart"onclick="addCart('<?php echo $value->product_id; ?>', '<?php echo $value->product_name; ?>', '<?php echo product_image . '/' . $value->product_image; ?>', '<?php echo ($value->product_cost) - ($value->product_cost / 100 * $value->product_discount_per); ?>', '<?php echo '1'; ?>');"></a></li>                                            <li><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>" class="quick-view"><i class="fa fa-expand"></i></a></li>                                        </ul>                                    </figure>                                    <div class="title prod-titles">                                        <h5 class=" title-ls"><a href="<?php echo site_url(); ?>/website/product_detail/<?php echo base64_encode($value->product_id); ?>" class="title-link"><?php echo $value->product_name; ?></a></h5>                                    </div>                                    <p style="text-decoration:line-through;margin-bottom:5px;"> Rs.  <?php echo $value->product_cost ?></p>                                    <h5 class="price f700">Rs. <?php echo ($value->product_cost) - ($value->product_cost / 100 * $value->product_discount_per); ?> </h5>                                    <span class="percentageoff"><?php if (!empty($value->product_discount_per)) {                                    echo $value->product_discount_per;                                } else {                                    echo '0';                                } ?>% off</span>                                </div>                                <!-- /.product type-7 -->                    </div><?php } }else{ ?>                        <!-- /.col- -->   
<img src="<?php echo base_url('webassets/img/no_record.jpg'); ?>">                        <!-- /.col- -->                    <?php } ?>                    </div>                    <h1>&nbsp;</h1>                    <!--  <nav class="pagination-2 pull-right">                          <ul class="inline-flex flex-middle">                              <li><a href="#">PREV</a></li>                              <li><a href="#">1</a></li>                              <li><a href="#" class="active">2</a></li>                              <li><a href="#">3</a></li>                              <li><a href="#">4</a></li>                              <li><a href="#">5</a></li>                              <li><a href="#">NEXT</a></li>                          </ul>                      </nav>-->                </div> <!-- end .col-md-9 -->            </div> <!-- /.row -->        </div> <!-- /.contianer -->    </section>    <!-- /.section-full --></main> <!--  .site-content  --><!--JavaScripts========================== -->       <script>        $(document).ready(function (){                   $('.filter').on('change', function () {               var selected = $('input[name=a]:checked').val();               if(selected == undefined || selected == '' || selected == null){                   selected=1;               }                var min = $('#min_price').val();               var max = $('#max_price').val();               $.ajax({            url: '<?php echo site_url('website/ajax_shop'); ?>',            type: "POST",            data: {                'selected': selected,        'min':min,        'max':max,        'cat':'<?php echo base64_decode($this->uri->segment(3)); ?>',        'sub_cat':'<?php echo base64_decode($this->uri->segment(4)); ?>'                   },            success: function (data) {              $('#ajx_fltr').html(data);                      }        });           });                      });</script>