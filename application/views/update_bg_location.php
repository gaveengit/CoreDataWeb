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
<div class="update-bg-main-container">
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
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/bgLocations'); ?>'">BG
							Locations</a></li>
					<li><a class="selected">Update BG Location</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update BG Location</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo
				site_url('FieldActivitiesController/saveUpdateBg'); ?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">BG Trap Id (*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="trap-id" placeholder="Enter Trap Id"
								   name="trap-id" value="<?php echo $data[0]->trap_id ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="status"
									name="status">
								<option value="1" <?php if ($data[0]->trap_status == '1'): ?> selected="selected"<?php endif; ?>>
									Proposed
								</option>
								<option value="2" <?php if ($data[0]->trap_status == '2'): ?> selected="selected"<?php endif; ?>>
									Set
								</option>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Trap Position(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="position" placeholder="Enter trap position"
								   name="position" value="<?php echo $data[0]->trap_position ?>">
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
								   name="coordinates" value="<?php echo $data[0]->coordinates ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Contact Person(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="person-name"
									name="person-name">
								<option value="<?php echo $data[0]->person_id ?>">
									<?php echo $data[0]->person_name . "," . $data[0]->contact_number ?>
								</option>
								<?php
								foreach ($persondata as $row) {
									echo '
							<option value="' . $row->Person_id . '">' . $row->Full_name . ' , ' . $row->Contact_number . '</option>
							';
								}
								?>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Address(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="address"
									name="address">
								<option value="<?php echo $data[0]->address_id ?>">
									<?php echo $data[0]->add_line1 . "," . $data[0]->add_line2 ?>
								</option>
								<?php
								foreach ($addressdata as $row) {
									echo '
							<option value="' . $row->address_id . '">' . $row->add_line1 . ' ' . $row->add_line2 . '</option>
							';
								}
								?>
							</select>
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Date(*):</label>
						</div>
						<div class="col-md-6">
							<input type="date" class="form-control" id="bg-date" placeholder="Enter Date"
								   name="bg-date" value="<?php echo $data[0]->bg_date ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Time(*):</label>
						</div>
						<div class="col-md-6">
							<input type="time" class="form-control" id="bg-time" placeholder="Enter Time"
								   name="bg-time" value="<?php echo $data[0]->bg_time ?>">
						</div>
					</div>
					<div class="table-container">
						<table>
							<thead>
							<tr class="grey-background">
								<th>Collection Id</th>
								<th>Set Date</th>
								<th>Collected Date</th>
								<th>Trap Position</th>
								<th>Address</th>
							</tr>
							</thead>
							<tbody>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="grey-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							<tr class="white-background">
								<td class="run-name-cell">BG_Run_Nug1</td>
								<td>Proposed</td>
								<td>Kamal Fernando</td>
								<td>No.20, Colombo 10</td>
								<td>No.20, Colombo 10</td>
							</tr>
							</tbody>
						</table>
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
								<button class="btn btn-success save-btn" type="submit" name="save-btn"
										value="<?php echo $data[0]->trap_id ?>">Save
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
	var marker_def = new L.marker([<?php echo $data[0]->coordinates ?>]).addTo(mymap);
	var marker;
	mymap.on('click', function (e) {
		if (marker != null) {
			mymap.removeLayer(marker);
		}
		if (marker_def != null) {
			mymap.removeLayer(marker_def);
		}
		document.getElementById("coordinates").value = e.latlng.lat + "," + e.latlng.lng;
		marker = new L.marker(e.latlng).addTo(mymap);
	});

	function formValidation() {
		document.getElementById("error-msg").innerHTML = "";
		var trap_id = document.getElementById("trap-id").value;
		var status = document.getElementById("status").value;
		var position = document.getElementById("position").value;
		var coordinates = document.getElementById("coordinates").value;
		var person_name = document.getElementById("person-name").value;
		var address = document.getElementById("address").value;
		var bg_date = document.getElementById("bg-date").value;
		var bg_time = document.getElementById("bg-time").value;
		if (trap_id.length == 0 || status == '0' || position.length == 0 || coordinates.length == 0 ||
				person_name == '0' || address == '0' || bg_date.length == 0 || bg_time.length == 0) {
			document.getElementById("error-msg").innerHTML = "Please fill all required fields.";
			return false;
		} else {
			document.getElementById("error-msg").classList.add("error-msg-invisible");
			return true;
		}
	}
</script>
</body>
</html>

