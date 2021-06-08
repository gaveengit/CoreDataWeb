<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FieldPlanningController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('field_runs_list');
	}
	public function addNewRun()
	{
		$this->load->view('add_new_run');
	}
	public function updateRun()
	{
		$this->load->view('update_field_run');
	}
	public function viewRun()
	{
		$this->load->view('view_run');
	}
	public function viewRunMap()
	{
		$this->load->view('view_run_map');
	}

}



