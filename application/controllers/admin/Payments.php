<?php
		    class Payments extends MY_Controller{

    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Payments_model');
	        $this->load->model('Invoice_model');
	        $this->module = 'slider';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }
	    public function vendor_payment()
		{

			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments'] = $this->Payments_model->all_rows_with_name();
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/vendor_payment',$this->data);
		}
		public function view_paid_vendor_payments()
		{

			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments'] = $this->Payments_model->view_paid_vendor_payments();
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/view_paid_vendor_payments',$this->data);
		}
		public function paid_vandor_payment($id)
		{

			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments_detail'] = $this->Payments_model->vendor_payments_detail($id);
			// echo "<pre>";
			// print_r($this->data['vendor_payments_detail']);die();
			$this->load->template('admin/payments/paid/paid_vandor_payment',$this->data);
		}
		public function submit_vendor_payment()
		{

			$this->data['permission'] = $this->permission;
			$this->data['customer_old_amount'] = $this->Invoice_model->get_last_record_for_ledger('vendor_ledger' , $this->input->post('customer_id'));
			$balance_amount = $this->data['customer_old_amount']['balance'];
			// print_r($this->data['customer_old_amount']['balance']);die();
			$vendor_ladger = 
			[
				'amount' =>  $this->input->post('pay_amount'),
				'voucher_no' => $this->input->post('voucher_no'),
				'customer_id' => $this->input->post('customer_id'),
				'balance'=> $balance_amount - $this->input->post('pay_amount'),
				'date' =>  $this->input->post('pay_date'),
				'status' =>  1,
				'description' => 'Pay Payments',
				'reference' => 'debit',
			];
						

			$this->Invoice_model->insert('vendor_ledger', $vendor_ladger);
			$data = 
			[
				'status' =>  'Paid',
			];
			$this->Invoice_model->update('vendor_ledger',$data,array('id'=>$this->input->post('id')));
			// echo "<pre>";
			// print_r($this->data['vendor_payments_detail']);die();
			redirect('admin/payments/vendor_payment');
		}
	}