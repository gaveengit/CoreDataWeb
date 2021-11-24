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
<div class="update-mrc-release-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController'); ?>'">Field
							Activities</a></li>
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/mrcReleases'); ?>'">MRC
							Releases</a></li>
					<li><a class="selected">View MRC Releases</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">View MRC Release</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('FieldActivitiesController/saveUpdateMrcRelease'); ?>">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Release Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="release-id" placeholder="Enter Trap Id"
								   name="release-id" value="<?php echo $data[0]->release_id ?>" readonly>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">MRC Identifier(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="mrc-identifier"
								   name="mrc-identifier" value="<?php echo $data[0]->identifier ?>" readonly>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Released Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="release_date" name="release_date" class="form-control"
								   value="<?php echo $data[0]->released_date ?>" max="<?php echo date("Y-m-d"); ?>" readonly>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Released Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="release_time" name="release_time" class="form-control"
								   value="<?php echo $data[0]->released_time ?>" readonly>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Release Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="release_status"
									name="release_status" disabled>
								<option value="1" <?php if ($data[0]->released_status == '1'): ?> selected="selected"<?php endif; ?>>
									Released
								</option>
								<option value="2" <?php if ($data[0]->released_status == '2'): ?> selected="selected"<?php endif; ?>>
									Not Released
								</option>
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>



