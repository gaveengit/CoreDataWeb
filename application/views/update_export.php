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
					<li><a class="#" onclick="location.href='<?php echo site_url('ExportController'); ?>'">Bio Banking
							Exports</a></li>
					<li><a class="selected">Update Bio Banking Export</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update Bio Banking Export</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('ExportController/saveUpdateExport'); ?>" onsubmit="return formvalidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Export Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="export_id" placeholder="Enter Export Id"
								   name="export_id" value="<?php echo $data[0]->export_id ?>" readonly>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">OVI Collection Id(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="ovi_collection_id"
									name="ovi_collection_id">
								<option value="<?php echo $data[0]->ovi_collection_id ?>"><?php echo $data[0]->ovi_collection_id ?></option>
								<?php
								foreach ($data_ov as $row) {
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
							<input type="number" id="qty" name="qty" class="form-control" placeholder="Enter Quantity"
								   value="<?php echo $data[0]->qty ?>" required>
							<div id="quantity-error-container" style="display: none;color: red;"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Export Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="export_date" name="export_date" class="form-control"
								   value="<?php echo $data[0]->export_date ?>" max="<?php echo date("Y-m-d"); ?>"
								   required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Export Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="export_time" name="export_time" class="form-control"
								   value="<?php echo $data[0]->export_time ?>" required>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="status" name="export_status">
								<option value="1" <?php if ($data[0]->export_status == '1'): ?> selected="selected"<?php endif; ?>>
									Eligible
								</option>
								<option value="2" <?php if ($data[0]->export_status == '2'): ?> selected="selected"<?php endif; ?>>
									Not Eligible
								</option>
							</select>
						</div>
					</div>

					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" type="submit" name="save-btn"
										value="<?php echo $data[0]->export_id ?>">Save
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
	function formvalidation() {
		var error_flag = 0;
		var qty = document.getElementById("qty").value;
		document.getElementById("quantity-error-container").style.display = 'none';
		document.getElementById("qty").style.borderColor = "#ccc";
		if (qty < 0) {
			error_flag = 1;
			document.getElementById("qty").style.borderColor = "red";
			document.getElementById("quantity-error-container").style.display = 'block';
			document.getElementById("quantity-error-container").innerHTML = "Quantity should not be a negative value.";
		}
		if (error_flag == 0) {
			return true;
		} else {
			return false;
		}
	}
</script>
</body>
</html>

