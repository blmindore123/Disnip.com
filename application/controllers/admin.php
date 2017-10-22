<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        ob_start();
        $this->load->helper(array('form', 'url'));
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        define('category_image', base_url('uploads/category/'));
        define('subcategory_image', base_url('uploads/subcategory/'));
        define('category_thumb_image', base_url('uploads/category/thumb_img/'));
        date_default_timezone_set("Asia/Calcutta");
        define('subcategory_thumb_image', base_url('uploads/subcategory/thumb_img/'));
        define('product_image', base_url('uploads/product/'));
        define('product_thumb_image', base_url('uploads/product/thumb_img/'));
        define('invoice_image', base_url('webassets/images/home/'));
        define('attribute_image', base_url('uploads/attribute/'));
        define('slider_image', base_url('uploads/slider/'));
         define('logo', base_url('uploads/logo/'));
          $logo = $this->login_model->get_record('logo');
          define("msg_api_key","ef7910ffd4bc7ebc7262ea516859a3c9");
        define("adminlogo" ,logo."/".$logo[0]->website_logo);
        if ($this->session->userdata('user_id') == FALSE) {
            redirect('login');
        }
    }

    function index() 
    {
		 $data['user_count'] = $this->login_model->count_records('user');
		  $data['category'] = $this->login_model->count_records('category');
		 $data['product'] = $this->login_model->count_records('product');
		 $data['pincodes'] = $this->login_model->count_records('pincode');
		  $data['book_demand'] = $this->login_model->count_records('user_booksondemand');
		  $data['transaction'] = $this->login_model->count_records('payment');
		  $data['order'] = $this->login_model->count_records('order');
        $data['subcategory'] = $this->login_model->count_records('subcategory');
        $data['visitor'] =   $this->login_model->get_record('visitor_count');
        $data['remains_msg']=$this->check_msg_balence();
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/home',$data);
        $this->load->view('admin/footer');
    }
