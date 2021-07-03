<?php
class Identification_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('identification_result', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function updateRecords($data,$old_data)
	{
		try {
			$this->db->where('identification_id', $old_data['identification_id_old']);
			$this->db->update('identification_result', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function checkIdentificationId($data)
	{
		try {
			$array = array('identification_id' => $data["identification_id"]);
			$this->db->where($array);
			$query = $this->db->get('identification_result');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateIdentification($data_old)
	{
		try {
			$array = array('identification_id' => $data_old["identification_id_new"], 'identification_id !=' => $data_old["identification_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('identification_result');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records()
	{
		try {
			$query=$this->db->get("identification_result");
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
			$array = array('identification_id' => $data);
			$this->db->where($array);
			$query=$this->db->get("identification_result");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}



