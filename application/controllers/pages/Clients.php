<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model');
    }

	public function index()
	{
		
		$this->data['title'] = 'Clients';

		$this->data['clients'] = $this->Client_model->all_rows('client');

		$this->load->front_template('pages/clients',$this->data);

		
//		$this->load->view('pages/clients',$this->data);
	
		
		//$data['sliders']=$this->My_Model->all_rows($slider);
		
	}

}