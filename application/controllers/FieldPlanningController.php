<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FieldPlanningController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->model('Run_model');
	}

	public function index()
	{
		$result['ovi_data'] = $this->Run_model->display_records_ovi();
		$result['bg_data'] = $this->Run_model->display_records_bg();
		$result['mrc_data'] = $this->Run_model->display_records_mrc();
		$this->load->view('field_runs_list', $result);
	}
	public function addNewRun()
	{
		$this->load->view('add_new_run');
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
	public function viewRun()
	{
		$this->load->view('view_run');
	}
	public function viewRunMap()
	{
		$this->load->view('view_run_map');
	}


}



