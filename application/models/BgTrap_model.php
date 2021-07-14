<?php
class BgTrap_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('bg_trap', $data);
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
			$this->db->where('trap_id', $old_data['trap_id_old']);
			$this->db->update('bg_trap', $data);
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
			$this->db->where('trap_id', $data['trap_id']);
			$this->db->update('bg_trap', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	function checkBgId($data)
	{
		try {
			$array = array('trap_id' => $data["trap_id"]);
			$this->db->where($array);
			$query = $this->db->get('bg_trap');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateBgTrap($data_old)
	{
		try {
			$array = array('trap_id' => $data_old["trap_id_new"], 'trap_id !=' => $data_old["trap_id_old"]);
			$this->db->where($array);
			$query = $this->db->get('bg_trap');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records($limit, $start)
	{
		try {
			/*
			$query=$this->db->get("bg_trap");
			return $query->result();
			*/
			$this->db->select('bg_trap.trap_id as trap_id, 
                   bg_trap.trap_status as trap_status, 
                   bg_trap.trap_position as trap_position, 
                   bg_trap.coordinates as coordinates,
                   bg_trap.bg_date as bg_date,
                   bg_trap.bg_time as bg_time,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('bg_trap');
			$this->db->join('person', 'bg_trap.person_id= person.person_id');
			$this->db->join('address', 'bg_trap.address_id= address.address_id');
			$array = array('bg_trap.trap_status !=' => "-2");
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_count()
	{
		try {
			/*
			$query=$this->db->get("bg_trap");
			return $query->result();
			*/
			$this->db->select('bg_trap.trap_id as trap_id, 
                   bg_trap.trap_status as trap_status, 
                   bg_trap.trap_position as trap_position, 
                   bg_trap.coordinates as coordinates,
                   bg_trap.bg_date as bg_date,
                   bg_trap.bg_time as bg_time,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('bg_trap');
			$this->db->join('person', 'bg_trap.person_id= person.person_id');
			$this->db->join('address', 'bg_trap.address_id= address.address_id');
			$array = array('bg_trap.trap_status !=' => "-2");
			$this->db->where($array);
			$query=$this->db->get();
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records_search($trap,$limit, $start)
	{
		try {
			$this->db->select('bg_trap.trap_id as trap_id, 
                   bg_trap.trap_status as trap_status, 
                   bg_trap.trap_position as trap_position, 
                   bg_trap.coordinates as coordinates,
                   bg_trap.bg_date as bg_date,
                   bg_trap.bg_time as bg_time,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('bg_trap');
			$this->db->join('person', 'bg_trap.person_id= person.person_id');
			$this->db->join('address', 'bg_trap.address_id= address.address_id');
			$array = array('bg_trap.trap_status !=' => "-2");
			$this->db->where($array);
			$this->db->group_start();
			$this->db->or_like('bg_trap.trap_id', $trap, 'both');
			$this->db->or_like('person.full_name', $trap, 'both');
			$this->db->or_like('address.add_line1', $trap, 'both');
			$this->db->or_like('address.add_line2', $trap, 'both');
			$this->db->group_end();
			$this->db->limit($limit, $start);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search_count($trap)
	{
		try {
			$this->db->select('bg_trap.trap_id as trap_id, 
                   bg_trap.trap_status as trap_status, 
                   bg_trap.trap_position as trap_position, 
                   bg_trap.coordinates as coordinates,
                   bg_trap.bg_date as bg_date,
                   bg_trap.bg_time as bg_time,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('bg_trap');
			$this->db->join('person', 'bg_trap.person_id= person.person_id');
			$this->db->join('address', 'bg_trap.address_id= address.address_id');
			$array = array('bg_trap.trap_status !=' => "-2");
			$this->db->where($array);
			$this->db->group_start();
			$this->db->or_like('bg_trap.trap_id', $trap, 'both');
			$this->db->or_like('person.full_name', $trap, 'both');
			$this->db->or_like('address.add_line1', $trap, 'both');
			$this->db->or_like('address.add_line2', $trap, 'both');
			$this->db->group_end();
			$query=$this->db->get();
			return $query->num_rows();
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
			$this->db->select('bg_trap.trap_id as trap_id, 
                   bg_trap.trap_status as trap_status, 
                   bg_trap.coordinates as coordinates,
                   bg_trap.trap_position as trap_position,
                   bg_trap.bg_date as bg_date,
                   bg_trap.bg_time as bg_time,  
                   person.person_id as person_id,
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.address_id as address_id,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('bg_trap');
			$this->db->join('person', 'bg_trap.person_id= person.person_id');
			$this->db->join('address', 'bg_trap.address_id= address.address_id');
			$array = array('trap_id' => $data);
			$this->db->where($array);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}

