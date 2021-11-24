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
<div class="home-header-main">
	<div class="container">
		<div class="row">
			<div class="home-header clearfix">
				<div class="logo-container"></div>
				<div class="logout-container-main clearfix">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="title-container">
				<h3 align="center">User Login</h3>
			</div>
			<form method="post" action="<?php echo
			site_url('UserController/checkLogin'); ?>" enctype="multipart/form-data">
				<div class="element-row clearfix" style="padding-top: 20px;">
					<div class="col-md-2">
						<label class="control-label">Username(*):</label>
					</div>
					<div class="col-md-10">
						<input type="text" class="form-control" id="username" placeholder="Enter Username"
							   name="username">
					</div>
				</div>
				<div class="element-row clearfix" style="padding-top: 20px;">
					<div class="col-md-2">
						<label class="control-label">Password(*):</label>
					</div>
					<div class="col-md-10">
						<input type="password" class="form-control" id="password" placeholder="Enter Password"
							   name="password">
					</div>
				</div>
				<div class="button-container" style="text-align: center;">
					<button class="btn btn-primary" type="submit" name="save-btn" style="width:200px;">Login</button>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
</body>
</html>


