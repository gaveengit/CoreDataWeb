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
<div class="field-activities-main-menu-section">
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
					<li><a href="#" onclick="location.href='<?php echo site_url('ReportController'); ?>'">Reports
							Menu</a></li>
					<li><a class="selected">Mosquito Diagnostic Report Generation</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="menu-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title" align="center">Incident Report Generation</h3>
				</div>
				<div class="menu-container-secondary clearfix">
					<form role="form" method="post" action="<?php echo
					site_url('ReportController/goIncidentsReportView'); ?>" onSubmit="return formValidation()">
						<div class="date-container clearfix">
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Date From:</label>
									<input type="date" id="collect-date" name="from-date" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Date To:</label>
									<input type="date" id="collect-date" name="to-date" class="form-control">
								</div>
							</div>
						</div>
						<div class="button-container" style="text-align: center;padding-top: 30px;">
							<button type="submit" class="btn btn-success" name="generate-btn"
									style="width: 50%;">Generate Report
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>




