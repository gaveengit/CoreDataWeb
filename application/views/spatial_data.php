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
<div class="field-runs-list-main-container">
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
					<li><a onclick="location.href='<?php echo site_url('MainMenuController');?>'">Home</a></li>
					<li><a class="selected">Spatial List</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Map Layers</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('SpatialDataController/addNewMap');?>'">
							Add New Map Layer
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="field-runs-table-main-container">
		<div class="container">
			<div class="row">
				<div class="table-container">
					<table>
						<thead>
						<tr class="grey-background">
							<th>Map Layer Name</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<tr class="white-background">
							<td class="run-name-cell"><span onclick="location.href='<?php echo
								site_url('SpatialDataController/updateMap');?>'">Mattakkuliya Map</span></td>
							<td class="map-view-link"><u><span class="link" onclick="location.href='<?php echo
									site_url('SpatialDataController/mapView');?>'">Map View</span></u></td>
						</tr>
						<tr class="grey-background">
							<td class="run-name-cell"><span>Mattakkuliya Map</span></td>
							<td class="map-view-link"><u><span class="link">Map View</span></u></td>
						</tr>
						<tr class="white-background">
							<td class="run-name-cell"><span>Mattakkuliya Map</span></td>
							<td class="map-view-link"><u><span class="link">Map View</span></u></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
