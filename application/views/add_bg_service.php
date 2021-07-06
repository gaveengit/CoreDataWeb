<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	/>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
</head>
<body>
<div class="add-bg-Collection-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController'); ?>'">Field
							Activities</a></li>
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/bgServices'); ?>'">BG
							Service</a></li>
					<li><a class="selected">Add BG Service</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New BG Service</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('FieldActivitiesController/saveBgService'); ?>">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Service Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="service-id" placeholder="Enter Service Id"
								   name="service-id">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">BG Trap Id(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="bg-trap-id"
									name="bg-trap-id">
								<option value="-1">Select From Here</option>
								<?php
								foreach ($trap_data as $row) {
									echo '
							<option value="' . $row->bg_trap_id . '">' . $row->bg_trap_id . '</option>
							';
								}
								?>

							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Servuce Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="service_date" name="service_date" class="form-control">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Service Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="service_time" name="service_time" class="form-control">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Service Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="service-status"
									name="service-status">
								<option value="1">Serviced</option>
								<option value="2">Not Serviced</option>
							</select>
						</div>
					</div>

					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" type="submit">Save</button>
								<button class="btn btn-primary cancel-btn" type="reset">Cancel</button>
							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>

