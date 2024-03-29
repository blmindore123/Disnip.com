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
 <div class="panel-options">
            <a href="<?php echo site_url('admin/user_list'); ?>" class="btn btn-turquoise fa-arrow" style="color: #fff;">
               Back
            </a> 
        </div> 
    <div class="panel-heading">
        <div class="panel-title">
           
          <?php if(!empty($address_list)) echo $address_list['0']->user_name.' '. $address_list['0']->user_mobile_no;?>
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
                    <th>User Address name</th>
                    <th>user email</th>
                    <th>Address</th>
                    <th>Landmark</th>
                    <th>Pincode</th>
                    <th>City</th>
                 
                </tr>
            </thead>
			<tbody>
				
                <?php if (!empty($address_list)) {
               
                    $n = 1;
                    foreach ($address_list as $value) {
                        ?>
                        <tr>
                            <td style="width: 10%"><?php echo $n; ?></td>
                            <td><?php echo $value->user_name ?></td>
                            <td><?php echo $value->user_email ?></td>
                            <td><?php echo $value->address1.','.$value->address2 ?></td>
                            <td><?php echo $value->nearest ?></td>
                            <td><?php echo $value->user_pincode ?></td>
                            <td><?php echo $value->user_city ?></td>
                          
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>