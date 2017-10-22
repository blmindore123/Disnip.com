<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Website extends CI_Controller {

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
        
        define('subcategory_thumb_image', base_url('uploads/subcategory/thumb_img/'));
        define('product_image', base_url('uploads/product/'));
        define('product_thumb_image', base_url('uploads/product/thumb_img/'));
        define('invoice_image', base_url('webassets/images/home/'));
        define('attribute_image', base_url('uploads/attribute/'));
        define('slider_image', base_url('uploads/slider/'));
         define('logo', base_url('uploads/logo/'));
        define('website_logo', $this->website_logo());
        define("SESSIONKEY", $this->session->userdata("engguserid"));
         $logo = $this->login_model->get_record('logo');
        define("websitelogo" ,logo."/".$logo[0]->website_logo);
    }

    function website_logo() {
        $logo = $this->login_model->get_record('logo');
        return $logo[0]->website_logo;
    }

    function index() {
        $where = array('category_status' => '1');
        $data['category'] = $this->login_model->get_data_where_condition('category', $where);
         $where = array('slider_status' => '1');
        $data['slider'] = $this->login_model->get_data_where_condition('slider', $where);
        $where = array('product_status' => '1');
        $data['letest_products'] = $this->login_model->get_data_where_condition('product', $where,'10','product_id');

        $this->load->view('website/header');
        $this->load->view('website/index', $data);
        $this->load->view('website/footer');
    }

    function shop() {
         $cat_id = base64_decode($this->uri->segment(3));
         $scat_id = base64_decode($this->uri->segment(4));
      $where = array('product_category_id' => $cat_id,'product_subcategory_id' => $scat_id);
        $data['product'] = $this->login_model->get_data_where_condition('product', $where,'','product_id');
        
        $data['cost'] = $this->login_model->get_column_data_where('product','MAX(product_cost) AS cost',$where);
        
        $this->load->view('website/header');
        $this->load->view('website/shop',$data);
        $this->load->view('website/footer');
    }
     function ajax_shop() {
 $data = $this->input->post();
     $selected=$data['selected'];
     $min=$data['min'];
     $max=$data['max'];
     $cat=$data['cat'];    
     $subcat=$data['sub_cat'];
if($selected==1){
    $order=' ORDER BY product_id DESC';
}elseif($selected==2){
    $order=' ORDER BY product_cost ASC';
}else{
    $order=' ORDER BY product_cost DESC';
}
        $data1['product'] = $this->login_model->get_query_result('SELECT * from product where product_category_id='.$cat.' and product_subcategory_id='.$subcat.' AND product_cost BETWEEN '.$min.' AND '.$max.' '.$order);
       
       
        $this->load->view('website/ajax_shop',$data1);
   
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('website');
    }

    /* Contactus page */

    function contactus() {
        
        $where = array('contact_us_status' => 1);
        $data['contactus'] = $this->login_model->get_data_where_condition('contact_us', $where);
        if ($this->input->post('submit')) {
  
            $data = $this->input->post();
            unset($data['submit']);
		
            $this->login_model->insert_data('user_contact_us', $data);

            $user_email=$data['user_contact_email'];
            $subject="Contact to Disnip.";
            $mail_msg3 .='Name:'.$data['contact_user_name']."<br>";
            $mail_msg3 .='Mobile:'.$data['user_contact_phone']."<br>";
            $mail_msg3 .='Email:'.$data['user_contact_email']."<br>";
            $mail_msg3 .= 'subject-'.$data['user_contact_subject']."<br>";
            $mail_msg3 .='Message:'.$data['user_contact_msg'];
            $headers = "MIME-Version: 1.0" . "\r\n";
			
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: Disnip" .$data['contactus'][0]->company_email. "\r\n" . "Reply-To: " .$data['contactus'][0]->company_email. "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail = mail($user_email, $subject, $mail_msg3, $headers);
            

            $this->session->set_flashdata('status', 'Thanks for Contact to Disnip, we will contact as soon as possible');
            redirect('website/contactus');
        } else{
        
        $this->load->view('website/header');
        $this->load->view("website/contactus",$data);
        $this->load->view('website/footer');
        }
    }
    
      /* books on demand page */

    function booksondemand() {
           $where = array('contact_us_status' => 1);
        $data1['contactus'] = $this->login_model->get_data_where_condition('contact_us', $where);
        if ($this->input->post('submit')) {
  
            $data = $this->input->post();
            unset($data['submit']);
		
            $this->login_model->insert_data('user_booksondemand', $data);

           
            $subject="Request For Books on Demand";
            $adminemail=$data1['contactus'][0]->company_email;
            $mail1 ='Name:'.$data['booksondemand_FirstName']." ".$data['booksondemand_LastName']."<br>";
            $mail1 .='Mobile:'.$data['booksondemand_phone']."<br>";
            $mail1 .='Email:'.$data['booksondemand_email']."<br>";
            $mail1 .='Message:'.$data['booksondemand_msg'];
            $headers1 = "MIME-Version: 1.0" . "\r\n";
            $headers1 .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers1 .= "From:" .$data['booksondemand_email']. "\r\n" . "Reply-To: " .$data['booksondemand_email']. "\r\n" . "X-Mailer: PHP/" . phpversion();
		    $mail = mail($adminemail, $subject, $mail1, $headers1);
		
		    $user_email=$data['booksondemand_email'];
		    $subject3="Request For Books on Demand";
		    $mail_msg3 .='Hello! '.$data['booksondemand_FirstName']." ".$data['booksondemand_LastName']."<br>";
		    $mail_msg3 .='Thanks For Contact to Disnip!'."<br>";
            $mail_msg3 .= "We Will shortly connect you!."."<br>";
			$mail_msg3 .= "Request for Books on Demand: ".$data['booksondemand_msg']."<br>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: Disnip" .$data1['contactus'][0]->company_email. "\r\n" . "Reply-To: " .$data1['contactus'][0]->company_email. "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail15 = mail($user_email, $subject3, $mail_msg3, $headers);
            

            $this->session->set_flashdata('status', 'Your Request is Successfully Submitted to Disnip!');
            redirect('website/booksondemand');
        } else{
        
      
        
        $this->load->view('website/header');
        $this->load->view("website/booksondemand");
        $this->load->view('website/footer');
    }
    }
    
    
    

   function signup() {

        if ($this->session->userdata("engguserid") == FALSE) {

            if ($this->input->post('submit')) {
                $data = $this->input->post();
                unset($data['submit']);
                unset($data['user_cpwd']);
                unset($data['check']);
                $data['user_password']=md5($data['user_password']);
               
                $id = $this->login_model->insert_data('user', $data);
                $this->session->set_flashdata('status', 'Register successfully');
                $this->session->set_userdata("engguserid", $id);

                redirect('website');
            } else {
           redirect('website');
            }
        } else {
            redirect('website');
        }
    }

    /**/

    function login() {
        if ($this->session->userdata("engguserid") == FALSE) {
            $red=$this->uri->segment(3);
            if ($this->input->post('submit')) {
                $data = $this->input->post();

                unset($data['submit']);

        
                $user_table = 'user';
                $where = array('user_name'=>  $this->input->post('user_email'),'user_password'=>  md5($this->input->post('password')));
				$admin_details = $this->login_model->get_record_where($user_table,$where);
				
			 if($admin_details == FALSE){
                   $this->session->set_flashdata('lerror', 'Invalid Email or Password');
              redirect('website/login');
                } else {
                	if($admin_details[0]->user_status=='1'){
                		 $this->session->set_userdata(array('user_id'=>$admin_details[0]->user_id,'user_name'=>$admin_details[0]->user_name,'user_email'=>$admin_details[0]->user_email,'user_contact'=>$admin_details[0]->user_contact_no )); 
                                 $this->session->set_userdata("engguserid", $admin_details[0]->user_id);
                                 if(!empty($red)){
                                   redirect('website/'.$red);   
                                 }else{
                    redirect('website');
                                 }
                	}else{
                		$this->session->set_flashdata('lerror', 'This Account is suspended by Book Store');
              redirect('website/login');
                	}
                   
                }
            
            } else {
                $this->load->view('website/header');
                $this->load->view('website/login');
                $this->load->view('website/footer');
            }
        } else {
            redirect('website');
        }
    }
  function subcategories() {
      $cat_id = base64_decode($this->uri->segment(3));
       $where2 = array('category_status' => '1',);
         $data['category'] = $this->login_model->get_record_join_two_table_groupby('category','subcategory','category_id','s_category_id','',$where2,'category_id');
      $where = array('category_id' => $cat_id);
        $data['category_main'] = $this->login_model->get_data_where_condition('category', $where);
        $where1 = array('s_category_id' => $cat_id ,'subcategory_status' => '1');
        $data['sabcategory'] = $this->login_model->get_data_where_condition('subcategory', $where1);
        if(empty($data['sabcategory'])){
           redirect('website/shop/'.$this->uri->segment(3).'/'. base64_encode(1)); 
        }
        $this->load->view('website/header');
        $this->load->view('website/subcategories',$data);
        $this->load->view('website/footer');
    }
    
        function product_detail() {
         $pro_id = base64_decode($this->uri->segment(3));
       //  $scat_id = base64_decode($this->uri->segment(4));
      $where = array('product_id' => $pro_id);
        $data['product'] = $this->login_model->get_data_where_condition('product', $where);
         $where = array('product_status' => '1');
        $data['letest_products'] = $this->login_model->get_data_where_condition('product', $where,'10','product_id');
        $this->load->view('website/header');
        $this->load->view('website/product_detail',$data);
        $this->load->view('website/footer');
    }
        function shipping() {
      if(!empty(SESSIONKEY)){
          $where=array('user_id'=>SESSIONKEY);
		
		$data['address'] = $this->login_model->get_column_data_where('user_address','',$where);
        $this->load->view('website/header');
        $this->load->view('website/shop-shipping',$data);
      $this->load->view('website/footer');
      
      }else{
          redirect('website/login/cart');
      }
    }
         function order_confirmation() {
          if(!empty(SESSIONKEY)){
               $where=array('user_id'=>SESSIONKEY);
		
		$data['address'] = $this->login_model->get_column_data_where('user_address','',$where);
        $this->load->view('website/header');
        $this->load->view('website/shop-order-confirmation',$data);
        $this->load->view('website/footer');
      
      }else{
          redirect('website/login/cart');
      }
        
    }
         function cart() {
      
        $this->load->view('website/header');
        $this->load->view('website/shop-order');
        $this->load->view('website/footer');
    }
            function about() {
      
        $this->load->view('website/header');
        $this->load->view('website/about_us');
        $this->load->view('website/footer');
    }
    
    
           function forgot_pass() {
       if ($this->input->post('submit')) {
                    $where = array('contact_us_status' => 1);
             $data1['contactus'] = $this->login_model->get_data_where_condition('contact_us', $where);
           $pass=rand('111111','999999');
                $data = $this->input->post();
                
                	$where1=array('user_email'=>$data['user_email']);
			$offer['user_password']=md5($pass);
                        
             $datause= $this->login_model->get_data_where_condition('user', $where1);
             if(!empty($datause)){
			$offer_update=$this->login_model->update_data('user', $offer, $where1);
         $subject="Request New Password";
            $adminemail=$data['user_email'];
            $mail1 ='Password:'.$pass."<br>";
         
            $headers1 = "MIME-Version: 1.0" . "\r\n";
            $headers1 .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers1 .= "From: Disnip" .$data1['contactus'][0]->company_email. "\r\n" . "Reply-To: " .$data1['contactus'][0]->company_email. "\r\n" . "X-Mailer: PHP/" . phpversion();
		    $mail = mail($adminemail, $subject, $mail1, $headers1);
		
                
                    redirect('website/login');
             }else{
                 $this->session->set_flashdata('lerror', 'This Account is not available');
             }
                
       }
        $this->load->view('website/header');
        $this->load->view('website/forgot_password');
        $this->load->view('website/footer');
    }
        function orders_history() {
       $data1['order'] = $this->login_model->get_query_result('SELECT * from `order` inner join payment on payment_deliver_id=delivery_id inner join product on product_id=order_product_id where order_user_id='.SESSIONKEY.' ORDER BY order_id DESC');
        $this->load->view('website/header');
        $this->load->view('website/order_history',$data1);
        $this->load->view('website/footer');
    }
            function search() {
                  $data = $this->input->post();

                
       $data1['product'] = $this->login_model->get_query_result("SELECT * from `product` inner join category on product_category_id=category_id inner join subcategory on product_subcategory_id=subcategory_id where  `product_name` LIKE '%".$data['search']."%' OR `category_name` LIKE '%".$data['search']. "%'  OR `subcategory_name` LIKE '%".$data['search']. "%'  OR `product_author` LIKE '%".$data['search']. "%'  OR `product_publication` LIKE '%".$data['search']. "%'  OR `product_edition` LIKE '%".$data['search']."%'");
        $this->load->view('website/header');
        $this->load->view('website/search',$data1);
        $this->load->view('website/footer');
    }
    
         function payment() {
             if(!empty(SESSIONKEY)){
                  $where=array('user_id'=>SESSIONKEY);
		
		$data['address'] = $this->login_model->get_column_data_where('user_address','',$where);
 $this->load->view('website/header');
        $this->load->view('website/shop-payment',$data);
        $this->load->view('website/footer');
      
      }else{
          redirect('website/login');
      }
        
    }
    function get_order(){
       $cid=time();
        $this->session->set_userdata("txnid", $cid);
       // $this->session->set_userdata("txnid", 'COD');
  $this->session->set_userdata("pstatus", 'Success');
	$cod= $_POST['cod'];
	$orderdate = date('Y-m-d');
	$date = date('M d, Y');
	$showdate = date('M d, Y');
	$date = strtotime($date);
	$date = strtotime("+7 day", $date);
	$sheduled_date = date('M d, Y', $date);
	$store_date = date('Y-m-d', $date);
	$user_id=SESSIONKEY;
	$where=array('cart_user_id'=>$user_id);
	$cart = $this->login_model->get_column_data_where('cart','*',$where);
		$where_checkout=array('minimum_checkout_status'=>1);
                print_r($cart);
     	$minimum_checkout = $this->login_model->get_column_data_where('minimum_checkout','',$where_checkout);
		$minimum_cost=$minimum_checkout[0]->minimum_checkout_cost;
     	$where_deliver_charge=array('delivery_cost_status'=>1);
     	$shipping_cost = $this->login_model->get_column_data_where('delivery_cost_management','',$where_deliver_charge);
		$delivery_type=$shipping_cost[0]->delivery_cost_type;
		if($delivery_type=='2'){
			$delivery_charge=$shipping_cost[0]->delivery_price;
		}else if($delivery_type=='1'){
			$delivery_charge=0;
		}
	$where_address=array('user_id'=>$user_id);
	$address = $this->login_model->get_column_data_where('user_address','',$where_address);
	if(!empty($address)){
		if(!empty($cart)){
		$data['delivery_user_id']=$user_id;
		$data['delivery_date']=$store_date;
		$data['delivery_charge']=$delivery_charge;
		$user_name=$address[0]->user_name;
		$user_email=$address[0]->user_email;
		$data['delivery_address']=$address[0]->user_name.','.$address[0]->address1.' '.$address[0]->address2.','.$address[0]->user_city.','.$address[0]->user_pincode;
		 $deliver_id =  $this->login_model->insert_data('delivery', $data);
		 $data1['delivery_id']=$deliver_id;
		 $data1['order_user_id']=$user_id;
		 $main_total = '0';
		 foreach ($cart as  $value) {
			$data1['order_product_id']=$value->cart_product_id;
			$data1['order_quantity']=$value->cart_product_qty;
			$data1['order_unit_price']=$value->cart_product_price;
			$main_total = $main_total + ($value->cart_product_qty * $value->cart_product_price);
			$data1['order_date']=$orderdate;
			$order =  $this->login_model->insert_data('order', $data1);
		 }
		 $where_user_id=array('user_id'=>$user_id);
		$user_offer = $this->login_model->get_record_join_two_table('user','offers_list','offer_id','offer_id','',$where_user_id);
		if(!empty($user_offer)){
				$data2['apply_offer_amount']=$user_offer[0]->offer_amount;
		$data2['apply_offer_id']=$user_offer[0]->offer_id;
		}
                  $data2['payment_transaction_id']= $cid;
			$data2['payment_deliver_id']=$deliver_id;
		$data2['payment_user_id']=$user_id;
		$data2['payment_amount']=$main_total;
		$data2['payment_type']=1;
		$data2['payment_date']=$orderdate;
		$data2['payment_status']=2;
		$payment =  $this->login_model->insert_data('payment', $data2);
			if(!empty($user_offer))
			{
				$where=array('user_id'=>$user_id);
			$offer['offer_id']='0';
			$offer_update=$this->login_model->update_data('user', $offer, $where);
			}
		 //$path1='http://72.167.41.165/violet/images/logo.png';
		 $path1='http://blmindore.net/Shopper/websasstes/images/home/logo.png';
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
               	<p><strong><h3>Delivery Address:</h3></strong>' . $data['delivery_address'] . '</p>
                 <p>Order ID: '.$order.'</p>
                <p>Order Date: '.$orderdate .'</p>
                <p>Delivery Date: '.$sheduled_date.'</p>
                
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
					
			$join_with_order = "SELECT * FROM `order` join delivery on delivery.delivery_id = order.delivery_id join product on product.product_id = order.order_product_id where delivery.delivery_id = $deliver_id";
			// $join_with_order="SELECT * FROM `order` LEFT JOIN product on order.order_product_id = product.product_id where order_user_id=$user_id";
			$response_order_rec = mysql_query($join_with_order);
			$grandtotal=0;
			while ($row = mysql_fetch_array($response_order_rec)) {
$total=$row['order_unit_price'] * $row['order_quantity'];
				
				$mail_msg3 .= '<tr>
                        	<td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['product_name'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_quantity'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;">' . $row['order_unit_price'] . '</td>
                            <td style="border-right:1px solid #DDD; border-bottom:1px solid #ddd; padding:10px;"><i class="fa fa-rupee">â‚¹</i><span>' . $total . '</span></td>
                        </tr>';
					$grandtotal=$grandtotal+$total;
			}
			if($grandtotal>$minimum_cost)
		{
			$delivery_charge =0;
		}else{
				$delivery_charge=$delivery_charge;
		}
			$main_total=$grandtotal+$delivery_charge;
			// $total=$total+$delivery_charge;
			$mail_msg3 .= '</tbody>
                    <tfoot>
                    	<tr>
                            <td align="right" colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">
                            </td>
                            <td colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">    
                            	<p style="text-align:right;"><strong>Sub Total:</strong><i class="fa fa-rupee">â‚¹</i><span>' . $grandtotal . '</span></p>
                                <p style="text-align:right;"><strong>Shipping:</strong> <i class="fa fa-rupee">â‚¹</i>'.$delivery_charge.'</p>
                                <P style="text-align:right;"> <strong>Extra Charge:</strong> <i class="fa fa-rupee">â‚¹</i>00</P>
                            </td>
                        </tr>
                        <tr style="background:#eee;">
                        	<td align="right" colspan="5" style="border-bottom:1px solid #ddd; padding:10px;"><strong>Grand Total: <i class="fa fa-rupee">â‚¹</i><span>' . $main_total . '</span></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>

    </tbody>
    
    <tfoot style="background:#4D0684; text-align:center; color:#fff;">
        <tr>
        	<td style="color:#fff;"><p>Copyright Â© 2016 R-Shopper</p></td>
        <tr>
    </tfoot>
    
</table>
</body>
</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: blm.ypsilon@gmail.com" . "\r\n" . "Reply-To: blm.ypsilon@gmail.com" . "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail = mail($user_email, $subject, $mail_msg3, $headers);
		if($order){
			$where_cart=array('cart_user_id'=>$user_id);
			$this->login_model->delete_record('cart',$where_cart);
			echo '1';
		}
	}else{
		echo '3';
	}
		
	}else{
		echo '2';
	}
}
    function add_address(){
		$user_id=SESSIONKEY;
		$data = $this->input->post();
		$data['user_id']=$user_id;
		$where=array('user_id'=>$user_id);
                $amt= base64_encode($data['total']);
		$cart = $this->login_model->get_column_data_where('user_address','',$where);
		if(!empty($cart)){
			  unset($data['address']);
                          unset($data['total']);
              $this->login_model->update_data('user_address', $data, $where);
		}else{
			  unset($data['address']);
                           unset($data['total']);
			$id =  $this->login_model->insert_data('user_address', $data);
			$data1['user_address_id']=$id;
 		$this->login_model->update_data('user', $data1, $where);
		}
		
		redirect('website/payment/'.$amt);
	}
	function check_pincode(){
		$pincode=$_POST['pincode'];
		$where=array('pincode'=>$pincode);
		$result = $this->login_model->get_column_data_where('pincode','',$where);
		if(!empty($result)){
			echo "1";
		}else{
			echo "2";
		}
	}
        
			function get_payu_order(){
			 $payumoney=$_POST['payumoney']; 
			if(isset($payumoney)){
				echo "1";
			}
			
		}
		function cancel_payumoney(){
			$this->load->view('website/header');
        	$this->load->view('website/invoice_failure');
        	$this->load->view('website/footer');
		}
		function success_payumoney(){
			$this->load->view('website/header');
        	$this->load->view('website/success_payu');
        	$this->load->view('website/footer');
		}
                function add_cart(){
		$user_id=SESSIONKEY;
                $data=array();
                $data1 = $this->input->post();
                $cart=$data1['cart'];
                //print_r($cart);die();
                $where=array('cart_user_id'=>SESSIONKEY);
		$product = $this->login_model->get_column_data_where('cart','',$where);
                if(empty($product)){
                for($i=0;$i<count($cart);$i++){
		$data['cart_product_id']=$cart[$i]['item_id'];
		$data['cart_product_price']=$cart[$i]['price'];
		$data['cart_product_qty']=$cart[$i]['qty'];
		$user_table='cart';
			$data['cart_created_date']=date("Y-m-d h:i:sa");
			$data['cart_user_id']=$user_id;
			$data['cart_product_id']=$data['cart_product_id'];
			$data['cart_product_price']=$data['cart_product_price'];
			$data['cart_product_qty']=$data['cart_product_qty'];
            $insert =  $this->login_model->insert_data($user_table, $data);
                }
	echo '1';
                }else{
                   $where_cart=array('cart_user_id'=>SESSIONKEY);
			$this->login_model->delete_record('cart',$where_cart);
                    for($i=0;$i<count($cart);$i++){
		$data['cart_product_id']=$cart[$i]['item_id'];
		$data['cart_product_price']=$cart[$i]['price'];
		$data['cart_product_qty']=$cart[$i]['qty'];
		$user_table='cart';
			$data['cart_created_date']=date("Y-m-d h:i:sa");
			$data['cart_user_id']=$user_id;
			$data['cart_product_id']=$data['cart_product_id'];
			$data['cart_product_price']=$data['cart_product_price'];
			$data['cart_product_qty']=$data['cart_product_qty'];
            $insert =  $this->login_model->insert_data($user_table, $data);
                    
                }
                echo '1';
                }
                
                    }
                    function mail(){
                         if ($this->input->post('submit')) {
            $data = $this->input->post();
            unset($data['submit']);
		
            $this->login_model->insert_data('user_contact_us', $data);
            $user_email=$data['user_contact_email'];
            $subject="Thanks for contact to BOOK STORE";
            
			$mail_msg3 .= '</tbody>
                    <tfoot>
                    	<tr>
                            <td align="right" colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">
                            </td>
                            <td colspan="3" style="border-bottom:1px solid #ddd; padding:10px;">    
                            	<p style="text-align:right;"><strong>Sub Total:</strong><i class="fa fa-rupee">â‚¹</i><span>' . $grandtotal . '</span></p>
                                <p style="text-align:right;"><strong>Shipping:</strong> <i class="fa fa-rupee">â‚¹</i>'.$delivery_charge.'</p>
                                <P style="text-align:right;"> <strong>Extra Charge:</strong> <i class="fa fa-rupee">â‚¹</i>00</P>
                            </td>
                        </tr>
                        <tr style="background:#eee;">
                        	<td align="right" colspan="5" style="border-bottom:1px solid #ddd; padding:10px;"><strong>Grand Total: <i class="fa fa-rupee">â‚¹</i><span>' . $main_total . '</span></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>

    </tbody>
    
    <tfoot style="background:#4D0684; text-align:center; color:#fff;">
        <tr>
        	<td style="color:#fff;"><p>Copyright Â© 2016 R-Shopper</p></td>
        <tr>
    </tfoot>
    
</table>
</body>
</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: blm.ypsilon@gmail.com" . "\r\n" . "Reply-To: blm.ypsilon@gmail.com" . "\r\n" . "X-Mailer: PHP/" . phpversion();
			// $headers .= 'Cc: myboss@example.com' . "\r\n";
			$mail = mail($user_email, $subject, $mail_msg3, $headers);
            
            
            $this->session->set_flashdata('status', 'Thanks for contact to BOOK STORE, we will contact as soon as possible');
            redirect('website/contactus');
                         }
                        echo '1';
                    }
function visitor_count(){
			$result = $this->login_model->get_record('visitor_count');
                        $count1=$result[0]->count;
                        $data=array('count'=>$count1+1);
                        $where=array('id'=>'1');
                       $update= $this->login_model->update_data('visitor_count', $data, $where);
                    echo '1';
		}
//------------------------------------------------------------------------------------
//----end class----//
}
