<?php 

class Home_model extends MY_Model
{

	public function count_notification_for_admin()
	{
		$this->db->select('orders.*');
		$this->db->from('orders');
		$this->db->where('orders.views' , 0);

		return $this->db->get()->result_array();
		
	}



	public function count_notification_for_admin_sales($sales_personID)
	{
		$this->db->select('orders.*');
		$this->db->from('orders');
		$this->db->where('orders.sales_person_id' , $sales_personID);
		$this->db->where('orders.views' , 0);

		return $this->db->get()->result_array();
		
	}
	
}