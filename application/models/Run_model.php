<?php

class Run_model extends CI_Model
{
	function saveRecordsOviRunTraps($data)
	{
		try {
			$this->db->insert('ovi_run_traps', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function saveRecordsBgRunTraps($data)
	{
		try {
			$this->db->insert('bg_run_traps', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function saveRecordsMrcRunTraps($data)
	{
		try {
			$this->db->insert('mrc_run_traps', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function saveRecordsOviFieldRun($data)
	{
		try {
			$this->db->insert('ovi_field_run', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function saveRecordsBgFieldRun($data)
	{
		try {
			$this->db->insert('bg_field_run', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function saveRecordsMrcFieldRun($data)
	{
		try {
			$this->db->insert('mrc_field_run', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function saveRecordsFieldRun($data)
	{
		try {
			$this->db->insert('field_run', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function updateRecords($data)
	{
		try {
			$this->db->where('field_run_id', $data['field_run_id']);
			$this->db->update('field_run', $data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function checkRunId($data)
	{
		try {
			$array = array('field_run_id' => $data["field_run_id"]);
			$this->db->where($array);
			$query = $this->db->get('field_run');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkOviStatusService($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"], 'trap_status !=' => '1');
			$this->db->where($array);
			$query = $this->db->get('ovi_trap');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkBgStatusService($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"], 'trap_status !=' => '1');
			$this->db->where($array);
			$query = $this->db->get('bg_trap');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkMrcStatusService($data)
	{
		try {
			$array = array('mrc_identifier' => $data["trap_id"], 'mrc_status !=' => '1');
			$this->db->where($array);
			$query = $this->db->get('mrc');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkOviStatusSetService($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"], 'trap_status !=' => '2');
			$this->db->where($array);
			$query = $this->db->get('ovi_trap');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkBgStatusSetService($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"], 'trap_status !=' => '2');
			$this->db->where($array);
			$query = $this->db->get('bg_trap');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkMrcStatusSetService($data)
	{
		try {
			$array = array('mrc_identifier' => $data["trap_id"], 'mrc_status !=' => '2');
			$this->db->where($array);
			$query = $this->db->get('mrc');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkIsOvTrap($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"]);
			$this->db->where($array);
			$query = $this->db->get('ovi_trap');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkIsBgTrap($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"]);
			$this->db->where($array);
			$query = $this->db->get('bg_trap');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkIsMrcTrap($data)
	{
		try {
			$array = array('mrc_identifier' => $data["trap_id"]);
			$this->db->where($array);
			$query = $this->db->get('mrc');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function checkOvInPendingRun($data)
	{
		$this->db->select('ovi_run_traps.ovi_trap_id');
		$this->db->from('ovi_run_traps');
		$this->db->join('ovi_field_run', 'ovi_field_run.ovi_run_id= ovi_run_traps.ovi_run_id');
		$this->db->join('field_run', 'ovi_field_run.ovi_run_id = field_run.field_run_id');
		$array = array('ovi_run_traps.ovi_trap_id' => $data['trap_id'], 'field_run.run_status' => '1');
		$this->db->where($array);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function checkBgInPendingRun($data)
	{
		$this->db->select('bg_run_traps.bg_trap_id');
		$this->db->from('bg_run_traps');
		$this->db->join('bg_field_run', 'bg_field_run.bg_run_id= bg_run_traps.bg_run_id');
		$this->db->join('field_run', 'bg_field_run.bg_run_id = field_run.field_run_id');
		$array = array('bg_run_traps.bg_trap_id' => $data['trap_id'], 'field_run.run_status' => '1');
		$this->db->where($array);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function checkMrcInPendingRun($data)
	{
		$this->db->select('mrc_run_traps.mrc_trap_id');
		$this->db->from('mrc_run_traps');
		$this->db->join('mrc_field_run', 'mrc_field_run.mrc_run_id= mrc_run_traps.mrc_run_id');
		$this->db->join('field_run', 'mrc_field_run.mrc_run_id = field_run.field_run_id');
		$array = array('mrc_run_traps.mrc_trap_id' => $data['trap_id'], 'field_run.run_status' => '1');
		$this->db->where($array);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function checkUpdatePersons($data)
	{
		try {
			$array = array('full_name' => $data["full_name"], 'contact_number' => $data["Contact_number"],
				'Person_id !=' => $data["Person_id"], 'person_status' => $data["Person_status"]);
			$this->db->where($array);
			$query = $this->db->get('person');
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_ovi()
	{
		try {
			$this->db->select('field_run.field_run_id,field_run.run_date,field_run.run_status,ovi_field_run.ovi_run_type');
			$this->db->from('field_run');
			$this->db->join('ovi_field_run', 'ovi_field_run.ovi_run_id=field_run.field_run_id');
			$query = $this->db->get();
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_ovi_count()
	{
		try {
			$this->db->select('field_run.field_run_id,field_run.run_date,field_run.run_status,ovi_field_run.ovi_run_type');
			$this->db->from('field_run');
			$this->db->join('ovi_field_run', 'ovi_field_run.ovi_run_id=field_run.field_run_id');
			$query = $this->db->get();
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_bg()
	{
		try {
			$this->db->select('field_run.field_run_id,field_run.run_date,field_run.run_status,bg_field_run.bg_run_type');
			$this->db->from('field_run');
			$this->db->join('bg_field_run', 'bg_field_run.bg_run_id=field_run.field_run_id');
			$query = $this->db->get();
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_bg_count()
	{
		try {
			$this->db->select('field_run.field_run_id,field_run.run_date,field_run.run_status,bg_field_run.bg_run_type');
			$this->db->from('field_run');
			$this->db->join('bg_field_run', 'bg_field_run.bg_run_id=field_run.field_run_id');
			$query = $this->db->get();
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_mrc()
	{
		try {
			$this->db->select('field_run.field_run_id,field_run.run_date,field_run.run_status,mrc_field_run.mrc_run_type');
			$this->db->from('field_run');
			$this->db->join('mrc_field_run', 'mrc_field_run.mrc_run_id=field_run.field_run_id');
			$query = $this->db->get();
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_mrc_count()
	{
		try {
			$this->db->select('field_run.field_run_id,field_run.run_date,field_run.run_status,mrc_field_run.mrc_run_type');
			$this->db->from('field_run');
			$this->db->join('mrc_field_run', 'mrc_field_run.mrc_run_id=field_run.field_run_id');
			$query = $this->db->get();
			return $query->num_rows();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_all_records($limit,$start)
	{
		$sql = "select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,mrc_field_run.mrc_run_type as run_type,\"mrc\" as main_type from field_run inner join mrc_field_run on mrc_field_run.mrc_run_id=field_run.field_run_id union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,bg_field_run.bg_run_type as run_type,\"bg\" as main_type from field_run inner join bg_field_run on bg_field_run.bg_run_id=field_run.field_run_id union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,ovi_field_run.ovi_run_type as run_type, \"ovi\" as main_type from field_run inner join ovi_field_run on ovi_field_run.ovi_run_id=field_run.field_run_id limit $start,$limit";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function display_all_records_search($limit,$start,$search)
	{
		$sql = "select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,mrc_field_run.mrc_run_type as run_type from field_run inner join mrc_field_run on mrc_field_run.mrc_run_id=field_run.field_run_id where field_run.field_run_id = '$search' union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,bg_field_run.bg_run_type as run_type from field_run inner join bg_field_run on bg_field_run.bg_run_id=field_run.field_run_id where field_run.field_run_id = '$search'  union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,ovi_field_run.ovi_run_type as run_type from field_run inner join ovi_field_run on ovi_field_run.ovi_run_id=field_run.field_run_id where field_run.field_run_id = '$search' limit $start,$limit";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_all_records_search_count($limit,$start,$search)
	{
		$sql = "select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,mrc_field_run.mrc_run_type as run_type from field_run inner join mrc_field_run on mrc_field_run.mrc_run_id=field_run.field_run_id where field_run.field_run_id = '$search' union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,bg_field_run.bg_run_type as run_type from field_run inner join bg_field_run on bg_field_run.bg_run_id=field_run.field_run_id where field_run.field_run_id = '$search'  union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,ovi_field_run.ovi_run_type as run_type from field_run inner join ovi_field_run on ovi_field_run.ovi_run_id=field_run.field_run_id where field_run.field_run_id = '$search' limit $start,$limit";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function display_all_records_count()
	{
		$sql = "select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,mrc_field_run.mrc_run_type as run_type from field_run inner join mrc_field_run on mrc_field_run.mrc_run_id=field_run.field_run_id union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,bg_field_run.bg_run_type as run_type from field_run inner join bg_field_run on bg_field_run.bg_run_id=field_run.field_run_id union all select field_run.field_run_id as field_run_id,field_run.run_date as run_date,field_run.run_status as run_status,ovi_field_run.ovi_run_type as run_type from field_run inner join ovi_field_run on ovi_field_run.ovi_run_id=field_run.field_run_id";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function display_bg_run_coordinates($run_id){
		$sql="select bg_trap.trap_id as trap_id,bg_trap.trap_status as trap_status,bg_trap.coordinates as coordinates from bg_trap, bg_run_traps where bg_trap.trap_id=bg_run_traps.bg_trap_id and bg_run_traps.bg_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_bg_service_run_coordinates($run_id){
		$sql = "select bg_run_traps.bg_trap_id as trap_id, ifnull(bg_service.service_status,'0') as trap_status, bg_trap.coordinates as coordinates
				from bg_run_traps
				left outer join bg_service on bg_run_traps.bg_trap_id = bg_service.trap_id and
				bg_run_traps.bg_run_id=bg_service.run_id
				left outer join bg_trap on bg_run_traps.bg_trap_id=bg_trap.trap_id
				where bg_run_traps.bg_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_bg_collection_run_coordinates($run_id){
		$sql = "select bg_run_traps.bg_trap_id as trap_id, ifnull(bg_collection.collect_status,'0') as trap_status,
				bg_trap.coordinates as coordinates from bg_run_traps 
				left outer join bg_collection on bg_run_traps.bg_trap_id = bg_collection.trap_id and 
				bg_run_traps.bg_run_id=bg_collection.run_id 
				left outer join bg_trap on bg_run_traps.bg_trap_id=bg_trap.trap_id 
				where bg_run_traps.bg_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_ovi_service_run_coordinates($run_id){
		$sql = "select ovi_run_traps.ovi_trap_id as trap_id, ifnull(ovi_service.service_status,'0') as trap_status, ovi_trap.coordinates as coordinates
				from ovi_run_traps
				left outer join ovi_service on ovi_run_traps.ovi_trap_id = ovi_service.trap_id and
				ovi_run_traps.ovi_run_id=ovi_service.run_id
				left outer join ovi_trap on ovi_run_traps.ovi_trap_id=ovi_trap.trap_id
				where ovi_run_traps.ovi_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_ovi_collection_run_coordinates($run_id){
		$sql = "select ovi_run_traps.ovi_trap_id as trap_id, ifnull(ovi_collection.collect_status,'0') as trap_status, ovi_trap.coordinates as coordinates
				from ovi_run_traps
				left outer join ovi_collection on ovi_run_traps.ovi_trap_id = ovi_collection.trap_id and
				ovi_run_traps.ovi_run_id=ovi_collection.run_id
				left outer join ovi_trap on ovi_run_traps.ovi_trap_id=ovi_trap.trap_id
				where ovi_run_traps.ovi_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function display_mrc_service_run_coordinates($run_id){
		$sql = "select mrc_run_traps.mrc_trap_id as trap_id, ifnull(mrc_service.service_status,'0') as trap_status, mrc.coordinates as coordinates
				from mrc_run_traps
				left outer join mrc_service on mrc_run_traps.mrc_trap_id = mrc_service.trap_id and
				mrc_run_traps.mrc_run_id=mrc_service.run_id
				left outer join mrc on mrc_run_traps.mrc_trap_id=mrc.mrc_identifier
				where mrc_run_traps.mrc_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_mrc_release_run_coordinates($run_id){
		$sql = "select mrc_run_traps.mrc_trap_id as trap_id, ifnull(mrc_release.released_status,'0') as trap_status, mrc.coordinates as coordinates
				from mrc_run_traps
				left outer join mrc_release on mrc_run_traps.mrc_trap_id = mrc_release.identifier and
				mrc_run_traps.mrc_run_id=mrc_release.run_id
				left outer join mrc on mrc_run_traps.mrc_trap_id=mrc.mrc_identifier
				where mrc_run_traps.mrc_run_id='$run_id'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function display_main_field_run_record($run_id)
	{
		try {
			$array = array('field_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("field_run");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_ovi_field_run_record($run_id)
	{
		try {
			$array = array('ovi_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("ovi_field_run");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_ovi_field_run_points($run_id)
	{
		try {
			$array = array('ovi_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("ovi_run_traps");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_bg_field_run_points($run_id)
	{
		try {
			$array = array('bg_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("bg_run_traps");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_mrc_field_run_points($run_id)
	{
		try {
			$array = array('mrc_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("mrc_run_traps");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_bg_field_run_record($run_id)
	{
		try {
			$array = array('bg_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("bg_field_run");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_mrc_field_run_record($run_id)
	{
		try {
			$array = array('mrc_run_id' => $run_id);
			$this->db->where($array);
			$query = $this->db->get("mrc_field_run");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}

	function display_records_individual($data)
	{
		try {
			$array = array('Person_id' => $data);
			$this->db->where($array);
			$query = $this->db->get("person");
			return $query->result();
		} catch (Exception $e) {
			echo $e;
		}
	}
	function display_all_bg_service_runs(){
		$sql = "select bg_run_id as field_run_id from bg_field_run where bg_run_type='1'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_all_bg_collection_runs(){
		$sql = "select bg_run_id as field_run_id from bg_field_run where bg_run_type='2'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_all_ovi_service_runs(){
		$sql = "select ovi_run_id as field_run_id from ovi_field_run where ovi_run_type='1'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_all_ovi_collection_runs(){
		$sql = "select ovi_run_id as field_run_id from ovi_field_run where ovi_run_type='2'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_all_mrc_service_runs(){
		$sql = "select mrc_run_id as field_run_id from mrc_field_run where mrc_run_type='1'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function display_all_mrc_release_runs(){
		$sql = "select mrc_run_id as field_run_id from mrc_field_run where mrc_run_type='2'";
		$query = $this->db->query($sql);
		return $query->result();
	}

}

