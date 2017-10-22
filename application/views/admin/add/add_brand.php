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
             <?php if(!empty($brand_details)){ ?>Edit Brand<?php } else { ?>Add Brand<?php } ?>
             
        </div>
    </div>
        
    <div class="panel-body">
        <form <?php if(!empty($brand_details)){ ?>action="<?php echo site_url('admin/edit_brand'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_brand'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Select Brand Type</label>
                <select class="form-control" id="brand_category_id" name="brand_category_id" data-placeholder="">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $value) { ?>
                                <option value="<?php if (!empty($value ->category_id)) {
                                    echo $value -> category_id; 
                                }?>" <?php if (!empty($value -> category_id) && !empty($brand_details[0] -> brand_category_id)) {
        if ($value -> category_id == $brand_details[0] -> brand_category_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> category_name; ?></option><?php } ?>
                                
                            </select>
            </div>
            
            <div class="form-group">
                <label class="control-label">Brand Name</label>
                <input type="text" name="brand_name" <?php if(!empty($brand_details)){ ?>value="<?php echo $brand_details[0]->brand_name; } ?>" class="form-control" data-validate="required" placeholder="Brand Name" />
            </div>
  		 <div class="form-group">
               <label class="control-label">Brand Image</label>
               <?php if(!empty($brand_details) && !empty($brand_details[0]->brand_image)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/brand').'/'.$brand_details[0]->brand_image; ?>" height="90" width="90">
               
               <input type="hidden" name="brand_image" value="<?php echo $brand_details[0]->brand_image; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="brand_image" class="form-control" <?php if(!empty($brand_details) && !empty($brand_details[0]->brand_image)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
          <br>
            <div class="form-group">
                <?php if(!empty($brand_details)){ ?>
                    <input type="hidden" name="brand_id" value="<?php echo $brand_details[0]->brand_id; ?>">
                <?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
