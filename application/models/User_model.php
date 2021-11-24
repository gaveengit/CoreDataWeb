<?php
class User_model extends CI_Model
{
	function saveRecords($data)
	{
		try {
			return $this->db->insert('login', $data);
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	function updateRecords($data)
	{
		try {
			$this->db->where('user_id', $data['user_id']);
			return $this->db->update('login', $data);

		}
		catch(Exception $e)
		{
			return 0;
		}
	}

	function checkUsername($data)
	{
		try {
			$array = array('username' => $data["username"]);
			$this->db->where($array);
			$query = $this->db->get('login');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function checkLogin($data)
	{
		try {
			$array = array('username' => $data["username"],'password'=>$data["password"],'STATUS'=>'1','user_type !='=>7);
			$this->db->where($array);
			$query = $this->db->get('login');
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function checkCurrentPassword($data)
	{
		try {
			$array = array('password'=>$data["password"],'STATUS !='=>'-2','user_id'=>$data["user_id"]);
			$this->db->where($array);
			$query = $this->db->get('login');
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function display_records()
	{
		try {
			$array = array('status !=' => "-2");
			$this->db->where($array);
			$query=$this->db->get("login");
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
			$query=$this->db->get("login");
			return $query->num_rows();
		}
		catch(Exception $e){
			echo $e;
		}
	}


	function display_records_individual($data)
	{
		try {
			$array = array('user_id' => $data);
			$this->db->where($array);
			$query=$this->db->get("login");
			return $query->result();
		}
		catch(Exception $e){
			echo $e;
		}
	}
	function deleteRecord($data){
		try {
			$this->db->where('user_id', $data['user_id']);
			return $this->db->update('login', $data);
		}
		catch(Exception $e)
		{
			return 0;
		}
	}

}




