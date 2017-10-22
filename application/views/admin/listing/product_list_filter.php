<thead>
    <tr>
        <th>S. No.</th>
        <th>Category name</th>
        <th>Product name</th>
        <th>Product cost</th>
        <th>Stock</th>
        <th>Product image</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>

    <?php
    if (!empty($product_list)) {
        $n = 1;
        foreach ($product_list as $value) {
            ?>
            <tr> 	
                <td style="width: 10%"><?php echo $n; ?></td>
                <td><?php echo $value->category_name; ?></td>
                <td><?php echo $value->product_name; ?></td>
                <td><?php echo $value->product_cost; ?></td>
                <td><?php echo $value->product_of_stock; ?></td>
                <td><img src="<?php echo product_image . '/' . $value->product_image ?>" height="112" width="112"</td>
                <td style="width: 25%">

        <?php $status = $value->product_status; ?>

                    <a href="<?php echo site_url('admin/edit_product') . '/' . $value->product_id; ?>" ><i class="fa-pencil icon-blue"></i>
                        &nbsp;
                        <?php if ($status == 1) { ?>
                            <a href="<?php echo site_url('admin/change_status') . '/product_id/' . $value->product_id; ?>/product/product_status/2/product_list" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Active&nbsp;</a>
                        <?php } elseif ($status == 2) { ?>
                            <a href="<?php echo site_url('admin/change_status') . '/product_id/' . $value->product_id; ?>/product/product_status/1/product_list" class="btn btn-warning btn-sm btn-icon icon-left">Inactive</a>
        <?php } ?>
                        <a onClick="if (!confirm('Are you sure, You want delete this product?')) {
                                    return false;
                                }" href="<?php echo site_url('admin/delete') . '/delete_product/product/product_id/' . $value->product_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                </td>
            </tr>
        <?php $n = $n + 1;
    }
} ?>
</tbody>