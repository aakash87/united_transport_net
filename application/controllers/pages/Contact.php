<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    }

	public function index()
	{
		
		$this->data['title'] = 'Contact';
		$this->load->front_template('pages/contact',$this->data);
		
	}

}