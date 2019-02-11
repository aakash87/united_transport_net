<?php

		    class Service_reminder extends MY_Controller{



		    	public function __construct()

	    {

	        parent::__construct();

	        $this->load->model('Service_reminder_model');

	        $this->module = 'service_reminder';

	        $this->user_type = $this->session->userdata('user_type');

	        $this->id = $this->session->userdata('user_id');

	        $this->permission = $this->get_permission($this->module,$this->user_type);

	    }public function index()

		{

			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Service_reminder';

			if ( $this->permission['view_all'] == '1'){$this->data['service_reminder'] = $this->Service_reminder_model->all_rows('service_reminder');}

			elseif ($this->permission['view'] == '1') {$this->data['service_reminder'] = $this->Service_reminder_model->get_rows('service_reminder',array('user_id'=>$this->id));}

			$this->data['vehicels'] = $this->Service_reminder_model->all_rows('vehicle');
			$this->data['permission'] = $this->permission;

			$this->load->template('admin/service_reminder/index',$this->data);

		}public function create()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Create Service_reminder';$this->load->template('admin/service_reminder/create',$this->data);

		}

		public function insert()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Service_reminder_model->insert('service_reminder',$data);

			if ($id) {

				redirect('admin/service_reminder');

			}

		}public function edit($id)

		{

			if ($this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Edit Service_reminder';

			$this->data['service_reminder'] = $this->Service_reminder_model->get_row_single('service_reminder',array('id'=>$id));$this->load->template('admin/service_reminder/edit',$this->data);

		}



		public function update()

		{

			if ( $this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$id = $data['id'];

			unset($data['id']);$id = $this->Service_reminder_model->update('service_reminder',$data,array('id'=>$id));

			if ($id) {

				redirect('admin/service_reminder');

			}

		}public function delete($id)

		{

			if ( $this->permission['deleted'] == '0') 

			{

				redirect('admin/home');

			}

			$this->Service_reminder_model->delete('service_reminder',array('id'=>$id));

			redirect('admin/service_reminder');

		}

		public function service_reminder_insert()
		{

			// print_r();
			$vehicleId = $this->input->post('select_vehicel');

			$count_of_reminder = count($this->input->post('id')); 

			for ($i = 0; $i < $count_of_reminder ; $i++) {
				$date = $this->input->post('time_interval')[$i];
				$date_of_rem =  date("Y/m/d", strtotime( $date .'day'));
					
				$data = [
					'vehicle_id' => $vehicleId,
					'sr_id' => $this->input->post('id')[$i],
					'date_of_sr' => $date_of_rem
				];



				$id = $this->Service_reminder_model->insert('service_reminder_list',$data);

					redirect('admin/service_reminder');


			}

		}

		public function view_service_reminder()
		{

			$date_of_rem =  date("Y/m/d");

			$this->data['get_service_reminder'] = $this->Service_reminder_model->get_service_reminder_by_date($date_of_rem);

			$this->data['permission'] = $this->permission;

			$this->load->template('admin/service_reminder/view_service_reminder',$this->data);
		}

	}