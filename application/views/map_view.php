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
					<li><a href="#">Home</a></li>
					<li><a class="#">Spatial Data</a></li>
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
						Map Layer Name:
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


