<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FieldActivitiesController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('field_activities_menu');
	}
	public function bgLocations()
	{
		$this->load->view('bg_locations');
	}
	public function addBgLocations()
	{
		$this->load->view('add_bg_locations');
	}
	public function updateBgLocations()
	{
		$this->load->view('update_bg_location');
	}
	public function ovLocations()
	{
		$this->load->view('ov_locations');
	}
	public function addOviLocations()
	{
		$this->load->view('add_ov_locations');
	}
	public function updateOvLocations()
	{
		$this->load->view('update_ov_location');
	}
	public function mrcLocations()
	{
		$this->load->view('mrc_locations');
	}
	public function addMrcLocations()
	{
		$this->load->view('add_mrc_locations');
	}
	public function updateMRCLocations()
	{
		$this->load->view('update_mrc_location');
	}
	public function bgCollections()
	{
		$this->load->view('bg_collections');
	}
	public function addBgCollection()
	{
		$this->load->view('add_bg_collection');
	}
	public function updateBgCollection()
	{
		$this->load->view('update_bg_collection');
	}
	public function ovCollections()
	{
		$this->load->view('ov_collections');
	}
	public function addOvCollection()
	{
		$this->load->view('add_ov_collection');
	}
	public function updateOvCollection()
	{
		$this->load->view('update_ov_collection');
	}
	public function mrcReleases()
	{
		$this->load->view('mrc_releases');
	}
	public function addMrcRelease()
	{
		$this->load->view('add_mrc_release');
	}
	public function updateMrcRelease()
	{
		$this->load->view('update_mrc_release');
	}
	public function persons()
	{
		$this->load->view('persons_list');
	}
	public function addPersons()
	{
		$this->load->view('add_persons');
	}
	public function updatePersons()
	{
		$this->load->view('update_persons');
	}
	public function addresses()
	{
		$this->load->view('address_list');
	}
	public function addAddresses()
	{
		$this->load->view('add_addresses');
	}
	public function updateAddresses()
	{
		$this->load->view('update_addresses');
	}
}




