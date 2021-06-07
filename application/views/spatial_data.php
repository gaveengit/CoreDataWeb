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
<div class="spatial-data-main-section">
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
					<li><a class="selected">Spatial Data</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Select map layer to change</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn">
							Add New Map Layer
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="action-list-main-container">
		<div class="container">
			<div class="row">
				<div class="action-list-secondary-container clearfix">
					<div class="form-group clearfix">
						<div>
							<label for="sel1">Action:</label>
						</div>
						<div class="col-md-3" style="padding-left: 0px;">
							<select class="form-control" id="sel1">
								<option>Select From Here</option>
								<option>Delete</option>
								<option>Update</option>
							</select>
						</div>
						<div class="col-md-2">
							<button class="btn btn-primary go-btn">Go</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="maps-list-container-main">
		<div class="container">
			<div class="row">
				<div class="maps-list-container-secondary">
					<div class="map-name-checkbox-container grey-background">
						<input type="checkbox" id="1" name="mattakkuliya" value="1" class="map-checkbox">
						<label for="1" class="map-label">Mattakkuliya Map</label><br>
					</div>
					<div class="map-name-checkbox-container white-background">
						<input type="checkbox" id="2" name="modara" value="2" class="map-checkbox">
						<label for="2" class="map-label">Modara Map</label><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
