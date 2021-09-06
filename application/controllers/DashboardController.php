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
		$this->load->view('gis_dashboard',$result);
	}
	public function loadGisDashboard(){
		$data['field_type'] = $this->input->post('field_type');
		$data['run_name'] = $this->input->post('run_name');
		if($data['run_name']=='0' && $data['field_type']!='0'){
			if($data['field_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->BgTrap_model->display_records_all();
				$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='1';
				$result['run_name'] = $data['run_name'];
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->OvTrap_model->display_records_all();
				$result['rundata'] = $this->Run_model->display_records_ovi();
				$result['field_type']='2';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='3'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->Mrc_model->display_records_all();
				$result['rundata'] = $this->Run_model->display_records_mrc();
				$result['field_type']='3';
				$this->load->view('gis_dashboard',$result);
			}

		}
		if($data['run_name']!='0' && $data['field_type']!='0'){
			if($data['field_type']=='1'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->Run_model->display_bg_run_coordinates($data['run_name']);
				$result['rundata'] = $this->Run_model->display_records_bg();
				$result['field_type']='1';
				$result['run_name'] = $data['run_name'];
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='2'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->OvTrap_model->display_records_all();
				$result['rundata'] = $this->Run_model->display_records_ovi();
				$result['field_type']='2';
				$this->load->view('gis_dashboard',$result);
			}
			if($data['field_type']=='3'){
				$result['mapdata'] = $this->Maps_model->display_records_all();
				$result['markerdata'] = $this->Mrc_model->display_records_all();
				$result['rundata'] = $this->Run_model->display_records_mrc();
				$result['field_type']='3';
				$this->load->view('gis_dashboard',$result);
			}

		}
	}

}

