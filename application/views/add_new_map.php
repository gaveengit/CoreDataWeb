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
</head>
<body>
<div class="add-map-layer-main-section">
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
					<li><a onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a></li>
					<li><a class="#" onclick="location.href='<?php echo site_url('SpatialDataController'); ?>'">Spatial
							Data</a></li>
					<li><a class="selected">Add New Map Layer</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title">
						Add New Map Layer
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<div class="form-container">
					<form method="post" enctype="multipart/form-data" name="upload_map"
						  action="<?php echo
						  site_url('SpatialDataController/uploadMap');?>" onsubmit="return formValidation()">
						<div class="form-group clearfix">
							<label class="control-label col-md-2" for="email">Name:(*)</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="map-name" placeholder="Enter Map Name"
									   name="map-name">
							</div>

						</div>

						<div class="form-group clearfix">
							<label class="control-label col-md-2" for="email">Description:(*)</label>
							<div class="col-md-5">
							<textarea class="form-control map-description" id="map-description" placeholder="Enter Map Description"
									  name="map-description"></textarea>
							</div>

						</div>
						<div class="form-group clearfix">
							<label class="control-label col-md-2" for="email">Add GeoJson Content Here:(*)</label>
							<div class="col-md-5">
								<textarea id="geojson-content" name="geojson-content"
										  style="height: 300px;" class="form-control"></textarea>
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
								<button class="btn btn-success save-btn" type="submit" name="save-btn">Save</button>
								<button class="btn btn-primary cancel-btn" type="reset">Cancel</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.getElementById("error-msg").innerHTML = "";
	function formValidation() {
		document.getElementById("error-msg").innerHTML = "";
		var map_name = document.getElementById("map-name").value;
		var map_description = document.getElementById("map-description").value;
		var file = document.getElementById("geojson-content").value;
		if (map_name.length == 0 || map_description.length == 0 || file.length==0) {
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
