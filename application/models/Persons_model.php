<?php
class Persons_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('person', $data);
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
			$this->db->where('Person_id', $data['Person_id']);
			$this->db->update('person', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function checkPersons($data)
	{
		try {
			$array = array('full_name' => $data["full_name"], 'contact_number' => $data["Contact_number"]);
			$this->db->where($array);
			$query = $this->db->get('person');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdatePersons($data)
	{
		try {
			$array = array('full_name' => $data["full_name"], 'contact_number' => $data["Contact_number"],
				'Person_id !=' => $data["Person_id"],'person_status'=>$data["Person_status"]);
			$this->db->where($array);
			$query = $this->db->get('person');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records()
	{
		try {
			$query=$this->db->get("person");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_individual($data)
	{
		try {
			$array = array('Person_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("person");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
}
