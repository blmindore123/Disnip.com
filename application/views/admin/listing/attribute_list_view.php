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
            Attribute List
        </div>
      <div class="panel-options">
            <a href="<?php echo site_url('admin/add_new_attributes'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Attribute
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

                    <th>Attribute name</th>
                    <th>Attribute value</th>
<!--                    <th>Attribute Brand</th>
                    <th>Attribute image</th>
                    <th>Description</th>-->
                 	<th>Action</th>
                </tr>
            </thead>
			<tbody>
				
                <?php if (!empty($attribute_list)) {
                    $n = 1;
                    foreach ($attribute_list as $value) {
                        ?>
                        <tr>
                            <td style="width: 10%"><?php echo $n; ?></td>
                            <td><?php echo $value->category_name; ?></td>
                            
                            <td><?php echo $value->attribute_name; ?></td>
                             <td><?php if (!empty($attribute_details)) {
                                    $name_array=array();
                                  foreach ($attribute_details as $r_val) {
                                 if($value->attribute_id==$r_val->attribute_id){
                                     $name_array[]=$r_val->attribute_value_name;
                                 }
                                 
                             } echo implode(',', $name_array); } ?></td>
                           
                            
                            <td style="width: 25%">
                               
                                <?php $status = $value->attribute_status; ?>
                            
                        <a href="<?php echo site_url('admin/edit_new_attributes').'/'.$value->attribute_id; ?>" ><i class="fa-pencil icon-blue"></i>
                                                       &nbsp;
                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/attribute_id/' . $value->attribute_id; ?>/attributes/attribute_status/2/attribute_list" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Active&nbsp;</a>
                                <?php } elseif ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/attribute_id/' . $value->attribute_id; ?>/attributes/attribute_status/1/attribute_list" class="btn btn-warning btn-sm btn-icon icon-left">Inactive</a>
                                <?php } ?>
                                <a onClick="if(!confirm('Are you sure, You want delete this attribut?')){return false;}" href="<?php echo site_url('admin/delete') . '/attribute_user/attributes/attribute_id/' . $value->attribute_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>
