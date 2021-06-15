<?php
class Mrc_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('mrc', $data);
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

	function checkMrcIdentifier($data)
	{
		try {
			$array = array('mrc_identifier' => $data["mrc_identifier"]);
			$this->db->where($array);
			$query = $this->db->get('mrc');
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
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as trap_status, 
                   mrc.coordinates as coordinates,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
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
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as trap_status, 
                   mrc.coordinates as coordinates,
                   person.person_id as person_id,
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.address_id as address_id,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
			$array = array('mrc_identifier' => $data);
			$this->db->where($array);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}



