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
	    public function vandor_payments_index()
		{
			$this->data['title'] = 'vendor_payment';
			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments'] = $this->Payments_model->all_create_inv_with_name();
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/vandor_payments_index',$this->data);
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
			
			// echo "<pre>";
			// print_r($this->data['vendor_payments']);die();
			$this->load->template('admin/payments/search_vandor_for_payments',$this->data);
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
		public function create_vendor_payment_invoice()
		{
			$id = $this->input->post('id[]');
			$ids =  implode(',', $this->input->post('id[]'));
			
			
			$this->data['title'] = 'create_vendor_payment_invoice';

			$this->data['permission'] = $this->permission;
			$this->data['customer_old_amount'] = $this->Invoice_model->get_last_record_for_ledger('vendor_ledger' , $this->input->post('vendor_id'));
			$balance_amount = $this->data['customer_old_amount']['balance'];
			// print_r($this->data['customer_old_amount']['balance']);die();
			$invoice_code_plus = $this->Payments_model->get_last_record_invoice('invoice');

 			$invoice_code_id = $invoice_code_plus['id'] + 1;

 			$invoice_code = 'INV-V'."-".$this->input->post('vendor_id'). $invoice_code_id.'-'.date('y');
			// print_r($this->input->post('vendor_id'));die();
			for ($i=0; $i < sizeof($id); $i++) { 
				print_r($id);
				$order_data = 
				[
					'vendor_payment_status' =>  'Create Invoice',
				];
				$this->Payments_model->update('orders',$order_data,array('id'=>$id[$i]));
			}
			$vendor_payment_data = 
				[
					'order_id' => $ids,
					'vendor_id' => $this->input->post('vendor_id'),
					'description' => 'Complete Order',
					'balance' =>  $this->input->post('payments'),
					'total_amount' =>  $this->input->post('payments'),
					'status' =>  'Unpaid',
					'invoice_date' =>  $this->input->post('invoice_date'),
					'invoice_no' =>  $invoice_code,
				];
				$vandor_paymet_id = $this->Invoice_model->insert('vendor_payments', $vendor_payment_data);
			$vendor_ladger = 
			[
				'amount' =>  $this->input->post('payments'),
				
				'customer_id' => $this->input->post('vendor_id'),
				'balance'=> $balance_amount + $this->input->post('payments'),
				'date' =>  $this->input->post('invoice_date'),
				'status' =>  1,
				'description' => 'Invoice',
				'reference' => 'debit',
				'invoice_no' =>  $invoice_code,
			];
						

			$this->Invoice_model->insert('vendor_ledger', $vendor_ladger);
			
			redirect('admin/payments/vandor_payments_index');
		}
		public function create_selected_vandor_payments()
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

			$this->load->template('admin/payments/vendor/create_selected_vandor_payments',$this->data);
		}
		public function submit_vandor_payment($id)
		{

			$this->data['title'] = 'submit_vandor_payment';

			$this->data['permission'] = $this->permission;
			$this->data['vendor_payments_detail'] = $this->Payments_model->submit_vandor_payment_detail($id);
			// echo "<pre>";
			// print_r($this->data['vendor_payments_detail']);die();
			$this->load->template('admin/payments/vendor/submit_vandor_payment',$this->data);
		}
		public function submit_vendor_invoice()
		{
			$id = $this->input->post('id');
			$ids =  explode(',',$this->input->post('o_id'));
			
			$this->data['title'] = 'submit_vendor_invoice';

			$this->data['permission'] = $this->permission;
			$this->data['customer_old_amount'] = $this->Invoice_model->get_last_record_for_ledger('vendor_ledger' , $this->input->post('vendor_id'));
			$balance_amount = $this->data['customer_old_amount']['balance'];

			$this->data['payment_balance_amount'] = $this->Payments_model->get_balance_by_id('vendor_payments' , $this->input->post('id'));
			$payment_balance_amount = $this->data['payment_balance_amount']['balance'];
			// print_r($this->data['customer_old_amount']['balance']);die();
			// print_r(count($ids));die();
			$total_paid_amount = $this->input->post('old_amount') + $this->input->post('pay_amount');
			$payment_balans_amount = $this->input->post('balance') - $this->input->post('pay_amount');
			// print_r($this->input->post('vendor_id'));die();
			// print_r($total_paid_amount);die();
			for ($i=0; $i < sizeof($ids); $i++) { 
				// print_r($id);
				if ($this->input->post('total_amount') == $total_paid_amount) {
					$order_data = 
					[
						'vendor_payment_status' =>  'Paid Invoice',
					];
					$this->Payments_model->update('orders',$order_data,array('id'=>$ids[$i]));
				}
				else{
					$order_data = 
					[
						'vendor_payment_status' =>  'Paid Invoice',
					];
					$this->Payments_model->update('orders',$order_data,array('id'=>$ids[$i]));
				}
			}
			if ($this->input->post('total_amount') == $total_paid_amount) {
				$vendor_payment_data = 
				[
					'amount' =>  $total_paid_amount,
					'balance' =>  '0',
					'status' =>  'Paid Invoice',
					'date' =>  $this->input->post('pay_date'),
				];
				$vandor_paymet_id = $this->Payments_model->update('vendor_payments',$vendor_payment_data,array('id'=>$id));
			}
			else{
				$vendor_payment_data = 
				[
					'amount' =>  $total_paid_amount,
					'balance' =>  $payment_balans_amount,
					'status' =>  'Partial Invoice',
					'date' =>  $this->input->post('pay_date'),
				];
				$vandor_paymet_id = $this->Payments_model->update('vendor_payments',$vendor_payment_data,array('id'=>$id));
			}

			
			$vendor_ladger = 
			[
				'amount' =>  $this->input->post('pay_amount'),
				'customer_id' => $this->input->post('vendor_id'),
				'balance'=> $balance_amount - $this->input->post('pay_amount'),
				'date' =>  $this->input->post('pay_date'),
				'status' =>  1,
				'description' => 'Invoice Paid',
				'reference' => 'credit',
				'invoice_no' =>  $this->input->post('invoice_no'),
			];
						

			$this->Invoice_model->insert('vendor_ledger', $vendor_ladger);
			
			redirect('admin/payments/vandor_payments_index');
		}
	}