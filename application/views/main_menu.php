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
	<div class="menu-item-main">
		<div class="container">
			<div class="row">
				<div class="menu-item-secondary">
					<div class="item-record clearfix" onclick="">
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('SpatialDataController/index'); ?>'">
								<span class="item">Spatial Data</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('FieldPlanningController/index'); ?>'">
								<span class="item">Field Planning</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('FieldActivitiesController/index'); ?>'">
								<span class="item">Field Activities</span>
							</div>
						</div>
					</div>
					<div class="item-record clearfix">
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('IncidentController/index'); ?>'">
								<span class="item">Field Incidents</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('DiagnosticsController/index'); ?>'">
								<span class="item">Mosquito Diagnostics</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('ScreeningController/index'); ?>'">
								<span class="item">Screening Results</span>
							</div>
						</div>
					</div>
					<div class="item-record clearfix">
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('ExportController/index'); ?>'">
								<span class="item">Bio-Banking Exports</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('ReportController/index'); ?>'">
								<span class="item">Reports</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('DashboardController/index'); ?>'">
								<span class="item">Dashboards</span>
							</div>
						</div>
					</div>
					<div class="item-record clearfix">
						<div class="col-md-4">
							<div class="item-container"
								 onclick="location.href='<?php echo site_url('ExportController/index'); ?>'">
								<span class="item">User Management</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
