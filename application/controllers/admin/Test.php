<?php
		    class Test extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Test_model');
	        $this->module = 'test';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Test';
			if ( $this->permission['view_all'] == '1'){$this->data['test'] = $this->Test_model->all_rows('test');}
			elseif ($this->permission['view'] == '1') {$this->data['test'] = $this->Test_modelget_rows('test',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/test/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Test';$this->load->template('admin/test/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Test_model->insert('test',$data);
			if ($id) {
				redirect('admin/test');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Test';
			$this->data['test'] = $this->Test_model->get_row_single('test',array('id'=>$id));$this->load->template('admin/test/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Test_model->update('test',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/test');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Test_model->delete('test',array('id'=>$id));
			redirect('admin/test');
		}}