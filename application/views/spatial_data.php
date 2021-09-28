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
		var confirm_delete_message = "Are you sure to delete this map layer?";
	</script>
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
					<li><a onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a></li>
					<li><a class="selected">Spatial List</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Map Layers</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('SpatialDataController/addNewMap'); ?>'">
							Add New Map Layer
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
					site_url('SpatialDataController/search'); ?>">
						<div class="col-md-8">
							<div class="row">
								<input type="text" class="form-control search-bar" name="search_bar"
									   placeholder="Search by layer name"/>
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
							<th>Map Layer Name</th>
							<th>Description</th>
							<th>Status</th>
							<th></th>
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
								echo "<td>" . $row->name . "</td>";
								echo "<td>" . $row->description . "</td>";
								echo "<td>" . $row->map_status . "</td>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('SpatialDataController/mapView/') . $row->map_id . "'" . ">" . "<span value=" . $row->map_id . ">" . "Map View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('SpatialDataController/updateMap/') . $row->map_id . "'" . ">" . "<span value=" . $row->map_id . ">" . "Update Map" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('SpatialDataController/deleteMap/') . $row->map_id . "'" . ">" . "<span value=" . $row->map_id . ">" . "Delete" . "</span></td>";
								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td>" . $row->name . "</td>";
								echo "<td>" . $row->description . "</td>";
								echo "<td>" . $row->map_status . "</td>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('SpatialDataController/mapView/') . $row->map_id . "'" . ">" . "<span value=" . $row->map_id . ">" . "Map View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('SpatialDataController/updateMap/') . $row->map_id . "'" . ">" . "<span value=" . $row->map_id . ">" . "Update Map" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('SpatialDataController/deleteMap/') . $row->map_id . "'" . ">" . "<span value=" . $row->map_id . ">" . "Delete" . "</span></td>";

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
