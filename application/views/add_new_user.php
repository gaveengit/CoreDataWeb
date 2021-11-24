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
				site_url('UserController/saveUser'); ?>" onsubmit="return formValidation()">
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
								   name="username" maxlength="15" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="password" placeholder="Enter Password"
								   name="password" maxlength="15" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Confirm Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="confirm_password"
								   placeholder="Enter Confirm Password"
								   name="confirm_password" maxlength="15" required>
							<div id="password-error-container" style="display: none;color: red;"></div>
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
								<option value="7">Field Assistant</option>
							</select>
							<div id="usertype-error-container" style="display: none;color: red;"></div>
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
	function formValidation() {
		var error_flag = 0;
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var type = document.getElementById("user_type").value;
		var confirm_password = document.getElementById("confirm_password").value;
		document.getElementById("password-error-container").style.display = 'none';
		document.getElementById("usertype-error-container").style.display = 'none';
		document.getElementById("confirm_password").style.borderColor = "#ccc";
		document.getElementById("user_type").style.borderColor = "#ccc";

		if (password != confirm_password) {
			error_flag = 1;
			document.getElementById("confirm_password").style.borderColor = "red";
			document.getElementById("password-error-container").style.display = 'block';
			document.getElementById("password-error-container").innerHTML = "Confirm password is not matched with password.";
		}
		if(type==false){
			error_flag = 1;
			document.getElementById("user_type").style.borderColor="red";
			document.getElementById("usertype-error-container").style.display = 'block';
			document.getElementById("usertype-error-container").innerHTML = "Please select a user type.";
		}
		if (error_flag == 1) {
			return false;
		} else {
			return true;
		}
		/* password regex for 8 characters */
		/*
		var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
		regex.test(val);
		(?=.*\d)          // should contain at least one digit
		(?=.*[a-z])       // should contain at least one lower case
		(?=.*[A-Z])       // should contain at least one upper case
		[a-zA-Z0-9]{8,}   // should contain at least 8 from the mentioned characters
		*/
		/*regex for white spaces */
		/*
		var inValid = /\s/;
		var value = "test space";
		var k = inValid.test(value);
		alert(k);
		*/

	}
</script>
</body>
</html>

