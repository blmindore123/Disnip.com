<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Data extends CI_Controller
{
		function __construct() {
		parent::__construct();
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> model('login_model');
		$this -> load -> library('form_validation');
		$this -> load -> library('session');
		$this -> load -> library('email');
		$this -> load -> library('simplepush');
		$this->load->helper('download');
      
		if ($this -> session -> userdata('user_id') == FALSE) {
			redirect('login');
		}
	}
  public function index()
  {
    $this->load->view('data_page_view'); 
  }
  public function toExcel()
  {
  
			$route_id=$_REQUEST['route_id']; 
		$select_date=$_REQUEST['select_date']; 
	 $select_date = date("Y-m-d", strtotime($select_date)); 
		if(!empty($route_id) && !empty($order_time)){
			$where = array('order_time' => $order_time,'order_date'=>$select_date,'stall.stall_route'=>$route_id,'stall_total_packets >'=>0);
		}
		else if(!empty($order_time) && empty($route_id)){
			$where = array('order_time' => $order_time,'order_date'=>$select_date,'stall_total_packets >'=>0);
		}else if(empty($order_time) && !empty($route_id)){
			$where = array('stall.stall_route' => $route_id,'order_date'=>$select_date,'stall_total_packets >'=>0);
		}else if(empty($order_time) && empty($route_id)){
			$where = array('order_date'=>$select_date,'stall_total_packets >'=>0);
		}
				
		$data['order_list'] = $this -> login_model -> get_record_join_two_table('make_order_list','stall','stall_id','stall_id','',$where);
		if(!empty($data['order_list'])){
			
			$this->load->view('admin/listing/order_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
	}

  public function toExcel_order_by_month()
  {
  	$route_id=$_REQUEST['route_id']; 
		 $select_month=$_REQUEST['select_month']; 
		
		$order_time=$_REQUEST['order_time'];
		 // $select_date = date("Y-m-d", strtotime($select_date)); 
		 
		if(!empty($route_id) && !empty($order_time)){
			$where = array('order_time' => $order_time,'month(order_date)'=>$select_month,'stall.stall_route'=>$route_id,'stall_total_packets >'=>0);
		}
		else if(!empty($order_time) && empty($route_id)){
			$where = array('order_time' => $order_time,'month(order_date)'=>$select_month,'stall_total_packets >'=>0);
		}else if(empty($order_time) && !empty($route_id)){
			$where = array('stall.stall_route' => $route_id,'month(order_date)'=>$select_month,'stall_total_packets >'=>0);
		}else if(empty($order_time) && empty($route_id)){
			$where = array('month(order_date)'=>$select_month,'stall_total_packets >'=>0);
		}
		$data['order_list'] = $this -> login_model -> get_record_join_two_table('make_order_list','stall','stall_id','stall_id','',$where);
		if(!empty($data['order_list'])){
			
			$this->load->view('admin/listing/order_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
	}
  
  
  function stall_report(){
  // $stall_id = $this -> uri -> segment(3);
		$stall_id=$_REQUEST['stall_id'];
		$select_month=$_REQUEST['select_month'];
	 $where=array('stall.stall_id'=>$stall_id,'month(order_date)'=>$select_month);
	 $data['order_list'] = $this -> login_model -> get_record_join_two_table('make_order_list','stall','stall_id','stall_id','',$where);
		if(!empty($data['order_list'])){
			
			$this->load->view('admin/listing/order_excel_sheet', $data);
		
		}else{
			echo "No Record Found";
			
		}
  }	
		function payment_excel(){
	$select_date = $_REQUEST['select_date'];
	$select_date = date("Y-m-d", strtotime($select_date));  
	 $where=array('transaction_date'=>$select_date,'payment_transaction_from'=>1);
	$data['user_list'] = $this -> login_model -> get_record_join_two_table_orderby('stall','transaction_history','stall_id','transaction_stall_id','',$where,'transaction_id');
	 if(!empty($data['user_list'])){
			
			$this->load->view('admin/listing/payment_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
		}

	function payment_excel_by_month(){
	$select_month = $_REQUEST['select_month'];
	$where=array('month(transaction_date)'=>$select_month,'payment_transaction_from'=>1);
	$data['user_list'] = $this -> login_model -> get_record_join_two_table_orderby('stall','transaction_history','stall_id','transaction_stall_id','',$where,'transaction_id');
	 if(!empty($data['user_list'])){
			
			$this->load->view('admin/listing/payment_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
		}

  function sanchi_payment_excel(){
  	$select_date = $_REQUEST['select_date'];
	$select_date = date("Y-m-d", strtotime($select_date));  
	 $where=array('transaction_date'=>$select_date,'payment_transaction_from'=>2);
	$data['user_list'] = $this -> login_model -> get_data_where_condition('transaction_history',$where);
	 if(!empty($data['user_list'])){
			
			$this->load->view('admin/listing/sanchi_payment_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
		
  }
  
  function sanchi_payment_excel_by_month(){
  	$select_month =$_REQUEST['select_month'];
		$where=array('month(transaction_date)'=>$select_month,'payment_transaction_from'=>2);
	$data['user_list'] = $this -> login_model -> get_data_where_condition('transaction_history',$where);
	 if(!empty($data['user_list'])){
			
			$this->load->view('admin/listing/sanchi_payment_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
		
  }
  
  	function sanchi_order_excel(){
		$select_date=$_REQUEST['select_date'];
		$order_time=$_REQUEST['order_time'];
		$select_date = date("Y-m-d", strtotime($select_date)); 
		if(!empty($order_time)){
			$where=array('order_date'=>$select_date,'order_time'=>$order_time,'total_packets >'=>0);
		}elseif(empty($order_time)){
			$where=array('order_date'=>$select_date,'total_packets >'=>0);
		}
		
		$data['order_list'] = $this -> login_model -> get_data_where_condition('sanchi',$where);
		 if(!empty($data['order_list'])){
			
			$this->load->view('admin/listing/sanchi_order_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
	}

	function sanchi_order_excel_by_month(){
		$select_month=$_REQUEST['select_month'];
		$order_time=$_REQUEST['order_time'];
		if(!empty($order_time)){
			$where=array('month(order_date)'=>$select_month,'order_time'=>$order_time,'total_packets >'=>0);
		}elseif(empty($order_time)){
			$where=array('month(order_date)'=>$select_month,'total_packets >'=>0);
		}
		$data['order_list'] = $this -> login_model -> get_data_where_condition('sanchi',$where);
		 if(!empty($data['order_list'])){
			
			$this->load->view('admin/listing/sanchi_order_excel_sheet', $data);
		}else{
			echo "No Record Found";
		}
	}
    //$this->load->view('admin/listing/excel');
 
}