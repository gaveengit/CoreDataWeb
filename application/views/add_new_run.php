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
<div class="add-run-main-section">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldPlanningController'); ?>'">Field
							Planning</a></li>
					<li><a class="selected">Add New Field Run</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title">
						Add New Field Run
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<div class="form-container">
					<form method="post" action="<?php echo
					site_url('FieldRunsController/saveRunLocations');?>" onSubmit="return formValidation()"
						  enctype="multipart/form-data">
						<div class="element-row clearfix">
							<div class="col-md-3">
								<label class="control-label" for="email">Name(*):</label>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="run-name" placeholder="Enter Run Name"
									   name="run-name">
							</div>
						</div>

						<div class="element-row clearfix">
							<div class="col-md-3">
								<label class="control-label" for="type">Type(*):</label>
							</div>
							<div class="col-md-6">
								<select class="form-control" id="run-type" name="run-type">
									<option value="6">MRC Service Run</option>
									<option value="1">MRC Release Run</option>
									<option value="2">OVI Service Run</option>
									<option value="3">OVI Collection Run</option>
									<option value="4">BG Service Run</option>
									<option value="5">BG Collection Run</option>
								</select>
							</div>
						</div>
						<div class="element-row clearfix">
							<div class="col-md-3">
								<label class="control-label" for="email">Upload .csv File Here(*):</label>
							</div>
							<div class="col-md-6">
								<input type="file" class="form-control" name="file" id="file">
							</div>
						</div>
						<div class="element-row clearfix">
							<div class="col-md-3">
								<label class="control-label" for="email">Run Description(*):</label>
							</div>
							<div class="col-md-6">
							<textarea class="form-control" id="run_description" name="description" style="height:200px;"
									  placeholder="Run Description"></textarea>
							</div>
						</div>
						<div class="element-row clearfix">
							<div class="col-md-3">
								<label class="control-label">Date(*):</label>
							</div>
							<div class="col-md-6">
								<input type="date" class="form-control" id="run-date" placeholder="Enter Date"
									   name="run-date">
							</div>
						</div>
						<div class="element-row clearfix">
							<div class="col-md-3">
								<label class="control-label">Time(*):</label>
							</div>
							<div class="col-md-6">
								<input type="time" class="form-control" id="run-time" placeholder="Enter Time"
									   name="run-time">
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
							<div class="col-md-9">
								<div class="footer-button-container">
									<button class="btn btn-success save-btn" type="submit" name="save-btn">Save</button>
									<button class="btn btn-primary cancel-btn">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function formValidation() {
		document.getElementById("error-msg").innerHTML = "";
		var run_name = document.getElementById("run-name").value;
		var file_upload = document.getElementById("file-upload").value;
		var run_description = document.getElementById("run_description").value;
		var run_date = document.getElementById("run-date").value;
		var run_time = document.getElementById("run-time").value;

		if (run_name.length == 0 || file_upload.length == '0' || run_description.length == 0 || run_date.length == 0 ||
				run_time.length == 0) {
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

