<?php
		    class sales_person extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('sales_person_model');
	        $this->module = 'Sales person';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'sales_person';
			if ( $this->permission['view_all'] == '1'){$this->data['sales_person'] = $this->sales_person_model->all_rows('Sales_person');}
			elseif ($this->permission['view'] == '1') {$this->data['sales_person'] = $this->sales_person_modelget_rows('Sales_person',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/sales_person/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create sales_person';$this->load->template('admin/sales_person/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->sales_person_model->insert('Sales_person',$data);
			if ($id) {
				redirect('admin/sales_person');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit sales_person';
			$this->data['sales_person'] = $this->sales_person_model->get_row_single('Sales_person',array('id'=>$id));$this->load->template('admin/sales_person/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->sales_person_model->update('Sales_person',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/sales_person');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->sales_person_model->delete('Sales_person',array('id'=>$id));
			redirect('admin/sales_person');
		}}