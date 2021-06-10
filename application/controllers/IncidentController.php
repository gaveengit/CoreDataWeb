<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IncidentController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('incident_list');
	}
	public function addIncident()
	{
		$this->load->view('add_incident');
	}
	public function updateIncident()
	{
		$this->load->view('update_incident');
	}
}




