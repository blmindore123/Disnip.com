                <main id="main" class="site-content">           <section class="section-login-register parallax-bg half-bg" style="background-image: url('img/slider/login-bg-2.jpg');">                               <span class="overlay" style="background-color: rgb(0, 0, 0); opacity: 0.4;"></span>                <div class="container">                                              <div class="row flex flex-middle fullscreen disable-fullscreen-xs disable-flex-xs relative" style="height: 396px;">                                                          <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">                            <div class="page-login-wrapper flex-grow text-center"><!--                                <a href="index.html" class="login-logo inline mb-60">                                     <img src="img/logo-alt.png" alt="" width="180">                                     <h4 style="color: #fff;font-size: 30px;">Disnip</h4>                                </a>-->                                <!-- Nav tabs -->                                <ul class="masonry-filter tab style-3 light text-uppercase mb-70">                                                                        <li class="active"><a href="#tab-register" data-toggle="tab" aria-expanded="true">Forgot Password</a></li>                                </ul>                                            <?php if ($this->session->flashdata('lerror')) { ?>                            <div class="container " >                                <div class="col-md-6">                                    <div class="alert alert-danger errormessegefee " >                                        <button type="button" class="close" data-dismiss="alert">                                            <span aria-hidden="true">&times;</span>                                            <span class="sr-only">Close</span>                                        </button>                                        <strong style="color: '#fff';"><?php echo $this->session->flashdata('lerror'); ?></strong>                                    </div>                                </div>                            </div>                        <?php } ?>                          <!-- Tab panes -->                                <div class="tab-content">                                                                        <form role="form" action="<?php echo site_url('website/forgot_pass/'); ?>" name="loginForm" method="POST" id="tab-register" class="tab-pane matex-login text-center fade active in">                                                                                <div class="round-input light text-left mb-20">                                            <label for="email" class="block text-light fw300 fz-14 mb-10 ml-30">Mobile No.</label>                                            <span class="icon-input relative block">                                                <span class="icon fz-18 text-light"><i class="et-line icon-lock"></i></span>                                                <input class="text-light" name="user_email" id="email" placeholder="eg. 9876543210" autocomplete="off" required="" type="number" >                                            </span>                                        </div>                                                                                <div class="text-center">                                            <span class="custom-checkbox light text-left inline">                                               <a href="#">Resend?</a>                                            </span>                                        </div>                                        <i class="waves-effect btn-large btn-round text-uppercase w100 waves-input-wrapper" style=""><input name="submit" id="submit" value="Send" class="waves-button-input" type="submit"></i>                                    </form>                                </div>                            </div> <!-- end. page-login-wrapper -->                        </div> <!-- end .col- -->                    </div> <!-- end .row -->                </div> <!-- end .container -->            </section>        </main> <!--  .site-content  -->     