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
<div class="screening-list-main-container">
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
					<li><a class="selected">Screening Results</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Screening Results</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('ScreeningController/addScreening');?>'">
							Add New Screening Result
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-locations-table-main-container">
		<div class="container">
			<div class="row">
				<div class="table-container">
					<table>
						<thead>
						<tr class="grey-background">
						<tr class="grey-background">
							<th>Diagnostic Id</th>
							<th>Identification Id</th>
							<th>Male Aygypti</th>
							<th>Female Aygypti</th>
							<th>Male Anopheles</th>
							<th>Female Anopheles</th>
							<th>Male Culex</th>
							<th>Female Culex</th>
							<th>Status</th>
						</tr>
						</tr>
						</thead>
						<tbody>
						<?php
						$i=1;
						foreach($data as $row) {
							if (($i % 2) != 0) {
								echo "<tr class='white-background'>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('ScreeningController/updateScreening/') . $row->screening_id . "'" . ">" . "<span value=" . $row->screening_id . ">" . $row->screening_id . "</span></td>";

								echo "<td>" . $row->identification_id . "</td>";
								echo "<td>" . $row->male_aedes_aegypti_result . "</td>";
								echo "<td>" . $row->female_aedes_aegypti_result . "</td>";
								echo "<td>" . $row->male_anopheles_result . "</td>";
								echo "<td>" . $row->female_anopheles_result . "</td>";
								echo "<td>" . $row->male_culex_result . "</td>";
								echo "<td>" . $row->female_culex_result . "</td>";
								if ($row->status == '1') {
									echo "<td>" . "Success" . "</td>";
								}
								if ($row->status == '2') {
									echo "<td>" . "Unsuccess" . "</td>";
								}
								echo "</tr>";
								$i++;
							} else {
								if (($i % 2) == 0) {
									echo "<tr class='white-background'>";
									echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
											site_url('ScreeningController/updateScreening/') . $row->screening_id . "'" . ">" . "<span value=" . $row->screening_id . ">" . $row->screening_id . "</span></td>";

									echo "<td>" . $row->identification_id . "</td>";
									echo "<td>" . $row->male_aedes_aegypti_result . "</td>";
									echo "<td>" . $row->female_aedes_aegypti_result . "</td>";
									echo "<td>" . $row->male_anopheles_result . "</td>";
									echo "<td>" . $row->female_anopheles_result . "</td>";
									echo "<td>" . $row->male_culex_result . "</td>";
									echo "<td>" . $row->female_culex_result . "</td>";
									if ($row->status == '1') {
										echo "<td>" . "Success" . "</td>";
									}
									if ($row->status == '2') {
										echo "<td>" . "Unsuccess" . "</td>";
									}
									echo "</tr>";
									$i++;
								}
							}
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

