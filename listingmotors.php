<?php
	include ("header.php");
?>

<?php
//filename : listing.php
	
	include "dbconnect.php";

	$sql="SELECT name,phoneno,gender,programme,faculty,matricno,
			 address,licenseclass,roadtax,motorbrand,color,color,vehicleregistration,licenseexpiration,fileToUpload
		 FROM motors";

	//execute sql command
	$result = mysqli_query($conn, $sql);
	if($result==false) {
		echo ("Query cannot be executed!<br>");
		echo ("SQL Error: ".mysqli_error($db));
	}

	//how many record fetched
	if(mysqli_num_rows($result)==0){
		echo ("No record fetched...<br>");
	}

	else {
		while ($rekod=mysqli_fetch_array($qr)){
			echo "name: ".$row['name']."<br>";
			echo "phoneno: ".$row['phoneno']."<br>";
			echo "gender: ".$row['gender']."<hr>";
			echo "programme: ".$row['programme']."<br>";
			echo "faculty: ".$row['faculty']."<br>";
			echo "matricno: ".$row['matricno']."<hr>";
			echo "address: ".$row['address']."<br>";
			echo "licenseclass: ".$row['licenseclass']."<br>";
			echo "roadtax: ".$row['roadtax']."<hr>";
			echo "motorbrand: ".$row['motorbrand']."<br>";
			echo "color: ".$row['color']."<br>";
			echo "vehicleregistration: ".$row['vehicleregistration']."<hr>";
			echo "licenseexpiration: ".$row['licenseexpiration']."<br>";
			echo "fileToUpload: ".$row['fileToUpload']."<br>";
		}//end while
	}//end if mum_rows
?>
<?php
	include ("footer.php");
?>