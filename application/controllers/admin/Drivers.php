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
			if ( $this->permission['view_all'] == '1'){$this->data['drivers'] = $this->Drivers_model->all_rows('Drivers');}
			elseif ($this->permission['view'] == '1') {$this->data['drivers'] = $this->Drivers_modelget_rows('Drivers',array('user_id'=>$this->id));}
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
			$data['user_id'] = $this->session->userdata('user_id');$config['upload_path']          = './uploads/';
					                $config['allowed_types']        = '|';
					                $config['max_size']             = 5000;
					                $config['max_width']            = 5024;
					                $config['max_height']           = 4768;

					                $this->load->library('upload', $config);

					                if ( $this->upload->do_upload('driver_image'))
					                {
					                        $data['driver_image'] = '/uploads/'.$this->upload->data('file_name');
					                }
					                $id = $this->Drivers_model->insert('Drivers',$data);
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
			$this->data['drivers'] = $this->Drivers_model->get_row_single('Drivers',array('id'=>$id));$this->load->template('admin/drivers/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$config['upload_path']          = './uploads/';
					                $config['allowed_types']        = '|';
					                $config['max_size']             = 5000;
					                $config['max_width']            = 5024;
					                $config['max_height']           = 4768;

					                $this->load->library('upload', $config);

					                if ( $this->upload->do_upload('driver_image'))
					                {
					                        $data['driver_image'] = '/uploads/'.$this->upload->data('file_name');
					                }
					                $id = $this->Drivers_model->update('Drivers',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/drivers');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Drivers_model->delete('Drivers',array('id'=>$id));
			redirect('admin/drivers');
		}}