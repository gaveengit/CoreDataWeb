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
					<li><a href="#">Home</a></li>
					<li><a class="#">Field Incidents</a></li>
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
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Community Member Name(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Full Name"
							   name="trap-id">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Email:</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Contact Number"
							   name="trap-id">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Phone(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="trap-id" placeholder="Enter Contact Number"
							   name="trap-id">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Incident Type(*):</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="incident_type">
							<option>Select From Here</option>
						</select>
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Incident Priority(*):</label>
					</div>
					<div class="col-md-6">
						<select class="form-control" id="incident_type">
							<option>Select From Here</option>
						</select>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Description(*):</label>
					</div>
					<div class="col-md-6">
						<textarea class="form-control" style="height:100px;"
								  id="description"></textarea>
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Date of Incident(*):</label>
					</div>
					<div class="col-md-6">
						<input type="date" class="form-control" id="incident-date">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Time of Incident(*):</label>
					</div>
					<div class="col-md-6">
						<input type="time" class="form-control" id="incident-date">
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
						<input type="text" class="form-control" id="incident-date">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Full Address(*):</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="incident-date">
					</div>
				</div>

				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Location Description:</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="incident-date">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Grama Niladhari Division:</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="incident-date">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Trap Code:</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="incident-date">
					</div>
				</div>
				<div class="element-row clearfix">
					<div class="col-md-2">
						<label class="control-label">Action Taken:</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" id="incident-date">
					</div>
				</div>
				<div class="element-row clearfix">
				<div class="col-md-2">
					<label class="control-label">Date of Action(*):</label>
				</div>
				<div class="col-md-6">
					<input type="date" class="form-control" id="incident-date">
				</div>
			</div>
			<div class="element-row clearfix">
				<div class="col-md-2">
					<label class="control-label">Time of Action(*):</label>
				</div>
				<div class="col-md-6">
					<input type="time" class="form-control" id="incident-date">
				</div>
			</div>

				<div class="button-container clearfix">
					<div class="col-md-7">
						<div class="footer-button-container">
							<button class="btn btn-success save-btn">Save</button>
							<button class="btn btn-primary cancel-btn">Cancel</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var mymap = L.map('mapid').setView([51.505, -0.09],2);
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
</script>
</body>
</html>


