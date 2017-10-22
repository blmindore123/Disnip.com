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
            Payment List
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
                    <th>User Name</th>
                    <th>Deliver Id</th>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Payment Type</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
			<tbody>
		<?php if (!empty($payment_details)) {
                    $n = 1;
                    foreach ($payment_details as $value) {
                        ?>
                        <tr>
                            <td style="width: 10%"><?php echo $n; ?></td>
                            <td><?php echo $value->user_name; ?></td>
                             <td><?php echo $value->payment_deliver_id; ?></td>
                             <td><?php echo $value->payment_amount; ?></td>
                             <td><?php echo $value->payment_transaction_id; ?></td>
                             <td><?php $type= $value->payment_type; 
                             	if($type=='1')
                             	{
                             		echo 'COD';
                             	}else if($type=='2')
                             	{
                             		echo 'PayuMoney';
                             	}?></td>
                              <td><?php echo $value->payment_date; ?></td>
                            <td style="width: 25%">
                               
                                <?php $status = $value->payment_status; ?>
                                <?php if ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/payment_id/' . $value->payment_id; ?>/payment/payment_status/2/payment_details" class="btn btn-warning btn-sm btn-icon icon-left">&nbsp;Pending&nbsp;</a>
                                <?php } elseif ($status == 1) { ?>
                                <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">Recieved</a>
                                <?php } ?>
                                <a onClick="if(!confirm('Are you sure, You want delete this payment detials?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_payment_details/payment/payment_id/' . $value->payment_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>