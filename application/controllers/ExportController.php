<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ExportController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Collection_model');
		$this->load->model('Export_model');
		//$this->load->model('Export_model');
	}

	public function index()
	{
		$result['data'] = $this->Export_model->display_records();
		$this->load->view('export_list', $result);
	}

	public function addExport()
	{
		$result['data'] = $this->Collection_model->display_records_active_for_exports();
		$this->load->view('add_export', $result);
	}

	public function updateExport($data)
	{
		$result['data'] = $this->Export_model->display_records_individual($data);
		$result['data_ov'] = $this->Collection_model->display_records_active_for_exports();
		$this->load->view('update_export', $result);
	}

	public function saveExport()
	{

		$data['export_id'] = $this->input->post('export_id');
		$data['export_date'] = $this->input->post('export_date');
		$data['export_time'] = $this->input->post('export_time');
		$data['export_status'] = "1";
		$data['qty'] = $this->input->post('qty');
		$data['ovi_collection_id'] = $this->input->post('ovi_collection_id');

		$response_check['check_data_count'] = $this->Export_model->checkExportId($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Export_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$this->load->view('export_list');
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Export id is already existing');
			</script>";
			$this->load->view('add_export');
		}
	}

	public function saveUpdateExport()
	{
		$data['export_id'] = $this->input->post('export_id');
		$data['export_date'] = $this->input->post('export_date');
		$data['export_time'] = $this->input->post('export_time');
		$data['export_status'] = $this->input->post('export_status');
		$data['qty'] = $this->input->post('qty');
		$data['ovi_collection_id'] = $this->input->post('ovi_collection_id');
		$data_old['export_id_new'] = $this->input->post('export_id');
		$data_old['export_id_old'] = $this->input->post('save-btn');

		$response_check['check_data_count'] = $this->Export_model->checkUpdateExport($data_old);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Export_model->updateRecords($data,$data_old);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Export_model->display_records();
				$this->load->view('export_list', $result);
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Export id is already existing');
			</script>";
			$result['data'] = $this->Export_model->display_records_individual($data);
			$result['data_ov'] = $this->Collection_model->display_records_active_for_exports();
			$this->load->view('update_export', $result);
		}
	}


}