function add_shipper()
{
  $data['deliver_shipper_name']=$_POST['shipper_name']; 
   $data['shipper_track_id']=$_POST['track_id'];	
	$where=array('delivery_user_id'=>$_POST['user_id'],'delivery_id'=>$_POST['deliverid']);
	$this->login_model->update_data('delivery', $data, $where);
	$data['delivery_status']='2';
	
  	$this->login_model->update_data('delivery', $data, $where);
    $this->session->set_flashdata('status', 'Shipper details added successfully');
 
}
    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    function change_password() {
        if ($this->input->post('change')) {
            $where = array('admin_id' => $this->session->userdata('user_id'), 'admin_password' => md5($this->input->post('old_pass')));
            $check_password = $this->login_model->get_record_where('admin', $where);
            if ($check_password == FALSE) {
                $this->session->set_flashdata('error', 'Old Password does not match');
                redirect('admin/change_password');
            } else {
                $data = array('admin_password' => md5($this->input->post('new_pass')));
                $where = array('admin_id' => $this->session->userdata('user_id'));
                $this->login_model->update_data('admin', $data, $where);
                 $this->session->set_flashdata('success', 'Password successfully changed');
                redirect('admin/change_password');
            }
        } else {
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/change_password_view');
            $this->load->view('admin/footer');
        }
    }
    
    function change_email(){
        $where = array('admin_id' => $this->session->userdata('user_id'));
        if($this->input->post('change')){
            $data = array('admin_email' => $this->input->post('a_email'));
            $this->login_model->update_data('admin', $data, $where);
            $this->session->unset_userdata('user_email');
            $this->session->set_userdata('user_email', $this->input->post('a_email'));
            $this->session->set_flashdata('success', 'Email updated successfully');
            redirect('admin/change_email');
        } else {
            $get_admin = $this->login_model->get_data_where_condition('admin', $where);
            $data['a_email'] = $get_admin[0]->admin_email;
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/change_email_view', $data);
            $this->load->view('admin/footer');
        }
    }

    function change_status() {
        $where_name = $this->uri->segment(3);
        $where_value = $this->uri->segment(4);
        $table = $this->uri->segment(5);
        $table_field = $this->uri->segment(6);
        $field_value = $this->uri->segment(7);
        $function = $this->uri->segment(8);
		 $delete_user_id = $this->uri->segment(9);
		  $shippername = $this->uri->segment(10);
		   $track_id = $this->uri->segment(11);
        //----------------Start Change Status--------------------//

        $where = array($where_name => $where_value);
        $data = array($table_field => $field_value);
        $this->login_model->update_data($table, $data, $where);

        //----------------End Change Status--------------------//

        if ($table == "user" && $function == "user_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "category" && $function == "category_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
             if ($table == "subcategory" && $function == "subcategory_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "product" && $function == "product_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "slider" && $function == "slider_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Slider Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Slider Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "payment_type" && $function == "payment_type") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "pincode" && $function == "pincode_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "about_us" && $function == "about_us") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
         if ($table == "payment" && $function == "payment_details") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Activity Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
         if ($table == "delivery" && $function == "delivery_details") {
            if ($field_value == 2) {
            $where_user_id = array('user_id' =>$delete_user_id);
			$rec = $this->login_model->get_data_where_condition('user', $where_user_id);
			$user_name = $rec['0']->user_fullname;
			$user_email = $rec['0']->user_email;
			$deliver_id = $rec['0']->delivery_address;
			$where_deliver_id = array('user_address_id' =>$deliver_id);
			$rec_add = $this->login_model->get_data_where_condition('user_address', $where_deliver_id);
		$deliver_address1 = $rec_add['0']->user_deliver_address1;
		$deliver_address2 = $rec_add['0']->address2;
		$user_city = $rec_add['0']->user_city;
		$user_pincode = $rec_add['0']->user_pincode;
		 $add = $deliver_address1 . ' ' . $deliver_address2 . ',' . $user_city . ',' . $user_pincode; 
	$where_cart_id = array('delivery_id' =>$where_value,'order_user_id'=>$delete_user_id);
		$order = $this->login_model->get_data_where_condition('order', $where_cart_id);
		
		$where_shipper = array('delivery_id' =>$where_value,'delivery_user_id'=>$delete_user_id);
		$deliver_shipper = $this->login_model->get_data_where_condition('delivery', $where_shipper);
		//echo $sel="select * from delivery where delivery_id='$where_value' and delivery_user_id='$delete_user_id'";
	//die;
		$name_shipper=$deliver_shipper['0']->deliver_shipper_name;
		$shipper_track_id=$deliver_shipper['0']->shipper_track_id;
		$date_delivery=$deliver_shipper['0']->delivery_date;
		$charge_delivery=$deliver_shipper['0']->delivery_charge;
		$where_PAY_id = array('payment_user_id' =>$delete_user_id);
		$PAY = $this->login_model->get_data_where_condition('payment', $where_PAY_id);
		$amount=$PAY['0']->payment_amount;
		$order_id=$PAY['0']->payment_id;
		$order_date=$PAY['0']->payment_date;
		$main_total = '0';
		foreach ($order as  $value) {
		
			 $product_id = $value->order_product_id; 
			$product_unit = $value->order_quantity;
			$product_amount = $value->order_unit_price; 
			$main_total = $main_total + ($product_unit * $product_amount);
				$where_product_id  = array('product_id' =>$product_id);
			$p = $this->login_model->get_data_where_condition('product', $where_product_id);
			$pr_id = $p['0']->product_id;
					$pr_unit = $p['0']->product_of_stock;
					
		}
		$where_cost  = array('delivery_cost_type' =>2);
			$delivery_amount = $this->login_model->get_data_where_condition('delivery_cost_management', $where_cost);
			$shipping_amount = $delivery_amount['0']->delivery_price;
			$delivery_cost_type = $delivery_amount['0']->delivery_cost_type;


	//	if($delivery_cost_type=='1')
		//{
		//	$delivery_charge =0;
		//}else{
		//	$delivery_charge=$shipping_amount;
		//}
		//$delivery_cost = $this -> conn -> get_all_records('delivery_cost_management');
		//$delivery_charge = $delivery_cost['0']['delivery_price'];
		
		$minimum_checkout = $this->login_model->get_column_data_where('minimum_checkout');
		$minimum_checkout_cost = $minimum_checkout['0']->minimum_checkout_cost;

		
             	 $path1='http://72.167.41.165/violet/images/logo.png';
			//	$path1='http://'.$_SERVER['HTTP_HOST'].'/violet/images/logo.png';
			$subject = 'Violet order status';

			$mail_msg .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Violet</title>
</head>

<body bgcolor="#f1f1f1">
<table cellpadding="0" cellspacing="0" width="600" style="background:#fff; border:1px solid #cbcbcb; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
	<thead class="header">
    	<tr>
        	<td style="background:#fff; height:62px; width:100%; padding:5px; border-bottom:1px solid #DDD;" valign="middle">
            	<a href="#" style="margin-left:10px;"><img width="60" src="' . $path1 . '" alt="..."/></a>
            </td>
        </tr>
    </thead>
    <tbody style=" border-bottom:1px solid #ddd;">
    	<tr>	
        	<td style="padding:10px 15px;">
            	<h1 style="margin-bottom:0px; color:#4D0684;">Dear ' . $user_name . '</h1>
            	<p>Your order has been Shipped.. </p>
               	<p><strong><h3>Delivery Address:</h3></strong>' . $add . '</p>
                 <p>Order ID: ' . $order_id . '</p>
                <p>Order Date: ' . $order_date . '</p>
                <p>Excepted Delivery Date: ' . $date_delivery . '</p>
                 <p>Shipper Name: ' . urldecode($shippername) . '</p>
                <p>Track Id: ' . $track_id . '</p>
            </td>
        </tr>
        <tr>
        	<td>
            	<table style="margin:0 auto; border:1px solid #DDD; width:100%" border="0" cellpadding="0" cellspacing="0">
                	<thead>
                    	<tr>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Name</strong></td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Qty</strong></td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Unit Price</strong></td>
                            <td style="border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Total</strong></td>
                        </tr>
                    </thead>
                    
                    <tbody>';
					
			$join_with_order = "SELECT * FROM `order` join delivery on delivery.delivery_id = order.delivery_id join product on product.product_id = order.order_product_id where delivery.delivery_id = $where_value";
			// $join_with_order="SELECT * FROM `order` LEFT JOIN product on order.order_product_id = product.product_id where order_user_id=$user_id";
			$response_order_rec = mysql_query($join_with_order);
			$grandtotal=0;
			while ($row = mysql_fetch_array($response_order_rec)) {
$total=$row['order_unit_price'] * $row['order_quantity'];
				
				$mail_msg .= '<tr>
                        	<td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['product_name'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_quantity'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_unit_price'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><i class="fa fa-rupee">₹</i><span>' . $total . '</span></td>
                        </tr>';
					$grandtotal=$grandtotal+$total;
			}
		//	if($grandtotal>$minimum_checkout_cost)
		//{
		//	$delivery_charge =0;
		//}else{
		//		$delivery_charge=$shipping_amount;
	//	}
			$main_total=$grandtotal+$charge_delivery;
			// $total=$total+$delivery_charge;
			$mail_msg .= '</tbody>
                    <tfoot>
                    	<tr>
                            <td align="right" colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">
                            </td>
                            <td colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">    
                            	<p style="text-align:right;"><strong>Sub Total:</strong><i class="fa fa-rupee">₹</i><span>' . $grandtotal . '</span></p>
                                <p style="text-align:right;"><strong>Shipping:</strong> <i class="fa fa-rupee">₹</i>'.$charge_delivery.'</p>
                                <P style="text-align:right;"> <strong>Extra Charge:</strong> <i class="fa fa-rupee">₹</i>00</P>
                            </td>
                        </tr>
                        <tr style="background:#eee;">
                        	<td align="right" colspan="5" style="border-bottom:1px solid #ddd; padding:10px;"><strong>Grand Total: <i class="fa fa-rupee">₹</i><span>' . $main_total . '</span></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>

    </tbody>
    
    <tfoot style="background:#4D0684; text-align:center; color:#fff;">
        <tr>
        	<td style="color:#fff;"><p>Copyright © 2015 Violet</p></td>
        <tr>
    </tfoot>
    
</table>
</body>
</html>
		';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: support@theviolet.in" . "\r\n" . "Reply-To: support@theviolet.in" . "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail = mail($user_email, $subject, $mail_msg, $headers);
                $message = 'SUCCESS! Order Status Change to Shipped. ';
            } else if($field_value == 3){
            	
            	 $where_user_id = array('user_id' =>$delete_user_id);
			$rec = $this->login_model->get_data_where_condition('user', $where_user_id);
			$user_name = $rec['0']->user_fullname;
			$user_email = $rec['0']->user_email;
			$deliver_id = $rec['0']->delivery_address;
			$where_deliver_id = array('user_address_id' =>$deliver_id);
			$rec_add = $this->login_model->get_data_where_condition('user_address', $where_deliver_id);
		$deliver_address1 = $rec_add['0']->user_deliver_address1;
		$deliver_address2 = $rec_add['0']->address2;
		$user_city = $rec_add['0']->user_city;
		$user_pincode = $rec_add['0']->user_pincode;
		 $add = $deliver_address1 . ' ' . $deliver_address2 . ',' . $user_city . ',' . $user_pincode; 
		$where_cart_id = array('delivery_id' =>$field_value,'order_user_id'=>$delete_user_id);
		$where_shipper = array('delivery_id' =>$field_value,'delivery_user_id'=>$delete_user_id);
		$deliver_shipper = $this->login_model->get_data_where_condition('delivery', $where_shipper);
		$order = $this->login_model->get_data_where_condition('order', $where_cart_id);
			$where_PAY_id = array('payment_user_id' =>$delete_user_id);
		$PAY = $this->login_model->get_data_where_condition('payment', $where_PAY_id);
		$amount=$PAY['0']->payment_amount;
		$order_id=$PAY['0']->payment_id;
		$order_date=$PAY['0']->payment_date;
		$main_total = '0';
		foreach ($order as  $value) {
		
			 $product_id = $value->order_product_id; 
			$product_unit = $value->order_quantity;
			$product_amount = $value->order_unit_price; 
			$main_total = $main_total + ($product_unit * $product_amount);
				$where_product_id  = array('product_id' =>$product_id);
			$p = $this->login_model->get_data_where_condition('product', $where_product_id);
			$pr_id = $p['0']->product_id;
					$pr_unit = $p['0']->product_of_stock;
					
		}
		$where_cost  = array('delivery_cost_type' =>2);
			$delivery_amount = $this->login_model->get_data_where_condition('delivery_cost_management', $where_cost);
			$shipping_amount = $delivery_amount['0']->delivery_price;
			$delivery_cost_type = $delivery_amount['0']->delivery_cost_type;
$update_data=array('payment_status'=>1);
$where_update=array('payment_deliver_id'=>$where_value);
   $this->login_model->update_data('payment', $update_data, $where_update);
		if($delivery_cost_type=='1')
		{
			$delivery_charge =0;
		}else{
			$delivery_charge=$shipping_amount;
		}
		//$delivery_cost = $this -> conn -> get_all_records('delivery_cost_management');
		//$delivery_charge = $delivery_cost['0']['delivery_price'];
		
		$minimum_checkout = $this->login_model->get_column_data_where('minimum_checkout');
		$minimum_checkout_cost = $minimum_checkout['0']->minimum_checkout_cost;

		
             	 $path1='http://72.167.41.165/violet/images/logo.png';
			//	$path1='http://'.$_SERVER['HTTP_HOST'].'/violet/images/logo.png';
			$subject = 'Violet order status';
			$mail_msg2='';

			$mail_msg2 .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Violet</title>
</head>

<body bgcolor="#f1f1f1">
<table cellpadding="0" cellspacing="0" width="600" style="background:#fff; border:1px solid #cbcbcb; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
	<thead class="header">
    	<tr>
        	<td style="background:#fff; height:62px; width:100%; padding:5px; border-bottom:1px solid #DDD;" valign="middle">
            	<a href="#" style="margin-left:10px;"><img width="60" src="' . $path1 . '" alt="..."/></a>
            </td>
        </tr>
    </thead>
    <tbody style=" border-bottom:1px solid #ddd;">
    	<tr>
        	<td style="padding:10px 15px;">
            	<h1 style="margin-bottom:0px; color:#4D0684;">Dear ' . $user_name . '</h1>
            	<p>Your order has been successfully delivered..Thanks for order... </p>
               	<p><strong><h3>Delivery Address:</h3></strong>' . $add . '</p>
                 <p>Order ID: ' . $order_id . '</p>
                <p>Order Date: ' . $order_date . '</p>
                <p>Excepted Delivery Date: </p>
            </td>
        </tr>
        <tr>
        	<td>
            	<table style="margin:0 auto; border:1px solid #DDD; width:100%" border="0" cellpadding="0" cellspacing="0">
                	<thead>
                    	<tr>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Name</strong></td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Qty</strong></td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Unit Price</strong></td>
                            <td style="border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Total</strong></td>
                        </tr>
                    </thead>
                    
                    <tbody>';
					
			$join_with_order = "SELECT * FROM `order` join delivery on delivery.delivery_id = order.delivery_id join product on product.product_id = order.order_product_id where delivery.delivery_id = $where_value";
			// $join_with_order="SELECT * FROM `order` LEFT JOIN product on order.order_product_id = product.product_id where order_user_id=$user_id";
			$response_order_rec = mysql_query($join_with_order);
			$grandtotal=0;
			while ($row = mysql_fetch_array($response_order_rec)) {
$total=$row['order_unit_price'] * $row['order_quantity'];
				
				$mail_msg2 .= '<tr>
                        	<td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['product_name'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_quantity'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_unit_price'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><i class="fa fa-rupee">₹</i><span>' . $total . '</span></td>
                        </tr>';
					$grandtotal=$grandtotal+$total;
			}
			if($grandtotal>$minimum_checkout_cost)
		{
			$delivery_charge =0;
		}else{
				$delivery_charge=$shipping_amount;
		}
			$main_total=$grandtotal+$delivery_charge;
			// $total=$total+$delivery_charge;
			$mail_msg2 .= '</tbody>
                    <tfoot>
                    	<tr>
                            <td align="right" colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">
                            </td>
                            <td colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">    
                            	<p style="text-align:right;"><strong>Sub Total:</strong><i class="fa fa-rupee">₹</i><span>' . $grandtotal . '</span></p>
                                <p style="text-align:right;"><strong>Shipping:</strong> <i class="fa fa-rupee">₹</i>'.$delivery_charge.'</p>
                                <P style="text-align:right;"> <strong>Extra Charge:</strong> <i class="fa fa-rupee">₹</i>00</P>
                            </td>
                        </tr>
                        <tr style="background:#eee;">
                        	<td align="right" colspan="5" style="border-bottom:1px solid #ddd; padding:10px;"><strong>Grand Total: <i class="fa fa-rupee">₹</i><span>' . $main_total . '</span></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>

    </tbody>
    
    <tfoot style="background:#4D0684; text-align:center; color:#fff;">
        <tr>
        	<td style="color:#fff;"><p>Copyright © 2015 Violet</p></td>
        <tr>
    </tfoot>
    
</table>
</body>
</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: support@theviolet.in" . "\r\n" . "Reply-To: support@theviolet.in" . "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail = mail($user_email, $subject, $mail_msg2, $headers);
                $message = 'SUCCESS! Order Status Change to Delivered. ';
            }else if($field_value == 4){
            $where_user_id = array('user_id' =>$delete_user_id);
			$rec = $this->login_model->get_data_where_condition('user', $where_user_id);
			$user_name = $rec['0']->user_fullname;
			$user_email = $rec['0']->user_email;
			$deliver_id = $rec['0']->delivery_address;
			$where_deliver_id = array('user_address_id' =>$deliver_id);
			$rec_add = $this->login_model->get_data_where_condition('user_address', $where_deliver_id);
		$deliver_address1 = $rec_add['0']->user_deliver_address1;
		$deliver_address2 = $rec_add['0']->address2;
		$user_city = $rec_add['0']->user_city;
		$user_pincode = $rec_add['0']->user_pincode;
		 $add = $deliver_address1 . ' ' . $deliver_address2 . ',' . $user_city . ',' . $user_pincode; 
	$where_cart_id = array('delivery_id' =>$field_value,'order_user_id'=>$delete_user_id);
		$order = $this->login_model->get_data_where_condition('order', $where_cart_id);
			$where_PAY_id = array('payment_user_id' =>$delete_user_id);
		$PAY = $this->login_model->get_data_where_condition('payment', $where_PAY_id);
		$amount=$PAY['0']->payment_amount;
			$order_id=$PAY['0']->payment_id;
		$order_date=$PAY['0']->payment_date;
		$main_total = '0';
		foreach ($order as  $value) {
		
			 $product_id = $value->order_product_id; 
			$product_unit = $value->order_quantity;
			$product_amount = $value->order_unit_price; 
			$main_total = $main_total + ($product_unit * $product_amount);
				$where_product_id  = array('product_id' =>$product_id);
			$p = $this->login_model->get_data_where_condition('product', $where_product_id);
			$pr_id = $p['0']->product_id;
					$pr_unit = $p['0']->product_of_stock;
					
		}
		$where_cost  = array('delivery_cost_type' =>2);
			$delivery_amount = $this->login_model->get_data_where_condition('delivery_cost_management', $where_cost);
			$shipping_amount = $delivery_amount['0']->delivery_price;
			$delivery_cost_type = $delivery_amount['0']->delivery_cost_type;


		if($delivery_cost_type=='1')
		{
			$delivery_charge =0;
		}else{
			$delivery_charge=$shipping_amount;
		}
		//$delivery_cost = $this -> conn -> get_all_records('delivery_cost_management');
		//$delivery_charge = $delivery_cost['0']['delivery_price'];
		
		$minimum_checkout = $this->login_model->get_column_data_where('minimum_checkout');
		$minimum_checkout_cost = $minimum_checkout['0']->minimum_checkout_cost;

		
             	 $path1='http://72.167.41.165/violet/images/logo.png';
			//	$path1='http://'.$_SERVER['HTTP_HOST'].'/violet/images/logo.png';
			$subject = 'Violet order status';
$mail_msg3='';
			$mail_msg3 .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Violet</title>
</head>

<body bgcolor="#f1f1f1">
<table cellpadding="0" cellspacing="0" width="600" style="background:#fff; border:1px solid #cbcbcb; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
	<thead class="header">
    	<tr>
        	<td style="background:#fff; height:62px; width:100%; padding:5px; border-bottom:1px solid #DDD;" valign="middle">
            	<a href="#" style="margin-left:10px;"><img width="60" src="' . $path1 . '" alt="..."/></a>
            </td>
        </tr>
    </thead>
    <tbody style=" border-bottom:1px solid #ddd;">
    	<tr>
        	<td style="padding:10px 15px;">
            	<h1 style="margin-bottom:0px; color:#4D0684;">Dear ' . $user_name . '</h1>
            	<p>Your order has been cancelled by violet admin  </p>
               	<p><strong><h3>Delivery Address:</h3></strong>' . $add . '</p>
                 <p>Order ID: ' . $order_id . '</p>
                <p>Order Date: ' . $order_date . '</p>
                
            </td>
        </tr>
        <tr>
        	<td>
            	<table style="margin:0 auto; border:1px solid #DDD; width:100%" border="0" cellpadding="0" cellspacing="0">
                	<thead>
                    	<tr>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Name</strong></td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Qty</strong></td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Unit Price</strong></td>
                            <td style="border-bottom:1px solid #ddd; padding:10px;  background:#4D0684; color:#fff;"><strong>Total</strong></td>
                        </tr>
                    </thead><tbody>';
					
			$join_with_order = "SELECT * FROM `order` join delivery on delivery.delivery_id = order.delivery_id join product on product.product_id = order.order_product_id where delivery.delivery_id = $where_value";
			// $join_with_order="SELECT * FROM `order` LEFT JOIN product on order.order_product_id = product.product_id where order_user_id=$user_id";
			$response_order_rec = mysql_query($join_with_order);
			$grandtotal=0;
			while ($row = mysql_fetch_array($response_order_rec)) {
$total=$row['order_unit_price'] * $row['order_quantity'];
				
				$mail_msg3 .= '<tr>
                        	<td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['product_name'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_quantity'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_unit_price'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><i class="fa fa-rupee">₹</i><span>' . $total . '</span></td>
                        </tr>';
					$grandtotal=$grandtotal+$total;
			}
			if($grandtotal>$minimum_checkout_cost)
		{
			$delivery_charge =0;
		}else{
				$delivery_charge=$shipping_amount;
		}
			$main_total=$grandtotal+$delivery_charge;
			// $total=$total+$delivery_charge;
			$mail_msg3 .= '</tbody>
                    <tfoot>
                    	<tr>
                            <td align="right" colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">
                            </td>
                            <td colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">    
                            	<p style="text-align:right;"><strong>Sub Total:</strong><i class="fa fa-rupee">₹</i><span>' . $grandtotal . '</span></p>
                                <p style="text-align:right;"><strong>Shipping:</strong> <i class="fa fa-rupee">₹</i>'.$delivery_charge.'</p>
                                <P style="text-align:right;"> <strong>Extra Charge:</strong> <i class="fa fa-rupee">₹</i>00</P>
                            </td>
                        </tr>
                        <tr style="background:#eee;">
                        	<td align="right" colspan="5" style="border-bottom:1px solid #ddd; padding:10px;"><strong>Grand Total: <i class="fa fa-rupee">₹</i><span>' . $main_total . '</span></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>

    </tbody>
    
    <tfoot style="background:#4D0684; text-align:center; color:#fff;">
        <tr>
        	<td style="color:#fff;"><p>Copyright © 2015 Violet</p></td>
        <tr>
    </tfoot>
    
</table>
</body>
</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: support@theviolet.in" . "\r\n" . "Reply-To: support@theviolet.in" . "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail = mail($user_email, $subject, $mail_msg3, $headers);
                $message = 'SUCCESS! Order Status Change to Cancelled. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
		 if ($table == "brand" && $function == "brand_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Brand Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Activity Status Change to Active. ';
            }
            $this->session->set_flashdata('Brand', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
       if ($table == "offers_list" && $function == "offer_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Offer Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Offer Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
        if ($table == "ideal_for" && $function == "ideal_for_list") {
            if ($field_value != 1) {
                $message = 'SUCCESS! Ideal for Status Change to InActive. ';
            } else {
                $message = 'SUCCESS! Ideal for Status Change to Active. ';
            }
            $this->session->set_flashdata('status', $message);
            $path = 'admin/' . $function;
            redirect($path);
        }
    }

    function send_email($from, $to, $subject, $message) {
        $this->load->library('email');
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function delete() {
        $delete_type = $this->uri->segment(3);
        $delete_table = $this->uri->segment(4);
        $delete_where_name = $this->uri->segment(5);
        $delete_where_id = $this->uri->segment(6);
		  $delete_where = array($delete_where_name => $delete_where_id);
        $delete = $this->login_model->delete_record($delete_table, $delete_where);
        if ($delete == TRUE) {
            if ($delete_type == 'delete_user') {
                $message = 'USer deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/user_list');
            }
            if ($delete_type == 'delete_category') {
                $message = 'Category deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/category_list');
            }
             if ($delete_type == 'delete_subcategory') {
                $message = 'Sub-Category deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/subcategory_list');
            }
            if ($delete_type == 'delete_product') {
                $message = 'Product deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/product_list');
            }
             if ($delete_type == 'delete_slider') {
                $message = 'Slider deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/slider_list');
            }
             if ($delete_type == 'delete_attribute') {
                $message = 'attribute deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/attribute_list');
            }
             if ($delete_type == 'delete_payment_type') {
                $message = 'Payment type deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/payment_type');
            }
            if ($delete_type == 'delete_pincode') {
                $message = 'Pincode deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/pincode_list');
            }
            if ($delete_type == 'delete_about_us') {
                $message = 'Content deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/about_us');
            }
    	if ($delete_type == 'delete_delivery') {
            $message = 'Order has been successfully cancelled!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/delivery_details');
            }
             // if ($delete_type == 'delete_payment_details') {
                // $message = 'Payment details deleted successfully!!';
                // $this->session->set_flashdata('error', $message);
                // redirect('admin/payment_details');
            // }
             if ($delete_type == 'delete_delivery') {
                $message = 'Delivery details deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/delivery_details');
            }
		if ($delete_type == 'delete_brand') {
                $message = 'Brand deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/brand_list');
            }
            if ($delete_type == 'delete_brand_type') {
                $message = 'Brand Type deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/brand_type_list');
            }
            if ($delete_type == 'delete_ideal_for') {
                $message = 'Ideal for deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/ideal_for_list');
            }
		if ($delete_type == 'attribute_slider') {
                $message = 'Slider deleted successfully!!';
                $this->session->set_flashdata('error', $message);
                redirect('admin/slider_list');
            }
        } else {
            redirect();
        }
    }

    function user_list() {
   //	 $data['user_list'] = $this->login_model->get_record_leftjoin_two_table('user', 'user_address', 'user_id', 'user_id', '*, user.user_id as u_id');
      	// $data['user_list'] = $this->login_model->get_record_leftjoin_two_table('user', 'user_address', 'user_id', 'user_id','*, user.user_id as u_id');
      //	$data['user_list'] = $this->login_model->get_record_join_two_table('user', 'user_address', 'user_id', 'user_id'); 
		// $data['user_list']=$this->login_model->get_record('user');
		$data['user_list']=$this->login_model->get_column_data_where('user','','','user_id');
	 	$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/user_list_view', $data);
        $this->load->view('admin/footer');
    }
	function view_user_address()
	{
		$user_id = $this->uri->segment(3);
		 $where = array('user_address.user_id' => $user_id);
		 
               // $data['address_details'] = $this->login_model->get_data_where_condition('user_address', $where);
				$data['address_list'] = $this->login_model->get_record_join_two_table('user', 'user_address', 'user_id', 'user_id','*',$where); 
		$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/user_address_details', $data);
        $this->load->view('admin/footer');
	}
    function payment_details() {
          $data['payment_details'] = $this->login_model->get_record_join_two_table('payment','user', 'payment_user_id', 'user_id','','','payment_id');
         // print_r($data['payment_details'] );die;
   //    $data['payment_details'] = $this->login_model->get_record_join_two_table('user', 'payment', 'user_id', 'payment_user_id');
      
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/payment_details', $data);
        $this->load->view('admin/footer');
    }
   /* function delivery_details() {
         $data['delivery_details'] = $this->login_model->get_join_three_table_where('delivery', 'order','user', 'order_id','delivery_id','user_id','delivery_user_id');
  
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/delivery_details', $data);
        $this->load->view('admin/footer');
    } */
    function delivery_details() {
        //$data['delivery_details'] = $this->login_model->get_join_three_table_where('delivery', 'order','user', 'delivery_id','delivery_id','user_id','delivery_user_id','',$column='delivery.delivery_address as delivery_add,user_fullname,order_date,delivery_date,delivery.delivery_id,delivery_status,user_mobile_no,user_id,order_status');
		$data['delivery_details'] = $this->login_model->get_join_three_table_where('delivery', 'payment','user', 'payment_deliver_id','delivery_id','user_id','delivery_user_id','',$column='delivery.delivery_address as delivery_add,user_name,payment_date,delivery_date,delivery.delivery_id,delivery_status,user_contact_no,user_id,delivery_status,payment.payment_id','payment_id');



		 //$data['delivery_details'] = $this->login_model->get_join_three_table_where('delivery', 'order','user', 'delivery_id','delivery_id','user_id','delivery_user_id');
		//print_r($data['delivery_details']);die;
       //  $data['delivery_details'] = $this->login_model->get_data_join_four_tabel_where('order','delivery','user','product',$id1='delivery_id',$id2='delivery_id',$id3='user_id',$id4='delivery_user_id',$id5='order_product_id',$id6='product_id',$orderby='',$where = '',$column='');
        // print_r($data);
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/delivery_details', $data);
        $this->load->view('admin/footer');
    }
	function view_order_details()
	{
		 $deliver_id = $this->uri->segment(3);
            if (!empty($deliver_id)) {

                $where = array('payment.payment_deliver_id'=> $deliver_id);
				$data['delivery_details'] = $this->login_model->get_join_three_table_where('delivery', 'payment','user', 'payment_deliver_id','delivery_id','user_id','delivery_user_id',$where,$column='delivery.delivery_address as delivery_add,user_name,payment_amount,payment_date,payment_type,delivery_date,delivery.delivery_id,delivery_status,user_contact_no,delivery.deliver_shipper_name,delivery.shipper_track_id,payment.payment_id,user_email,payment_transaction_id');
				$where_deliver_id=array('order.delivery_id'=>$deliver_id);
				//$data['delivery_details'][0]->delivery_id;
				 $data['order_details'] = $this->login_model->get_record_join_two_table('product','order', 'product_id','order_product_id',$column='',$where_deliver_id);
				$where_checkout=array('minimum_checkout_status'=>1);
        $data['minimum_checkout'] = $this->login_model->get_column_data_where('minimum_checkout','',$where_checkout);
        $where_deliver_charge=array('delivery_cost_status'=>1);
        $data['shipping_cost'] = $this->login_model->get_column_data_where('delivery_cost_management','',$where_deliver_charge);
                $this->load->view('admin/menu');
		        $this->load->view('admin/header');
		        $this->load->view('admin/listing/view_order_details', $data);
		        $this->load->view('admin/footer');
            } else {
                redirect('admin/brand_type_list');
            }
	}
	
		function books_on_demand(){
    	$data['books_on_demand'] = $this->login_model->get_column_data_where('user_booksondemand','','','booksondemand_id');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/books_demand_view', $data);
        $this->load->view('admin/footer');
	}
        function magazine_on_demand(){
    	$data['magzine_on_demand'] = $this->login_model->get_column_data_where('magzine','','','m_id');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/magzine_demand_view', $data);
        $this->load->view('admin/footer');
	}
        function kalyani(){
    	$data['kalyani'] = $this->login_model->get_column_data_where('kalyani','','','k_id');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/kalyani_demand_view', $data);
        $this->load->view('admin/footer');
	}
		function contact_user(){
	    $data['contact_user'] = $this->login_model->get_column_data_where('user_contact_us','','','conatct_us_id');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/user_contact_view', $data);
        $this->load->view('admin/footer');
	}
	
	
	
	function offer_list(){
	$data['offers_list'] = $this->login_model->get_column_data_where('offers_list');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/offers_list_view', $data);
        $this->load->view('admin/footer');
	}
	function add_offers() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);
		
                $this->login_model->insert_data('offers_list', $data);
                $this->session->set_flashdata('status', 'Offers added successfully');
            
            redirect('admin/offer_list');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_offers');
            $this->load->view('admin/footer');
        }
    }
	function edit_offers() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
			
            $where = array('offer_id' => $this->input->post('offer_id'));
            unset($data['offer_id']);
            unset($data['submit']);
           unset($data['offer_id']);
                unset($data['submit']);
                $this->login_model->update_data('offers_list', $data, $where);
                $this->session->set_flashdata('status', 'Offer Update successfully');
           

            redirect('admin/offer_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('offer_id' => $category_id);
                $data['offer_details'] = $this->login_model->get_data_where_condition('offers_list', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_offers', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/offer_list');
            }
        }
    }
    function category_list() {
        $data['category_list'] = $this->login_model->get_column_data_where('category');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/category_list_view', $data);
        $this->load->view('admin/footer');
    }
    function brand_type_list() {
        $data['brand_type_list'] = $this->login_model->get_column_data_where('brand_type');
		$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/brand_type_list_view', $data);
        $this->load->view('admin/footer');
    }
	function add_brand_type() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);
			$data['status']=1;
            $ch = array("brand_type_name" => strtoupper($this->input->post("brand_type_name")));
            $rec = $this->login_model->get_data_where_condition('brand_type', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('brand_type', $data);
                $this->session->set_flashdata('status', 'Brand Type added successfully');
             } else {
                $this->session->set_flashdata('error', 'Brand Type already exist');
            }
            redirect('admin/brand_type_list');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_brand_type');
            $this->load->view('admin/footer');
        }
    }
	function edit_brand_type() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('brand_type_id' => $this->input->post('brand_type_id'));
            unset($data['brand_type_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('brand_type_id');
            $name = $this->input->post('brand_type_name');
            $where = array('brand_type_id' => $operator_id);

            $data1 = array('brand_type_name' => strtoupper($name), 'brand_type_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('brand_type', $data1);
            if (empty($rec)) {
                unset($data['brand_type_id']);
                unset($data['submit']);
                $this->login_model->update_data('brand_type', $data, $where);
                $this->session->set_flashdata('status', 'Brand type Update successfully');
             } else {
                $this->session->set_flashdata('error', 'Brand type already exist');
            }

            redirect('admin/brand_type_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('brand_type_id' => $category_id);
                $data['brand_type_details'] = $this->login_model->get_data_where_condition('brand_type', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_brand_type', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/brand_type_list');
            }
        }
    }
    function ideal_for_list() {
        $data['ideal_for_list'] = $this->login_model->get_column_data_where('ideal_for');
	$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/ideal_for_list_view', $data);
        $this->load->view('admin/footer');
    }
    function add_ideal_for() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);
			$data['status']=1;
            $ch = array("ideal_name" => strtoupper($this->input->post("ideal_name")));
            $rec = $this->login_model->get_data_where_condition('ideal_for', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('ideal_for', $data);
                $this->session->set_flashdata('status', 'Ideal for added successfully');
             } else {
                $this->session->set_flashdata('error', 'Ideal for already exist');
            }
            redirect('admin/ideal_for_list');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_ideal_for');
            $this->load->view('admin/footer');
        }
    }
    function edit_ideal_for() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('ideal_for_id' => $this->input->post('ideal_for_id'));
            unset($data['ideal_for_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('ideal_for_id');
            $name = $this->input->post('ideal_name');
            $where = array('ideal_for_id' => $operator_id);

            $data1 = array('ideal_name' => strtoupper($name), 'ideal_for_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('ideal_for', $data1);
            if (empty($rec)) {
                unset($data['ideal_for_id']);
                unset($data['submit']);
                $this->login_model->update_data('ideal_for', $data, $where);
                $this->session->set_flashdata('status', 'Ideal for Update successfully');
             } else {
                $this->session->set_flashdata('error', 'Ideal for already exist');
            }

            redirect('admin/ideal_for_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('ideal_for_id' => $category_id);
                $data['ideal_for_details'] = $this->login_model->get_data_where_condition('ideal_for', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_ideal_for', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/ideal_for_list');
            }
        }
    }
 function brand_list() {
        $data['brand_list'] = $this->login_model->get_column_data_where('brand');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/brand_list_view', $data);
        $this->load->view('admin/footer');
    }
 function add_brand() {
     $where=array('category_status'=>1);
     $data_array['category'] = $this->login_model->get_column_data_where('category','',$where);
     
     
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);

            $ch = array("brand_name" => strtoupper($this->input->post("brand_name")));
            $rec = $this->login_model->get_data_where_condition('brand', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('brand', $data);
                $this->session->set_flashdata('status', 'Brand added successfully');
             } else {
                $this->session->set_flashdata('error', 'Brand already exist');
            }
            redirect('admin/brand_list');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_brand',$data_array);
            $this->load->view('admin/footer');
        }
    }

    function edit_brand() {
        $where=array('status'=>1);
        $data_array['brand_type'] = $this->login_model->get_column_data_where('brand_type','',$where);
        $data_array['ideal_for'] = $this->login_model->get_column_data_where('ideal_for','',$where);
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('brand_id' => $this->input->post('brand_id'));
            unset($data['brand_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('brand_id');
            $name = $this->input->post('brand_name');
            $where = array('brand_id' => $operator_id);

            $data1 = array('brand_name' => strtoupper($name), 'brand_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('brand', $data1);
            if (empty($rec)) {
                unset($data['brand_id']);
                unset($data['submit']);
                $this->login_model->update_data('brand', $data, $where);
                $this->session->set_flashdata('status', 'Brand Update successfully');
             } else {
                $this->session->set_flashdata('error', 'Brand already exist');
            }

            redirect('admin/brand_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('brand_id' => $category_id);
                $data_array['brand_details'] = $this->login_model->get_data_where_condition('brand', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_brand', $data_array);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/brand_list');
            }
        }
    }
    function add_category() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $n_width = 200;
            $n_height = 200;
           $path="http://".$_SERVER['HTTP_HOST']."/Shopper/uploads/category/";
	   $thumb_source="http://".$_SERVER['HTTP_HOST']."/Shopper/uploads/category/thumb_img";
            $user_image = '';

            if ($_FILES['category_image']['name']) {
                $user_image = $_FILES['category_image']['name'];
            }
            $attachment = $_FILES['category_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["category_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "category_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['category_image']['tmp_name'], "./uploads/category/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/category_list');
                }
            }
            $data['category_image'] = $imagename; 

            unset($data['submit']);
			$data['category_created_date']=date("Y-m-d h:i:sa");
            $ch = array("category_name" => strtoupper($this->input->post("category_name")));
            $rec = $this->login_model->get_data_where_condition('category', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('category', $data);
                $this->session->set_flashdata('status', 'Category added successfully');
                $path = './uploads/category/';
                $path1 = './uploads/category/thumb_img/';
                $this->createThumbs($path, $path1, $file_name);
            } else {
                $this->session->set_flashdata('error', 'Category already exist');
            }
            redirect('admin/category_list');
        } else {
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_category');
            $this->load->view('admin/footer');
        }
    }

    function createThumbs($pathToImages, $pathToThumbs, $fname) {

        // parse path for the extension
        $info = pathinfo($pathToImages . $fname);

        // continue only if this is a JPEG image
        if (strtolower($info['extension']) == 'jpg') {
            // echo "Creating thumbnail for {$fname} <br />";
            // load image and get image size
            $img = imagecreatefromjpeg("{$pathToImages}{$fname}");
            $width = imagesx($img);
            $height = imagesy($img);

            // calculate thumbnail size
            $new_width = 100;
            $new_height = 100;

            // create a new temporary image
            $tmp_img = imagecreatetruecolor($new_width, $new_height);

            // copy and resize old image into new image
            imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            // save thumbnail into a file
            imagejpeg($tmp_img, "{$pathToThumbs}{$fname}");
        } else if (strtolower($info['extension']) == 'png') {
            // load image and get image size
            $img = imagecreatefrompng("{$pathToImages}{$fname}");
            $width = imagesx($img);
            $height = imagesy($img);

            // calculate thumbnail size
            $new_width = 100;
            $new_height = 100;

            // create a new temporary image
            $tmp_img = imagecreatetruecolor($new_width, $new_height);

            // copy and resize old image into new image
            imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            // save thumbnail into a file
            imagepng($tmp_img, "{$pathToThumbs}{$fname}");
        } else if (strtolower($info['extension']) == 'gif') {
            // load image and get image size
            $img = imagecreatefromgif("{$pathToImages}{$fname}");
            $width = imagesx($img);
            $height = imagesy($img);

            // calculate thumbnail size
            $new_width = $thumbWidth;
            $new_height = floor($height * ($thumbWidth / $width));

            // create a new temporary image
            $tmp_img = imagecreatetruecolor($new_width, $new_height);

            // copy and resize old image into new image
            imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            // save thumbnail into a file
            imagegif($tmp_img, "{$pathToThumbs}{$fname}");
        }
    }

    function edit_category() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('operator_id' => $this->input->post('category_id'));
            unset($data['category_id']);
            unset($data['submit']);

            $user_image = '';

            if ($_FILES['category_image']['name']) {
                $user_image = $_FILES['category_image']['name'];
            }
            $attachment = $_FILES['category_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["category_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "category_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['category_image']['tmp_name'], "./uploads/category/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/category_list');
                }
            } else {
                $imagename = $this->input->post('category_image');
            }
            $data['category_image'] = $imagename;
			$data['category_created_date']=date("Y-m-d h:i:sa");
            $operator_id = $this->input->post('category_id');
            $name = $this->input->post('category_name');
            $where = array('category_id' => $operator_id);

            $data1 = array('category_name' => strtoupper($name), 'category_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('category', $data1);
            if (empty($rec)) {
                unset($data['category_id']);
                unset($data['submit']);
                $this->login_model->update_data('category', $data, $where);
                $this->session->set_flashdata('status', 'category Update successfully');
                $path = category_image;
                $path1 = category_thumb_image;

               // $this->createThumbs($path, $path1, $file_name);
            } else {
                $this->session->set_flashdata('error', 'category already exist');
            }

            redirect('admin/category_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('category_id' => $category_id);
                $data['category_details'] = $this->login_model->get_data_where_condition('category', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_category', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/category_list');
            }
        }
    }

      function subcategory_list() {
        $data['subcategory_list'] = $this->login_model->get_record_join_two_table('category', 'subcategory', 'category_id', 's_category_id');;
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/subcategory_list_view', $data);
        $this->load->view('admin/footer');
    }
    function add_subcategory() {
   if ($this->input->post('submit')) {
            $data = $this->input->post();
            $n_width = 200;
            $n_height = 200;
           $path="http://".$_SERVER['HTTP_HOST']."/Shopper/uploads/subcategory/";
	   $thumb_source="http://".$_SERVER['HTTP_HOST']."/Shopper/uploads/subcategory/thumb_img";
            $user_image = '';

            if ($_FILES['subcategory_image']['name']) {
                $user_image = $_FILES['subcategory_image']['name'];
            }
            $attachment = $_FILES['subcategory_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["subcategory_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "subcategory_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['subcategory_image']['tmp_name'], "./uploads/subcategory/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/subcategory_list');
                }
            }
            $data['subcategory_image'] = $imagename; 

            unset($data['submit']);
			$data['subcategory_created_date']=date("Y-m-d h:i:sa");
            $ch = array("subcategory_name" => strtoupper($this->input->post("subcategory_name")));
            $rec = $this->login_model->get_data_where_condition('subcategory', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('subcategory', $data);
                $this->session->set_flashdata('status', 'Sub-Category added successfully');
                $path = './uploads/subcategory/';
                $path1 = './uploads/subcategory/thumb_img/';
                $this->createThumbs($path, $path1, $file_name);
            } else {
                $this->session->set_flashdata('error', 'Sub-Category already exist');
            }
            redirect('admin/subcategory_list');
        } else {
         
		$where_category = array('category_status' =>'1');
        $data_array['category'] = $this->login_model->get_data_where_condition('category',$where_category);
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_subcategory', $data_array);
            $this->load->view('admin/footer');
        }
    }
     function edit_subcategory() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('operator_id' => $this->input->post('subcategory_id'));
            unset($data['subcategory_id']);
            unset($data['submit']);

            $user_image = '';

            if ($_FILES['subcategory_image']['name']) {
                $user_image = $_FILES['subcategory_image']['name'];
            }
            $attachment = $_FILES['subcategory_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["subcategory_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "subcategory_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['subcategory_image']['tmp_name'], "./uploads/subcategory/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/subcategory_list');
                }
            } else {
                $imagename = $this->input->post('subcategory_image');
            }
            $data['subcategory_image'] = $imagename;
			$data['subcategory_created_date']=date("Y-m-d h:i:sa");
            $operator_id = $this->input->post('subcategory_id');
            $name = $this->input->post('subcategory_name');
            $where = array('subcategory_id' => $operator_id);

            $data1 = array('subcategory_name' => strtoupper($name), 'subcategory_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('subcategory', $data1);
            if (empty($rec)) {
                unset($data['subcategory_id']);
                unset($data['submit']);
                $this->login_model->update_data('subcategory', $data, $where);
                $this->session->set_flashdata('status', 'Sub-Category Update successfully');
                $path = subcategory_image;
                $path1 = subcategory_thumb_image;

               // $this->createThumbs($path, $path1, $file_name);
            } else {
                $this->session->set_flashdata('error', 'sub-category already exist');
            }

            redirect('admin/subcategory_list');
        } else {
            $subcategory_id = $this->uri->segment(3);
            if (!empty($subcategory_id)) {
$where_category = array('category_status' =>'1');
        $data['category'] = $this->login_model->get_data_where_condition('category',$where_category);
                $where = array('subcategory_id' => $subcategory_id);
                $data['subcategory_details'] = $this->login_model->get_data_where_condition('subcategory', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_subcategory', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/subcategory_list');
            }
        }
    }

    function product_list() {
        
       // $data['product_list'] = $this->login_model->get_record_join_two_table('category', 'product', 'category_id', 'product_category_id');
		 $data['product_list'] = $this->login_model->get_join_three_table_where('product', 'category','subcategory', 'category_id','product_category_id','subcategory_id','product_subcategory_id');
             //   $data['product_list'] = $this->login_model->get_data_join_four_tabel_where('product', 'category','brand','ideal_for', 'category_id','product_category_id','brand_id','product_brand_id','ideal_for_id','ideal_for_id');
       
        $data['categoryList'] = $this->login_model->get_record_join_two_table_groupby('category', 'product', 'category_id', 'product_category_id', '', '', 'product_category_id');
 // $data['product_list'] = $this->login_model->get_join_three_table_where('delivery', 'order','user', 'order_id','delivery_id','user_id','delivery_user_id');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/product_list_view', $data);
        $this->load->view('admin/footer');
    }
    
    function product_list_filter(){
        if($this -> input -> post('category_id')){
            $category_id = $this -> input -> post('category_id');
        
            $where = array('product_category_id' => $category_id);

            $data['product_list'] = $this->login_model->get_record_join_two_table('category', 'product', 'category_id', 'product_category_id', '', $where);
        } else {
            $data['product_list'] = $this->login_model->get_record_join_two_table('category', 'product', 'category_id', 'product_category_id');
        }
        

        $this -> load -> view('admin/listing/product_list_filter', $data);
    }

    function add_product() {
   
     if ($this->input->post('submit')) {
      $data = $this->input->post();
              $path="http://".$_SERVER['HTTP_HOST']."/Shopper/uploads/product/";
	//   $thumb_source="http://".$_SERVER['HTTP_HOST']."/Shopper/uploads/product/thumb_img";
            $user_image = '';

            if ($_FILES['product_image']['name']) {
                $user_image = $_FILES['product_image']['name'];
            }
            $attachment = $_FILES['product_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["product_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "product_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['product_image']['tmp_name'], "./uploads/product/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/product_list');
                }
            }
            $data['product_image'] = $imagename;
