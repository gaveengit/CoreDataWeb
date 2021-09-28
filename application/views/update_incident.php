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
<div class="update-incident-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('IncidentController'); ?>'">Field
							Incidents</a></li>
					<li><a class="selected">Update Incident</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update Incident</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('IncidentController/saveUpdateIncident'); ?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Community Member Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="member-name" placeholder="Enter Full Name"
								   name="member-name" value="<?php echo $data[0]->member_name ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Email:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="email" placeholder="Enter Contact Number"
								   name="email" value="<?php echo $data[0]->email ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Phone(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="phone" placeholder="Enter Contact Number"
								   name="phone" value="<?php echo $data[0]->phone ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Incident Type(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="incident_type" name="incident_type">
								<option value="1" <?php if ($data[0]->incident_type == '1'): ?> selected="selected"<?php endif; ?>>
									Community Complaint
								</option>
								<option value="2" <?php if ($data[0]->incident_type == '2'): ?> selected="selected"<?php endif; ?>>
									Community Enquiry
								</option>
								<option value="3" <?php if ($data[0]->incident_type == '3'): ?> selected="selected"<?php endif; ?>>
									Operational Incident
								</option>

							</select>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Incident Priority(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="incident_priority" name="incident_priority">
								<option value="1" <?php if ($data[0]->incident_priority == '1'): ?> selected="selected"<?php endif; ?>>
									High
								</option>
								<option value="2" <?php if ($data[0]->incident_priority == '2'): ?> selected="selected"<?php endif; ?>>
									Medium
								</option>
								<option value="3" <?php if ($data[0]->incident_priority == '3'): ?> selected="selected"<?php endif; ?>>
									Low
								</option>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Description(*):</label>
						</div>
						<div class="col-md-6">
						<textarea class="form-control" style="height:100px;"
								  id="description" name="description"><?php echo $data[0]->description ?></textarea>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Date of Incident(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" class="form-control" id="incident-date" name="incident-date"
								   value="<?php echo $data[0]->incident_date ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Time of Incident(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" class="form-control" id="incident-time" name="incident-time"
								   value="<?php echo $data[0]->incident_time ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Location Point:</label>
						</div>
						<div class="col-md-6">
							<div id="mapid"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Location Coordinates:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="coordinates" name="coordinates"
								   value="<?php echo $data[0]->coordinates ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Full Address(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="full-address" name="full-address"
								   value="<?php echo $data[0]->full_address ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Location Description:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="location-description"
								   name="location-description"
								   value="<?php echo $data[0]->location_description ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Grama Niladhari Division:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="gnd" name="gnd"
								   value="<?php echo $data[0]->gnd ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Trap Code:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="trap-code" name="trap-code"
								   value="<?php echo $data[0]->trap_code ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Action Taken:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="action-taken" name="action-taken"
								   value="<?php echo $data[0]->action_taken ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Date of Action(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" class="form-control" id="action-date" name="action-date"
								   value="<?php echo $data[0]->action_date ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Time of Action(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" class="form-control" id="action-time" name="action-time"
								   value="<?php echo $data[0]->action_time ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Status:</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="incident-status" name="incident-status">
								<option <?php if ($data[0]->incident_status == 'Pending'): ?> selected="selected"<?php endif; ?>>
									Pending
								</option>
								<option <?php if ($data[0]->incident_status == 'Completed'): ?> selected="selected"<?php endif; ?>>
									Completed
								</option>
								<option <?php if ($data[0]->incident_status == 'Removed'): ?> selected="selected"<?php endif; ?>>
									Removed
								</option>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
						</div>
						<div class="col-md-6">
							<div class="error-msg" id="error-msg"></div>
						</div>
					</div>

					<div class="button-container clearfix">
						<div class="col-md-7">
							<div class="footer-button-container">
								<button class="btn btn-success save-btn" name="save-btn" type="submit"
										value="<?php echo $data[0]->incident_id ?>">Save
								</button>
								<button class="btn btn-primary cancel-btn" type="reset">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var mymap = L.map('mapid').setView([6.9122, 79.8829], 12);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=sk.eyJ1IjoiZ2F2ZWVua2l0aCIsImEiOi' +
			'Jja3BubWx0NjIwdG81MnBxcXg2dmsxcXFyIn0.O7EZAp4PvrWygKz44f8c3A', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'your.mapbox.access.token'
	}).addTo(mymap);
	var marker_def = new L.marker([<?php echo $data[0]->coordinates ?>]).addTo(mymap);
	var marker;
	mymap.on('click', function(e) {
		if(marker!=null){
			mymap.removeLayer(marker);
		}
		if(marker_def!=null){
			mymap.removeLayer(marker_def);
		}
		document.getElementById("coordinates").value = e.latlng.lat + "," + e.latlng.lng;
		marker = new L.marker(e.latlng).addTo(mymap);
	});

	function formValidation() {
		document.getElementById("error-msg").innerHTML = "";
		if (document.getElementById("member-name").value.length == 0 || document.getElementById("phone").value.length == 0
				|| document.getElementById("description").value.length == 0 || document.getElementById("incident-date").value.length == 0 || document.getElementById("incident-time").value.length == 0 ||
				document.getElementById("full-address").value.length == 0 || document.getElementById("incident_type").value
				== '0' || document.getElementById("incident_priority").value == '0') {
			//alert("Please fill all required fields first");
			document.getElementById("error-msg").innerHTML = "Please fill all required fields.";
			return false;
		} else {
			document.getElementById("error-msg").innerHTML = "";
			return true;
		}
	}

</script>
</body>
</html>


