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
					<li><a class="#" onclick="location.href='<?php echo site_url('SpatialDataController'); ?>'">Spatial
							Data</a></li>
					<li><a class="selected">Update Map Layer</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title">
						Update Map Layer
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<div class="form-container">
					<form role="form" method="post" action="<?php echo
					site_url('SpatialDataController/saveUpdateMap'); ?>" onSubmit="return formValidation()">
						<div class="form-group clearfix">
							<label class="control-label col-md-2" for="email">Name:(*)</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="map-name" placeholder="Enter Map Name"
									   name="map-name" value="<?php echo $data[0]->name ?>">
							</div>

						</div>

						<div class="form-group clearfix">
							<label class="control-label col-md-2" for="email">Description:(*)</label>
							<div class="col-md-5">
							<textarea class="form-control map-description" id="map-description"
									  placeholder="Enter Map Description"
									  name="map-description"><?php echo $data[0]->description ?></textarea>
							</div>

						</div>
						<div class="form-group clearfix">
							<label class="control-label col-md-2" for="email">Include geoJson Content Here:(*)</label>
							<div class="col-md-5">
						<textarea class="form-control map-description" id="geojson-content"
								  placeholder="Enter Map Description"
								  name="geojson-content"><?php echo $data[0]->geojson_content ?></textarea>
							</div>
						</div>
						<div class="element-row clearfix">
							<div class="col-md-2">
								<label class="control-label">Status:(*)</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" id="map-status" name="map-status">
									<option <?php if ($data[0]->map_status == 'Active'): ?> selected="selected"<?php endif; ?>>
										Active
									</option>
									<option <?php if ($data[0]->map_status == 'Inactive'): ?> selected="selected"<?php endif; ?>>
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
								<button class="btn btn-success save-btn" name="save-btn"
								value="<?php echo $data[0]->map_id ?>">Save</button>
								<button class="btn btn-primary cancel-btn">Cancel</button>
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

