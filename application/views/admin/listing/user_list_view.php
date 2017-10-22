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
            User List
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                   
                    <th>Action</th>
                </tr>
            </thead>



            <tbody>
                <?php if (!empty($user_list)) {
               $n = 1;
                    foreach ($user_list as $value) {
                        ?>
                        <tr>
                            <td style="width: 10%"><?php echo $n; ?></td>
                            <td><?php echo $value->user_name; ?></td>
                            <td><?php echo $value->user_email; ?></td>
                            <td><?php echo $value->user_contact_no; ?></td>
                          	
                            <td style="width: 30%">
                               
                                <?php $status = $value->user_status; ?>
                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/user_id/' . $value->user_id; ?>/user/user_status/2/user_list" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Active&nbsp;</a>
                                <?php } elseif ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/user_id/' . $value->user_id; ?>/user/user_status/1/user_list" class="btn btn-warning btn-sm btn-icon icon-left">Suspend</a>
                                <?php } ?>
                                <a href="<?php echo site_url('admin/view_user_address').'/'.$value->user_id; ?>" class="btn btn-info btn-sm btn-icon icon-left">&nbsp;Address&nbsp;</a>
                                <a onClick="if(!confirm('Are you sure, You want delete this user?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_user/user/user_id/' . $value->user_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>
<script>
	function check_address()
	{
		alert("No address added by user");
	}
</script>