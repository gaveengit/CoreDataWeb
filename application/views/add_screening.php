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
<div class="add-screening-main-container">
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
					<li><a href="#" onclick="location.href='<?php echo site_url('MainMenuController');?>'">Home</a></li>
					<li><a class="#" onclick="location.href='<?php echo site_url('ScreeningController');?>'">Mosquito Screening</a></li>
					<li><a class="selected">Add New Mosquito Screening Result</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New Mosquito Screening</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('ScreeningController/saveScreening'); ?>">
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screening Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="screening_id"
								   placeholder="Enter Screening Id"
								   name="screening_id">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Diagnostic Id:</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" name="identification_id" id="identification_id">
								<option value="-1">Select From Here</option>
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
								   name="aedes_male_result" value="0">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Aedes Aegypti Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="aedes_female_result"
								   placeholder="Enter female Aedes Aegypti Result"
								   name="aedes_female_result" value="0">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Anopheles Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="male_anopheles_result"
								   placeholder="Enter Female Anopheles Result"
								   name="male_anopheles_result" value="0">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Anopheles Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="female_anopheles_result"
								   placeholder="Enter Female Anopheles Result"
								   name="female_anopheles_result" value="0">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Male Culex Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="culex_male_result"
								   placeholder="Enter Male Culex Result"
								   name="culex_male_result" value="0">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Female Culex Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="culex_female_result"
								   placeholder="Enter Female Culex Result"
								   name="culex_female_result" value="0">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Final Result(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="final_result"
								   placeholder="Enter Final Result"
								   name="final_result" value="0">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screened Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="screened_date" name="screened_date" class="form-control">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-3">
							<label class="control-label">Screened Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="screened_time" name="screened_time" class="form-control">
						</div>
					</div>

					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" type="submit" name="save-btn">Save</button>
								<button class="btn btn-primary cancel-btn" type="reset" name="cancel-btn">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

