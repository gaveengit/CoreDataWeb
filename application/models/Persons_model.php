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
	function deleteRecord($data){
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
	function display_records_search($person_name,$limit, $start){
		try{
			$this->db->group_start();
			$this->db->or_like('Full_name', $person_name, 'both');
			$this->db->or_like('Contact_number', $person_name, 'both');
			$this->db->group_end();
			$array = array('Person_status !='=>'-2');
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get("person");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search_count($person_name){
		try{
			$this->db->group_start();
			$this->db->or_like('Full_name', $person_name, 'both');
			$this->db->or_like('Contact_number', $person_name, 'both');
			$this->db->group_end();
			$array = array('Person_status !='=>'-2');
			$this->db->where($array);
			$query=$this->db->get("person");
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

	function display_records($limit,$start)
	{
		try {
			$array = array('Person_status !='=>'-2');
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get("person");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_count()
	{
		try {
			$array = array('Person_status !='=>'-2');
			$this->db->where($array);
			$query=$this->db->get("person");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_active()
	{
		try {
			$array = array('Person_status'=>'Active');
			$this->db->where($array);
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
