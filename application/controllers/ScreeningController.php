<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ScreeningController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('screening_list');
	}
	public function addScreening()
	{
		$this->load->view('add_screening');
	}
	public function updateScreening()
	{
		$this->load->view('update_screening');
	}
}

