<?php //$data['mypost_project']=$postrecords;

				//		$data['mybid_project']=$bidrecords;

					//	$data['myactivity']=$my_activity;

         // echo "<pre>";

            

            ?>


<div class="clearfix"></div>

<div class="dashboard-wrap" id="dashboard">

   <div class="hundredpixel"></div>

   <!--about con-->

   <div id="" class="section_padding2">

      <div class="container">

         <?php if($this->session->flashdata('success')){ ?>

         <div class="row">

            <div class="col-md-12">

               <div class="alert alert-success">

                  <button type="button" class="close" data-dismiss="alert">

                  <span aria-hidden="true">&times;</span>

                  <span class="sr-only">Close</span>

                  </button>

                  <strong><?php echo $this->session->flashdata('success'); ?></strong>

               </div>

            </div>

         </div>

         <?php } ?>

         <div class="single_about">

            <div class="row">

               <div class="col-sm-12  wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                  <ul class="nav menu-tabs " role="tablist">

                  <li <?php if($this->uri->segment(1) == 'Profile' ){?> class="active" <?php } ?>><a href="<?php echo base_url('Profile');?>" >Profile</a></li>

                   <li  <?php if($this->uri->segment(1) == 'Dashboard' || $this->uri->segment(2) == 'searchcategory' ){?> class="active" <?php } ?>><a href="<?php echo base_url('Dashboard'); ?>" >Browse</a></li>

                  <li <?php if($this->uri->segment(1) == 'My-Activity' ){?> class="active" <?php } ?> ><a href="<?php echo base_url('My-Activity'); ?>" >My Activity</a></li>

                        <li <?php if($this->uri->segment(1) == 'My-Contact' ){?> class="active" <?php } ?> ><a href="<?php echo base_url('My-Contact'); ?>" >My Contacts</a></li>                        <li  ><a href="#settings" >Certification</a></li>

                     

                        <li class="post-project-buttoncllass" ><a href="<?php echo base_url('Post-Project'); ?>" >Post Project</a></li>

                  </ul>

               </div>

            </div>

         </div>

 





         <div class="myativity-main-box" name="C4">

            

            <div class="already-havedone-bids">

               <div class="main-box clearfix ">

                 
         <div class="contacts-conteine-box">
            <script src="https://use.fontawesome.com/45e03a14ce.js"></script>
<div class="main_section">
   <div class="">
      <div class="chat_container">
         <div class="col-sm-3 chat_sidebar">
       <div class="row">
            <div id="custom-search-input">
               <div class="input-group col-md-12">
                  <input type="text" class="  search-query form-control" placeholder="Conversation" />
                  <button class="btn btn-danger" type="button">
                  <span class=" glyphicon glyphicon-search"></span>
                  </button>
               </div>
            </div>
            
            <div class="member_list">
               <ul class="list-unstyled"><?php if(!empty($mycontact)){ ?>
               <?php foreach($mycontact as $mycontact_res){
				    if($this -> session -> userdata('user_id')==$mycontact_res->project_customerID){
						$cont_id=$mycontact_res->contact_id;
					}else{
						$cont_id=$this -> session -> userdata('user_id');}
					 ?>
          <li class="left clearfix" onclick="checkproject('<?php echo $mycontact_res->project_id;?>','<?php echo $cont_id;?>');">
                     <span class="chat-img pull-left">
                     <img src="<?php if(!empty($mycontact_res->user_profile_pic)) { echo $mycontact_res->user_profile_pic; }else{ echo dummy_image; } ?>" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font"><?php echo $mycontact_res->user_firstname ?></strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                      <div class="contact_sec">
                           <strong class="primary-font"><?php echo $mycontact_res->project_name ?></strong> 
                           <span class="badge pull-right">3</span>
                        </div>
                     </div>
</li><?php } } ?>
                 <!-- <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jack Sparrow</strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> 
                        </div>
                     </div>
                  </li>
                  <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jack Sparrow</strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> 
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                    <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jack Sparrow</strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> 
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jack Sparrow</strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> 
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                    <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jack Sparrow</strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> 
                        </div>
                     </div>
                  </li>
                          <li class="left clearfix">
                     <span class="chat-img pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">Jack Sparrow</strong> 
                           <span class="pull-right">
                           09:45AM</span>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> 
                        </div>
                     </div>
                  </li>-->
               </ul>
            </div></div>
         </div>
         <!--chat_sidebar-->
       
       
         <div class="col-sm-6 message_section">
       <div class="row">
       <div class="new_message_head">
       <div class="pull-left"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div>

     
       </div><!--new_message_head-->
       
       <div class="chat_area">
       <ul class="list-unstyled">
       <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  <div class="chat_time pull-right">09:40PM</div>
                     </div>
                  </li>
               <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  <div class="chat_time pull-right">09:40PM</div>
                     </div>
                  </li>
                     <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  <div class="chat_time pull-right">09:40PM</div>
                     </div>
                  </li>
              <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  <div class="chat_time pull-left">09:40PM</div>
                     </div>
                  </li>
                  <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  <div class="chat_time pull-left">09:40PM</div>
                     </div>
                  </li>
              
            
       
       
       </ul>
       </div><!--chat_area-->
          <div class="message_write">
       <textarea class="form-control" placeholder="type a message"></textarea>
       <div class="clearfix"></div>
       <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
 Add Files</a>
 <a href="#" class="pull-right btn btn-success">
 Send</a></div>
       </div>
       </div>
         </div> <!--message_section-->

         <div class="col-sm-3 project_infobox-onmycon">
            <h3 id='pro_name_contact'><?php if($pro_name){echo $pro_name;}?></h3>
            <span id='pro_currency_code'><?php if($currency_code){echo $currency_code;}?></span>
            <p id='pro_disp'><?php   if($project_description){echo $project_description;}?></p>
          <p id='status_action'>		  <?php if(empty($project_user) && empty($award_user_id)){			  			  		  }else{		  if($this -> session -> userdata('user_id')==$project_user){ 
			 if($award_status==1){
				 ?><a href="javascript:void(0)"   class="btn btn-success" >Pending</a>
				 <?php }else if($award_status==2){?><a href="javascript:void(0)" class="btn btn-success">Accepted</a><?php }elseif($award_status==3){ ?><a href="javascript:void(0)" class="btn btn-danger">Rejected</a><?php }}elseif($this -> session -> userdata('user_id')==$award_user_id && $award_status==1 ){ ?> <a href="javascript:void(0)"  onclick=" if(confirm('Are you sure you want to accept this project?')) updateawardsts(<?php echo $pro_id ?>,2)" class="btn btn-success">Accept</a> <a href="javascript:void(0)"  onclick="if(confirm('Are you sure you want to reject this project?')) updateawardsts(<?php echo $pro_id ?>,3)" class="btn btn-danger">Reject</a><?php }if($award_status==2){?><a href="<?php echo base_url('Post-Project'); ?>" class="btn btn-danger">Request for milestone</a> <?php }}?></p>
           
         </div>
      </div>
   </div>
</div>
         </div>

                

               </div>

            </div>

         </div>

      </div>

   </div>

</div>



