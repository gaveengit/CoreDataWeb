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
<div class="update-persons-main-container">
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
						   onclick="location.href='<?php echo site_url('FieldActivitiesController/persons'); ?>'">Persons</a>
					</li>
					<li><a class="selected">Update Person</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="title-button-main-container">
		<div class="container">
			<div class="row">
				<div class="title-button-secondary-container clearfix">
					<div class="title-container">
						<h3 class="title">Update Person</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-main-container">
		<div class="container">
			<div class="row">
				<form role="form" method="post" action="<?php echo
				site_url('FieldActivitiesController/saveUpdatePerson'); ?>" onSubmit="return formValidation()">
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Full Name(*):</label>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="full-name" placeholder="Enter Full Name"
								   name="full-name" value="<?php echo $data[0]->Full_name ?>">
						</div>
					</div>
					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Contact Number(*):</label>
						</div>
						<div class="col-md-6">
							<input type="number" class="form-control" id="contact-number"
								   placeholder="Enter Contact Number"
								   name="contact-number" value="<?php echo $data[0]->Contact_number ?>">
						</div>
					</div>

					<div class="element-row clearfix">
						<div class="col-md-2">
							<label class="control-label">Status(*):</label>
						</div>
						<div class="col-md-6">
							<select class="form-control" id="status" name="person-status">
								<option <?php if ($data[0]->Person_status == 'Active'): ?> selected="selected"<?php endif; ?>>
									Active
								</option>
								<option <?php if ($data[0]->Person_status == 'Inactive'): ?> selected="selected"<?php endif; ?>>
									Inactive
								</option>
							</select>
						</div>
					</div>

					<div class="mrc-details-container">
						<div class="title-container">
							<h4>MRC Details</h4>
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
					</div>

					<div class="bg-details-container">
						<div class="title-container">
							<h4>BG Details</h4>
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
					</div>

					<div class="mrc-details-container">
						<div class="title-container">
							<h4>OVI Details</h4>
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
								<button type="submit" name="save-btn" class="btn btn-success save-btn"
										value="<?php echo $data[0]->Person_id ?>">
									Save
								</button>
								<button class="btn btn-primary cancel-btn">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.getElementById("error-msg").innerHTML = "";

	function formValidation() {
		document.getElementById("error-msg").innerHTML = "";
		var full_name = document.getElementById("full-name").value;
		var contact_number = document.getElementById("contact-number").value;

		if (full_name.length == 0 || contact_number.length == 0) {
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

