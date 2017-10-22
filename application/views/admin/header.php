<div class="main-content">
    <nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->	
        <ul class="user-info-menu right-links list-inline list-unstyled">
            <li class="dropdown user-profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                           <?php echo $this->session->userdata('user_email');?>

                    <img src="<?php echo base_url(); ?>assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                    <span>
                        <i class="fa-angle-down"></i>
                    </span>
                </a>
                
        	 <link rel="stylesheet" href="<?php echo base_url('assets/')?>/css/smoothness/jquery-ui.css">
 			
			<script src="http://localhost/Shopper/assets/js/calender/jquery-ui.js"></script>
			<script src="http://localhost/Shopper/assets/js/calender/jquery-1.9.1.js"></script>
                <ul class="dropdown-menu user-profile-menu list-unstyled">
                    <!--<li>
                        <a href="#">
                            <i class="fa-wrench"></i>
                            Settings
                        </a>
                    </li>-->
                    <li>
                        <a href="<?php echo site_url('admin/change_email'); ?>">
                            <i class="fa-user"></i>
                            Change Email
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/change_password'); ?>">
                            <i class="fa-user"></i>
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/logout');?>">
                            <i class="fa-sign-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
		