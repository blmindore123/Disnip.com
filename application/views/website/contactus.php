
        <main id="main" class="site-content">
             <section id="contact" class="section-full gray-bg-3" style="background-image: url(http://disnip.com/assets/images/bglogin.jpg);  background-size: 100% 100%;">


                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-offset-2 col-md-8 getin-touch-box">
                            <div class="section-title style3 text-center">
                                <h2 class="text-uppercase" style="color: #fff;">Get in <b>Touch</b></h2>
                                <p><?php echo  $contactus[0]->contact_us_details ?></p>
                            </div>
                        </div>
                    </div> <!-- end .row -->
                </div>  <!-- end .container -->
                <div class="container">
                    <div class="row bottom-half mobile-info-box">
                        <div class="col-sm-4 bottom-margin">
                            <div class="contact-block dark text-center">
                                <h4 class="text-uppercase title-ls mb-30">Cell number</h4>
                                <p>Phone: <?php echo $contactus[0]->contact_no ?> </p>
                            </div>
                        </div>
                        <div class="col-sm-4 bottom-margin">
                            <div class="contact-block dark text-center">
                                <h4 class="text-uppercase title-ls mb-30">Address</h4>
                                <p><?php echo $contactus[0]->company_address ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4 bottom-margin">
                            <div class="contact-block dark text-center">
                                <h4 class="text-uppercase title-ls mb-30">Email support</h4>
                                <p>
                                    <a href="mailto:<?php echo $contactus[0]->company_email ?>" class="text-link"><?php echo $contactus[0]->company_email ?></a> 
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end .row -->
<?php if($this->session->flashdata('error')){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $this->session->flashdata('error'); ?></strong>
        </div>
    </div>
</div>
<?php } ?>
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
                    <form id="contact-form" class="row contact-form contact-form-box" method="post"  action="<?php echo site_url('website/contactus') ?>">
                        <div class="col-sm-6">
                            <div class="input-field">
                                <input id="name" name="contact_user_name" class="ml-input" type="text" autocomplete="off" required="">
                                <label for="name">Name*</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-field">
                                <input id="email" name="user_contact_email" class="ml-input" type="email" autocomplete="off" required="">
                                <label for="email">Email*</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-field">
                                <input id="phoneNumber" name="user_contact_phone" class="ml-input" type="text" autocomplete="off" required="">
                                <label for="phoneNumber">Phone Number*</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-field">
                                <input id="subject" name="user_contact_subject" class="ml-input" type="text" autocomplete="off" required="">
                                <label for="subject">Subject*</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-field">
                                <textarea id="message" name="user_contact_msg" class="materialize-textarea" autocomplete="off" required=""></textarea>
                                <label for="message">Message*</label>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-offset-4 col-md-4 text-center">
                            <div class="">
                                <input type="submit" class="waves-effect btn-large text-uppercase" name="submit" value="Submit" type="submit">
                            </div>
                            <div class="message-actions">
                                <div class="msg-success">Your message was sent successfully</div>
                                <div class="msg-error">Something went wrong, please try again later.</div>
                            </div>
                        </div>
                    </form>
                    <!-- end .row -->
                </div>
            </section>

        </main> <!--  .site-content  -->

 