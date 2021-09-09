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
	<script>
		var confirm_delete_message = "Are you sure to delete this record?";
	</script>
</head>
<body>
<div class="gis-dashboard-main-container">
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
					<li><a class="#"
						   onclick="location.href='<?php echo site_url('DashboardController'); ?>'">Dashboards</a></li>
					<li><a class="selected">GIS Dashboard</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">GIS Dashboard</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="dashboard-secondary-container">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<form action="<?php echo
					site_url('DashboardController/loadGisDashboard'); ?>" method="post">
						<div class="form-group">
							<label>Field Location Type:</label>
							<select class="form-control" id="field_type"
									name="field_type" onchange='this.form.submit()'>
								<option value="0" <?php if ($field_type == '0'): ?>selected="selected"<?php endif; ?>>
									Select from Here
								</option>
								<option value="1" <?php if ($field_type == '1'): ?>selected="selected"<?php endif; ?>>BG
									Locations
								</option>
								<option value="2" <?php if ($field_type == '2'): ?>selected="selected"<?php endif; ?>>
									OVI Locations
								</option>
								<option value="3" <?php if ($field_type == '3'): ?>selected="selected"<?php endif; ?>>
									MRC Locations
								</option>
							</select>
						</div>
						<div class="form-group">
							<label>Field Activity Type:</label>
							<select class="form-control" id="activity_type"
									name="activity_type" onchange='this.form.submit()'>
								<?php if (isset($activity_type) && $activity_type == '1' && isset($field_type) && $field_type == '1') {
									echo '
							<option value="' . $activity_type . '">' . 'BG Services' . '</option>
							';
								}
								?>
								<?php if (isset($activity_type) && $activity_type == '2' && isset($field_type) && $field_type == '1') {
									echo '
							<option value="' . $activity_type . '">' . 'BG Collections' . '</option>
							';
								}
								?>
								<?php if (isset($activity_type) && $activity_type == '1' && isset($field_type) && $field_type == '2') {
									echo '
							<option value="' . $activity_type . '">' . 'OVI Services' . '</option>
							';
								}
								?>
								<?php if (isset($activity_type) && $activity_type == '2' && isset($field_type) && $field_type == '2') {
									echo '
							<option value="' . $activity_type . '">' . 'OVI Collections' . '</option>
							';
								}
								?>
								<?php if (isset($activity_type) && $activity_type == '1' && isset($field_type) && $field_type == '3') {
									echo '
							<option value="' . $activity_type . '">' . 'MRC Services' . '</option>
							';
								}
								?>
								<?php if (isset($activity_type) && $activity_type == '2' && isset($field_type) && $field_type == '3') {
									echo '
							<option value="' . $activity_type . '">' . 'MRC Releases' . '</option>
							';
								}
								?>
								<option value="0">Select from here</option>
								<?php if (isset($field_type) && $field_type == '1') {
									echo '
							<option value="1">' . 'BG Services' . '</option>
							';
									echo '
							<option value="2">' . 'BG Collections' . '</option>
							';
								}
								?>
								<?php if (isset($field_type) && $field_type == '2') {
									echo '
							<option value="1">' . 'OVI Services' . '</option>
							';
									echo '
							<option value="2">' . 'OVI Collections' . '</option>
							';
								}
								?>
								<?php if (isset($field_type) && $field_type == '3') {
									echo '
							<option value="1">' . 'MRC Services' . '</option>
							';
									echo '
							<option value="2">' . 'MRC Releases' . '</option>
							';
								}
								?>

							</select>
						</div>

						<div class="form-group">
							<label>Run Name:</label>
							<select class="form-control" id="run_name"
									name="run_name" onchange='this.form.submit()'>
								<?php if (isset($run_name) && $run_name != '0') {
									echo '
							<option value="' . $run_name . '">' . $run_name . '</option>
							';
								}
								?>

								<option value="0">Select from here</option>
								<?php
								foreach ($rundata as $row) {
									echo '
							<option value="' . $row->field_run_id . '">' . $row->field_run_id . '</option>
							';
								}
								?>
							</select>
						</div>
					</form>
					<div class="map-legend-container-main">
						<div class="title-container">
							<h3 class="title">Map Legend</h3>
						</div>
						<div class="map-legend-secondary clearfix">
							<div class="legend-item clearfix" style="margin-bottom: 5px;">
								<div class="col-md-2">
									<div style="width: 30px;height: 30px;border-radius: 100%;background-color: dodgerblue"></div>
								</div>
								<div class="col-md-10">
									<div style="font-size: 15px;">Pending</div>
								</div>
							</div>
							<div class="legend-item clearfix" style="margin-bottom: 5px;">
								<div class="col-md-2">
									<div style="width: 30px;height: 30px;border-radius: 100%;background-color: #FFBF00"></div>
								</div>
								<div class="col-md-10">
									<div style="font-size: 15px;">Proposed/Serviced/Collected/Released</div>
								</div>
							</div>
							<div class="legend-item clearfix" style="margin-bottom: 5px;">
								<div class="col-md-2">
									<div style="width: 30px;height: 30px;border-radius: 100%;background-color: green"></div>
								</div>
								<div class="col-md-10">
									<div style="font-size: 15px;">Set/ Not Serviced/ Not Collected/ Not Released</div>
								</div>
							</div>
							<div class="legend-item clearfix" style="margin-bottom: 5px;">
								<div class="col-md-2">
									<div style="width: 30px;height: 30px;border-radius: 100%;background-color: red"></div>
								</div>
								<div class="col-md-10">
									<div style="font-size: 15px;">Excluded</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="map-container">
						<div id="mapid"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var mymap = L.map('mapid').setView([6.9186, 79.8470], 12);
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
	L.geoJSON(myGeoJSON, {
		onEachFeature: function (feature, layer) {
			//layer.bindPopup("ID: " + feature.type);
			if (typeof feature.properties.ADM4_EN === 'undefined') {
				layer.setStyle({color: 'red', fillColor: 'transparent'})
			} else {
				layer.bindTooltip(feature.properties.ADM4_EN, {permanent: true, direction: 'right'}).openTooltip();
				layer.setStyle({color: 'blue', fillColor: 'transparent'})
			}
		}
	}).addTo(mymap);
	<?php endforeach; ?>
	<?php if (isset($markerdata)){?>
	<?php foreach ($markerdata as $marker): ?>
	var greenIcon = new L.Icon({
		iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
		shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	var blueIcon = new L.Icon({
		iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
		shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	var yellowIcon = new L.Icon({
		iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
		shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	var redIcon = new L.Icon({
		iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
		shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
		iconSize: [25, 41],
		iconAnchor: [12, 41],
		popupAnchor: [1, -34],
		shadowSize: [41, 41]
	});
	var trap_status = "<?php echo $marker->trap_status;?>";
	if (trap_status == "0") {
		var marker_id = "<?php echo $marker->trap_id;?>";
		var marker = new L.marker([<?php echo $marker->coordinates;?>], {icon: blueIcon}).bindTooltip(marker_id,
				{
					permanent: true,
					direction: 'right'
				}).addTo(mymap);
	}
	if (trap_status == "1") {
		var marker_id = "<?php echo $marker->trap_id;?>";
		var marker = new L.marker([<?php echo $marker->coordinates;?>], {icon: yellowIcon}).bindTooltip(marker_id,
				{
					permanent: true,
					direction: 'right'
				}).addTo(mymap);
	}
	if (trap_status == "2") {
		var marker_id = "<?php echo $marker->trap_id;?>";
		var marker = new L.marker([<?php echo $marker->coordinates;?>], {icon: greenIcon}).bindTooltip(marker_id,
				{
					permanent: true,
					direction: 'right'
				}).addTo(mymap);
	}
	if (trap_status == "3") {
		var marker_id = "<?php echo $marker->trap_id;?>";
		var marker = new L.marker([<?php echo $marker->coordinates;?>], {icon: redIcon}).bindTooltip(marker_id,
				{
					permanent: true,
					direction: 'right'
				}).addTo(mymap);
	}
	<?php endforeach; ?>
	<?php }?>
</script>
</body>
</html>



