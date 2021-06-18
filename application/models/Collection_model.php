<?php
class Collection_model extends CI_Model
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

	function loadBgTraps()
	{
		$sql="SELECT a.bg_trap_id from bg_run_traps a,field_run b, bg_field_run d
			where a.bg_run_id=b.field_run_id and a.bg_run_id=d.bg_run_id and b.run_status='1' and d.bg_run_type='2' and a.bg_trap_id not in (select a.bg_trap_id
			     from bg_run_traps a, field_run b, bg_collection c,bg_field_run d  where a.bg_run_id=b.field_run_id and a.bg_run_id=d.bg_run_id and b.run_status='1'
			    and d.bg_run_type='2' and a.bg_trap_id=c.trap_id and a.bg_run_id=c.run_id)";
		$query=$this->db->query($sql);
		return $query->result();
	}

}




