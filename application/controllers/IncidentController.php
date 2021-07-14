<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IncidentController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Incident_model');
		$this->load->library("pagination");
	}

	public function index()
	{

		$config = array();
		$config["base_url"] = site_url('IncidentController/index');
		$config["total_rows"] = $this->Incident_model->display_records_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);


		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$result["links"] = $this->pagination->create_links();
		$result['data'] = $this->Incident_model->display_records($config["per_page"], $page);
		$this->load->view('incident_list',$result);

	}
	public function incidentSearch()
	{
		if($this->input->post('search_bar')) {
			$this->session->set_userdata('search_bar', $this->input->post('search_bar'));
		}
		$config = array();
		$config["base_url"] = site_url('IncidentController/incidentSearch/index');
		$config["total_rows"] = $this->Incident_model->display_records_search_count($this->session->userdata('search_bar'));
		$config["per_page"] = 10;
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$result["links"] = $this->pagination->create_links();
		$result['data'] = $this->Incident_model->display_records_search($this->session->userdata('search_bar'),$config["per_page"], $page);
		$result['search_key'][0]=$this->session->userdata('search_bar');
		$this->load->view('incident_list_search',$result);
	}

	public function addIncident()
	{
		$this->load->view('add_incident');
	}
	public function updateIncident($Incident_id)
	{
		$result['data'] = $this->Incident_model->display_records_individual($Incident_id);
		$this->load->view('update_incident',$result);
	}
	public function saveIncident()
	{
		$data['member_name'] = $this->input->post('member-name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['incident_type'] = $this->input->post('incident_type');
		$data['incident_priority'] = $this->input->post('incident_priority');
		$data['description'] = $this->input->post('description');
		$data['incident_date'] = $this->input->post('incident-date');
		$data['incident_time'] = $this->input->post('incident-time');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['full_address'] = $this->input->post('full-address');
		$data['location_description'] = $this->input->post('location-description');
		$data['gnd'] = $this->input->post('gnd');
		$data['trap_code'] = $this->input->post('trap-code');
		$data['incident_status'] = "Pending";
		$response = $this->Incident_model->saveRecords($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Record added successfully.');
			</script>";
			$config = array();
			$config["base_url"] = site_url('IncidentController/index');
			$config["total_rows"] = $this->Incident_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);


			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

			$result["links"] = $this->pagination->create_links();
			$result['data'] = $this->Incident_model->display_records($config["per_page"], $page);
			$this->load->view('incident_list',$result);
		} else {
			echo "<script type='text/javascript'>alert('Fail to add record.');
			</script>";
		}
	}

	public function saveUpdateIncident()
	{
		$data['member_name'] = $this->input->post('member-name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['incident_type'] = $this->input->post('incident_type');
		$data['incident_priority'] = $this->input->post('incident_priority');
		$data['description'] = $this->input->post('description');
		$data['incident_date'] = $this->input->post('incident-date');
		$data['incident_time'] = $this->input->post('incident-time');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['full_address'] = $this->input->post('full-address');
		$data['location_description'] = $this->input->post('location-description');
		$data['gnd'] = $this->input->post('gnd');
		$data['trap_code'] = $this->input->post('trap-code');
		$data['incident_status'] = $this->input->post('incident-status');
		$data['action_taken'] = $this->input->post('action-taken');
		$data['action_date'] = $this->input->post('action-date');
		$data['action_time'] = $this->input->post('action-time');
		$data['incident_id'] = $this->input->post('save-btn');

		$response = $this->Incident_model->updateRecords($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Record updated successfully.');
			</script>";
			$config = array();
			$config["base_url"] = site_url('IncidentController/index');
			$config["total_rows"] = $this->Incident_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);


			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

			$result["links"] = $this->pagination->create_links();
			$result['data'] = $this->Incident_model->display_records($config["per_page"], $page);
			$this->load->view('incident_list',$result);
		} else {
			echo "<script type='text/javascript'>alert('Fail to add record.');
			</script>";
			$result['data'] = $this->Incident_model->display_records_individual($data['incident_id']);
			$this->load->view('update_incident',$result);
		}
	}
	public function deleteIncident($incident_id)
	{
		$data['incident_status'] = "-2";
		$data['incident_id'] = $incident_id;
		$response = $this->Incident_model->deleteRecords($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Record deleted successfully');
			</script>";
			$config = array();
			$config["base_url"] = site_url('IncidentController/index');
			$config["total_rows"] = $this->Incident_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			$this->pagination->initialize($config);


			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

			$result["links"] = $this->pagination->create_links();
			$result['data'] = $this->Incident_model->display_records($config["per_page"], $page);
			$this->load->view('incident_list',$result);
		} else {
			echo "<script type='text/javascript'>alert('Record not deleted successfully');
			</script>";
			$config = array();
			$config["base_url"] = site_url('IncidentController/index');
			$config["total_rows"] = $this->Incident_model->display_records_count();
			$config["per_page"] = 1;
			$config["uri_segment"] = 4;

			$this->pagination->initialize($config);


			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

			$result["links"] = $this->pagination->create_links();
			$result['data'] = $this->Incident_model->display_records($config["per_page"], $page);
			$this->load->view('incident_list',$result);
		}
	}
}




