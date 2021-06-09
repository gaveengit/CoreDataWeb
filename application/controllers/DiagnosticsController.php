<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DiagnosticsController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('identifications_list');
	}
	public function addIdentifications()
	{
		$this->load->view('add_identification');
	}
	public function updateIdentifications()
	{
		$this->load->view('update_identification');
	}
}
