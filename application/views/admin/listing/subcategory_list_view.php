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
            Sub-Category List
        </div>
      <div class="panel-options">
            <a href="<?php echo site_url('admin/add_subcategory'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Sub-Category
            </a> 
        </div>
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
                    <th>Sub-Category name</th>
                    <th>Sub-Category image</th>
                    <th>Description</th>
                 	<th>Action</th>
                </tr>
            </thead>
			<tbody>
				<?php
                               
                   $subcategory_path = subcategory_image.'/';?> 	
                <?php if (!empty($subcategory_list)) {
                    $n = 1;
                    foreach ($subcategory_list as $value) {
                        ?>
                        <tr>
                            <td style="width: 10%"><?php echo $n; ?></td>
                               <td><?php echo $value->category_name; ?></td>
                            <td><?php echo $value->subcategory_name; ?></td>
                          
                           <td><img src="<?php echo $subcategory_path.$value->subcategory_image ?>" height="112" width="112"</td>
                            <td><?php echo $value->subcategory_description; ?></td>
                            <td style="width: 25%">
                               
                                <?php  $status = $value->subcategory_status; ?>
                            
                        <a href="<?php echo site_url('admin/edit_subcategory').'/'.$value->subcategory_id; ?>" ><i class="fa-pencil icon-blue"></i>
                                                       &nbsp;
                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/subcategory_id/' . $value->subcategory_id; ?>/subcategory/subcategory_status/2/subcategory_list" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Active&nbsp;</a>
                                <?php } elseif ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/subcategory_id/' . $value->subcategory_id; ?>/subcategory/subcategory_status/1/subcategory_list" class="btn btn-warning btn-sm btn-icon icon-left">Inactive</a>
                                <?php } ?>
                                <a onClick="if(!confirm('Are you sure, You want delete this user?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_subcategory/subcategory/subcategory_id/' . $value->subcategory_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>