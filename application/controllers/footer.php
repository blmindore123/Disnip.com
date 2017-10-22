  <!-- Footer Area Start here -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 wow fadeInLeft">
                    <div class="single_footer">
                        <h3>Get The App</h3>
                        <a href=""><img src="<?php echo base_url('webassets/img/android.png')?>" alt=""></a>
                        <a href=""><img src="<?php echo base_url('webassets/img/apple.png');?>" alt=""></a>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInLeft">
                    <div class="single_footer">
                       
                        <div class="single_tweet">
                            <ul> 
                              <li><a href="<?php echo base_url('website/aboutus') ?>">About us</a></li>
                              <li><a href="">How We Work</a></li>
                              <li><a href="">Our Team</a></li>
                              <li><a href="">Invester</a></li>
                              <li><a href="">Resport Bug</a></li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-3 wow fadeInRight">
                    <div class="single_footer">
                        <div class="single_tweet">
                            <ul> 
                              <li><a href="">Careers</a></li>
                              <li><a href="">Worcool Local</a></li>
                              <li><a href="">Privacy Policy</a></li>
                              <li><a href="">Terms & Condition</a></li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-3 wow fadeInRight">
                    <div class="single_footer">
                        <h3>Follow Us</h3>
                        <div class="social_link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <!--<img src="img/logo.png" alt="">-->
                        <p>Worcool © Copyright 2017. All Rights Reserved.</p>   <a href="#" class="eval-js">Run Code</a>
                         <!--<div class="code-runner">
            <a class="eval-js" href="#">Run code</a>-->
<!--<pre><code>$.toast({
    heading: 'Success',
    text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
    showHideTransition: 'slide',
    icon: 'success'
})</code></pre>-->
        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End here -->

    <!-- Offer Area End Here -->
    <!-- Footer Area End here -->
    <!-- Back To Top -->
    <a id="back-top" class="back-to-top page-scroll" href="#main">
        <i class="fa fa-arrow-up"></i>
    </a>
    <!-- Back To Top -->

    <!--model for login-->

     <div class="modal fade myModal1" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><img width="40px" src="<?php echo base_url('webassets/img/cross.png');?>"/></button>
          <div class="container-fluid"> 
             <div class="log-signup">              
				    <div class="omb_login">
				    	<h3 class="omb_authTitle">Login in to your account </h3>
						<div class="row omb_row-sm-offset-3 omb_socialButtons">
				    	    <div class="col-xs-4 col-sm-2">
						        <a onclick="fb_login()" class="btn btn-lg btn-block omb_btn-facebook">
							        <i class="fa fa-facebook "></i>
							        <span class="hidden-xs"></span>
						        </a>
					        </div>
				        	<div class="col-xs-4 col-sm-2">
						      <!--  <a href="<?php echo base_url('website/linkedin_login/LinkedIn') ?>" class="btn btn-lg btn-block omb_btn-twitter">-->
                                <?php
								$callback_url  = 'http://worcool.com/index.php/website/linkedin_login'; //Your callback URL
 
                             $Client_ID     =   '8149ehh1sl6ka1'; // Your LinkedIn Application Client ID
                             $Client_Secret     =   'abIzrdpN2fM8qjxQ';


echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='.$Client_ID .'&redirect_uri='.$callback_url.'&state=98765EeFWf45A53sdfKef4233&scope=r_basicprofile r_emailaddress" class="btn btn-lg btn-block omb_btn-twitter">  <i class="fa fa-linkedin-square"></i>
							        <span class="hidden-xs"></span></a>';
