<?php
class Customer_model extends MY_Model{


	public function get_sale_person()
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('users.role' , 15);

		return $this->db->get()->result_array();
	}
    public function get_all_customer_data()
	{
		$this->db->select('customer.*, user.name');
		$this->db->from('customer');

		$this->db->join('users user' , 'user.id  = customer.sales_person');
		$this->db->where('user.role' , 15);
		return $this->db->get()->result_array();
	}

		public function get_sale_person_by($id)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('users.role' , 15);
		$this->db->where('users.id' , $id);

		return $this->db->get()->result_array();
	}

	public function get_customer_with_sales_person($sales_person_id){

		$this->db->select('cu.*, sp.name as sales_person');
		$this->db->from('customer cu');
		$this->db->join('users sp' , 'sp.id  = cu.sales_person');
		$this->db->where('cu.sales_person' , $sales_person_id );

		return $this->db->get()->result_array();
	}


	public function sales_person_customer($sales_personId){

		$this->db->select('cu.*, sp.name as sales_person');
		$this->db->from('customer cu');
		$this->db->join('users sp' , 'sp.id  = cu.sales_person');

		$this->db->where('cu.sales_person' , $sales_personId );

		return $this->db->get()->result_array();
	}


}