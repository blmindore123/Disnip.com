<select class=" form-control" id="ideal_for_id" name="ideal_for_id" data-placeholder="">
                                <option value="">Select Ideal For</option>
                                <?php foreach ($ideal_for as $value) { ?>
                                <option value="<?php if (!empty($value -> ideal_for_id)) {
                                    echo $value -> ideal_for_id; 
                                }?>" <?php if (!empty($value -> ideal_for_id) && !empty($product_details[0] -> ideal_for_id)) {
        if ($value -> ideal_for_id == $product_details[0] -> ideal_for_id) {echo "selected='selected'";
        }}
        ?>>
        <?php echo $value -> ideal_name; ?></option><?php } ?>
                                
                            </select>