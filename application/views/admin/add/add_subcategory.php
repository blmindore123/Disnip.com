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
             <?php if(!empty($subcategory_details)){ ?>Edit Sub-Category<?php } else { ?>Add Sub-Category<?php } ?>
             
        </div>
    </div>

    <div class="panel-body">
        <form <?php if(!empty($subcategory_details)){ ?>action="<?php echo site_url('admin/edit_subcategory'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_subcategory'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                                  <div class="form-group">
                <label class="control-label">Select Category</label>
                <select class=" form-control" id="product_category_id" name="s_category_id" onchange="get_filter_attributes(this.value);">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $value) { ?>
                                <option value="<?php if (!empty($value -> category_id)) {
                                    echo $value -> category_id; 
                                }?>" <?php if (!empty($value -> category_id) && !empty($subcategory_details[0] -> s_category_id)) {
        if ($value -> category_id == $subcategory_details[0] -> s_category_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> category_name; ?></option><?php } ?>
                                
                            </select>
            </div> <div class="form-group">
                <label class="control-label">Sub-Category Name</label>
                <input type="text" name="subcategory_name" <?php if(!empty($subcategory_details)){ ?>value="<?php echo $subcategory_details[0]->subcategory_name; } ?>" class="form-control" data-validate="required" placeholder="Sub-Category Name" />
            </div>
               <l            <div class="form-group">
<label class="control-label">Sub- Category Image</label>
               <?php if(!empty($subcategory_details) && !empty($subcategory_details[0]->subcategory_image)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/subcategory').'/'.$subcategory_details[0]->subcategory_image; ?>" height="90" width="90">
               
               <input type="hidden" name="subcategory_image" value="<?php echo $subcategory_details[0]->subcategory_image; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="subcategory_image" class="form-control" <?php if(!empty($subcategory_details) && !empty($subcategory_details[0]->subcategory_image)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
             <div class="form-group">
                <label class="control-label"> Sub-Category Description</label>
             <textarea class="form-control ckeditor" rows="10" name="subcategory_description"  data-validate="required"  placeholder=" Sub-Category Description "><?php if(!empty($subcategory_details)){ ?> <?php echo $subcategory_details[0]->subcategory_description ; } ?></textarea>
            </div>
          <br>
            <div class="form-group">
                <?php if(!empty($subcategory_details)){ ?>
                    <input type="hidden" name="subcategory_id" value="<?php echo $subcategory_details[0]->subcategory_id; ?>">
                <?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
