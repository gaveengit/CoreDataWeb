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
<div class="update-screening-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('ScreeningController'); ?>'">Mosquito
							Screening</a></li>
					<li><a class="selected">Update Mosquito Screening Result</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update Mosquito Screening Result</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('ScreeningController/saveUpdateScreening'); ?>" onsubmit=" return formvalidation()">
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screening Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="screening_id"
								   placeholder="Enter Screening Id"
								   name="screening_id" value="<?php echo $data[0]->screening_id ?>" readonly>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Diagnostic Id:</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" name="identification_id" id="identification_id">

								<option value="<?php echo $data[0]->identification_id ?>"><?php echo $data[0]->identification_id ?></option>

								<?php
								foreach ($identification_data as $row) {
									echo '
							<option value="' . $row->identification_id . '">' . $row->identification_id . '</option>
							';
								}
								?>
							</select>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screening Results:</label>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Aedes Aegypti Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="aedes_male_result"
								   placeholder="Enter Male Aedes Aegypti Result"
								   name="aedes_male_result" value="<?php echo $data[0]->male_aedes_aegypti_result ?>" required>
							<div id="maleaedes-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Aedes Aegypti Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="aedes_female_result"
								   placeholder="Enter female Aedes Aegypti Result"
								   name="aedes_female_result" value="<?php echo $data[0]->female_aedes_aegypti_result ?>" required>
							<div id="femaleaedes-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Anopheles Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="male_anopheles_result"
								   placeholder="Enter Female Anopheles Result"
								   name="male_anopheles_result" value="<?php echo $data[0]->male_anopheles_result ?>" required>
							<div id="maleanopheles-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Anopheles Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="female_anopheles_result"
								   placeholder="Enter Female Anopheles Result"
								   name="female_anopheles_result" value="<?php echo $data[0]->female_anopheles_result ?>" required>
							<div id="femaleanopheles-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Culex Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="culex_male_result"
								   placeholder="Enter Male Culex Result"
								   name="culex_male_result" value="<?php echo $data[0]->male_culex_result ?>" required>
							<div id="maleculex-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Culex Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="culex_female_result"
								   placeholder="Enter Female Culex Result"
								   name="culex_female_result" value="<?php echo $data[0]->female_culex_result ?>" required>
							<div id="femaleculex-error-container" style="display: none;color: red;"></div>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Final Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="final_result"
								   placeholder="Enter Final Result"
								   name="final_result" value="<?php echo $data[0]->final_result ?>" required>
							<div id="finalresult-error-container" style="display: none;color: red;"></div>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screened Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="screened_date" name="screened_date" class="form-control"
								   value="<?php echo $data[0]->screened_date ?>" max="<?php echo date("Y-m-d"); ?>" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screened Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="screened_time" name="screened_time" class="form-control"
								   value="<?php echo $data[0]->screened_time ?>" required>
						</div>
					</div>

					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" type="submit" name="save-btn"
										value="<?php echo $data[0]->screening_id ?>">Save</button>
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
		var aedes_male_count = document.getElementById("aedes_male_result").value;
		var aedes_female_count = document.getElementById("aedes_female_result").value;
		var anopheles_male_count = document.getElementById("male_anopheles_result").value;
		var anopheles_female_count = document.getElementById("female_anopheles_result").value;
		var culex_male_count = document.getElementById("culex_male_result").value;
		var culex_female_count = document.getElementById("culex_female_result").value;
		var final_result = document.getElementById("final_result").value;

		document.getElementById("maleaedes-error-container").style.display = 'none';
		document.getElementById("femaleaedes-error-container").style.display = 'none';
		document.getElementById("maleanopheles-error-container").style.display = 'none';
		document.getElementById("femaleanopheles-error-container").style.display = 'none';
		document.getElementById("maleculex-error-container").style.display = 'none';
		document.getElementById("femaleculex-error-container").style.display = 'none';
		document.getElementById("finalresult-error-container").style.display = 'none';

		document.getElementById("aedes_male_result").style.borderColor = "#ccc";
		document.getElementById("aedes_female_result").style.borderColor = "#ccc";
		document.getElementById("male_anopheles_result").style.borderColor = "#ccc";
		document.getElementById("female_anopheles_result").style.borderColor = "#ccc";
		document.getElementById("culex_male_result").style.borderColor = "#ccc";
		document.getElementById("culex_female_result").style.borderColor = "#ccc";
		document.getElementById("final_result").style.borderColor = "#ccc";

		if (aedes_male_count < 0) {
			error_flag = 1;
			document.getElementById("aedes_male_result").style.borderColor = "red";
			document.getElementById("maleaedes-error-container").style.display = 'block';
			document.getElementById("maleaedes-error-container").innerHTML = "result cannot be a negative value.";
		}
		if (aedes_female_count < 0) {
			error_flag = 1;
			document.getElementById("aedes_female_result").style.borderColor = "red";
			document.getElementById("femaleaedes-error-container").style.display = 'block';
			document.getElementById("femaleaedes-error-container").innerHTML = "result cannot be a negative value..";
		}
		if (anopheles_male_count < 0) {
			error_flag = 1;
			document.getElementById("male_anopheles_result").style.borderColor = "red";
			document.getElementById("maleanopheles-error-container").style.display = 'block';
			document.getElementById("maleanopheles-error-container").innerHTML = "result cannot be a negative value..";
		}
		if (anopheles_female_count < 0) {
			error_flag = 1;
			document.getElementById("female_anopheles_result").style.borderColor = "red";
			document.getElementById("femaleanopheles-error-container").style.display = 'block';
			document.getElementById("femaleanopheles-error-container").innerHTML = "result cannot be a negative value..";
		}
		if (culex_male_count < 0) {
			error_flag = 1;
			document.getElementById("culex_male_result").style.borderColor = "red";
			document.getElementById("maleculex-error-container").style.display = 'block';
			document.getElementById("maleculex-error-container").innerHTML = "result cannot be a negative value..";
		}
		if (culex_female_count < 0) {
			error_flag = 1;
			document.getElementById("culex_female_result").style.borderColor = "red";
			document.getElementById("femaleculex-error-container").style.display = 'block';
			document.getElementById("femaleculex-error-container").innerHTML = "result cannot be a negative value..";
		}
		if (final_result < 0) {
			error_flag = 1;
			document.getElementById("final_result").style.borderColor = "red";
			document.getElementById("finalresult-error-container").style.display = 'block';
			document.getElementById("finalresult-error-container").innerHTML = "result cannot be a negative value..";
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

