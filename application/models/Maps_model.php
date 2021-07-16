<?php
class Maps_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('map_layer', $data);
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
			$this->db->where('map_id', $data['map_id']);
			$this->db->update('map_layer', $data);
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
			$this->db->where('map_id', $data['map_id']);
			$this->db->update('map_layer', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
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

	function display_records($limit, $start)
	{
		try {
			$array = array('map_status !=' => '-2');
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get("map_layer");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_all()
	{
		try {
			$array = array('map_status !=' => '-2','map_status'=>'Active');
			$this->db->where($array);
			$query=$this->db->get("map_layer");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_count()
	{
		try {
			$array = array('map_status !=' => '-2');
			$this->db->where($array);
			$query=$this->db->get("map_layer");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search($map_name,$limit,$start){
		try{
			$this->db->like('name', $map_name, 'both');
			$array = array('map_status !=' => '-2');
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get("map_layer");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search_count($map_name){
		try{
			$this->db->like('name', $map_name, 'both');
			$array = array('map_status !=' => '-2');
			$this->db->where($array);
			$query=$this->db->get("map_layer");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_individual($data)
	{
		try {
			$array = array('map_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("map_layer");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}


