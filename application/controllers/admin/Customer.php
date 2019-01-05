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
			$this->data['title'] = 'Customer';
			if ( $this->permission['view_all'] == '1'){$this->data['customer'] = $this->Customer_model->all_rows('Customer');}
			elseif ($this->permission['view'] == '1') {$this->data['customer'] = $this->Customer_modelget_rows('Customer',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/customer/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Customer';$this->load->template('admin/customer/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Customer_model->insert('Customer',$data);
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
			$this->data['customer'] = $this->Customer_model->get_row_single('Customer',array('id'=>$id));$this->load->template('admin/customer/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Customer_model->update('Customer',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/customer');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Customer_model->delete('Customer',array('id'=>$id));
			redirect('admin/customer');
		}}