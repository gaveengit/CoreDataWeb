<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ExportController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('export_list');
	}
	public function addExport()
	{
		$this->load->view('add_export');
	}
	public function updateExport()
	{
		$this->load->view('update_export');
	}
}