$data['product_created_date']=date("Y-m-d h:i:sa");
            unset($data['submit']);

        
                $this->login_model->insert_data('product', $data);
                $this->session->set_flashdata('status', 'product added successfully');
                $path = './uploads/product/';
                $path1 = './uploads/product/thumb_img/';
              
            redirect('admin/product_list');
        } else {
         
		$where_category = array('category_status' =>'1');
        $data_array['category'] = $this->login_model->get_data_where_condition('category',$where_category);
        $where_category1 = array('subcategory_status' =>'1');
        $data_array['subcategory'] = $this->login_model->get_data_where_condition('subcategory',$where_category1);
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_product', $data_array);
            $this->load->view('admin/footer');
        }
    }

    function edit_product() {
    
        if ($this->input->post('submit')) {
            $data = $this->input->post();
          
            //echo implode(",", $data['attribute_value_id']);die();
           
            $where = array('product_id' => $this->input->post('product_id'));
            unset($data['product_id']);
            unset($data['submit']);

            $user_image = '';

            if ($_FILES['product_image']['name']) {
                $user_image = $_FILES['product_image']['name'];
            }
            $attachment = $_FILES['product_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["product_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "product_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['product_image']['tmp_name'], "./uploads/product/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/product_list');
                }
            } else {
                $imagename = $this->input->post('product_image');
            }
            $data['product_image'] = $imagename;
			$data['product_created_date']=date("Y-m-d h:i:sa");
            $operator_id = $this->input->post('product_id');
            $name = $this->input->post('product_name');
            $where = array('product_id' => $operator_id);

            $data1 = array('product_name' => strtoupper($name), 'product_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('product', $data1);
           // if (empty($rec)) {
                unset($data['product_id']);
                unset($data['submit']);
				//$data['product_add_date']=date("Y-m-d h:i:sa");
                $this->login_model->update_data('product', $data, $where);
                $this->session->set_flashdata('status', 'product Update successfully');
                $path = product_image;
                $path1 = product_thumb_image;
            //    $this->createThumbs($path, $path1, $file_name);
            // } else {
            //     $this->session->set_flashdata('error', 'product already exist');
            // }

            redirect('admin/product_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

               	  $where_category = array('category_status' =>'1');
                $data_array['category'] = $this->login_model->get_data_where_condition('category',$where_category);
                $where_category1 = array('subcategory_status' =>'1');
        $data_array['subcategory'] = $this->login_model->get_data_where_condition('subcategory',$where_category1);
				 $where_product = array('product_id' => $category_id);
           $data_array['product_details'] = $this->login_model->get_record_join_two_table('category', 'product', 'category_id', 'product_category_id',$column='',$where_product);
              
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_product', $data_array);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/product_list');
            }
        }
    }
    function get_brand_according_brand_type() {
        $brand_type_id=  $this->input->post('brand_type_id');
        $where_brand = array('brand_status' =>'1','brand_type_id'=>$brand_type_id);
        $data_array['brand'] = $this->login_model->get_data_where_condition('brand',$where_brand);
        $this->load->view('admin/ajax_brand_details_view', $data_array);
    }
    function get_ideal_for_according_brand() {
        $brand_id=  $this->input->post('brand_id');
        $where_brand = array('brand_status' =>'1','brand_id'=>$brand_id);
        //$data_array['brand'] = $this->login_model->get_data_where_condition('brand',$where_brand);
        $data_array['ideal_for'] = $this->login_model->get_record_join_two_table('ideal_for','brand',$id1='ideal_for_id',$id2='ideal_for_id',$column='',$where_brand);
        $this->load->view('admin/ajax_ideal_for_details', $data_array);
    }