?>
							       
						        
					        </div>	
				        	<div class="col-xs-4 col-sm-2">
						        <a href="<?php echo base_url('website/google_login/Google') ?>" class="btn btn-lg btn-block omb_btn-google">
							        <i class="fa fa-google-plus "></i>
							        <span class="hidden-xs"></span>
						        </a>
					        </div>	
						</div>

						<div class="row omb_row-sm-offset-3 omb_loginOr">
							<div class="col-xs-12 col-sm-6">
								<hr class="omb_hrOr">
								<span class="omb_spanOr">or</span>
							</div>
						</div>

            <form class="omb_loginForm" action="<?php echo base_url('website/login') ?>" autocomplete="off" method="POST" id="login_form">
            <div class="row omb_row-sm-offset-3">
              <div class="col-xs-12 col-sm-6">	
                <div class="input-group">

                  <input type="text" class="form-control" name="username" placeholder="Username or Email" required>
                  <span class="icon"><img width="25px" src="<?php echo base_url('webassets/img/user.PNG');?>"></span>
                </div>
                <span class="help-block"></span>

                <div class="input-group">

                  <input  type="password" class="form-control" name="password" placeholder="Password" required data-toggle="password">
                  <span class="icon"><img width="20px" src="<?php echo base_url('webassets/img/password.PNG');?>"></span>
                 <!-- <a class="pass-show-hide" onclick="showhide_password()"><img id="eyeicon" width="20px" src="<?php echo base_url('webassets/img/eye_hide.png');?>">
                  <!-- <img width="20px" src="<?php echo base_url('webassets/img/eye_show.png');?>"> -->
                  <!--</a>-->
                </div>
                <!--<span class="help-block">Password error</span>-->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                
              </div>
            </div>
            
            <div class="row omb_row-sm-offset-3">
              <div class="col-xs-12 col-sm-3">
                <label class="checkbox">
                  <input type="checkbox" name="user_remember" id="user_remember" value="1">Remember Me
                </label>
              </div>
              <div class="col-xs-12 col-sm-3">
                <p class="omb_forgotPwd">
                  <a href="#" onclick="show_forget()">Forgot password?</a>
                </p>
              </div>
            </div>	
            </form>

            <a class="signup-btn-link" style="cursor:pointer" onclick="show_signup()" >Sign up</a>   
            <span  id="login_error" style="color: red;margin-left: 200px"></span> 	
            </div>


             </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>


      <!--model for signup-->

     <div class="modal fade myModal2" id="myModal2"  role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="signup">
        <div class="modal-body">
           <button type="button" class="close" data-dismiss="modal"><img width="40px" src="<?php echo base_url('webassets/img/cross.png');?>"/></button>
          <div class="container-fluid"> 
             <div class="log-signup">              
				    <div class="omb_login">
				    	<h3 class="omb_authTitle">Sign Up </h3>
						

						<div class="row omb_row-sm-offset-3">
							<div class="col-xs-12 col-sm-6">	
							    <form class="omb_loginForm" action="<?php echo base_url('website/signup') ?>" autocomplete="off" method="POST" id="contactForm1">
									<div class="input-group">
										
										<input type="email" class="form-control" name="user_email" placeholder="Email" required>
                                        <span class="icon"><img width="25px" src="<?php echo base_url('webassets/img/email_ico.PNG');?>"></span>
									</div>
									<span class="help-block"></span>
														
									<div class="input-group">
										
										<input  type="text" class="form-control" name="user_username" placeholder="User Name" required  value="">
                                        <span class="icon"><img width="25px" src="<?php echo base_url('webassets/img/user.PNG');?>"></span>
									</div>

									<div class="input-group">
										
										<input  type="password" class="form-control" placeholder="Password" required="required" name="user_password"  value="">
                                        <span class="icon"><img width="20px" src="<?php echo base_url('webassets/img/password.PNG');?>"></span>
									</div>

									<div class="input-group">
										
										<input  type="password" class="form-control" placeholder="Confirm Password" required name="confirm_pass" equalTo: "#user_password" id="confirm_pass">
                                        <span class="icon"><img width="20px" src="<?php echo base_url('webassets/img/password.PNG');?>"></span>
									</div>

									<h4>I want to</h4>
									<div class="input-group">
					    				<div id="radioBtn" class="btn-group">
					    					<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="1" >Hire</a>
					    					<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="2" >Work</a>
					    					<input type="hidden" name="user_work_type" id="work_type" value="" />
					    				</div>
					    				<input name="happy" id="happy" type="hidden">
					    			</div>

				                    <!--<span class="help-block">Password error</span>-->

									<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign Up">
									<br>
									<h4 class="text-center"><a  href="#" data-toggle="modal" data-target="#myModal1" data-dismiss="modal"> If you have worcool account?</a></h4>
									<br>
									
									<span  id="signup_error" style="color: red;margin-left: 50px"></span>
								</form>
							</div>
				    	</div>
						 	    	
					</div>
             </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>


  <!--Model For ForgetPassword-->

  <div class="modal fade forgot-model-main" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><img width="25px" src="<?php echo base_url('webassets/img/cross.png');?>"/></button>
          <div class=""> 
            <div class="log-signup">              
              <div class="omb_login">
                <h3 class="omb_authTitle">Forget Password </h3>
                <form class="omb_loginForm" action="<?php echo base_url('website/forget_password') ?>" autocomplete="off" method="POST" id="forget_form">
                  <div class="forgot-box">
                    <div class="col-md-12  ">  
                      <div class="input-group">
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username or Email" required>
                        <span class="icon"><img width="25px" src="<?php echo base_url('webassets/img/user.PNG');?>"></span>
                      </div>
                      <span class="help-block"></span>
                      <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
                      <span  id="forget_error" style="color: red;margin-left: 10px"></span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


     
  <!-- Javascript library and plugin-->
    <!-- <script type="text/javascript" src="<?php echo base_url('webassets/js/jquery.min.js');?>"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('webassets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('webassets/js/jquery.toast.js');?>"></script>
   
  
    <script src="<?php echo base_url('webassets/js/jquery.filterizr.js');?>"></script>
    <script src="<?php echo base_url('webassets/js/lightbox.js');?>"></script>
    <script src="<?php echo base_url('webassets/js/lightslider.js');?>"></script>
    <script src="<?php echo base_url('webassets/js/wow.min.js');?>"></script>
    <script src="<?php echo base_url('webassets/js/script.js');?>"></script>
    <script src="<?php echo base_url('webassets/js/map.js');?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> -->
 
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUHdpyJ-rnuTeG14UlX3DUuT7TbauVLxA&amp;signed_in=true&amp;callback=initMap"></script>
    <script> 
    $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
    </script>
    <!--Javascript library and plugin-->
  <script>
  	function onchange_type(id)
  	{
  		$("#work_type").val(id);
  	}
  </script>
  <script type="text/javascript">
    var frm = $('#contactForm1');
    frm.submit(function (ev) {
    	 $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) { 
               var getdata=$.parseJSON(data);
               var status=getdata.status;
               var message=getdata.message;
               var work=getdata.user_work_type;
               if(status=='false')
               {
                  $("#signup_error").css({"color":"red"});
               	 $("#signup_error").text(message);
               }else{
                  $("#signup_error").css({"color":"green"});
               	$("#signup_error").text(message);
               	$("#signup").modal('hide');
                if(work=='1')
                {
                  window.location.href=site_url+"/postproject";
                }else if(work=='2')
                {
                  window.location.href="/Dashboard";
                }
               	
               }
            }
        });

        ev.preventDefault();
    });
