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
		$this->load->model('BgTrap_model');
		$this->load->model('OvTrap_model');
		$this->load->model('Mrc_model');
		$this->load->model('Collection_model');
	}

	public function index()
	{
		$this->load->view('field_activities_menu');
	}

	public function bgLocations()
	{
		$result['data'] = $this->BgTrap_model->display_records();
		$this->load->view('bg_locations', $result);
	}

	public function addBgLocations()
	{
		$result['persondata'] = $this->Persons_model->display_records_active();
		$result['addressdata'] = $this->Address_model->display_records_active();
		$this->load->view('add_bg_locations', $result);

	}

	public function updateBgLocations($data)
	{
		$result['data'] = $this->BgTrap_model->display_records_individual($data);
		$result['persondata'] = $this->Persons_model->display_records_active();
		$result['addressdata'] = $this->Address_model->display_records_active();
		$this->load->view('update_bg_location', $result);
	}

	public function ovLocations()
	{
		$result['data'] = $this->OvTrap_model->display_records();
		$this->load->view('ov_locations', $result);
	}

	public function addOviLocations()
	{
		$result['persondata'] = $this->Persons_model->display_records_active();
		$result['addressdata'] = $this->Address_model->display_records_active();
		$this->load->view('add_ov_locations', $result);
	}

	public function updateOvLocations($data)
	{
		$result['data'] = $this->OvTrap_model->display_records_individual($data);
		$result['persondata'] = $this->Persons_model->display_records_active();
		$result['addressdata'] = $this->Address_model->display_records_active();
		$this->load->view('update_ov_location', $result);

	}

	public function mrcLocations()
	{
		$result['data'] = $this->Mrc_model->display_records();
		$this->load->view('mrc_locations', $result);
	}

	public function addMrcLocations()
	{
		$result['persondata'] = $this->Persons_model->display_records_active();
		$result['addressdata'] = $this->Address_model->display_records_active();
		$this->load->view('add_mrc_locations', $result);
	}

	public function updateMRCLocations($data)
	{
		$result['data'] = $this->Mrc_model->display_records_individual($data);
		$result['persondata'] = $this->Persons_model->display_records_active();
		$result['addressdata'] = $this->Address_model->display_records_active();
		$this->load->view('update_mrc_location', $result);
	}

	public function bgCollections()
	{
		$result['data'] = $this->Collection_model->display_bg_collection();
		$this->load->view('bg_collections', $result);
	}

	public function addBgCollection()
	{
		$result['trap_data'] = $this->Collection_model->loadBgTraps();
		$this->load->view('add_bg_collection', $result);
	}

	public function updateBgCollection($bg_collection_id)
	{
		$result['data'] = $this->Collection_model->display_records_individual_bg_collection($bg_collection_id);
		$this->load->view('update_bg_collection', $result);
	}

	public function ovCollections()
	{
		$result['data'] = $this->Collection_model->display_ovi_collection();
		$this->load->view('ov_collections', $result);
	}

	public function addOvCollection()
	{
		$result['trap_data'] = $this->Collection_model->loadOviTraps();
		$this->load->view('add_ov_collection', $result);
	}

	public function updateOvCollection($ov_collection_id)
	{
		$result['data'] = $this->Collection_model->display_records_individual_ovi_collection($ov_collection_id);
		$this->load->view('update_ov_collection', $result);

	}

	public function mrcReleases()
	{
		$result['data'] = $this->Collection_model->display_mrc_releases();
		$this->load->view('mrc_releases', $result);
	}

	public function addMrcRelease()
	{
		$result['trap_data'] = $this->Collection_model->loadMrcTraps();
		$this->load->view('add_mrc_release', $result);
	}

	public function updateMrcRelease($release_id)
	{
		$result['data'] = $this->Collection_model->display_records_individual_mrc_release($release_id);
		$this->load->view('update_mrc_release', $result);
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
		$this->load->view('address_list', $result);
	}

	public function addAddresses()
	{
		$this->load->view('add_addresses');
	}

	public function updateAddresses($Address_id)
	{
		$result['data'] = $this->Address_model->display_records_individual($Address_id);
		$this->load->view('update_addresses', $result);

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

				$result['data'] = $this->Address_model->display_records();
				$this->load->view('address_list', $result);

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

	public function saveBg()
	{
		$data['trap_id'] = $this->input->post('trap-id');
		$data['trap_status'] = $this->input->post('status');
		$data['trap_position'] = $this->input->post('position');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['bg_date'] = $this->input->post('bg-date');
		$data['bg_time'] = $this->input->post('bg-time');
		$data['person_id'] = $this->input->post('person-name');
		$data['address_id'] = $this->input->post('address');

		$response_check['check_data_count'] = $this->BgTrap_model->checkBgId($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->BgTrap_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$result['data'] = $this->BgTrap_model->display_records();
				$this->load->view('bg_locations', $result);
			} else {
				echo "<script type='text/javascript'>alert('Failure in adding record. Please try again.');
				</script>";
				$this->load->view('add_bg_locations');
			}
		} else {
			echo "<script type='text/javascript'>alert('BG trap id is already existing. Please try again.');
				</script>";
			$this->load->view('add_bg_locations');
		}

	}

	public function saveBgCollection()
	{
		$data['collection_id'] = $this->input->post('collection-id');
		$data['trap_id'] = $this->input->post('bg-trap-id');
		$data['collect_date'] = $this->input->post('collect-date');
		$data['collect_time'] = $this->input->post('collect-time');
		$data['collect_status'] = $this->input->post('collection-status');

		$response_check['check_data_count'] = $this->Collection_model->checkBgCollectionId($data);
		if ($response_check['check_data_count'] == 0) {
			$runs['run_id'] = $this->Collection_model->findBgRunId($data['trap_id']);
			$data['run_id'] = $runs['run_id'][0]->bg_run_id;
			$response = $this->Collection_model->saveRecordsBgCollection($data);
			if ($response == true) {
				$response_check['check_trap_count'] = $this->Collection_model->checkRunPendingBgPoints($data['run_id']);
				if ($response_check['check_trap_count'] == 0) {
					$response = $this->Collection_model->updateRunStatus($data['run_id']);
					if ($response == true) {
						echo "<script type='text/javascript'>alert('Record added successfully');
					</script>";
					}
				}
				$this->load->view('bg_collections');
			} else {
				echo "<script type='text/javascript'>alert('Failure in adding record. Please try again.');
				</script>";
				$result['trap_data'] = $this->Collection_model->loadBgTraps();
				$this->load->view('add_bg_collection', $result);

			}
		} else {
			echo "<script type='text/javascript'>alert('Collection id is already existing. Please try again.');
				</script>";
			$result['trap_data'] = $this->Collection_model->loadBgTraps();
			$this->load->view('add_bg_collection', $result);
		}
	}


	public function saveOviCollection()
	{
		$data['collection_id'] = $this->input->post('collection-id');
		$data['trap_id'] = $this->input->post('ovi-trap-id');
		$data['collect_date'] = $this->input->post('collect-date');
		$data['collect_time'] = $this->input->post('collect-time');
		$data['collect_status'] = $this->input->post('collection-status');

		$response_check['check_data_count'] = $this->Collection_model->checkOviCollectionId($data);
		if ($response_check['check_data_count'] == 0) {
			$runs['run_id'] = $this->Collection_model->findOviRunId($data['trap_id']);
			$data['run_id'] = $runs['run_id'][0]->ovi_run_id;
			$response = $this->Collection_model->saveRecordsOviCollection($data);
			if ($response == true) {
				$response_check['check_trap_count'] = $this->Collection_model->checkRunPendingOviPoints($data['run_id']);
				if ($response_check['check_trap_count'] == 0) {
					$response = $this->Collection_model->updateRunStatus($data['run_id']);
					if ($response == true) {
						echo "<script type='text/javascript'>alert('Record added successfully');
					</script>";
					}
				}
				$this->load->view('ov_collections');
			} else {
				echo "<script type='text/javascript'>alert('Failure in adding record. Please try again.');
				</script>";
				$result['trap_data'] = $this->Collection_model->loadOviTraps();
				$this->load->view('add_ov_collection', $result);

			}
		} else {
			echo "<script type='text/javascript'>alert('Collection id is already existing. Please try again.');
				</script>";
			$result['trap_data'] = $this->Collection_model->loadOviTraps();
			$this->load->view('add_ov_collection', $result);
		}
	}

	public function saveMrcRelease()
	{
		$data['release_id'] = $this->input->post('release-id');
		$data['identifier'] = $this->input->post('identifier');
		$data['released_date'] = $this->input->post('released-date');
		$data['released_time'] = $this->input->post('released-time');
		$data['released_status'] = $this->input->post('release-status');

		$response_check['check_data_count'] = $this->Collection_model->checkMrcReleaseId($data);
		if ($response_check['check_data_count'] == 0) {
			$runs['run_id'] = $this->Collection_model->findMrcRunId($data['identifier']);
			$data['run_id'] = $runs['run_id'][0]->mrc_run_id;
			$response = $this->Collection_model->saveRecordsMrcRelease($data);
			if ($response == true) {
				$response_check['check_trap_count'] = $this->Collection_model->checkRunPendingMrcPoints($data['run_id']);
				if ($response_check['check_trap_count'] == 0) {
					$response = $this->Collection_model->updateRunStatus($data['run_id']);
					if ($response == true) {
						echo "<script type='text/javascript'>alert('Record added successfully');
					</script>";
					}
				}
				$result_view['data'] = $this->Collection_model->display_mrc_releases();
				$this->load->view('mrc_releases', $result_view);
			} else {
				echo "<script type='text/javascript'>alert('Failure in adding record. Please try again.');
				</script>";
				$result['trap_data'] = $this->Collection_model->loadMrcTraps();
				$this->load->view('add_mrc_release', $result);

			}
		} else {
			echo "<script type='text/javascript'>alert('Release id is already existing. Please try again.');
				</script>";
			$result['trap_data'] = $this->Collection_model->loadMrcTraps();
			$this->load->view('add_mrc_release', $result);
		}
	}


	public function saveUpdateBg()
	{
		$data['trap_id'] = $this->input->post('trap-id');
		$data['trap_status'] = $this->input->post('status');
		$data['trap_position'] = $this->input->post('position');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['bg_date'] = $this->input->post('bg-date');
		$data['bg_time'] = $this->input->post('bg-time');
		$data['person_id'] = $this->input->post('person-name');
		$data['address_id'] = $this->input->post('address');
		$old_data['trap_id_old'] = $this->input->post('save-btn');
		$old_data['trap_id_new'] = $this->input->post('trap-id');

		$response_check['check_data_count'] = $this->BgTrap_model->checkUpdateBgTrap($old_data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->BgTrap_model->updateRecords($data, $old_data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->BgTrap_model->display_records();
				$this->load->view('bg_locations', $result);
			} else {
				echo "<script type='text/javascript'>alert('Failure in updating record. Please try again.');
				</script>";
				$result['data'] = $this->BgTrap_model->display_records_individual($old_data['trap_id_old']);
				$result['persondata'] = $this->Persons_model->display_records_active();
				$result['addressdata'] = $this->Address_model->display_records_active();
				$this->load->view('update_bg_location', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('New BG trap id is already existing. Please try again.');
				</script>";

			$result['data'] = $this->BgTrap_model->display_records_individual($old_data['trap_id_old']);
			$result['persondata'] = $this->Persons_model->display_records_active();
			$result['addressdata'] = $this->Address_model->display_records_active();
			$this->load->view('update_bg_location', $result);
		}

	}

	public function saveOvi()
	{
		$data['trap_id'] = $this->input->post('trap-id');
		$data['trap_status'] = $this->input->post('status');
		$data['trap_position'] = $this->input->post('position');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['ovi_date'] = $this->input->post('ov-date');
		$data['ovi_time'] = $this->input->post('ov-time');
		$data['person_id'] = $this->input->post('person-name');
		$data['address_id'] = $this->input->post('address');

		$response_check['check_data_count'] = $this->OvTrap_model->checkOvId($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->OvTrap_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$result['data'] = $this->OvTrap_model->display_records();
				$this->load->view('ov_locations', $result);
			} else {
				echo "<script type='text/javascript'>alert('Failure in adding record. Please try again.');
				</script>";
				$this->load->view('add_ov_locations');
			}
		} else {
			echo "<script type='text/javascript'>alert('OV trap id is already existing. Please try again.');
				</script>";
			$this->load->view('add_ov_locations');
		}
	}

	public function saveUpdateOv()
	{
		$data['trap_id'] = $this->input->post('trap-id');
		$data['trap_status'] = $this->input->post('status');
		$data['trap_position'] = $this->input->post('position');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['ovi_date'] = $this->input->post('ov-date');
		$data['ovi_time'] = $this->input->post('ov-time');
		$data['person_id'] = $this->input->post('person-name');
		$data['address_id'] = $this->input->post('address');
		$old_data['trap_id_old'] = $this->input->post('save-btn');
		$old_data['trap_id_new'] = $this->input->post('trap-id');

		$response_check['check_data_count'] = $this->OvTrap_model->checkUpdateOvTrap($old_data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->OvTrap_model->updateRecords($data, $old_data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->OvTrap_model->display_records();
				$this->load->view('ov_locations', $result);
			} else {
				echo "<script type='text/javascript'>alert('Failure in updating record. Please try again.');
				</script>";
				$this->load->view('update_ov_location');
				$result['data'] = $this->OvTrap_model->display_records_individual($old_data['trap_id_old']);
				$result['persondata'] = $this->Persons_model->display_records_active();
				$result['addressdata'] = $this->Address_model->display_records_active();
				$this->load->view('update_ov_location', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('New Ovi trap id is already existing. Please try again.');
				</script>";
			$result['data'] = $this->OvTrap_model->display_records_individual($old_data['trap_id_old']);
			$result['persondata'] = $this->Persons_model->display_records_active();
			$result['addressdata'] = $this->Address_model->display_records_active();
			$this->load->view('update_ov_location', $result);
		}

	}

	public function saveMrc()
	{
		$data['mrc_identifier'] = $this->input->post('trap-id');
		$data['mrc_status'] = $this->input->post('status');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['mrc_date'] = $this->input->post('mrc-date');
		$data['mrc_time'] = $this->input->post('mrc-time');
		$data['person_id'] = $this->input->post('person-name');
		$data['address_id'] = $this->input->post('address');

		$response_check['check_data_count'] = $this->Mrc_model->checkMrcIdentifier($data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Mrc_model->saveRecords($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record added successfully');
			</script>";
				$result['data'] = $this->Mrc_model->display_records();
				$this->load->view('mrc_locations', $result);
			} else {
				echo "<script type='text/javascript'>alert('Failure in adding record. Please try again.');
				</script>";
				$this->load->view('add_mrc_locations');
			}
		} else {
			echo "<script type='text/javascript'>alert('Mrc is already existing. Please try again.');
				</script>";
			$this->load->view('add_mrc_locations');
		}

	}

	public function saveUpdateMrc()
	{
		$data['mrc_identifier'] = $this->input->post('trap-id');
		$data['mrc_status'] = $this->input->post('status');
		$data['coordinates'] = $this->input->post('coordinates');
		$data['mrc_date'] = $this->input->post('mrc-date');
		$data['mrc_time'] = $this->input->post('mrc-time');
		$data['person_id'] = $this->input->post('person-name');
		$data['address_id'] = $this->input->post('address');
		$old_data['mrc_identifier_old'] = $this->input->post('save-btn');
		$old_data['mrc_identifier_new'] = $this->input->post('trap-id');

		$response_check['check_data_count'] = $this->Mrc_model->checkUpdateMrc($old_data);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Mrc_model->updateRecords($data, $old_data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Mrc_model->display_records();
				$this->load->view('mrc_locations', $result);

			} else {
				echo "<script type='text/javascript'>alert('Failure in updating record. Please try again.');
				</script>";
				$result['data'] = $this->Mrc_model->display_records_individual($old_data['mrc_identifier_old']);
				$result['persondata'] = $this->Mrc_model->display_records_active();
				$result['addressdata'] = $this->Mrc_model->display_records_active();
				$this->load->view('update_mrc_location', $result);
			}
		} else {
			echo "<script type='text/javascript'>alert('New Mrc identifier is already existing. Please try again.');
				</script>";
			$result['data'] = $this->Mrc_model->display_records_individual($old_data['mrc_identifier_old']);
			$result['persondata'] = $this->Mrc_model->display_records_active();
			$result['addressdata'] = $this->Mrc_model->display_records_active();
			$this->load->view('update_mrc_location', $result);
		}

	}

	public function saveUpdateBgCollection()
	{
		/*load registration view form*/

		$data['collection_id'] = $this->input->post('collection-id');
		$data['trap_id'] = $this->input->post('trap-id');
		$data['collect_date'] = $this->input->post('collect_date');
		$data['collect_time'] = $this->input->post('collect_time');
		$data['collect_status'] = $this->input->post('collect_status');
		$data_old['collection_id_old'] = $this->input->post('save-btn');

		$response_check['check_data_count'] = $this->Collection_model->checkUpdateBgCollectionId($data,$data_old);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Collection_model->updateRecordsBgCollection($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Collection_model->display_bg_collection();
				$this->load->view('bg_collections', $result);
			} else {
				echo "<script type='text/javascript'>alert('Record not updated successfully');
			</script>";
				$result['data'] = $this->Collection_model->display_records_individual_bg_collection($data['collection_id']);
				$this->load->view('update_bg_collection', $result);

			}
		} else {
			echo "<script type='text/javascript'>alert('Duplicate collection id is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Collection_model->display_records_individual_bg_collection($data['collection_id']);
			$this->load->view('update_bg_collection', $result);

		}
	}

	public function saveUpdateOviCollection()
	{
		/*load registration view form*/

		$data['collection_id'] = $this->input->post('collection-id');
		$data['trap_id'] = $this->input->post('trap-id');
		$data['collect_date'] = $this->input->post('collect_date');
		$data['collect_time'] = $this->input->post('collect_time');
		$data['collect_status'] = $this->input->post('collect_status');
		$data_old['collection_id_old'] = $this->input->post('save-btn');

		$response_check['check_data_count'] = $this->Collection_model->checkUpdateOviCollectionId($data,$data_old);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Collection_model->updateRecordsOviCollection($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Collection_model->display_ovi_collection();
				$this->load->view('ov_collections', $result);
			} else {
				echo "<script type='text/javascript'>alert('Record not updated successfully');
			</script>";
				$result['data'] = $this->Collection_model->display_records_individual_ovi_collection($data['collection_id']);
				$this->load->view('update_ov_collection', $result);

			}
		} else {
			echo "<script type='text/javascript'>alert('Duplicate collection id is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Collection_model->display_records_individual_ovi_collection($data['collection_id']);
			$this->load->view('update_ov_collection', $result);

		}
	}

	public function saveUpdateMrcRelease()
	{
		/*load registration view form*/

		$data['release_id'] = $this->input->post('release-id');
		$data['identifier'] = $this->input->post('mrc-identifier');
		$data['released_date'] = $this->input->post('release_date');
		$data['released_time'] = $this->input->post('release_time');
		$data['released_status'] = $this->input->post('release_status');
		$data_old['release_id_old'] = $this->input->post('save-btn');

		$response_check['check_data_count'] = $this->Collection_model->checkUpdateMrcReleaseId($data,$data_old);
		if ($response_check['check_data_count'] == 0) {
			$response = $this->Collection_model->updateRecordsMrcRelease($data);
			if ($response == true) {
				echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
				$result['data'] = $this->Collection_model->display_mrc_releases();
				$this->load->view('mrc_releases', $result);
			} else {
				echo "<script type='text/javascript'>alert('Record not updated successfully');
			</script>";
				$result['data'] = $this->Collection_model->display_records_individual_mrc_release($data['release_id']);
				$this->load->view('update_mrc_release', $result);

			}
		} else {
			echo "<script type='text/javascript'>alert('Duplicate collection id is already ' +
 				'existing');
			</script>";
			$result['data'] = $this->Collection_model->display_records_individual_mrc_release($data['release_id']);
			$this->load->view('update_mrc_release', $result);

		}
	}



}




