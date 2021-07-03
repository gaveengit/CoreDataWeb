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
<div class="bg-locations-list-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController');?>'">Field Activities</a></li>
					<li><a class="selected">MRC Services</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">MRC Services</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('FieldActivitiesController/addMrcService');?>'">
							Add New MRC Service
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
							<th>Service Id</th>
							<th>MRC Id</th>
							<th>Run Name</th>
							<th>Service Date</th>
							<th>Service Status</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcService/') . $row->service_id . "'" . ">" . "<span value=" . $row->service_id . ">" . $row->service_id . "</span></td>";

								echo "<td>" . $row->trap_id . "</td>";
								echo "<td>" . $row->run_id . "</td>";
								echo "<td>" . $row->service_date . "</td>";
								if ($row->service_status == '1') {
									echo "<td>" . "Serviced" . "</td>";
								}
								if ($row->service_status == '2') {
									echo "<td>" . "Not Serviced" . "</td>";
								}
								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcService/') . $row->service_id . "'" . ">" . "<span value=" . $row->service_id . ">" . $row->service_id . "</span></td>";

								echo "<td>" . $row->trap_id . "</td>";
								echo "<td>" . $row->run_id . "</td>";
								echo "<td>" . $row->service_date . "</td>";
								if ($row->service_status == '1') {
									echo "<td>" . "Serviced" . "</td>";
								}
								if ($row->service_status == '2') {
									echo "<td>" . "Not Serviced" . "</td>";
								}
								echo "</tr>";
								$i++;
							}
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


