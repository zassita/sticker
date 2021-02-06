<?php session_start();
include("header.php");
?>


<div class="col-xl-12 col-lg-12 col-md-9 col-xs-12">
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<div class="d-sm-flex align-items-center justify-content-between mb-1">
				<h5 class="m-0  font-weight-bold text-primary">Insert all your information</h5>
			</div>
		</div>

		<div class="card-body">

			<div class="p-2">
				<!-- forminsert.php -->
				<form method="post" action="validaterequest.php" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="<?php echo $_SESSION['fullname']; ?>" readonly>
						</div>
						<div class="form-group col-md-6">
							<label for="Phone">Phone</label>
							<input type="text" class="form-control" id="Phone" name="phoneno" placeholder="Your Phone Number" value="<?php echo $_SESSION['phone']; ?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="matricno">Matric Number</label>
							<input type="text" class="form-control" id="matricno" name="matricno" placeholder="Matric number" value="<?php echo $_SESSION['matric']; ?>" readonly>
						</div>
						<div class="form-group col-md-6">
							<label for="Faculty">Faculty</label>
							<input type="text" class="form-control" id="Faculty" name="faculty" placeholder="Your Phone Number" value="<?php echo $_SESSION['fakulti']; ?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="programme">Program</label>
							<input type="text" class="form-control" id="programme" name="programme" placeholder="Your name" value="<?php echo $_SESSION['program']; ?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Your Address" value="<?php echo $_SESSION['address']; ?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="licenseclass">Driving License Class</label>
							<input type="text" class="form-control" id="licenseclass" name="licenseclass" required>
						</div>
						<div class="form-group col-md-6">
							<label for="licenseexpiration">Driver's License Expiration Date</label>
							<input type="date" class="form-control" id="licenseexpiration" name="licenseexpiration" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="carbrand">Car Brand</label>
							<input type="text" class="form-control" id="carbrand" name="carbrand" required>
						</div>
						<div class="form-group col-md-6">
							<label for="roadtax">Road Tax End Date</label>
							<input type="date" class="form-control" id="roadtax" name="roadtax" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="color">Color</label>
							<input type="text" class="form-control" id="color" name="color" required>
						</div>
						<div class="form-group col-md-4">
							<label for="cylinderpower">Cylinder Power</label>
							<input type="text" class="form-control" id="cylinderpower" name="cylinderpower" required>
						</div>
						<div class="form-group col-md-4">
							<label for="vehicleregistration">Vehicle Registration No</label>
							<input type="text" class="form-control" id="vehicleregistration" name="vehicleregistration" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="file_licence">Upload License Files</label>
							<input type="file" class="form-control-file" id="file_licence" name="file_licence">
						</div>
						<div class="form-group col-md-4">
							<label for="file_matric">Upload Matric</label>
							<input type="file" class="form-control-file" id="file_matric" name="file_matric">
						</div>
						<div class="form-group col-md-4">
							<label for="file_vehiclegrant">Upload Vehicle Grant Files</label>
							<input type="file" class="form-control-file" id="file_vehiclegrant" name="file_vehiclegrant">
						</div>
						<div class="form-group col-md-4">
							<label for="file_permisionletter">Upload Permision Letter Files</label>
							<input type="file" class="form-control-file" id="file_permisionletter" name="file_permisionletter">
						</div>
					</div>

					<input type="submit" value="Insert Record" name="btn_submit" class="btn btn-success">
				</form>
			</div>

		</div>
	</div>
</div>
<?php
include("footer.php");
?>