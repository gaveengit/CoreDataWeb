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
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/mrcReleases'); ?>'">MRC
							Releases</a></li>
					<li><a class="selected">MRC Releases Search</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">MRC Releases</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('FieldActivitiesController/addMrcRelease'); ?>'">
							Add New MRC Release
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
					site_url('FieldActivitiesController/searchMrcReleases'); ?>">
						<div class="col-md-8">
							<div class="row">
								<input type="text" class="form-control search-bar" name="search_bar"
									   placeholder="Search by release id, mrc identifier"
									   value="<?php echo $search_key[0] ?>"/>
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
							<th>Release Id</th>
							<th>MRC Id</th>
							<th>Run Name</th>
							<th>Released Date</th>
							<th>Release Status</th>
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
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcRelease/') . $row->release_id . "'" . ">" . "<span value=" . $row->release_id . ">" . $row->release_id . "</span></td>";

								echo "<td>" . $row->identifier . "</td>";
								echo "<td>" . $row->run_id . "</td>";
								echo "<td>" . $row->released_date . "</td>";
								if ($row->released_status == '1') {
									echo "<td>" . "Released" . "</td>";
								}
								if ($row->released_status == '2') {
									echo "<td>" . "Not Released" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcRelease/') . $row->release_id . "'" . ">" . "<span value=" . $row->release_id . ">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('FieldActivitiesController/deleteMrcRelease/') . $row->release_id . "'" . ">" . "<span value=" . $row->release_id . ">" . "Delete" . "</span></td>";
								echo "</tr>";
								$i++;
							} else {
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcRelease/') . $row->release_id . "'" . ">" . "<span value=" . $row->release_id . ">" . $row->release_id . "</span></td>";

								echo "<td>" . $row->identifier . "</td>";
								echo "<td>" . $row->run_id . "</td>";
								echo "<td>" . $row->released_date . "</td>";
								if ($row->released_status == '1') {
									echo "<td>" . "Released" . "</td>";
								}
								if ($row->released_status == '2') {
									echo "<td>" . "Not Released" . "</td>";
								}
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcRelease/') . $row->release_id . "'" . ">" . "<span value=" . $row->release_id . ">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" . "if(confirm(confirm_delete_message))" . "location.href=" . "'" .
										site_url('FieldActivitiesController/deleteMrcRelease/') . $row->release_id . "'" . ">" . "<span value=" . $row->release_id . ">" . "Delete" . "</span></td>";
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


