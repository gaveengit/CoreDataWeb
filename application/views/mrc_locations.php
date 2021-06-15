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
<div class="mrc-locations-list-main-container">
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
					<li><a class="selected">MRC Locations</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">MRC Locations</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('FieldActivitiesController/addMrcLocations');?>'">
							Add New MRC Location
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
							<th>Mrc Identifier</th>
							<th>Status</th>
							<th>Contact Person</th>
							<th>Contact Number</th>
							<th>Address</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i=1;
						foreach($data as $row)
						{
							if(($i%2)!=0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcLocations/') .$row->trap_id."'" . ">" . "<span value=".$row->trap_id.">" . $row->trap_id . "</span></td>";

								if($row->trap_status=='1') {
									echo "<td>" . "Proposed" . "</td>";
								}
								if($row->trap_status=='2') {
									echo "<td>" . "Deployed" . "</td>";
								}

								echo "<td>" . $row->person_name . "</td>";
								echo "<td>" . $row->contact_number . "</td>";
								echo "<td>" . $row->add_line1 ." ".$row->add_line2. "</td>";
								echo "</tr>";
								$i++;
							}
							else{
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateMrcLocations/') .$row->trap_id."'" . ">" . "<span value=".$row->trap_id.">" . $row->trap_id . "</span></td>";

								if($row->trap_status=='1') {
									echo "<td>" . "Proposed" . "</td>";
								}
								if($row->trap_status=='2') {
									echo "<td>" . "Deployed" . "</td>";
								}

								echo "<td>" . $row->person_name . "</td>";
								echo "<td>" . $row->contact_number . "</td>";
								echo "<td>" . $row->add_line1 ." ".$row->add_line2. "</td>";
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

