<?php
class Invoice_model extends MY_Model{

	public function  all_rows_with_complete_status($select_customer)
	{
		$this->db->select('orders.* , cu.full_name as customer_name , cu.sales_person , cu.sp_commission , users.name as sp_name' );
		$this->db->from('orders');
		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');
		$this->db->join('users' , 'users.id = cu.sales_person' , 'left');
		$this->db->where('orders.order_status' , 'Complete');
		$this->db->where('cu.id' , $select_customer );
		$this->db->where('orders.inv_created !=' , 1);
		return $this->db->get()->result_array();
		
	}


	public function  all_rows_with_data()
	{
		$this->db->select('invoice.*,  cu.full_name, users.name as sp_name');
		$this->db->from('invoice');
		$this->db->join('customer cu' , 'cu.id  = invoice.customer_id');
		$this->db->join('users' , 'users.id = cu.sales_person' , 'left');

		return $this->db->get()->result_array();
		
	}


	public function get_last_record_invoice($table)		
	{	
		$query = $this->db->query("SELECT * FROM $table  ORDER BY id DESC LIMIT 1");			
		$result = $query->row_array();			
		return $result;		
	}

	public function get_summary_data($id , $str_current_day , $str_last_day)
	{
		$this->db->select('orders.* , cu.full_name as customer_name , cu.sales_person, cu.tax , cu.sp_commission , users.name as sp_name , vendor.vendor_name , invoice_ol.misc_expense , vehicle.registration_number , vehicle.vehicle_bying , vehicle.vehicle_type , invoice.invoice_paid_date , invoice.invoice_voucher_number , invoice.invoice_status , invoice.tax_per , invoice.with_holding_tax , invoice.total_amount , invoice.tax_amount as inv_tax_amount , invoice.id as inv_id , invoice_log.order_id as log_id');

		$this->db->from('orders');
		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');
		$this->db->join('users' , 'users.id = cu.sales_person' , 'left');
		$this->db->join('vehicle' , 'vehicle.id = orders.vehicel_of_vendor' , 'left');
		$this->db->join('vendor' , 'vendor.id = orders.order_vendor_id' , 'left');
		$this->db->join('invoice_order_list invoice_ol' , 'invoice_ol.inv_ordre_id = orders.id' , 'left');
		

		$this->db->join('invoice_log' , 'invoice_log.order_id = orders.id' , 'left');

		$this->db->join('invoice' , 'invoice_log.invoice_id = invoice.id' , 'left');

		$this->db->where('orders.order_status' , 'Complete');
 	
 		if ($id == "All") {
 			$this->db->where('orders.order_date >=' , $str_current_day );
 			$this->db->where('orders.order_date <=' , $str_last_day );	
 		}
 		else{
 		$this->db->where('orders.sales_person_id' , $id);
		$this->db->where('orders.order_date >=' , $str_current_day );
		$this->db->where('orders.order_date <=' , $str_last_day );	


 		}

		


		return $this->db->get()->result_array();

	}

	public function get_last_record_for_ledger($table , $customer_id)
	{
		$query = $this->db->query("SELECT * FROM $table where customer_id = '$customer_id'  ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();
		return $result;
	}
	public function get_last_record_for_ledger_by_selse_person($table , $sales_person_id)
	{
		$query = $this->db->query("SELECT * FROM $table where sales_person_id = '$sales_person_id'  ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();
		return $result;
	}
	public function get_last_record_bank_log($table , $bank_d_id)
	{
		$query = $this->db->query("SELECT * FROM $table where bank_d_id = '$bank_d_id'  ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();
		return $result;
	}

	public function  get_invvooce_by_id($id)
	{
		$this->db->select('invoice.*, cu.*, users.name as sp_name');
		$this->db->from('invoice');
		$this->db->join('customer cu' , 'cu.id  = invoice.customer_id');
		$this->db->join('users' , 'users.id = cu.sales_person' , 'left');
		// $this->db->where('invoice.id <=' , $id );	
		$this->db->where('invoice.id =' , $id );	
		return $this->db->get()->result_array();
		
	}
}