<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SpatialDataController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Maps_model');
	}

	public function index()
	{
		$result['data'] = $this->Maps_model->display_records();
		$this->load->view('spatial_data', $result);
	}
	public function addNewMap()
	{
		$this->load->view('add_new_map');
	}
	public function updateMap($map_id)
	{
		$result['data'] = $this->Maps_model->display_records_individual($map_id);
		$this->load->view('update_map',$result);
	}
	public function mapView($map_id)
	{
		$result['data'] = $this->Maps_model->display_records_individual($map_id);
		$this->load->view('map_view',$result);
	}
	public function uploadMap()
	{
			$data = array();
			try {
				$data['name'] = $this->input->post('map-name');
				$data['description'] = $this->input->post('map-description');
				$data['geojson_content'] = $this->input->post('geojson-content');
				$data['map_status'] = "Active";
				$response_check['check_data_count'] = $this->Maps_model->checkMap($data);
				if ($response_check['check_data_count'] == 0) {
					$response = $this->Maps_model->saveRecords($data);
					if ($response == true) {
						echo "<script type='text/javascript'>alert('Record added successfully');
								</script>";
						$result['data'] = $this->Maps_model->display_records();
						$this->load->view('spatial_data', $result);
					} else {
						$this->session->set_flashdata('error', "Failure. Please try again.");
					}
				} else {
					echo "<script type='text/javascript'>alert('Map name is already existing');
							</script>";
					$this->load->view('add_new_map');
				}
			}
			catch(Exception $e){
				echo $e;
			}
	}
	public function saveUpdateMap()
	{
		/*load registration view form*/
		$data['name'] = $this->input->post('map-name');
		$data['description'] = $this->input->post('map-description');
		$data['geojson_content'] = $this->input->post('geojson-content');
		$data['map_status'] = $this->input->post('map-status');
		$data['map_id'] = $this->input->post('save-btn');
		$response_check['check_data_count'] = $this->Maps_model->checkUpdateMap($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Maps_model->updateRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Maps_model->display_records();
				$this->load->view('spatial_data', $result);
			} else {
				echo "<script type='text/javascript'>alert('Record not updated successfully');
			</script>";
				$result['data'] = $this->Maps_model->display_records_individual($data['map_id']);
				$this->load->view('update_map', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('another person with same contact number is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Maps_model->display_records_individual($data['map_id']);
			$this->load->view('update_map', $result);
			//updatePersons($data['Person_id']);
		}
	}
}


