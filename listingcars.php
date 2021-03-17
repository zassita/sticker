<?php
include("header.php");
//filename : listing.php

include "dbconnect.php";


$sql = "SELECT r.*,s.*,v.* FROM request_info AS r
		JOIN student_info AS s
		ON s.matric_number = r.matric_number
		JOIN vehicle_info AS v
		ON v.id = r.vehicle_id";
//execute sql command
$result = mysqli_query($conn, $sql);

//capture record
$row = mysqli_fetch_array($result);
$name = $row['name'];
$phone = $row['phone'];
$address = $row['address'];
$program = $row['program'];
$fakulti = $row['fakulti'];
$matric_number = $row['matric_number'];
$licence_class = $row['licence_class'];
$licence_expired = $row['licence_expired'];
$vehicle_brand = $row['vehicle_brand'];
$roadtax = $row['roadtax'];
$color = $row['color'];
$cc_power = $row['cc_power'];
$no_plat = $row['no_plat'];
$file_matric = $row['file_matric'];
$file_vehiclegrant = $row['file_vehiclegrant'];
$file_licence = $row['file_licence'];
$file_permisionletter = $row['file_permisionletter'];
$file_supportletter = $row['file_supportletter'];
$requestid = $row['request_id'];
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="d-sm-flex align-items-center justify-content-between mb-1">
				<h5 class="m-0  font-weight-bold text-primary">Student information</h5>
			</div>
		</div>
		<div class="card-body">
			<div class="p-2">
				<form method="post" action="updaterequest.php">
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="<?php echo $name ?>">
						</div>
						<div class="col-md-4 mb-3">
							<label for="matric_number">Matric Number</label>
							<input type="text" class="form-control" id="matric_number" name="matric_number" placeholder="Your Matric number" value="<?php echo $matric_number ?>">
						</div>
						<div class="col-md-4 mb-3">
							<label for="fakulti">Fakulti</label>
							<div class="input-group">
								<input type="text" class="form-control" id="fakulti" placeholder="fakulti" value="<?php echo $fakulti ?>">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" id="phone" placeholder="Your Phone Number" value="<?php echo $phone ?>">
						</div>
						<div class="col-md-6 mb-3">
							<label for="program">Program</label>
							<input type="text" class="form-control" id="program" placeholder="Your Program" value="<?php echo $program ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" id="address" rows="3" readonly><?php echo $address ?></textarea>
					</div>
					<div class="form-row">
						<div class="col-md-4 md-3">
							<label for="licens_eclass">Licence Class</label>
							<input type="text" class="form-control" id="licens_eclass" placeholder="Your license class Number" value="<?php echo $licence_class ?>">
						</div>
						<div class="col-md-4 md-3">
							<label for="licence_expired">Licence Expired Date</label>
							<input type="date" class="form-control" id="licence_expired" placeholder="Your license class Number" value="<?php echo $licence_expired ?>" readonly>
						</div>
						<div class="col-md-4 md-3">
							<label for="vehicle_brand">Vehicle Brand</label>
							<input type="text" class="form-control" id="vehicle_brand" placeholder="Your Vehicle Brand" value="<?php echo $vehicle_brand ?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-3 md-3">
							<label for="roadtax">Road Tax end date</label>
							<input type="date" class="form-control" id="roadtax" placeholder="Raod tax end date" value="<?php echo $roadtax ?>" readonly>
						</div>
						<div class="col-md-3 md-3">
							<label for="color">Vehicle Color</label>
							<input type="text" class="form-control" id="color" placeholder="Your license class Number" value="<?php echo $color ?>" readonly>
						</div>
						<div class="col-md-3 md-3">
							<label for="cc_power">Cylinder Power</label>
							<input type="text" class="form-control" id="cc_power" placeholder="Your Vehicle Brand" value="<?php echo $cc_power ?>" readonly>
						</div>
						<div class="col-md-3 md-3">
							<label for="no_plat">Plat Number</label>
							<input type="text" class="form-control" id="no_plat" placeholder="Your Vehicle Brand" value="<?php echo $no_plat ?>" readonly>
						</div>
					</div>
					<div class="form-row ">
						<div class="col-md-6 md-3">
							<label for="file_vehiclegrant">Vehicle grant</label>
							<a href="sticker/<?php echo $file_vehiclegrant; ?>" target="_blank">View</a>

							<input type="text" name="file_vehiclegrant" class="form-control" value="<?php echo $file_vehiclegrant ?>" readonly>
							<div class="col-auto">
								<div class="form-check mb-2">
									<input class="form-check-input" type="checkbox" id="autoSizingCheck">
									<label class="form-check-label" for="autoSizingCheck">
										Approve
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6 md-3">
							<label for="file_licence">Vehicle Licence</label>
							<a href="sticker/<?php echo $file_licence; ?>" target="_blank">View</a>

							<input type="text" name="file_licence" class="form-control" value="<?php echo $file_licence ?>" readonly>
							<div class="col-auto">
								<div class="form-check mb-2">
									<input class="form-check-input" type="checkbox" id="autoSizingCheck">
									<label class="form-check-label" for="autoSizingCheck">
										Approve
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row ">
						<div class="col-md-6 md-3">
							<label for="file_permisionletter">Vehicle permision letter</label>
							<a href="sticker/<?php echo $file_permisionletter; ?>" target="_blank">View</a>

							<input type="text" name="file_permisionletter" class="form-control" value="<?php echo $file_permisionletter ?>" readonly>
							<div class="col-auto">
								<div class="form-check mb-2">
									<input class="form-check-input" type="checkbox" id="autoSizingCheck">
									<label class="form-check-label" for="autoSizingCheck">
										Approve
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6 md-3">
							<label for="file_licence">Card Matric</label>
							<a href="sticker/<?php echo $file_licence; ?>" target="_blank">View</a>

							<input type="text" name="file_licence" class="form-control" value="<?php echo $file_licence ?>" readonly>
							<div class="col-auto">
								<div class="form-check mb-2">
									<input class="form-check-input" type="checkbox" id="autoSizingCheck">
									<label class="form-check-label" for="autoSizingCheck">
										Approve
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-6 md-3">

							<label for="file_supportletter">Support Letter</label>
							<a href="sticker/<?php echo $file_supportletter; ?>" target="_blank">View</a>
							<input type="text" name="file_supportletter" class="form-control" value="<?php echo $file_supportletter ?>" readonly>
							<div class="col-auto">
								<div class="form-check mb-2">
									<input class="form-check-input" type="checkbox" id="autoSizingCheck">
									<label class="form-check-label" for="autoSizingCheck">
										Approve
									</label>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>