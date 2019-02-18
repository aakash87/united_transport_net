<?php

		    class Bank extends MY_Controller{



		    	public function __construct()

	    {

	        parent::__construct();

	        $this->load->model('Bank_model');
	        $this->load->model('Expense_model');

	        $this->module = 'bank';

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
			

			$this->load->template('admin/bank/bank_dash',$this->data);


	    }


	    public function view_index()

		{

			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Bank';

			if ( $this->permission['view_all'] == '1'){$this->data['bank'] = $this->Bank_model->all_rows('bank');}

			elseif ($this->permission['view'] == '1') {$this->data['bank'] = $this->Bank_modelget_rows('bank',array('user_id'=>$this->id));}

			$this->data['permission'] = $this->permission;

			$this->load->template('admin/bank/index',$this->data);

		}public function create()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Create Bank';$this->load->template('admin/bank/create',$this->data);

		}

		public function insert()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Bank_model->insert('bank',$data);

			if ($id) {

				redirect('admin/bank');

			}

		}public function edit($id)

		{

			if ($this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Edit Bank';

			$this->data['bank'] = $this->Bank_model->get_row_single('bank',array('id'=>$id));$this->load->template('admin/bank/edit',$this->data);

		}



		public function update()

		{

			if ( $this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$id = $data['id'];

			unset($data['id']);$id = $this->Bank_model->update('bank',$data,array('id'=>$id));

			if ($id) {

				redirect('admin/bank');

			}

		}public function delete($id)

		{

			if ( $this->permission['deleted'] == '0') 

			{

				redirect('admin/home');

			}

			$this->Bank_model->delete('bank',array('id'=>$id));

			redirect('admin/bank');

		}

		public function bank_deposit()
		{
			// echo 'working';

			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$bank_transfer = $this->input->post('bank_transfer');
					
				if ($this->input->post('transfer_check') == 1) {
						
					$bank_transfer = $this->input->post('bank_transfer');
					
					$this->data['bank_single_trans'] = $this->Bank_model->get_row_single('bank',array('id'=>$bank_transfer));	
					
					$pluse_on_tran = $this->data['bank_single_trans']['amount'] +  $this->input->post('amount');

					$update_val_trans = [
						'amount' => $pluse_on_tran
					];
					
					$this->Bank_model->update('bank',$update_val_trans,array('id'=>$bank_transfer));

					
				}
				else {
					$pluse_on_tran = 0;
				}

				$bank_id = $this->input->post('bank_id');
				$this->data['bank_single'] = $this->Bank_model->get_row_single('bank',array('id'=>$bank_id));
				$last_record = $this->Expense_model->get_last_record_expense('bank_deposit_log');
				$last_record_id = $last_record['id'] + 1;
				 // print_r($last_record_id);
				 // die();
				if ($this->input->post('transfer_check') == 1) {
					$total_amount = $this->data['bank_single']['amount'] - $this->input->post('amount');
					$ref_no = "TR-".$last_record_id."-".date('Y');
					$reference= "Transfer";

				}
				else{
					$total_amount = $this->data['bank_single']['amount'] + $this->input->post('amount');
					$ref_no = "DP-".$last_record_id."-".date('Y');
					$reference = "Deposit";

				}

				// print_r($last_record_id['id']);
				// die();
				$bank_transfer = $this->input->post('bank_transfer');
				$deposit_data = [
					'bank_d_id' => $bank_id,
					'bank_d_amount' => $this->input->post('amount'),
					'bank_tran_id' => $bank_transfer,
					'bank_tran_amount' => $pluse_on_tran,
					'bank_total_amount' => $total_amount,
					'ref_no' => $ref_no,
					'reference' => $reference,
					'description' => $this->input->post('bank_description'),
					'date' => $this->input->post('create_date')
				];


				$id = $this->Bank_model->insert('bank_deposit_log', $deposit_data);


				if ($id) {

					$update_val_data = [
						'amount' => $total_amount
					];
					
					$this->Bank_model->update('bank',$update_val_data,array('id'=>$bank_id));
				}

				redirect('/admin/bank/');
			}

			$this->data['banks'] = $this->Bank_model->all_rows('bank');

			$this->data['title'] = 'Bank Deposit';$this->load->template('admin/bank/bank_deposit',$this->data);

		}


		public function deposit_reports()
		{	
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				
				$banks_id = $this->input->post('banks_id');

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );


				$this->data['deposits'] = $this->Bank_model->get_deposit_reports($str_current_day , $str_last_day , $banks_id);


				$this->data['bank_id'] = $banks_id;

				$this->data['date_range'] = $this->input->post('daterange');

			}
			else {

				$this->data['deposits'] = [];

				$this->data['bank_id'] = [];

				$this->data['date_range'] = '';
			}

			$this->data['banks'] = $this->Bank_model->all_rows('bank');
			$this->data['title'] = 'Bank Deposit Report';$this->load->template('admin/bank/bank_report/deposit_reports',$this->data);
		}


		public function driver_deposit()
		{
			// echo 'working';

			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$driverId = $this->input->post('driverId');
				$driver_amount = $this->input->post('driver_amount');
				$bank_id = $this->input->post('bank_id');
				$bank_amount = $this->input->post('bank_amount');
				$description = $this->input->post('descriptiondescription');
				$amount = $this->input->post('amount');
					
				$this->data['bank_single'] = $this->Bank_model->get_row_single('bank',array('id'=>$bank_id));
				$total_amount_after_paid = $this->data['bank_single']['amount'] - $this->input->post('amount');
				$last_record = $this->Expense_model->get_last_record_expense('bank_deposit_log');
				$last_record_id = $last_record['id'] + 1;
				$ref_no = "Pay-".$last_record_id."-".$this->input->post('driverId').'-'.date('Y');
				// echo "<pre>";
				// print_r($_POST);
				// die();
				// $reference = "Deposit";
				$update_bank_amount = [
						'amount' => $total_amount_after_paid
					];
					
				$this->Bank_model->update('bank',$update_bank_amount,array('id'=>$bank_id));
				$deposit_data = [
					'bank_d_id' => $bank_id,
					'bank_tran_amount' => $this->input->post('amount'),
					'bank_total_amount' => $total_amount_after_paid,
					'ref_no' => $ref_no,
					'reference' => 'Credit',
					'date' => $this->input->post('create_date'),
					'description' => $this->input->post('description')
				];


				$id = $this->Bank_model->insert('bank_deposit_log', $deposit_data);

				$driver_ledger = [
					'customer_id' => $this->input->post('driverId'),
					'description' => 'Recive Amount',
					'amount' => $this->input->post('amount'),
					'balance' => $this->input->post('driver_amount') - $this->input->post('amount'),
					'ref_no' => $ref_no,
					'date' => $this->input->post('create_date'),
					'reference' => 'Debit',
				];


				$id = $this->Bank_model->insert('driver_ledger', $driver_ledger);

				redirect('admin/bank/');
			}

			$this->data['drivers'] = $this->Bank_model->all_rows('drivers');
			$this->data['banks'] = $this->Bank_model->all_rows('bank');

			$this->data['title'] = 'Driver Deposit';$this->load->template('admin/bank/driver_deposit',$this->data);

		}

	}