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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController'); ?>'">Field
							Activities</a></li>
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/bgCollections'); ?>'">BG
							Collections</a></li>
					<li><a class="selected">Add BG Collection</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New BG Collection</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('FieldActivitiesController/saveBgCollection'); ?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collection Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="collection-id" placeholder="Enter Collection Id"
								   name="collection-id" required>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">BG Trap Id(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="bg-trap-id"
									name="bg-trap-id">
								<option value="0" selected disabled>Select From Here</option>
								<?php
								foreach ($trap_data as $row) {
									echo '
							<option value="' . $row->bg_trap_id . '">' . $row->bg_trap_id . '</option>
							';
								}
								?>
							</select>
							<div id="trap-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collect Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="collect_date" name="collect-date" class="form-control" max="<?php echo date("Y-m-d"); ?>" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collect Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="collect_time" name="collect-time" class="form-control" required>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collection Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="collection-status"
									name="collection-status">
								<option value="0" selected disabled>Select From Here</option>
								<option value="1">Collected</option>
								<option value="2">Not Collected</option>
							</select>
							<div id="status-error-container" style="display: none;color: red;"></div>
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
<script type="text/javascript">
	function formValidation() {

		var trap_id = document.getElementById("bg-trap-id").value;
		var status = document.getElementById("collection-status").value;

		document.getElementById("trap-error-container").style.display = 'none';
		document.getElementById("status-error-container").style.display = 'none';
		document.getElementById("bg-trap-id").style.borderColor="#ccc";
		document.getElementById("collection-status").style.borderColor="#ccc";

		var error_flag = 0;
		if(trap_id==false){
			error_flag=1;
			document.getElementById("bg-trap-id").style.borderColor="red";
			document.getElementById("trap-error-container").style.display = 'block';
			document.getElementById("trap-error-container").innerHTML = "Please select a trap id.";
		}

		if(status==false){
			error_flag=1;
			document.getElementById("collection-status").style.borderColor="red";
			document.getElementById("status-error-container").style.display = 'block';
			document.getElementById("status-error-container").innerHTML = "Please select a status.";
		}


		if (error_flag==0) {
			return true;
		} else {
			return false;
		}
	}
</script>
</body>
</html>

