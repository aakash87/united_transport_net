<?php
		    class Vehicel_owner extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Vehicel_owner_model');
	        $this->module = 'vehicel_owner';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Vehicel_owner';
			if ( $this->permission['view_all'] == '1'){$this->data['vehicel_owner'] = $this->Vehicel_owner_model->all_rows('vehicel_owner');}
			elseif ($this->permission['view'] == '1') {$this->data['vehicel_owner'] = $this->Vehicel_owner_modelget_rows('vehicel_owner',array('user_id'=>$this->id));}
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/vehicel_owner/index',$this->data);
		}public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Vehicel_owner';$this->load->template('admin/vehicel_owner/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Vehicel_owner_model->insert('vehicel_owner',$data);
			if ($id) {
				redirect('admin/vehicel_owner');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Vehicel_owner';
			$this->data['vehicel_owner'] = $this->Vehicel_owner_model->get_row_single('vehicel_owner',array('id'=>$id));$this->load->template('admin/vehicel_owner/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Vehicel_owner_model->update('vehicel_owner',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/vehicel_owner');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Vehicel_owner_model->delete('vehicel_owner',array('id'=>$id));
			redirect('admin/vehicel_owner');
		}}