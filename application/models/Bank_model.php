<?php
	
class Bank_model extends MY_Model{

		public function get_deposit_reports($str_current_day , $str_last_day ,$banks_id )
		{
			$this->db->select('bank_dep.* , bn.bank_name as bank_name , btn.bank_name as btn');
			$this->db->from('bank_deposit_log bank_dep');
			$this->db->join('bank bn' , 'bn.id =  bank_dep.bank_d_id' , 'left');
			$this->db->join('bank btn' , 'btn.id =  bank_dep.bank_tran_id', 'left');

			 $this->db->where('bank_dep.date >=' , $str_current_day );
			$this->db->where('bank_dep.date <=' , $str_last_day );
			$this->db->where("(bank_dep.bank_d_id='". $banks_id ."' OR bank_dep.bank_tran_id='".$banks_id."')", NULL, FALSE);	

			return $this->db->get()->result_array();
			
		}


	}