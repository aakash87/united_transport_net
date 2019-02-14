<?php
		    class Vehicel_fuel extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Vehicel_fuel_model');
	        $this->module = 'Vehicel_fuel';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Vehicel_fuel';
			if ( $this->permission['view_all'] == '1'){$this->data['Vehicel_fuel'] = $this->Vehicel_fuel_model->get_rows_with_vehicle_name('vehicel_fuel');}
			elseif ($this->permission['view'] == '1') {$this->data['Vehicel_fuel'] = $this->get_rows('vehicel_fuel',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/Vehicel_fuel/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}

			$this->data['vehicle_data'] = $this->Vehicel_fuel_model->all_rows('vehicle');
			$this->data['fuel_vendor'] = $this->Vehicel_fuel_model->get_fuel_vendor();
			$this->data['title'] = 'Create Vehicel_fuel';$this->load->template('admin/Vehicel_fuel/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Vehicel_fuel_model->insert('vehicel_fuel',$data);
			if ($id) {
				redirect('admin/Vehicel_fuel');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['vehicle_data'] = $this->Vehicel_fuel_model->all_rows('vehicle');
			$this->data['fuel_vendor'] = $this->Vehicel_fuel_model->get_fuel_vendor();
			$this->data['title'] = 'Edit Vehicel_fuel';
			$this->data['Vehicel_fuel'] = $this->Vehicel_fuel_model->get_row_single('vehicel_fuel',array('id'=>$id));$this->load->template('admin/Vehicel_fuel/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Vehicel_fuel_model->update('vehicel_fuel',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/Vehicel_fuel');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Vehicel_fuel_model->delete('vehicel_fuel',array('id'=>$id));
			redirect('admin/vehicel_fuel');
		}

		public function fuel_report_by_vehicel()
		{
			$this->data['title'] = 'Fuel Report By Vehicel';

			$this->data['vehicle'] = $this->Vehicel_fuel_model->all_rows('vehicle');
			$this->data['orders'] = $this->load->template('admin/Vehicel_fuel/vehicel_fuel_reports/vehicel_fuel_reports',$this->data);

		}

		public function delete_fule()
		{
			$id = $this->input->post('id');
			$this->Vehicel_fuel_model->delete('vehicel_fuel',array('id'=>$id));
			redirect('admin/orders');
		}
	}