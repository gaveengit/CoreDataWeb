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
<div class="update-run-main-section">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldPlanningController'); ?>'">Field
							Planning</a></li>
					<li><a class="selected">Update Field Run</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-container-main">
		<div class="container">
			<div class="row">
				<div class="title-container">
					<h3 class="title">
						Update Field Run
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="form-main-container">
						<div class="form-container">
							<form method="post" action="<?php echo
							site_url('FieldRunsController/saveUpdateRun'); ?>">
								<div class="form-group clearfix">
									<label class="control-label col-md-4" for="email">Name:</label>
									<div class="col-md-8">
										<input type="text" class="form-control" id="run-name"
											   name="run-name" value="<?php echo $main_data[0]->field_run_id ?>"
											   readonly>
									</div>
								</div>

								<div class="form-group clearfix">
									<label class="control-label col-md-4" for="type">Type:</label>
									<div class="col-md-8">

										<input type="text" class="form-control" id="run-type"
											   name="run-type" value="<?php echo $run_type[0]['type'] ?>" readonly>

									</div>

								</div>

								<div class="form-group clearfix">
									<label class="control-label col-md-4" for="email">Run Description:</label>
									<div class="col-md-8">
							<textarea class="form-control" id="run_description" style="height:200px;" name="description"
							><?php echo $main_data[0]->description ?></textarea>
									</div>

								</div>

								<div class="button-container clearfix">
									<div class="col-md-12">
										<div class="footer-button-container">
											<button class="btn btn-success save-btn" type="submit">Save</button>
											<button class="btn btn-primary cancel-btn" type="reset">Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="title-container">
						<h4>Field Locations</h4>
					</div>
					<div class="locations-list-container">
						<?php
						if (isset($ovi_points)) {
							echo "<ul>";
							foreach ($ovi_points as $row) {
								echo "<li>" . $row->ovi_trap_id . "</li>";
							}
							echo "</ul>";
						}
						if (isset($bg_points)) {
							echo "<ul>";
							foreach ($bg_points as $row) {
								echo "<li>" . $row->bg_trap_id . "</li>";
							}
							echo "</ul>";
						}
						if (isset($mrc_points)) {
							echo "<ul>";
							foreach ($mrc_points as $row) {
								echo "<li>" . $row->mrc_trap_id . "</li>";
							}
							echo "</ul>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


