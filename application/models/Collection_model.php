<?php
class Collection_model extends CI_Model
{
	function saveRecordsBgCollection($data)
	{
		try {
			$this->db->insert('bg_collection', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function saveRecordsOviCollection($data)
	{
		try {
			$this->db->insert('ovi_collection', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function saveRecordsMrcRelease($data)
	{
		try {
			$this->db->insert('mrc_release', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function findBgRunId($trap_id){
		try {
			$sql="select a.bg_run_id from bg_run_traps a, field_run b where a.bg_run_id=b.field_run_id and 
                                                          b.run_status=1 and a.bg_trap_id='$trap_id'";
			$query=$this->db->query($sql);
			return $query->result();

		}
		catch(Exception $e){
			echo $e;
		}
	}
	function findOviRunId($trap_id){
		try {
			$sql="select a.ovi_run_id from ovi_run_traps a, field_run b where a.ovi_run_id=b.field_run_id and 
                                                          b.run_status=1 and a.ovi_trap_id='$trap_id'";
			$query=$this->db->query($sql);
			return $query->result();

		}
		catch(Exception $e){
			echo $e;
		}
	}
	function findMrcRunId($trap_id){
		try {
			$sql="select a.mrc_run_id from mrc_run_traps a, field_run b where a.mrc_run_id=b.field_run_id and 
                                                          b.run_status=1 and a.mrc_trap_id='$trap_id'";
			$query=$this->db->query($sql);
			return $query->result();

		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkRunPendingBgPoints($run_id){
		$sql="select a.bg_trap_id from bg_run_traps a, bg_collection b where a.bg_run_id='$run_id' and 
				a.bg_trap_id not in (select trap_id from bg_collection where run_id='$run_id')";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function checkRunPendingOviPoints($run_id){
		$sql="select a.ovi_trap_id from ovi_run_traps a, ovi_collection b where a.ovi_run_id='$run_id' and 
				a.ovi_trap_id not in (select trap_id from ovi_collection where run_id='$run_id')";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}

	function checkRunPendingMrcPoints($run_id){
		$sql="select a.mrc_trap_id from mrc_run_traps a, mrc_release b where a.mrc_run_id='$run_id' and 
				a.mrc_trap_id not in (select identifier from mrc_release where run_id='$run_id')";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}

	function updateRunStatus($run_id){
		try {

			$sql = "update field_run set run_status='2' where field_run_id='$run_id'";
			$query = $this->db->query($sql);
			return true;
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function checkBgCollectionId($data,$data_old){
		try {
			$array = array('collection_id' => $data["collection_id"], 'collection_id !=' => $data_old["collection_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('bg_collection');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkOviCollectionId($data){
		try {
			$array = array('collection_id' => $data["collection_id"]);
			$this->db->where($array);
			$query = $this->db->get('ovi_collection');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkMrcReleaseId($data){
		try {
			$array = array('release_id' => $data["release_id"]);
			$this->db->where($array);
			$query = $this->db->get('mrc_release');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}



	function updateRecordsBgCollection($data)
	{
		try {
			$this->db->where('collection_id', $data['collection_id']);
			$this->db->update('bg_collection', $data);
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

	function display_mrc_releases()
	{
		try {
			$query=$this->db->get("mrc_release");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_ovi_collection()
	{
		try {
			$query=$this->db->get("ovi_collection");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_bg_collection()
	{
		try {
			$query=$this->db->get("bg_collection");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function display_records_individual_bg_collection($data)
	{
		try {
			$array = array('collection_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("bg_collection");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_individual_ovi_collection($data)
	{
		try {
			$array = array('collection_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("ovi_collection");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_individual_mrc_release($data)
	{
		try {
			$array = array('release_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("mrc_release");
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

	function loadOviTraps()
	{
		$sql="SELECT a.ovi_trap_id from ovi_run_traps a,field_run b, ovi_field_run d
			where a.ovi_run_id=b.field_run_id and a.ovi_run_id=d.ovi_run_id and b.run_status='1' and d.ovi_run_type='2' and a.ovi_trap_id not in (select a.ovi_trap_id
			     from ovi_run_traps a, field_run b, ovi_collection c,ovi_field_run d  where a.ovi_run_id=b.field_run_id and a.ovi_run_id=d.ovi_run_id and b.run_status='1'
			    and d.ovi_run_type='2' and a.ovi_trap_id=c.trap_id and a.ovi_run_id=c.run_id)";
		$query=$this->db->query($sql);
		return $query->result();
	}

	function loadMrcTraps()
	{
		$sql="SELECT a.mrc_trap_id from mrc_run_traps a,field_run b, mrc_field_run d
			where a.mrc_run_id=b.field_run_id and a.mrc_run_id=d.mrc_run_id and b.run_status='1' and d.mrc_run_type='2' and a.mrc_trap_id not in (select a.mrc_trap_id
			     from mrc_run_traps a, field_run b, mrc_release c,mrc_field_run d  where a.mrc_run_id=b.field_run_id and a.mrc_run_id=d.mrc_run_id and b.run_status='1'
			    and d.mrc_run_type='2' and a.mrc_trap_id=c.identifier and a.mrc_run_id=c.run_id)";
		$query=$this->db->query($sql);
		return $query->result();
	}
}




