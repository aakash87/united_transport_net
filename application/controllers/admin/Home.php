<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->module = 'dashboard';
        $this->user_type = $this->session->userdata('user_type');
        $this->id = $this->session->userdata('user_id');

        $this->permission = $this->get_permission($this->module,$this->user_type);
    }

	public function index()
	{
		if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
		{
			redirect('admin/home');
		}
		$this->data['title'] = 'Dashboard';
		$this->load->template('admin/home',$this->data);
	}

	public function count_notification()
	{
		if ($this->user_type == 1 ) {

			$count_notification = $this->Home_model->count_notification_for_admin();

			echo count($count_notification);
		}

		elseif ($this->user_type == 15) {
			
			$count_notification = $this->Home_model->count_notification_for_admin_sales($this->id , $this->user_type);
			echo count($count_notification);
		}
	}


	public function get_notification()
	{

		if ($this->user_type == 1 ) {

			$this->data['count_notification'] = $this->Home_model->count_notification_for_admin();

			$this->load->view('admin/templates/get_notification_list' , $this->data);

			// print_r($this->data['count_notification']);
		}

		elseif ($this->user_type == 15) {
			
			$this->data['count_notification'] = $this->Home_model->count_notification_for_admin_sales($this->id , $this->user_type);
			
			$this->load->view('admin/templates/get_notification_list' , $this->data);
			
		}


	}
}