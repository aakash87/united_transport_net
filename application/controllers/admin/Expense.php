<?php

		    class Expense extends MY_Controller{



		    	public function __construct()

	    {

	        parent::__construct();

	        $this->load->model('Expense_model');
	        $this->load->model('Invoice_model');

	        $this->module = 'expense';

	        $this->user_type = $this->session->userdata('user_type');

	        $this->id = $this->session->userdata('user_id');

	        $this->permission = $this->get_permission($this->module,$this->user_type);

	    }public function index()

		{

			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Expense';

			if ( $this->permission['view_all'] == '1'){
				$this->data['expense'] = $this->Expense_model->get_expense_with_category();
			}

			elseif ($this->permission['view'] == '1') {$this->data['expense'] = $this->Expense_model->get_expense($this->id);}

			$this->data['permission'] = $this->permission;

			$this->load->template('admin/expense/index',$this->data);

		}
		public function create()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Create Expense';
			$this->data['table_bank'] = $this->Expense_model->all_rows('bank');

			$this->data['vehicle'] = $this->Expense_model->all_rows('vehicle');

			$this->data['expense_cat'] = $this->Expense_model->all_rows('expense_category');
			
			$this->data['banks'] = $this->Expense_model->all_rows('bank');

			$this->load->template('admin/expense/create',$this->data);

		}

