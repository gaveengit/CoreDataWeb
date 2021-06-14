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
<div class="screening-list-main-container">
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
					<li><a class="selected">Field Incidents</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Field Incidents</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('IncidentController/addIncident');?>'">
							Add New Field Incident
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
							<th>Member</th>
							<th>Type</th>
							<th>Priority</th>
							<th>Incident Date</th>
							<th>Incident Time</th>
							<th>Full Address</th>
							<th>Action Status</th>
						</tr>
						</thead>
						<tbody>
						<tbody>
						<?php
						$i=1;
						foreach($data as $row)
						{
							if(($i%2)!=0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('IncidentController/updateIncident/') .$row->incident_id."'" . ">" . "<span value=".$row->incident_id.">" . $row->member_name . "</span></td>";
								if($row->incident_type=='1') {
									echo "<td>" . "Community Complaint" . "</td>";
								}
								if($row->incident_type=='2') {
									echo "<td>" . "Community Enquiry" . "</td>";
								}
								if($row->incident_type=='3') {
									echo "<td>" . "Operational Incident" . "</td>";
								}
								if($row->incident_priority=='1') {
									echo "<td>" . "High" . "</td>";
								}
								if($row->incident_priority=='2') {
									echo "<td>" . "Medium" . "</td>";
								}
								if($row->incident_priority=='3') {
									echo "<td>" . "Low" . "</td>";
								}
								echo "<td>" . $row->incident_date . "</td>";
								echo "<td>" . $row->incident_time . "</td>";
								echo "<td>" . $row->full_address . "</td>";
								echo "<td>" . $row->incident_status . "</td>";
								echo "</tr>";
								$i++;
							}
							else{
								echo "<tr class='grey-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('IncidentController/updateIncident/') .$row->incident_id."'" . ">" . "<span value=".$row->incident_id.">" . $row->member_name . "</span></td>";
								echo "<td>" . $row->incident_type . "</td>";
								echo "<td>" . $row->incident_priority . "</td>";
								echo "<td>" . $row->incident_date . "</td>";
								echo "<td>" . $row->incident_time . "</td>";
								echo "<td>" . $row->full_address . "</td>";
								echo "<td>" . $row->incident_status . "</td>";
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

