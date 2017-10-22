

<main id="main" class="site-content">
   <section class="section-login-register parallax-bg half-bg" style="background-image: url('img/slider/login-bg-2.jpg');">
      <span class="overlay" data-hover-color="#000" data-hover-opacity="0.4"></span>        
      <div class="container">
         <div class="main-login-div row   flex-middle fullscreen disable-fullscreen-xs disable-flex-xs relative">
            <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
               <div class="page-login-wrapper flex-grow text-center">
                  <!--                                <a href="index.html" class="login-logo inline mb-60">                                                             <img src="img/logo-alt.png" alt="" width="180">                                                             <h4 style="color: #fff;font-size: 30px;">Disnip</h4>                                                        </a>-->                        <!-- Nav tabs -->                        
                  <ul class="masonry-filter tab style-3 light text-uppercase mb-70">
                     <li class="active"><a href="#tab-login" data-toggle="tab">Login</a></li>
                     <li><a href="#tab-register" data-toggle="tab">Register</a></li>
                  </ul>
                  <?php if ($this->session->flashdata('lerror')) { ?>                            
                  <div class="container " >
                     <div class="col-md-6">
                        <div class="alert alert-danger errormessegefee " >                                        <button type="button" class="close" data-dismiss="alert">                                            <span aria-hidden="true">&times;</span>                                            <span class="sr-only">Close</span>                                        </button>                                        <strong style="color: '#fff';"><?php echo $this->session->flashdata('lerror'); ?></strong>                                    </div>
                     </div>
                  </div>
                  <?php } ?>                        <!-- Tab panes -->                        
                  <div class="tab-content">
                     <form role="form" action="<?php echo site_url('website/login/' . $this->uri->segment(3)); ?>" name="loginForm"  method="POST" id="tab-login" class="tab-pane matex-login text-center fade in active">
                        <div class="round-input light text-left mb-20">                                    <label for="user_email" class="block text-light fw300 fz-14 mb-10 ml-30">Username</label>                                    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-profile-male"></i></span>                                        <input class="text-light" type="text" name="user_email" id="user_email" placeholder="Enter User Email" autocomplete="off" required>                                    </span>                                </div>
                        <div class="round-input light text-left mb-20">                                    <label for="password" class="block text-light fw300 fz-14 mb-10 ml-30">Password</label>                                    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-lock"></i></span>                                        <input class="text-light" type="password" name="password" id="password" placeholder="Enter Password" autocomplete="off" required>                                    </span>                                </div>
                        <div class="text-center">                                    <span class="custom-checkbox light text-left inline mb-15">                                        <input type="checkbox" id="km_logged_in">                                        <label for="km_logged_in" class="fz12 fw300 text-white">Keep me logged in</label>                                    </span>                                </div>
                        <input type="submit" name="submit" value="Login" class="btn-flat btn-primary round text-uppercase " style="width: 100%" />                                <!--<input type="submit" name="submit" id="submit" value="Login" class="waves-effect btn-large btn-round text-uppercase w200 login-btn-cover" >-->                                
                        <p class="text-center mt-10"><a class="text-light fz-12" href="<?php echo site_url('website/forgot_pass/'); ?>">Forgot Password?</a></p>
                     </form>
                     <form role="form" action="<?php echo site_url('website/signup'); ?>" name="loginForm"  method="POST" id="tab-register" class="tab-pane matex-login text-center fade">
                        <div class="round-input light text-left mb-20">                                    <label for="user_name" class="block text-light fw300 fz-14 mb-10 ml-30">Username</label>                                    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-profile-male"></i></span>                                        <input class="text-light" type="text" name="user_name" id="user_name" placeholder="eg. User Name" autocomplete="off" required>                                    </span>                                </div>
                        <div class="round-input light text-left mb-20">                                    <label for="user_dob" class="block text-light fw300 fz-14 mb-10 ml-30">DOB</label>                                    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-calendar"></i></span>                                        <input class="text-light" type="date" name="user_dob" id="user_dob" placeholder="eg. DD/MM/YY" autocomplete="off" required>                                    </span>                                </div>

                        <div class="round-input light text-left mb-20">                                    <label for="user_dob" class="block text-light fw300 fz-14 mb-10 ml-30">Mobile Number</label>    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-phone"></i></span>    <input class="text-light" type="text" name="mobile_number"   placeholder="eg. 9090909090" autocomplete="off" required>
                         </span>  
                          </div>


                        <div class="round-input light text-left mb-20">                                    <label for="email" class="block text-light fw300 fz-14 mb-10 ml-30">Email Address</label>                                    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-envelope"></i></span>                                        <input class="text-light" type="email" name="user_email" id="email" placeholder="eg. info@dumymail.com" autocomplete="off" required>                                    </span>                                </div>
                        <div class="round-input light text-left mb-20">                                    <label for="password" class="block text-light fw300 fz-14 mb-10 ml-30">Password</label>                                    <span class="icon-input relative block">                                        <span class="icon fz-18 text-light"><i class="et-line icon-lock"></i></span>                                        <input class="text-light" type="password" name="user_password" id="password" placeholder="Password" autocomplete="off" required>                                    </span>                                </div>
                        <div class="text-center">                                    <span class="custom-checkbox light text-left inline">                                        <input type="checkbox" class="filled-in" name="check" id="check_tac" required="required">                                        <label for="check_tac" class="fz12 fw300 text-white">I agree to the Terms and Conditions</label>                                    </span>                                </div>
                        <input type="submit" name="submit" id="submit" value="Get Started" class="waves-effect btn-large btn-round text-uppercase w100">                            
                     </form>
                  </div>
               </div>
               <!-- end. page-login-wrapper -->                
            </div>
            <!-- end .col- -->            
         </div>
         <!-- end .row -->        
      </div>
      <!-- end .container -->    
   </section>
</main>
<!--  .site-content  -->

