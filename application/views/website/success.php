<?php
//include 'db_config.php';
session_start();

//Store transaction information from PayPal
$item_number = $_GET['item_number']; 
$user_id=$item_number;
$txn_id = $_GET['tx'];
  $this->session->set_userdata("pstatus", 'Success');
  $this->session->set_userdata("txnid", $txn_id);
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];
	$orderdate = date('Y-m-d');
	$date = date('M d, Y');
	$showdate = date('M d, Y');
	$date = strtotime($date);
	$date = strtotime("+7 day", $date);
	$sheduled_date = date('M d, Y', $date);
	$store_date = date('Y-m-d', $date);
//Get product price
if(!empty($txn_id)){
$add=mysql_query("select * from user_address where user_id=".$user_id);
$address=mysql_fetch_array($add);

$delivery_address=$address['user_name'].' '.$address['user_mobile_no'].' '.$address['address1'].' '.$address['address2'].' '.$address['user_pincode'].' '.$address['user_city'];

$insert_deli=mysql_query("insert into delivery (delivery_user_id,delivery_date,delivery_address,delivery_charge) values ('$user_id','$store_date','$delivery_address','0')");
$deliver_id=mysql_insert_id();
$productResult = mysql_query("SELECT * FROM cart WHERE cart_user_id = ".$user_id);
$main_total='0';
while($productRow = mysql_fetch_assoc($productResult)){
	$cart_product_id = $productRow['cart_product_id'];
	$cart_product_price = $productRow['cart_product_price'];
	$cart_product_qty = $productRow['cart_product_qty'];
	$main_total = $main_total + ($productRow['cart_product_qty'] * $productRow['cart_product_price']);
	$insert_deli=mysql_query("insert into `order` (delivery_id,order_user_id,order_product_id,order_quantity,order_unit_price,order_date) values ('$deliver_id','$user_id','$cart_product_id','$cart_product_qty','$cart_product_price','$orderdate')");
	$order_id=mysql_insert_id();
	
}

//Insert tansaction data into the database
//echo "INSERT INTO payment(payment_deliver_id,payment_user_id,payment_amount,payment_transaction_id,payment_type,payment_date,payment_status) VALUES('".$deliver_id."','".$user_id."','".$main_total."','".$txn_id."','3','".$orderdate."','1')";
    $insert = mysql_query("INSERT INTO payment(payment_deliver_id,payment_user_id,payment_amount,payment_transaction_id,payment_type,payment_date,payment_status) VALUES('".$deliver_id."','".$user_id."','".$main_total."','".$txn_id."','3','".$orderdate."','1')");
    $last_insert_id =mysql_insert_id;
    if($last_insert_id){
    	$del=mysql_query("delete from cart where cart_user_id=".$user_id);
		    	//$insert = mysql_query("update products set stock='$avalible_stock' where pid='$item_number'");
    }
?>


<?php
$this->session->set_flashdata("msgSuccess", "Transection Success");
                    redirect('website/order_confirmation');
}
?>