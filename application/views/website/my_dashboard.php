 
        <main id="main" class="mb-80 mt-80">
      


            <section class="">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-3 mb-50">
                            <aside class="z-depth-1">
                                <ul class="shop-dashboard-nav fw300">
                                    <li class="flex flex-middle active">
                                        <a href="#shop-acc-details" data-toggle="tab"><i class="fz-16 mr-15 fa fa-user"></i>Account Details</a>
                                    </li>
                                  <!--   <li class="flex flex-middle">
                                        <a href="#shop-orders" data-toggle="tab"><i class="fz-16 mr-15 fa fa-spinner"></i> Orders</a>
                                    </li> -->
                                   
                                    <li class="flex flex-middle">
                                        <a href="#shop-addresses" data-toggle="tab"><i class="fz-16 mr-15 fa fa-unlock-alt"></i> Change Password</a>
                                    </li>
                                    
                                    <li class="flex flex-middle ">
                                        <a href="<?php echo site_url('website/logout'); ?>" ><i class="fz-16 mr-15 fa fa-sign-out"></i>Logout</a>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-xs-12 col-md-9">
                            <div class="tab-content">
                                
                                 
                               
                                <div id="shop-addresses" class="tab-pane fade">
                                    <div class="col-xs-12 mt-30">
                                                <h5 class="fw400 mb-25">Change Password</h5>
                                            </div>
                                            <form action="<?php echo site_url('website/change_password'); ?>" method="post" onsubmit="return myFunction()" id="changePass">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="input-field">
                                                    <input type="password" name="old_pass" id="old_pass" class="ml-input" value="">
                                                      <input type="hidden" name="user_id" id="user_id" class="ml-input" 
                                                        value="<?php if(!empty($user)){ echo $user[0]->user_id;   } ?>">
                                                    <label for="old_pass" class="ttn">Enter Your old Password</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-7">
                                                <div class="input-field">
                                                    <input type="password" name="new_pass" id="new_pass" class="ml-input" value="">
                                                    <label for="new_pass" class="ttn">Enter Your New Password</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-7">
                                                <div class="input-field">
                                                    <input type="password" name="confirm_pass" id="confirm_pass" class="ml-input" value=""> 
                                                    <label for="confirm_pass" class="ttn">Re-Enter Your New Password</label>
                                                </div>
                                            </div> 

                                            <div class="col-xs-12 ">
                                                <button type="submit" class="btn btn-md waves-effect waves-light btn-light-dark text-uppercase" value="submit" name="submit">Save Changes</button>
                                            </div>
                                     </form>
                                </div> <!-- end #shop-addresses -->
                                <div id="shop-acc-details" class="tab-pane fade row in active ">
                                    <div class="col-xs-12">
                                        <div class="shop-db-title gray-bg-3">
                                            <h4 class="fw400">Edit Account Details</h4>
                                        </div>
                                    </div>
                                    <form action="<?php echo site_url('website/mydashboard'); ?>" method="post" class="col-xs-12 col-lg-offset-1 col-lg-10 mt-40">
                                    <div class="row">
                                     <?php if($this->session->flashdata('status')){ ?>
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
                                        <h5 class="fw400 mb-25">General Informations</h5>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="input-field">
                                                    <input type="text" name="user_name" id="user_name" class="ml-input" 
                                                        value="<?php if(!empty($user)){ echo $user[0]->user_name;   } ?>">
                                                        <input type="hidden" name="user_id" id="user_id" class="ml-input" 
                                                        value="<?php if(!empty($user)){ echo $user[0]->user_id;   } ?>">
                                                    <label for="user_name" class="ttn">Full Name</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="input-field">
                                                    <input type="text" name="user_dob" id="user_dob" class="ml-input"
                                                     value="<?php if(!empty($user)){ echo $user[0]->user_dob;   } ?>">
                                                    <label for="user_dob" class="ttn">Date of Birth</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="input-field">
                                                    <input readonly type="email" name="user_email" 
                                                    id="user_email" class="ml-input"
                                                    value="<?php if(!empty($user)){ echo $user[0]->user_email;   } ?>" >
                                                    <label for="user_email" class="ttn">Email Address</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="input-field">
                                                    <input type="text" name="user_contact_no" id="user_contact_no" min="10" class="ml-input"
                                                    value="<?php if(!empty($user)){ echo $user[0]->user_contact_no;   } ?>">
                                                    <label for="db__email" class="ttn">Mobile Number</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-12 text-right">
                                                <button type="submit" class="btn btn-md waves-effect waves-light btn-light-dark text-uppercase" name="submit" value="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end #shop-acc-details -->
                               

                            </div> <!-- end .tab-content -->
                        </div> <!-- end .col-md-9 -->
                    </div> <!-- /.row -->
                </div> <!-- /.contianer -->
            </section>
            <!-- /.section-full -->
        </main> <!--  .site-content  -->

         <script>
function myFunction() {
    var pass1 = document.getElementById("new_pass").value;
    var pass2 = document.getElementById("confirm_pass").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("new_pass").style.borderColor = "#E34234";
        document.getElementById("confirm_pass").style.borderColor = "#E34234";
        ok = false;
    }
    else {
       
    }
    return ok;
}
         </script>

 