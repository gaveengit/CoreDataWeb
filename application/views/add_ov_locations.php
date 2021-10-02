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
<div class="add-ov-main-container">
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
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/ovLocations'); ?>'">OVI
							Locations</a></li>
					<li><a class="selected">Add OVI Location</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Add New OVI Location</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('FieldActivitiesController/saveOvi'); ?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">OVI Trap Id (*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="trap-id" placeholder="Enter Trap Id"
								   name="trap-id" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="status"
									name="status">
								<option value="0" selected disabled>Select From Here</option>
								<option value="1">Proposed</option>
								<option value="2">Set</option>
							</select>
							<div class="status-error-container" style="display: none;color: red;" id="status-error-container"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Trap Position(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="position" placeholder="Enter Trap Position"
								   name="position" required>
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
							<label class="control-label">Location Coordinates(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="coordinates" placeholder="Enter coordinates"
								   name="coordinates" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Contact Person(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="person-name"
									name="person-name" autocomplete="on">
								<option value="0" selected disabled>Select From Here</option>
								<?php
								foreach ($persondata as $row) {
									echo '
							<option value="' . $row->Person_id . '">' . $row->Full_name . ' , ' . $row->Contact_number . '</option>
							';
								}
								?>
							</select>
							<div class="person-error-container" style="display: none;color: red;" id="person-error-container"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Address(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="address"
									name="address" autocomplete="on">
								<option value="0" selected disabled>Select From Here</option>
								<?php
								foreach ($addressdata as $row) {
									echo '
							<option value="' . $row->address_id . '">' . $row->add_line1 . ' ' . $row->add_line2 . '</option>
							';
								}
								?>
							</select>
							<div class="address-error-container" style="display: none;color: red;" id="address-error-container"></div>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" class="form-control" id="ov-date" placeholder="Enter Date"
								   name="ov-date" max="<?php echo date("Y-m-d"); ?>" required>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" class="form-control" id="ov-time" placeholder="Enter Time"
								   name="ov-time" required>
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
								<button class="btn btn-success save-btn" type="submit" id="save-btn">Save</button>
								<button class="btn btn-primary cancel-btn" type="reset">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	var mymap = L.map('mapid').setView([6.9122,79.8829], 12);
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
	<?php foreach ($mapdata as $map): ?>
	var myGeoJSON = <?php echo $map->geojson_content;?>;
	L.geoJSON(myGeoJSON,{
		onEachFeature: function (feature, layer) {
			//layer.bindPopup("ID: " + feature.type);
			if (typeof feature.properties.ADM4_EN === 'undefined') {
				layer.setStyle({color :'red',fillColor:'transparent'})
			}
			else {
				layer.bindTooltip(feature.properties.ADM4_EN, {permanent: true, direction: 'right'}).openTooltip();
				layer.setStyle({color :'blue',fillColor:'transparent'})
			}
		}
	}).addTo(mymap);
	<?php endforeach; ?>
	var marker;
	mymap.on('click', function (e) {
		if (marker != null) {
			mymap.removeLayer(marker);
		}
		document.getElementById("coordinates").value = e.latlng.lat + "," + e.latlng.lng;
		marker = new L.marker(e.latlng).addTo(mymap);
	});
	document.getElementById("error-msg").innerHTML = "";

	function formValidation() {
		var trap_id = document.getElementById("trap-id").value;
		var status = document.getElementById("status").value;
		var position = document.getElementById("position").value;
		var coordinates = document.getElementById("coordinates").value;
		var person_name = document.getElementById("person-name").value;
		var address = document.getElementById("address").value;
		var ovi_date = document.getElementById("ov-date").value;
		var ovi_time = document.getElementById("ov-time").value;

		document.getElementById("status-error-container").style.display = 'none';
		document.getElementById("address-error-container").style.display = 'none';
		document.getElementById("person-error-container").style.display = 'none';
		document.getElementById("status").style.borderColor="#ccc";
		document.getElementById("address").style.borderColor="#ccc";
		document.getElementById("person-name").style.borderColor="#ccc";

		var error_flag = 0;

		if(status==false){
			error_flag=1;
			document.getElementById("status").style.borderColor="red";
			document.getElementById("status-error-container").style.display = 'block';
			document.getElementById("status-error-container").innerHTML = "Please select a status.";
		}
		if(address==false){
			error_flag=1;
			document.getElementById("address").style.borderColor="red";
			document.getElementById("address-error-container").style.display = 'block';
			document.getElementById("address-error-container").innerHTML = "Please select a address.";
		}
		if(person_name==false){
			error_flag=1;
			document.getElementById("person-name").style.borderColor="red";
			document.getElementById("person-error-container").style.display = 'block';
			document.getElementById("person-error-container").innerHTML = "Please select a person.";
		}

		if (error_flag==0) {
			return true;
		} else {
			return false;
		}
	}
</script>
</body>
</html>
