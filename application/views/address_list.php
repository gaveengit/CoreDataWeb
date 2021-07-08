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
	<script>
		var confirm_delete_message="Are you sure to delete this record?";
	</script>
</head>
<body>
<div class="persons-list-main-container">
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
					<li><a class="#" onclick="location.href='<?php echo site_url('FieldActivitiesController');?>'">Field Activities</a></li>
					<li><a class="selected">Addresses</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Addresses</h3>
					</div>
					<div class="button-container">
						<button type="submit" class="btn btn-success add-btn" onclick="location.href='<?php echo
						site_url('FieldActivitiesController/addAddresses');?>'">
							Add New Address
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-bar-main-container">
		<div class="container">
			<div class="row">
				<div class="search-bar-secondary-container clearfix">
					<div class="col-md-8">
						<div class="row">
							<input type="text" class="form-control search-bar" name="search_bar"
								   placeholder="Search by address"/>
						</div>
					</div>
					<div class="col-md-2">
						<button class="btn btn-primary search-btn">Search</button>
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
							<th>Address Line1</th>
							<th>Address Line2</th>
							<th>Location Description</th>
							<th>Status</th>
							<th></th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i=1;
						foreach($data as $row)
						{
							if(($i%2)!=0) {
								echo "<tr class='white-background'>";
								echo "<td>" . $row->add_line1 . "</td>";
								echo "<td>" . $row->add_line2 . "</td>";
								echo "<td>" . $row->location_description . "</td>";
								echo "<td>" . $row->location_status . "</td>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateAddresses/') .$row->address_id."'" . ">" . "<span value=".$row->address_id.">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" ."if(confirm(confirm_delete_message))". "location.href=" . "'" .
										site_url('FieldActivitiesController/deleteAddress/') .$row->address_id."'" . ">" . "<span value=".$row->address_id.">" . "Delete" . "</span></td>";
								echo "</tr>";
								$i++;
							}
							else{
								echo "<tr class='grey-background'>";
								echo "<td>" . $row->add_line1 . "</td>";
								echo "<td>" . $row->add_line2 . "</td>";
								echo "<td>" . $row->location_description . "</td>";
								echo "<td>" . $row->location_status . "</td>";
								echo "<td class='run-name-cell' onclick=" . "location.href=" . "'" .
										site_url('FieldActivitiesController/updateAddresses/') .$row->address_id."'" . ">" . "<span value=".$row->address_id.">" . "View" . "</span></td>";
								echo "<td class='run-name-cell' onclick=" ."if(confirm(confirm_delete_message))". "location.href=" . "'" .
										site_url('FieldActivitiesController/deleteAddress/') .$row->address_id."'" . ">" . "<span value=".$row->address_id.">" . "Delete" . "</span></td>";
								echo "</tr>";
								$i++;
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



