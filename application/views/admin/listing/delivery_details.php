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
            Order List
        </div>
     </div>

    <div id="user_list" class="panel-body">
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                $("#example-1").dataTable({
                	  "aaSorting": [[ 0, "desc" ]],
                    aLengthMenu: [
                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                    ]
                });
            });
        </script>

        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Order ID</th>
<!--                     <th>User ID</th>-->
                    <th>User Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                   
                    <th>Action</th>
                </tr>
            </thead>
			<tbody>
		<?php if (!empty($delivery_details)) {
			
                    $n = 1;
                    foreach ($delivery_details as $value) {
                        ?>
                            
                        <tr>
                            <td style="width: 8%"><?php echo $value->payment_id;  ?></td>
<!--                            <td><?php //echo $value->user_id; ?></td>-->
                            <td><?php echo $value->user_name; ?></td>
                             <td><?php echo $value->user_contact_no; ?></td>
                             <td style="width: 25%"><?php echo $value->delivery_add; ?></td>
                             <td><?php echo $value->payment_date; ?></td>
                             <td><?php echo $value->delivery_date; ?></td>
                       
                            <td style="width: 25%">
                               
                                <?php  $status = $value->delivery_status; ?>
                                <?php if($status!=4){?>
                                <?php if ($status == 1) { ?>
                                <!-- <a href="<?php echo site_url('admin/change_status') . '/delivery_id/' . $value->delivery_id; ?>/delivery/delivery_status/2/delivery_details/<?php echo $value->user_id;?>" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="modal" data-target="#modal-6">&nbsp;Pending &nbsp;</a> -->
                                 <a onclick="myFunction(<?php echo $value->user_id.','.$value->delivery_id ?>)" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="modal" data-target="#modal-6">&nbsp;Pending &nbsp;</a>
                                <?php } elseif ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/delivery_id/' . $value->delivery_id; ?>/delivery/delivery_status/3/delivery_details/<?php echo $value->user_id;?>" class="btn btn-info btn-sm btn-icon icon-left">&nbsp;Shipped &nbsp;</a>
                                <?php } elseif ($status == 3) { ?>
                                <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Delivered &nbsp;</a>
                               
                                <?php } }else{?>
                                	 <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">&nbsp;Cancelled &nbsp;</a>
                             <?php   }?>
                                 <a href="<?php echo site_url('admin/view_order_details').'/'.$value->delivery_id; ?>" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;View &nbsp;</a>
                                <!-- <a onClick="if(!confirm('Are you sure, You want delete this payment detials?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_delivery/delivery/delivery_id/' . $value->delivery_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a> -->
                               <?php if ($status !=3 && $status!=4) { ?>
                               	 <a onClick="if(!confirm('Are you sure, You want cancel this order?')){return false;}" href="<?php echo site_url('admin/change_status') . '/delivery_id/' . $value->delivery_id; ?>/delivery/delivery_status/4/delivery_details/<?php echo $value->user_id;?>" class="btn btn-danger btn-sm btn-icon icon-left">&nbsp;Cancel &nbsp;</a>
                       <!-- <a onClick="if(!confirm('Are you sure, You want cancel this order?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_delivery/delivery/delivery_id/' . $value->delivery_id.'/'.$value->user_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Cancel</a>  -->         <?php } ?>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>

<div class="modal fade" id="modal-6">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Shipper Details with Track ID</h4>
				</div>
				
				<div class="modal-body">
				
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="field-1" class="control-label">Shipper Name</label>
								
								<input type="text" class="form-control" id="field1" placeholder="Shipper Name" required="required" value="">
							</div>	
							
						</div>
						
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="field-2" class="control-label">Track Id</label>
								
								<input type="text" class="form-control" id="field2" placeholder="Track Id" required="required" value="">
							</div>	
						
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<input type="hidden" id="userid" name="userid" value="">
							<input type="hidden" id="deliverid" name="deliverid" value="">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info" onclick="save_shipper()">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<script>
	function myFunction(id,deliver_id){
		$("#userid").val(id);
		$("#deliverid").val(deliver_id);
		
	}
		</script>
		<script>
			function save_shipper(){
				
			var shipper_name=$("#field1").val();
			var track_id=$("#field2").val();
			var user_id=$("#userid").val();
			var deliverid=$("#deliverid").val();
			$.ajax({
                   url: '<?php echo site_url('admin/add_shipper');?>',
                    type: "POST",
                     data: {
                        'shipper_name': shipper_name,
                         'track_id':track_id,
                         'user_id':user_id,
                         'deliverid':deliverid
                     },
                    	 success: function (data) {	
                    	 	$("#modal-6").hide();
                  			location.reload(); 
                  }
                 });
		}
		</script>
		

<style >
	.btn-sm, .btn-group-sm > .btn {
  border-radius: 0;
  font-size: 12px;
  line-height: 1.5;
  padding: 5px 6px;
}
	
</style>