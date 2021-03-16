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
	//if($result==false) {
		//echo ("Query cannot be executed!<br>");
		//echo ("SQL Error: ".mysqli_error($conn));
	//}

	//how many record fetched
	//if(mysqli_num_rows($result)==0){
		//echo ("No record fetched...<br>");
	//}
	
	//else{
		//while 
	//capture record
			$row=mysqli_fetch_array($result);
			$name=$row['name'];
			$phone=$row['phone'];
			$address=$row['address'];
			$program=$row['program'];
			$fakulti=$row['fakulti'];
			$matric_number=$row['matric_number'];
			$licence_class=$row['licence_class'];
			$licence_expired=$row['licence_expired'];
			$vehicle_brand=$row['vehicle_brand'];
			$roadtax=$row['roadtax'];
			$color=$row['color'];
			$cc_power=$row['cc_power'];
			$no_plat=$row['no_plat'];
			$file_matric=$row['file_matric'];
			$file_vehiclegrant=$row['file_vehiclegrant'];
			$file_licence=$row['file_licence'];
			$file_permisionletter=$row['file_permisionletter'];
			
		//}//end while
	//}//end if mum_rows
?>

<form method="post" action="saveupdate-tempahan.php">
	Name<input type="text" name="name"
	class="form-control"
	value="<?php echo $name ?>" readonly>
	phone
	<input type="text" name="phone"
	class="form-control" 
	value="<?php echo $phone ?>" readonly>
	address
	<input type="text" name="address" 
	class="form-control"
	value="<?php echo $address ?>" readonly>
	program
	<input type="date" name="program"
	class="form-control"
	value="<?php echo $program ?>" readonly>
	fakulti<input type="text" name="fakulti"
	class="form-control"
	value="<?php echo $fakulti ?>" readonly>
	matric_number
	<input type="text" name="matric_number"
	class="form-control" 
	value="<?php echo $matric_number ?>" readonly>
	licence_class
	<input type="text" name="licence_class" 
	class="form-control"
	value="<?php echo $licence_class ?>" readonly>
	licence_expired
	<input type="date" name="licence_expired"
	class="form-control"
	value="<?php echo $licence_expired ?>" readonly>
	vehicle_brand<input type="text" name="vehicle_brand"
	class="form-control"
	value="<?php echo $vehicle_brand ?>" readonly>
	roadtax
	<input type="text" name="roadtax"
	class="form-control" 
	value="<?php echo $roadtax ?>" readonly>
	color
	<input type="text" name="color" 
	class="form-control"
	value="<?php echo $color ?>" readonly>
	cc_power
	<input type="text" name="cc_power"
	class="form-control"
	value="<?php echo $cc_power ?>" readonly>
	no_plat<input type="text" name="no_plat"
	class="form-control"
	value="<?php echo $no_plat ?>" readonly>
	file_matric
	<input type="text" name="file_matric"
	class="form-control" 
	value="<?php echo $file_matric ?>" readonly>
	file_vehiclegrant
	<input type="text" name="file_vehiclegrant" 
	class="form-control"
	value="<?php echo $file_vehiclegrant ?>" readonly>
	file_licence
	<input type="text" name="file_licence"
	class="form-control"
	value="<?php echo $file_licence ?>" readonly>
	file_permisionletter
	<input type="text" name="file_permisionletter"
	class="form-control"
	value="<?php echo $file_permisionletter ?>" readonly>
	
<?php

	echo "<a href='approve.php'
					class='btn btn-success'>Approve</a>";
			echo "<a href='reject.php'
					class='btn btn-success'>Reject</a>";
			echo "</td>
					</tr>";

?>	
	</div>
</div>
</div>
</div>

<?php
	include ("footer.php");
?>