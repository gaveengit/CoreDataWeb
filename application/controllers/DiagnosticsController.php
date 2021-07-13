<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DiagnosticsController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Collection_model');
		$this->load->model('Identification_model');
		$this->load->library("pagination");
	}

	public function index()
	{

		$config = array();
		$config["base_url"] = site_url('DiagnosticsController/index');
		$config["total_rows"] = $this->Identification_model->display_records_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);


		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$result["links"] = $this->pagination->create_links();

		$result['data'] = $this->Identification_model->display_records($config["per_page"], $page);
		$this->load->view('identifications_list',$result);
	}
	public function identificationSearch()
	{
		$identification = $this->input->post('search_bar');
		$result['data'] = $this->Identification_model->display_records_search($identification);
		$result['search_key'][0]=$identification;
		$this->load->view('identifications_list_search',$result);
	}
	public function addIdentifications()
	{
		$result['bg_data'] = $this->Collection_model->display_records_individual_bg_collection_collected_identification();
		$this->load->view('add_identification',$result);
	}
	public function updateIdentifications($identification_id)
	{
		$result['data'] = $this->Identification_model->display_records_individual($identification_id);
		$result['bg_data'] = $this->Collection_model->display_records_individual_bg_collection_collected_identification();
		$this->load->view('update_identification',$result);
	}
	public function saveIdentification()
	{

		$data['identification_id'] = $this->input->post('identification_id');
		$data['collection_id'] = $this->input->post('collection_id');
		$data['male_aedes_aegypti_count'] = $this->input->post('aedes_male_count');
		$data['female_aedes_aegypti_count'] = $this->input->post('aedes_female_count');
		$data['male_anopheles_count'] = $this->input->post('male_anopheles_count');
		$data['female_anopheles_count'] = $this->input->post('female_anopheles_count');
		$data['male_culex_count'] = $this->input->post('culex_male_count');
		$data['female_culex_count'] = $this->input->post('culex_female_count');
		$data['identified_date'] = $this->input->post('identified_date');
		$data['identified_time'] = $this->input->post('identified_time');
		if($data['male_aedes_aegypti_count']>0 || $data['female_aedes_aegypti_count']>0)
		{
			$data['status'] = '1';
		}
		else{
			$data['status'] = '2';
		}

		$response_check['check_data_count'] = $this->Identification_model->checkIdentificationId($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Identification_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$config = array();
				$config["base_url"] = site_url('DiagnosticsController/index');
				$config["total_rows"] = $this->Identification_model->display_records_count();
				$config["per_page"] = 10;
				$config["uri_segment"] = 3;

				$this->pagination->initialize($config);


				$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

				$result["links"] = $this->pagination->create_links();

				$result['data'] = $this->Identification_model->display_records($config["per_page"], $page);
				$this->load->view('identifications_list',$result);
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Identification id is already existing');
			</script>";
			$result['bg_data'] = $this->Collection_model->display_records_individual_bg_collection_collected_identification();
			$this->load->view('add_identification',$result);
		}
	}

	public function saveUpdateIdentification()
	{

		$data['identification_id'] = $this->input->post('identification_id');
		$data['collection_id'] = $this->input->post('collection_id');
		$data['male_aedes_aegypti_count'] = $this->input->post('aedes_male_count');
		$data['female_aedes_aegypti_count'] = $this->input->post('aedes_female_count');
		$data['male_anopheles_count'] = $this->input->post('male_anopheles_count');
		$data['female_anopheles_count'] = $this->input->post('female_anopheles_count');
		$data['male_culex_count'] = $this->input->post('culex_male_count');
		$data['female_culex_count'] = $this->input->post('culex_female_count');
		$data['identified_date'] = $this->input->post('identified_date');
		$data['identified_time'] = $this->input->post('identified_time');
		$data_old['identification_id_old'] = $this->input->post('save-btn');
		$data_old['identification_id_new'] = $this->input->post('identification_id');

		if($data['male_aedes_aegypti_count']>0 || $data['female_aedes_aegypti_count']>0)
		{
			$data['status'] = '1';
		}
		else{
			$data['status'] = '2';
		}

		$response_check['check_data_count'] = $this->Identification_model->checkUpdateIdentification($data_old);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Identification_model->updateRecords($data,$data_old);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$config = array();
				$config["base_url"] = site_url('DiagnosticsController/index');
				$config["total_rows"] = $this->Identification_model->display_records_count();
				$config["per_page"] = 10;
				$config["uri_segment"] = 3;

				$this->pagination->initialize($config);


				$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

				$result["links"] = $this->pagination->create_links();

				$result['data'] = $this->Identification_model->display_records($config["per_page"], $page);
				$this->load->view('identifications_list',$result);
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Identification id is already existing');
			</script>";

			$result['data'] = $this->Identification_model->display_records_individual($data['identification_id']);
			$result['bg_data'] = $this->Collection_model->display_records_individual_bg_collection_collected_identification();
			$this->load->view('update_identification',$result);
		}
		}
	public function deleteIdentifications($identification_id)
	{
		$data['status'] = "-2";
		$data['identification_id'] = $identification_id;
		$response = $this->Identification_model->deleteRecords($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Record deleted successfully');
			</script>";
			$config = array();
			$config["base_url"] = site_url('DiagnosticsController/index');
			$config["total_rows"] = $this->Identification_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			$this->pagination->initialize($config);


			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

			$result["links"] = $this->pagination->create_links();

			$result['data'] = $this->Identification_model->display_records($config["per_page"], $page);
			$this->load->view('identifications_list',$result);
		} else {
			echo "<script type='text/javascript'>alert('Record not deleted successfully');
			</script>";
			$config = array();
			$config["base_url"] = site_url('DiagnosticsController/index');
			$config["total_rows"] = $this->Identification_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			$this->pagination->initialize($config);


			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

			$result["links"] = $this->pagination->create_links();

			$result['data'] = $this->Identification_model->display_records($config["per_page"], $page);
			$this->load->view('identifications_list',$result);
		}
	}
}
