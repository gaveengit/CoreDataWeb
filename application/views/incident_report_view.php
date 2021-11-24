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
				url: "<?php echo site_url('ReportController/getIncidentData'); ?>",
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
					<li><a href="#" onclick="location.href='<?php echo site_url('ReportController'); ?>'">Reports
							Menu</a></li>
					<li><a class="selected">Incident Report</a></li>
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
								<h3 align="center">Incident Report</h3>
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
					<div class="date-container clearfix">
						<div>
							<table>
								<thead>
								<tr class="grey-background">
									<th>Priority</th>
									<th>Count</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$i = 1;
								foreach ($data as $row) {
									if (($i % 2) != 0) {
										echo "<tr class='white-background'>";
											if($row->priority=='1') {
												echo "<td>" . "High" . "</td>";
												echo "<td>" . $row->incident_count . "</td>";
											}
										if($row->priority=='3') {
											echo "<td>" . "Low" . "</td>";
											echo "<td>" . $row->incident_count . "</td>";
										}

										echo "</tr>";
										$i++;
									} else {
										echo "<tr class='grey-background'>";
										if($row->priority=='1') {
											echo "<td>" . "High" . "</td>";
											echo "<td>" . $row->incident_count . "</td>";
										}
										if($row->priority=='3') {
											echo "<td>" . "Low" . "</td>";
											echo "<td>" . $row->incident_count . "</td>";
										}
											echo "</tr>";
										$i++;
									}


								}

								?>
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






