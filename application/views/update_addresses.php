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
<div class="update-addresses-main-container">
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
					<li><a class="#">Addresses</a></li>
					<li><a class="selected">Update Address</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update Address</h3>
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
						<label class="control-label">Address Line1(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Full Name"
							   name="trap-id">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Address Line2(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Contact Number"
							   name="trap-id">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Location Description:</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Contact Number"
							   name="trap-id">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Status:</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="status" name="status">
							<option>Active</option>
							<option>Inactive</option>
						</select>
					</div>
				</div>

				<div class="mrc-details-container">
					<div class="title-container">
						<h4>MRC Details</h4>
					</div>
					<div class="table-container">
						<table>
							<thead>
							<tr class="grey-background">
								<th>Collection Id</th>
								<th>Set Date</th>
								<th>Collected Date</th>
								<th>Trap Position</th>
								<th>Person</th>
							</tr>
							</thead>
							<tbody>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="grey-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="bg-details-container">
					<div class="title-container">
						<h4>BG Details</h4>
					</div>
					<div class="table-container">
						<table>
							<thead>
							<tr class="grey-background">
								<th>Collection Id</th>
								<th>Set Date</th>
								<th>Collected Date</th>
								<th>Trap Position</th>
								<th>Person</th>
							</tr>
							</thead>
							<tbody>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="grey-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="mrc-details-container">
					<div class="title-container">
						<h4>OVI Details</h4>
					</div>
					<div class="table-container">
						<table>
							<thead>
							<tr class="grey-background">
								<th>Collection Id</th>
								<th>Set Date</th>
								<th>Collected Date</th>
								<th>Trap Position</th>
								<th>Person</th>
							</tr>
							</thead>
							<tbody>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="grey-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							</tbody>
						</table>
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

