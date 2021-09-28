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
<div class="update-addresses-main-container">
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
					<li><a onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a></li>
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController'); ?>'">Field
							Activities</a></li>
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/addresses'); ?>'">Address</a>
					</li>
					<li><a class="selected">Update Address</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update Address</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form role="form" method="post" action="<?php echo
				site_url('FieldActivitiesController/saveUpdateAddress'); ?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Address Line1(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="add-line1" placeholder="Enter Full Name"
								   name="add-line1" required value="<?php echo $data[0]->add_line1 ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Address Line2(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="add-line2" placeholder="Enter Contact Number"
								   name="add-line2" required value="<?php echo $data[0]->add_line2 ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Location Description (*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="location-description"
								   placeholder="Enter Contact Number"
								   name="location-description" required value="<?php echo $data[0]->location_description ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Status (*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="location-status" name="location-status">
								<option <?php if ($data[0]->location_status == 'Active'): ?> selected="selected"<?php endif; ?>>
									Active
								</option>
								<option <?php if ($data[0]->location_status == 'Inactive'): ?> selected="selected"<?php endif; ?>>
									Inactive
								</option>
							</select>
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
								<button class="btn btn-success save-btn"  type="submit" name="save-btn" class="btn btn-success save-btn"
										value="<?php echo $data[0]->address_id ?>">Save</button>
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

