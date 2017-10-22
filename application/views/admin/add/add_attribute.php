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
<script>
                        $(document).ready(function()
                        {
                         
                            $("#attribute_category_id").change(function()
                            {
                                  
                                var id=$(this).val();
                           
                                $.ajax({
                                 url: "<?php echo site_url('admin/get_product'); ?>", 
				 	 method: "POST",
				 	data: {category_id:id},
                                        success: function(result)
                                        {
                                          $("#attribute_product_id").html(result);
                                        }
                                });
                            });
                        });    
                </script>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
             <?php if(!empty($attribute_details)){ ?>Edit Attribute<?php } else { ?>Add Attribute<?php } ?>
             
        </div>
    </div>
     
    <div class="panel-body">
        <form <?php if(!empty($attribute_details)){ ?>action="<?php echo site_url('admin/edit_attribute'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_attribute'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
               <div class="form-group">
                <label class="control-label">Select Category</label>
                <select class=" form-control" id="attribute_category_id" name="attribute_category_id" data-placeholder="">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $value) { ?>
                                <option value="<?php if (!empty($value -> category_id)) {
                                    echo $value -> category_id; 
                                }?>" <?php if (!empty($value -> category_id) && !empty($attribute_details[0] -> attribute_category_id)) {
        if ($value -> category_id == $attribute_details[0] -> attribute_category_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> category_name; ?></option><?php } ?>
                                
                            </select>
            </div>
              <div class="form-group">
                <label class="control-label">Select Product</label>
                <select class=" form-control" id="attribute_product_id" name="attribute_product_id" data-placeholder="">
                                <option value="">Select Product</option>
                               
               </select>
            </div>
            <div class="form-group">
                <label class="control-label">Attribute Name</label>
                <input type="text" name="attribute_name" <?php if(!empty($attribute_details)){ ?>value="<?php echo $attribute_details[0]->attribute_name; } ?>" class="form-control" data-validate="required" placeholder="Attribute Name" />
            </div>
            <div class="form-group">
                <label class="control-label">Attribute Brand</label>
                <input type="text" name="attribute_brand" <?php if(!empty($attribute_details)){ ?>value="<?php echo $attribute_details[0]->attribute_brand; } ?>" class="form-control" data-validate="required" placeholder="Attribute Brand" />
            </div>
             
             <div class="form-group">
                <label class="control-label">Attribute Quantity</label>
                <input type="text" name="attribute_quantity" <?php if(!empty($attribute_details)){ ?>value="<?php echo $attribute_details[0]->attribute_quantity; } ?>" class="form-control" data-validate="required" placeholder="Attribute Quantity" />
            </div>
             <div class="form-group">
                <label class="control-label">Attribute Unit Price</label>
                <input type="text" name="attribute_price" <?php if(!empty($attribute_details)){ ?>value="<?php echo $attribute_details[0]->attribute_price; } ?>" class="form-control" data-validate="required" placeholder="Attribute unit price" />
            </div>
             <div class="form-group">
                <label class="control-label">Attribute Delivery Cost</label>
                <input type="text" name="attribute_delivery_cost" <?php if(!empty($attribute_details)){ ?>value="<?php echo $attribute_details[0]->attribute_delivery_cost; } ?>" class="form-control" data-validate="required" placeholder="Attribute Delivery Cost" />
            </div>
            <div class="form-group">
               <label class="control-label">Attribute Image</label>
               <?php if(!empty($attribute_details) && !empty($attribute_details[0]->attribute_image)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/attribute').'/'.$attribute_details[0]->attribute_image; ?>" height="90" width="90">
               
               <input type="hidden" name="attribute_image" value="<?php echo $attribute_details[0]->attribute_image; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="attribute_image" class="form-control" <?php if(!empty($attribute_details) && !empty($attribute_details[0]->attribute_image)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
             <div class="form-group">
                <label class="control-label"> Attribute Description</label>
             <textarea class="form-control ckeditor" rows="10" name="attribute_description"  data-validate="required"  placeholder=" Attribute Description "><?php if(!empty($attribute_details)){ ?> <?php echo $attribute_details[0]->attribute_description ; } ?></textarea>
            </div>
          <br>
            <div class="form-group">
                <?php if(!empty($product_details)){ ?>
                    <input type="hidden" name="product_id" value="<?php echo $product_details[0]->product_id; ?>">
                <?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
