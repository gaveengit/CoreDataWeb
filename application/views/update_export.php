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
					<li><a href="#">Home</a></li>
					<li><a class="#">Bio Banking Exports</a></li>
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
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Export Id(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Trap Id"
							   name="trap-id">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">OVI Eggs Count:</label>
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">OVI Trap Id:</label>
					</div>
					<div class="col-md-6">
						<select class="form-control">
							<option>Select From Here</option>
						</select>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Selected Quantity (*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Trap Id"
							   name="trap-id">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<button class="btn btn-primary add-qty-btn">
							Add Count Details
						</button>
					</div>
				</div>

				<div class="table-container clearfix">
					<div class="col-md-8">
						<table>
							<thead>
							<tr class="grey-background">
								<th>OVI Trap Id</th>
								<th>Selected Quantity</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td class="remove-link">Remove From List</td>
							</tr>
							<tr class="grey-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td class="remove-link">Remove From List</td>
							</tr>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td class="remove-link">Remove From List</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Description(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" id="description" name="description" class="form-control">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Export Date(*):</label>
					</div>
					<div class="col-md-6">
						<input type="date" id="collect_date" name="collect_date" class="form-control">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Export Time(*):</label>
					</div>
					<div class="col-md-6">
						<input type="time" id="collect_time" name="collect_time" class="form-control">
					</div>
				</div>

				<div class="button-container clearfix">
					<div class="col-md-7">
						<div class="footer-button-container">
							<button class="btn btn-success save-btn">Save</button>
							<button class="btn btn-primary cancel-btn">Cancel</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>

