<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Untitled Document</title><?php if ($this->session->flashdata('status')) { ?>    <div class="row">        <div class="col-md-12">            <div class="alert alert-success">                <button type="button" class="close" data-dismiss="alert">                    <span aria-hidden="true">&times;</span>                    <span class="sr-only">Close</span>                </button>                <strong><?php echo $this->session->flashdata('status'); ?></strong>            </div>        </div>    </div><?php } ?><?php if ($this->session->flashdata('error')) { ?>    <div class="row">        <div class="col-md-12">            <div class="alert alert-danger">                <button type="button" class="close" data-dismiss="alert">                    <span aria-hidden="true">&times;</span>                    <span class="sr-only">Close</span>                </button>                <strong><?php echo $this->session->flashdata('error'); ?></strong>            </div>        </div>    </div><?php } ?><script type="text/javascript">    function PrintDiv() {        var divContents = $("#current_page").html();       	var printWindow = window.open('', '', 'height=200,width=400');        printWindow.document.write('<html><head><title>Order Detail</title>');        printWindow.document.write('</head><body >');        printWindow.document.write(divContents);        printWindow.document.write('</body></html>');        printWindow.document.close();        printWindow.print();           }</script><style>	.dl-horizontal dt{text-align: left; margin-bottom:5px;}</style></head><body bgcolor="#f1f1f1">	  <div class="btn btn-warning pull-right" onclick="PrintDiv()">            <i class="fa fa-print"></i> Print        </div>        <table cellpadding="0" cellspacing="0" width="600" style="background:#fff; border:1px solid #cbcbcb; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:12px;" id="current_page">	<thead class="header">    	<tr>        	<td style="background:#fff; height:62px; width:100%; padding:5px; border-bottom:1px solid #DDD;" valign="middle">            	<a href="#" style="margin-left:10px;"><img width="150" src="<?php echo adminlogo?>" alt="..."/></a>            </td>        </tr>    </thead>    <tbody style=" border-bottom:1px solid #ddd;">    	<tr>        	<td style="padding:10px 15px;">            	<h2 style="margin-bottom:0px; color:#8162B2;">View Order Details</h2>            	<p><strong style="width:120px;">User Name :</strong> <?php echo $delivery_details[0]->user_name; ?></p>                <p><strong>Contact Number :</strong> <?php echo $delivery_details[0]->user_contact_no; ?></p>                <p><strong>Deliver Address :</strong> <?php echo $delivery_details[0]->delivery_add; ?></p>                <p><strong>Order ID :</strong> <?php echo $order_details[0]->order_id; ?></p>                <p><strong>Transection ID :</strong> <?php echo $delivery_details[0]->payment_transaction_id; ?></p>                <p><strong>Order Date :</strong> <?php echo date('d-m-Y H:i:s', strtotime($delivery_details[0]->payment_date)); ?></p>                <p><strong>Payment type :</strong> Cash On Delivery</p>                <p><strong>Order Delivery Date:</strong> <?php echo date('d-m-Y H:i:s', strtotime($delivery_details[0]->delivery_date)); ?></p>                <?php if($delivery_details[0]->deliver_shipper_name!=''){?>                 <p><strong>Shipper Name :</strong> <?php echo $delivery_details[0]->deliver_shipper_name; ?></p>                  <p><strong>Track Id :</strong> <?php echo $delivery_details[0]->shipper_track_id; ?></p><?php }?>                </br>                </td>            </td>        </tr>        <tr>        	<td>            	<table style="margin:0 auto; border:1px solid #DDD;" border="0" cellpadding="0" cellspacing="0" width="100%">                	<thead>                    	<tr>                        	<td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#eee; color:#333;"><strong>S. No.</strong></td>                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#eee; color:#333;">                            <strong>Product Name</strong></td> <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#eee; color:#333;">                            <strong>Product ID</strong></td>                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#eee; color:#333;">                            <strong>Quantity</strong></td>                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#eee; color:#333;"><strong>Price</strong></td>                            <td style="border-bottom:1px solid #ddd; padding:10px;  background:#eee; color:#333;"><strong>Sub Total</strong></td>                        </tr>                    </thead>                    <tbody>                    	    <?php                if (!empty($order_details)) {                	 $n = 1;$total=0;                    foreach ($order_details as $value) {                        ?>                          	<tr>                        	<td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><?php echo $n; ?></td>                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><?php echo $value->product_name; ?></td> <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><?php echo $value->p_id; ?></td>                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><?php echo $value->order_quantity; ?></td>                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">Rs <?php echo $value->order_unit_price; ?></td>                            <td style="border-bottom:1px solid #ddd; padding:10px;">Rs <?php echo $sub_total=($value->order_quantity)*($value->order_unit_price); ?></td>                            </tr>                                                  <?php $n = $n + 1;		$total=$total+$sub_total;    }} ?>    <?php if(!empty($order_details)){                    $Shipping_type=$shipping_cost[0]->delivery_cost_type;                    $Shipping_amount=$shipping_cost[0]->delivery_price;                                  ?>                    </tbody>                    <tfoot>                    	<tr>                            <td align="right" colspan="3" valign="top" style="border-bottom:1px solid #ddd; padding:10px;">                                <p style="margin-top:10px;"><strong>Sub Total:</strong> Rs <?php echo $total;?></p>                            </td>                            <td colspan="3" style="border-bottom:1px solid #ddd; padding:10px;" align="right">                                    <p><strong>Shipping:</strong> <?php if(!empty($shipping_cost)){if($Shipping_amount=='0'){echo "Free Shipping";}else{ echo "Rs"." ".$Shipping_amount;} }?></span></li>                        </p>                                <P><strong>Extra Charge:</strong> 00</P>                            </td>                        </tr>                        <tr style="background:#eee;">                        	<td align="right" colspan="5" style="border-bottom:1px solid #ddd; padding:10px;"><strong>Grand Total: Rs <?php echo $total+$Shipping_amount; ?> </strong></td>                        </tr>                    </tfoot>    <?php } ?>                </table>            </td>        </tr>                <tr>        	<td style="background:#ddd; height:1px; width:100%;"></td>        </tr>    </tbody>    </table></body></html>