<?php
		    class Vehicle extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Vehicle_model');
	        $this->module = 'Vehicle';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Vehicle';
			if ( $this->permission['view_all'] == '1'){$this->data['vehicle'] = $this->Vehicle_model->all_rows_get_owner('vehicle');}
			elseif ($this->permission['view'] == '1') {$this->data['vehicle'] = $this->Vehicle_modelget_rows('vehicle',array('user_id'=>$this->id));}
			// echo "<pre>";
			// print_r($this->data['vehicle']);die();
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/vehicle/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}

			$this->data['drivers'] = $this->Vehicle_model->all_rows('drivers');
			$this->data['vehicel_owner'] = $this->Vehicle_model->all_rows('vehicel_owner');
			$this->data['vendor'] = $this->Vehicle_model->all_rows('vendor');
			$this->data['title'] = 'Create Vehicle';$this->load->template('admin/vehicle/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Vehicle_model->insert('vehicle',$data);
			if ($id) {
				redirect('admin/vehicle');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			
			$this->data['drivers'] = $this->Vehicle_model->all_rows('drivers');
			$this->data['vehicel_owner'] = $this->Vehicle_model->all_rows('vehicel_owner');
			$this->data['vendor'] = $this->Vehicle_model->all_rows('vendor');

			$this->data['title'] = 'Edit Vehicle';
			$this->data['vehicle'] = $this->Vehicle_model->get_row_single('vehicle',array('id'=>$id));$this->load->template('admin/vehicle/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Vehicle_model->update('vehicle',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/vehicle');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Vehicle_model->delete('vehicle',array('id'=>$id));
			redirect('admin/vehicle');
		}

		public function vehicle_ledger()
		{

			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{

				redirect('admin/home');

			}

			if ($this->input->server('REQUEST_METHOD') == 'POST') {


				$vehicel_id = $this->input->post('select_vehicel');	

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				$this->data['order_veh_details'] = $this->Vehicle_model->vehicel_reports_profit_m($vehicel_id , $str_current_day , $str_last_day );

				echo 'working on this';
				die();
			}	
			else
			{

				$this->data['order_veh_details'] = [];

			}


			$this->data['vehicels'] = $this->Vehicle_model->all_rows('vehicle');

			$this->data['title'] = 'Expense';
			$this->data['permission'] = $this->permission;
		 	$this->load->template('admin/vehicle/vehicle_ledger',$this->data);
		}
		public function delete_vehicle()
		{
			$id = $this->input->post('id');
			$this->Vehicle_model->delete('vehicle',array('id'=>$id));
			redirect('admin/vehicle');
		}
	}