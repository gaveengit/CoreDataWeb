<?php
class Export_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('biobank_export', $data);
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
			$this->db->where('export_id', $old_data['export_id_old']);
			$this->db->update('biobank_export', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function checkExportId($data)
	{
		try {
			$array = array('export_id' => $data["export_id"]);
			$this->db->where($array);
			$query = $this->db->get('biobank_export');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateExport($data_old)
	{
		try {
			$array = array('export_id' => $data_old["export_id_new"], 'export_id !=' => $data_old["export_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('biobank_export');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function deleteRecords($data)
	{
		try {
			$this->db->where('export_id', $data['export_id']);
			$this->db->update('biobank_export', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function display_records($limit, $start)
	{
		try {
			$array = array('export_status !=' => "-2");
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get("biobank_export");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_ovi_collection($ovi_collection)
	{
		try {
			$array = array('export_status !=' => "-2",'ovi_collection_id'=>$ovi_collection);
			$this->db->where($array);
			$query=$this->db->get("biobank_export");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_count()
	{
		try {
			$array = array('export_status !=' => "-2");
			$this->db->where($array);
			$query=$this->db->get("biobank_export");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search($export,$limit, $start)
	{
		try {
			$array = array('export_status !=' => "-2");
			$this->db->where($array);
			$this->db->group_start();
			$this->db->or_like('export_id', $export, 'both');
			$this->db->or_like('ovi_collection_id', $export, 'both');
			$this->db->group_end();
			$this->db->limit($limit, $start);
			$query=$this->db->get("biobank_export");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search_count($export)
	{
		try {
			$array = array('export_status !=' => "-2");
			$this->db->where($array);
			$this->db->group_start();
			$this->db->or_like('export_id', $export, 'both');
			$this->db->or_like('ovi_collection_id', $export, 'both');
			$this->db->group_end();
			$query=$this->db->get("biobank_export");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_active()
	{
		try {
			$array = array('export_status' => "1");
			$this->db->where($array);
			$query=$this->db->get("biobank_export");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function display_records_individual($data)
	{
		try {
			$array = array('export_id' => $data);
			$this->db->where($array);
			$query=$this->db->get("biobank_export");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}




