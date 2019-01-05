<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
    }

	public function index()
	{
		
		$this->data['title'] = 'Dashboard';

		$this->data['sliders'] = $this->Slider_model->all_rows('slider');
		
		$this->load->view('home',$this->data);
	
		
		//$data['sliders']=$this->My_Model->all_rows($slider);
		
		//$this->load->front_template('home',$this->data);
	}

}


