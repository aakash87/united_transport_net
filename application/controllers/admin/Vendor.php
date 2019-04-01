<?php
		    class Vendor extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Vendor_model');
	        $this->module = 'vendor';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Vendor';
			if ( $this->permission['view_all'] == '1'){$this->data['vendor'] = $this->Vendor_model->all_rows('vendor');}
			elseif ($this->permission['view'] == '1') {$this->data['vendor'] = $this->Vendor_modelget_rows('vendor',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/vendor/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Vendor';$this->load->template('admin/vendor/create',$this->data);
		}
		public function insert()
		{	
			// echo "<pre>";
			// print_r($_POST);die();
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = [

				'vendor_name' => $this->input->post('vendor_name'),
				'company_name' => $this->input->post('company_name'),
				'vendor_address' => $this->input->post('vendor_address'),
				'vendor_contact' => $this->input->post('vendor_contact'),
				'vendor_create_date' => $this->input->post('vendor_create_date'),
				'user_id' => $this->session->userdata('user_id'),
				'special_person' => $this->input->post('special_person'),
				'vender_labour' => $this->input->post('vender_labour'),
				'vendor_type' => $this->input->post('vender_type'),
				'fuel_vendor' => 'Yes',
				
			];
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Vendor_model->insert('vendor',$data);
			if ($id) {

				$vehicle_maker_count = count($this->input->post('vehicle_maker'));

				for ($i=0; $i < $vehicle_maker_count ; $i++) { 
					$vehicle_data = [
						'vehicle_maker' => $this->input->post('vehicle_maker')[$i],
						'vehicle_model' => $this->input->post('vehicle_model')[$i],
						'vehicle_type' => $this->input->post('vehicle_type')[$i],
						'vehicle_year' => $this->input->post('vehicle_year')[$i],
						'registration_number' => $this->input->post('registration_number')[$i],
						'vehicle_cc' => $this->input->post('vehicle_cc')[$i],
						'vendor_id' => $id,
					];

					$this->Vendor_model->insert('vehicle',$vehicle_data);	
				}


				redirect('admin/vendor');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Vendor';
			$this->data['vendor'] = $this->Vendor_model->get_row_single('vendor',array('id'=>$id));$this->load->template('admin/vendor/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			// print_r($_POST);
			// die();
			
			$data = [

				'vendor_name' => $this->input->post('vendor_name'),
				'company_name' => $this->input->post('company_name'),
				'vendor_address' => $this->input->post('vendor_address'),
				'vendor_contact' => $this->input->post('vendor_contact'),
				'vendor_create_date' => $this->input->post('vendor_create_date'),
				'user_id' => $this->session->userdata('user_id'),
				'special_person' => $this->input->post('special_person'),
				'vender_labour' => $this->input->post('vender_labour'),
				'vendor_type' => $this->input->post('vender_type'),
				'fuel_vendor' => 'Yes',
				
			];
			$id = $this->Vendor_model->update('vendor',$data,array('id'=>$this->input->post('id')));
			if ($id) {
				redirect('admin/vendor');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Vendor_model->delete('vendor',array('id'=>$id));
			redirect('admin/vendor');
		}

		public function delete_vendor()
		{
			$id = $this->input->post('id');
			$this->Vehicel_fuel_model->delete('vendor',array('id'=>$id));
			redirect('admin/vendor');
		}
	}