</script>
  <script type="text/javascript">
    var frm1 = $('#login_form');
    frm1.submit(function (ev) {
    	 $.ajax({
            type: frm1.attr('method'),
            url: frm1.attr('action'),
            data: frm1.serialize(),
            success: function (data) {
               var getdata=$.parseJSON(data);
               var status=getdata.status;
               var message=getdata.message;
               if(status=='false')
               {
               	 $("#login_error").text(message);
               }else{
               	$("#login_error").text(message);
               	$("#myModal1").modal('hide');
               	window.location.href="/Dashboard";
               }
            }
        });

        ev.preventDefault();
    });
</script>
                     <script>
         window.fbAsyncInit = function() {
       FB.init({
            appId      : '416748538686245',
            cookie     : true,  // enable cookies to allow the server to access 
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.2' // use version 2.2
        });
    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  
    function fb_login(){
        FB.login(function(response) {
      if (response.status === 'connected') {
                FB.api('/me?fields=id,name,email,first_name,last_name,picture', function(response) {
                	// alert( );
                    $.ajax({
                        'url' :'<?php echo base_url('website/fblogin');?>',
                        'type':'POST',
                        'data':{'fb_response':response},
                        'success' : function(data)
                        { 
                        	 if(data == 1){
                                window.location = "<?php echo base_url('website/myprofile'); ?>";
                            }
                        }
                    });
                });
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
            }
        }, {scope: 'public_profile,email'});
    }</script> 
    <!-- Ankush -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
       
       $(function() { 
          $(".js-example-placeholder-single").select2({
            placeholder: {
              id: '-1', // the value of the option
              text: 'Select your Country'
            }
          });
          $(".js-example-placeholder-designation").select2({
            placeholder: {
              id: '-1', // the value of the option
              text: 'Select your Designation'
            }
          });
          $(".js-example-basic-multiple").select2({
            placeholder: {
              id: '-1', // the value of the option
              text: 'Select your Skills'
            }
          });
       });
    </script>
    <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.profilepic').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      function readURL1(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.bannarpic').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      $(function(){
        $("#profilepic").change(function(){
            readURL(this);
        });
        $("#bannarpic").change(function(){
            readURL1(this);
        });
      });
    </script>
    <script type="text/javascript">
		  function notificationdiv() {
	
   var x = document.getElementById('notification_popup');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}



 function checkproject(pro_id,cont_id)
    {
       // alert(pro_id);
	       $("#pro_name_contact").empty();
		    $("#pro_disp").empty();
			$("#pro_currency_code").empty();
			$("#status_action").empty();
					//$("#project_fixrateprice").empty();
				//	$("#pro_disp").html);
	
					
					
					
					 $.ajax({
                  url: "<?php echo base_url('website/contact_data');?>", 
                    method: "POST",
                  data: { 'pro_id' : pro_id,'cont_id' : cont_id},
                  success: function(result){
					   $.each(JSON.parse(result), function(idx, obj) {
						 $("#pro_name_contact").html(obj.pro_name);
					$("#pro_disp").html(obj.project_description);
					$("#pro_currency_code").html(obj.currency_icon+''+obj.project_fixrateprice+' '+obj.currency_code);
					
					$("#status_action").html(obj.status_data);
					//$("#project_fixrateprice").html(obj.project_fixrateprice);
					
					
					 
					  
					   
                   });
                    }
					});
         
    }
    function show_login()
    {
       $("#myModal2").modal('hide');
       $("#myModal3").modal('hide');
        $("#myModal1").modal();
         
    }
    function show_signup()
    {
      $("#myModal1").modal('hide');
      $("#myModal3").modal('hide');
       $("#myModal2").modal();

    }

    function show_forget(){
      $("#myModal1").modal('hide');
      $("#myModal2").modal('hide');
      $("#myModal3").modal();
    }

    var frm2 = $('#forget_form');
    frm2.submit(function (ev) {
       $.ajax({
        type: frm2.attr('method'),
        url: frm2.attr('action'),
        data: frm2.serialize(),
        success: function (data) { 
          var getdata=$.parseJSON(data);
          var status=getdata.status;
          var message=getdata.message;
          var work=getdata.user_work_type;
          if(status=='false'){
            $("#forget_error").text(message);
            $("#user_name").val('');
            $("#user_name").focue();
            $("#forget_error").show();
            setTimeout(function(){ 
              $("#forget_error").hide();
            }, 3000);            
          }else{
            $("#forget_error").css({"color":"green"});
            $("#forget_error").text(message);
            $("#user_name").val('');
            $("#forget_error").show();
            setTimeout(function(){ 
              $("#myModal3").modal('hide');
              $("#forget_error").hide();
            }, 3000);            
          }
        }
      });
      ev.preventDefault();
    });
    </script>
    <!-- Ankush -->
    
    <!----sunil-->
     <script type="text/javascript">
        $(document).ready(function() {
			
		
			
			 setInterval(function(){
				 
				 
				   $.ajax({
                  url: "<?php echo base_url('website/toastnotify');?>", 
                    method: "POST",
                  data: { 'filter_id' : ''},
                  success: function(result){
					  console.log(result);
					  $.each(JSON.parse(result), function(idx, obj) {
	                console.log(obj.pro_name);

					if(obj.pro_name){
						   $.toast({
                      heading: '<a href="http://www.worcool.com/Project-Details/'+obj.project_id+'">'+obj.pro_name+'</a>',
					  hideAfter: 30000,
					   bgColor: '#4d525b',
                      textColor: 'white',
                       text:obj.skills +'<br/>'+obj.project_description+'<br/>'+obj.currency_code+''+obj.project_fixrateprice,
                       showHideTransition: 'slide',
                      icon: 'success'
                      });
					}
	              //alert(obj.pro_name);
                    });
					  
					   
                
                    }
					});
					
					
				






},60000);




            
            $('.eval-js').on('click', function ( e ) {
				
                e.preventDefault();
$.toast({
    heading: 'Success',
    text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
    showHideTransition: 'slide',
    icon: 'success'
})
               /* if ( !$(this).hasClass('generate-toast') ) {
                    var code = $(this).siblings('pre').find('code').text();
                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval( code );
                };*/
            });

            $('#icon-type').on('change', function () {
                if ( !$(this).val() ) {
                    $('.custom-color-info').show();
                    $('.toast-icon-line').hide();
                    $('.toast-bgColor-line').show();
                    $('.toast-textColor-line').show();
                } else {
                    $('.toast-icon-line').show();
                    $('.custom-color-info').hide();
                    $('.toast-bgColor-line').hide();
                    $('.toast-textColor-line').hide();
                    $('.toast-icon-line span.toast-icon').text( $(this).val() );
                }
            });

            // You are about to see some extremely horrible code that can be MUCH MUCH improved,
            // I've knowlingly done it that way, please don't judge me based upon this ;)
            $(document).ready(function () {
				
				
				
				 $('#send_notify_send').on('click', function ( e ) {
					  var mobile = $('#send_notify_number').val();
					  var user_id_verify = $('#user_id_verify').val();
					  
					 
				 $.ajax({
                      'url' :'http://www.worcool.com/Api/api.php?rquest=send_otp&user_id='+user_id_verify+'&user_mobile_no='+mobile+'',
                        'type':'POST',
                        'data':{'dsd':''},
                        'success' : function(data)
                        { 
                        	//alert('sucess');
							//alert(data);
                        }
                    });
                
				  });
                   
				 $('#send_otp_send').on('click', function ( e ) {
					 // var mobile = $('#send_notify_number').val();
					  var user_id_verify = $('#user_id_verify').val();
					    var user_otp = $('#user_otp').val();
						//alert(user_id_verify);
						//alert(user_otp);
					  
					  
				 $.ajax({
                      'url' :'http://www.worcool.com/Api/api.php?rquest=otp_verification&user_id='+user_id_verify+'&user_otp='+user_otp+'&user_device_id=12345&user_device_token=212121&user_device_type=1',
                        'type':'POST',
                        'data':{'dsd':''},
                        'success' : function(data)
                        { 
						 location.reload();
                        	//alert('sucess');
							//alert(data);
                        }
                    });
                
				
               

            });
                
                function generateCode () {
                    var text = $('.plugin-options #toast-text').val(); 
                    var heading = $('.plugin-options #toast-heading').val(); 
                    var transition = $('.toast-transition').val(); 
                    var allowToastClose = $('#allow-toast-close').val(); 
                    var autoHide = $('#auto-hide-toast').val(); 
                    var stackToasts = $('#stack-toasts').val(); 
                    var toastPosition = $('#toast-position').val() 
                    var toastBg = $('#toast-bg').val(); 
                    var toastTextColor = $('#toast-text-color').val();
                    var toastIcon = $('#icon-type').val();
                    var textAlign = $('#text-align').val();
                    var toastEvents = $('#add-toast-events').val();
                    var loader = $('#show-loader').val();
                    var loaderBg = $('#loader-bg').val();

                    if ( text ) {
                        $('.toast-text-line').show(); 
                        $('.toast-text-line .toast-text').text( text ); 
                    } else {
                        $('.toast-text-line').hide() 
                        $('.toast-text-line .toast-text').text(''); 
                    };

                    if ( heading ) {
                        $('.toast-heading-line').show(); 
                        $('.toast-heading-line .toast-heading').text( heading ); 
                    } else {
                        $('.toast-heading-line').hide() 
                        $('.toast-heading-line .toast-heading').text(''); 
                    }; 

                    if ( transition ) {
                        $('.toast-transition-line').show() 
                        $('.toast-transition-line .toast-transition').text( transition ); 
                    } else {
                        $('.toast-transition-line').hide(); 
                        $('.toast-transition-line .toast-transition').text('fade'); 
                    } 

                    if ( allowToastClose ) {
                        $('.toast-allowToastClose-line').show(); 
                        $('.toast-allowToastClose-line .toast-allowToastClose').text( allowToastClose ); 
                    } else {
                        $('.toast-allowToastClose-line').hide(); 
                        $('.toast-allowToastClose-line .toast-allowToastClose').text( false ); 
                    } 

                    if ( autoHide && ( autoHide == 'false' ) ) {
                        $('.toast-hideAfter-line').show(); 
                        $('.toast-hideAfter-line .toast-hideAfter').text('false'); 
                        $('.autohide-after').hide(); 
                    } else {
                        $('.toast-hideAfter-line').show(); 
                        $('.toast-hideAfter-line .toast-hideAfter').text( $('#autohide-after').val() ? $('#autohide-after').val() : 3000 ); 
                        $('.autohide-after').show(); 
                    } 

                    if ( stackToasts && stackToasts != 'true') {
                        $('.toast-stackLength-line').show(); 
                        $('.toast-stackLength-line .toast-stackLength').text( stackToasts ); 
                        $('.stack-length').hide(); 
                    } else {
                        $('.stack-length').show(); 
                        $('.toast-stackLength-line').show(); 
                        $('.toast-stackLength-line .toast-stackLength').text( $('#stack-length').val() ? $('#stack-length').val() : 5 ); 
                    } 

                    if ( toastPosition && ( toastPosition !== 'custom-position' ) ) {
                        $('.toast-position-string-line').show(); 
                        $('.custom-toast-position').hide(); 
                        $('.toast-position-string-line .toast-position').text( toastPosition ); 
                    } else {
                        $('.toast-position-string-line').hide(); 
                        $('.toast-position-string-line .toast-position').text(''); 
                    } 

                    if ( toastPosition && ( toastPosition === 'custom-position' ) ) {
                        $('.custom-toast-position').show(); 
                        $('.toast-position-string-obj').show(); 
                        var left = $('#left-position').val() ? $('#left-position').val() : 'auto'; 
                        var right = $('#right-position').val() ? $('#right-position').val() : 'auto'; 
                        var top = $('#top-position').val() ? $('#top-position').val() : 'auto'; 
                        var bottom = $('#bottom-position').val() ? $('#bottom-position').val() : 'auto'; 
                        $('.toast-position-string-obj .toast-position-left').text( ( left !== 'auto' ) ? left : "'" + left + "'" ); 
                        $('.toast-position-string-obj .toast-position-right').text( ( right !== 'auto' ) ? right : "'" + right + "'" ); 
                        $('.toast-position-string-obj .toast-position-top').text( ( top !== 'auto' ) ? top : "'" + top + "'" ); 
                        $('.toast-position-string-obj .toast-position-bottom').text(  ( bottom !== 'auto' ) ? bottom : "'" + bottom + "'"  ); 
                    } else {
                        $('.toast-position-string-obj').hide(); 
                        // $('.toast-position-string-obj toast-position').text('');
                    } 

                    if ( !toastIcon ) {
                        if ( toastBg ) {
                            $('.toast-bgColor-line').show(); 
                            $('.toast-bgColor-line .toast-bgColor').text( toastBg ); 
                        } else {
                            $('.toast-bgColor-line').hide(); 
                            $('.toast-bgColor-line .toast-bgColor').text(''); 
                        } 

                        if ( toastTextColor ) {
                            $('.toast-textColor-line').show(); 
                            $('.toast-textColor-line .toast-textColor').text( toastTextColor ); 
                        } else {
                            $('.toast-textColor-line').hide(); 
                            $('.toast-textColor-line .toast-textColor').text(''); 
                        } 
                    }

                    if ( textAlign ) {
                        $('.toast-textAlign-line').show(); 
                        $('.toast-textAlign-line .toast-textAlign').text( textAlign ); 
                    } else {
                        $('.toast-textAlign-line').hide(); 
                        $('.toast-textAlign-line .toast-textAlign').text( ''); 
                    } 

                    if (loader == 'false') {
                        $('.toast-textLoader').html('false');
                    } else {
                        $('.toast-textLoader').html('true');
                    }
                    
                    if (loaderBg) {
                        $('.toast-textLoaderBg').html(loaderBg);
                    }

                    if ( toastEvents == 'false' ) {
                        $('.toast-beforeShow-line').hide(); 
                        $('.toast-afterShown-line').hide(); 
                        $('.toast-beforeHide-line').hide(); 
                        $('.toast-afterHidden-line').hide(); 
                    } else {
                        $('.toast-beforeShow-line').show(); 
                        $('.toast-afterShown-line').show(); 
                        $('.toast-beforeHide-line').show(); 
                        $('.toast-afterHidden-line').show(); 
                    } 
                }

                $('#top-position').on('change', function () { $('#bottom-position').val('auto'); });
                $('#bottom-position').on('change', function () { $('#top-position').val('auto'); });
                $('#left-position').on('change', function () { $('#right-position').val('auto'); });
                $('#right-position').on('change', function () {$('#left-position').val('auto'); });
                $('.plugin-options :input').on('change', function () {
                  $.toast().reset('all');
                  generateCode();
                });

                $('.generate-toast').on('click', function( e ) {
                  e.preventDefault();
                  generateToast();
                });

                function generateToast () {
                    var options = {};

                    if ( $('.toast-text-line').is(':visible') ) {
                        options.text = $('.toast-text-line .toast-text').text();
                    } 

                    if ( $('.toast-heading-line').is(':visible') ) {
                        options.heading = $('.toast-heading').text(); 
                    }; 

                    if ( $('.toast-transition-line').is(':visible') ) {
                        options.showHideTransition = $('.toast-transition-line .toast-transition').text(); 
                    }; 

                    if ( $('.toast-allowToastClose-line').is(':visible') ) {
                        options.allowToastClose = ( $('.toast-allowToastClose-line .toast-allowToastClose').text() === 'true' ) ? true : false; 
                    }; 

                    if ( $('.toast-hideAfter-line').is(':visible') ) {
                        options.hideAfter = parseInt($('.toast-hideAfter-line .toast-hideAfter').text(), 10) || false; 
                    }; 

                    if ( $('.toast-stackLength-line').is(':visible') ) {
                        options.stack = parseInt($('.toast-stackLength-line .toast-stackLength').text(), 10) || false; 
                    }; 

                    if ( $('.toast-position-string-line').is(':visible') ) {
                        options.position = $('.toast-position-string-line .toast-position').text(); 
                    }; 

                    if ( $('.toast-position-string-obj').is(':visible') ) {
                        options.position = {}; 
                        options.position.left =  parseFloat( $('.toast-position .toast-position-left').text() ) || 'auto'; 
                        options.position.right =  parseFloat( $('.toast-position .toast-position-right').text() ) || 'auto'; 
                        options.position.top =  parseFloat( $('.toast-position .toast-position-top').text() ) || 'auto'; 
                        options.position.bottom =  parseFloat( $('.toast-position .toast-position-bottom').text() ) || 'auto'; 
                    }; 

                    if ( $('.toast-icon-line').is(':visible') ) {
                        options.icon = $('.toast-icon-line .toast-icon').text();
                    };

                    if ( $('.toast-bgColor-line').is(':visible') ) {
                        options.bgColor = $('#toast-bg').val(); 
                    }; 

                    if ( $('.toast-text-color').is(':visible') ) {
                        options.textColor = $('#toast-text-color').val(); 
                    }; 

                    if ( $("#text-align").is(':visible') ) {
                        options.textAlign = $('#text-align').val(); 
                    };

                    options.loader = $('.toast-textLoader').html() === 'false' ? false : true;
                    options.loaderBg = $('.toast-textLoaderBg').html();

                    $.toast( options ); 
                }

                generateCode(); 
            });
        });
    </script>
    <!---end--->
</body>

</html>