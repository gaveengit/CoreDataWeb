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
<div class="add-map-layer-main-section">
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
					<li><a onclick="location.href='<?php echo site_url('MainMenuController');?>'">Home</a></li>
					<li><a class="#" onclick="location.href='<?php echo site_url('SpatialDataController');?>'">Spatial Data</a></li>
					<li><a class="selected">Update Map Layer</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title">
						Update Map Layer
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<div class="form-container">
					<div class="form-group clearfix">
						<label class="control-label col-md-2" for="email">Name:</label>
						<div class="col-md-5">
							<input type="text" class="form-control" id="map-name" placeholder="Enter Map Name"
								   name="map-name">
						</div>

					</div>

					<div class="form-group clearfix">
						<label class="control-label col-md-2" for="email">Description:</label>
						<div class="col-md-5">
							<textarea class="form-control map-description" id="map-description"
									  placeholder="Enter Map Description"
									  name="map-description"></textarea>
						</div>

					</div>
					<div class="form-group clearfix">
						<label class="control-label col-md-2" for="email">Upload File Here:</label>
						<div class="col-md-5">
							<input type="file" class="form-control" name="file-upload" id="file-upload">
						</div>

					</div>
					<div class="button-container clearfix">
						<div class="col-md-7">
							<button class="btn btn-success save-btn">Save</button>
							<button class="btn btn-primary cancel-btn">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

