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
					<li><a href="#" onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a>
					</li>
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
						<button type="submit" class="btn btn-success add-btn"
								onclick="location.href='<?php echo site_url('FieldPlanningController/addNewRun'); ?>'">
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
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($ovi_data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . $row->field_run_id . "</span></td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->ovi_run_type == '1') {
									echo "<td>" . "OVI Service" . "</td>";
								}
								if ($row->ovi_run_type == '2') {
									echo "<td>" . "OVI Collection" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}

								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . $row->field_run_id . "</span></td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->ovi_run_type == '1') {
									echo "<td>" . "OVI Service" . "</td>";
								}
								if ($row->ovi_run_type == '2') {
									echo "<td>" . "OVI Collection" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}

								echo "</tr>";
								$i++;
							}
						}
						foreach ($bg_data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . $row->field_run_id . "</span></td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->bg_run_type == '1') {
									echo "<td>" . "BG Service" . "</td>";
								}
								if ($row->bg_run_type == '2') {
									echo "<td>" . "BG Collection" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}

								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . $row->field_run_id . "</span></td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->bg_run_type == '1') {
									echo "<td>" . "BG Service" . "</td>";
								}
								if ($row->bg_run_type == '2') {
									echo "<td>" . "BG Collection" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}

								echo "</tr>";
								$i++;
							}
						}


						foreach ($mrc_data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . $row->field_run_id . "</span></td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->mrc_run_type == '1') {
									echo "<td>" . "MRC Service" . "</td>";
								}
								if ($row->mrc_run_type == '2') {
									echo "<td>" . "MRC Release" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}

								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . $row->field_run_id . "</span></td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->mrc_run_type == '1') {
									echo "<td>" . "MRC Service" . "</td>";
								}
								if ($row->mrc_run_type == '2') {
									echo "<td>" . "MRC Release" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
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
</body>
</html>
