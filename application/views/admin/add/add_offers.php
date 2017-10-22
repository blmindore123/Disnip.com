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
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
             <?php if(!empty($offer_details)){ ?>Edit Offers<?php } else { ?>Add Offers<?php } ?>
             
        </div>
    </div>
        
    <div class="panel-body">
        <form <?php if(!empty($offer_details)){ ?>action="<?php echo site_url('admin/edit_offers'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_offers'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
               <!--<div class="form-group">
                <label class="control-label">Select Category</label>
                <select class=" form-control" id="product_category_id" name="product_category_id" onchange="get_filter_attributes(this.value);">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $value) { ?>
                                <option value="<?php if (!empty($value -> category_id)) {
                                    echo $value -> category_id; 
                                }?>" <?php if (!empty($value -> category_id) && !empty($product_details[0] -> product_category_id)) {
        if ($value -> category_id == $product_details[0] -> product_category_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> category_name; ?></option><?php } ?>
                                
                            </select>
            </div>-->
         

            <div class="form-group">
                <label class="control-label">Offer Name</label>
                <input type="text" name="offer_name" <?php if(!empty($offer_details)){ ?>value="<?php echo $offer_details[0]->offer_name; } ?>" class="form-control" data-validate="required" placeholder=Offer Name" />
            </div>
              <div class="form-group">
                <label class="control-label">Offer type</label>
                <input type="text" name="offer_type" <?php if(!empty($offer_details)){ ?>value="<?php echo $offer_details[0]->offer_type; } ?>" class="form-control" data-validate="required" placeholder="Offer type" />
            </div>
           
    
             <div class="form-group">
                <label class="control-label">Offer Amount</label>
                <input type="text" name="offer_amount" <?php if(!empty($offer_details)){ ?>value="<?php echo $offer_details[0]->offer_amount; } ?>" class="form-control" data-validate="required" placeholder="Offer Amount" />
            </div>
          
           <div class="form-group">
                <label class="control-label">Offer start date</label>
              
                <input type="text" name="offer_created_date" id="start_date" data-end-date="-d" <?php if(!empty($offer_details)){ ?>value="<?php echo $offer_details[0]->offer_created_date; } ?>" class="form-control datepicker" placeholder="Offer start date" />
            </div>
       		<div class="form-group">
                <label class="control-label">Offer valid date</label>
                <input type="text" name="offer_valid_date" id="end_date" data-end-date="-d" <?php if(!empty($offer_details)){ ?>value="<?php echo $offer_details[0]->offer_valid_date; } ?>" class="form-control datepicker" placeholder="Offer valid date" />
            </div>
            <div class="form-group">
                <label class="control-label">Offer Code</label>
                <input type="text" name="offer_code" <?php if(!empty($offer_details)){ ?>value="<?php echo $offer_details[0]->offer_code; } ?>" class="form-control" data-validate="required" placeholder="Offer Code" />
               
            </div>
             <div class="form-group">
                <label class="control-label"> Offer Description</label>
             <textarea class="form-control ckeditor" rows="10" name="offer_description"  data-validate="required"  placeholder=" Offer Description "><?php if(!empty($offer_details)){ ?> <?php echo $offer_details[0]->offer_description ; } ?></textarea>
            </div>
          <br>
            <div class="form-group">
                <?php if(!empty($offer_details)){ ?>
                    <input type="hidden" name="offer_id" value="<?php echo $offer_details[0]->offer_id; ?>">
                <?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

 <script>
    	$(document).ready(
  		 function () {
	    	$( "#start_date" ).datepicker({
	      changeMonth: true,//this option for allowing user to select month
	      changeYear: true, //this option for allowing user to select from year range
	      yearRange:"-100:+0",
     	  dateFormat:"yy-mm-dd"
     	
	    });
	  	
	    
	  } ); 
	  $(document).ready(
	  function () {
	    $( "#end_date").datepicker({
	      changeMonth: true,//this option for allowing user to select month
	      changeYear: true, //this option for allowing user to select from year range
	       yearRange:"-100:+0",
     		dateFormat:"yy-mm-dd"
     		
     		
	    });
	    	
	    
	  });
	
 </script>
 
 