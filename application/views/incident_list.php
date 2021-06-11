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
<div class="screening-list-main-container">
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
					<li><a href="#" onclick="location.href='<?php echo site_url('MainMenuController');?>'">Home</a></li>
					<li><a class="selected">Field Incidents</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Field Incidents</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn">
							Add New Field Incident
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-locations-table-main-container">
		<div class="container">
			<div class="row">
				<div class="table-container">
					<table>
						<thead>
						<tr class="grey-background">
							<th>Incident Id</th>
							<th>Community Member</th>
							<th>Type</th>
							<th>Priority</th>
							<th>Date and Time</th>
							<th>Full Address</th>
							<th>Action Status</th>
						</tr>
						</thead>
						<tbody>
						<tr class="white-background">
							<td class="run-name-cell">BGA1a</td>
							<td>BG_Run_Nug1</td>
							<td>Proposed</td>
							<td>Kamal Fernando</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>Action</td>
						</tr>
						<tr class="grey-background">
							<td class="run-name-cell">BGA1a</td>
							<td>BG_Run_Nug1</td>
							<td>Proposed</td>
							<td>Kamal Fernando</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>Action</td>
						</tr>
						<tr class="white-background">
							<td class="run-name-cell">BGA1a</td>
							<td>BG_Run_Nug1</td>
							<td>Proposed</td>
							<td>Kamal Fernando</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>Action</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

