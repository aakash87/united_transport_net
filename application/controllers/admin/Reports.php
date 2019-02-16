<?php
		    class Reports extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Reports_model');
	        $this->load->model('Customer_model');
	        $this->module = 'reports';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Reports';
			if ( $this->permission['view_all'] == '1'){$this->data['reports'] = $this->Reports_model->all_rows('reports');}
			elseif ($this->permission['view'] == '1') {$this->data['reports'] = $this->Reports_modelget_rows('reports',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Reports';$this->load->template('admin/reports/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Reports_model->insert('reports',$data);
			if ($id) {
				redirect('admin/reports');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Reports';
			$this->data['reports'] = $this->Reports_model->get_row_single('reports',array('id'=>$id));$this->load->template('admin/reports/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Reports_model->update('reports',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/reports');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Reports_model->delete('reports',array('id'=>$id));
			redirect('admin/reports');
		}


		//  custom reports 

		public function vehicel_reports_profit()
		{

			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				
				$vehicel_id = $this->input->post('select_vehicel');	

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );


				$veh_details = $this->Reports_model->get_row_single('vehicle',array('id'=>$vehicel_id));

				$this->data['vehicel_id_sele'] = $veh_details['registration_number'];

				
				$this->data['date_input'] = $_POST['daterange'];
				

				$this->data['order_veh_details'] = $this->Reports_model->vehicel_reports_profit_m($vehicel_id , $str_current_day , $str_last_day );
		
			}	
			else
			{

				$this->data['order_veh_details'] = [];
				$this->data['vehicel_id_sele'] = '';
				$this->data['date_input'] = '';

			}

			// print_r($str_last_day);

			
			$this->data['vehicels'] = $this->Reports_model->all_rows('vehicle');
			$this->load->template('admin/reports/reports_temp/vehicel_profit_reports',$this->data);

		}


		public function reports_vehicle_ledger()
		{

			if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$vehicel_id = $this->input->post('select_vehicel');	

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				// echo $vehicel_id . '<br>';
				// echo $str_current_day . '<br>';
				// echo $str_last_day . '<br>';

				// die();

				$this->data['exp_rep'] = $this->Reports_model->vehicels_exp_rep($vehicel_id, $str_current_day , $str_last_day  );

			// echo '<pre>'; print_r($this->data['exp_rep']);
		
			}
			else
			{
				$this->data['exp_rep'] = [];

			}


			$this->data['vehicles'] = $this->Reports_model->all_rows('vehicle');
 
			// echo '<pre>'; print_r($this->data['vehicle']);	
			$this->data['title'] = 'Create Reports';$this->load->template('admin/reports/reports_temp/reports_vehicle_ledger',$this->data);
		}


		public function charts()
		{

			$this->data['title'] = 'Charts';$this->load->template('admin/reports/reports_temp/charts_reports',$this->data);
		}

		public function sales_person_ledger()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['sales_person'] = $this->Customer_model->get_sale_person();	
			}
			elseif ($this->user_type == 15) {
				$this->data['sales_person'] = $this->Customer_model->get_sale_person_by($this->id);	
			}
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$this->data['sales_person_ledger'] = $this->Reports_model->sales_person_ledger($sales_person_id);
			}
			else{
				$this->data['sales_person_ledger'] = [];
			}
			// print_r($this->data['sales_person']);
			$this->data['title'] = 'sales_person_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/sales_person_ledger',$this->data);
		}	
		public function search_by_sales_person()
		{
			// print_r($_POST['sales_person']);die();
			$sales_person_id = $_POST['sales_person'];
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['sales_person'] = $this->Customer_model->get_sale_person();	
			}
			elseif ($this->user_type == 15) {
				$this->data['sales_person'] = $this->Customer_model->get_sale_person_by($this->id);	
			}
			$explode_date = explode('-', $_POST['daterange']);

			$current_date = $explode_date[0];
			$str_currentdate = strtotime($current_date);
			$str_current_day = date('Y-m-d' , $str_currentdate );

			$last_date = $explode_date[1];
			$str_last_date = strtotime($last_date);
			$str_last_day = date('Y-m-d' , $str_last_date );
			
			$this->data['sales_person_ledger'] = $this->Reports_model->sales_person_ledger($sales_person_id , $str_current_day ,  $str_last_day);
			
			// echo "<pre>";	
			// print_r($this->data['sales_person_ledger']);die();
			$this->data['title'] = 'sales_person_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/sales_person_ledger',$this->data);
		}	
		public function customer_ledger()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['customer'] = $this->Customer_model->all_rows('customer');;	
			}
			elseif ($this->user_type == 15) {
				$this->data['customer'] = $this->Customer_model->all_rows('customer');
			}
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$this->data['customer_ledger'] = $this->Reports_model->customer_ledger($customer_id);
			}
			else{
				$this->data['customer_ledger'] = [];
			}
			// print_r($this->data['customer']);
			$this->data['title'] = 'customer_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/customer_ledger',$this->data);
		}	
		public function search_by_customer()
		{
			// print_r($_POST['customer']);die();
			$customer_id = $_POST['customer'];
			$daterange = $_POST['daterange'];
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['customer'] = $this->Customer_model->all_rows('customer');;	
			}
			elseif ($this->user_type == 15) {
				$this->data['customer'] = $this->Customer_model->all_rows('customer');
			}
			$explode_date = explode('-', $_POST['daterange']);

			$current_date = $explode_date[0];
			$str_currentdate = strtotime($current_date);
			$str_current_day = date('Y-m-d' , $str_currentdate );

			$last_date = $explode_date[1];
			$str_last_date = strtotime($last_date);
			$str_last_day = date('Y-m-d' , $str_last_date );
			
			$this->data['customer_ledger'] = $this->Reports_model->customer_ledger($customer_id , $str_current_day ,  $str_last_day);
			// echo "<pre>";	
			// print_r($this->data['customer_ledger']);die();
			$this->data['title'] = 'customer_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/customer_ledger',$this->data);
		}
		public function vendor_ledger()
		{	
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['vendor'] = $this->Reports_model->all_rows('vendor');;	
			}
			elseif ($this->user_type == 15) {
				$this->data['vendor'] = $this->Reports_model->all_rows('vendor');
			}
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$this->data['vendor_ledger'] = $this->Reports_model->vendor_ledger($vendor_id);
			}
			else{
				$this->data['vendor_ledger'] = [];
			}
			// print_r($this->data['customer']);
			$this->data['title'] = 'vendor_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/vendor_ledger',$this->data);
		}
		public function vehicle_ledger()
		{

			if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$vehicel_id = $this->input->post('select_vehicel');	

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('d-m-Y' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('d-m-Y' , $str_last_date );

				// echo $vehicel_id . '<br>';
				// echo $str_current_day . '<br>';
				// echo $str_last_day . '<br>';

				// die();

				$this->data['vehicle_ledger'] = $this->Reports_model->vehicle_ledger($vehicel_id , $str_current_day , $str_last_day );

			// echo '<pre>'; print_r($this->data['vehicle_ledger']);
			// die();
		
			}
			else
			{
				$this->data['vehicle_ledger'] = [];

			}


			$this->data['vehicles'] = $this->Reports_model->all_rows('vehicle');
		
			// echo '<pre>'; print_r($this->data['vehicles']);
			// die();	
			$this->data['title'] = 'Vehicle Ledger';$this->load->template('admin/reports/ledger/vehicle_ledger',$this->data);
		}	
		public function search_by_vendor()
		{
			 // print_r($_POST['vendor']);die();
			$vendor_id = $_POST['vendor'];
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['vendor'] = $this->Reports_model->all_rows('vendor');	
			}
			elseif ($this->user_type == 15) {
				$this->data['vendor'] = $this->Reports_model->all_rows('vendor');
			}
			$explode_date = explode('-', $_POST['daterange']);

			$current_date = $explode_date[0];
			$str_currentdate = strtotime($current_date);
			$str_current_day = date('Y-m-d' , $str_currentdate );

			$last_date = $explode_date[1];
			$str_last_date = strtotime($last_date);
			$str_last_day = date('Y-m-d' , $str_last_date );
			
			$this->data['vendor_ledger'] = $this->Reports_model->vendor_ledger($vendor_id , $str_current_day ,  $str_last_day);
			// echo "<pre>";	
			// print_r($this->data['vendor_ledger']);die();
			$this->data['title'] = 'vendor_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/vendor_ledger',$this->data);
		}
		public function driver_ledger()
		{
			$driver_id = 0;
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['drivers'] = $this->Reports_model->all_rows('drivers');;	
			}
			elseif ($this->user_type == 15) {
				$this->data['drivers'] = $this->Reports_model->all_rows('drivers');
			}
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$this->data['driver_ledger'] = $this->Reports_model->driver_ledger($driver_id);
			}
			else{
				$this->data['driver_ledger'] = [];
			}
			// print_r($this->data['customer']);
			$this->data['title'] = 'driver_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/driver_ledger',$this->data);
		}	
		public function search_by_driver()
		{
			 // print_r($_POST['driver']);die();
			$driver_id = $_POST['driver'];
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			if ($this->user_type == 1) {
				$this->data['drivers'] = $this->Reports_model->all_rows('drivers');	
			}
			elseif ($this->user_type == 15) {
				$this->data['drivers'] = $this->Reports_model->all_rows('drivers');
			}
			$this->data['driver_ledger'] = $this->Reports_model->driver_ledger($driver_id);
			// echo "<pre>";	
			// print_r($this->data['driver_ledger']);die();
			$this->data['title'] = 'driver_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/ledger/driver_ledger',$this->data);
		}	



		public function srb_reports()
		{	
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				// $this->data['vendor_ledger'] = $this->Reports_model->vendor_ledger($vendor_id);
			}
			else{
				// $this->data['vendor_ledger'] = [];
			}
			
			$this->data['srb_reports'] = $this->Reports_model->get_srb_reports();
			// echo "<pre>";
			// print_r($this->data['srb_reports']);die();
			$this->data['title'] = 'vendor_ledger';
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/reports/srb_reports',$this->data);
		}











		// public function vehicle_ledger()
		// {
		// 	$vehicle_id = 0;
		// 	if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
		// 	{
		// 		redirect('admin/home');
		// 	}
		// 	if ($this->user_type == 1) {
		// 		$this->data['drivers'] = $this->Reports_model->all_rows('drivers');;	
		// 	}
		// 	elseif ($this->user_type == 15) {
		// 		$this->data['drivers'] = $this->Reports_model->all_rows('drivers');
		// 	}
		// if ($this->input->server('REQUEST_METHOD') == 'POST') {
		// 		$this->data['vehicle_ledger'] = $this->Reports_model->vehicle_ledger($vehicle_id);
		// 	}
		// 	else{
		// 		$this->data['vehicle_ledger'] = [];
		// 	}
		// 	// print_r($this->data['customer']);
		// 	$this->data['title'] = 'vehicle_ledger';
		// 	$this->data['permission'] = $this->permission;
		// 	$this->load->template('admin/reports/ledger/vehicle_ledger',$this->data);
		// }	
		// public function search_by_driver()
		// {
		// 	 // print_r($_POST['driver']);die();
		// 	$vehicle_id = $_POST['driver'];
		// 	if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
		// 	{
		// 		redirect('admin/home');
		// 	}
		// 	if ($this->user_type == 1) {
		// 		$this->data['drivers'] = $this->Reports_model->all_rows('drivers');	
		// 	}
		// 	elseif ($this->user_type == 15) {
		// 		$this->data['drivers'] = $this->Reports_model->all_rows('drivers');
		// 	}
		// 	$this->data['vehicle_ledger'] = $this->Reports_model->vehicle_ledger($vehicle_id);
		// 	// echo "<pre>";	
		// 	// print_r($this->data['vehicle_ledger']);die();
		// 	$this->data['title'] = 'vehicle_ledger';
		// 	$this->data['permission'] = $this->permission;
		// 	$this->load->template('admin/reports/ledger/vehicle_ledger',$this->data);
		// }	

	}