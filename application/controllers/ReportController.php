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
	}

	public function index()
	{
		$this->load->view('report_menu');
	}
	public function goOviPerformanceReportGenerate()
	{
		$this->load->view('ovi_performance_generate');
	}
	public function goOviPerformanceReportView()
	{
		$this->load->view('ovi_performance_view');
		// Get output html
		/*
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		// Load HTML content
		$this->dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
		*/
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
					"v" => "proposed",
					"f" => null
				) ,
				array(
					"v" => (int)20,
					"f" => null
				)
			);
		$responce->rows[]["c"] = array(
			array(
				"v" => "set",
				"f" => null
			) ,
			array(
				"v" => (int)80,
				"f" => null
			)
		);

		echo json_encode($responce);

	}

	function getdata2()
	{
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
				"v" => "Exclusions with Replacements",
				"f" => null
			) ,
			array(
				"v" => (int)40,
				"f" => null
			)
		);
		$responce->rows[]["c"] = array(
			array(
				"v" => "Exclusions without Replacements",
				"f" => null
			) ,
			array(
				"v" => (int)60,
				"f" => null
			)
		);

		echo json_encode($responce);

	}
}