function add_new_attributes() {
       
     $where=array('category_status'=>1);
     $data_array['category'] = $this->login_model->get_column_data_where('category','',$where);
     
        if ($this->input->post('submit')) {
            
             
            $category_id = $this->input->post('category_id');
//            $attribute_name_data = $this->input->post('attribute_name');
//            $attribute_value_data = $this->input->post('attribute_value');
            
            for($n = 1; $n <= $this->input->post('total_data'); $n++){
                $attribute_name=$this->input->post('attribute_name'.$n);
                $attribute_value=$this->input->post('attribute_value'.$n);
                $explode=  explode(',', $attribute_value);
               // print_r($explode);die();
                $ch = array("attribute_name" => strtoupper($attribute_name),'category_id'=>$category_id);
                $rec = $this->login_model->get_data_where_condition('attributes', $ch);
                if (empty($rec)) {
                    if(!empty($attribute_name) && !empty($attribute_value)){
                    $data=array('category_id'=>$category_id,'attribute_name'=>$attribute_name,'attribute_status'=>1);
                    // ,'attribute_value'=>$attribute_value
                    $last_id=$this->login_model->insert_data('attributes', $data);
                    
                    foreach ($explode as $value) {
                        if(!empty($value)){
                            $ins_data=array('attribute_id'=>$last_id,'attribute_value_name'=>$value);
                            $this->login_model->insert_data('attribute_multi_values', $ins_data);
                        }
                        
                    }
                    $this->session->set_flashdata('success', 'Attribute added successfully.');
                    $t=1;
                    }
                 } else {
                  //  $this->session->set_flashdata('error', 'Attribute Name Already Exists.');
                }
                
                
            }
            if($t!=1){
                $this->session->set_flashdata('error', 'Attribute Name Already Exists.');
            }
            
           // print_r($data);
           // $c=array_combine($attribute_name_data,$attribute_value_data);
            
//foreach ($attribute_name_data as $key => $value) {
//    $attribute_name=$value;
//    $attribute_value=$attribute_value_data[$key];
//    if(!empty($attribute_name) && !empty($attribute_value)){
//        $data=array('category_id'=>$category_id,'attribute_name'=>$attribute_name,'attribute_value'=>$attribute_value,'attribute_status'=>1);
//    $this->login_model->insert_data('attributes', $data);
//    
//    }
//    $this->session->set_flashdata('success', 'Attribute added successfully.');
//   
//}
//print_r($c);die();
                //$this->login_model->insert_data('attribute', $data);
                
            redirect('admin/attribute_list');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_new_attributes',$data_array);
            $this->load->view('admin/footer');
        }
    }
    function edit_new_attributes() {
        $where=array('category_status'=>1);
     $data_array['category'] = $this->login_model->get_column_data_where('category','',$where);
        if ($this->input->post('submit')) {
           // $data = $this->input->post();
            $attribute_id=$this->input->post('attribute_id');
            $where_attribute_id = array('attribute_id' => $attribute_id);
            
            $category_id = $this->input->post('category_id');
            $attribute_name = $this->input->post('attribute_name');
            $attribute_value_data = $this->input->post('attribute_value');
            $explode=  explode(',', $attribute_value_data);
            
            
               // print_r($explode);die();
                $ch = array("attribute_name" => strtoupper($attribute_name),'attribute_id !='=>$attribute_id, 'category_id' => $category_id);
                $rec = $this->login_model->get_data_where_condition('attributes', $ch);
                if (empty($rec)) {
                    if(!empty($attribute_name) && !empty($attribute_value_data)){
                    $data=array('category_id'=>$category_id,'attribute_name'=>$attribute_name);
                    // ,'attribute_value'=>$attribute_value
                   // $last_id=$this->login_model->insert_data('attributes', $data);
                    $this->login_model->update_data('attributes', $data, $where_attribute_id);
                   // $delete = $this->login_model->delete_record('attribute_multi_values', $where_attribute_id);
                    foreach ($explode as $value) {
                            if(!empty($value)){
                                $ch_attri_value = array("attribute_value_name" => strtoupper($value),'attribute_id'=>$attribute_id);
                                $rec_attri_value = $this->login_model->get_data_where_condition('attribute_multi_values', $ch_attri_value);
                                if (empty($rec_attri_value)) {
                                $ins_data=array('attribute_id'=>$attribute_id,'attribute_value_name'=>$value);
                                $this->login_model->insert_data('attribute_multi_values', $ins_data);
                                }else{

                                }
                            }

                    }  
                    
                    
                    
                    }
                    $this->session->set_flashdata('status', 'Attribute Updated successfully');
                 } else {
                    $this->session->set_flashdata('error', 'Attribute Name Already Exists.');
                }
            
            redirect('admin/attribute_list');
        } else {
            $attribute_id = $this->uri->segment(3);
            if (!empty($attribute_id)) {

                $where = array('attribute_id' => $attribute_id);
                $data_array['attribute_details'] = $this->login_model->get_data_where_condition('attributes', $where);
                $data_array['attribute_values'] = $this->login_model->get_data_where_condition('attribute_multi_values', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/update/update_new_attributes', $data_array);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/attribute_list');
            }
        }
    }
    function attribute_list() {
 	
       // $where = array('attribute_status'=>1);
        
        $data_array['attribute_list'] = $this->login_model->get_record_join_two_table('category','attributes',$id1='category_id',$id2='category_id',$column='',$where='');
        
        $data_array['attribute_details'] = $this->login_model->get_record_join_two_table('attributes','attribute_multi_values',$id1='attribute_id',$id2='attribute_id',$column='',$where='');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/attribute_list_view', $data_array);
        $this->load->view('admin/footer');
    }
    function get_attributes_by_category_id() {
        $category_id = $this->input->post('category_id');
        $subcat=$this->input->post('subcat');
        $where = array('s_category_id'=>$category_id);
        $data_array['attributes_detail'] = $this->login_model->get_data_where_condition('subcategory',$where);
        $data_array['subcat_values'] = $subcat;
//        print_r($data_array['attribute_values']);die();
        $this->load->view('admin/ajax_attribute_details_view', $data_array);
    }
    function get_product() {

        $cat_id = $this->input->post('category_id');
        $where = array('product_category_id' => $cat_id);
        $table = "product";
        $data['product'] = $this->login_model->get_record_where($table, $where);
         $this->load->view('admin/add/add_product_combo', $data);
    }
    function add_attribute() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $n_width = 200;
            $n_height = 200;
            $path="http://".$_SERVER['HTTP_HOST']."/violet/uploads/attribute/";
	   $thumb_source="http://".$_SERVER['HTTP_HOST']."/violet/uploads/attribute/thumb_img";
            $user_image = '';

            if ($_FILES['attribute_image']['name']) {
                $user_image = $_FILES['attribute_image']['name'];
            }
            $attachment = $_FILES['attribute_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["attribute_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "attribute_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['attribute_image']['tmp_name'], "./uploads/attribute/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/attribute_list');
                }
            }
            $data['attribute_image'] = $imagename;

            unset($data['submit']);

            $ch = array("attribute_name" => strtoupper($this->input->post("attribute_name")));
            $rec = $this->login_model->get_data_where_condition('attribute', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('attribute', $data);
                $this->session->set_flashdata('status', 'attribute added successfully');
                $path = './uploads/attribute/';
                $path1 = './uploads/attribute/thumb_img/';
                $this->createThumbs($path, $path1, $file_name);
            } else {
                $this->session->set_flashdata('error', 'attribute already exist');
            }
            redirect('admin/attribute_list');
        } else {
            $data['category'] = $this->login_model->get_record('category');
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_attribute', $data);
            $this->load->view('admin/footer');
        }
    }

    function edit_attribute() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('attibute_id' => $this->input->post('attibute_id'));
            unset($data['attibute_id']);
            unset($data['submit']);

            $user_image = '';

            if ($_FILES['attribute_image']['name']) {
                $user_image = $_FILES['attribute_image']['name'];
            }
            $attachment = $_FILES['attribute_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["attribute_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "attribute_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['attribute_image']['tmp_name'], "./uploads/attribute/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/attribute_list');
                }
            } else {
                $imagename = $this->input->post('attribute_image');
            }
            $data['attribute_image'] = $imagename;

            $operator_id = $this->input->post('attribute_id');
            $name = $this->input->post('attribute_name');
            $where = array('attribute_id' => $operator_id);

            $data1 = array('attribute_name' => strtoupper($name), 'attribute_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('attribute', $data1);
            if (empty($rec)) {
                unset($data['attribute_id']);
                unset($data['submit']);
                $this->login_model->update_data('attribute', $data, $where);
                $this->session->set_flashdata('status', 'attribute Update successfully');
                 $path = './uploads/attribute/';
                $path1 = './uploads/attribute/thumb_img/';
                $this->createThumbs($path, $path1, $file_name);
            } else {
                $this->session->set_flashdata('error', 'attribute already exist');
            }

            redirect('admin/attribute_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('attribute_id' => $category_id);
                $data['category'] = $this->login_model->get_record('category');
                $data['attribute_details'] = $this->login_model->get_data_where_condition('attribute', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_attribute', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/attribute_list');
            }
        }
    }
        function payment_type() {
        $data['payment_type_list'] = $this->login_model->get_column_data_where('payment_type');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/payment_type_list_view', $data);
        $this->load->view('admin/footer');
    }
     function add_payment_type() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);

            $ch = array("payment_type_name" => strtoupper($this->input->post("payment_type_name")));
            $rec = $this->login_model->get_data_where_condition('payment_type', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('payment_type', $data);
                $this->session->set_flashdata('status', 'payment type added successfully');
             } else {
                $this->session->set_flashdata('error', 'payment type already exist');
            }
            redirect('admin/payment_type');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_payment_type');
            $this->load->view('admin/footer');
        }
    }

    function edit_payment_type() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('payment_type_id' => $this->input->post('payment_type_id'));
            unset($data['payment_type_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('payment_type_id');
            $name = $this->input->post('payment_type_name');
            $where = array('payment_type_id' => $operator_id);

            $data1 = array('payment_type_name' => strtoupper($name), 'payment_type_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('payment_type', $data1);
            if (empty($rec)) {
                unset($data['payment_type_id']);
                unset($data['submit']);
                $this->login_model->update_data('payment_type', $data, $where);
                $this->session->set_flashdata('status', 'payment type Update successfully');
             } else {
                $this->session->set_flashdata('error', 'payment type already exist');
            }

            redirect('admin/payment_type');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('payment_type_id' => $category_id);
                $data['payment_type_details'] = $this->login_model->get_data_where_condition('payment_type', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_payment_type', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/payment_type');
            }
        }
    }
     function pincode_list() {
        $data['pincode_list'] = $this->login_model->get_column_data_where('pincode');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/pincode_list_view', $data);
        $this->load->view('admin/footer');
    }
     function add_pincode() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);

            $ch = array("pincode" => strtoupper($this->input->post("pincode")));
            $rec = $this->login_model->get_data_where_condition('pincode', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('pincode', $data);
                $this->session->set_flashdata('status', 'pincode added successfully');
             } else {
                $this->session->set_flashdata('error', 'pincode already exist');
            }
            redirect('admin/pincode_list');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_pincode');
            $this->load->view('admin/footer');
        }
    }
	 
    function edit_pincode() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('pincode_id' => $this->input->post('pincode_id'));
            unset($data['pincode_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('pincode_id');
            $name = $this->input->post('pincode');
            $where = array('pincode_id' => $operator_id);

            $data1 = array('pincode' => strtoupper($name), 'pincode_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('pincode', $data1);
            if (empty($rec)) {
                unset($data['pincode_id']);
                unset($data['submit']);
                $this->login_model->update_data('pincode', $data, $where);
                $this->session->set_flashdata('status', 'pincodeUpdate successfully');
             } else {
                $this->session->set_flashdata('error', 'pincode already exist');
            }

            redirect('admin/pincode_list');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('pincode_id' => $category_id);
                $data['pincode_details'] = $this->login_model->get_data_where_condition('pincode', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_pincode', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/pincode_list');
            }
        }
    }
    function about_us() {
        $data['about_us'] = $this->login_model->get_column_data_where('about_us');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/about_us_view', $data);
        $this->load->view('admin/footer');
    }
     function add_about_content() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);

            $ch = array("title" => strtoupper($this->input->post("title")));
            $rec = $this->login_model->get_data_where_condition('about_us', $ch);
            if (empty($rec)) {
                $this->login_model->insert_data('about_us', $data);
                $this->session->set_flashdata('status', 'content added successfully');
             } else {
                $this->session->set_flashdata('error', 'content already exist');
            }
            redirect('admin/about_us');
        } else {
            
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_about_content');
            $this->load->view('admin/footer');
        }
    }

    function edit_about_content() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('about_us_id' => $this->input->post('about_us_id'));
            unset($data['about_us_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('about_us_id');
            $name = $this->input->post('title');
            $where = array('about_us_id' => $operator_id);

            $data1 = array('title' => strtoupper($name), 'about_us_id !=' => $operator_id);

            $rec = $this->login_model->get_data_where_condition('about_us', $data1);
            if (empty($rec)) {
                unset($data['about_us_id']);
                unset($data['submit']);
                $this->login_model->update_data('about_us', $data, $where);
                $this->session->set_flashdata('status', 'about_us Update successfully');
             } else {
                $this->session->set_flashdata('error', 'about_us already exist');
            }

            redirect('admin/about_us');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('about_us_id' => $category_id);
                $data['about_us'] = $this->login_model->get_data_where_condition('about_us', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_about_content', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/about_us');
            }
        }
    }

