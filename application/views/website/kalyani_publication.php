 <main id="main" class="site-content kalyani-publication-bg">
             
            <!-- /.page-header -->
           <section class="" style="background-image: url(http://disnip.com/assets/images/kalyanbg.jpeg);  background-size: 100% 100%;">
                 
                <div class="container">
                    <div class="row fullscreen medical-banner-content flex flex-middle" style="height: 385px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 medical-content z-index-5">
                            <h2 class="title-light">Now Available Kalyani Publication</h2>
                            <span class="sep"></span>
                            <p class="text-light mt-40"> You can buy new books of kalyani publication at best price.</p>
                             <p class="text-light mt-40">Benefits –</p>
                            <p>
                                <li class="text-light">You can buy any books of Kalyani publication.</li>
                                <li class="text-light">After read you can also sell on disNip at 40% of MRP.</li>
                                <li class="text-light">Your Kalyani Publication Books Search End Here.</li>
                           </p>
                            <!-- <a class="btn-large btn-white waves-effect btn-round mt-20 text-uppercase" href="#">Learn More</a>
                            <a class="btn-large btn-border light ml-10 btn-round waves-effect mt-20 text-uppercase" href="#">Contact Us</a> -->
                        </div>
                        <div class="col-xs-12 col-sm-6  col-md-6 ">
                            <?php if($this->session->flashdata('status')){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $this->session->flashdata('status'); ?></strong>
        </div>
    </div>
</div>
<?php } ?>
                            <div class="appointment-form">
                                
                                <h4 class="text-center">Kalyani Publication</h4>
                                
                                <form  method="post"  action="<?php echo site_url('website/kalyanipub') ?>">
                                     
                                    
                                    <div class="input-field">
                                        <input id="full_name" name="k_title" class="validate ml-input" type="text" required="">
                                        <label for="full_name" class="">Book title</label>
                                    </div>
                                    
                                    <div class="input-field">
                                        <input id="full_name" name="k_branch" class="validate ml-input" type="text"  required="">
                                        <label for="full_name" class="">Branch/Stream</label>
                                    </div>

                                    <div class="input-field">
                                        <input id="full_name" name="k_u_name" class="validate ml-input" type="text"  required="">
                                        <label for="phoneNumber" class="">Full Name</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="full_name" name="k_u_contact" class="validate ml-input" type="text"  required="">
                                        <label for="phoneNumber" class="">Mobile Number*</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="emai" name="k_u_email"  class="validate ml-input" type="email"  required="">
                                        <label for="email_address" class="">Email Address*</label>
                                    </div>
                                    
                                    <div class="input-field">
                                        <textarea id="messages" name="k_u_msg" class="materialize-textarea ml-input" required=""></textarea>
                                        <label for="messages" class="">Messages*</label>
                                    </div>
                                    
                                    <div class="form-submit text-center mt-30">
                                        <input value="Submit" name="submit" class="appointment_sub btn-large btn-primary" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.slider5 -->
            </section>
        </main> <!--  .site-content  -->
 