public function insert()
		{
			
			$expense_field_count = count($this->input->post('detail_expense_title'));
			// $expense_detail_title = $this->input->post('detail_expense_title');
			// $expense_detail_amount= $this->input->post('detail_expense_amount');

			// print_r($expense_field_count);

			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			$voucher_code_plus_expense = $this->Expense_model->get_last_record_expense('expense');
			$voucher_code_id_expense = $voucher_code_plus_expense['id'] + 1;
			// print_r($voucher_code_id_expense);die();
			$voucher_code_expense = "EXP-".$voucher_code_id_expense."-".date('Y');
			$data = [

				// 'vehicle_id' => $this->input->post('vehicle_id'),
				'Expense_Title' => $this->input->post('Expense_Title'),
				'exp_cat' => $this->input->post('exp_cat'),
				'Expense_Description' => $this->input->post('Expense_Description'),
				'Expense_Amount' => $this->input->post('Expense_Amount'),
				'vehicle_id' => $this->input->post('vehicle_id'),
				'Expense_Voucher' => $voucher_code_expense,
				'Date_Of_Submission' => $this->input->post('Date_Of_Submission'),

			];
			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Expense_model->insert('expense',$data);
			if ($id) {
				/**/

				for ($i = 0; $i < $expense_field_count; $i++) {
			
					$expense_data = [
						'exp_id' => $id,
						'expense_title' => $this->input->post('detail_expense_title')[$i],
						'expense_amount' => $this->input->post('detail_expense_amount')[$i],
					];

					$this->Expense_model->insert('expense_detail',$expense_data);
				}

				// $test	= $this->Expense_model->get_row_single('bank',array('id'=>$_POST['Select_Bank']));


			 //   	$bank_amount = $test['amount']; 
			 //   	$expense_amount = $_POST['Expense_Amount'];
			 //   	$new_bank_amount = $bank_amount - $expense_amount;


				

				// $data2=array(
                     
    //                   'amount'=> $new_bank_amount,
    //                  );

                // $id2 = $this->Expense_model->update('bank',$data2,array('id'=>$_POST['Select_Bank']));

            }
				$old_bank_amount = $this->input->post('bank_amount');
					$bank_new_data = [
						'amount'=> $old_bank_amount - $this->input->post('Expense_Amount'),
					];
					$this->Expense_model->update('bank',$bank_new_data,array('id'=>$this->input->post('bank_id') ) );
				$this->data['bank_log_old_amount'] = $this->Invoice_model->get_last_record_bank_log('bank_deposit_log' , $this->input->post('bank_id'));
					$old_bank_log_balance = $this->data['bank_log_old_amount']['bank_total_amount'];
					  // print_r($this->data['bank_log_old_amount']['bank_total_amount']);die();
					$bank_log_data=array(

					'bank_d_id'=> $this->input->post('bank_id'),
					'bank_d_amount'=> $this->input->post('Expense_Amount'),
					'date'=>$this->input->post('Date_Of_Submission'),
					'bank_total_amount'=> $old_bank_log_balance - $this->input->post('Expense_Amount'),
					'expance_id'=> $id,
					'ref_no'=> "EXP-".$id."-".date('Y'),
					'reference'=> "Expance",
					);
					$this->Invoice_model->insert('bank_deposit_log', $bank_log_data);

					$bank_ledger_minus = [
						'bank_id' => $this->input->post('bank_id'),
						'description' => $this->input->post('Expense_Description'),
						'amount' => $this->input->post('Expense_Amount'),
						'balance' => $this->input->post('bank_amount') - $this->input->post('Expense_Amount'),
						'ref_no' => "EXP-".$id."-".date('Y'),
						'date' => $this->input->post('Date_Of_Submission'),
						'reference' => 'Credit',
					];
					$this->Invoice_model->insert('bank_ledger', $bank_ledger_minus);
                
                  	redirect('admin/expense');

		}
		public function edit($id)

		{

			if ($this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}


			$this->data['expense_cat'] = $this->Expense_model->all_rows('expense_category');
			$this->data['title'] = 'Edit Expense';

			$this->data['expense'] = $this->Expense_model->get_row_single('expense',array('id'=>$id));$this->data['table_bank'] = $this->Expense_model->all_rows('bank');$this->data['table_bank'] = $this->Expense_model->all_rows('bank');$this->load->template('admin/expense/edit',$this->data);

		}



		public function update()

		{

			if ( $this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$id = $data['id'];

			unset($data['id']);$id = $this->Expense_model->update('expense',$data,array('id'=>$id));

			if ($id) {

				redirect('admin/expense');

			}

		}public function delete($id)

		{

			if ( $this->permission['deleted'] == '0') 

			{

				redirect('admin/home');

			}

			$this->Expense_model->delete('expense',array('id'=>$id));

			redirect('admin/expense');

		}

		public function get_bank_amount()



		 {

		  $bankId = $this->input->post('bankId');

		  // $customer_data =  $this->Customer_invoices_model->Expense_model($bank_name);

		   $Amount =  $this->Expense_model->get_row_single('bank',array('id'=>$bankId));

		  



		  echo $Amount['amount'];

		 

		 }

		 /*aakash*/

		 public function get_model_detail_data()
		 {
		 	$expenseID = $this->input->post('id'); 

		 	$this->data['expense_details'] = $this->Expense_model->get_expense_detail_byID($expenseID);

		 	foreach ($this->data['expense_details'] as $expense_d) {
		 		echo '
		 			<tr>
			 			<td> '. $expense_d['expense_title']  .' </td>
			 			<td> '. $expense_d['expense_amount']  .' </td>
			 		</tr>	

		 		';

		 	}
		 }


		 public function general_expenses_reports()
		 {
		 	if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 

			{

				redirect('admin/home');

			}

			if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$exp_cat = $this->input->post('exp_cat');	
				$explode_date = explode('-', $_POST['daterange']);
				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				$this->data['expense'] = $this->Expense_model->get_expense_by_filter($exp_cat , $str_current_day ,  $str_last_day);
			}	
			else
			{
				$this->data['expense'] = [];

			}

			$this->data['title'] = 'Expense';
			$this->data['permission'] = $this->permission;
			$this->data['expense_type'] = $this->Expense_model->all_rows('expense_category');
		 	$this->load->template('admin/expense/expense_reports/general_expenses_reports',$this->data);
		 }



		 public function vehicle_maintenance()
		 {

		 	if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}


			if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$vehicle_id = $this->input->post('select_vehicel');

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				$this->data['vehicle_expense'] = $this->Expense_model->vehicle_maintenance_data($str_current_day ,  $str_last_day , $vehicle_id);

				$this->data['vehicle_id'] = $vehicle_id;
				$this->data['date_range'] = $this->input->post('daterange');
			}
			else
			{
				$this->data['date_range'] = '';	
				$this->data['vehicle_id'] = [];
				$this->data['vehicle_expense'] = [];
			}



		 	$this->data['vehicles'] = $this->Expense_model->all_rows('vehicle');
		 	$this->data['title'] = 'Vehicle Maintenance';
			$this->data['permission'] = $this->permission;
		 	$this->load->template('admin/expense/expense_reports/expense_vehicle_maintenance',$this->data);


		 }




	}