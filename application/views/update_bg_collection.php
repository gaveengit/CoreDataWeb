<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	/>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
</head>
<body>
<div class="update-bg-Collection-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController'); ?>'">Field
							Activities</a></li>
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/bgCollections'); ?>'">BG
							Collections</a></li>
					<li><a class="selected">Update BG Collection</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update BG Collection</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('FieldActivitiesController/saveUpdateBgCollection'); ?>">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collection Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="collection-id" placeholder="Enter Trap Id"
								   name="collection-id" value="<?php echo $data[0]->collection_id ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">BG Trap Id(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="trap-id"
								   name="trap-id" value="<?php echo $data[0]->trap_id ?>" readonly>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collect Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" id="collect_date" name="collect_date" class="form-control"
								   value="<?php echo $data[0]->collect_date ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collect Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" id="collect_time" name="collect_time" class="form-control"
								   value="<?php echo $data[0]->collect_time ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Collection Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="collect_status"
									name="collect_status">
								<option value="1" <?php if ($data[0]->collect_status == '1'): ?> selected="selected"<?php endif; ?>>
									Collected
								</option>
								<option value="2" <?php if ($data[0]->collect_status == '2'): ?> selected="selected"<?php endif; ?>>
									Not Collected
								</option>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Identification Results(*):</label>
						</div>
					</div>

					<div class="table-container">
						<table>
							<thead>
							<tr class="grey-background">
								<th>Identification Id</th>
								<th>Identified Date</th>
								<th>Identification Status</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if(count($identificationdata)>0) {
								$i = 1;
								foreach ($identificationdata as $row) {
									if (($i % 2) != 0) {
										echo "<tr class='white-background'>";
										echo "<td>" . $row->identification_id . "</td>";
										echo "<td>" . $row->identified_date . "</td>";
										if ($row->status == '1') {
											echo "<td>" . "Success" . "</td>";
										}
										if ($row->status == '2') {
											echo "<td>" . "Not Success" . "</td>";
										}
										echo "</tr>";
										$i++;
									} else {
										if (($i % 2) == 0) {
											echo "<tr class='white-background'>";
											echo "<td>" . $row->identification_id . "</td>";
											echo "<td>" . $row->identified_date . "</td>";
											if ($row->status == '1') {
												echo "<td>" . "Success" . "</td>";
											}
											if ($row->status == '2') {
												echo "<td>" . "Not Success" . "</td>";
											}
											echo "</tr>";
											$i++;
										}
									}
								}
							}
							?>
							</tbody>
						</table>
					</div>


					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" value="<?php echo $data[0]->collection_id ?>"
										name="save-btn">Save
								</button>
								<button class="btn btn-primary cancel-btn">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

