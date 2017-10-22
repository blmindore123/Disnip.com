                <label class="control-label">Select Sub-Category</label>
                <select class=" form-control" id="product_subcategory_id" name="product_subcategory_id" >
                                <option value="1">Default Sub-Category</option>
                                <?php foreach ($attributes_detail as $value) { ?>
                                <option value="<?php if (!empty($value -> subcategory_id)) {
                                    echo $value -> subcategory_id; 
                                }?>" <?php if (!empty($subcat_values) ) {
        if ($value -> subcategory_id == $subcat_values) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> subcategory_name; ?></option><?php } ?>
                                
                            </select>