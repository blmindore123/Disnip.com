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
<body class="page-body login-page">

	
	<div class="login-container">
	
		<div class="row">
	
			<div class="col-sm-6">
                            <script type="text/javascript">
                                jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
                                        });
                            </script>
                            <script type="text/javascript">
                                function remove_class(id){
                                    document.getElementById(id).className = 'form-control input-dark';
                                    var divName = id.split('_');
                                    var div = divName[1];
                                }
                            </script>
                            
                            <!-- Errors container -->
				<div class="errors-container">
					
				</div>
                            <?php if(!empty($error)){ ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                            <?php } ?>
	
				<!-- Add class "fade-in-effect" for login form effect -->
                                <form action="<?php echo site_url('login') ?>" method="post" role="form" id="login" class="login-form fade-in-effect">
	
					<div class="login-header">
                                            <a href="<?php echo site_url(); ?>" class="logo">
						<img src="<?php echo adminlogo ;?>" width="140" alt="" />
						</a>
	
                                            <p>Dear user, log in to access the admin area!</p>
					</div>
					<?php if($this->session->flashdata('msg')){ ?>
		<div class="alert-message alert-<?php echo $this -> session -> flashdata('msg-class');?>"> <?php echo $this -> session -> flashdata('msg'); ?> <span class="close-message"><span class="glyphicon glyphicon-remove"></span></span></div>	
		<?php } ?>
                                   
                                  <!--  <div class="form-group" id="type">
                                            <select id="user_type" class="form-control input-dark <?php if (form_error('user_type')!="") echo "error"; ?>" name="user_type" onchange="remove_class('user_type')">
                                                    <option value="" <?php echo set_select('user_type', '', TRUE); ?>>---Select User Type---</option>
                                                    <?php foreach ($types as $value) { ?>
                                                    <option value="<?php echo $value->user_type_id; ?>" <?php echo set_select('user_type', $value->user_type_id); ?>><?php echo $value->user_type; ?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            <?php echo form_error('user_type'); ?>
					</div> -->
                                     
	
                                    
                                    <div class="form-group" id="email">
                                            <input type="text" placeholder="Email" class="form-control input-dark <?php if (form_error('user_email')!="") echo "error"; ?>" name="user_email" id="user_email" autocomplete="off" value="<?php echo set_value('user_email'); ?>" onkeypress="remove_class('user_email')" />
                                                <?php echo form_error('user_email'); ?>
					</div>
                                    
	
                                    
                                    <div class="form-group" id="password">
                                                <input type="password" placeholder="Password" class="form-control input-dark <?php if (form_error('user_password')!="") echo "error"; ?>" name="user_password" id="user_password" value="<?php echo set_value('user_password'); ?>" autocomplete="off" onkeypress="remove_class('user_password')" />
                                                
                                                <?php echo form_error('user_password'); ?>
					</div>
                                    
	
					<div class="form-group">
                                            <input type="submit" value="Log In" name="login" class="btn btn-dark btn-block">
					</div>
	
					<div class="login-footer">
						<!--<a href="<?php echo site_url('login/forgot_password'); ?>">Forgot your password?</a>-->
	
<!--						<div class="info-links">
							<a href="#">ToS</a> -
							<a href="#">Privacy Policy</a>
						</div>-->
	
					</div>
	
				</form>
	
				<!-- External login -->
<!--				<div class="external-login">
                                    <a href="<?php echo base_url('index.php/login/registration'); ?>" class="twitter" style="text-align: center;">
						Registration Here >>
					</a>
	
					 
					<a href="<?php _hash(); ?>" class="twitter">
						<i class="fa-twitter"></i>
						Login with Twitter
					</a>
	
					<a href="<?php _hash(); ?>" class="gplus">
						<i class="fa-google-plus"></i>
						Login with Google Plus
					</a>
					 
				</div>-->
	
			</div>
	
		</div>
	
	</div>



	<!-- Bottom Scripts -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/resizeable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/joinable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-api.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-toggles.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/toastr/toastr.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>



</body>
</html>