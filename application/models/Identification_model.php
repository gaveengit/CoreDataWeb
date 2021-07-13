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

	function deleteRecords($data)
	{
		try {
			$this->db->where('identification_id', $data['identification_id']);
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

	function display_records($limit,$start)
	{
		try {
			$array = array('status !=' => "-2");
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get("identification_result");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_count()
	{
		try {
			$array = array('status !=' => "-2");
			$this->db->where($array);
			$query=$this->db->get("identification_result");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search($identification)
	{
		try {
			$array = array('status !=' => "-2");
			$this->db->where($array);
			$this->db->like('identification_id', $identification, 'both');
			$this->db->or_like('collection_id', $identification, 'both');
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
			$array = array('status' => "1");
			$this->db->where($array);
			$query=$this->db->get("identification_result");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_active_for_screening(){
		$sql="select * from identification_result where status='1' and identification_id not in (select identification_id 
    from screening_result)";
		$query=$this->db->query($sql);
		return $query->result();
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



