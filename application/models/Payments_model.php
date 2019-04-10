<?php
    class Payments_model extends MY_Model{

    	public function all_rows_with_name()
        {
            $this->db->select('orders.* , van.vendor_name' );
            $this->db->from('orders');
            $this->db->join('vendor van' , 'van.id = orders.order_vendor_id' , 'left');

            $this->db->where("(orders.order_status='Complete' && orders.vendor_payment_status='Unpaid')", NULL, FALSE);
            return $this->db->get()->result_array();

        }
        public function all_rows_with_name_by_id($vendor_id)
        {
            $this->db->select('vendor_external_cost.* , van.vendor_name , ord.pickup_date_and_time, ord.drop_off_location, ord.pickup_location' );
            $this->db->from('vendor_external_cost');
            $this->db->join('vendor van' , 'van.id = vendor_external_cost.vendor_id' , 'left');
            $this->db->join('orders ord' , 'ord.id = vendor_external_cost.order_id' , 'left');

            $this->db->where("(ord.order_status='Complete' && vendor_external_cost.status='UnPaid')", NULL, FALSE);
            $this->db->where('vendor_external_cost.vendor_id' , $vendor_id );
            return $this->db->get()->result_array();

        }
        public function view_paid_vendor_payments()
        {
            // $this->db->select('vendor_ledger.* , ' );
            // $this->db->from('vendor_ledger');
            // $this->db->join('customer cu' , 'cu.id = vendor_ledger.customer_id' , 'left');
            // $this->db->join('orders ord' , 'ord.id = vendor_ledger.voucher_no' , 'left');
            $this->db->select('vendor_payments.*, van.vendor_name , van.vendor_address, van.vendor_type' );
            $this->db->from('vendor_payments');
            $this->db->join('vendor van' , 'van.id = vendor_payments.vendor_id' , 'left');
            // $this->db->where('vendor_payments.status' , 'Paid Invoice' );
            $this->db->where("(vendor_payments.status='Paid Invoice' || vendor_payments.status='Partial Invoice')", NULL, FALSE);
            return $this->db->get()->result_array();
            return $this->db->get()->result_array();

        }
        public function vendor_payments_detail($id)
        {
            $this->db->select('vendor_ledger.* , ' );
            $this->db->from('vendor_ledger');
            $this->db->join('customer cu' , 'cu.id = vendor_ledger.customer_id' , 'left');
            $this->db->join('orders ord' , 'ord.id = vendor_ledger.voucher_no' , 'left');
            

            return $this->db->get()->row_array();

        }
        public function submit_vandor_payment_detail($id)
        {
            $this->db->select('vendor_payments.* , van.vendor_name , van.vendor_address, van.vendor_type' );
            $this->db->from('vendor_payments');
            $this->db->join('vendor van' , 'van.id = vendor_payments.vendor_id' , 'left');
            $this->db->where('vendor_payments.id' , $id);
            return $this->db->get()->row_array();

        }
        public function all_create_inv_with_name()
        {
            $this->db->select('vendor_payments.*, van.vendor_name , van.vendor_address, van.vendor_type' );
            $this->db->from('vendor_payments');
            $this->db->join('vendor van' , 'van.id = vendor_payments.vendor_id' , 'left');
            $this->db->where("(vendor_payments.status='Unpaid' || vendor_payments.status='Partial Invoice')", NULL, FALSE);
            return $this->db->get()->result_array();

        }
        public function vendor_order_detail_for_payment($invoice_id)
        {
            $this->db->select('vendor_external_cost.* , ord.order_date  , ord.pickup_date_and_time  , ord.dropoff_date_and_time  , ord.vehicle_type , ord.pickup_location , ord.drop_off_location, ord.vehicel_of_vendor');
            $this->db->from('vendor_external_cost');
            $this->db->join('orders ord' , 'ord.id = vendor_external_cost.order_id' , 'left');
            $this->db->where('vendor_external_cost.vandor_paymet_id' , $invoice_id);
            return $this->db->get()->result_array();

        }
        public function get_last_record_invoice($table)
        {
            $query = $this->db->query("SELECT * FROM $table  ORDER BY id DESC LIMIT 1");
            $result = $query->row_array();
            return $result;
        }
        public function get_balance_by_id($table , $where)
        {
            $query = $this->db->query("SELECT * FROM $table  WHERE `id` = $where");
            $result = $query->row_array();
            return $result;
        }

        }