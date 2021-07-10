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
					<li><a href="#" onclick="location.href='<?php echo site_url('MainMenuController'); ?>'">Home</a>
					</li>
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController'); ?>'">Field
							Activities</a></li>
					<li><a class="selected">BG Collections</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">BG Collections</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('FieldActivitiesController/addBgCollection'); ?>'">
							Add New BG Collection
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
					site_url('FieldActivitiesController/searchBgCollections'); ?>">
						<div class="col-md-8">
							<div class="row">
								<input type="text" class="form-control search-bar" name="search_bar"
									   placeholder="Search by collection id, trap id"/>
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
	<div class="bg-locations-table-main-container">
		<div class="container">
			<div class="row">
				<div class="table-container">
					<table>
						<thead>
						<tr class="grey-background">
							<th>Collection Id</th>
							<th>Trap Id</th>
							<th>Run Name</th>
							<th>Collected Date</th>
							<th>Collection Status</th>
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
								echo "<td>" . $row->collection_id . "</td>";
								echo "<td>" . $row->trap_id . "</td>";
								echo "<td>" . $row->run_id . "</td>";
								echo "<td>" . $row->collect_date . "</td>";
								if ($row->collect_status == '1') {
									echo "<td>" . "Collected" . "</td>";
								}
								if ($row->collect_status == '2') {
									echo "<td>" . "Not Collected" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateBgCollection/') . $row->collection_id . "'" . ">" . "<span value=" . $row->collection_id . ">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('FieldActivitiesController/deleteBgCollection/') . $row->collection_id . "'" . ">" . "<span value=" . $row->collection_id . ">" . "Delete" . "</span></td>";
								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td>" . $row->collection_id . "</td>";
								echo "<td>" . $row->trap_id . "</td>";
								echo "<td>" . $row->run_id . "</td>";
								echo "<td>" . $row->collect_date . "</td>";
								if ($row->collect_status == '1') {
									echo "<td>" . "Collected" . "</td>";
								}
								if ($row->collect_status == '2') {
									echo "<td>" . "Not Collected" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateBgCollection/') . $row->collection_id . "'" . ">" . "<span value=" . $row->collection_id . ">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('FieldActivitiesController/deleteBgCollection/') . $row->collection_id . "'" . ">" . "<span value=" . $row->collection_id . ">" . "Delete" . "</span></td>";
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
