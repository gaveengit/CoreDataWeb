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
<div class="add-addresses-main-container">
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
					<li><a onclick="location.href='<?php echo site_url('MainMenuController');?>'">Home</a></li>
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController');?>'">Field Activities</a></li>
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController/addresses');?>'">Address</a></li>
					<li><a class="selected">
							Add New Address</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New Address</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form role="form" method="post" action="<?php echo
				site_url('FieldActivitiesController/saveAddress');?>" onSubmit="return formValidation()">
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Address Line 1(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="add-line1" placeholder="Enter Address Line1"
							   name="add-line1" required>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Address Line 2(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="add-line2" placeholder="Enter Address Line2"
							   name="add-line2" required>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Location Description (*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="location-description" placeholder="Location Description"
							   name="location-description" required>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
					</div>
					<div class="col-md-6">
						<div class="error-msg" id="error-msg"></div>
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
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.getElementById("error-msg").innerHTML = "";
	function formValidation() {
		document.getElementById("error-msg").innerHTML = "";
		var add_line1 = document.getElementById("add-line1").value;
		var add_line2 = document.getElementById("add-line2").value;
		var location_description = document.getElementById("location-description").value;

		if (add_line1.length == 0 || add_line2.length == 0) {
			document.getElementById("error-msg").innerHTML = "Please fill all required fields.";
			return false;
		} else {
			document.getElementById("error-msg").classList.add("error-msg-invisible");
			return true;
		}
	}
</script>
</body>
</html>