//------------------------------------------ 13-Jan-2016------------------------------
function edit_minimum_checkout() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('minimum_checkout_id' => $this->input->post('minimum_checkout_id'));
            unset($data['minimum_checkout_id']);
            unset($data['submit']);
            
            $this->login_model->update_data('minimum_checkout', $data, $where);
            $this->session->set_flashdata('status', 'Minimum Checkout Update successfully');
             

            redirect('admin/minimum_checkout_list');
        } else {
            $minimum_checkout_id = $this->uri->segment(3);
            if (!empty($minimum_checkout_id)) {

                $where = array('minimum_checkout_id' => $minimum_checkout_id);
                $data['minimum_checkout_details'] = $this->login_model->get_data_where_condition('minimum_checkout', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/update/update_minimum_checkout', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/minimum_checkout_list');
            }
        }
    }
    function minimum_checkout_list() {
       // $where=array('status'=>1);
$data['minimum_checkout_list'] = $this->login_model->get_column_data_where('minimum_checkout','',$where='');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/minimum_checkout_list_view', $data);
        $this->load->view('admin/footer');
    }
    function edit_delivery_cost_management() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('delivery_cost_id' => $this->input->post('delivery_cost_id'));
            unset($data['delivery_cost_id']);
            unset($data['submit']);
            
            $this->login_model->update_data('delivery_cost_management', $data, $where);
            $this->session->set_flashdata('status', 'Delivery Cost Update successfully');
             

            redirect('admin/delivery_cost_management_list');
        } else {
            $delivery_cost_id = $this->uri->segment(3);
            if (!empty($delivery_cost_id)) {

                $where = array('delivery_cost_id' => $delivery_cost_id);
                $data['delivery_cost_details'] = $this->login_model->get_data_where_condition('delivery_cost_management', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/update/update_delivery_cost_management', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/delivery_cost_management_list');
            }
        }
    }
    function delivery_cost_management_list() {
       // $where=array('status'=>1);
$data['delivery_cost_management_list'] = $this->login_model->get_column_data_where('delivery_cost_management','',$where='');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/delivery_cost_management_list_view', $data);
        $this->load->view('admin/footer');
    }
	function edit_shipping_schedule_date() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();

            $where = array('shipping_schedule_id' => $this->input->post('shipping_schedule_id'));
            unset($data['shipping_schedule_id']);
            unset($data['submit']);
            
            $this->login_model->update_data('shipping_schedule_date', $data, $where);
            $this->session->set_flashdata('status', 'Shipping Schedule Updated successfully');
             

            redirect('admin/shipping_schedule_date_list');
        } else {
            $shipping_schedule_id = $this->uri->segment(3);
            if (!empty($shipping_schedule_id)) {
              //  $data['schedule_list'] = $this->login_model->get_column_data_where('master_shipping_schedule');
                $where = array('shipping_schedule_id' => $shipping_schedule_id);
                $data['shipping_schedule_date_details'] = $this->login_model->get_data_where_condition('shipping_schedule_date', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/update/update_schedule_shipping_date', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/shipping_schedule_date_list');
            }
        }
    }
    function shipping_schedule_date_list() {
       // $where=array('status'=>1);
//$data['shipping_schedule_date_list'] = $this->login_model->get_column_data_where('shipping_schedule_date','',$where='');
$data_array['shipping_schedule_date_list'] = $this->login_model->get_column_data_where('shipping_schedule_date',$where='');
        $this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/shipping_schedule_date_list_view', $data_array);
        $this->load->view('admin/footer');
    }
  function shipping_delivery() {
  	$where = array('shipping_delivery_status' =>1);
        $data['shipping_delivery'] = $this->login_model->get_data_where_condition('shipping_delivery',$where);
		$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/shipping_us_view', $data);
        $this->load->view('admin/footer');
    }
  function edit_shipping_delivery_content() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('shipping_delivery_id' => $this->input->post('shipping_delivery_id'));
            unset($data['shipping_delivery_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('shipping_delivery_id');
            $name = $this->input->post('title');
            $where = array('shipping_delivery_id' => $operator_id);

            
                unset($data['shipping_delivery_id']);
                unset($data['submit']);
                $this->login_model->update_data('shipping_delivery', $data, $where);
                $this->session->set_flashdata('status', 'Shipping and Delivery Update successfully');
            

            redirect('admin/shipping_delivery');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('shipping_delivery_id' => $category_id);
                $data['shipping_delivery'] = $this->login_model->get_data_where_condition('shipping_delivery', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_shipping_delivery_content', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/shipping_delivery');
            }
        }
    }
