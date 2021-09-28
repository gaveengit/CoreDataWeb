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
	<script>
		var confirm_delete_message = "Are you sure to delete this record?";
	</script>
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
					<li><a class="selected">Users</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Users</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('UserController/addNewUser'); ?>'">
							Add New User
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
							<th>Username</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>User Type</th>
							<th>Status</th>
							<th></th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach ($data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td>" . $row->username . "</td>";
								echo "<td>" . $row->first_name . "</td>";
								echo "<td>" . $row->last_name . "</td>";
								if ($row->user_type == '1') {
									echo "<td>" . "Admin" . "</td>";
								}
								if ($row->user_type == '3') {
									echo "<td>" . "GIS Officer" . "</td>";
								}
								if ($row->user_type == '4') {
									echo "<td>" . "Field Coordinator" . "</td>";
								}
								if ($row->user_type == '5') {
									echo "<td>" . "Entemology Officer" . "</td>";
								}
								if ($row->user_type == '6') {
									echo "<td>" . "Molecular Biologist" . "</td>";
								}

								if ($row->STATUS == '1') {
									echo "<td>" . "Active" . "</td>";
								}
								if ($row->STATUS == '2') {
									echo "<td>" . "Inactive" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('UserController/updateUsers/') . $row->user_id . "'" . ">" . "<span value=" . $row->user_id . ">" . "View" . "</span></td>";
								if ($row->user_type != '1') {
									echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
											site_url('UserController/deleteUser/') . $row->user_id . "'" . ">" . "<span value=" . $row->user_id . ">" . "Delete" . "</span></td>";
									echo "</tr>";
								}
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td>" . $row->username . "</td>";
								echo "<td>" . $row->first_name . "</td>";
								echo "<td>" . $row->last_name . "</td>";
								if ($row->user_type == '1') {
									echo "<td>" . "Admin" . "</td>";
								}

								if ($row->user_type == '3') {
									echo "<td>" . "GIS Officer" . "</td>";
								}
								if ($row->user_type == '4') {
									echo "<td>" . "Field Coordinator" . "</td>";
								}
								if ($row->user_type == '5') {
									echo "<td>" . "Entemology Officer" . "</td>";
								}
								if ($row->user_type == '6') {
									echo "<td>" . "Molecular Biologist" . "</td>";
								}

								if ($row->STATUS == '1') {
									echo "<td>" . "Active" . "</td>";
								}
								if ($row->STATUS == '2') {
									echo "<td>" . "Inactive" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('UserController/updateUsers/') . $row->user_id . "'" . ">" . "<span value=" . $row->user_id . ">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('UserController/deleteUser/') . $row->user_id . "'" . ">" . "<span value=" . $row->user_id . ">" . "Delete" . "</span></td>";
								echo "</tr>";
								$i++;
							}
						}
						?>
						</tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


