<!DOCTYPE html>

<html lang="zxx" class="no-js">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 

    <head>	
    		<meta name="viewport" content="width=device-width, initial-scale=1">		<meta name="author" content="CodePixar">		
	<meta name="description" content="Disnip,Books Selling, Books On Demand">		
	<meta name="keywords" content="Disnip,disnip">		
	<meta charset="utf-8">		
	<meta property="og:url" content="http://www.disnip.com/" />  
	<meta property="og:type" content="website" />  
	<meta property="og:title" content="Books Selling, Disnip,disnip,Books on Demand" />  
	<meta property="og:description"   content="Books selling, Books Demand" /> 
	<meta property="og:image" content="http://disnip.com/uploads/logo/website_logo_img1501786669.png" />
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106148600-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-106148600-1');
</script>

        <!-- Site Title -->

        <title>Disnip</title><!====================CSS=====================>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100|Poppins:300,400,700">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400,500">

        <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">



        <link rel="stylesheet" href="<?php echo base_url('webassets/css/style.minified.css'); ?>">

        <link rel="stylesheet" href="<?php echo base_url('webassets/css/main.css'); ?>">

        <link rel="stylesheet" href="../../../www.codepixar.com/matex/matex/css/style.html">



        <script src="<?php echo base_url('webassets/js/vendor/jquery-2.2.4.min.js'); ?>"></script>

    </head>



    <body>



        <header id="header" class="site-header header-shop static sticky-js">

            <div class="container">

                <div class="primary-nav-inner relative flex">

                    <a href="<?php echo site_url(); ?>" class="site-logo flex-cell flex-middle" >

                        <img src="<?php echo websitelogo; ?>" alt="Materialist" style="height: 50px;">

                    </a>

                    <!-- end .site-logo -->



                    <nav class="primary-nav menu-dark">

                        <ul class="menu-list nav-hover-1 sf-menu clear list-none">

                            <li class="has-dropdown megamenu">

                                <a href="<?php echo site_url('website'); ?>">Home</a>

                            </li>

                            <!-- <li class="has-dropdown megamenu">-->

                            <!--    <a href="<?php echo site_url('website/shop'); ?>">Shop</a>-->

                            <!--</li>-->

                            <!-- <li class="has-dropdown megamenu">

                                <a href="<?php echo site_url('website/about'); ?>">About Us</a>

                            </li> -->

                            <li class="has-dropdown megamenu">

                                <a href="<?php echo site_url('website/contactus'); ?>">Contact Us</a>

                            </li>

                            <li class="has-dropdown megamenu">

                                <a href="<?php echo site_url('website/contactus'); ?>">Sell on Disnip</a>

                            </li>

                            <li class="booksondemand">

                                <a style="font-weight: bold;"  href="<?php echo site_url('website/booksondemand'); ?>">Books on Demand</a>

                            </li>

                            <?php if (empty(SESSIONKEY)) { ?>

                                <li class="has-dropdown megamenu">

                                    <a href="<?php echo site_url('website/login'); ?>">Login / Sign Up</a>

                                </li><?php } else { ?>

                                <li class="has-dropdown megamenu">

                                    <a href="<?php echo site_url('website/orders_history'); ?>">Order History</a>

                                </li>

                                <li class="has-dropdown megamenu">

                                    <a href="<?php echo site_url('website/logout'); ?>">Logout</a>

                                </li>

                                <li class="profile-icon-menu">

                                    <a href="<?php echo site_url('website/mydashboard'); ?>">
                                    	 <img src="<?php echo base_url('webassets/images/user_ico.png');?>" alt="" style="height: 25px;">
                                    </a>

                                </li>



                            <?php } ?>

                        </ul>

                    </nav>

                    <!-- end .primary-nav -->



                    <div class="header-action-btns clear">
                        

                        <div class="top-search transition">

                            <a href="#" class="top-search-trigger absolute-center"></a>

                        </div>

                        <!-- end .top-search -->

                        <div class="top-cart transition">

                            <a href="#" class="top-cart-trigger absolute-center">

                                <span class="count-badge" id="cont">0</span>

                            </a>

                            <div class="header-cart-2 z-depth-1" >

                                <h6 class="cart-title text-color text-uppercase roboto text-center mb-30" >Shopping Cart</h6>

                                <div id="itemslist">  </div>   

                                <div class="product-total row no-gutter text-center fw500 title-color text-uppercase">

                                    <span class="col-xs-6">Total</span>

                                    <span class="col-xs-6" id="ttlprc">Rs 0</span>

                                    <input type="hidden" id="ttl" value="0">

                                </div>

                                <div class="actions text-center" id="checkout">

                                    <span><a href="<?php echo site_url(); ?>/website/cart" onclick="chkout();" class="view-cart title-link text-uppercase">View Cart <i class="fa fa-angle-right"></i></a></span>

                                    <span><a href="<?php echo site_url(); ?>/website/cart" onclick="chkout();"  class="btn waves-effect waves-light btn-light-dark">Process to Checkout</a></span>

                                </div>

                            </div>

                        </div>

                        <!-- end .top-cart -->

                    </div>



                    <button class="nav-hamburger dark visible-xs visible-sm">

                        <span>toggle menu</span>

                    </button> <!-- /.nav-hamburger -->

                </div>

            </div> <!-- /.container -->

        </header>

        <!-- /.magazine-header -->

        <div class="search-wrapper">

            <a href="#" class="close-search"><i class="material-icons">close</i></a>

            <form action="<?php echo site_url('website/search'); ?>" method="POST" class="search-popup">

                <div class="input-field">

                    <input type="search" id="search" name='search' autocomplete="off" required="required">

                    <label for="search">Search here...</label>

                    <button id="srch_fltr" type="submit" name="submit" ><i class="fa fa-search"></i></button>

                </div>

            </form>

        </div>
        <div class="loader-con" style="display: block;"> <div class="loader main-color center"></div></div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.loader-con').css('display', 'none');
            });
        </script>
        <script>
            function chkout(){
                location.href='<?php echo site_url(); ?>/website/cart';
            }
            </script>