function privecy_policy() {
  		$where = array('privecy_policy_status' =>1);
        $data['privecy_policy'] = $this->login_model->get_data_where_condition('privecy_policy',$where);
		$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/privecy_policy_view', $data);
        $this->load->view('admin/footer');
    }
  function edit_privecy_policy_content() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('privecy_policy_id' => $this->input->post('privecy_policy_id'));
            unset($data['privecy_policy_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('privecy_policy_id');
            $name = $this->input->post('title');
            $where = array('privecy_policy_id' => $operator_id);

            
                unset($data['privecy_policy_id']);
                unset($data['submit']);
                $this->login_model->update_data('privecy_policy', $data, $where);
                $this->session->set_flashdata('status', 'Privecy policy Update successfully');
            

            redirect('admin/privecy_policy');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('privecy_policy_id' => $category_id);
                $data['privecy_policy'] = $this->login_model->get_data_where_condition('privecy_policy', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_privecy_policy_content', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/privecy_policy');
            }
        }
    }
function terms_conditions() {
  		$where = array('terms_conditions_status' =>1);
        $data['terms_conditions'] = $this->login_model->get_data_where_condition('terms_conditions',$where);
		$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/terms_conditions_view', $data);
        $this->load->view('admin/footer');
    }
  function edit_terms_conditions() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('terms_conditions_id' => $this->input->post('terms_conditions_id'));
            unset($data['terms_conditions_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('terms_conditions_id');
            $name = $this->input->post('title');
            $where = array('terms_conditions_id' => $operator_id);

            
                unset($data['terms_conditions_id']);
                unset($data['submit']);
                $this->login_model->update_data('terms_conditions', $data, $where);
                $this->session->set_flashdata('status', 'Terms & Condtions Update successfully');
            

            redirect('admin/terms_conditions');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('terms_conditions_id' => $category_id);
                $data['terms_conditions'] = $this->login_model->get_data_where_condition('terms_conditions', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_terms_conditions', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/terms_conditions');
            }
        }
    }
