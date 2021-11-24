<?php


class Report_model extends CI_Model
{
	function displayOviPerformanceReport($data)
	{
		try {
			$ovi_performance_stored_proc = "CALL oviPerformanceStoredProcedure(?, ?)";
			$data = array('from_date' => $data["from_date"], 'to_date' => $data["to_date"]);
			$result = $this->db->query($ovi_performance_stored_proc, $data);
			return $result->result();
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	function displayIncidentReport($data)
	{
		try {
			$incident_stored_proc = "CALL completedIncidentsReport(?, ?)";
			$data = array('from_date' => $data["from_date"], 'to_date' => $data["to_date"]);
			$result = $this->db->query($incident_stored_proc, $data);
			return $result->result();
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}


	function displayBgPerformanceReport($data)
	{
		try {
			$bg_performance_stored_proc = "CALL bgPerformanceStoredProcedure(?, ?)";
			$data = array('from_date' => $data["from_date"], 'to_date' => $data["to_date"]);
			$result = $this->db->query($bg_performance_stored_proc, $data);
			return $result->result();
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	function displayMrcPerformanceReport($data)
	{
		try {
			$mrc_performance_stored_proc = "CALL mrcPerformanceStoredProcedure(?, ?)";
			$data = array('from_date' => $data["from_date"], 'to_date' => $data["to_date"]);
			$result = $this->db->query($mrc_performance_stored_proc, $data);
			return $result->result();
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}

	function displayDiagnosticPerformanceReport($data)
	{
		try {
			$diagnostic_performance_stored_proc = "CALL diagnosticStoredProcedure(?, ?)";
			$data = array('from_date' => $data["from_date"], 'to_date' => $data["to_date"]);
			$result = $this->db->query($diagnostic_performance_stored_proc, $data);
			return $result->result();
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
	function displayScreeningPerformanceReport($data)
	{
		try {
			$screening_performance_stored_proc = "CALL screeningStoredProcedure(?, ?)";
			$data = array('from_date' => $data["from_date"], 'to_date' => $data["to_date"]);
			$result = $this->db->query($screening_performance_stored_proc, $data);
			return $result->result();
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}


}
