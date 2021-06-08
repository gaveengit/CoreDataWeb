<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SpatialDataController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('spatial_data');
	}
	public function addNewMap()
	{
		$this->load->view('add_new_map');
	}
	public function updateMap()
	{
		$this->load->view('update_map');
	}
	public function mapView()
	{
		$this->load->view('map_view');
	}

}


