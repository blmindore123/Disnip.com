 <main id="main" class="site-content kalyani-publication-bg">
             
            <!-- /.page-header -->
           <section class="" style="background-image: url(http://disnip.com/assets/images/maga.PNG);  background-size: 100% 100%;">
                 
                <div class="container">
                    <div class="row fullscreen medical-banner-content flex flex-middle" style="height: 385px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 medical-content z-index-5">
                            <h3 class="title-light">Subscribe and grab Your Favourite Magazine.
</h3>
                            <span class="sep"></span>
                            <p class="text-light mt-40">Benefits –</p>
                            <p>
                            <li class="text-light">All Magazines are Available.</li>
                            <li class="text-light">Your Magazines Search Ends Here.</li>
                            <li class="text-light">You do not Need to Wander Around and waste time,disNip is giving you all Magazines at your doorstep.</li>
                            <li class="text-light">ONCE – If you will be subscribing for once, we deliver one time.
CONTINIOUS – If you Choose for Continiously, We will send you the magazine continuously when its new edition will arrive. Before Delivery we wil Confirm from you.
</li>
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
                                
                                <h4 class="text-center">Subscribe for Magazines</h4>
                                
                                <form  method="post"  action="<?php echo site_url('website/bookonmagazin') ?>">
                                     
                                    
                                    <div class="input-field">
                                        <input id="full_name" name="m_title" class="validate ml-input" type="text" required="">
                                        <label for="full_name" class="">Magazine Name - </label>
                                    </div>
                                    
                                    

                                    <div class="input-field">
                                        <input id="full_name" name="m_name" class="validate ml-input" type="text"  required="">
                                        <label for="phoneNumber" class="">Full Name</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="full_name" name="m_contact" class="validate ml-input" type="text"  required="">
                                        <label for="phoneNumber" class="">Mobile Number*</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="emai" name="m_email"  class="validate ml-input" type="email"  required="">
                                        <label for="email_address" class="">Email Address*</label>
                                    </div>
                                    <div class="input-field">
                                        <textarea id="messages" name="m_msg" class="materialize-textarea ml-input" required=""></textarea>
                                        <label for="messages" class="">Messages*</label>
                                    </div>
                                    
                                    <div class="input-field">
                                        <select class="form-control" name="m_sub" required="required">
                                            <option value="">Subscription </option>
                                            <option value="One Time">One time</option>
                                            <option value="Continuous">Continuous</option>
                                          
                                        </select>
                                         
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
 