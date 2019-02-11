<?php
    class Payments_model extends MY_Model{

    	public function all_rows_with_name()
    	{
    		$this->db->select('vendor_ledger.* , ' );
    		$this->db->from('vendor_ledger');
    		$this->db->join('customer cu' , 'cu.id = vendor_ledger.customer_id' , 'left');
    		$this->db->join('orders ord' , 'ord.id = vendor_ledger.voucher_no' , 'left');
    		$this->db->where('vendor_ledger.status' , '0' );
    		return $this->db->get()->result_array();

    	}
    	public function view_paid_vendor_payments()
    	{
    		$this->db->select('vendor_ledger.* , ' );
    		$this->db->from('vendor_ledger');
    		$this->db->join('customer cu' , 'cu.id = vendor_ledger.customer_id' , 'left');
    		$this->db->join('orders ord' , 'ord.id = vendor_ledger.voucher_no' , 'left');
    		$this->db->where('vendor_ledger.status' , 'paid' );
    		return $this->db->get()->result_array();

    	}
    	public function vendor_payments_detail($id)
    	{
    		$this->db->select('vendor_ledger.* , ' );
    		$this->db->from('vendor_ledger');
    		$this->db->join('customer cu' , 'cu.id = vendor_ledger.customer_id' , 'left');
    		$this->db->join('orders ord' , 'ord.id = vendor_ledger.voucher_no' , 'left');
    		$this->db->where('vendor_ledger.id' , $id );

			return $this->db->get()->row_array();

    	}


    	}