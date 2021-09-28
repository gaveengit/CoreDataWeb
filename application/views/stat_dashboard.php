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


			var jsonDataOvi = $.ajax({
				url: "<?php echo site_url('DashboardController/getOviData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonDataOvi);
			// Create our data table out of JSON data loaded from server.
			var data_ovi = new google.visualization.DataTable(jsonDataOvi);

			// Instantiate and draw our chart, passing in some options.
			var _chart_ovi = new google.visualization.PieChart(document.getElementById('ovi_div'));
			_chart_ovi.draw(data_ovi, {width: 550, height: 400});

			var jsonDataBg = $.ajax({
				url: "<?php echo site_url('DashboardController/getBgData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonDataBg);
			// Create our data table out of JSON data loaded from server.
			var data_bg = new google.visualization.DataTable(jsonDataBg);

			// Instantiate and draw our chart, passing in some options.
			var _chart_bg = new google.visualization.PieChart(document.getElementById('bg_div'));
			_chart_bg.draw(data_bg, {width: 550, height: 400});

			var jsonDataMrc = $.ajax({
				url: "<?php echo site_url('DashboardController/getMrcData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonDataMrc);
			// Create our data table out of JSON data loaded from server.
			var data_mrc = new google.visualization.DataTable(jsonDataMrc);

			// Instantiate and draw our chart, passing in some options.
			var _chart_mrc = new google.visualization.PieChart(document.getElementById('mrc_div'));
			_chart_mrc.draw(data_mrc, {width: 550, height: 400});


			var jsonDataDiagnostic = $.ajax({
				url: "<?php echo site_url('DashboardController/getDiagnosticData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonDataDiagnostic);
			// Create our data table out of JSON data loaded from server.
			var data_diagnostic = new google.visualization.DataTable(jsonDataDiagnostic);

			// Instantiate and draw our chart, passing in some options.
			var _chart_diagnostic = new google.visualization.PieChart(document.getElementById('diagnostic_div'));
			_chart_diagnostic.draw(data_diagnostic, {width: 550, height: 400});


			var jsonDataScreening = $.ajax({
				url: "<?php echo site_url('DashboardController/getScreeningData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonDataScreening);
			// Create our data table out of JSON data loaded from server.
			var data_screening = new google.visualization.DataTable(jsonDataScreening);

			// Instantiate and draw our chart, passing in some options.
			var _chart_screening = new google.visualization.PieChart(document.getElementById('screening_div'));
			_chart_screening.draw(data_screening, {width: 550, height: 400});


			var jsonDataIncident = $.ajax({
				url: "<?php echo site_url('DashboardController/getIncidentData'); ?>",
				dataType: "json",
				async: false,
			}).responseText;
			console.log(jsonDataIncident);
			// Create our data table out of JSON data loaded from server.
			var data_incident = new google.visualization.DataTable(jsonDataIncident);

			// Instantiate and draw our chart, passing in some options.
			var _chart_incident = new google.visualization.PieChart(document.getElementById('incident_div'));
			_chart_incident.draw(data_incident, {width: 550, height: 400});


		}


	</script>
</head>
<body style="padding-bottom: 20px;">
<div class="field-activities-main-menu-section">
	<div class="home-header-main">
		<div class="container">
			<div class="row">
				<div class="home-header clearfix">
					<div class="logo-container"></div>
					<div class="logout-container-main clearfix">
						<div class="logout-container-secondary">
							<div class="user-name-container">
								<span style="cursor:default;"><?php echo $this -> session -> userdata('logged_user_username') ?></span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="user-name-container" onclick="location.href='<?php echo site_url('UserController/updateUsers/').$this -> session -> userdata('logged_user_id') ?>'">
								<span>View Profile</span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="logout-text-container"  onclick="location.href='<?php echo site_url('UserController/signOut'); ?>'">
								<span> Sign Out</span>
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
					<li><a href="#" onclick="location.href='<?php echo site_url('DashboardController'); ?>'">Dashboards</a>
					</li>
					<li><a class="selected">Statistical Dashboard</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Statistical Dashboard</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sub-title-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h4 class="title">OVI Collection Situation</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ovi-main-container">
		<div class="container">
			<div class="row">
				<div class="ovi-secondary-container clearfix">

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
								<td style="padding-top: 15px;padding-bottom: 15px;">Pending Collections</td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->ovi_pending_count; ?></td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->ovi_pending_percentage; ?></td>
							</tr>
							<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
								<td style="padding-top: 15px;padding-bottom: 15px;">Completed Collections</td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->ovi_complete_count; ?></td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->ovi_complete_percentage; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div style="text-align: center;">
						<div id="ovi_div"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="sub-title-main-container">
	<div class="container">
		<div class="row">
			<div class="title-button-secondary-container clearfix">
				<div class="title-container" style="padding-top: 20px;">
					<h4 class="title">BG Collection Situation</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-main-container">
	<div class="container">
		<div class="row">
			<div class="bg-secondary-container clearfix">
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
							<td style="padding-top: 15px;padding-bottom: 15px;">Pending Collections</td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->bg_pending_count; ?></td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->bg_pending_percentage; ?></td>
						</tr>
						<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
							<td style="padding-top: 15px;padding-bottom: 15px;">Completed Collections</td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->bg_complete_count; ?></td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->bg_complete_percentage; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div style="text-align: center;">
					<div id="bg_div"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sub-title-main-container">
	<div class="container">
		<div class="row">
			<div class="title-button-secondary-container clearfix">
				<div class="title-container" style="padding-top: 20px;">
					<h4 class="title">MRC Release Situation</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mrc-main-container">
	<div class="container">
		<div class="row">
			<div class="bg-secondary-container clearfix">
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
							<td style="padding-top: 15px;padding-bottom: 15px;">Pending Releases</td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->mrc_pending_count; ?></td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->mrc_pending_percentage; ?></td>
						</tr>
						<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
							<td style="padding-top: 15px;padding-bottom: 15px;">Completed Releases</td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->mrc_complete_count; ?></td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->mrc_complete_percentage; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div style="text-align: center;">
					<div id="mrc_div"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sub-title-main-container">
	<div class="container">
		<div class="row">
			<div class="title-button-secondary-container clearfix">
				<div class="title-container" style="padding-top: 20px;">
					<h4 class="title">Mosquito Diagnostics Situation</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="diagnostics-main-container">
	<div class="container">
		<div class="row">
			<div class="bg-secondary-container clearfix">
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
							<td style="padding-top: 15px;padding-bottom: 15px;">Pending Diagnostics</td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->diagnostic_pending_count; ?></td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->diagnostic_pending_percentage; ?></td>
						</tr>
						<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
							<td style="padding-top: 15px;padding-bottom: 15px;">Completed Diagnostics</td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->diagnostic_complete_count; ?></td>
							<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->diagnostic_complete_percentage; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div style="text-align: center;">
					<div id="diagnostic_div"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sub-title-main-container">
	<div class="container">
		<div class="row">
			<div class="title-button-secondary-container clearfix">
				<div class="title-container" style="padding-top: 20px;">
					<h4 class="title">Mosquito Screening Situation</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="screening-main-container">
	<div class="container">
		<div class="row">
			<div class="bg-secondary-container clearfix">
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
								<td style="padding-top: 15px;padding-bottom: 15px;">Pending Screenings</td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->screening_pending_count; ?></td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->screening_pending_percentage; ?></td>
							</tr>
							<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
								<td style="padding-top: 15px;padding-bottom: 15px;">Completed Screenings</td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->screening_complete_count; ?></td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->screening_complete_percentage; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
				<div style="text-align: center;">
					<div id="screening_div"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sub-title-main-container">
	<div class="container">
		<div class="row">
			<div class="title-button-secondary-container clearfix">
				<div class="title-container" style="padding-top: 20px;">
					<h4 class="title">Field Incidents Situation</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="incidents-main-container">
	<div class="container">
		<div class="row">
			<div class="bg-secondary-container clearfix">
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
								<td style="padding-top: 15px;padding-bottom: 15px;">Pending Incidents</td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->incident_pending_count; ?></td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->incident_pending_percentage; ?></td>
							</tr>
							<tr style="border-bottom: 0.5px solid ;background-color: lightgreen;">
								<td style="padding-top: 15px;padding-bottom: 15px;">Completed Incidents</td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->incident_complete_count; ?></td>
								<td style="padding-top: 15px;padding-bottom: 15px;"><?php echo $data[0]->incident_complete_percentage; ?></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div style="text-align: center;">
						<div id="incident_div"></div>
					</div>
			</div>
		</div>
	</div>
</div>

</div>
</body>
</html>
