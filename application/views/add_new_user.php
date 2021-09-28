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
<div class="add-export-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('UserController'); ?>'">Users</a></li>
					<li><a class="selected">Add New User</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New User</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('UserController/saveUser'); ?>">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">First Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="first_name" placeholder="Enter First Name"
								   name="first_name" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Last Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="last_name" placeholder="Enter Last Name"
								   name="last_name" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">User Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="username" placeholder="Enter Username"
								   name="username" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="password" placeholder="Enter Password"
								   name="password" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Confirm Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password"
								   name="confirm_password" required>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">User Type(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="user_type"
									name="user_type">
								<option value="0" selected disabled>Select From Here</option>
								<option value="3">GIS Officer</option>
								<option value="4">Field Coordinator</option>
								<option value="5">Entomology Officer</option>
								<option value="6">Molecular Biologist</option>
							</select>
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
</body>
</html>

