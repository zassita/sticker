<?php
	include ("header.php");
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
<?php
//filename : listing.php
	
	include "dbconnect.php";

	$sql="SELECT s.*, v.* FROM student_info AS s 
		  JOIN vehicle_info AS v 
		  ON s.matric_number = v.matric_number";

	//execute sql command
	$result = mysqli_query($conn, $sql);
	if($result==false) {
		echo ("Query cannot be executed!<br>");
		echo ("SQL Error: ".mysqli_error($conn));
	}

	//how many record fetched
	if(mysqli_num_rows($result)==0){
		echo ("No record fetched...<br>");
	}

	else{
		while ($row=mysqli_fetch_array($result)){
			echo "Name: ".$row['name']."<br>";
			echo "Phone Number: ".$row['phone']."<br>";
			echo "Address: ".$row['address']."<br>";
			echo "Programme: ".$row['program']."<br>";
			echo "Faculty: ".$row['fakulti']."<br>";
			echo "Matric Number: ".$row['matric_number']."<br>";
			echo "Driving License Class: ".$row['licence_class']."<br>";
			echo "Driver's License Expiration Date: ".$row['licence_expired']."<br>";
			echo "Vehicle Brand: ".$row['vehicle_brand']."<br>";
			echo "Road Tax End Date: ".$row['roadtax']."<br>";
			echo "Color: ".$row['color']."<br>";
			echo "Cylinder Power: ".$row['cc_power']."<br>";
			echo "Vehicle Registration Number: ".$row['no_plat']."<br>";
			echo "Upload Matric: ".$row['file_matric']."<br>";
			echo "Upload Vehicle Grant Files: ".$row['file_vehiclegrant']."<br>";
			echo "Upload License Files: ".$row['file_licence']."<br>";
			echo "Upload Permision Letter Files: ".$row['file_permisionletter']."<br>";
			
			echo "<a href='listapprove.php'
					class='btn btn-success'>Save</a>";
			echo "</td>
					</tr>";
		}//end while
	}//end if mum_rows
?>
	
	</div>
</div>
</div>
</div>

<?php
	include ("footer.php");
?>