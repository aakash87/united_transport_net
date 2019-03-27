<?php
		    class Invoice extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Invoice_model');
	        $this->load->model('Expense_model');
	        $this->module = 'invoice';
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
		
			$this->data['title'] = 'Invoice';
			if ( $this->permission['view_all'] == '1'){

				$this->data['invoice'] = $this->Invoice_model->all_rows_with_data('invoice');
			
			}
		
			elseif ($this->permission['view'] == '1') {
				$this->data['invoice'] = $this->Invoice_model->get_rows('invoice',array('user_id'=>$this->id));
			}
			// echo "<pre>";
			// print_r($this->data['invoice']);die();
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/invoice/index',$this->data);

		}


		public function add_invoice()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Invoice';
			


			if ( $this->permission['view_all'] == '1'){

				if ($this->input->server('REQUEST_METHOD') == 'POST') {

					$select_customer = $this->input->post('select_customer');
					
					$this->data['customer'] = $select_customer;	

					$this->data['invoice'] = $this->Invoice_model->all_rows_with_complete_status($select_customer);
				}
				else
				{
					$this->data['invoice'] = [];

					$this->data['customer'] = '';
				}
			
			}

			elseif ($this->permission['view'] == '1') {$this->data['invoice'] = $this->Invoice_modelget_rows('invoice',array('user_id'=>$this->id));}
			// echo "<pre>";
			// print_r($this->data['invoice']);die();
			$this->data['customers'] = $this->Invoice_model->all_rows('customer');
			$this->data['permission'] = $this->permission;
			$this->load->template('admin/invoice/add_invoice',$this->data);
		}


		public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Create Invoice';$this->load->template('admin/invoice/create',$this->data);
		}
		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Invoice_model->insert('invoice',$data);
			if ($id) {
				redirect('admin/invoice');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Edit Invoice';
			$this->data['invoice'] = $this->Invoice_model->get_row_single('invoice',array('id'=>$id));$this->load->template('admin/invoice/edit',$this->data);
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}
			$data = $this->input->post();
			$id = $data['id'];
			unset($data['id']);$id = $this->Invoice_model->update('invoice',$data,array('id'=>$id));
			if ($id) {
				redirect('admin/invoice');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Invoice_model->delete('invoice',array('id'=>$id));
			redirect('admin/invoice');
		}
		public function delete_invoice()
		{
			$id = $this->input->post('id');
			$this->Invoice_model->delete('invoice',array('id'=>$id));
			redirect('admin/invoice');
		}

		public function create_selected_inboice()
		{

			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			 

			$ids = $this->input->post('id[]');
			
			$invoice_data = [];	

			$expense_data = [];

			for ($i=0; $i < sizeof($ids); $i++) { 
				
				$this->db->select('orders.* , cu.full_name as customer_name, cu.id as cu_id , cu.id as customer_id , cu.sales_person , cu.sp_commission , cu.SSP_tax ,  cu.ssp_tax_val , users.name as sp_name' );
				$this->db->from('orders');
				$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');
				$this->db->join('users' , 'users.id = cu.sales_person' , 'left');

				$this->db->where('orders.id' ,$ids[$i]);
				$this->data['invoice'] = $this->db->get()->row_array();
				// print_r($this->data['invoice']);
				// die();
			   array_push($invoice_data, $this->data['invoice'] );
			}

			

			$this->data['selected_data'] = $invoice_data;
			// echo "<pre>";
			// print_r($this->data['selected_data']);die();
			$this->data['title'] = 'Create Order Invoice';$this->load->template('admin/invoice/create_order_invoice',$this->data);
		}

		public function create_selected_invoice_submit()
			{	
				// echo "<pre>";
				// print_r($_POST);die();
				$order_count = count($this->input->post('orderID'));
				// total_site_amount
				$total_vehicel_amount = $this->input->post('total_amount');
				$total_labour_chargers = $this->input->post('total_labour_chargers');
				$order_tenstion_total = $this->input->post('order_tenstion_total');
				$second_stop_amount_total = $this->input->post('second_stop_amount_total');
				$total_site_amount = $total_labour_chargers +  $order_tenstion_total + $second_stop_amount_total;
				$add_more_tax = $total_vehicel_amount +  $total_site_amount;
				$final_amount = $add_more_tax + $this->input->post('ssp_text_total');
				// total_site_amount
				$order_ids =  implode(',', $this->input->post('orderID[]')); 
				$invoice_code_plus = $this->Invoice_model->get_last_record_invoice('invoice'); 		
				$invoice_code_id = $invoice_code_plus['id'] + 1; 			
				$invoice_code =  $invoice_code_id;
				$customer_old_amount = $this->Invoice_model->get_last_record_for_ledger('customer_ledger' , $this->input->post('customer_nameID'));
				$sales_person_old_amount = $this->Invoice_model->get_last_record_for_ledger_by_selse_person('sales_person_ledger' , $this->input->post('sales_person_id'));
				// print_r($customer_old_amount['balance']);die();
				$data_invoice = [
					'invoice_total_amount' =>  $this->input->post('amount_with_tax'),
					// 'invoice_total_amount' =>  $final_amount ,
					'balance' =>  $this->input->post('amount_with_tax'),
					't_with_out_sst' =>  $this->input->post('t_with_out_sst'),
					'invoice_voucher_number' => "INV-".$invoice_code."-".date('Y'),
					'order_ids' =>  $order_ids,
					'customer_id' => $this->input->post('customer_nameID'),
					'sales_person_id' => $this->input->post('sales_person_id'),
					'invoice_status' => 0,
					'invoice_create_date' => date('d-m-Y'),
					'total_amount' => $this->input->post('grand_total'),
					'total_labour_chargers' => $this->input->post('total_labour_chargers'),
					'order_detention_customer_total' => $this->input->post('order_detention_customer_total'),
					'all_total_buying' => $this->input->post('all_total_buying'),
					'second_stop_amount_total' => $this->input->post('second_stop_amount_total'),
					'tax_per' => $this->input->post('tax_per'),
					'tax_amount' => $this->input->post('tax_amount'),
					'status' => 'Create Invoice',
				];


				$id = $this->Invoice_model->insert('invoice', $data_invoice);
				$customer_ledger = [
					'amount' =>  $this->input->post('amount_with_tax') ,
					'voucher_no' => "INV-".$invoice_code."-".date('Y'),
					'customer_id' => $this->input->post('customer_nameID'),
					'balance'=> round($this->input->post('amount_with_tax') + $customer_old_amount['balance']),
					'date' =>  date('Y-m-d'),
					'description' => 'invoice Create',
					'reference' => 'invoice',
				];

				$this->Invoice_model->insert('customer_ledger', $customer_ledger);

				$sales_person_ledger = [
					'amount' =>  $this->input->post('amount_with_tax'),
					'voucher_no' => "INV-".$invoice_code."-".date('Y'),
					'sales_person_id' => $this->input->post('sales_person_id'),
					'customer_id' => $this->input->post('customer_nameID'),
					'balance'=> round($this->input->post('amount_with_tax') + $sales_person_old_amount['balance']),
					'date' =>  date('Y-m-d'),
					'description' => 'invoice Create',
					'reference' => 'invoice',
				];


				$this->Invoice_model->insert('sales_person_ledger', $sales_person_ledger);
				if ($id) {

					for ($i = 0; $i < $order_count ; $i++) {

						$order_list = [
							'inv_ordre_id' => $this->input->post('orderID')[$i],
							'invoice_id' => $id,
							'misc_expense' => $this->input->post('misc_expense')[$i],
							'labor_charges' => $this->input->post('labor_charges')[$i],
							'second_stop_amount' => $this->input->post('second_stop_amount')[$i],
							'order_tenstion' => $this->input->post('order_tenstion')[$i],
							// 'ssp_percantage' => $this->input->post('ssp_percantage')[$i],
							'order_in_amount' => $this->input->post('order_single_amout')[$i],

						];

						$this->Invoice_model->insert('invoice_order_list', $order_list);
					}

					for ($i = 0; $i < $order_count ; $i++) {

						$update_order_colume = [
							'inv_created' => 1,
						];

						$this->Invoice_model->update('orders',$update_order_colume,array('id'=>$this->input->post('orderID')[$i]));
						
					}


					for ($i = 0; $i < $order_count ; $i++) {

						$invoice_log = [
							'invoice_id' => $id,
							'order_id' => $this->input->post('orderID')[$i],
						];

						$this->Invoice_model->insert('invoice_log', $invoice_log);
					}
					
				}

				redirect('admin/invoice');
			}
		// end public create_selected_inboice_submit


		public function summary_report_invoice()
		{	
			if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				$sales_person = $this->input->post('select_sales_person');

				$this->data['summary_data'] = $this->Invoice_model->get_summary_data($sales_person , $str_current_day , $str_last_day);
			}
			else
			{
				$this->data['summary_data'] = [];

			}

			// echo "<pre>";
			// print_r($this->data['summary_data']);die();
			$this->data['sales_person'] = $this->Invoice_model->all_rows('users');
			$this->data['title'] = 'Summary Report';

			$this->load->template('admin/invoice/invoice_reports/summary_reports',$this->data);
		}


		public function inv_with_out_sst($invoice_id)
		{

		
			$this->data['invoice_detail'] =  $this->Invoice_model->get_invvooce_by_id($invoice_id);
			$this->data['invoice'] =  $this->Invoice_model->get_row_single('invoice',array('id'=>$invoice_id));
			
			$this->data['customer'] =  $this->Invoice_model->get_row_single('customer',array('id'=>$this->data['invoice']['customer_id']));
			
			$this->data['invoice_order_id'] = $this->data['invoice']['order_ids'];

			$o_id = explode(',',$this->data['invoice_order_id']);



			$order_data = [];
		
			for ($i=0; $i < sizeof($o_id); $i++) { 
				$this->db->select('orders.*, inv_list.*, ve.registration_number');
				$this->db->from('orders');
				
				$this->db->join('invoice_order_list inv_list' , 'inv_list.inv_ordre_id = orders.id' , 'left');
				$this->db->join('vehicle ve' , 've.id = orders.vehicel_of_vendor' , 'left');
				 
				$this->db->where('orders.id' , $o_id[$i]);

				$this->data['order']= $this->db->get()->row_array();
				
				array_push($order_data, $this->data['order']);	
			}


			$this->data['selected_data'] = $order_data;

			// echo '<pre>'; print_r($this->data['selected_data']);
			// die();

 			$this->load->library('pdf');
			$this->pdf->load_view('admin/invoice/invoice_reports/inv_with_out_sst',$this->data );
			$this->pdf->Output();




		}


		public function inv_with_sst($invoice_id)
		{

			$this->data['invoice_detail'] =  $this->Invoice_model->get_invvooce_by_id($invoice_id);
			$this->data['invoice'] =  $this->Invoice_model->get_row_single('invoice',array('id'=>$invoice_id));
			$this->data['customer'] =  $this->Invoice_model->get_row_single('customer',array('id'=>$this->data['invoice']['customer_id']));
			
			$this->data['invoice_order_id'] = $this->data['invoice']['order_ids'];

			$o_id = explode(',',$this->data['invoice_order_id']);

			// print_r($o_id);die();

			$order_data = [];
		
			for ($i=0; $i < sizeof($o_id); $i++) { 
				$this->db->select('orders.*, inv_list.*, ve.registration_number');
				$this->db->from('orders');
				
				$this->db->join('invoice_order_list inv_list' , 'inv_list.inv_ordre_id = orders.id' , 'left');
				$this->db->join('vehicle ve' , 've.id = orders.vehicel_of_vendor' , 'left');
				 
				$this->db->where('orders.id' , $o_id[$i]);

				$this->data['order']= $this->db->get()->row_array();
				
				array_push($order_data, $this->data['order']);	
			}


			$this->data['selected_data'] = $order_data;

			// echo '<pre>'; print_r($this->data['invoice']);
			// die();

 			$this->load->library('pdf');
			$this->pdf->load_view('admin/invoice/invoice_reports/inv_with_sst',$this->data );
			$this->pdf->Output();



		}



		public function submit_invoice($invoice_id)
		{

			$this->data['invoice_tb_id'] =  $invoice_id;
			$this->data['invoice'] =  $this->Invoice_model->get_row_single('invoice',array('id'=>$invoice_id));
			
			$this->data['customer'] =  $this->Invoice_model->get_row_single('customer',array('id'=>$this->data['invoice']['customer_id']));
			
			$this->data['invoice_order_id'] = $this->data['invoice']['order_ids'];

			$o_id = explode(',',$this->data['invoice_order_id']);



			$order_data = [];
		
			for ($i=0; $i < sizeof($o_id); $i++) { 
				$this->db->select('invoice_order_list.*  , orders.order_total_amount , orders.order_date, orders.pickup_location, orders.drop_off_location,  vehicle.*');
				$this->db->from('invoice_order_list');
				$this->db->join('orders' , 'orders.id ='. $o_id[$i]);
				 
				$this->db->join('vehicle' , 'orders.vehicel_of_vendor = vehicle.id ');
				
				$this->db->where('invoice_order_list.inv_ordre_id' , $o_id[$i]);

				$this->data['order']= $this->db->get()->row_array();
				
				array_push($order_data, $this->data['order']);	
			}


			// $this->data['selected_data'] = $order_data;
			// print_r($this->data['invoice']);
			// die();
			// echo '<pre>'; print_r($this->data['selected_data'] );

			$this->data['banks'] = $this->Invoice_model->all_rows('bank');
			$this->data['sales_person'] = $this->Invoice_model->all_rows('users');
			$this->data['title'] = 'Create Order Invoice';

			$this->load->template('admin/invoice/submit_invoice',$this->data);


		}

		public function submit_order_invoice()
		{
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				// echo "<pre>";
				// print_r($_POST);
				// die();

				$total_with_tax = $this->input->post('with_holding_amount') + $this->input->post('paid_amount_cu') + $this->input->post('deduction_amount');
				// die();
				$paid_amount_cu = $this->input->post('paid_amount_cu');
				$invoice_total_amount = $this->input->post('invoice_total_amount');
				
				$this->data['customer_old_amount'] = $this->Invoice_model->get_last_record_for_ledger('customer_ledger' , $this->input->post('customer_id'));
				// print_r($this->data['customer_old_amount']['balance']);die();
		   	 	$debitamount =  $paid_amount_cu;

		   	 	$prev_balance =  $this->data['customer_old_amount']['balance'];

		   	 	$total_balance =  $prev_balance - $debitamount;

				// echo "<pre>";
				// print_r($prev_balance);
				// echo "<br>";
				// die();
				$total_paid_amount = $this->input->post('amount') + $this->input->post('paid_amount_cu') + $this->input->post('with_holding_amount') + $this->input->post('deduction_amount');
				$round_total_paid_amount = round($total_paid_amount);
				$payment_balans_amount = $this->input->post('balance') - $this->input->post('paid_amount_cu') - round($this->input->post('with_holding_amount') - $this->input->post('deduction_amount'));
				
			
				$in_amount_for_if = round($this->input->post('invoice_total_amount'));
				if ($in_amount_for_if == $round_total_paid_amount) {
					$options = 
					[
						'customer_paid_amount' =>  $round_total_paid_amount,
						'balance' =>  '0',
						'status' =>  'Paid Invoice',
						'invoice_paid_date' => $this->input->post('invoice_paid_date'),
						'with_holding_tax' => $this->input->post('with_holding_tax'),
						'remarks' => $this->input->post('remarks'),
					];
					$this->Invoice_model->update('invoice',$options,array('id'=>$this->input->post('invoice_tb_id') ) );
				}
				else{
					$options = 
					[
						'customer_paid_amount' =>  $round_total_paid_amount,
						'balance' =>  $payment_balans_amount,
						'status' =>  'Partial Invoice',
						'invoice_paid_date' => $this->input->post('invoice_paid_date'),
						'with_holding_tax' => $this->input->post('with_holding_tax'),
						'remarks' => $this->input->post('remarks'),
					];
					$this->Invoice_model->update('invoice',$options,array('id'=>$this->input->post('invoice_tb_id') ) );
				}

	              $data2=array(

	                  'customer_id'=> $this->input->post('customer_id'),
	                  'amount'=> $paid_amount_cu,
	                  'date'=>$this->input->post('invoice_paid_date'),
	                  'status'=> '1',
	                  'voucher_no'=> $this->input->post('invoice_voucher_number'),
	                  'description'=> 'Invoice Paid',
	                  'balance'=> $total_balance,
	                  'reference'=> 'debit',
	              );
	              $this->Invoice_model->insert('customer_ledger', $data2);
	              
	              if ($this->input->post('with_holding_amount') == TRUE) {
	              	$total_balance_after_w_h = $total_balance - round($this->input->post('with_holding_amount'));
	              	$data_tax=array(
	              	    'customer_id'=> $this->input->post('customer_id'),
	              	    'amount'=> round($this->input->post('with_holding_amount')),
	              	    'date'=>$this->input->post('invoice_paid_date'),
	              	    'status'=> '1',
	              	    'voucher_no'=> $this->input->post('invoice_voucher_number'),
	              	    'description'=> 'Tax Amount',
	              	    'balance'=> $total_balance_after_w_h,
	              	    'reference'=> 'debit',
	              	);
	              	$this->Invoice_model->insert('customer_ledger', $data_tax);
	              }
	              
	              if ($this->input->post('deduction') == "Yes" ) {
	              	$total_balance_after_dect = $total_balance - round($this->input->post('with_holding_amount')) - $this->input->post('deduction_amount');
	              	$data_deduction=array(
	              	    'customer_id'=> $this->input->post('customer_id'),
	              	    'amount'=> $this->input->post('deduction_amount'),
	              	    'date'=>$this->input->post('invoice_paid_date'),
	              	    'status'=> '1',
	              	    'voucher_no'=> $this->input->post('invoice_voucher_number'),
	              	    'description'=> 'Deduction '.$this->input->post('deduction_details'),
	              	    'balance'=> $total_balance_after_dect,
	              	    'reference'=> 'debit',
	              	);
	              	$this->Invoice_model->insert('customer_ledger', $data_deduction);
	              }
	             	// print_r($total_balance);die();
	          		$this->data['sels_person_old_amount'] = $this->Invoice_model->get_last_record_for_ledger_by_selse_person('sales_person_ledger' , $this->input->post('sales_person_id'));
	          		 // print_r($this->data['sels_person_old_amount']['balance']);die();
	             	 	$debitamount1 =  $paid_amount_cu;

	             	 	$prev_balance1 =  $this->data['sels_person_old_amount']['balance'];

	             	 	$total_balance1 =  $prev_balance1 - $debitamount1;
	              $data3=array(

	                  'sales_person_id'=> $this->input->post('sales_person_id'),
	                  'customer_id'=> $this->input->post('customer_id'),
	                  'amount'=> $paid_amount_cu,
	                  'date'=>$this->input->post('invoice_paid_date'),
	                  'status'=> '1',
	                  'voucher_no'=> $this->input->post('invoice_voucher_number'),
	                  'description'=> 'Invoice Paid',
	                  'balance'=> $total_balance1,
	                  'reference'=> 'debit',
	              );
	              $this->Invoice_model->insert('sales_person_ledger', $data3);


					$old_bank_amount = $this->input->post('bank_amount');
					$bank_new_data = [
						'amount'=> $old_bank_amount + $paid_amount_cu,
					];
                  	$this->Invoice_model->update('bank',$bank_new_data,array('id'=>$this->input->post('bank_id') ) );
              	$this->data['bank_log_old_amount'] = $this->Invoice_model->get_last_record_bank_log('bank_deposit_log' , $this->input->post('bank_id'));
              	$old_bank_log_balance = $this->data['bank_log_old_amount']['bank_total_amount'];
	          		  // print_r($this->data['bank_log_old_amount']['bank_total_amount']);die();
               $bank_log_data=array(

	              'bank_d_id'=> $this->input->post('bank_id'),
	              'bank_d_amount'=> $paid_amount_cu,
	              'date'=>$this->input->post('invoice_paid_date'),
	              'bank_total_amount'=> $old_bank_log_balance + $paid_amount_cu,
	              'invoice_voucher_number'=> $this->input->post('invoice_voucher_number'),
	              'ref_no'=> $this->input->post('invoice_voucher_number'),
	              'reference'=> "Invoice",
              	);
              	$this->Invoice_model->insert('bank_deposit_log', $bank_log_data);
              	
              	$bank_ledger = [
              		'bank_id' => $this->input->post('bank_id'),
              		'description' => 'Invoice Paid',
              		'amount' => $this->input->post('paid_amount_cu'),
              		'balance' => $this->input->post('bank_amount') + $this->input->post('paid_amount_cu'),
              		'ref_no' => $this->input->post('invoice_voucher_number'),
              		'date' => $this->input->post('invoice_paid_date'),
              		'reference' => 'Debit',
              	];
              	$this->Invoice_model->insert('bank_ledger', $bank_ledger);
				redirect('admin/invoice');

				
			}
		}

	}