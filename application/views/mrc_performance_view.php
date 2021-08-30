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
				url: "<?php echo site_url('ReportController/getMrcData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonData);
			// Create our data table out of JSON data loaded from server.
			var data = new google.visualization.DataTable(jsonData);

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			var _chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			_chart.draw(data, {width: 500, height: 250});


			var jsonData2 = $.ajax({
				url: "<?php echo site_url('ReportController/getMrcData2'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonData);
			// Create our data table out of JSON data loaded from server.
			var data = new google.visualization.DataTable(jsonData2);

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div_2'));
			var _chart = new google.visualization.PieChart(document.getElementById('chart_div_2'));
			_chart.draw(data, {width: 500, height: 250});


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
					<li><a class="selected">MRC Performance Report</a></li>
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
								<h3 align="center">MRC Performance Report</h3>
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
								<h4 align="center">New MRC Locations</h4>
							</div>
						</div>
					</div>
					<div class="date-container clearfix">
						<div>
							<table style="border-collapse: collapse;width:100%;">
								<thead>
								<tr style="border-bottom: 1px solid ;background-color: greenyellow;">
									<th></th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Count</th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Percentage</th>
								</tr>
								</thead>
								<tbody>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Proposed traps</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->proposed_count; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->proposed_percentage; ?></td>
								</tr>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Set traps</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->set_count; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->set_percentage; ?></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div style="text-align: center;">
							<div id="chart_div"></div>
						</div>
					</div>
					<div class="title-container">
						<div class="container">
							<div class="row">
								<h4 align="center">MRC Exclusions and Replacements</h4>
							</div>
						</div>
					</div>
					<div class="date-container clearfix">
						<div>
							<table style="border-collapse: collapse;width:100%;">
								<thead>
								<tr style="border-bottom: 1px solid ;background-color: greenyellow;">
									<th></th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Count</th>
									<th style="padding-top: 15px;padding-bottom: 15px;">Percentage</th>
								</tr>
								</thead>
								<tbody>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Replacements
									</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->replace_count; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->replace_percentage; ?></td>
								</tr>
								<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
									<td style="padding-top: 15px;padding-bottom: 15px;">Exclusions</td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->exclude_count; ?></td>
									<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->exclude_percentage; ?></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div style="text-align: center;">
							<div id="chart_div_2"></div>
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





