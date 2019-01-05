<?php
		    class Test211 extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Test211_model');
	        $this->module = 'test211';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Test211';
			if ( $this->permission['view_all'] == '1'){$this->data['test211'] = $this->Test211_model->all_rows('test211');}
			elseif ($this->permission['view'] == '1') {$this->data['test211'] = $this->Test211_modelget_rows('test211',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/test211/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Test211';$this->load->template('admin/test211/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Test211_model->insert('test211',$data);
			if ($id) {
				redirect('admin/test211');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Test211';
			$this->data['test211'] = $this->Test211_model->get_row_single('test211',array('id'=>$id));$this->load->template('admin/test211/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Test211_model->update('test211',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/test211');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Test211_model->delete('test211',array('id'=>$id));
			redirect('admin/test211');
		}}