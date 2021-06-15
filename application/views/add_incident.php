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
<div class="add-incident-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('IncidentController'); ?>'">Field
							Incidents</a></li>
					<li><a class="selected">Add New Incident</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New Incident</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('IncidentController/saveIncident');?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Community Member Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="member-name" placeholder="Enter Full Name"
								   name="member-name">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Email:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="email" placeholder="Enter Contact Number"
								   name="email">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Phone(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="phone" placeholder="Enter Contact Number"
								   name="phone">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Incident Type(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="incident_type" name="incident_type">
								<option value="0">Select From Here</option>
								<option value="1">Community Complaint</option>
								<option value="2">Community Enquiry</option>
								<option value="3">Operational Incident</option>
							</select>
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Incident Priority(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="incident_priority" name="incident_priority">
								<option value="0">Select From Here</option>
								<option value="1">High</option>
								<option value="2">Medium</option>
								<option value="3">Low</option>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Description(*):</label>
						</div>
						<div class="col-md-6">
						<textarea class="form-control" style="height:100px;"
								  id="description" name="description"></textarea>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Date of Incident(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" class="form-control" id="incident-date" name="incident-date">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Time of Incident(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" class="form-control" id="incident-time" name="incident-time">
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
							<input type="text" class="form-control" id="coordinates" name="coordinates">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Full Address(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="full-address" name="full-address">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Location Description:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="location-description"
								   name="location-description">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Grama Niladhari Division:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="gnd" name="gnd">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Trap Code:</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="trap-code" name="trap-code">
						</div>
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
						<button class="btn btn-success save-btn" type="submit" name="save-btn">Save</button>
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

	var mymap = L.map('mapid').setView([6.9122,79.8829], 10);
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
	var marker;
	mymap.on('click', function(e) {
		if(marker!=null){
			mymap.removeLayer(marker);
		}
		document.getElementById("coordinates").value = e.latlng.lat + "," + e.latlng.lng;
		marker = new L.marker(e.latlng).addTo(mymap);
	});

	function formValidation() {

		document.getElementById("error-msg").innerHTML = "";
		if (document.getElementById("member-name").value.length == 0 || document.getElementById("phone").value.length == 0
				|| document.getElementById("description").value.length == 0 || document.getElementById("incident-date").value.length == 0 || document.getElementById("incident-time").value.length == 0 ||
				document.getElementById("full-address").value.length == 0 || document.getElementById("incident_type").value
		== '0' || document.getElementById("incident_priority").value=='0') {
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

