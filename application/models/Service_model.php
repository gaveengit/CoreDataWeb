<?php
class Service_model extends CI_Model
{
	function saveRecordsBgService($data)
	{
		try {
			$this->db->insert('bg_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function saveRecordsOviService($data)
	{
		try {
			$this->db->insert('ovi_service', $data);
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
	function saveRecordsMrcService($data)
	{
		try {
			$this->db->insert('mrc_service', $data);
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
		$sql="select a.bg_trap_id from bg_run_traps a, bg_service b where a.bg_run_id='$run_id' and 
				a.bg_trap_id not in (select trap_id from bg_service where run_id='$run_id')";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function checkRunPendingOviPoints($run_id){
		$sql="select a.ovi_trap_id from ovi_run_traps a, ovi_service b where a.ovi_run_id='$run_id' and 
				a.ovi_trap_id not in (select trap_id from ovi_service where run_id='$run_id')";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}

	function checkRunPendingMrcPoints($run_id){
		$sql="select a.mrc_trap_id from mrc_run_traps a, mrc_service b where a.mrc_run_id='$run_id' and 
				a.mrc_trap_id not in (select trap_id from mrc_service where run_id='$run_id')";
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
	function checkUpdateBgServiceId($data,$data_old){
		try {
			$array = array('service_id' => $data["service_id"], 'service_id !=' => $data_old["service_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('bg_service');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateOviServiceId($data,$data_old){
		try {
			$array = array('service_id' => $data["service_id"], 'service_id !=' => $data_old["service_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('ovi_service');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateMrcServiceId($data,$data_old){
		try {
			$array = array('service_id' => $data["service_id"], 'service_id !=' => $data_old["service_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('mrc_service');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function checkBgServiceId($data){
		try {
			$array = array('service_id' => $data["service_id"]);
			$this->db->where($array);
			$query = $this->db->get('bg_service');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function checkOviServiceId($data){
		try {
			$array = array('service_id' => $data["service_id"]);
			$this->db->where($array);
			$query = $this->db->get('ovi_service');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkMrcServiceId($data){
		try {
			$array = array('service_id' => $data["service_id"]);
			$this->db->where($array);
			$query = $this->db->get('mrc_service');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}



	function updateRecordsBgService($data)
	{
		try {
			$this->db->where('service_id', $data['service_id']);
			$this->db->update('bg_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function updateRecordsOviService($data)
	{
		try {
			$this->db->where('service_id', $data['service_id']);
			$this->db->update('ovi_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function updateRecordsMrcService($data)
	{
		try {
			$this->db->where('service_id', $data['service_id']);
			$this->db->update('mrc_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function deleteMrcService($data)
	{
		try {
			$this->db->where('service_id', $data['service_id']);
			$this->db->update('mrc_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function display_mrc_service()
	{
		try {
			$array = array('service_status !=' => '-2');
			$this->db->where($array);
			$query=$this->db->get("mrc_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_mrc_service_search($mrc_search)
	{
		try {
			$array = array('service_status !=' => '-2');
			$this->db->where($array);
			$this->db->like('service_id', $mrc_search, 'both');
			$this->db->or_like('trap_id', $mrc_search, 'both');
			$query=$this->db->get("mrc_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_ovi_service()
	{
		try {
			$array = array('service_status !=' => '-2');
			$this->db->where($array);
			$query=$this->db->get("ovi_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_ovi_service_search($mrc_service)
	{
		try {
			$array = array('service_status !=' => '-2');
			$this->db->where($array);
			$this->db->like('service_id', $mrc_service, 'both');
			$this->db->or_like('trap_id', $mrc_service, 'both');
			$query=$this->db->get("ovi_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_bg_service()
	{
		try {
			$array = array('service_status !=' => '-2');
			$this->db->where($array);
			$query=$this->db->get("bg_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_bg_service_search($bg_service)
	{
		try {
			$array = array('service_status !=' => '-2');
			$this->db->where($array);
			$this->db->like('service_id', $bg_service, 'both');
			$this->db->or_like('trap_id', $bg_service, 'both');
			$query=$this->db->get("bg_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}



	function display_records_individual_bg_service($data)
	{
		try {
			$array = array('service_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("bg_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function deleteBgService($data)
	{
		try {
			$this->db->where('service_id', $data['service_id']);
			$this->db->update('bg_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function deleteOvService($data)
	{
		try {
			$this->db->where('service_id', $data['service_id']);
			$this->db->update('ovi_service', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}


	function display_records_individual_ovi_service($data)
	{
		try {
			$array = array('service_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("ovi_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_individual_mrc_service($data)
	{
		try {
			$array = array('service_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("mrc_service");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}



	function loadBgTraps()
	{
		$sql="SELECT a.bg_trap_id from bg_run_traps a,field_run b, bg_field_run d
			where a.bg_run_id=b.field_run_id and a.bg_run_id=d.bg_run_id and b.run_status='1' and d.bg_run_type='1' and a.bg_trap_id not in (select a.bg_trap_id
			     from bg_run_traps a, field_run b, bg_collection c,bg_field_run d  where a.bg_run_id=b.field_run_id and a.bg_run_id=d.bg_run_id and b.run_status='1'
			    and d.bg_run_type='1' and a.bg_trap_id=c.trap_id and a.bg_run_id=c.run_id)";
		$query=$this->db->query($sql);
		return $query->result();
	}

	function loadOviTraps()
	{
		$sql="SELECT a.ovi_trap_id from ovi_run_traps a,field_run b, ovi_field_run d
			where a.ovi_run_id=b.field_run_id and a.ovi_run_id=d.ovi_run_id and b.run_status='1' and d.ovi_run_type='1' and a.ovi_trap_id not in (select a.ovi_trap_id
			     from ovi_run_traps a, field_run b, ovi_collection c,ovi_field_run d  where a.ovi_run_id=b.field_run_id and a.ovi_run_id=d.ovi_run_id and b.run_status='1'
			    and d.ovi_run_type='1' and a.ovi_trap_id=c.trap_id and a.ovi_run_id=c.run_id)";
		$query=$this->db->query($sql);
		return $query->result();
	}

	function loadMrcTraps()
	{
		$sql="SELECT a.mrc_trap_id from mrc_run_traps a,field_run b, mrc_field_run d
			where a.mrc_run_id=b.field_run_id and a.mrc_run_id=d.mrc_run_id and b.run_status='1' and d.mrc_run_type='1' and a.mrc_trap_id not in (select a.mrc_trap_id
			     from mrc_run_traps a, field_run b, mrc_release c,mrc_field_run d  where a.mrc_run_id=b.field_run_id and a.mrc_run_id=d.mrc_run_id and b.run_status='1'
			    and d.mrc_run_type='1' and a.mrc_trap_id=c.identifier and a.mrc_run_id=c.run_id)";
		$query=$this->db->query($sql);
		return $query->result();
	}
}




