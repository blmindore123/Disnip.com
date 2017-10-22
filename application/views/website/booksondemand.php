 
        <main id="main" class="site-content">
             
            <!-- /.page-header -->
           <section class="" style="background-image: url(http://disnip.com/assets/images/bglogin.jpg);  background-size: 100% 100%;">
                 
                <div class="container">
                    <div class="row fullscreen medical-banner-content flex flex-middle" style="height: 385px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 medical-content z-index-5">
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
                            <h2 class="title-light">Books On Demand</h2>
                            <span class="sep"></span>
                            <p class="text-light mt-40">You can buy anything related to your study on disNip at Books On Demand Service
<p class="text-light mt-40">Benefits – </p>
<p class="text-light mt-40"><li>No tension to Searching books, Project Work equipment’s, Magazines, and Many More.</li>
<li>You Order, We Provide. How we do it is our problem.</li></p>
                          
                        </div>
                        <div class="col-xs-12 col-sm-6  col-md-6 ">

                            <div class="appointment-form">
                                
                                <h4 class="text-center">Books on Demand</h4>
                                
                                <form  method="post"  action="<?php echo site_url('website/booksondemand') ?>">
                                     
                                    
                                    <div class="input-field">
                                        <input id="full_name" name="booksondemand_FirstName" class="validate ml-input" type="text" required="">
                                        <label for="full_name" class="">Full Name*</label>
                                    </div>
                                    
                                    <!-- <div class="input-field">
                                        <input id="full_name" name="booksondemand_LastName" class="validate ml-input" type="text"  required="">
                                        <label for="full_name" class="">Last  Name*</label>
                                    </div> -->
                                    <div class="input-field">
                                        <input id="full_name" name="booksondemand_phone" class="validate ml-input" type="text"  required="">
                                        <label for="phoneNumber" class="">Mobile Number*</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="emai" name="booksondemand_email"  class="validate ml-input" type="email"  required="">
                                        <label for="email_address" class="">Email Address*</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="text" name="booksondemand_msg"  class="validate ml-input" type="text"  required="">
                                        <label for="booksondemand_msg" class="">Books Name / Details*</label>
                                    </div>
                                     <label for="books_conditions"  class="">Condtions*</label>
                                    <div class="input-field">
                                        
                                         <select class="form-control input-sm" placeholder="Conditions" name="books_conditions">
                                             
                                            <option value="New">New</option>
                                            <option value="Used">Used</option></select>
                                    </div>

                                    <label for="books_language"  class="">Language*</label>
                                    <div class="input-field">
                                        
                                         <select class="form-control input-sm" placeholder="Conditions" name="books_language">
                                          <option value="hindi">Hindi</option>
                                          <option value="english">English</option>
                                        </select>
                                    </div>
                                    
                                    <div class="input-field">
                                        <textarea id="messages" name="shipping_address"  class="materialize-textarea ml-input"  required=""></textarea>
                                        <label for="shipping_address"  class="">Shipping Address(Only Collage Campus)*</label>
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
 