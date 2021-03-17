<?php //session_start();
//dash-admin.php
include ("dbconnect.php");
include ("header.php");

?>

<h2>Welcome admin </h2>
<!--<a href="listingcars.php">FULLTIME(CAR)</a><br>
<a href="listingmotors.php">FULLTIME(MOTORCYCLE)</a>
<br>
<a href="logout.php">Logout</a><br>-->

<?php
 //success handling for searchbox
if (isset($_GET['success'])) {
    if ($_GET['success'] == "Successequest") {
        echo '<div class="alert alert-success" role="alert"> Successfuly applied for the vehicle sticker  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}
?>

 
<div class="col-xl-12 col-lg-12 col-md-9 col-xs-12">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-1">
                <h5 class="m-0  font-weight-bold text-primary">Student Application</h5>
                <div class="pull-right">
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="p-2">

            </div>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Matric Number</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
<?php
//filename : listing.php

	$sql= "SELECT r.*,s.*,v.* FROM request_info AS r
		JOIN student_info AS s
		ON s.matric_number = r.matric_number
		JOIN vehicle_info AS v
		ON v.id = r.vehicle_id
		WHERE r.status_id = 1";
		  
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
			echo "<tr>";
			echo "<td>".$row['matric_number']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>";

			$matric_number=$row['matric_number'];
			echo "<a href='listingcars.php?id=$matric_number'
					class='btn btn-primary'>View</a>";
			echo "</td>
					</tr>";
			//echo "licenseexpiration: ".$row['licenseexpiration']."<br>";
			//echo "fileToUpload: ".$row['fileToUpload']."<br>";
		}//end while
	}//end if mum_rows
?>  
                <!-- close table responsive -->
</table>
</div>
</div>
</div>
</div>
<?php
include ("footer.php");
?>