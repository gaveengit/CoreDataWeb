<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FieldRunsController extends CI_Controller
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
		$this->load->model('Run_model');
	}

	public function errorLog()
	{
		$this->load->view('field_run_error_log');
	}
	public function updateRun($run_id)

	{
		$result['main_data'] = $this->Run_model->display_main_field_run_record($run_id);
		$result['ovi_main_data'] = $this->Run_model->display_ovi_field_run_record($run_id);
		$result['ovi_points'] = $this->Run_model->display_ovi_field_run_points($run_id);
		if(count($result['ovi_main_data'])>0){
			if($result['ovi_main_data'][0]->ovi_run_type=='1'){
				$result['run_type'][0]['type']="OVI Service";
			}
			else{
				$result['run_type'][0]['type']="OVI Release";
			}
		}


		$result['bg_main_data'] = $this->Run_model->display_bg_field_run_record($run_id);
		$result['bg_points'] = $this->Run_model->display_bg_field_run_points($run_id);
		if(count($result['bg_main_data'])>0){
			if($result['bg_main_data'][0]->bg_run_type=='1'){
				$result['run_type'][0]['type']="BG Service";
			}
			else{
				$result['run_type'][0]['type']="BG Release";
			}
		}



		$result['mrc_main_data'] = $this->Run_model->display_mrc_field_run_record($run_id);
		$result['mrc_points'] = $this->Run_model->display_mrc_field_run_points($run_id);

		if(count($result['mrc_main_data'])>0){
			if($result['mrc_main_data'][0]->mrc_run_type=='1'){
				$result['run_type'][0]['type']="MRC Service";
			}
			else{
				$result['run_type'][0]['type']="MRC Release";
			}
		}

		$this->load->view('update_field_run',$result);
	}
	public function saveUpdateRun()
	{
		$data['field_run_id'] = $this->input->post('run-name');
		$data['description'] = $this->input->post('description');
		$response = $this->Run_model->updateRecords($data);
		if ($response == true) {
			echo "<script type='text/javascript'>alert('Record updated successfully');
			</script>";
			$result['ovi_data'] = $this->Run_model->display_records_ovi();
			$result['bg_data'] = $this->Run_model->display_records_bg();
			$result['mrc_data'] = $this->Run_model->display_records_mrc();
			$this->load->view('field_runs_list', $result);

		} else {
			echo "<script type='text/javascript'>alert('Failure in updateding successfully');
			</script>";
			$this->updateRun($data['field_run_id']);
		}
	}

	public function fieldRuns()
	{
		$result['ovi_data'] = $this->Run_model->display_records();
		$this->load->view('field_runs_list', $result);
	}

	public function saveRunLocations()
	{
		$data['field_run_id'] = $this->input->post('run-name');
		$data_run['run_type'] = $this->input->post('run-type');
		$data['description'] = $this->input->post('description');
		$data['run_date'] = $this->input->post('run-date');
		$data['run_time'] = $this->input->post('run-time');
		$data['run_status'] = "1";

		$response_check['check_data_count'] = $this->Run_model->checkRunId($data);
		if ($response_check['check_data_count'] == 0) {

			$file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");

			if ($data_run['run_type'] == '2') {
				$c = 0;
				while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
					if ($c <> 0) {
						$data_trap['trap_id'] = $filesop[0];
						$ovi_validity_response['data'] = $this->Run_model->checkIsOvTrap($data_trap);
						if ($ovi_validity_response['data'] == 0) {
							$ovi_service_invalid_errors['data'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$ovi_service_invalid_errors['data'][$c - 1]['error'] = "invalid identifiers";
							$error_log['invalid_trap'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_trap'][$c - 1]['error'] = "invalid identifiers";
						}
					}
					$c = $c + 1;
				}
				$handle = fopen($file, "r");
				$b = 0;
				while (($filesop2 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($b <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop2[0];
						$ovi_status_response['data'] = $this->Run_model->checkOviStatusService($data_trap);
						//echo '<script type="text/javascript">alert("'.$ovi_status_response['data'].'");</script>';
						if ($ovi_status_response['data'] <> 0) {
							$ovi_status_invalid_errors['data'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$ovi_status_invalid_errors['data'][$b - 1]['error'] = "invalid status";
							$error_log['invalid_status'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_status'][$b - 1]['error'] = "invalid status";
						}
					}
					$b = $b + 1;
				}

				$handle = fopen($file, "r");
				$d = 0;
				while (($filesop3 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($d <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop3[0];
						$ovi_run_status_response['data'] = $this->Run_model->checkOvInPendingRun($data_trap);
						echo '<script type="text/javascript">alert("' . $ovi_run_status_response['data'] . '");</script>';
						if ($ovi_run_status_response['data'] <> 0) {
							$ovi_run_status_invalid_errors['data'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$ovi_run_status_invalid_errors['data'][$d - 1]['error'] = "Trap is already in a pending run";
							$error_log['pending'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['pending'][$d - 1]['error'] = "Trap is already in a pending run";
						}
					}
					$d = $d + 1;
				}
				if (isset($ovi_run_status_invalid_errors['data']) || isset($ovi_status_invalid_errors['data'])
					|| isset($ovi_service_invalid_errors['data'])) {
					$this->load->view('field_run_error_log', $error_log);
				} else {
					$response_field_run = $this->Run_model->saveRecordsFieldRun($data);
					if ($response_field_run == true) {
						$ovi_data['ovi_run_id'] = $this->input->post('run-name');
						$ovi_data['ovi_run_type'] = "1";
						$response_ovi_field_run = $this->Run_model->saveRecordsOviFieldRun($ovi_data);
						if ($response_ovi_field_run == true) {
							$k = 0;
							$handle = fopen($file, "r");
							while (($filesop4 = fgetcsv($handle, 1000, ",")) !== false) {
								if ($k <> 0) {
									$ovi_trap_data['ovi_trap_id'] = $filesop4[0];
									$ovi_trap_data['ovi_run_id'] = $this->input->post('run-name');
									$response_ovi_trap_data = $this->Run_model->saveRecordsOviRunTraps($ovi_trap_data);

								}
								$k = $k + 1;
							}
							if ($response_ovi_trap_data == true) {
								echo "<script type='text/javascript'>alert('done');
								</script>";
							}
						}
					}
				}
			}


			if ($data_run['run_type'] == '3') {
				$c = 0;
				while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
					if ($c <> 0) {
						$data_trap['trap_id'] = $filesop[0];
						$ovi_validity_response['data'] = $this->Run_model->checkIsOvTrap($data_trap);
						if ($ovi_validity_response['data'] == 0) {
							$ovi_service_invalid_errors['data'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$ovi_service_invalid_errors['data'][$c - 1]['error'] = "invalid identifiers";
							$error_log['invalid_trap'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_trap'][$c - 1]['error'] = "invalid identifiers";
						}
					}
					$c = $c + 1;
				}
				$handle = fopen($file, "r");
				$b = 0;
				while (($filesop2 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($b <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop2[0];
						$ovi_status_response['data'] = $this->Run_model->checkOviStatusSetService($data_trap);
						//echo '<script type="text/javascript">alert("'.$ovi_status_response['data'].'");</script>';
						if ($ovi_status_response['data'] <> 0) {
							$ovi_status_invalid_errors['data'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$ovi_status_invalid_errors['data'][$b - 1]['error'] = "invalid status";
							$error_log['invalid_status'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_status'][$b - 1]['error'] = "invalid status";
						}
					}
					$b = $b + 1;
				}

				$handle = fopen($file, "r");
				$d = 0;
				while (($filesop3 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($d <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop3[0];
						$ovi_run_status_response['data'] = $this->Run_model->checkOvInPendingRun($data_trap);
						echo '<script type="text/javascript">alert("' . $ovi_run_status_response['data'] . '");</script>';
						if ($ovi_run_status_response['data'] <> 0) {
							$ovi_run_status_invalid_errors['data'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$ovi_run_status_invalid_errors['data'][$d - 1]['error'] = "Trap is already in a pending run";
							$error_log['pending'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['pending'][$d - 1]['error'] = "Trap is already in a pending run";

						}
					}
					$d = $d + 1;
				}
				if (isset($ovi_run_status_invalid_errors['data']) || isset($ovi_status_invalid_errors['data'])
					|| isset($ovi_service_invalid_errors['data'])) {
					$this->load->view('field_run_error_log', $error_log);
				} else {
					$response_field_run = $this->Run_model->saveRecordsFieldRun($data);
					if ($response_field_run == true) {
						$ovi_data['ovi_run_id'] = $this->input->post('run-name');
						$ovi_data['ovi_run_type'] = "2";
						$response_ovi_field_run = $this->Run_model->saveRecordsOviFieldRun($ovi_data);
						if ($response_ovi_field_run == true) {
							$k = 0;
							$handle = fopen($file, "r");
							while (($filesop4 = fgetcsv($handle, 1000, ",")) !== false) {
								if ($k <> 0) {
									$ovi_trap_data['ovi_trap_id'] = $filesop4[0];
									$ovi_trap_data['ovi_run_id'] = $this->input->post('run-name');
									$response_ovi_trap_data = $this->Run_model->saveRecordsOviRunTraps($ovi_trap_data);

								}
								$k = $k + 1;
							}
							if ($response_ovi_trap_data == true) {
								echo "<script type='text/javascript'>alert('done');
								</script>";
							}
						}
					}
				}
			}


			if ($data_run['run_type'] == '4') {
				$c = 0;
				while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
					if ($c <> 0) {
						$data_trap['trap_id'] = $filesop[0];
						$bg_validity_response['data'] = $this->Run_model->checkIsBgTrap($data_trap);
						if ($bg_validity_response['data'] == 0) {
							$bg_service_invalid_errors['data'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$bg_service_invalid_errors['data'][$c - 1]['error'] = "invalid identifiers";
							$error_log['invalid_trap'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_trap'][$c - 1]['error'] = "invalid identifiers";
						}
					}
					$c = $c + 1;
				}
				$handle = fopen($file, "r");
				$b = 0;
				while (($filesop2 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($b <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop2[0];
						$bg_status_response['data'] = $this->Run_model->checkBgStatusService($data_trap);
						//echo '<script type="text/javascript">alert("'.$ovi_status_response['data'].'");</script>';
						if ($bg_status_response['data'] <> 0) {
							$bg_status_invalid_errors['data'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$bg_status_invalid_errors['data'][$b - 1]['error'] = "invalid status";
							$error_log['invalid_status'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_status'][$b - 1]['error'] = "invalid status";
						}
					}
					$b = $b + 1;
				}

				$handle = fopen($file, "r");
				$d = 0;
				while (($filesop3 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($d <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop3[0];
						$bg_run_status_response['data'] = $this->Run_model->checkBgInPendingRun($data_trap);
						echo '<script type="text/javascript">alert("' . $bg_run_status_response['data'] . '");</script>';
						if ($bg_run_status_response['data'] <> 0) {
							$bg_run_status_invalid_errors['data'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$bg_run_status_invalid_errors['data'][$d - 1]['error'] = "trap is already in a pending run";
							$error_log['pending'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['pending'][$d - 1]['error'] = "Trap is already in a pending run";

						}
					}
					$d = $d + 1;
				}
				if (isset($bg_run_status_invalid_errors['data']) || isset($bg_status_invalid_errors['data'])
					|| isset($bg_service_invalid_errors['data'])) {
					$this->load->view('field_run_error_log', $error_log);
				} else {
					$response_field_run = $this->Run_model->saveRecordsFieldRun($data);
					if ($response_field_run == true) {
						$bg_data['bg_run_id'] = $this->input->post('run-name');
						$bg_data['bg_run_type'] = "1";
						$response_bg_field_run = $this->Run_model->saveRecordsBgFieldRun($bg_data);
						if ($response_bg_field_run == true) {
							$k = 0;
							$handle = fopen($file, "r");
							while (($filesop4 = fgetcsv($handle, 1000, ",")) !== false) {
								if ($k <> 0) {
									$bg_trap_data['bg_trap_id'] = $filesop4[0];
									$bg_trap_data['bg_run_id'] = $this->input->post('run-name');
									$response_bg_trap_data = $this->Run_model->saveRecordsBgRunTraps($bg_trap_data);

								}
								$k = $k + 1;
							}
							if ($response_bg_trap_data == true) {
								echo "<script type='text/javascript'>alert('done');
								</script>";
							}
						}
					}
				}
			}

			if ($data_run['run_type'] == '5') {
				$c = 0;
				while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
					if ($c <> 0) {
						$data_trap['trap_id'] = $filesop[0];
						$bg_validity_response['data'] = $this->Run_model->checkIsBgTrap($data_trap);
						if ($bg_validity_response['data'] == 0) {
							$bg_service_invalid_errors['data'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$bg_service_invalid_errors['data'][$c - 1]['error'] = "invalid identifiers";
							$error_log['invalid_trap'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_trap'][$c - 1]['error'] = "invalid identifiers";
						}
					}
					$c = $c + 1;
				}
				$handle = fopen($file, "r");
				$b = 0;
				while (($filesop2 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($b <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop2[0];
						$bg_status_response['data'] = $this->Run_model->checkBgStatusSetService($data_trap);
						//echo '<script type="text/javascript">alert("'.$ovi_status_response['data'].'");</script>';
						if ($bg_status_response['data'] <> 0) {
							$bg_status_invalid_errors['data'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$bg_status_invalid_errors['data'][$b - 1]['error'] = "invalid status";
							$error_log['invalid_status'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_status'][$b - 1]['error'] = "invalid status";
						}
					}
					$b = $b + 1;
				}

				$handle = fopen($file, "r");
				$d = 0;
				while (($filesop3 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($d <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop3[0];
						$bg_run_status_response['data'] = $this->Run_model->checkBgInPendingRun($data_trap);
						echo '<script type="text/javascript">alert("' . $bg_run_status_response['data'] . '");</script>';
						if ($bg_run_status_response['data'] <> 0) {
							$bg_run_status_invalid_errors['data'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$bg_run_status_invalid_errors['data'][$d - 1]['error'] = "Trap is already in a pending run";
							$error_log['pending'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['pending'][$d - 1]['error'] = "Trap is already in a pending run";
						}
					}
					$d = $d + 1;
				}
				if (isset($bg_run_status_invalid_errors['data']) || isset($bg_status_invalid_errors['data'])
					|| isset($bg_service_invalid_errors['data'])) {
					$this->load->view('field_run_error_log', $error_log);
				} else {
					$response_field_run = $this->Run_model->saveRecordsFieldRun($data);
					if ($response_field_run == true) {
						$bg_data['bg_run_id'] = $this->input->post('run-name');
						$bg_data['bg_run_type'] = "2";
						$response_bg_field_run = $this->Run_model->saveRecordsBgFieldRun($bg_data);
						if ($response_bg_field_run == true) {
							$k = 0;
							$handle = fopen($file, "r");
							while (($filesop4 = fgetcsv($handle, 1000, ",")) !== false) {
								if ($k <> 0) {
									$bg_trap_data['bg_trap_id'] = $filesop4[0];
									$bg_trap_data['bg_run_id'] = $this->input->post('run-name');
									$response_bg_trap_data = $this->Run_model->saveRecordsBgRunTraps($bg_trap_data);

								}
								$k = $k + 1;
							}
							if ($response_bg_trap_data == true) {
								echo "<script type='text/javascript'>alert('done');
								</script>";
							}
						}
					}
				}
			}
			if ($data_run['run_type'] == '6') {
				$c = 0;
				while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
					if ($c <> 0) {
						$data_trap['trap_id'] = $filesop[0];
						$mrc_validity_response['data'] = $this->Run_model->checkIsMrcTrap($data_trap);
						if ($mrc_validity_response['data'] == 0) {
							$mrc_service_invalid_errors['data'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$mrc_service_invalid_errors['data'][$c - 1]['error'] = "invalid identifier";
							$error_log['invalid_trap'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_trap'][$c - 1]['error'] = "invalid identifiers";
						}
					}
					$c = $c + 1;
				}
				$handle = fopen($file, "r");
				$b = 0;
				while (($filesop2 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($b <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop2[0];
						$mrc_status_response['data'] = $this->Run_model->checkMrcStatusService($data_trap);
						//echo '<script type="text/javascript">alert("'.$ovi_status_response['data'].'");</script>';
						if ($mrc_status_response['data'] <> 0) {
							$mrc_status_invalid_errors['data'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$mrc_status_invalid_errors['data'][$b - 1]['error'] = "invalid status";
							$error_log['invalid_status'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_status'][$b - 1]['error'] = "invalid status";
						}
					}
					$b = $b + 1;
				}

				$handle = fopen($file, "r");
				$d = 0;
				while (($filesop3 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($d <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop3[0];
						$mrc_run_status_response['data'] = $this->Run_model->checkMrcInPendingRun($data_trap);
						echo '<script type="text/javascript">alert("' . $mrc_run_status_response['data'] . '");</script>';
						if ($mrc_run_status_response['data'] <> 0) {
							$mrc_run_status_invalid_errors['data'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$mrc_run_status_invalid_errors['data'][$d - 1]['error'] = "Trap is already in a pending run";
							$error_log['pending'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['pending'][$d - 1]['error'] = "Trap is already in a pending run";
						}
					}
					$d = $d + 1;
				}
				if (isset($mrc_run_status_invalid_errors['data']) || isset($mrc_status_invalid_errors['data'])
					|| isset($mrc_service_invalid_errors['data'])) {
					$this->load->view('field_run_error_log', $error_log);
				} else {
					$response_field_run = $this->Run_model->saveRecordsFieldRun($data);
					if ($response_field_run == true) {
						$mrc_data['mrc_run_id'] = $this->input->post('run-name');
						$mrc_data['mrc_run_type'] = "1";
						$response_mrc_field_run = $this->Run_model->saveRecordsMrcFieldRun($mrc_data);
						if ($response_mrc_field_run == true) {
							$k = 0;
							$handle = fopen($file, "r");
							while (($filesop4 = fgetcsv($handle, 1000, ",")) !== false) {
								if ($k <> 0) {
									$mrc_trap_data['mrc_trap_id'] = $filesop4[0];
									$mrc_trap_data['mrc_run_id'] = $this->input->post('run-name');
									$response_mrc_trap_data = $this->Run_model->saveRecordsMrcRunTraps($mrc_trap_data);

								}
								$k = $k + 1;
							}
							if ($response_mrc_trap_data == true) {
								echo "<script type='text/javascript'>alert('done');
								</script>";
							}
						}
					}
				}
			}

			if ($data_run['run_type'] == '1') {
				$c = 0;
				while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
					if ($c <> 0) {
						$data_trap['trap_id'] = $filesop[0];
						$mrc_validity_response['data'] = $this->Run_model->checkIsMrcTrap($data_trap);
						if ($mrc_validity_response['data'] == 0) {
							$mrc_service_invalid_errors['data'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$mrc_service_invalid_errors['data'][$c - 1]['error'] = "invalid identifiers";
							$error_log['invalid_trap'][$c - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_trap'][$c - 1]['error'] = "invalid identifiers";
						}
					}
					$c = $c + 1;
				}
				$handle = fopen($file, "r");
				$b = 0;
				while (($filesop2 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($b <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop2[0];
						$mrc_status_response['data'] = $this->Run_model->checkMrcStatusSetService($data_trap);
						//echo '<script type="text/javascript">alert("'.$ovi_status_response['data'].'");</script>';
						if ($mrc_status_response['data'] <> 0) {
							$mrc_status_invalid_errors['data'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$mrc_status_invalid_errors['data'][$b - 1]['error'] = "invalid status";
							$error_log['invalid_status'][$b - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['invalid_status'][$b - 1]['error'] = "invalid status";
						}
					}
					$b = $b + 1;
				}

				$handle = fopen($file, "r");
				$d = 0;
				while (($filesop3 = fgetcsv($handle, 1000, ",")) !== false) {
					if ($d <> 0) {
						//echo '<script type="text/javascript">alert("ok");</script>';
						$data_trap['trap_id'] = $filesop3[0];
						$mrc_run_status_response['data'] = $this->Run_model->checkMrcInPendingRun($data_trap);
						echo '<script type="text/javascript">alert("' . $mrc_run_status_response['data'] . '");</script>';
						if ($mrc_run_status_response['data'] <> 0) {
							$mrc_run_status_invalid_errors['data'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$mrc_run_status_invalid_errors['data'][$d - 1]['error'] = "trap is already in a pending run";
							$error_log['pending'][$d - 1]['trap_id'] = $data_trap['trap_id'];
							$error_log['pending'][$d - 1]['error'] = "Trap is already in a pending run";
						}
					}
					$d = $d + 1;
				}
				if (isset($mrc_run_status_invalid_errors['data']) || isset($mrc_status_invalid_errors['data'])
					|| isset($mrc_service_invalid_errors['data'])) {
					$this->load->view('field_run_error_log', $error_log);
				} else {
					$response_field_run = $this->Run_model->saveRecordsFieldRun($data);
					if ($response_field_run == true) {
						$mrc_data['mrc_run_id'] = $this->input->post('run-name');
						$mrc_data['mrc_run_type'] = "2";
						$response_mrc_field_run = $this->Run_model->saveRecordsMrcFieldRun($mrc_data);
						if ($response_mrc_field_run == true) {
							$k = 0;
							$handle = fopen($file, "r");
							while (($filesop4 = fgetcsv($handle, 1000, ",")) !== false) {
								if ($k <> 0) {
									$mrc_trap_data['mrc_trap_id'] = $filesop4[0];
									$mrc_trap_data['mrc_run_id'] = $this->input->post('run-name');
									$response_mrc_trap_data = $this->Run_model->saveRecordsMrcRunTraps($mrc_trap_data);

								}
								$k = $k + 1;
							}
							if ($response_mrc_trap_data == true) {
								echo "<script type='text/javascript'>alert('done');
								</script>";
							}
						}
					}
				}
			}


		} else {
			echo "<script type='text/javascript'>alert('Field run name is already ' +
 				'existing');
			</script>";
			$this->load->view('add_new_run');
		}
	}
}
