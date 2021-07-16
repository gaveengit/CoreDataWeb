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
<div class="view-map-layer-main-section">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('SpatialDataController');?>'">Spatial Data</a></li>
					<li><a class="selected">Map View</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title">
						Map View
					</h3>
					<h4 class="title-map-name">
						Map Layer Name: <?php echo $data[0]->name ;?>
					</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="map-container">
		<div class="container">
			<div class="row">
				<div id="mapid"></div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	var mymap = L.map('mapid').setView([6.9342,79.8920],11);
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
	<?php foreach ($data as $cure): ?>
	var myGeoJSON = <?php echo $cure->geojson_content;?>;
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

</script>
</body>
</html>


