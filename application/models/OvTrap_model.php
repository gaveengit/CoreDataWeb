<?php
class OvTrap_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('ovi_trap', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function updateRecords($data)
	{
		try {
			$this->db->where('address_id', $data['address_id']);
			$this->db->update('address', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function checkOvId($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"]);
			$this->db->where($array);
			$query = $this->db->get('ovi_trap');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateAddress($data)
	{
		try {
			$array = array('add_line1' => $data["add_line1"], 'add_line2' => $data["add_line2"],
				'address_id !=' => $data["address_id"],'location_status'=>$data["location_status"]);
			$this->db->where($array);
			$query = $this->db->get('address');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records()
	{
		try {
			$this->db->select('ovi_trap.trap_id as trap_id, 
                   ovi_trap.trap_status as trap_status, 
                   ovi_trap.trap_position as trap_position, 
                   ovi_trap.coordinates as coordinates,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('ovi_trap');
			$this->db->join('person', 'ovi_trap.person_id= person.person_id');
			$this->db->join('address', 'ovi_trap.address_id= address.address_id');
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_active()
	{
		try {
			$array = array('location_status' => "Active");
			$this->db->where($array);
			$query=$this->db->get("address");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_individual($data)
	{
		try {
			$this->db->select('ovi_trap.trap_id as trap_id, 
                   ovi_trap.trap_status as trap_status, 
                   ovi_trap.coordinates as coordinates,
                   ovi_trap.trap_position as trap_position,
                   person.person_id as person_id,
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.address_id as address_id,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('ovi_trap');
			$this->db->join('person', 'ovi_trap.person_id= person.person_id');
			$this->db->join('address', 'ovi_trap.address_id= address.address_id');
			$array = array('trap_id' => $data);
			$this->db->where($array);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}


