<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FieldActivitiesController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Persons_model');
		$this->load->model('Address_model');
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
		$result['data'] = $this->Persons_model->display_records();
		$this->load->view('persons_list', $result);
	}

	public function addPersons()
	{
		$this->load->view('add_persons');
	}

	public function addresses()
	{
		$result['data'] = $this->Address_model->display_records();
		$this->load->view('address_list',$result);
	}

	public function addAddresses()
	{
		$this->load->view('add_addresses');
	}

	public function updateAddresses($Address_id)
	{
		$result['data'] = $this->Address_model->display_records_individual($Address_id);
		$this->load->view('update_addresses',$result);

	}

	public function savePerson()
	{
		/*load registration view form*/
		$this->load->view('add_persons');

		$data['full_name'] = $this->input->post('full-name');
		$data['Contact_number'] = $this->input->post('contact-number');
		$data['Person_status'] = "Active";

		$response_check['check_data_count'] = $this->Persons_model->checkPersons($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Persons_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
			} else {
				$this->session->set_flashdata('error', "Failure. Please try again.");
			}
		} else {
			echo "<script type='text/javascript'>alert('Person is already existing');
			</script>";
		}
	}

	public function updatePersons($Person_id)
	{
		$result['data'] = $this->Persons_model->display_records_individual($Person_id);
		$this->load->view('update_persons', $result);
	}

	public function saveUpdatePerson()
	{
		/*load registration view form*/

		$data['full_name'] = $this->input->post('full-name');
		$data['Contact_number'] = $this->input->post('contact-number');
		$data['Person_status'] = $this->input->post('person-status');
		$data['Person_id'] = $this->input->post('save-btn');
		$response_check['check_data_count'] = $this->Persons_model->checkUpdatePersons($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Persons_model->updateRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Persons_model->display_records();
				$this->load->view('persons_list', $result);
			} else {
				echo "<script type='text/javascript'>alert('Record not updated successfully');
			</script>";
				$result['data'] = $this->Persons_model->display_records_individual($data['Person_id']);
				$this->load->view('update_persons', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('another person with same contact number is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Persons_model->display_records_individual($data['Person_id']);
			$this->load->view('update_persons', $result);
			//updatePersons($data['Person_id']);
		}
	}
	public function saveUpdateAddress()
	{
		/*load registration view form*/

		$data['add_line1'] = $this->input->post('add-line1');
		$data['add_line2'] = $this->input->post('add-line2');
		$data['location_description'] = $this->input->post('location-description');
		$data['location_status'] = $this->input->post('location-status');
		$data['address_id'] = $this->input->post('save-btn');
		$response_check['check_data_count'] = $this->Address_model->checkUpdateAddress($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Address_model->updateRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Address_model->display_records();
				$this->load->view('address_list', $result);
			} else {
				echo "<script type='text/javascript'>alert('Record not updated successfully');
			</script>";
				updateAddress($data['address_id']);
			}
		} else {
			echo "<script type='text/javascript'>alert('Duplicate address is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Address_model->display_records_individual($data['address_id']);
			$this->load->view('update_address', $result);
			//updatePersons($data['Person_id']);
		}
	}

	public function saveAddress()
	{
		/*load registration view form*/

		$data['add_line1'] = $this->input->post('add-line1');
		$data['add_line2'] = $this->input->post('add-line2');
		$data['location_description'] = $this->input->post('location-description');
		$data['location_status'] = "Active";

		$response_check['check_data_count'] = $this->Address_model->checkAddress($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Address_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$this->load->view('address_list');

			} else {
				echo "<script type='text/javascript'>alert('Failure. Please try again.');
			</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('Address is already existing');
			</script>";
			$this->load->view('add_address');
		}
	}
}




