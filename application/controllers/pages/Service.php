<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Service_model');
    }

	public function index()
	{
		
		$this->data['title'] = 'Services';

		//$this->data['clients'] = $this->Client_model->all_rows('client');

		$this->load->front_template('pages/services',$this->data);

		
		//$this->load->view('pages/clients',$this->data);
	
		
		//$data['sliders']=$this->My_Model->all_rows($slider);
		
	}

}