<?php
class Orders_model extends MY_Model{


	public function all_rows_with_customer()
	{
		$this->db->select('orders.* , cu.full_name ,  driv.First_Name as driver_name, vehicle.registration_number' );
		$this->db->from('orders');
		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');
		$this->db->join('drivers driv' , 'driv.id = orders.order_driver' , 'left');
		$this->db->join('vehicle' , 'vehicle.id = orders.order_vehicle' , 'left');

		return $this->db->get()->result_array();

	}


	public function all_rows_with_customer_id($sales_person_id)
	{
		$this->db->select('orders.* , cu.full_name ,  driv.First_Name as driver_name, vehicle.registration_number' );
		$this->db->from('orders');
		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');
		$this->db->join('drivers driv' , 'driv.id = orders.order_driver' , 'left');
		$this->db->join('vehicle' , 'vehicle.id = orders.order_vehicle' , 'left');

		$this->db->where('orders.sales_person_id' , $sales_person_id );

		return $this->db->get()->result_array();

	}

	public function get_row_with_customer_data($id)
	{
		$this->db->select('orders.* , cu.full_name , cu.sales_person , cu.sp_commission , users.name as sp_name' );
		$this->db->from('orders');
		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');
		$this->db->join('users' , 'users.id = cu.sales_person' , 'left');

		$this->db->where('orders.id' , $id );

		return $this->db->get()->row_array();
	}


	public function get_order_expense($id)

	{
		$this->db->select('order_expense.*');
		$this->db->from("order_expense");

		$this->db->where('order_expense.order_id' , $id);

		return $this->db->get()->result_array();
	}

	public function get_orders_by_sales_person($sales_person , $str_current_day , $str_last_day)
	{
		$this->db->select('orders.* , cu.* , sp.name');
		$this->db->from('orders');
		$this->db->join('customer cu' , 'cu.id = orders.order_customer');
		$this->db->join('users sp' , 'cu.sales_person = sp.id');
		$this->db->where('orders.sales_person_id' , $sales_person);
		$this->db->where('order_date >=' , $str_current_day );
		$this->db->where('order_date <=' , $str_last_day );	

		return $this->db->get()->result_array();
	}

	public function get_sales_person_role($id){

		$this->db->select('users.name , users.id');
		$this->db->from('users');
		$this->db->where('users.id' , $id);

		return $this->db->get()->result_array();


	}
	
	public function get_all_sales_person()
	{
		$this->db->select('users.name , users.id');
		$this->db->from('users');
		return $this->db->get()->result_array();
	}

	public function get_vendor_customer_byid($order_vendor_id)

	{
		$this->db->select('vehicle.*');
		$this->db->from('vehicle');
		$this->db->where('vehicle.vendor_id' , $order_vendor_id);
		return $this->db->get()->result_array();
	}

	public function get_vendor_vehicel_and_driver($vehicel_of_vendorID)
	{

		$this->db->select('vehicle.* , drivers.First_Name as driver_name , drivers.id as driversID');
		$this->db->from('vehicle');
		$this->db->join('drivers' , 'vehicle.vehicle_driver =  drivers.id' , 'left' );

		$this->db->where('vehicle.id' , $vehicel_of_vendorID);
		return $this->db->get()->row_array();


	}

	public function get_row_with_order_second_stop($order_vendor_id)

	{
		$this->db->select('order_second_stop.*');
		$this->db->from('order_second_stop');

		$this->db->where('order_second_stop.second_stop_order_id' , $order_vendor_id );
		return $this->db->get()->result_array();
	}
	public function get_row_with_order_labor_charges($order_vendor_id)

	{
		$this->db->select('order_labor_charges.*');
		$this->db->from('order_labor_charges');

		$this->db->where('order_labor_charges.order_id' , $order_vendor_id );
		return $this->db->get()->result_array();
	}



	public function get_sales_person($user_id)
	{
		$this->db->select('users.name , users.id');
		$this->db->from('users');
		$this->db->where('users.id' , $user_id);
		return $this->db->get()->result_array();
	}

	public function get_row_single_with_cu($orderID)
	{	
		$this->db->select('orders.* , cu.full_name , cu.id as customerId');
		$this->db->from('orders');
		$this->db->join('customer cu' , 'cu.id = orders.order_customer', 'left');
		$this->db->where('orders.id' , $orderID);

		return $this->db->get()->row_array();

	}
	public function get_local_vendor()
	{
		$this->db->select('vendor.*' );
		$this->db->from('vendor');

		$this->db->where('vendor.vendor_type' , "Local" );

		return $this->db->get()->result_array();

	}
	public function get_labour_vendor()
	{
		$this->db->select('vendor.*' );
		$this->db->from('vendor');

		$this->db->where('vendor.vender_labour' , "Yes" );

		return $this->db->get()->result_array();

	}
	public function get_last_record_for_ledger($table , $vehicle_id)
	{
		$query = $this->db->query("SELECT * FROM $table where vehicle_id = '$vehicle_id'  ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();
		return $result;
	}

}