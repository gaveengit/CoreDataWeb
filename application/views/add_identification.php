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
<div class="add-identification-main-container">
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
	<div class="breadcrumb-main-container">
		<div class="container">
			<div class="row">
				<ul class="breadcrumb">
					<li><a href="#" onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a>
					</li>
					<li><a class="#" onclick="location.href='<?php echo site_url('DiagnosticsController'); ?>'">Mosquito
							Diagnostics</a></li>
					<li><a class="selected">Add New Mosquito Diagnostic</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New Mosquito Diagnostic</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('DiagnosticsController/saveIdentification'); ?>" onsubmit="return formvalidation()">
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Diagnostic Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="identification_id"
								   placeholder="Enter Diagnostic Id"
								   name="identification_id" required>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Collection Id:</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" name="collection_id" id="collection_id">
								<option value="0" selected disabled>Select From Here</option>
								<?php
								foreach ($bg_data as $row) {
									echo '
							<option value="' . $row->collection_id . '">' . $row->collection_id . '</option>
							';
								}
								?>
							</select>
							<div id="collectionid-error-container" style="display: none;color: red;"></div>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Diagnostic Count:</label>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Aedes Aegypti Count(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="aedes_male_count"
								   placeholder="Enter Male Aedes Aegypti Count"
								   name="aedes_male_count" value="0" required>
							<div id="maleaedes-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Aedes Aegypti Count(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="aedes_female_count"
								   placeholder="Enter female Aedes Aegypti Count"
								   name="aedes_female_count" value="0" required>
							<div id="femaleaedes-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Anopheles Count(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="male_anopheles_count"
								   placeholder="Enter Female Anopheles Count"
								   name="male_anopheles_count" value="0" required>
							<div id="maleanopheles-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Anopheles Count(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="female_anopheles_count"
								   placeholder="Enter Female Anopheles Count"
								   name="female_anopheles_count" value="0" required>
							<div id="femaleanopheles-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Culex Count(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="culex_male_count"
								   placeholder="Enter Male Culex Count"
								   name="culex_male_count" value="0" required>
							<div id="maleculex-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Culex Count(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="culex_female_count"
								   placeholder="Enter Female Culex Count"
								   name="culex_female_count" value="0" required>
							<div id="femaleculex-error-container" style="display: none;color: red;"></div>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Identified Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="identified_date" name="identified_date" class="form-control" max="<?php echo date("Y-m-d"); ?>"
								   required>
							<div id="identified-date-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Identified Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="identified_time" name="identified_time" class="form-control"
								   required>
						</div>
					</div>

					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" type="submit" name="save-btn">Save</button>
								<button class="btn btn-primary cancel-btn" type="reset" name="cancel-btn">Cancel
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function formvalidation() {
		var error_flag = 0;
		var aedes_male_count = document.getElementById("aedes_male_count").value;
		var aedes_female_count = document.getElementById("aedes_female_count").value;
		var anopheles_male_count = document.getElementById("male_anopheles_count").value;
		var anopheles_female_count = document.getElementById("female_anopheles_count").value;
		var culex_male_count = document.getElementById("culex_male_count").value;
		var culex_female_count = document.getElementById("culex_female_count").value;
		var collection_id = document.getElementById("collection_id").value;

		document.getElementById("maleaedes-error-container").style.display = 'none';
		document.getElementById("femaleaedes-error-container").style.display = 'none';
		document.getElementById("maleanopheles-error-container").style.display = 'none';
		document.getElementById("femaleanopheles-error-container").style.display = 'none';
		document.getElementById("maleculex-error-container").style.display = 'none';
		document.getElementById("femaleculex-error-container").style.display = 'none';
		document.getElementById("collectionid-error-container").style.display = 'none';

		document.getElementById("aedes_male_count").style.borderColor = "#ccc";
		document.getElementById("aedes_female_count").style.borderColor = "#ccc";
		document.getElementById("male_anopheles_count").style.borderColor = "#ccc";
		document.getElementById("female_anopheles_count").style.borderColor = "#ccc";
		document.getElementById("culex_male_count").style.borderColor = "#ccc";
		document.getElementById("culex_female_count").style.borderColor = "#ccc";
		document.getElementById("collection_id").style.borderColor = "#ccc";

		if(collection_id==false){
			error_flag = 1;
			document.getElementById("collection_id").style.borderColor = "red";
			document.getElementById("collectionid-error-container").style.display = 'block';
			document.getElementById("collectionid-error-container").innerHTML = "Please select a collection id.";

		}
		if (aedes_male_count < 0) {
			error_flag = 1;
			document.getElementById("aedes_male_count").style.borderColor = "red";
			document.getElementById("maleaedes-error-container").style.display = 'block';
			document.getElementById("maleaedes-error-container").innerHTML = "count cannot be a negative value.";
		}
		if (aedes_female_count < 0) {
			error_flag = 1;
			document.getElementById("aedes_female_count").style.borderColor = "red";
			document.getElementById("femaleaedes-error-container").style.display = 'block';
			document.getElementById("femaleaedes-error-container").innerHTML = "count cannot be a negative value..";
		}
		if (anopheles_male_count < 0) {
			error_flag = 1;
			document.getElementById("male_anopheles_count").style.borderColor = "red";
			document.getElementById("maleanopheles-error-container").style.display = 'block';
			document.getElementById("maleanopheles-error-container").innerHTML = "count cannot be a negative value..";
		}
		if (anopheles_female_count < 0) {
			error_flag = 1;
			document.getElementById("female_anopheles_count").style.borderColor = "red";
			document.getElementById("femaleanopheles-error-container").style.display = 'block';
			document.getElementById("femaleanopheles-error-container").innerHTML = "count cannot be a negative value..";
		}
		if (culex_male_count < 0) {
			error_flag = 1;
			document.getElementById("culex_male_count").style.borderColor = "red";
			document.getElementById("maleculex-error-container").style.display = 'block';
			document.getElementById("maleculex-error-container").innerHTML = "count cannot be a negative value..";
		}
		if (culex_female_count < 0) {
			error_flag = 1;
			document.getElementById("culex_female_count").style.borderColor = "red";
			document.getElementById("femaleculex-error-container").style.display = 'block';
			document.getElementById("femaleculex-error-container").innerHTML = "count cannot be a negative value..";
		}
		if (error_flag == 1) {
			return false;
		} else {
			return true;
		}

	}
</script>
</body>
</html>

