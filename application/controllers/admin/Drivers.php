<?php
		    class Drivers extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Drivers_model');
	        $this->module = 'Drivers';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Drivers';
			if ( $this->permission['view_all'] == '1'){$this->data['drivers'] = $this->Drivers_model->all_rows('drivers');}
			elseif ($this->permission['view'] == '1') {$this->data['drivers'] = $this->Drivers_modelget_rows('drivers',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/drivers/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Drivers';$this->load->template('admin/drivers/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');

			$id = $this->Drivers_model->insert('drivers',$data);
			if ($id) {
				redirect('admin/drivers');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Drivers';
			$this->data['drivers'] = $this->Drivers_model->get_row_single('drivers',array('id'=>$id));$this->load->template('admin/drivers/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			
            $id = $this->Drivers_model->update('drivers',$data,array('id'=>$id));
			
			if ($id) {
				redirect('admin/drivers');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Drivers_model->delete('drivers',array('id'=>$id));
			redirect('admin/drivers');
		}

		public function driver_ledger()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{

				redirect('admin/home');

			}

			if ($this->input->server('REQUEST_METHOD') == 'POST') {


				$drivers_id = $this->input->post('select_drivers');	

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				

				echo 'woring on this';
				die();

			}	
			else
			{

				$this->data['order_veh_details'] = [];

			}


			$this->data['vehicels'] = $this->Drivers_model->all_rows('drivers');

			$this->data['title'] = 'Driver ledger';
			$this->data['permission'] = $this->permission;
		 	$this->load->template('admin/drivers/driver_ledger',$this->data);

		}

	}