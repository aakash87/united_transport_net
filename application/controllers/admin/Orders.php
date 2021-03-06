<?php
		    class Orders extends MY_Controller{

		    	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Orders_model');
	        $this->load->model('Invoice_model');
	        $this->module = 'Orders';
	        $this->user_type = $this->session->userdata('user_type');
	        $this->id = $this->session->userdata('user_id');
	        $this->permission = $this->get_permission($this->module,$this->user_type);
	    }public function index()
		{
			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 
			{
				redirect('admin/home');
			}
			$this->data['title'] = 'Orders';
			if ( $this->permission['view_all'] == '1'  &&  $this->user_type == 1){


				$this->data['orders'] = $this->Orders_model->all_rows_with_customer();

			}

			elseif ($this->permission['view_all'] == '1' &&  $this->user_type == 15) {
				
				$this->data['orders'] = $this->Orders_model->all_rows_with_customer_id($this->id);
			}
			

			elseif ($this->permission['view'] == '1') {

				$this->data['orders'] = $this->all_rows_with_customer_byID('orders',array('user_id'=>$this->id));
			}

			// echo "<pre>";
			// print_r($this->data['orders']);die();
			$this->data['permission'] = $this->permission;
			$this->data['user_type'] = $this->user_type;
			$this->load->template('admin/orders/index',$this->data);
		}

		
		public function create()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}


			if ($this->user_type == 1) {
				$this->data['sales_person'] = $this->Orders_model->get_all_sales_person();
			}
			if ($this->user_type == 15 &&  $this->id) {
				
				$this->data['sales_person'] = $this->Orders_model->get_sales_person($this->id );
			}
			$this->data['city_list'] = $this->Orders_model->all_rows('city_list');
			$this->data['vehicle_data'] = $this->Orders_model->all_rows('vehicle');
			$this->data['drivers_data'] = $this->Orders_model->all_rows('drivers');
			$this->data['expense_category'] = $this->Orders_model->all_rows('expense_category');
			$this->data['vendor'] = $this->Orders_model->all_rows('vendor');
			$this->data['local_vendor'] = $this->Orders_model->get_local_vendor();
			$this->data['labour_vendor'] = $this->Orders_model->get_labour_vendor();

			$this->data['title'] = 'Create Orders';$this->load->template('admin/orders/create',$this->data);
		}


		public function insert()
		{
			if ( $this->permission['created'] == '0') 
			{
				redirect('admin/home');
			}
			// echo "<pre>";
			// print_r($_POST);die();
			$data = [

				'order_date' => $this->input->post('order_date'),
				'sales_person_id' => $this->input->post('sales_person_id'),
				'order_customer' => $this->input->post('order_customer'),
				'pickup_date_and_time' => $this->input->post('pickup_date_and_time'),
				'dropoff_date_and_time' => $this->input->post('dropoff_date_and_time'),

				'pickup_address' => $this->input->post('pickup_address'),
				'drop_off_address' => $this->input->post('drop_off_address'),
				
				'pickup_location' => $this->input->post('pickup_location'),
				'drop_off_location' => $this->input->post('drop_off_location'),
				'weight' => $this->input->post('weight'),
				'order_total_amount' => $this->input->post('order_total_amount'),
				'order_type' => $this->input->post('select_order_type'),
				'order_status' => 'pending',
				'inv_created' => 0,
				'order_vendor_id' => $this->input->post('order_vendor_id'),
				'vehicel_of_vendor' => $this->input->post('vehicel_of_vendor'),
				'vehicle_type' => $this->input->post('vehicle_type'),
				'baying_assigned_rates_for_vendor' => $this->input->post('baying_assigned_rates_for_vendor'),
				'order_total_amount' => $this->input->post('order_total_amount'),
				'order_driver' => $this->input->post('order_driver'),
				'local_transport' => $this->input->post('local_transport'),
				'order_tenstion' => $this->input->post('order_tenstion'),
				'order_detention_customer' => $this->input->post('order_detention_customer'),
				'remarks' => $this->input->post('remarks'),
				'builty_num' => $this->input->post('builty_num'),
				'order_local_vendor_id' => $this->input->post('order_local_vendor_id'),
			];
			$data['user_id'] = $this->session->userdata('user_id');
			$id = $this->Orders_model->insert('orders',$data);
			if ($this->input->post('add3_input') == "Yes") {
			$count_labor=count($_POST['labor_charges']);
			for ($i=0; $i < $count_labor ; $i++) {
			     $array_labor=array(
			      'order_id'=>$id,
			      'order_vendor_id'=>$_POST['order_labour_vendor_id'][$i],
			      'labor_charges'=>$_POST['labor_charges'][$i],
			      'labor_charges_customer'=>$_POST['labor_charges_customer'][$i],
			      'labor_charges_description'=>$_POST['labor_charges_description'][$i],
			      
			     );
			      $this->db->insert('order_labor_charges',$array_labor);
			  }
			}
			if ($id) {
				redirect('admin/orders');
			}
		}public function edit($id)
		{
			if ($this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}

			if ($this->user_type == 1) {
				$this->data['sales_person'] = $this->Orders_model->get_all_sales_person();

			}
			if ($this->user_type == 15 &&  $this->id) {
				
				$this->data['sales_person'] = $this->Orders_model->get_sales_person($this->id );
			}


			$this->data['title'] = 'Edit Orders';
			$this->data['orders'] = $this->Orders_model->get_row_single_with_cu($id);$this->load->template('admin/orders/edit',$this->data);
		}
		public function view_order_detail($id)
		{
			if ($this->user_type == 1) {
				
				$this->data['title'] = 'View Order Detail';

				$this->data['vehicle_data'] = $this->Orders_model->all_rows('vehicle');
				$this->data['drivers_data'] = $this->Orders_model->all_rows('drivers');
				$this->data['expense_category'] = $this->Orders_model->all_rows('expense_category');


				$this->data['order_expense'] =  $this->Orders_model->get_order_expense($id);

				
				$this->data['orders'] = $this->Orders_model->get_row_with_customer_data($id);
				
				$this->data['order_second_stop'] = $this->Orders_model->get_row_with_order_second_stop($id);
				$this->data['order_labor_charges'] = $this->Orders_model->get_row_with_order_labor_charges($id);

				// echo '<pre>'; print_r($this->data['orders']);

				// die();

				$this->data['vendor'] = $this->Orders_model->all_rows('vendor');
				$this->data['local_vendor'] = $this->Orders_model->get_local_vendor();
				$this->data['labour_vendor'] = $this->Orders_model->get_labour_vendor();
				// echo "<pre>";
				// print_r($this->data['order_labor_charges']);die();
				$this->load->template('admin/orders/view_order_detail',$this->data);

			}
		}
		public function view_order_detail_by_ids()
		{
			if ($this->user_type == 1) {
				

				$this->data['title'] = 'View Order Detail';
				$this->data['vehicle_data'] = $this->Orders_model->all_rows('vehicle');
				$this->data['drivers_data'] = $this->Orders_model->all_rows('drivers');
				$this->data['expense_category'] = $this->Orders_model->all_rows('expense_category');
				$o_id = explode(',', $_GET['ids']);
				// print_r(count($o_id));

	$selected_data1 = [];	

	for ($i=0; $i < count($o_id); $i++) { 
		$this->data['orders'] = $this->Orders_model->get_row_with_customer_data($o_id[$i]);
		$this->data['order_expense'] =  $this->Orders_model->get_order_expense($o_id[$i]);
		$this->data['order_second_stop'] = $this->Orders_model->get_row_with_order_second_stop($o_id[$i]);
		$this->data['order_labor_charges'] = $this->Orders_model->get_row_with_order_labor_charges($o_id[$i]);
		array_push($selected_data1, $this->data['orders']);
	}
	$this->data['selected_data1'] = $selected_data1;
				

				// echo '<pre>'; print_r($this->data['selected_data4']);

				// die();

				$this->data['vendor'] = $this->Orders_model->all_rows('vendor');
				$this->data['local_vendor'] = $this->Orders_model->get_local_vendor();
				$this->data['labour_vendor'] = $this->Orders_model->get_labour_vendor();
				// echo "<pre>";
				// print_r($this->data['order_labor_charges']);die();
				$this->load->template('admin/orders/view_order_detail_by_ids',$this->data);

			}
		}

		public function update()
		{
			if ( $this->permission['edit'] == '0') 
			{
				redirect('admin/home');
			}

				$data = [
				'order_date' =>  $this->input->post('order_date'),
				'order_customer' =>  $this->input->post('order_customer'),
				'sales_person_id' =>  $this->input->post('sales_person_id'),
				'pickup_date_and_time' =>  $this->input->post('pickup_date_and_time'),
				'dropoff_date_and_time' =>  $this->input->post('dropoff_date_and_time'),
				'pickup_address' =>  $this->input->post('pickup_address'),
				'drop_off_address' =>  $this->input->post('drop_off_address'),
				'drop_off_address' =>  $this->input->post('drop_off_address'),
				'pickup_location' =>  $this->input->post('pickup_location'),
				'drop_off_location' =>  $this->input->post('drop_off_location'),
				'remarks' =>  $this->input->post('remarks'),
				'order_total_amount' =>  $this->input->post('order_total_amount'),
				'order_type' => $this->input->post('select_order_type'),
			];
			



			$id = $this->Orders_model->update('orders',$data,array('id'=>$this->input->post('id')));
			if ($id) {
				redirect('admin/orders');
			}
		}public function delete($id)
		{
			if ( $this->permission['deleted'] == '0') 
			{
				redirect('admin/home');
			}
			$this->Orders_model->delete('orders',array('id'=>$id));
			redirect('admin/orders');
		}



		public function process_of_order_by_admin($id)
		{
			if ($this->user_type == 1) {
				
				$this->data['title'] = 'Process of order';

				$this->data['vehicle_data'] = $this->Orders_model->all_rows('vehicle');
				$this->data['drivers_data'] = $this->Orders_model->all_rows('drivers');
				$this->data['expense_category'] = $this->Orders_model->all_rows('expense_category');


				$this->data['order_expense'] =  $this->Orders_model->get_order_expense($id);

				
				$this->data['orders'] = $this->Orders_model->get_row_with_customer_data($id);
				
				$this->data['order_second_stop'] = $this->Orders_model->get_row_with_order_second_stop($id);
				$this->data['order_labor_charges'] = $this->Orders_model->get_row_with_order_labor_charges($id);

				// echo '<pre>'; print_r($this->data['orders']);

				// die();

				$this->data['vendor'] = $this->Orders_model->all_rows('vendor');
				$this->data['local_vendor'] = $this->Orders_model->get_local_vendor();
				$this->data['labour_vendor'] = $this->Orders_model->get_labour_vendor();
				// echo "<pre>";
				// print_r($this->data['order_labor_charges']);die();
				$this->load->template('admin/orders/templetes/process_of_order_by_admin',$this->data);

			}
		}

		public function delete_order_expense($id, $order_id)
		{
			
			$this->Orders_model->delete('order_expense',array('id'=>$id));
			redirect('admin/orders/process_of_order_by_admin/'.$order_id);
		}
		public function delete_scond_stop($id, $order_id)
		{
			
			$this->Orders_model->delete('order_second_stop',array('id'=>$id));
			redirect('admin/orders/process_of_order_by_admin/'.$order_id);
		}
		public function delete_labor_charges($id, $order_id)
		{
			
			$this->Orders_model->delete('order_labor_charges',array('id'=>$id));
			redirect('admin/orders/process_of_order_by_admin/'.$order_id);
		}
		public function submit_process_by_admin()
		{
			// echo "<pre>";
			// print_r($_POST);die();
			$order_id = $this->input->post('id');

			$sales_person_id = $this->input->post('sales_person_id');

			$customer_old_amount = $this->Invoice_model->get_last_record_for_ledger('vendor_ledger' , $this->input->post('order_vendor_id'));
				

			$data = 
			[
				'order_vehicle' => $this->input->post('order_vehicle'),
				'order_driver' => $this->input->post('order_driver'),
				'order_total_amount' => $this->input->post('order_total_amount'),
				'order_status' => $this->input->post('order_status'),
				// 'net_amount' => $this->input->post('net_amount'),
				'order_vendor_id' => $this->input->post('order_vendor_id'),
				'vehicel_of_vendor' => $this->input->post('vehicel_of_vendor'),
				'vehicle_type' => $this->input->post('vehicle_type'),
				'baying_assigned_rates_for_vendor' => $this->input->post('baying_assigned_rates_for_vendor'),
				'order_total_amount' => $this->input->post('order_total_amount'),
				'order_driver' => $this->input->post('order_driver'),
				'local_transport' => $this->input->post('local_transport'),
				'order_tenstion' => $this->input->post('order_tenstion'),
				'builty_num' => $this->input->post('builty_num'),
				'order_local_vendor_id' => $this->input->post('order_local_vendor_id'),
				'order_tenstion' => $this->input->post('order_tenstion'),
				'order_detention_customer' => $this->input->post('order_detention_customer'),
			];
			

			$id = $this->Orders_model->update('orders',$data,array('id'=>$order_id));

			$expense_count = count($this->input->post('expense_title'));

			for ($i = 0; $i < $expense_count ; $i++) {

				$data_expense = [
					'order_id' => $order_id,
					'expense_title' => $this->input->post('expense_title')[$i],
					'expense_date' => $this->input->post('expense_date')[$i],
					'expense_amount' => $this->input->post('expense_amount')[$i],
					'expense_description' => $this->input->post('expense_description')[$i],
					'expense_category' => $this->input->post('expense_category')[$i],
					'paid_by' => $this->input->post('paid_by')[$i],
					'vehicel_id' => $this->input->post('order_vendor_id'),
					'driver_id' => $this->input->post('order_driver'),
				];

				$this->Orders_model->insert('order_expense',$data_expense);
				if ($this->input->post('paid_by')[$i] == "driver_paid") {
					$driver_old_amount = $this->Invoice_model->get_last_record_for_ledger('driver_ledger' , $this->input->post('order_driver'));
					// print_r();
					$driver_ledger = [
						'customer_id' => $this->input->post('order_driver'),
						'description' => $this->input->post('expense_description')[$i],
						'amount' => $this->input->post('expense_amount')[$i],
						'balance' => $driver_old_amount['balance'] + $this->input->post('expense_amount')[$i],
						'voucher_no' => $order_id,
						'date' => $this->input->post('expense_date')[$i],
						'reference' => 'Credit',
						'expense_title' => $this->input->post('expense_title')[$i],
						'expense_category' => $this->input->post('expense_category')[$i],
						'paid_by' => $this->input->post('paid_by')[$i],
						'vehicel_id' => $this->input->post('order_vendor_id'),
					];

					$this->Orders_model->insert('driver_ledger',$driver_ledger);
				}
			}

			$update_labor_charges = count($this->input->post('update_labor_charges'));

			for ($i = 0; $i < $update_labor_charges ; $i++) {

				$data_update_labor_charges = [
					'order_vendor_id' => $this->input->post('updat_order_labour_vendor_id')[$i],
					'labor_charges' => $this->input->post('update_labor_charges')[$i],
					'labor_charges_customer' => $this->input->post('update_labor_charges_customer')[$i],
					'labor_charges_description' => $this->input->post('update_labor_charges_description')[$i],
				];

				$this->Orders_model->update('order_labor_charges',$data_update_labor_charges,array('id'=>$this->input->post('update_labor_charges_id')[$i] ));
				
			}
			if ($this->input->post('add3_input') == "Yes") {
				
			$count_labor=count($_POST['labor_charges']);
			// print_r($count_labor);die();
			for ($i=0; $i < $count_labor ; $i++) {
			     $array_labor=array(
			      'order_id'=>$order_id,
			      'order_vendor_id'=>$_POST['order_labour_vendor_id'][$i],
			      'labor_charges'=>$_POST['labor_charges'][$i],
			      'labor_charges_customer'=>$_POST['labor_charges_customer'][$i],
			      'labor_charges_description'=>$_POST['labor_charges_description'][$i],
			      
			     );
			      $this->db->insert('order_labor_charges',$array_labor);
			  }
			  }
				
			  $expense_count_for_update = count($this->input->post('expense_title_update'));
			for ($i = 0; $i < $expense_count_for_update ; $i++) {

				$data_expense_update = [
					'order_id' => $order_id,
					'expense_title' => $this->input->post('expense_title_update')[$i],
					'expense_date' => $this->input->post('expense_date_update')[$i],
					'expense_amount' => $this->input->post('expense_amount_update')[$i],
					'expense_category' => $this->input->post('expense_category_update')[$i],
					'expense_description' => $this->input->post('expense_description_update')[$i],
					'paid_by' => $this->input->post('paid_by_update')[$i],
				];

				$this->Orders_model->update('order_expense',$data_expense_update,array('id'=>$this->input->post('expense_update_id')[$i] ));
				
			}



			if ($this->input->post('add2_input') == "Yes") {
				
			$sec_stop_origin_count = count($this->input->post('sec_stop_origin'));

			for ($i = 0; $i < $sec_stop_origin_count ; $i++) {

				$data_stop_origin_count = [
					'driver_id' => $this->input->post('order_driver'),
					'second_stop_order_id' => $order_id ,
					'sec_stop_destination' => $this->input->post('sec_stop_destination')[$i],
					'sec_stop_amount' => $this->input->post('sec_stop_amount')[$i],
					'sec_stop_origin' => $this->input->post('sec_stop_origin')[$i],
				];	

					$this->Orders_model->insert('order_second_stop',$data_stop_origin_count);
				
			}
			}

			$sec_stop_origin_count_update = count($this->input->post('second_stop_id'));

			for ($i = 0; $i < $sec_stop_origin_count_update ; $i++) {

				$data_stop_origin_count_u = [
					'driver_id' => $this->input->post('order_driver'),
					'second_stop_order_id' => $order_id ,
					'sec_stop_destination' => $this->input->post('sec_stop_destination_update')[$i],
					'sec_stop_amount' => $this->input->post('sec_stop_amount_update')[$i],
					'sec_stop_origin' => $this->input->post('sec_stop_origin_update')[$i],
				];	

				$this->Orders_model->update('order_second_stop',$data_stop_origin_count_u,array('id'=>$this->input->post('second_stop_id')[$i] ));
				
			}

			if ($this->input->post('order_status') == "Complete") {

				// vendor payment data start
				if ($this->input->post('order_vendor_id') == TRUE) {
					$external_cost_buying = 
					[
						'order_id' => $order_id,
						'vendor_id' => $this->input->post('order_vendor_id'),
						'vendor_type' => 'Buying',
						'status' => 'UnPaid',
						'detention' => $this->input->post('order_tenstion'),
						'vehicle_buying' => $this->input->post('baying_assigned_rates_for_vendor'),
						'total_cost' => $this->input->post('baying_assigned_rates_for_vendor') + $this->input->post('order_tenstion'),
						'date' => date('d-m-Y'),
					];
					$this->Orders_model->insert('vendor_external_cost',$external_cost_buying);
				}
				if ($this->input->post('order_local_vendor_id') == TRUE) {
					$external_cost_local = 
					[
						'order_id' => $order_id,
						'vendor_id' => $this->input->post('order_local_vendor_id'),
						'vendor_type' => 'Local',
						'status' => 'UnPaid',
						'local_transport' => $this->input->post('local_transport'),
						'total_cost' => $this->input->post('local_transport'),
						'date' => date('d-m-Y'),
					];
					$this->Orders_model->insert('vendor_external_cost',$external_cost_local);
				}
				
				if ($this->input->post('update_labor_charges') == TRUE) {
					$update_labor_charges = count($this->input->post('update_labor_charges'));

					for ($i = 0; $i < $update_labor_charges ; $i++) {

						$data_update_labor_charges = [
							'order_id' => $order_id,
							'vendor_id' => $this->input->post('updat_order_labour_vendor_id')[$i],
							'vendor_type' => 'Labor',
							'status' => 'UnPaid',
							'labour_charges' => $this->input->post('update_labor_charges')[$i],
							'total_cost' => $this->input->post('update_labor_charges')[$i],
							'date' => date('d-m-Y'),
						];
						$this->Orders_model->insert('vendor_external_cost',$data_update_labor_charges);
						
					}
				}
				if ($this->input->post('labor_charges') == TRUE) {
				$count_labor=count($_POST['labor_charges']);
				// print_r($count_labor);die();
				for ($i=0; $i < $count_labor ; $i++) {
				     $array_labor=array(
						'order_id' => $order_id,
						'vendor_id' => $this->input->post('order_labour_vendor_id')[$i],
						'vendor_type' => 'Labor',
						'status' => 'UnPaid',
						'labour_charges' => $this->input->post('labor_charges')[$i],
						'total_cost' => $this->input->post('labor_charges')[$i],
						'date' => date('d-m-Y'),
				     );
				      $this->db->insert('vendor_external_cost',$array_labor);
				  }
					
				}
				// vendor payment data end
			
				$vendor_payment_data = 
				[
					// 'order_id' => $order_id,
					// 'vendor_id' => $this->input->post('order_vendor_id'),
					// 'vehicel_of_vendor' => $this->input->post('vehicel_of_vendor'),
					// 'driver_name' => $this->input->post('driver_name'),
					// 'description' => 'Complete Order',
					'vendor_payment' =>  $this->input->post('baying_assigned_rates_for_vendor'),
					'vendor_payment_status' =>  'Unpaid',
					// 'date' =>  date('Y-m-d'),
				];
							

				$this->Orders_model->update('orders',$vendor_payment_data,array('id'=>$order_id));

				$vehicle_bying_old_amount = $this->Orders_model->get_last_record_for_ledger('vehicle_ledger' , $this->input->post('vehicel_of_vendor'));
				
				$vehicle_bying_ledger = [
					'vehicle_id' => $this->input->post('vehicel_of_vendor'),
					'description' => 'Vehicle Buying',
					'amount' =>   $this->input->post('baying_assigned_rates_for_vendor'),
					'order_id' => $order_id,
					'balance'=> round($this->input->post('baying_assigned_rates_for_vendor') + $vehicle_bying_old_amount['balance']),
					'date' =>  date('d-m-Y'),
					'reference' => 'Debit',
				];


				$this->Invoice_model->insert('vehicle_ledger', $vehicle_bying_ledger);

				
					$sec_stop_amount_for_vendor_update = count($this->input->post('sec_stop_amount_for_vendor_update'));

					for ($i = 0; $i < $sec_stop_amount_for_vendor_update ; $i++) {

						$vehicle_scond_stop_old_amount = $this->Orders_model->get_last_record_for_ledger('vehicle_ledger' , $this->input->post('vehicel_of_vendor'));
										
						$vehicle_scond_stop_ledger = [
							'vehicle_id' => $this->input->post('vehicel_of_vendor'),
							'description' => '2nd Stop',
							'amount' =>   $this->input->post('sec_stop_amount_for_vendor_update')[$i],
							'order_id' => $order_id,
							'balance'=> round($this->input->post('sec_stop_amount_for_vendor_update')[$i] + $vehicle_scond_stop_old_amount['balance']),
							'date' =>  date('d-m-Y'),
							'reference' => 'Debit',
						];


						$this->Invoice_model->insert('vehicle_ledger', $vehicle_scond_stop_ledger);
						
					}

					$expense_amount_update = count($this->input->post('expense_amount_update'));

					for ($i = 0; $i < $expense_amount_update ; $i++) {

						$vehicle_expance_old_amount = $this->Orders_model->get_last_record_for_ledger('vehicle_ledger' , $this->input->post('vehicel_of_vendor'));
										
						$vehicle_expance_ledger = [
							'vehicle_id' => $this->input->post('vehicel_of_vendor'),
							'description' => $this->input->post('expense_category_update')[$i],
							'amount' =>   $this->input->post('expense_amount_update')[$i],
							'order_id' => $order_id,
							'balance'=> round($vehicle_expance_old_amount['balance'] - $this->input->post('expense_amount_update')[$i]),
							'date' =>  date('d-m-Y'),
							'reference' => 'Credit',
						];


						$this->Invoice_model->insert('vehicle_ledger', $vehicle_expance_ledger);
						
					}


			}
			
			redirect('admin/orders');
			



		}


		public function orders_reports()
		{
			$this->data['title'] = 'Order Reports';
			$this->data['orders'] = $this->load->template('admin/orders/orders_reports/count_report_by_salesperson',$this->data);


		}

		public function get_report_by_sales_person()
		{

			if ($this->input->server('REQUEST_METHOD') == 'POST') {

				$sales_person = $this->input->post('select_sales_person');

				$explode_date = explode('-', $_POST['daterange']);

				$current_date = $explode_date[0];
				$str_currentdate = strtotime($current_date);
				$str_current_day = date('Y-m-d' , $str_currentdate );

				$last_date = $explode_date[1];
				$str_last_date = strtotime($last_date);
				$str_last_day = date('Y-m-d' , $str_last_date );

				$this->data['order_of_sales'] = $this->Orders_model->get_orders_by_sales_person($sales_person , $str_current_day , $str_last_day);

				$this->data['str_current_day_show'] = $current_date;
				$this->data['str_last_date_show'] = $last_date;

			}
			else{

				$this->data['order_of_sales'] = [];


			}
				


			$this->data['sales_person'] = $this->Orders_model->all_rows('users');

			$this->data['title'] = 'Sales Person Orders';
			$this->data['orders'] = $this->load->template('admin/orders/orders_reports/get_report_by_sales_person',$this->data);

		}


		public function get_vendor_customer()
		{
			$order_vendor_id = $this->input->post('order_vendor_id');

			// print_r($order_vendor_id);

			$vendor_vehicel = $this->Orders_model->get_vendor_customer_byid($order_vendor_id);

			// print_r($vendor_vehicel);
			echo json_encode($vendor_vehicel);
		}


		public function get_vendor_vehicel_details()
		{
			$vehicel_of_vendorID = $this->input->post('vehicel_of_vendorID');

			// print_r($vehicel_of_vendorID);

			$vendor_vehicel_details =  $this->Orders_model->get_vendor_vehicel_and_driver($vehicel_of_vendorID);

			echo json_encode($vendor_vehicel_details);
		}

		public function update_view_colum()
		{
			$notificationID = $this->input->post('notificationID');

			// print_r($notificationID);

			$data = [	
				'views' => 1
			];

			$this->Orders_model->update('Orders',$data,array('id'=>$notificationID));
		}


		public function get_alert_footer()
		{
			$sales_order =  $this->Orders_model->get_row_single('users',array('id'=>$this->id ));

			// print_r($sales_order);

			echo json_encode($sales_order);
		}
	
		public function add_expense_of_order($orderId)
		{

			$this->data['orderId'] = $orderId;
			$this->data['title'] = 'Order Expense';
			$this->data['orders'] = $this->load->template('admin/orders/templetes/order_expense',$this->data);
		}


		public function add_expense_of_order_insert()
		{

			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				

				$data_expense = [
					'order_id' => $this->input->post('ordersId'),
					'expense_title' => $this->input->post('expense_title'),
					'expense_date' => $this->input->post('expense_date'),
					'expense_amount' => $this->input->post('expense_amount'),
					'expense_description' => $this->input->post('expense_description'),
					
				];

				$this->Orders_model->insert('order_expense',$data_expense);
				redirect('admin/orders');
			}	
			
		}


		public function delete_order()
		{
			$id = $this->input->post('id');
			$this->Orders_model->delete('orders',array('id'=>$id));
			redirect('admin/orders');
		}
		public function delet_all_data($id)
		{
			// $id = $this->input->post('id');
			$this->Orders_model->delete('orders',array('id'=>$id));
			$this->Orders_model->delete('order_expense',array('order_id'=>$id));
			$this->Orders_model->delete('order_labor_charges',array('order_id'=>$id));
			$this->Orders_model->delete('order_second_stop',array('second_stop_order_id'=>$id));
			$this->Orders_model->delete('vendor_external_cost',array('order_id'=>$id));
			redirect('admin/orders');
		}


	}