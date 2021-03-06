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
					<li><a class="selected">Update User</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update User</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('UserController/saveUpdateUser'); ?>">
					<h4>Basic Details</h4>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">First Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="first_name" placeholder="Enter First Name"
								   name="first_name" value="<?php echo $data[0]->first_name ?>" required readonly>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Last Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="last_name" placeholder="Enter Last Name"
								   name="last_name" value="<?php echo $data[0]->last_name ?>" required readonly>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">User Name:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="username" placeholder="Enter Username"
								   name="username" value="<?php echo $data[0]->username ?>" readonly>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">User Type(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="user_type"
									name="user_type" disabled>
								<option value="1" <?php if ($data[0]->user_type == '1'): ?> selected="selected"<?php endif; ?>>
									Admin
								</option>
								<option value="3" <?php if ($data[0]->user_type == '3'): ?> selected="selected"<?php endif; ?>>
									GIS Officer
								</option>
								<option value="4" <?php if ($data[0]->user_type == '4'): ?> selected="selected"<?php endif; ?>>
									Field Coordinator
								</option>
								<option value="5" <?php if ($data[0]->user_type == '5'): ?> selected="selected"<?php endif; ?>>
									Entomology Officer
								</option>
								<option value="6" <?php if ($data[0]->user_type == '6'): ?> selected="selected"<?php endif; ?>>
									Molecular Biologist
								</option>
								<option value="7" <?php if ($data[0]->user_type == '7'): ?> selected="selected"<?php endif; ?>>
									Field Assistant
								</option>
							</select>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">User Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="user_status"
									name="user_status" disabled>
								<option value="1" <?php if ($data[0]->STATUS == '1'): ?> selected="selected"<?php endif; ?>>
									Active
								</option>
								<option value="2" <?php if ($data[0]->STATUS == '2'): ?> selected="selected"<?php endif; ?>>
									Inactive
								</option>
							</select>
						</div>
					</div>
					<div class="button-container clearfix" style="display: none;" id="button-container">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button name="save-btn" class="btn btn-success save-btn" type="submit"
										value="<?php echo $data[0]->user_id ?>">Save
								</button>
								<button class="btn btn-primary cancel-btn" type="reset">Cancel</button>
							</div>
						</div>
					</div>
				</form>
				<form method="post" action="<?php echo
				site_url('UserController/saveUpdatePassword'); ?>" onsubmit="return formValidation()">
					<h4>Change Password</h4>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Current Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="current_password" placeholder="Enter Password"
								   name="current_password" maxlength="15" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">New Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="password" placeholder="Enter Password"
								   name="password" maxlength="15" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Confirm New Password(*):</label>
						</div>
						<div class="col-md-6">
							<input type="password" class="form-control" id="confirm_password"
								   placeholder="Enter Confirm Password"
								   name="confirm_password" maxlength="15" required>
							<div id="password-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button name="save-btn" class="btn btn-success save-btn" type="submit"
										value="<?php echo $data[0]->user_id ?>">Save
								</button>
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
	var user_type = <?php echo $this->session->userdata('logged_user_usertype');?>;
	if (user_type == '1') {
		document.getElementById("button-container").style.display = 'block';
		document.getElementById("first_name").readOnly = false;
		document.getElementById("last_name").readOnly = false;
		document.getElementById("user_type").disabled = false;
		document.getElementById("user_status").disabled = false;
	}
	function formValidation() {
		var error_flag = 0;
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var confirm_password = document.getElementById("confirm_password").value;
		document.getElementById("password-error-container").style.display = 'none';
		document.getElementById("confirm_password").style.borderColor = "#ccc";

		if (password != confirm_password) {
			error_flag = 1;
			document.getElementById("confirm_password").style.borderColor = "red";
			document.getElementById("password-error-container").style.display = 'block';
			document.getElementById("password-error-container").innerHTML = "Confirm password is not matched with password.";
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


