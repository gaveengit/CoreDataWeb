<?php
class Address_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('address', $data);
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
	function deleteRecords($data)
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

	function checkAddress($data)
	{
		try {
			$array = array('add_line1' => $data["add_line1"], 'add_line2' => $data["add_line2"]);
			$this->db->where($array);
			$query = $this->db->get('address');
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
			$array = array('location_status !=' => "-2");
			$this->db->where($array);
			$query=$this->db->get("address");
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
			$array = array('Address_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("address");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}

