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
<div class="field-runs-list-main-container">
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
					<li><a class="selected">Field Planning</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Field Runs List</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo site_url('FieldPlanningController/addNewRun');?>'">
							Add New Field Run
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="field-runs-table-main-container">
	<div class="container">
		<div class="row">
			<div class="table-container">
				<table>
					<thead>
						<tr class="grey-background">
							<th>Run Name</th>
							<th>Run Date</th>
							<th>Run Type</th>
							<th>Run Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<tr class="white-background">
						<td class="run-name-cell"><span onclick="location.href='<?php echo site_url('FieldPlanningController/updateRun');?>'">BG_Run_Nug1</span></td>
						<td>2020-01-23</td>
						<td>BG Run</td>
						<td>Active</td>
						<td class="run-name-cell"><span onclick="location.href='<?php echo site_url('FieldPlanningController/viewRunMap');?>'">Map View</span></td>
					</tr>
					<tr class="grey-background">
						<td class="run-name-cell"><span>BGA1a</span></td>
						<td>2020-01-25</td>
						<td>OV Run</td>
						<td>Completed</td>
						<td class="run-name-cell">Map View</td>
					</tr>
					<tr class="white-background">
						<td class="run-name-cell"><span>BGA1a</span></td>
						<td>2020-01-24</td>
						<td>MRC Run</td>
						<td>Active</td>
						<td class="run-name-cell">Map View</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>
</body>
</html>
