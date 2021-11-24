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
								<span style="cursor:default;"><?php echo $this -> session -> userdata('logged_user_username') ?></span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="user-name-container" onclick="location.href='<?php echo site_url('UserController/updateUsers/').$this -> session -> userdata('logged_user_id') ?>'">
								<span>View Profile</span>
							</div>
							<div class="seperator-container">
								<span>┃</span>
							</div>
							<div class="logout-text-container"  onclick="location.href='<?php echo site_url('UserController/signOut'); ?>'">
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
	<div class="search-bar-main-container">
		<div class="container">
			<div class="row">
				<div class="search-bar-secondary-container clearfix">
					<form method="post" action="<?php echo
					site_url('FieldPlanningController/runsSearch'); ?>">
						<div class="col-md-8">
							<div class="row">
								<input type="text" class="form-control search-bar" name="search_bar"
									   placeholder="Search by run name, date"/>
							</div>
						</div>
						<div class="col-md-2">
							<button class="btn btn-primary search-btn" type="submit">Search</button>
						</div>
					</form>
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
						<?php
						$i = 1;
						foreach ($data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td>" . $row->field_run_id . "</td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->run_type == '1' && $row->main_type=='ovi') {
									echo "<td>" . "OVI Service" . "</td>";
								}
								if ($row->run_type == '2' && $row->main_type=='ovi') {
									echo "<td>" . "OVI Collection" . "</td>";
								}
								if ($row->run_type == '1' && $row->main_type=='bg') {
									echo "<td>" . "BG Service" . "</td>";
								}
								if ($row->run_type == '2' && $row->main_type=='bg') {
									echo "<td>" . "BG Collection" . "</td>";
								}
								if ($row->run_type == '1' && $row->main_type=='mrc') {
									echo "<td>" . "MRC Service" . "</td>";
								}
								if ($row->run_type == '2' && $row->main_type=='mrc') {
									echo "<td>" . "MRC Release" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . "View" . "</span></td>";

								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td>" . $row->field_run_id . "</td>";
								echo "<td>" . $row->run_date . "</td>";
								if ($row->run_type == '1' && $row->main_type=='ovi') {
									echo "<td>" . "OVI Service" . "</td>";
								}
								if ($row->run_type == '2' && $row->main_type=='ovi') {
									echo "<td>" . "OVI Collection" . "</td>";
								}
								if ($row->run_type == '1' && $row->main_type=='bg') {
									echo "<td>" . "BG Service" . "</td>";
								}
								if ($row->run_type == '2' && $row->main_type=='bg') {
									echo "<td>" . "BG Collection" . "</td>";
								}
								if ($row->run_type == '1' && $row->main_type=='mrc') {
									echo "<td>" . "MRC Service" . "</td>";
								}
								if ($row->run_type == '2' && $row->main_type=='mrc') {
									echo "<td>" . "MRC Release" . "</td>";
								}
								if ($row->run_status == '1') {
									echo "<td>" . "Pending" . "</td>";
								}
								if ($row->run_status == '2') {
									echo "<td>" . "Completed" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldPlanningController/updateRun/') . $row->field_run_id . "'" . ">" . "<span value=" . $row->field_run_id . ">" . "View" . "</span></td>";
								echo "</tr>";
								$i++;
							}


						}

						?>
						</tbody>
					</table>
					<p class="pagination-paragraph"><?php echo $links; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
