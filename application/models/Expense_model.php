<?php
class Expense_model extends MY_Model{

	public function get_expense($id = null)
		{
			$this->db->select('expense.*')
					 ->from('expense'); if ($id != null) {
					$this->db->where('expense.user_id', $id);
				}return $this->db->get()->result_array();
		}
	public function get_last_record_expense($table)
		{
			$query = $this->db->query("SELECT * FROM $table  ORDER BY id DESC LIMIT 1");
			$result = $query->row_array();
			return $result;
		}


		public function get_expense_detail_byID($id)
		{
			$this->db->select('exp_d.*');
			$this->db->from('expense_detail exp_d');
			$this->db->where('exp_d.exp_id' , $id);
			return $this->db->get()->result_array();
		}

		public function get_expense_by_filter($str_current_day ,  $str_last_day)
		{

			$this->db->select('expense.*, expense_category.expense_cate_title');
			$this->db->from('expense');
			$this->db->join('expense_category' , 'expense.exp_cat = expense_category.id' , 'left');
		    $this->db->where('Date_Of_Submission >=' , $str_current_day );
			$this->db->where('Date_Of_Submission <=' , $str_last_day );	
			return $this->db->get()->result_array();
			
		}

		public function get_expense_with_category()
		{
			$zero = 9;
			$this->db->select('exp.* , exp_cat.expense_cate_title as exp_cate');
			$this->db->from('expense exp');
			$this->db->where('exp.exp_cat !=' , $zero);
			$this->db->join('expense_category exp_cat' , 'exp_cat.id = exp.exp_cat' , 'left');

			return $this->db->get()->result_array();


		}


		public function vehicle_maintenance_data($str_current_day ,  $str_last_day , $vehicle_id)
		{
			// $zero = 9;
			$this->db->select('exp.* , exp_cat.expense_cate_title as exp_cate , veh.registration_number');
			$this->db->from('expense exp');
			$this->db->where('exp.exp_cat' , 9 );
			$this->db->join('expense_category exp_cat' , 'exp_cat.id = exp.exp_cat' , 'left');
			$this->db->join('vehicle veh' , 'veh.id = exp.vehicle_id' , 'left');

			$this->db->where('exp.Date_Of_Submission >=' , $str_current_day );
			$this->db->where('exp.Date_Of_Submission <=' , $str_last_day );	
			$this->db->where('exp.vehicle_id <=' , $vehicle_id );	

			return $this->db->get()->result_array();


		}


}
