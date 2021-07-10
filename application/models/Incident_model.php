<?php
class Incident_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('incident', $data);
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
			$this->db->where('incident_id', $data['incident_id']);
			$this->db->update('incident', $data);
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
			$this->db->where('incident_id', $data['incident_id']);
			$this->db->update('incident', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function display_records_search($incident){
		try{
			$this->db->like('member_name', $incident, 'both');
			$this->db->or_like('full_address', $incident, 'both');
			$array = array('incident_status !='=>'-2');
			$this->db->where($array);
			$query=$this->db->get("incident");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function checkMap($data)
	{
		try {
			$array = array('name' => $data["name"]);
			$this->db->where($array);
			$query = $this->db->get('map_layer');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateMap($data)
	{
		try {
			$array = array('name' => $data["name"],
				'map_id !=' => $data["map_id"]);
			$this->db->where($array);
			$query = $this->db->get('map_layer');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records()
	{
		try {
			$array = array('incident_status !=' => '-2');
			$this->db->where($array);
			$query=$this->db->get("incident");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_individual($data)
	{
		try {
			$array = array('incident_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("incident");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}



