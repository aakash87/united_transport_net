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
	    public function all_vandor_payments()
		{
			$this->data['title'] = 'vendor_payment';
			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments'] = $this->Payments_model->all_rows_with_name();
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/all_vandor_payments',$this->data);
		}
		public function search_vandor_for_payments()
		{
			$this->data['title'] = 'vendor_payment';
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				
				$vendor_id = $this->input->post('vendor_id');	

				$this->data['vendor_payments'] = $this->Payments_model->all_rows_with_name_by_id($vendor_id);
			
			}	
			else
			{

				$this->data['vendor_payments'] = [];

			}
			$this->data['permission'] = $this->permission;
			$this->data['vendor'] = $this->Payments_model->all_rows('vendor');
			// $this->data['vendor_payments'] = $this->Payments_model->all_rows_with_name();
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/vendor_payment',$this->data);
		}
		public function view_paid_vendor_payments()
		{
			$this->data['title'] = 'view_paid_vendor_payments';

			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments'] = $this->Payments_model->view_paid_vendor_payments();
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/view_paid_vendor_payments',$this->data);
		}
		public function paid_vandor_payment($id)
		{

			$this->data['title'] = 'paid_vandor_payment';

			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments_detail'] = $this->Payments_model->vendor_payments_detail($id);
			// echo "<pre>";
			// print_r($this->data['vendor_payments_detail']);die();
			$this->load->template('admin/payments/paid/paid_vandor_payment',$this->data);
		}
		public function submit_vendor_payment()
		{
			$id = $this->input->post('id[]');
			$ids =  implode(',', $this->input->post('id[]'));
			for ($i=0; $i < sizeof($id); $i++) { 
				$order_data = 
				[
					
					'status' =>  'Unpaid',
					// 'date' =>  date('Y-m-d'),
				];
				
			}
			
			// print_r($ids);die();
			$this->data['title'] = 'submit_vendor_payment';

			$this->data['permission'] = $this->permission;
			$this->data['customer_old_amount'] = $this->Invoice_model->get_last_record_for_ledger('vendor_ledger' , $this->input->post('vendor_id'));
			$balance_amount = $this->data['customer_old_amount']['balance'];
			// print_r($this->data['customer_old_amount']['balance']);die();
			$vendor_payment_data = 
				[
					'order_id' => $ids,
					'vendor_id' => $this->input->post('vendor_id'),
					'description' => 'Complete Order',
					'amount' =>  $this->input->post('payments'),
					'status' =>  'Unpaid',
					// 'date' =>  date('Y-m-d'),
				];
				$this->Invoice_model->insert('vendor_payments', $vendor_payment_data);
			$vendor_ladger = 
			[
				'amount' =>  $this->input->post('payments'),
				// 'voucher_no' => $this->input->post('voucher_no'),
				'customer_id' => $this->input->post('vendor_id'),
				'balance'=> $balance_amount + $this->input->post('payments'),
				'date' =>  $this->input->post('invoice_date'),
				'status' =>  1,
				'description' => 'Invoice',
				'reference' => 'debit',
			];
						

			$this->Invoice_model->insert('vendor_ledger', $vendor_ladger);
			

			// $this->Invoice_model->update('vendor_ledger',$data,array('id'=>$this->input->post('id')));
			// echo "<pre>";
			// print_r($this->data['vendor_payments_detail']);die();
			redirect('admin/payments/all_vandor_payments');
		}
		public function submit_selected_vandor_payments()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}

			$p_ids = $this->input->post('id[]');
			// print_r($p_ids);die();
			$payment_data = [];	
			for ($i=0; $i < sizeof($p_ids); $i++) { 

				
				$this->db->select('orders.* , van.vendor_name' );
	    		$this->db->from('orders');
	            $this->db->join('vendor van' , 'van.id = orders.order_vendor_id' , 'left');

	    		$this->db->where('orders.id' , $p_ids[$i] );
	           $this->data['selected_payments_data'] = $this->db->get()->row_array();
				array_push($payment_data, $this->data['selected_payments_data'] );
			}

			$this->data['selected_data'] = $payment_data;
			// echo "<pre>";
			// print_r($this->data['selected_data']);die();
			
			$this->data['title'] = 'Submit Selected Vendor Payment';

			$this->load->template('admin/payments/submit/submit_vandor_payment',$this->data);
		}
	}