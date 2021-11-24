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
<div class="persons-list-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldPlanningController'); ?>'">Field
							Planning</a></li>
					<li><a onclick="location.href='<?php echo site_url('FieldPlanningController/addNewRun'); ?>'">Add
							New Field Run</a></li>
					<li><a class="selected">Error Log</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Field Run Error Log</h3>
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
							<th>Identifier</th>
							<th>Error Description</th>

						</tr>
						</thead>
						<tbody>
						<?php
						if(isset($invalid_trap)) {
							foreach ($invalid_trap as $row) {
								echo "<tr class='white-background'>";
								echo "<td>" . $row['trap_id'] . "</td>";
								echo "<td>" . $row['error'] . "</td>";
								echo "</tr>";
							}
						}
						if(isset($invalid_status)) {
							foreach ($invalid_status as $row) {
								echo "<tr class='white-background'>";
								echo "<td>" . $row['trap_id'] . "</td>";
								echo "<td>" . $row['error'] . "</td>";
								echo "</tr>";

							}
						}
						if(isset($pending)) {
							foreach ($pending as $row) {
								echo "<tr class='white-background'>";
								echo "<td>" . $row['trap_id'] . "</td>";
								echo "<td>" . $row['error'] . "</td>";
								echo "</tr>";
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



