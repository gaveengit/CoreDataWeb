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
<div class="add-ov-Collection-main-container">
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
					<li><a href="#">Home</a></li>
					<li><a class="#">Field Activities</a></li>
					<li><a class="#">MRC Releases</a></li>
					<li><a class="selected">Add MRC Release</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New MRC Release</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Release Id(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Trap Id"
							   name="trap-id">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">MRC Identifier(*):</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="person-name"
								name="person-name">
							<option>Select From Here</option>
						</select>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Released Date(*):</label>
					</div>
					<div class="col-md-6">
						<input type="date" id="set_date" name="set_date">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Released Time(*):</label>
					</div>
					<div class="col-md-6">
						<input type="time" id="set_time" name="set_time">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Release Status(*):</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="address"
								name="address">
							<option>Select From Here</option>
						</select>
					</div>
				</div>

				<div class="button-container clearfix">
					<div class="col-md-7">
						<div class="footer-button-container">
							<button class="btn btn-success save-btn">Save</button>
							<button class="btn btn-primary cancel-btn">Cancel</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>


