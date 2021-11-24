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
		$this->load->library("pagination");
	}

	public function index()
	{

		$config = array();
		$config["base_url"] = site_url('SpatialDataController/index');
		$config["total_rows"] = $this->Maps_model->display_records_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$result["links"] = $this->pagination->create_links();
		$result['data'] = $this->Maps_model->display_records($config["per_page"], $page);
		$this->load->view('spatial_data', $result);
	}

	public function search()
	{
		if($this->input->post('search_bar')) {
			$this->session->set_userdata('search_bar', $this->input->post('search_bar'));
		}
		$config = array();
		$config["base_url"] = site_url('SpatialDataController/search');
		$config["total_rows"] = $this->Maps_model->display_records_search_count($this->session->userdata('search_bar'));
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$result["links"] = $this->pagination->create_links();
		$result['data'] = $this->Maps_model->display_records_search($this->session->userdata('search_bar'),$config["per_page"], $page);
		$result['search_key'][0]=$this->session->userdata('search_bar');
		$this->load->view('spatial_data_search', $result);
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
					if ($response>0) {
						echo "<script type='text/javascript'>alert('Map layer has been added successfully');
								</script>";
						$config = array();
						$config["base_url"] = site_url('SpatialDataController/index');
						$config["total_rows"] = $this->Maps_model->display_records_count();
						$config["per_page"] = 10;
						$config["uri_segment"] = 3;
						$this->pagination->initialize($config);
						$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
						$result["links"] = $this->pagination->create_links();
						$result['data'] = $this->Maps_model->display_records($config["per_page"], $page);
						$this->load->view('spatial_data', $result);
					} else {
						echo "<script type='text/javascript'>alert('Error in adding new map layer. Please try again.');
							</script>";
						$this->load->view('add_new_map');
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
			if ($response >0) {
				echo "<script type='text/javascript'>alert('Map layer has been updated successfully');
			</script>";
				$config = array();
				$config["base_url"] = site_url('SpatialDataController/index');
				$config["total_rows"] = $this->Maps_model->display_records_count();
				$config["per_page"] = 10;
				$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
				$result["links"] = $this->pagination->create_links();
				$result['data'] = $this->Maps_model->display_records($config["per_page"], $page);
				$this->load->view('spatial_data', $result);
			} else {
				echo "<script type='text/javascript'>alert('Map layer has not been updated successfully');
			</script>";
				$result['data'] = $this->Maps_model->display_records_individual($data['map_id']);
				$this->load->view('update_map', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('Map layer name is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Maps_model->display_records_individual($data['map_id']);
			$this->load->view('update_map', $result);
			//updatePersons($data['Person_id']);
		}
	}

	public function deleteMap($map_id)
	{
		$data['map_status'] = "-2";
		$data['map_id'] = $map_id;
		$response = $this->Maps_model->deleteRecords($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Map layer has been deleted successfully');
			</script>";

			$config = array();
			$config["base_url"] = site_url('SpatialDataController/index');
			$config["total_rows"] = $this->Maps_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
			$result["links"] = $this->pagination->create_links();
			$result['data'] = $this->Maps_model->display_records($config["per_page"], $page);
			$this->load->view('spatial_data', $result);


		} else {
			echo "<script type='text/javascript'>alert('Map layer has not deleted successfully');
			</script>";

			$config = array();
			$config["base_url"] = site_url('SpatialDataController/index');
			$config["total_rows"] = $this->Maps_model->display_records_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
			$result["links"] = $this->pagination->create_links();
			$result['data'] = $this->Maps_model->display_records($config["per_page"], $page);
			$this->load->view('spatial_data', $result);


		}
	}
}


