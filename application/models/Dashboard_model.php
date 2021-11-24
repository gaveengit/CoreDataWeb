<?php


class Dashboard_model extends CI_Model
{
	function displayDashboardData()
	{
		try {
			$dashboard_stored_proc = "CALL dashboardStoredProcedure()";
			$result = $this->db->query($dashboard_stored_proc);
			return $result->result();
		} catch (Exception $e) {
			echo $e;
		}
	}
}
