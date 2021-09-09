<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Collection_model');
		$this->load->model('Identification_model');
		$this->load->model('Maps_model');
		$this->load->model('BgTrap_model');
		$this->load->model('OvTrap_model');
		$this->load->model('Mrc_model');
		$this->load->model('Run_model');
		$this->load->library("pagination");
	}

	public function index()
	{
		$this->load->view('dashboards_menu');
	}
	public function gisDashboard(){
		$result['mapdata'] = $this->Maps_model->display_records_all();
		//$result['markerdata'] = $this->BgTrap_model->display_records_all();
		$result['field_type']='0';
		$result['activity_type']='0';
		$result['run_name']='0';
		$this -> session -> set_userdata("dashboard_field_type",$result['field_type']);
		$this -> session -> set_userdata("dashboard_activity_type",$result['activity_type']);
		$this -> session -> set_userdata("dashboard_run_name",$result['run_name']);
		$this->load->view('gis_dashboard',$result);
	}
	public function loadGisDashboard(){
		$data['field_type'] = $this->input->post('field_type');
		$data['activity_type'] = $this->input->post('activity_type');
		$data['run_name'] = $this->input->post('run_name');
		$data['prev_field_type']= $this -> session -> userdata('dashboard_field_type');
		$data['prev_activity_type']= $this -> session -> userdata('dashboard_activity_type');
		$data['prev_run_name']= $this -> session -> userdata('dashboard_run_name');
		if($data['field_type'] != $data['prev_field_type']){
			if($data['field_type']=='0'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['field_type']='0';
				$result['activity_type']='0';
				$result['run_name']='0';
				$this -> session -> set_userdata("dashboard_field_type",$result['field_type']);
				$this -> session -> set_userdata("dashboard_activity_type",$result['activity_type']);
				$this -> session -> set_userdata("dashboard_run_name",$result['run_name']);
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->BgTrap_model->display_records_all();
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='1';
				//$result['run_name'] = $data['run_name'];
				$this -> session -> set_userdata("dashboard_field_type","1");
				$this -> session -> set_userdata("dashboard_activity_type","0");
				$this -> session -> set_userdata("dashboard_run_name","0");
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->OvTrap_model->display_records_all();
				//$result['rundata'] = $this->Run_model->display_records_ovi();
				$result['field_type']='2';
				$this -> session -> set_userdata("dashboard_field_type","2");
				$this -> session -> set_userdata("dashboard_activity_type","0");
				$this -> session -> set_userdata("dashboard_run_name","0");
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='3'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->Mrc_model->display_records_all();
				//$result['rundata'] = $this->Run_model->display_records_mrc();
				$result['field_type']='3';
				$this -> session -> set_userdata("dashboard_field_type","3");
				$this -> session -> set_userdata("dashboard_activity_type","0");
				$this -> session -> set_userdata("dashboard_run_name","0");
				$this->load->view('gis_dashboard',$result);
			}
		}
		else{
			if($data['activity_type'] != $data['prev_activity_type']){
				if($data['activity_type']=='0'){
					if($data['field_type']=='1'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->BgTrap_model->display_records_all();
						$result['field_type']='1';
						$result['activity_type']='0';
						$result['run_name']='0';
						$this -> session -> set_userdata("dashboard_field_type","1");
						$this -> session -> set_userdata("dashboard_activity_type","0");
						$this -> session -> set_userdata("dashboard_run_name","0");
						$this->load->view('gis_dashboard',$result);
					}
					if($data['field_type']=='2'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->OviTrap_model->display_records_all();
						$result['field_type']='2';
						$result['activity_type']='0';
						$result['run_name']='0';
						$this -> session -> set_userdata("dashboard_field_type","2");
						$this -> session -> set_userdata("dashboard_activity_type","0");
						$this -> session -> set_userdata("dashboard_run_name","0");
						$this->load->view('gis_dashboard',$result);
					}
					if($data['field_type']=='3'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Mrc_model->display_records_all();
						$result['field_type']='3';
						$result['activity_type']='0';
						$result['run_name']='0';
						$this -> session -> set_userdata("dashboard_field_type","3");
						$this -> session -> set_userdata("dashboard_activity_type","0");
						$this -> session -> set_userdata("dashboard_run_name","0");
						$this->load->view('gis_dashboard',$result);
					}

				}
				if($data['field_type']=='1' && $data['activity_type']=='1'){
					$result['mapdata'] = $this->Maps_model->display_records_all();
					$result['markerdata'] = $this->BgTrap_model->display_records_all();
					$result['rundata'] = $this->Run_model->display_all_bg_service_runs();
					$result['field_type']='1';
					$result['activity_type']='1';
					$this -> session -> set_userdata("dashboard_field_type","1");
					$this -> session -> set_userdata("dashboard_activity_type","1");
					$this -> session -> set_userdata("dashboard_run_name","0");
					$this->load->view('gis_dashboard',$result);
				}
				if($data['field_type']=='1' && $data['activity_type']=='2'){
					$result['mapdata'] = $this->Maps_model->display_records_all();
					$result['markerdata'] = $this->BgTrap_model->display_records_all();
					$result['rundata'] = $this->Run_model->display_all_bg_collection_runs();
					$result['field_type']='1';
					$result['activity_type']='2';
					$this -> session -> set_userdata("dashboard_field_type","1");
					$this -> session -> set_userdata("dashboard_activity_type","2");
					$this -> session -> set_userdata("dashboard_run_name","0");
					$this->load->view('gis_dashboard',$result);
				}
				if($data['field_type']=='2' && $data['activity_type']=='1'){
					$result['mapdata'] = $this->Maps_model->display_records_all();
					$result['markerdata'] = $this->OvTrap_model->display_records_all();
					$result['rundata'] = $this->Run_model->display_all_ovi_service_runs();
					$result['field_type']='2';
					$result['activity_type']='1';
					$this -> session -> set_userdata("dashboard_field_type","2");
					$this -> session -> set_userdata("dashboard_activity_type","1");
					$this -> session -> set_userdata("dashboard_run_name","0");
					$this->load->view('gis_dashboard',$result);
				}
				if($data['field_type']=='2' && $data['activity_type']=='2'){
					$result['mapdata'] = $this->Maps_model->display_records_all();
					$result['markerdata'] = $this->OvTrap_model->display_records_all();
					$result['rundata'] = $this->Run_model->display_all_ovi_collection_runs();
					$result['field_type']='2';
					$result['activity_type']='2';
					$this -> session -> set_userdata("dashboard_field_type","2");
					$this -> session -> set_userdata("dashboard_activity_type","2");
					$this -> session -> set_userdata("dashboard_run_name","0");
					$this->load->view('gis_dashboard',$result);
				}
				if($data['field_type']=='3' && $data['activity_type']=='1'){
					$result['mapdata'] = $this->Maps_model->display_records_all();
					$result['markerdata'] = $this->Mrc_model->display_records_all();
					$result['rundata'] = $this->Run_model->display_all_mrc_service_runs();
					$result['field_type']='3';
					$result['activity_type']='1';
					$this -> session -> set_userdata("dashboard_field_type","3");
					$this -> session -> set_userdata("dashboard_activity_type","1");
					$this -> session -> set_userdata("dashboard_run_name","0");
					$this->load->view('gis_dashboard',$result);
				}
				if($data['field_type']=='3' && $data['activity_type']=='2'){
					$result['mapdata'] = $this->Maps_model->display_records_all();
					$result['markerdata'] = $this->Mrc_model->display_records_all();
					$result['rundata'] = $this->Run_model->display_all_mrc_release_runs();
					$result['field_type']='3';
					$result['activity_type']='2';
					$this -> session -> set_userdata("dashboard_field_type","3");
					$this -> session -> set_userdata("dashboard_activity_type","2");
					$this -> session -> set_userdata("dashboard_run_name","0");
					$this->load->view('gis_dashboard',$result);
				}

			}
			else{
				if($data['run_name'] != $data['prev_run_name']){
					if($data['run_name']=='0'){
						if($data['field_type']=='1' && $data['activity_type']=='1'){
							$result['mapdata'] = $this->Maps_model->display_records_all();
							$result['markerdata'] = $this->BgTrap_model->display_records_all();
							$result['rundata'] = $this->Run_model->display_all_bg_service_runs();
							$result['field_type']='1';
							$result['activity_type']='1';
							$result['run_name']=$data['run_name'];
							$this -> session -> set_userdata("dashboard_field_type","1");
							$this -> session -> set_userdata("dashboard_activity_type","1");
							$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
							$this->load->view('gis_dashboard',$result);
						}
						if($data['field_type']=='1' && $data['activity_type']=='2'){
							$result['mapdata'] = $this->Maps_model->display_records_all();
							$result['markerdata'] = $this->BgTrap_model->display_records_all();
							$result['rundata'] = $this->Run_model->display_all_bg_collection_runs();
							$result['field_type']='1';
							$result['activity_type']='2';
							$result['run_name']=$data['run_name'];
							$this -> session -> set_userdata("dashboard_field_type","1");
							$this -> session -> set_userdata("dashboard_activity_type","2");
							$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
							$this->load->view('gis_dashboard',$result);
						}
						if($data['field_type']=='2' && $data['activity_type']=='1'){
							$result['mapdata'] = $this->Maps_model->display_records_all();
							$result['markerdata'] = $this->OviTrap_model->display_records_all();
							$result['rundata'] = $this->Run_model->display_all_ovi_service_runs();
							$result['field_type']='2';
							$result['activity_type']='1';
							$result['run_name']=$data['run_name'];
							$this -> session -> set_userdata("dashboard_field_type","2");
							$this -> session -> set_userdata("dashboard_activity_type","1");
							$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
							$this->load->view('gis_dashboard',$result);
						}
						if($data['field_type']=='2' && $data['activity_type']=='2'){
							$result['mapdata'] = $this->Maps_model->display_records_all();
							$result['markerdata'] = $this->OviTrap_model->display_records_all();
							$result['rundata'] = $this->Run_model->display_all_ovi_collection_runs();
							$result['field_type']='2';
							$result['activity_type']='2';
							$result['run_name']=$data['run_name'];
							$this -> session -> set_userdata("dashboard_field_type","2");
							$this -> session -> set_userdata("dashboard_activity_type","2");
							$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
							$this->load->view('gis_dashboard',$result);
						}

						if($data['field_type']=='3' && $data['activity_type']=='1'){
							$result['mapdata'] = $this->Maps_model->display_records_all();
							$result['markerdata'] = $this->Mrc_model->display_records_all();
							$result['rundata'] = $this->Run_model->display_all_mrc_service_runs();
							$result['field_type']='3';
							$result['activity_type']='1';
							$result['run_name']=$data['run_name'];
							$this -> session -> set_userdata("dashboard_field_type","3");
							$this -> session -> set_userdata("dashboard_activity_type","1");
							$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
							$this->load->view('gis_dashboard',$result);
						}
						if($data['field_type']=='3' && $data['activity_type']=='2'){
							$result['mapdata'] = $this->Maps_model->display_records_all();
							$result['markerdata'] = $this->Mrc_model->display_records_all();
							$result['rundata'] = $this->Run_model->display_all_mrc_release_runs();
							$result['field_type']='3';
							$result['activity_type']='2';
							$result['run_name']=$data['run_name'];
							$this -> session -> set_userdata("dashboard_field_type","3");
							$this -> session -> set_userdata("dashboard_activity_type","2");
							$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
							$this->load->view('gis_dashboard',$result);
						}
					}
					if($data['field_type']=='1' && $data['activity_type']=='1'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Run_model->display_bg_service_run_coordinates($data['run_name']);
						$result['rundata'] = $this->Run_model->display_all_bg_service_runs();
						$result['field_type']='1';
						$result['activity_type']='1';
						$result['run_name']=$data['run_name'];
						$this -> session -> set_userdata("dashboard_field_type","1");
						$this -> session -> set_userdata("dashboard_activity_type","1");
						$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
						$this->load->view('gis_dashboard',$result);
					}
					if($data['field_type']=='1' && $data['activity_type']=='2'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Run_model->display_bg_collection_run_coordinates($data['run_name']);
						$result['rundata'] = $this->Run_model->display_all_bg_collection_runs();
						$result['field_type']='1';
						$result['activity_type']='2';
						$result['run_name']=$data['run_name'];
						$this -> session -> set_userdata("dashboard_field_type","1");
						$this -> session -> set_userdata("dashboard_activity_type","2");
						$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
						$this->load->view('gis_dashboard',$result);
					}
					if($data['field_type']=='2' && $data['activity_type']=='1'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Run_model->display_ovi_service_run_coordinates($data['run_name']);
						$result['rundata'] = $this->Run_model->display_all_ovi_service_runs();
						$result['field_type']='2';
						$result['activity_type']='1';
						$result['run_name']=$data['run_name'];
						$this -> session -> set_userdata("dashboard_field_type","2");
						$this -> session -> set_userdata("dashboard_activity_type","1");
						$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
						$this->load->view('gis_dashboard',$result);
					}
					if($data['field_type']=='2' && $data['activity_type']=='2'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Run_model->display_ovi_collection_run_coordinates($data['run_name']);
						$result['rundata'] = $this->Run_model->display_all_ovi_collection_runs();
						$result['field_type']='2';
						$result['activity_type']='2';
						$result['run_name']=$data['run_name'];
						$this -> session -> set_userdata("dashboard_field_type","2");
						$this -> session -> set_userdata("dashboard_activity_type","2");
						$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
						$this->load->view('gis_dashboard',$result);
					}

					if($data['field_type']=='3' && $data['activity_type']=='1'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Run_model->display_mrc_service_run_coordinates($data['run_name']);
						$result['rundata'] = $this->Run_model->display_all_mrc_service_runs();
						$result['field_type']='3';
						$result['activity_type']='1';
						$result['run_name']=$data['run_name'];
						$this -> session -> set_userdata("dashboard_field_type","3");
						$this -> session -> set_userdata("dashboard_activity_type","1");
						$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
						$this->load->view('gis_dashboard',$result);
					}
					if($data['field_type']=='3' && $data['activity_type']=='2'){
						$result['mapdata'] = $this->Maps_model->display_records_all();
						$result['markerdata'] = $this->Run_model->display_mrc_release_run_coordinates($data['run_name']);
						$result['rundata'] = $this->Run_model->display_all_mrc_release_runs();
						$result['field_type']='3';
						$result['activity_type']='2';
						$result['run_name']=$data['run_name'];
						$this -> session -> set_userdata("dashboard_field_type","3");
						$this -> session -> set_userdata("dashboard_activity_type","2");
						$this -> session -> set_userdata("dashboard_run_name",$data['run_name']);
						$this->load->view('gis_dashboard',$result);
					}

				}
			}
		}
		/*
		if($data['activity_type']=='0' && $data['field_type']!='0'){
			if($data['field_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->BgTrap_model->display_records_all();
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='1';
				//$result['run_name'] = $data['run_name'];
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->OvTrap_model->display_records_all();
				//$result['rundata'] = $this->Run_model->display_records_ovi();
				$result['field_type']='2';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='3'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->Mrc_model->display_records_all();
				//$result['rundata'] = $this->Run_model->display_records_mrc();
				$result['field_type']='3';
				$this->load->view('gis_dashboard',$result);
			}

		}
		*/
		/*
		if($data['activity_type']!='0' && $data['field_type']!='0' && $data['run_name']=='0'){
			if($data['field_type']=='1' && $data['activity_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				//$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='1';
				$result['activity_type']='1';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='1' && $data['activity_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				//$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='1';
				$result['activity_type']='2';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='2' && $data['activity_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				//$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='2';
				$result['activity_type']='1';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='2' && $data['activity_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				//$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='2';
				$result['activity_type']='2';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='3' && $data['activity_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				//$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='3';
				$result['activity_type']='1';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='3' && $data['activity_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				//$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				//$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='3';
				$result['activity_type']='2';
				$this->load->view('gis_dashboard',$result);
			}


		}
		*/
	}

}

