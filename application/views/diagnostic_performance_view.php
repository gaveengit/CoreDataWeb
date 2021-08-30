<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
	<script type="text/javascript">
		var img_data;
		// Load the Visualization API and the piechart package.
		google.charts.load('current', {'packages': ['corechart']});

		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var jsonData = $.ajax({
				url: "<?php echo site_url('ReportController/getDiagnosticData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonData);
			// Create our data table out of JSON data loaded from server.
			var data = new google.visualization.DataTable(jsonData);

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
			var _chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
			_chart.draw(data, {width: 890, height: 350});

		}
		function printout() {

			var newWindow = window.open();
			newWindow.document.write(document.getElementById("menu-container-main").innerHTML);
			newWindow.print();
		}


	</script>
</head>
<body>
<div class="field-activities-main-menu-section">
	<div class="home-header-main">
		<div class="container">
			<div class="row">
				<div class="home-header clearfix">
					<div class="logo-container"></div>
					<div class="logout-container-main clearfix">
						<div class="logout-container-secondary">
							<div class="user-name-container">
								<span>Gaveen Kith</span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="logout-text-container">
								<span>Sign Out</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="breadcrumb-main-container">
		<div class="container">
			<div class="row">
				<ul class="breadcrumb">
					<li><a href="#" onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a>
					</li>
					<li><a href="#" onclick="location.href='<?php echo site_url('ReportController'); ?>'">Reports
							Menu</a></li>
					<li><a class="selected">Mosquito Diagnostic Report</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="menu-container-main" id="menu-container-main">
		<div class="container">
			<div class="row">
				<div class="menu-container-secondary clearfix">
					<div class="title-container">
						<div class="container">
							<div class="row">
								<h3 align="center">Mosquito Diagnostic Report</h3>
							</div>
						</div>
					</div>
					<div class="date-container clearfix">
						<div class="col-md-6" style="text-align: center;">
							<div class="form-group">
								<label for="email" style="font-size:15px;">Date From: <?php echo $from_date; ?></label>
							</div>
						</div>
						<div class="col-md-6" style="text-align: center;">
							<div class="form-group">
								<label for="email" style="font-size:15px;">Date To: <?php echo $to_date; ?></label>
							</div>
						</div>
					</div>
					<div class="title-container">
						<div class="container">
							<div class="row">
								<h4 align="center">New BG Trap Locations</h4>
							</div>
						</div>
					</div>
					<div class="date-container clearfix">
						<div>
							<table style="border-collapse: collapse;width:100%;">
								<thead>
								<tr style="border-bottom: 1px solid ;background-color: greenyellow;">
									<th>Mosquito Category</th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Male Total</th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Female Total</th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Total</th>
								</tr>
								</thead>
								<tbody>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Aedes aegypti</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->male_aedes_sum; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->female_aedes_sum; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->tot_aedes_sum; ?></td>
								</tr>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Anopheles</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->male_anopheles_sum; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->female_anopheles_sum; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->tot_anopheles_sum; ?></td>
								</tr>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Culex</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->male_culex_sum; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->female_culex_sum; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->tot_culex_sum; ?></td>
								</tr>

								</tbody>
							</table>
						</div>
						<div style="text-align: center;">
							<div id="chart_div"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row" style="text-align: center;">
			<button type="button" name="create_pdf" id="printer" class="btn btn-primary" onclick="printout()" style="padding-top: 15px;padding-bottom: 15px; width:20%;">Print Report
			</button>
		</div>
	</div>
</div>
</body>
</html>





