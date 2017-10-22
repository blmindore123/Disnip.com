<style>
    #category_list{
    float: right;
    width: 137px;
    height: 27px;
    padding: 0px;
    margin-right:10px;
}
</style>

<?php if ($this->session->flashdata('status')) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->flashdata('status'); ?></strong>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>
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
<div class="panel panel-default">

    <div class="panel-heading">
        <div class="panel-title">
            Product List
        </div>
        <div class="panel-options pull-right">
            <a href="<?php echo site_url('admin/add_product'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Product
            </a> 
        </div>
        <?php if(!empty($categoryList)){ ?>
        
        <select class="form-control" id="category_list">
                <option value="" onclick='location.href="<?php echo site_url(); ?>/admin/product_list"'>--All Category--</option>
                <?php foreach ($categoryList as $key => $value) { ?>
                <option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
                <?php } ?>
            </select>
        <?php } ?>
        <p class="pull-right" style="font-size:13px; padding-right: 10px; margin-top: 5px; color:#333;">Filter:</p>
      
    </div>

    <div id="user_list" class="panel-body">
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                $("#example-1").dataTable({
                    aLengthMenu: [
                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                    ]
                });
            });
        </script>

        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Category name</th>
                    <th>Sub-Category</th>
                    <th>P ID</th>
                    <th>Product name</th>
                     <th>Product cost</th>
                     <td>Stock</td>
                    <th>Product image</th>
<!--                     <th>Ideal For</th>-->
                 	<th>Action</th>
                </tr>
            </thead>
			<tbody>
				
                <?php if (!empty($product_list)) {
                    $n = 1;
                    foreach ($product_list as $value) {
                        ?>
                        <tr> 	
                            <td style="width: 4%"><?php echo $n; ?></td>
                            <td><?php echo $value->category_name; ?></td>
                          <td><?php if($value->product_subcategory_id==0){echo 'No sub-Category';}else{  echo $value->subcategory_name;} ?></td>
                          <td><?php echo $value->p_id; ?></td>
                            <td><?php echo $value->product_name; ?></td>
                            <td><?php echo $value->product_cost; ?></td>
                             <td><?php echo $value->product_of_stock; ?></td>
                           <td><img src="<?php echo product_image.'/'.$value->product_image ?>" height="112" width="112"</td>
<!--                            <td><?php // echo $value->ideal_name; ?></td>-->
                            <td style="width: 25%">
                               
                                <?php $status = $value->product_status; ?>
                            
                        <a href="<?php echo site_url('admin/edit_product').'/'.$value->product_id; ?>" ><i class="fa-pencil icon-blue"></i>
                                                       &nbsp;
                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/product_id/' . $value->product_id; ?>/product/product_status/2/product_list" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Active&nbsp;</a>
                                <?php } elseif ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/product_id/' . $value->product_id; ?>/product/product_status/1/product_list" class="btn btn-warning btn-sm btn-icon icon-left">Inactive</a>
                                <?php } ?>
                                <a onClick="if(!confirm('Are you sure, You want delete this product?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_product/product/product_id/' . $value->product_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>
<script>  
	$("#category_list").change(function() {
	var category_id = $('#category_list').val();
	$.ajax({'url': '<?php echo site_url(); ?>/admin/product_list_filter',
	'type': 'POST',
	'data': {'category_id': category_id},
	'success': function(data)
	{	
	$("#example-1").html(data);
	}
	});
	});
    </script>  