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
             <?php if(!empty($product_details)){ ?>Edit Product<?php } else { ?>Add Product<?php } ?>
             
        </div>
    </div>
        
    <div class="panel-body">
        <form <?php if(!empty($product_details)){ ?>action="<?php echo site_url('admin/edit_product'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_product'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
               <div class="form-group">
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
            </div>
            <div class="form-group" id="subcat">
                <label class="control-label">Select Sub-Category</label>
                <select class=" form-control" id="product_subcategory_id" name="product_subcategory_id" >
                                <option value="1">Default Sub-Category</option>
                                <?php foreach ($subcategory as $value) { ?>
                                <option value="<?php if (!empty($value -> subcategory_id)) {
                                    echo $value -> subcategory_id; 
                                }?>" <?php if (!empty($value -> subcategory_id) && !empty($product_details[0] -> product_subcategory_id)) {
        if ($value -> subcategory_id == $product_details[0] -> product_subcategory_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> subcategory_name; ?></option><?php } ?>
                                
                            </select>
            </div>
            <div class="form-group">
                <label class="control-label">Product ID</label>
                <input type="text" name="p_id" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->p_id; } ?>" class="form-control" data-validate="required" placeholder="Product ID" />
            </div>
            <div class="form-group">
                <label class="control-label">Product Name</label>
                <input type="text" name="product_name" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_name; } ?>" class="form-control" data-validate="required" placeholder="Product Name" />
            </div>
              <div class="form-group">
                <label class="control-label">Product Cost</label>
                <input type="text" name="product_cost" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_cost; } ?>" class="form-control" data-validate="required" placeholder="Product Cost" />
            </div>
           
    
             <div class="form-group">
                <label class="control-label">Stock of Product</label>
                <input type="text" name="product_of_stock" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_of_stock; } ?>" class="form-control" data-validate="required" placeholder="Stock of Product" />
            </div>
          
           <div class="form-group">
                <label class="control-label">Discount Percent</label>
                <input type="number" max="100" min="0" name="product_discount_per" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_discount_per; } ?>" class="form-control" placeholder="Discount Percent" />
            </div>
            <div class="form-group">
               <label class="control-label">Product Image</label>
               <?php if(!empty($product_details) && !empty($product_details[0]->product_image)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/product').'/'.$product_details[0]->product_image; ?>" height="90" width="90">
               
               <input type="hidden" name="product_image" value="<?php echo $product_details[0]->product_image; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="product_image" class="form-control" <?php if(!empty($product_details) && !empty($product_details[0]->product_image)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
		   <div class="form-group">
                <label class="control-label">Product Aurthor</label>
                <input type="text" name="product_author" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_author; } ?>" class="form-control" data-validate="required" placeholder="Product Aurthor" />
            </div>
              <div class="form-group">
                <label class="control-label">Product Publication</label>
                <input type="text" name="product_publication" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_publication; } ?>" class="form-control" data-validate="required" placeholder="Product Publication" />
            </div>
           
    
             <div class="form-group">
                <label class="control-label">Edition of Product</label>
                <input type="text" name="product_edition" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_edition; } ?>" class="form-control" data-validate="required" placeholder="Edition of Product" />
            </div>
          
           <div class="form-group">
                <label class="control-label">Product Lanaguage</label>
                <input type="text"  name="product_language" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_language; } ?>" class="form-control" placeholder="Product Lanaguage" />
            </div>
			<div class="form-group">
                <label class="control-label">Terms & Conditions</label>
                <input type="text"  name="product_conditions" <?php if(!empty($product_details)){ ?>value="<?php echo $product_details[0]->product_conditions; } ?>" class="form-control" placeholder="Terms & Conditions" />
            </div>
            <!-- <div class="form-group">
                <label class="control-label"> Product Description</label>
             <textarea class="form-control ckeditor" rows="10" name="product_description"  data-validate="required"  placeholder=" Product Description "><?php if(!empty($product_details)){ ?> <?php echo $product_details[0]->product_description ; } ?></textarea>
            </div>-->
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
<script>
function get_filter_brand(brand_type_id)
      {
        //  alert(brand_type_id);
         $.ajax({
            'url' :'<?php echo site_url();?>/admin/get_brand_according_brand_type',
            'type':'POST',
            'data':{'brand_type_id':brand_type_id},
            'success' : function(data)
             { 

                document.getElementById('product_brand_id').innerHTML=data;

             }
            });
      }
function get_filter_ideal_for(brand_id)
{
  //  alert(brand_type_id);
   $.ajax({
      'url' :'<?php echo site_url();?>/admin/get_ideal_for_according_brand',
      'type':'POST',
      'data':{'brand_id':brand_id},
      'success' : function(data)
       { 

          document.getElementById('ideal_for_id').innerHTML=data;

       }
      });
}
function get_filter_attributes(category_id)
      {
          var subcat=$("#product_subcategory_id").val();
          //alert(category_id);
         $.ajax({
            'url' :'<?php echo site_url();?>/admin/get_attributes_by_category_id',
            'type':'POST',
            'data':{'category_id':category_id,'subcat':subcat},
            'success' : function(data)
             { 
                // alert(data);
                document.getElementById('subcat').innerHTML=data;

             }
            });
      }
</script>