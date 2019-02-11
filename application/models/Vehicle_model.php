<?php
class Vehicle_model extends MY_Model{



	public function all_rows_get_owner()
	{

		$this->db->select('vehicle.* ,  vehicel_owner.owner_full_name , vendor.vendor_name');
		$this->db->from('vehicle');
		$this->db->join('vehicel_owner' , 'vehicel_owner.id = vehicle.ower_id' , 'left');
		$this->db->join('vendor' , 'vendor.id = vehicle.vendor_id', 'left' );

		return $this->db->get()->result_array();
		
	}


	public function  vehicel_reports_profit_m($vehicel_id , $str_current_day , $str_last_day )
	{
		
		$this->db->select('orders.* , cu.full_name');
		$this->db->from('orders');

		$this->db->join('customer cu' , 'orders.order_customer = cu.id' , 'left');

		$this->db->where('orders.vehicel_of_vendor' , $vehicel_id);	

	    $this->db->where('order_date >=' , $str_current_day );
		$this->db->where('order_date <=' , $str_last_day );	

		return $this->db->get()->result_array();
	}
}