function contact_us() {
  		$where = array('contact_us_status' =>1);
        $data['contact_us'] = $this->login_model->get_data_where_condition('contact_us',$where);
		$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/contact_us_view', $data);
        $this->load->view('admin/footer');
    }
  function edit_contact_us() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('contact_us_id' => $this->input->post('contact_us_id'));
            unset($data['contact_us_id']);
            unset($data['submit']);
            $operator_id = $this->input->post('contact_us_id');
            $name = $this->input->post('title');
            $where = array('contact_us_id' => $operator_id);

            
                unset($data['contact_us_id']);
                unset($data['submit']);
                $this->login_model->update_data('contact_us', $data, $where);
                $this->session->set_flashdata('status', 'Contact Us details Update successfully');
            

            redirect('admin/contact_us');
        } else {
            $category_id = $this->uri->segment(3);
            if (!empty($category_id)) {

                $where = array('contact_us_id' => $category_id);
                $data['contact_us'] = $this->login_model->get_data_where_condition('contact_us', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_contact_us', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/contact_us');
            }
        }
    }
    
    // Slider list
    function slider_list() {
        $data['slider_list'] = $this->login_model->get_column_data_where('slider');
	$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/slider_list_view', $data);
        $this->load->view('admin/footer');
    }
    
     function add_slider() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            
         $user_image = '';

            if ($_FILES['slider_image']['name']) {
                $user_image = $_FILES['slider_image']['name'];
            }
            $attachment = $_FILES['slider_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["slider_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "slider_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['slider_image']['tmp_name'], "./uploads/slider/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/add_slider');
                }
            }
            $data['slider_image'] = $imagename; 

            unset($data['submit']);
		
                $this->login_model->insert_data('slider', $data);
                $this->session->set_flashdata('status', 'Slider added successfully');
                
           
            redirect('admin/slider_list');
        } else {
            $this->load->view('admin/menu');
            $this->load->view('admin/header');
            $this->load->view('admin/add/add_slider');
            $this->load->view('admin/footer');
        }
    }

    
    function edit_slider() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('slider_id' => $this->input->post('slider_id'));
            unset($data['slider_id']);
            unset($data['submit']);

            $user_image = '';

            if ($_FILES['slider_image']['name']) {
                $user_image = $_FILES['category_image']['name'];
            }
            $attachment = $_FILES['slider_image']['name'];

            if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["slider_image"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "slider_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['slider_image']['tmp_name'], "./uploads/slider/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/edit_slider/'.$this->input->post('slider_id'));
                }
            } else {
                $imagename = $this->input->post('slider_image');
            }
            $data['slider_image'] = $imagename;
			
            
                unset($data['slider_id']);
                unset($data['submit']);
                $this->login_model->update_data('slider', $data, $where);
                $this->session->set_flashdata('status', 'Slider Update successfully');
              

            redirect('admin/slider_list');
        } else {
            $slider_id = $this->uri->segment(3);
            if (!empty($slider_id)) {

                $where = array('slider_id' => $slider_id);
                $data['slider_details'] = $this->login_model->get_data_where_condition('slider', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_slider', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/slider_list');
            }
        }
    }
      // Logo list
    function logo_list() {
    
        $data['logo_list'] = $this->login_model->get_column_data_where('logo');
	$this->load->view('admin/menu');
        $this->load->view('admin/header');
        $this->load->view('admin/listing/logo_list_view', $data);
        $this->load->view('admin/footer');
    }
    function edit_logo() {
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $where = array('logo_id' => $this->input->post('logo_id'));
            unset($data['logo_id']);
            unset($data['submit']);
        
            $user_image = '';
	     if ($_FILES['app_logo']['name']) {
                $user_image = $_FILES['app_logo']['name'];
            }
            $attachment = $_FILES['app_logo']['name'];
		if (!empty($attachment)) {
                $file_extension = explode(".", $_FILES["app_logo"]["name"]);
                $new_extension = strtolower(end($file_extension));
                $today = time();
                $custom_name = "app_logo_img" . $today;
                $file_name = $custom_name . "." . $new_extension;

                if ($new_extension == 'png' || $new_extension == 'jpeg' || $new_extension == 'jpg' || $new_extension == 'bmp') {
                    move_uploaded_file($_FILES['app_logo']['tmp_name'], "./uploads/logo/" . $file_name);
                    $imagename = $file_name;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/edit_logo/'.$this->input->post('log_id'));
                }
            } else {
                $imagename = $this->input->post('app_logo');
            }
            $data['app_logo'] = $imagename;
			
		// website logo
		 $user_image1 = '';
	     if ($_FILES['website_logo']['name']) {
                $user_image1 = $_FILES['website_logo']['name'];
            }
            $attachment1 = $_FILES['website_logo']['name'];
		if (!empty($attachment1)) {
                $file_extension1 = explode(".", $_FILES["website_logo"]["name"]);
                $new_extension1 = strtolower(end($file_extension1));
                $today1 = time();
                $custom_name1 = "website_logo_img" . $today1;
                $file_name1 = $custom_name1 . "." . $new_extension1;

                if ($new_extension1 == 'png' || $new_extension1 == 'jpeg' || $new_extension1 == 'jpg' || $new_extension1 == 'bmp') {
                    move_uploaded_file($_FILES['website_logo']['tmp_name'], "./uploads/logo/" . $file_name1);
                    $imagename1 = $file_name1;
                } else {
                    $this->session->set_flashdata('error', 'Invalid Image type');
                    redirect('admin/edit_logo/'.$this->input->post('log_id'));
                }
            } else {
                $imagename = $this->input->post('website_logo');
            }
            $data['website_logo'] = $imagename1;
            unset($data['logo_id']);
                unset($data['submit']);
                $this->login_model->update_data('logo', $data, $where);
                $this->session->set_flashdata('status', 'Slider Update successfully');
              

            redirect('admin/logo_list');
        } else {
            $logo_id = $this->uri->segment(3);
            if (!empty($logo_id)) {

                $where = array('logo_id' => $logo_id);
                $data['logo_details'] = $this->login_model->get_data_where_condition('logo', $where);
                $this->load->view('admin/menu');
                $this->load->view('admin/header');
                $this->load->view('admin/add/add_logo', $data);
                $this->load->view('admin/footer');
            } else {
                redirect('admin/logo_list');
            }
        }
    }
    function check_msg_balence()
{
	$authKey = msg_api_key;
	$url="http://sms.bulksmsserviceproviders.com/api/balance.php?authkey=$authKey&route=4";
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"rquest\"\r\n\r\nproposal_details\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"bid_id\"\r\n\r\n49\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
    "postman-token: 901e6ff1-c389-fdb8-a093-3d47d75727b8"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	return str_replace('"', '', $response);
  //return $response;
}
	 
} 
//------------------------------------------------------------------------------------
//----end class----//
}
