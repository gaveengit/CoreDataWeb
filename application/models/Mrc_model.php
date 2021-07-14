<?php
class Mrc_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			$this->db->insert('mrc', $data);
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
			$this->db->where('mrc_identifier', $old_data['mrc_identifier_old']);
			$this->db->update('mrc', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	function deleteMrcLocation($data)
	{
		try {
			$this->db->where('mrc_identifier', $data['mrc_identifier']);
			$this->db->update('mrc', $data);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}



	function checkMrcIdentifier($data)
	{
		try {
			$array = array('mrc_identifier' => $data["mrc_identifier"]);
			$this->db->where($array);
			$query = $this->db->get('mrc');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkUpdateMrc($data_old)
	{
		try {
			$array = array('mrc_identifier' => $data_old["mrc_identifier_new"], 'mrc_identifier !=' => $data_old["mrc_identifier_old"]);
			$this->db->where($array);
			$query = $this->db->get('mrc');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function display_records($limit,$start)
	{
		try {
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as trap_status, 
                   mrc.coordinates as coordinates,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
			$array = array('mrc_status !=' => "-2");
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
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as trap_status, 
                   mrc.coordinates as coordinates,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
			$array = array('mrc_status !=' => "-2");
			$this->db->where($array);
			$query=$this->db->get();
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search($mrc,$limit, $start)
	{
		try {
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as trap_status, 
                   mrc.coordinates as coordinates,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
			$array = array('mrc_status !=' => "-2");
			$this->db->group_start();
			$this->db->or_like('mrc.mrc_identifier', $mrc, 'both');
			$this->db->or_like('person.full_name', $mrc, 'both');
			$this->db->or_like('address.add_line1', $mrc, 'both');
			$this->db->or_like('address.add_line2', $mrc, 'both');
			$this->db->group_end();
			$this->db->where($array);
			$this->db->limit($limit, $start);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function display_records_search_count($mrc)
	{
		try {
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as trap_status, 
                   mrc.coordinates as coordinates,  
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
			$array = array('mrc_status !=' => "-2");
			$this->db->group_start();
			$this->db->or_like('mrc.mrc_identifier', $mrc, 'both');
			$this->db->or_like('person.full_name', $mrc, 'both');
			$this->db->or_like('address.add_line1', $mrc, 'both');
			$this->db->or_like('address.add_line2', $mrc, 'both');
			$this->db->group_end();
			$this->db->where($array);
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
			$this->db->select('mrc.mrc_identifier as trap_id, 
                   mrc.mrc_status as mrc_status, 
                   mrc.coordinates as coordinates,
                   mrc.mrc_date as mrc_date,
                   mrc.mrc_time as mrc_time,
                   person.person_id as person_id,
                   person.full_name as person_name,
                   person.contact_number as contact_number,
                   address.address_id as address_id,
                   address.add_line1 as add_line1,
                   address.add_line2 as add_line2
                   '
			);
			$this->db->from('mrc');
			$this->db->join('person', 'mrc.person_id= person.person_id');
			$this->db->join('address', 'mrc.address_id= address.address_id');
			$array = array('mrc_identifier' => $data);
			$this->db->where($array);
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

}



