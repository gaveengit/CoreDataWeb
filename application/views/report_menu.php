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
<div class="field-activities-main-menu-section">
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
					<li><a class="selected" >Reports Menu</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="menu-container-main">
		<div class="container">
			<div class="row">
				<div class="menu-container-secondary">
					<div class="item-container grey-background" onclick="location.href='<?php echo site_url('ReportController/goOviPerformanceReportGenerate');?>'">
						<span class="menu-item">OVI Performance Report</span>
					</div>
					<div class="item-container white-background" onclick="location.href='<?php echo site_url('FieldActivitiesController/bgCollections');?>'">
						<span class="menu-item">BG Performance Report</span>
					</div>
					<div class="item-container grey-background" onclick="location.href='<?php echo site_url('FieldActivitiesController/bgServices');?>'">
						<span class="menu-item">MRC Performance Report</span>
					</div>
					<div class="item-container white-background" onclick="location.href='<?php echo site_url('FieldActivitiesController/ovLocations');?>'">
						<span class="menu-item">Mosquito Diagnostics Report</span>
					</div>
					<div class="item-container grey-background" onclick="location.href='<?php echo site_url('FieldActivitiesController/ovCollections');?>'">
						<span class="menu-item">Mosquito Screening Report</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

