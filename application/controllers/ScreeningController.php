<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ScreeningController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Identification_model');
		$this->load->model('Screening_model');
	}

	public function index()
	{
		$result['data'] = $this->Screening_model->display_records();
		$this->load->view('screening_list', $result);
	}
	public function screeningSearch()
	{
		$screening = $this->input->post('search_bar');
		$result['data'] = $this->Screening_model->display_records_search($screening);
		$this->load->view('screening_list_search',$result);
	}
	public function addScreening()
	{
		$result['identification_data'] = $this->Identification_model->display_records_active_for_screening();
		$this->load->view('add_screening', $result);
	}

	public function updateScreening($screening_id)
	{
		$result['data'] = $this->Screening_model->display_records_individual($screening_id);
		$result['identification_data'] = $this->Identification_model->display_records_active_for_screening();
		$this->load->view('update_screening', $result);
	}

	public function saveScreening()
	{
		$data['screening_id'] = $this->input->post('screening_id');
		$data['identification_id'] = $this->input->post('identification_id');
		$data['male_aedes_aegypti_result'] = $this->input->post('aedes_male_result');
		$data['female_aedes_aegypti_result'] = $this->input->post('aedes_female_result');
		$data['male_anopheles_result'] = $this->input->post('male_anopheles_result');
		$data['female_anopheles_result'] = $this->input->post('female_anopheles_result');
		$data['male_culex_result'] = $this->input->post('culex_male_result');
		$data['female_culex_result'] = $this->input->post('culex_female_result');
		$data['final_result'] = $this->input->post('final_result');
		$data['screened_date'] = $this->input->post('screened_date');
		$data['screened_time'] = $this->input->post('screened_time');
		if ($data['final_result'] >= 35) {
			$data['status'] = '1';
		} else {
			$data['status'] = '2';
		}

		$response_check['check_data_count'] = $this->Screening_model->checkScreeningId($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Screening_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$this->load->view('screening_list');
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Screening id is already existing');
			</script>";
			$this->load->view('add_screening');
		}
	}

	public function saveUpdateScreening()
	{
		$data['screening_id'] = $this->input->post('screening_id');
		$data['identification_id'] = $this->input->post('identification_id');
		$data['male_aedes_aegypti_result'] = $this->input->post('aedes_male_result');
		$data['female_aedes_aegypti_result'] = $this->input->post('aedes_female_result');
		$data['male_anopheles_result'] = $this->input->post('male_anopheles_result');
		$data['female_anopheles_result'] = $this->input->post('female_anopheles_result');
		$data['male_culex_result'] = $this->input->post('culex_male_result');
		$data['female_culex_result'] = $this->input->post('culex_female_result');
		$data['final_result'] = $this->input->post('final_result');
		$data['screened_date'] = $this->input->post('screened_date');
		$data['screened_time'] = $this->input->post('screened_time');
		if ($data['final_result'] >= 35) {
			$data['status'] = '1';
		} else {
			$data['status'] = '2';
		}
		$data_old['screening_id_new'] = $this->input->post('screening_id');
		$data_old['screening_id_old'] = $this->input->post('save-btn');

		$response_check['check_data_count'] = $this->Screening_model->checkUpdateScreening($data_old);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Screening_model->updateRecords($data, $data_old);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Screening_model->display_records();
				$this->load->view('screening_list', $result);
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Screening id is already existing');
			</script>";
			$result['data'] = $this->Screening_model->display_records_individual($data_old['screening_id_old']);
			$result['identification_data'] = $this->Identification_model->display_records_active_for_screening();
			$this->load->view('update_screening', $result);
		}
	}

	public function deleteScreening($screening_id)
	{
		$data['status'] = "-2";
		$data['screening_id'] = $screening_id;
		$response = $this->Screening_model->deleteRecord($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Record deleted successfully');
			</script>";
			$result['data'] = $this->Screening_model->display_records();
			$this->load->view('screening_list', $result);
		} else {
			echo "<script type='text/javascript'>alert('Record not deleted successfully');
			</script>";
			$result['data'] = $this->Screening_model->display_records();
			$this->load->view('screening_list', $result);
		}
	}

}

