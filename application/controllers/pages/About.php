<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('About_model');
    }

	public function index()
	{
		
		$this->data['title'] = 'About Us';

		$this->load->front_template('pages/about',$this->data);
		
	}

}