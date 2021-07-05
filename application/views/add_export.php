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
					<li><a class="#" onclick="location.href='<?php echo site_url('ExportController'); ?>'">Bio Banking
							Exports</a></li>
					<li><a class="selected">Add New Bio Banking Export</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New Bio Banking Export</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('ExportController/saveExport'); ?>">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Export Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="export_id" placeholder="Enter Export Id"
								   name="export_id">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">OVI Collection Id(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="ovi_collection_id"
									name="ovi_collection_id">
								<option value="-1">Select From Here</option>
								<?php
								foreach ($data as $row) {
									echo '
							<option value="' . $row->collection_id . '">' . $row->collection_id . '</option>
							';
								}
								?>

							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Quantity(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" id="qty" name="qty" class="form-control" placeholder="Enter Quantity">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Export Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="export_date" name="export_date" class="form-control">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Export Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="export_time" name="export_time" class="form-control">
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

