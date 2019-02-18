<?php
class Reports_model extends MY_Model{

	public function  vehicel_reports_profit_m($vehicel_id , $str_current_day , $str_last_day )
	{
		
		$this->db->select('orders.* , cu.full_name');
		$this->db->from('orders');

		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');

		if ($vehicel_id == TRUE) {	
				$this->db->where('orders.vehicel_of_vendor' , $vehicel_id);	

			    $this->db->where('order_date >=' , $str_current_day );
				$this->db->where('order_date <=' , $str_last_day );
			}	else{

			    $this->db->where('order_date >=' , $str_current_day );
				$this->db->where('order_date <=' , $str_last_day );
			}

		return $this->db->get()->result_array();
	}

	public function vehicels_exp_rep($vehicel_id , $str_current_day , $str_last_day )
	{
		$this->db->select('order_expense.*');
		$this->db->from('order_expense');

	    $this->db->where('vehicel_id' , $vehicel_id );
	    $this->db->where('expense_date >=' , $str_current_day );
		$this->db->where('expense_date <=' , $str_last_day );	

		return $this->db->get()->result_array();
	}

	public function sales_person_ledger($sales_person_id ,  $str_current_day ,  $str_last_day)
	{
		$this->db->select('sales_person_ledger.* , cu.full_name , ' );
		$this->db->from('sales_person_ledger');
		$this->db->join('invoice inv' , 'inv.invoice_voucher_number =  sales_person_ledger.voucher_no' , 'left');
		$this->db->join('customer cu' , 'cu.id =  sales_person_ledger.customer_id' , 'left');

		$this->db->where('sales_person_ledger.sales_person_id' , $sales_person_id);
		$this->db->where('sales_person_ledger.date >=' , $str_current_day );
		$this->db->where('sales_person_ledger.date <=' , $str_last_day );

		return $this->db->get()->result_array();
	}

	public function customer_ledger($customer_id , $str_current_day ,  $str_last_day)
	{
		$this->db->select('customer_ledger.* , cu.full_name , ' );
		$this->db->from('customer_ledger');
		$this->db->join('invoice inv' , 'inv.invoice_voucher_number =  customer_ledger.voucher_no' , 'left');
		$this->db->join('customer cu' , 'cu.id =  customer_ledger.customer_id' , 'left');

		$this->db->where('customer_ledger.customer_id' , $customer_id);
		$this->db->where('customer_ledger.date >=' , $str_current_day );
		$this->db->where('customer_ledger.date <=' , $str_last_day );	

		return $this->db->get()->result_array();
	}
	public function vendor_ledger($vendor_id , $str_current_day ,  $str_last_day)
	{
		$this->db->select('vendor_ledger.* , ven.vendor_name , ' );
		$this->db->from('vendor_ledger');
		
		$this->db->join('vendor ven' , 'ven.id =  vendor_ledger.customer_id' , 'left');

		$this->db->where('vendor_ledger.customer_id' , $vendor_id);
		$this->db->where('vendor_ledger.date >=' , $str_current_day );
		$this->db->where('vendor_ledger.date <=' , $str_last_day );

		return $this->db->get()->result_array();
	}
	public function driver_ledger($driver_id , $str_current_day , $str_last_day)
	{
		$this->db->select('driver_ledger.* , driv.First_Name');
		$this->db->from('driver_ledger');

		$this->db->join('drivers driv' , 'driv.id = driver_ledger.customer_id' , 'left');

		if ($driver_id == TRUE) {	
				$this->db->where('driver_ledger.customer_id' , $driver_id);	

			    $this->db->where('date >=' , $str_current_day );
				$this->db->where('date <=' , $str_last_day );
			}	else{

			    $this->db->where('date >=' , $str_current_day );
				$this->db->where('date <=' , $str_last_day );
			}

		return $this->db->get()->result_array();
	}

	public function  vehicle_ledger($vehicel_id , $str_current_day , $str_last_day )
	{
		
		$this->db->select('vehicle_ledger.* , ve.registration_number , exp_cat.expense_cate_title');
		$this->db->from('vehicle_ledger');

		$this->db->join('vehicle ve' , 've.id = vehicle_ledger.vehicle_id' , 'left');
		$this->db->join('expense_category exp_cat' , 'exp_cat.id = vehicle_ledger.description' , 'left');

		if ($vehicel_id == TRUE) {	
				$this->db->where('vehicle_ledger.vehicle_id' , $vehicel_id);	

			    $this->db->where('date >=' , $str_current_day );
				$this->db->where('date <=' , $str_last_day );
			}	else{

			    $this->db->where('date >=' , $str_current_day );
				$this->db->where('date <=' , $str_last_day );
			}

		return $this->db->get()->result_array();
	}
	public function get_srb_reports()
	{
		$this->db->select('invoice.*, cu.*');
		$this->db->from('invoice');
		$this->db->join('customer cu' , 'cu.id = invoice.customer_id' , 'left');
		// $this->db->where('orders.order_driver' , $driver_id);

		return $this->db->get()->result_array();
	}

}