<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />

	<title>Disnip</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body">
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
		
			<div class="sidebar-menu-inner">
				
				<header class="logo-env">
		
					<!-- logo -->
					<div class="logo">
                                            <a href="<?php echo site_url(); ?>" class="logo-expanded">
							<img src="<?php echo adminlogo ;?>" width="140" alt="" />
						</a>
		
						<a href="<?php echo site_url(); ?>" class="logo-collapsed">
							<img src="<?php echo adminlogo ;?>" width="140" alt="" />
						</a>
					</div>
		
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-arrow-circle-o-down"></i>
						</a>
		
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
		
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative 
					<div class="settings-icon">
						<a href="#" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
						</a>
					</div>
					-->
				
				</header>
                            <?php $segment = $this->uri->segment(2); ?>
                            <ul id="main-menu" class="main-menu">
    <li <?php if(($this->uri->segment(1) == 'admin') && ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index')){ ?>class="active"<?php } ?>>
        <a href="<?php echo base_url('index.php/admin') ?>">
            <i class="linecons-cog"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>
   <li <?php if($this->uri->segment(2) == 'user_list'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/user_list'); ?>">
            <i class="fa fa-user"></i>
            <span class="title">User </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'user_list'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/user_list'); ?>">
                    <span class="title">User List</span>
                </a>
            </li>
            
        </ul>
    </li>
  <li <?php if($this->uri->segment(2) == 'slider_list' || $this->uri->segment(2) == 'add_slider'|| $this->uri->segment(2) == 'edit_slider' || $this->uri->segment(2) == 'logo_list' ||  $this->uri->segment(2) == 'edit_logo'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/slider_list'); ?>">
            <i class="fa fa-list-ol"></i>
            <span class="title">Slider / Logo</span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'slider_list' || $this->uri->segment(2) == 'add_slider' || $this->uri->segment(2) == 'edit_slider'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/slider_list'); ?>">
                    <span class="title">Slider List</span>
                </a>
            </li>
        
        </ul>
        <ul>
            <li <?php if($this->uri->segment(2) == 'logo_list' ||  $this->uri->segment(2) == 'edit_logo'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/logo_list'); ?>">
                    <span class="title">Logo</span>
                </a>
            </li>
            
        </ul>
    </li>
       <li <?php if($this->uri->segment(2) == 'category_list' || $this->uri->segment(2) == 'add_category'|| $this->uri->segment(2) == 'edit_category' || $this->uri->segment(2) == 'subcategory_list' || $this->uri->segment(2) == 'add_subcategory'|| $this->uri->segment(2) == 'edit_subcategory' || $this->uri->segment(2) == 'product_list' || $this->uri->segment(2) == 'add_product'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/category_list'); ?>">
            <i class="fa fa-list-ol"></i>
            <span class="title">All-Products </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'category_list' || $this->uri->segment(2) == 'add_category' || $this->uri->segment(2) == 'edit_category'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/category_list'); ?>">
                    <span class="title">Category List</span>
                </a>
            </li>
            
        </ul>
         <ul>
            <li <?php if($this->uri->segment(2) == 'subcategory_list' || $this->uri->segment(2) == 'add_subcategory' || $this->uri->segment(2) == 'edit_subcategory'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/subcategory_list'); ?>">
                    <span class="title">Sub-Category List</span>
                </a>
            </li>
            
        </ul>
         <ul>
            <li <?php if($this->uri->segment(2) == 'product_list' || $this->uri->segment(2) == 'add_product'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/product_list'); ?>">
                    <span class="title">Products List</span>
                </a>
            </li>
            
        </ul>
    </li>
        
<li <?php if($this->uri->segment(2) == 'books_on_demand'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/books_on_demand'); ?>">
            <i class="fa fa-dropbox"></i>
            <span class="title">Books-Demand </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'books_on_demand' ){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/books_on_demand'); ?>">
                    <span class="title">Books-On-Demand</span>
                </a>
            </li>
            
        </ul>
    </li>
    <li <?php if($this->uri->segment(2) == 'magazine_on_demand'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/magazine_on_demand'); ?>">
            <i class="fa fa-dropbox"></i>
            <span class="title">Magazin-Demand</span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'magazine_on_demand' ){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/magazine_on_demand'); ?>">
                    <span class="title">Magazines-On-Demand-List</span>
                </a>
            </li>
            
        </ul>
    </li>
    <li <?php if($this->uri->segment(2) == 'kalyani'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/kalyani'); ?>">
            <i class="fa fa-dropbox"></i>
            <span class="title">Kalyani-Books</span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'kalyani' ){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/kalyani'); ?>">
                    <span class="title">Kalyani-Books-Demand-List </span>
                </a>
            </li>
            
        </ul>
    </li>
    <li <?php if($this->uri->segment(2) == 'contact_user'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/contact_user'); ?>">
            <i class="fa fa-dropbox"></i>
            <span class="title">Contact User </span>
        </a>
      
    </li>
  <li <?php if($this->uri->segment(2) == 'pincode_list' || $this->uri->segment(2) == 'add_pincode'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/pincode_list'); ?>">
            <i class="fa fa-ellipsis-h"></i>
            <span class="title">Pin-Code </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'pincode_list' || $this->uri->segment(2) == 'add_pincode'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/pincode_list'); ?>">
                    <span class="title">Pin-Code List</span>
                </a>
            </li>
            
        </ul>
    </li>
<!-- <li <?php if($this->uri->segment(2) == 'payment_type' || $this->uri->segment(2) == 'add_payment_type'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/payment_type'); ?>">
            <i class="fa fa-credit-card-alt"></i>
            <span class="title">Payment Type </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'payment_type' || $this->uri->segment(2) == 'add_payment_type'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/payment_type'); ?>">
                    <span class="title">Payment Type List</span>
                </a>
            </li>
            
        </ul>
    </li>-->
     
    <li <?php if($this->uri->segment(2) == 'payment_details'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/payment_details'); ?>">
            <i class="fa fa-money"></i>
            <span class="title">Payment </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'payment_details'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/payment_details'); ?>">
                    <span class="title">Payment Details</span>
                </a>
            </li>
            
        </ul>
    </li> 
    <li <?php if($this->uri->segment(2) == 'delivery_details'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/delivery_details'); ?>">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Order Records </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'delivery_details'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/delivery_details'); ?>">
                    <span class="title">Order List</span>
                </a>
            </li>
            
        </ul>
    </li>
<!--    <li <?php if($this->uri->segment(2) == 'minimum_checkout_list'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/minimum_checkout_list'); ?>">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Delivery Settings</span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'minimum_checkout_list'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/minimum_checkout_list'); ?>">
                    <span class="title">Checkout</span>
                </a>
            </li>
            <li <?php if($this->uri->segment(2) == 'delivery_cost_management_list'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/delivery_cost_management_list'); ?>">
                    <span class="title">Delivery Cost</span>
                </a>
            </li>
            <li <?php if($this->uri->segment(2) == 'shipping_schedule_date_list'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/shipping_schedule_date_list'); ?>">
                    <span class="title">Shipping Schedule</span>
                </a>
            </li>
        </ul>
    </li>-->
       <li <?php if($this->uri->segment(2) == 'about_us' || $this->uri->segment(2) == 'add_about_content'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/about_us'); ?>">
            <i class="fa fa-info-circle"></i>
            <span class="title">About us </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'about_us' ||$this->uri->segment(2) == 'terms_conditions' || $this->uri->segment(2) == 'edit_terms_conditions'||$this->uri->segment(2) == 'shipping_delivery' || $this->uri->segment(2) == 'edit_shipping_delivery_content'||$this->uri->segment(2) == 'privecy_policy' || $this->uri->segment(2) == 'edit_privecy_policy_content'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/about_us'); ?>">
                    <span class="title">About us content</span>
                </a>
            </li>
<!--           <li <?php if($this->uri->segment(2) == 'shipping_delivery' || $this->uri->segment(2) == 'edit_shipping_delivery_content'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/shipping_delivery'); ?>">
                    <span class="title">Shipping & Delivery</span>
                </a>
            </li>
            <li <?php if($this->uri->segment(2) == 'privecy_policy' || $this->uri->segment(2) == 'edit_privecy_policy_content'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/privecy_policy'); ?>">
                    <span class="title">Privecy & Policy</span>
                </a>
            </li>
            <li <?php if($this->uri->segment(2) == 'terms_conditions' || $this->uri->segment(2) == 'edit_terms_conditions'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/terms_conditions'); ?>">
                    <span class="title">Terms & Conditions</span>
                </a>
            </li>-->
        </ul>
    </li>
      <!-- <li <?php if($this->uri->segment(2) == 'shipping_delivery' || $this->uri->segment(2)=='edit_shipping_delivery_content'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/shipping_delivery'); ?>">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Shipping & Delivery </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'shipping_delivery' || $this->uri->segment(2) == 'edit_shipping_delivery_content'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/shipping_delivery'); ?>">
                    <span class="title">Shipping & Delivery</span>
                </a>
            </li>
            
        </ul>
    </li>
        <li <?php if($this->uri->segment(2) == 'privecy_policy' || $this->uri->segment(2) == 'edit_privecy_policy_content' ){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/privecy_policy'); ?>">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Privecy & Policy </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'privecy_policy' || $this->uri->segment(2) == 'edit_privecy_policy_content'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/privecy_policy'); ?>">
                    <span class="title">Privecy & Policy</span>
                </a>
            </li>
            
        </ul>
    </li>
        <li <?php if($this->uri->segment(2) == 'terms_conditions' || $this->uri->segment(2) == 'edit_terms_conditions' ){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/terms_conditions'); ?>">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Terms & Conditions </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'terms_conditions' || $this->uri->segment(2) == 'edit_terms_conditions'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/terms_conditions'); ?>">
                    <span class="title">Terms & Conditions</span>
                </a>
            </li>
            
        </ul>
    </li> -->
     <li <?php if($this->uri->segment(2) == 'contact_us' || $this->uri->segment(2) == 'edit_contact_us'){ ?>class="opened active"<?php } ?>>
        <a href="<?php echo site_url('admin/contact_us'); ?>">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Contact Us </span>
        </a>
        <ul>
            <li <?php if($this->uri->segment(2) == 'contact_us' || $this->uri->segment(2) == 'edit_contact_us'){ ?>class="active"<?php } ?>>
                <a href="<?php echo site_url('admin/contact_us'); ?>">
                    <span class="title">Contact Us</span>
                </a>
            </li>
            
        </ul>
    </li>
</ul>
</div>
</div>
	
