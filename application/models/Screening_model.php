<?php
class Screening_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('screening_result', $data);
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
			$this->db->where('screening_id', $old_data['screening_id_old']);
			$this->db->update('screening_result', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function checkScreeningId($data)
	{
		try {
			$array = array('screening_id' => $data["screening_id"]);
			$this->db->where($array);
			$query = $this->db->get('screening_result');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateScreening($data_old)
	{
		try {
			$array = array('screening_id' => $data_old["screening_id_new"], 'screening_id !=' => $data_old["screening_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('screening_result');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records()
	{
		try {
			$query=$this->db->get("screening_result");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_active()
	{
		try {
			$array = array('status' => "1");
			$this->db->where($array);
			$query=$this->db->get("screening_result");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_individual($data)
	{
		try {
			$array = array('screening_id' => $data);
			$this->db->where($array);
			$query=$this->db->get("screening_result");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}




