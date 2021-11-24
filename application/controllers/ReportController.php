<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

// Load url helper
		$this->load->helper('url');
		$this->load->helper('string');
		$this->load->model('Report_model');
	}

	public function index()
	{
		$this->load->view('report_menu');
	}
	public function goOviPerformanceReportGenerate()
	{
		$this->load->view('ovi_performance_generate');
	}
	public function goBgPerformanceReportGenerate()
	{
		$this->load->view('bg_performance_generate');
	}
	public function goIncidentReportGenerate()
	{
		$this->load->view('incident_performance_generate');
	}

	public function goMrcPerformanceReportGenerate()
	{
		$this->load->view('mrc_performance_generate');
	}
	public function goDiagnosticPerformanceReportGenerate()
	{
		$this->load->view('diagnostic_performance_generate');
	}
	public function goScreeningPerformanceReportGenerate()
	{
		$this->load->view('screening_performance_generate');
	}

	public function goOviPerformanceReportView()
	{
		$data['from_date']=$this->input->post('from-date');
		$data['to_date']=$this->input->post('to-date');
		$this -> session -> set_userdata("report_from_date",$data['from_date']);
		$this -> session -> set_userdata("report_to_date",$data['to_date']);
		$result['from_date']=$this->input->post('from-date');
		$result['to_date']=$this->input->post('to-date');
		$result['data'] = $this->Report_model->displayOviPerformanceReport($data);
		$this->load->view('ovi_performance_view',$result);
	}
	public function goIncidentsReportView()
	{
		$data['from_date']=$this->input->post('from-date');
		$data['to_date']=$this->input->post('to-date');
		$this -> session -> set_userdata("incident_from_date",$data['from_date']);
		$this -> session -> set_userdata("incident_to_date",$data['to_date']);
		$result['from_date']=$this->input->post('from-date');
		$result['to_date']=$this->input->post('to-date');
		$result['data'] = $this->Report_model->displayIncidentReport($data);
		$this->load->view('incident_report_view',$result);
	}
	public function goBgPerformanceReportView()
	{
		$data['from_date']=$this->input->post('from-date');
		$data['to_date']=$this->input->post('to-date');
		$this -> session -> set_userdata("report_from_date",$data['from_date']);
		$this -> session -> set_userdata("report_to_date",$data['to_date']);
		$result['from_date']=$this->input->post('from-date');
		$result['to_date']=$this->input->post('to-date');
		$result['data'] = $this->Report_model->displayBgPerformanceReport($data);
		$this->load->view('bg_performance_view',$result);
	}
	public function goMrcPerformanceReportView()
	{
		$data['from_date']=$this->input->post('from-date');
		$data['to_date']=$this->input->post('to-date');
		$this -> session -> set_userdata("report_from_date",$data['from_date']);
		$this -> session -> set_userdata("report_to_date",$data['to_date']);
		$result['from_date']=$this->input->post('from-date');
		$result['to_date']=$this->input->post('to-date');
		$result['data'] = $this->Report_model->displayMrcPerformanceReport($data);
		$this->load->view('mrc_performance_view',$result);
	}
	public function goDiagnosticPerformanceReportView()
	{
		$data['from_date']=$this->input->post('from-date');
		$data['to_date']=$this->input->post('to-date');
		$this -> session -> set_userdata("report_from_date",$data['from_date']);
		$this -> session -> set_userdata("report_to_date",$data['to_date']);
		$result['from_date']=$this->input->post('from-date');
		$result['to_date']=$this->input->post('to-date');
		$result['data'] = $this->Report_model->displayDiagnosticPerformanceReport($data);
		$this->load->view('diagnostic_performance_view',$result);
	}
	public function goScreeningPerformanceReportView()
	{
		$data['from_date']=$this->input->post('from-date');
		$data['to_date']=$this->input->post('to-date');
		$this -> session -> set_userdata("report_from_date",$data['from_date']);
		$this -> session -> set_userdata("report_to_date",$data['to_date']);
		$result['from_date']=$this->input->post('from-date');
		$result['to_date']=$this->input->post('to-date');
		$result['data'] = $this->Report_model->displayScreeningPerformanceReport($data);
		$this->load->view('screening_performance_view',$result);
	}
	public function toPdf(){
		// Load pdf library
		$this->load->library('pdf');

		// Load HTML content
		$html = '<link rel="stylesheet" href="bootstrap.min.css">';
		$html .= $_POST["hidden_html"];
		$this->dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));


	}
	function getdata()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayOviPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


			$responce->rows[]["c"] = array(
				array(
					"v" => "proposed traps",
					"f" => null
				) ,
				array(
					"v" => (float)$result['data'][0]->proposed_percentage,
					"f" => null
				)
			);
		$responce->rows[]["c"] = array(
			array(
				"v" => "set traps",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->set_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}

	function getdata2()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayOviPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


		$responce->rows[]["c"] = array(
			array(
				"v" => "Replacements",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->replace_percentage,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Exclusions",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->exclude_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}
	function getBgData()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayBgPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


		$responce->rows[]["c"] = array(
			array(
				"v" => "proposed traps",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->proposed_percentage,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "set traps",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->set_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}
	function getIncidentData()
	{
		$data['from_date']=$this -> session -> userdata('incident_from_date');
		$data['to_date']=$this -> session -> userdata('incident_to_date');
		$result['data'] = $this->Report_model->displayIncidentReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);

			$responce->rows[]["c"] = array(
				array(
					"v" => '',
					"f" => null
				),
				array(
					"v" => (float)$result['data'][0]->incident_count,
					"f" => null
				)
			);
		$responce->rows[]["c"] = array(
			array(
				"v" => '',
				"f" => null
			),
			array(
				"v" => (float)$result['data'][1]->incident_count,
				"f" => null
			)
		);

		echo json_encode($responce);

	}

	function getBgData2()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayBgPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


		$responce->rows[]["c"] = array(
			array(
				"v" => "Replacements",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->replace_percentage,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Exclusions",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->exclude_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}
	function getMrcData()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayMrcPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


		$responce->rows[]["c"] = array(
			array(
				"v" => "proposed traps",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->proposed_percentage,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "set traps",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->set_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}

	function getMrcData2()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayMrcPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Topping",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


		$responce->rows[]["c"] = array(
			array(
				"v" => "Replacements",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->replace_percentage,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Exclusions",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->exclude_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}

	function getDiagnosticData()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayDiagnosticPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Mosquito Category",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total Male",
			"pattern" => "",
			"type" => "number"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total Female",
			"pattern" => "",
			"type" => "number"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number"
		);


		$responce->rows[]["c"] = array(
			array(
				"v" => "Aedes aegypti",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->male_aedes_sum,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->female_aedes_sum,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->tot_aedes_sum,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Anopheles",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->male_anopheles_sum,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->female_anopheles_sum,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->tot_anopheles_sum,
				"f" => null
			)
		);

		$responce->rows[]["c"] = array(
			array(
				"v" => "Culex",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->male_culex_sum,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->female_culex_sum,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->tot_culex_sum,
				"f" => null
			)
		);


		echo json_encode($responce);

	}

	function getScreeningData()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayScreeningPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Mosquito Category",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Male Avg",
			"pattern" => "",
			"type" => "number"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Female Avg",
			"pattern" => "",
			"type" => "number"
		);

		$responce->rows[]["c"] = array(
			array(
				"v" => "Aedes aegypti",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->male_aedes_avg,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->female_aedes_avg,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Anopheles",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->male_anopheles_avg,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->female_anopheles_avg,
				"f" => null
			)
		);

		$responce->rows[]["c"] = array(
			array(
				"v" => "Culex",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->male_culex_avg,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->female_culex_avg,
				"f" => null
			)
		);


		echo json_encode($responce);

	}

	function getScreeningData2()
	{
		$data['from_date']=$this -> session -> userdata('report_from_date');
		$data['to_date']=$this -> session -> userdata('report_to_date');
		$result['data'] = $this->Report_model->displayScreeningPerformanceReport($data);

		$responce->cols[] = array(
			"id" => "",
			"label" => "Result Status",
			"pattern" => "",
			"type" => "string"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Count",
			"pattern" => "",
			"type" => "number"
		);
		$responce->cols[] = array(
			"id" => "",
			"label" => "Percentage",
			"pattern" => "",
			"type" => "number"
		);

		$responce->rows[]["c"] = array(
			array(
				"v" => "Pass",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->pass_count,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->pass_percentage,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Fail",
				"f" => null
			) ,
			array(
				"v" => (float)$result['data'][0]->fail_count,
				"f" => null
			),
			array(
				"v" => (float)$result['data'][0]->fail_percentage,
				"f" => null
			)
		);

		echo json_encode($responce);

	}



}


