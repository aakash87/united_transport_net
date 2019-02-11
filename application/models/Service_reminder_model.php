<?php

		    class Service_reminder_model extends MY_Model{

		    		public function get_service_reminder_by_date($date)
		    		{
		    			$this->db->select('service_reminder_list.* , service_reminder.description , vehicle.*');
		    			$this->db->join('service_reminder' , 'service_reminder.id = service_reminder_list.sr_id');
		    			$this->db->join('vehicle', 'vehicle.id = service_reminder_list.vehicle_id' );
		    			$this->db->from('service_reminder_list');
		    			$this->db->where('service_reminder_list.date_of_sr' , $date);
		    			return $this->db->get()->result_array();
		    			
		    		}

		    	}