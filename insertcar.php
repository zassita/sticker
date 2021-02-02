<?php
	include ("header.php");
?>
<!-- forminsert.php -->
<form method="post" action="">
	Name:  
	<input type="text" name="name"
	class="form-control"><br>
	Phone No: 
	<input type="text" name="phoneno"
	class="form-control"><br>
	Gender:
	<input type="text" name="gender"
	class="form-control"><br>
	Programme:
	<input type="text" name="programme"
	class="form-control"><br>
	Faculty:  
	<input type="text" name="faculty"
	class="form-control"><br>
	Matric No: 
	<input type="text" name="matricno"
	class="form-control"><br>
	Address:
	<input type="text" name="address"
	class="form-control"><br>
	Driving License Class:
	<input type="text" name="licenseclass"
	class="form-control"><br>
	Road Tax End Date:  
	<input type="text" name="roadtax"
	class="form-control"><br>
	Car Brand: 
	<input type="text" name="carbrand"
	class="form-control"><br>
	Color:
	<input type="text" name="color"
	class="form-control"><br>
	Cylinder Power:
	<input type="text" name="cylinder power"
	class="form-control"><br>
	Vehicle Registration No:  
	<input type="text" name="vehicleregistration"
	class="form-control"><br>
	Driver's License Expiration Date: 
	<input type="text" name="licenseexpiration"
	class="form-control"><br>
	Upload License Files:
	<input type="file" name="fileToUpload" id="fileToUpload" 
	class="form-control"><br>
	<input type="submit" value="Insert Record"
	class="btn btn-success">
</form>
<hr>
<?php
	if(isset($_POST['matricno']) && isset($_POST['name'])){

		//connect to db
		include ("dbconnect.php");

		$name=$_POST['name'];
		$phoneno=$_POST['phoneno'];
		$gender=$_POST['gender'];
		$programme=$_POST['programme'];
		$faculty=$_POST['faculty'];
		$matricno=$_POST['matricno'];
		$address=$_POST['address'];
		$drivinglicenseclass=$_POST['licenseclass'];
		$roadtaxenddate=$_POST['roadtax'];
		$carbrand=$_POST['carbrand'];
		$color=$_POST['color'];
		$cylinderpower=$_POST['cylinderpower'];
		$vehicleregistrationno=$_POST['vehicleregistration'];
		$driverslicenseexpirationdate=$_POST['licenseexpiration'];

		//image upload only
$target_dir = "files/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {//bytes
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

		//sql command
		$sql="INSERT INTO cars(name,phoneno,gender,programme,faculty,matricno,
			 address,licenseclass,roadtax,carbrand,color,cylinderpower,vehicleregistration,licenseexpiration)
			VALUES ('$name','$phoneno','$gender','$programme','$faculty','$matricno',
			'$address','$licenseclass','$roadtax','$carbrand','$color','$cylinderpower','$vehicleregistration',             '$licenseexpiration')";

		//execute sql
		$result = mysqli_query($conn, $sql);

		//evaluate the execution
		if($result==true){
			echo "The record for $matricno has been saved";
		}
		else{
			echo "The record cannot be saved";
		}

	}
?>
<?php
	include ("footer.php");
?>