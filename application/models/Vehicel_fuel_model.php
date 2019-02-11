<?php
class Vehicel_fuel_model extends MY_Model{

	public function get_rows_with_vehicle_name()
	{
		$this->db->select('vehicel_fuel.* , vehicle.registration_number');
		$this->db->from('vehicel_fuel');
		$this->db->join('vehicle' , 'vehicle.id = vehicel_fuel.vehicle_id');

		return $this->db->get()->result_array();		
		
	}
}