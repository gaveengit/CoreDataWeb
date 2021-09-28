<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
</head>
<body>
<div class="main-menu-main-section">
	<div class="home-header-main">
		<div class="container">
			<div class="row">
				<div class="home-header clearfix">
					<div class="logo-container"></div>
					<div class="logout-container-main clearfix">
						<div class="logout-container-secondary">
							<div class="user-name-container">
								<span style="cursor:default;"><?php echo $this->session->userdata('logged_user_username') ?></span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="user-name-container"
								 onclick="location.href='<?php echo site_url('UserController/updateUsers/') . $this->session->userdata('logged_user_id') ?>'">
								<span>View Profile</span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="logout-text-container"
								 onclick="location.href='<?php echo site_url('UserController/signOut'); ?>'">
								<span> Sign Out</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-item-main">
		<div class="container">
			<div class="row">
				<div class="menu-item-secondary clearfix">
					<div class="col-md-4" id="spatial-data-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('SpatialDataController/index'); ?>'">
							<span class="item">Spatial Data</span>
						</div>
					</div>
					<div class="col-md-4" id="field-planning-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('FieldPlanningController/index'); ?>'">
							<span class="item">Field Planning</span>
						</div>
					</div>
					<div class="col-md-4" id="field-activities-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('FieldActivitiesController/index'); ?>'">
							<span class="item">Field Activities</span>
						</div>
					</div>

					<div class="col-md-4" id="incident-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('IncidentController/index'); ?>'">
							<span class="item">Field Incidents</span>
						</div>
					</div>
					<div class="col-md-4" id="diagnostics-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('DiagnosticsController/index'); ?>'">
							<span class="item">Mosquito Diagnostics</span>
						</div>
					</div>
					<div class="col-md-4" id="screening-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('ScreeningController/index'); ?>'">
							<span class="item">Screening Results</span>
						</div>
					</div>
					<div class="col-md-4" id="export-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('ExportController/index'); ?>'">
							<span class="item">Bio-Banking Exports</span>
						</div>
					</div>
					<div class="col-md-4" id="report-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('ReportController/index'); ?>'">
							<span class="item">Reports</span>
						</div>
					</div>
					<div class="col-md-4" id="dashboard-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('DashboardController/index'); ?>'">
							<span class="item">Dashboards</span>
						</div>
					</div>

					<div class="col-md-4" id="user-tab">
						<div class="item-container"
							 onclick="location.href='<?php echo site_url('UserController/index'); ?>'">
							<span class="item">User Management</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var user_type = <?php echo $this->session->userdata('logged_user_usertype');?>;
	if (user_type == '3') {
		document.getElementById("incident-tab").style.display = 'none';
		document.getElementById("diagnostics-tab").style.display = 'none';
		document.getElementById("screening-tab").style.display = 'none';
		document.getElementById("export-tab").style.display = 'none';
		document.getElementById("user-tab").style.display = 'none';
	}
	if (user_type == '4') {
		document.getElementById("diagnostics-tab").style.display = 'none';
		document.getElementById("screening-tab").style.display = 'none';
		document.getElementById("export-tab").style.display = 'none';
		document.getElementById("user-tab").style.display = 'none';
		document.getElementById("spatial-data-tab").style.display = 'none';
		document.getElementById("field-planning-tab").style.display = 'none';
		document.getElementById("field-activities-tab").style.display = 'none';

	}
	if (user_type == '5') {
		document.getElementById("incident-tab").style.display = 'none';
		document.getElementById("screening-tab").style.display = 'none';
		document.getElementById("export-tab").style.display = 'none';
		document.getElementById("user-tab").style.display = 'none';
		document.getElementById("spatial-data-tab").style.display = 'none';
		document.getElementById("field-planning-tab").style.display = 'none';
		document.getElementById("field-activities-tab").style.display = 'none';

	}
	if (user_type == '6') {
		document.getElementById("incident-tab").style.display = 'none';
		document.getElementById("diagnostics-tab").style.display = 'none';
		document.getElementById("export-tab").style.display = 'none';
		document.getElementById("user-tab").style.display = 'none';
		document.getElementById("spatial-data-tab").style.display = 'none';
		document.getElementById("field-planning-tab").style.display = 'none';
		document.getElementById("field-activities-tab").style.display = 'none';

	}

</script>
</body>
</html>
