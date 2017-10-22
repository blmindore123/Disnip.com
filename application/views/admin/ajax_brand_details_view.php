<select class=" form-control" id="product_brand_id" name="product_brand_id" data-placeholder="">
                                <option value="">Select Brand</option>
                                <?php foreach ($brand as $value) { ?>
                                <option value="<?php if (!empty($value ->brand_id)) {
                                    echo $value -> brand_id; 
                                }?>" <?php if (!empty($value -> brand_id) && !empty($product_details[0] -> product_brand_id)) {
        if ($value -> brand_id == $product_details[0] -> product_brand_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> brand_name; ?></option><?php } ?>
                                
                            </select>