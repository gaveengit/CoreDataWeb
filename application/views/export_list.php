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
<div class="export-list-main-container">
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
					<li><a class="selected">Bio Banking Exports</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Bio Banking Exports</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('ExportController/addExport');?>'">
							Add New Bio Banking Export
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
							<th>Export Id</th>
							<th>Ovi Collection Id</th>
							<th>Qty</th>
							<th>Date</th>
							<th>Time</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i=1;
						foreach($data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('ExportController/updateExport/') . $row->export_id . "'" . ">" . "<span value=" . $row->export_id . ">" . $row->export_id . "</span></td>";

								echo "<td>" . $row->ovi_collection_id . "</td>";
								echo "<td>" . $row->qty . "</td>";
								echo "<td>" . $row->export_date . "</td>";
								echo "<td>" . $row->export_time . "</td>";
								if ($row->export_status == '1') {
									echo "<td>" . "Eligible" . "</td>";
								}
								if ($row->export_status == '2') {
									echo "<td>" . "Not Eligible" . "</td>";
								}
								echo "</tr>";
								$i++;
							} else {
								if (($i % 2) == 0) {
									echo "<tr class='white-background'>";
									echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
											site_url('ExportController/updateExport/') . $row->export_id . "'" . ">" . "<span value=" . $row->export_id . ">" . $row->export_id . "</span></td>";

									echo "<td>" . $row->ovi_collection_id . "</td>";
									echo "<td>" . $row->qty . "</td>";
									echo "<td>" . $row->export_date . "</td>";
									echo "<td>" . $row->export_time . "</td>";
									if ($row->export_status == '1') {
										echo "<td>" . "Eligible" . "</td>";
									}
									if ($row->export_status == '2') {
										echo "<td>" . "Not Eligible" . "</td>";
									}
									echo "</tr>";
									$i++;
								}
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


