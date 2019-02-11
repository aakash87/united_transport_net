<?php
		    class Customer extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Customer_model');
	        $this->module = 'Customer';
	        $this->user_type = $this->session->userdata('user_type');


	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{


			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'customer';
			
			if ( $this->permission['view_all'] == '1' &&  $this->user_type == 1){
				
				$this->data['customer'] = $this->Customer_model->get_all_customer_data();
			}
			
			elseif ($this->permission['view_all'] == '1' &&  $this->user_type == 15) {
				
				$this->data['customer'] = $this->Customer_model->sales_person_customer($this->id);
			}
			
			elseif ($this->permission['view'] == '1') {$this->data['customer'] = $this->Customer_model->get_rows('Customer',array('user_id'=>$this->id));}
			
			$this->data['permission'] = $this->permission;
			// echo "<pre>";
			// print_r($this->data['customer']);
			// die;
			$this->load->template('admin/customer/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}

        	// $this->data['sales_person'] = $this->Customer_model->all_rows('sales_person');
        	if ($this->user_type == 1) {
        		$this->data['sales_person'] = $this->Customer_model->get_sale_person();	
        	}
        	elseif ($this->user_type == 15) {
        		$this->data['sales_person'] = $this->Customer_model->get_sale_person_by($this->id);	
        	}	

			$this->data['title'] = 'Create Customer';$this->load->template('admin/customer/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post('order_status');
			$data = $this->input->post();

			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Customer_model->insert('customer',$data);
			if ($id) {
				redirect('admin/customer');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Customer';
			$this->data['customer'] = $this->Customer_model->get_row_single('customer',array('id'=>$id));$this->load->template('admin/customer/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Customer_model->update('customer',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/customer');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Customer_model->delete('customer',array('id'=>$id));
			redirect('admin/customer');
		}


		public function get_customer_for_sales_id()
		{
			$sales_person_id = $this->input->post('sales_person_id');

			$sales_person = $this->Customer_model->get_customer_with_sales_person($sales_person_id);

			// print_r($sales_person);

			echo json_encode($sales_person);
		}

	}