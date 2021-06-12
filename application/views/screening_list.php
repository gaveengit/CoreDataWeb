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
					<li><a class="selected">Screening</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Screening</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('ScreeningController/addScreening');?>'">
							Add New Screening Result
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
							<th>Screening Id</th>
							<th>Diagnostic Id</th>
							<th>Screened Date</th>
							<th>Total Screened</th>
							<th>Aegypti</th>
							<th>Wmel</th>
							<th>Equivocal</th>
							<th>Screening Result</th>
						</tr>
						</thead>
						<tbody>
						<tr class="white-background" onclick="location.href='<?php echo
						site_url('ScreeningController/updateScreening');?>'">
							<td class="run-name-cell"><span>BGA1a</span></td>
							<td>BG_Run_Nug1</td>
							<td>Proposed</td>
							<td>Kamal Fernando</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
						</tr>
						<tr class="grey-background">
							<td class="run-name-cell"><span>BGA1a</span></td>
							<td>BG_Run_Nug1</td>
							<td>Proposed</td>
							<td>Kamal Fernando</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
						</tr>
						<tr class="white-background">
							<td class="run-name-cell"><span>BGA1a</span></td>
							<td>BG_Run_Nug1</td>
							<td>Proposed</td>
							<td>Kamal Fernando</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
							<td>No.20, Colombo 10</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

