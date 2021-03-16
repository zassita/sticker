<?php session_start();
	include ("header.php");
	include ("dbconnect.php");
?>
<div class="col-xl-12 col-lg-12 col-md-9 col-xs-12">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-1">
                <h5 class="m-0  font-weight-bold text-primary">Student information</h5>
            </div>
        </div>

        <div class="card-body">

            <div class="p-2">
            	<form method="post" action="" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="<?php echo $_SESSION['fullname']; ?>" readonly>
						</div>
						<div class="form-group col-md-6">
							<label for="Phone">Matric Number</label>
							<input type="text" class="form-control" id="matricno" name="matricno" placeholder="Matric number" value="<?php echo $_SESSION['matric']; ?>" readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="licenseclass">Result</label>
							<input type="text" class="form-control" id="result" name="result" required>
						</div>
						<div class="form-group col-md-6">
							<label for="licenseexpiration">Serial Number</label>
							<input type="text" class="form-control" id="no_siri" name="no_siri" required>
						</div>
					</div>

					<a href='listapprove.php' class='btn btn-success'>Submit</a>

					</div>
					</div>
				</form>
</div>
</div>
</div>
</div>
<?php
	include ("footer.php");
?>